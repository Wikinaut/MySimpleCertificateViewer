<?php

/**
 * MySimpleCertViewer - a simple server certificate viewer in PHP
 *
 * T.Gries
 * 20130316 version 1.00
 *
 * License: MIT/X11
 * http://www.opensource.org/licenses/mit-license.php
 *
 */

# The server and port are currently hardcoded
#
$server = "www.cacert.org";
$port = "443";

$certFilename = tempnam( "", "server-certificate-");
exec( "echo -n " .
	"| openssl s_client -connect $server:$port 2>/dev/null " .
	"| sed -ne '/-BEGIN CERTIFICATE-/,/-END CERTIFICATE-/p' 1> $certFilename",
	$out
);

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

$certArray['x-fingerprints'] = array(
	"sha1" => sha1( $decCert ),
	"md5" => md5( $decCert ),
	"sha256" => sha256( $decCert ),
);

$certArray = $certArray + openssl_x509_parse( $cert );
$certArray['x-certificate-base64'] = $cert;

header( "Content-Type: text/html" );
$output = print_r( $certArray , true );
echo <<<EOF
<h2>MySimpleCertViewer</h2>
<pre>
<a href="https://github.com/Wikinaut/MySimpleCertViewer">source code on GitHub</a>
<hr>
Certificate data for <b><a href="https://$server:$port">https://$server:$port</a></b> (x-fields are added by the viewer)

$output
</pre>
EOF;

