<?php

/**
 * MySimpleCertificateViewer - a simple server certificate viewer in PHP
 *
 * Authors and contributors
 *
 * Thomas Gries
 * Tyler Romeo
 *
 * initial version 20130317
 *
 * License: MIT/X11
 * http://www.opensource.org/licenses/mit-license.php
 *
 */
define( 'CERTVIEWER_VERSION', "1.5 20131124" );

function addColonSeparators( $str ) {
	$ret = "";
	for ( $i = 0; $i < strlen( $str ); $i++ ) {
		$ret .= substr( $str, $i, 1 ) . ( ( $i % 2 == 1 ) ? ":" : "" );
	}
	return rtrim( $ret, ":" );
}

/**
 * Extract signature from der encoded cert.
 * taken from http://badpenguins.com/source/misc/isCertSigner.php?viewSource
 *
 * Expects x509 der encoded certificate consisting of a section container
 * containing 2 sections and a bitstream.  The bitstream contains the
 * original encrypted signature, encrypted by the public key of the issuing
 * signer.
 *
 * @author Mike Green <mikey at badpenguins dot com>
 * @copyright Copyright (c) 2010, Mike Green
 * @license http://opensource.org/licenses/gpl-2.0.php GPLv2
 *
 * @param string $der
 * @return string on success
 * @return bool false on failures
 */
function extractSignature( $der=false ) {

	if ( strlen($der ) < 5) {
		return false;
	}

	// skip container sequence
	$der = substr( $der, 4 );

	// now burn through two sequences and the return the final bitstream
	while( strlen( $der ) > 1 ) {

		$class = ord( $der[0] );
		$classHex = dechex( $class );

		switch( $class ) {

			// BITSTREAM
			case 0x03:
				$len = ord( $der[1] );
				$bytes = 0;
				if ( $len & 0x80 ) {
					$bytes = $len & 0x0f;
					$len = 0;
					for ( $i = 0; $i < $bytes; $i++ ) {
						$len = ( $len << 8 ) | ord( $der[$i + 2] );
					}
				}
				return substr( $der, 3 + $bytes, $len );
			break;

			// SEQUENCE
			case 0x30:
				$len = ord( $der[1] );
				$bytes = 0;
				if ( $len & 0x80 ) {
					$bytes = $len & 0x0f;
					$len = 0;
					for( $i = 0; $i < $bytes; $i++ ) {
						$len = ( $len << 8 ) | ord( $der[$i + 2] );
					}
				}
				$contents = substr( $der, 2 + $bytes, $len );
				$der = substr( $der, 2 + $bytes + $len);
			break;

			default:
				return false;
			break;
		}

	}

	return false;

}

/**
 * Convert pem encoded certificate to DER encoding
 *
 * @author Mike Green <mikey at badpenguins dot com>
 * @copyright Copyright (c) 2010, Mike Green
 * @license http://opensource.org/licenses/gpl-2.0.php GPLv2
 *
 * @return string $derEncoded on success
 * @return bool false on failures
 */
function pemToDer( $pem = null ) {

	if ( !is_string( $pem ) ) {
		return false;
	}

	$cert_split = preg_split( '/(-----((BEGIN)|(END)) CERTIFICATE-----)/', $pem );

	if ( !isset( $cert_split[1] ) ) {
		return false;
	}

	return base64_decode( $cert_split[1] );
}


/***
 * getCertificateInfo
 *
 * @param string $server
 * @param string $port
 * @param int $timeout in seconds
 * @return array|string certificate data or error string
 *
 **/
