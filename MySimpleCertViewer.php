<?php

/**
 * MySimpleCertViewer - a simple server certificate viewer in PHP
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
define( 'CERTVIEWER_VERSION', "1.21 20130806" );

function addColonSeparators( $str ) {
	$ret = "";
	for ( $i = 0; $i < strlen( $str ); $i++ ) {
		$ret .= substr( $str, $i, 1 ) . ( ( $i % 2 == 1 ) ? ":" : "" );
	}
	return $ret;
}

function getCertificateInfo( $server, $port = 443, $timeout = false ) {

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
	$certArray1['x-mysimplecertviewer-version'] = CERTVIEWER_VERSION;

	// Decode the certificate to get fingerprints.
	$cert = preg_replace( '/\-+(BEGIN|END) CERTIFICATE\-+/', '', $cert );
	$cert = str_replace( array( "\n\r", "\n", "\r" ), '', trim( $cert ) );
	$decCert = base64_decode( $cert );

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

	return $certArray1 + $certArray;
}


// Example
$server = "www.google.de";
$output = print_r( getCertificateInfo( $server ), true );
header( "Content-Type: text/html" );

echo <<<EOF
<h2>MySimpleCertViewer</h2>
<pre>
<a href="https://github.com/Wikinaut/MySimpleCertViewer">source code on GitHub</a>
<hr>
Example for $server

$output
</pre>
EOF;
