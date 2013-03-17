<?php

/**
 * MySimpleCertViewer - a simple server certificate viewer in PHP
 *
 * T.Gries
 *
 * License: MIT/X11
 * http://www.opensource.org/licenses/mit-license.php
 *
 */
$version = "1.01 20130317";

# The server and port are currently hardcoded
#
$server = "www.google.org";
$port = "443";

$certFilename = tempnam( "", "server-certificate-");
exec( "openssl s_client -connect $server:$port 2>/dev/null </dev/null " .
	"| sed -ne '/-BEGIN CERTIFICATE-/,/-END CERTIFICATE-/p' 1> $certFilename",
	$out
);
date_default_timezone_set('UTC');
$now = time();

function decodeCert( $cert ) {
    $cert = preg_replace( '/\-+BEGIN CERTIFICATE\-+/', '', $cert );
    $cert = preg_replace( '/\-+END CERTIFICATE\-+/', '', $cert );
    $cert = str_replace( array( "\n\r", "\n", "\r" ), '', trim( $cert ) );
    return base64_decode( $cert );
 }

$cert = file_get_contents( $certFilename );
$decCert = decodeCert( $cert );

$certArray = array();
$certArray['x-server-port'] = "$server:$port";
$certArray['x-server'] = $server;
$certArray['x-port'] = $port;
$certArray['x-retrieval-time'] = array(
	'utc' => date( "YmdHis", $now ) . "Z",
	'unix' => date( "U", $now),
);
$certArray['x-mysimplecertviewer-version'] = $version;

$certArray['x-fingerprints'] = array(
	"sha1" => sha1( $decCert ),
	"md5" => md5( $decCert ),
	"sha256" => sha256( $decCert ),
);

$certArray = $certArray + openssl_x509_parse( $cert );
$subjectAltName = $certArray['extensions']['subjectAltName'];
$certArray['extensions']['x-subjectAltName'] = explode( ",", $subjectAltName );
$certArray['x-certificate-base64'] = $cert;

$retrievalTimestamp = date( "Y:m:d H:i:s e", $now );
$output = print_r( $certArray , true );

header( "Content-Type: text/html" );
echo <<<EOF
<h2>MySimpleCertViewer</h2>
<pre>
<a href="https://github.com/Wikinaut/MySimpleCertViewer">source code on GitHub</a>
<hr>
Certificate data for <b><a href="https://$server:$port">https://$server:$port</a></b> as of $retrievalTimestamp
(x-fields are added by MySimpleCertViewer)

$output
</pre>
EOF;