function getCertificateInfo( $server, $port = 443, $timeout = 5 ) {

	$context = stream_context_create(
		array(
			'ssl' => array(
				'capture_peer_cert' => true,
			)
		)
	);

	$timeout = $timeout ?: ini_get( "default_socket_timeout" );
	$errno = $errstr = 0;

	$fp = stream_socket_client(
		"ssl://$server:$port",
		$errno,
		$errstr,
		$timeout,
		STREAM_CLIENT_CONNECT,
		$context
	);

	if ( $fp === false ) {
		return "ERROR: stream_socket_client failed to connect to ssl://$server:$port ($errno $errstr).";
	}

	$params = stream_context_get_params( $fp );
	fclose( $fp );

	$cp = $params['options']['ssl']['peer_certificate'];

	$cert = '';
	openssl_x509_export( $cp, $cert );
	$certArray = openssl_x509_parse( $cp );
	openssl_x509_free( $cp );

	$certArray1 = array();

	$certArray1['x-server-port'] = "$server:$port";
	$certArray1['x-server'] = $server;
	$certArray1['x-port'] = $port;
	$certArray1['x-retrieval-time'] = array(
		'utc' => gmdate( "YmdHis\Z" ),
		'unix' => gmdate( "U" ),
	);
	$certArray1['x-mysimplecertificateviewer-version'] = CERTVIEWER_VERSION;

	// Decode the certificate to get fingerprints.
	$cleanedCert = preg_replace( '/\-+(BEGIN|END) CERTIFICATE\-+/', '', $cert );
	$cleanedCert = str_replace( array( "\n\r", "\n", "\r" ), '', trim( $cleanedCert ) );
	$decCert = base64_decode( $cleanedCert );

	$sha1 = sha1( $decCert );
	$md5 = md5( $decCert );
	$sha256 = hash( 'sha256', $decCert );

	$certArray1['x-serialNumber'] = array(
		'dec' => $certArray['serialNumber'],
		'hex' => dechex( $certArray['serialNumber'] )
	);

	$certArray1['x-fingerprints'] = array(
		"x-sha1" => addColonSeparators( $sha1 ),
		"x-md5" => addColonSeparators( $md5 ),
		"x-sha256" => addColonSeparators( $sha256 ),
		"sha1" => $sha1,
		"md5" =>  $md5,
		"sha256" =>  $sha256
	);

	if ( isset( $certArray['extensions']['subjectAltName'] ) ) {
		$certArray['extensions']['x-subjectAltName'] = explode( ",", $certArray['extensions']['subjectAltName'] );
	}

	// http://stackoverflow.com/questions/18981671/php-openssl-how-to-match-the-private-key-with-the-certificate
	// "I don't think there is a straightforward way in PHP OpenSSL to retrieve the signature information from the certificate file.
	// The closest you can get is openssl_x509_parse to get information from a certificate.
	// But, even that doesn't retrieve the signature.
	// If you are okay to experiment by parsing the certificate yourself, then take a look at bit.ly/17ZIdwC.
	// Function extractSignature might be helpful.
	// But, it expects a DER encoded certificate. - Karthik 20130924"
	//
	// http://bit.ly/17ZIdwC
	// http://stackoverflow.com/a/18984036
	// http://badpenguins.com/source/misc/isCertSigner.php

	$certArray['x-certificate']['$'] = "Certificate -> Certificate Signature Value";
	$certArray['x-certificate']['base64'] = $cert;
	$certArray['x-certificate']['hex'] = wordwrap( bin2hex( extractSignature( pemToDer( $cert ) ) ), 64, "\r\n", true );
	// $certArray['x-certificate'] = $cleanedCert;

	// http://www.php.net/manual/de/function.openssl-pkey-get-public.php
	$publicKey = openssl_pkey_get_public( $cert );
	$publicKeyDetailsRaw = openssl_pkey_get_details( $publicKey );

	$publicKeyDetails['subject-public-key-info']['rsa']['$'] = "Certificate -> Subject Public Key Info -> Subject's Public Key";
	$publicKeyDetails['subject-public-key-info']['rsa']['base64'] = wordwrap( base64_encode( $publicKeyDetailsRaw['rsa']['n'] ), 64, "\r\n", true );
	$publicKeyDetails['subject-public-key-info']['rsa']['hex'] = wordwrap( bin2hex( $publicKeyDetailsRaw['rsa']['n'] ), 64, "\r\n", true );
	unset( $publicKeyDetailsRaw );

	return $certArray1 + $certArray + $publicKeyDetails;

}


header( "Content-Type: text/html" );

$server = "www.google.org";
$output = "";
$q = "";

if ( isset( $_REQUEST['q'] ) && ( trim( $_REQUEST['q'] ) != "" ) ) {

	$url = preg_replace( "!https?://!i", "", filter_var( $_REQUEST['q'], FILTER_SANITIZE_URL ) );
	$parsedUrl = parse_url ( "https://" . $url );
	$port = array_key_exists( 'port', $parsedUrl ) ? $parsedUrl['port'] : "443";
	$host = $parsedUrl['host'];

	if ( is_array( getCertificateInfo( $host, $port ) ) ) {

		$certificateInfo = getCertificateInfo( $host, $port );
		$fingerPrints = $certificateInfo['x-fingerprints'];
		$ts = date( "r", $certificateInfo['x-retrieval-time']['unix'] );
		$output = "<div style='display:inline-block;background:lightyellow;padding:15px;border:1px dotted grey'>{$certificateInfo['x-server-port']}

sha1    {$fingerPrints['x-sha1']}
md5     {$fingerPrints['x-md5']}
sha256  {$fingerPrints['x-sha256']}

$ts
</div><p>";

		$output .= print_r( $certificateInfo, true );

	} else {

		// error
		$output = getCertificateInfo( $host, $port );

	}

	$q = $host . ( ( $port != 443 ) ? ":$port" : "" );
}

echo <<<EOF
<h2><a href="?q=">MySimpleCertificateViewer</a></h2>

<pre style="margin:0;padding:0">Name of the server whose certificate you want to scrutinize:</pre>
<form style="margin:0;padding:0"><input style="margin:0;padding:0" name="q" id="input-q" size="100" value="$q" autofocus ></form>
<pre style="margin:0;padding:0">Example: <a href="?q=$server">$server</a>
<br/>
<pre style="margin:0;padding:0">
$output
<hr style="margin:0;padding:0">
<a href="https://github.com/Wikinaut/MySimpleCertificateViewer">source code on GitHub</a>
</pre>
EOF;

