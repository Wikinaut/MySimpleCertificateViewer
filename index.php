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
define( 'CERTVIEWER_VERSION', "1.4 20130811" );

function addColonSeparators( $str ) {
	$ret = "";
	for ( $i = 0; $i < strlen( $str ); $i++ ) {
		$ret .= substr( $str, $i, 1 ) . ( ( $i % 2 == 1 ) ? ":" : "" );
	}
	return rtrim( $ret, ":" );
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

	$certArray1['x-fingerprints'] = array(
		"x-sha1" => addColonSeparators( $sha1 ),
		"x-md5" => addColonSeparators( $md5 ),
		"x-sha256" => addColonSeparators( $sha256 ),
		"sha1" => $sha1,
		"md5" =>  $md5,
		"sha256" =>  $sha256
	);

	$certArray['extensions']['x-subjectAltName'] = explode( ",", $certArray['extensions']['subjectAltName'] );
	$certArray['x-certificate-base64'] = $cert;
	$certArray['x-certificate'] = $cleanedCert;

	return $certArray1 + $certArray;
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

