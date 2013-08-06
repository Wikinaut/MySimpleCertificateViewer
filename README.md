MySimpleCertViewer
==================

MySimpleCertViewer - a simple server certificate viewer in PHP.

#### Usage

Deploy the script to your web server and point to it.

#### Additional information: command line to dump the fingerprint of a server certificate

If you only want to print the SHA1 fingerprint of ```www.google.org:443```, instead of installing the script you can simply use

```
openssl s_client -connect www.google.org:443 2>/dev/null </dev/null | \
openssl x509 -fingerprint -sha1 -noout
```


#### References
* http://stackoverflow.com/questions/6426927/php-ssl-certificate-fingerprint
* http://kubieziel.de/blog/archives/1484-Fingerprints-von-SSL-Seiten-pruefen.html
* http://unitstep.net/blog/2009/05/05/using-curl-in-php-to-access-https-ssltls-protected-sites/

#### Example output for https://www.google.org:443

```
MySimpleCertViewer

source code on GitHub

Example for www.google.org

Array
(
    [x-server-port] => www.google.org:443
    [x-server] => www.google.org
    [x-port] => 443
    [x-retrieval-time] => Array
        (
            [utc] => 20130806230914Z
            [unix] => 1375830554
        )

    [x-mysimplecertviewer-version] => 1.24 20130807
    [x-fingerprints] => Array
        (
            [x-sha1] => fd:8c:19:47:69:80:5d:13:d7:14:ce:a3:20:45:af:75:07:f3:55:6f
            [x-md5] => 74:fb:da:83:52:34:59:a8:32:d9:6f:c5:31:39:2d:34
            [x-sha256] => 98:6f:0b:57:25:c0:68:18:de:5a:9b:66:91:f4:56:e3:54:4b:b7:fc:d7:30:c0:1c:95:cc:d2:7b:6b:ba:5c:cc
            [sha1] => fd8c194769805d13d714cea32045af7507f3556f
            [md5] => 74fbda83523459a832d96fc531392d34
            [sha256] => 986f0b5725c06818de5a9b6691f456e3544bb7fcd730c01c95ccd27b6bba5ccc
        )

    [name] => /C=US/ST=California/L=Mountain View/O=Google Inc/CN=misc.google.com
    [subject] => Array
        (
            [C] => US
            [ST] => California
            [L] => Mountain View
            [O] => Google Inc
            [CN] => misc.google.com
        )

    [hash] => 82ea0971
    [issuer] => Array
        (
            [C] => US
            [O] => Google Inc
            [CN] => Google Internet Authority
        )

    [version] => 2
    [serialNumber] => 472301160662781038465473
    [validFrom] => 130712090001Z
    [validTo] => 131031235959Z
    [validFrom_time_t] => 1373619601
    [validTo_time_t] => 1383263999
    [purposes] => Array
        (
            [1] => Array
                (
                    [0] => 1
                    [1] => 
                    [2] => sslclient
                )

            [2] => Array
                (
                    [0] => 1
                    [1] => 
                    [2] => sslserver
                )

            [3] => Array
                (
                    [0] => 1
                    [1] => 
                    [2] => nssslserver
                )

            [4] => Array
                (
                    [0] => 
                    [1] => 
                    [2] => smimesign
                )

            [5] => Array
                (
                    [0] => 
                    [1] => 
                    [2] => smimeencrypt
                )

            [6] => Array
                (
                    [0] => 1
                    [1] => 
                    [2] => crlsign
                )

            [7] => Array
                (
                    [0] => 1
                    [1] => 1
                    [2] => any
                )

            [8] => Array
                (
                    [0] => 1
                    [1] => 
                    [2] => ocsphelper
                )

            [9] => Array
                (
                    [0] => 
                    [1] => 
                    [2] => timestampsign
                )

        )

    [extensions] => Array
        (
            [extendedKeyUsage] => TLS Web Server Authentication, TLS Web Client Authentication
            [subjectKeyIdentifier] => 0A:CF:FB:B2:52:23:8F:BE:DA:A4:3A:C6:63:66:AF:20:01:6C:5F:33
            [authorityKeyIdentifier] => keyid:BF:C0:30:EB:F5:43:11:3E:67:BA:9E:91:FB:FC:6A:DA:E3:6B:12:24

            [crlDistributionPoints] => 
Full Name:
  URI:http://www.gstatic.com/GoogleInternetAuthority/GoogleInternetAuthority.crl

            [authorityInfoAccess] => CA Issuers - URI:http://www.gstatic.com/GoogleInternetAuthority/GoogleInternetAuthority.crt

            [basicConstraints] => CA:FALSE
            [subjectAltName] => DNS:misc.google.com, DNS:*.api.cluster.labs.prizes.org, DNS:*.api.prizes.org, DNS:*.chrome.com, DNS:*.cluster.labs.prizes.org, DNS:*.gbc.beatthatquote.com, DNS:*.google.org, DNS:*.googleapps.com, DNS:*.googlecompare.co.uk, DNS:*.googleforveterans.com, DNS:*.personfinder.google.org, DNS:*.prizes.org, DNS:*.quoteproxy.beatthatquote.com, DNS:*.schemer.com, DNS:*.staging.widevine.com, DNS:*.uat.widevine.com, DNS:*.widevine.com, DNS:*.youtubemobilesupport.com, DNS:bufferbox.com, DNS:chrome.com, DNS:gbc.beatthatquote.com, DNS:google.org, DNS:googleapps.com, DNS:googlecompare.co.uk, DNS:prizes.org, DNS:quoteproxy.beatthatquote.com, DNS:schemer.com, DNS:youtubemobilesupport.com
            [x-subjectAltName] => Array
                (
                    [0] => DNS:misc.google.com
                    [1] =>  DNS:*.api.cluster.labs.prizes.org
                    [2] =>  DNS:*.api.prizes.org
                    [3] =>  DNS:*.chrome.com
                    [4] =>  DNS:*.cluster.labs.prizes.org
                    [5] =>  DNS:*.gbc.beatthatquote.com
                    [6] =>  DNS:*.google.org
                    [7] =>  DNS:*.googleapps.com
                    [8] =>  DNS:*.googlecompare.co.uk
                    [9] =>  DNS:*.googleforveterans.com
                    [10] =>  DNS:*.personfinder.google.org
                    [11] =>  DNS:*.prizes.org
                    [12] =>  DNS:*.quoteproxy.beatthatquote.com
                    [13] =>  DNS:*.schemer.com
                    [14] =>  DNS:*.staging.widevine.com
                    [15] =>  DNS:*.uat.widevine.com
                    [16] =>  DNS:*.widevine.com
                    [17] =>  DNS:*.youtubemobilesupport.com
                    [18] =>  DNS:bufferbox.com
                    [19] =>  DNS:chrome.com
                    [20] =>  DNS:gbc.beatthatquote.com
                    [21] =>  DNS:google.org
                    [22] =>  DNS:googleapps.com
                    [23] =>  DNS:googlecompare.co.uk
                    [24] =>  DNS:prizes.org
                    [25] =>  DNS:quoteproxy.beatthatquote.com
                    [26] =>  DNS:schemer.com
                    [27] =>  DNS:youtubemobilesupport.com
                )

        )

    [x-certificate-base64] => -----BEGIN CERTIFICATE-----
MIIFrzCCBRigAwIBAgIKZAN/SgABAACRwTANBgkqhkiG9w0BAQUFADBGMQswCQYD
VQQGEwJVUzETMBEGA1UEChMKR29vZ2xlIEluYzEiMCAGA1UEAxMZR29vZ2xlIElu
dGVybmV0IEF1dGhvcml0eTAeFw0xMzA3MTIwOTAwMDFaFw0xMzEwMzEyMzU5NTla
MGkxCzAJBgNVBAYTAlVTMRMwEQYDVQQIEwpDYWxpZm9ybmlhMRYwFAYDVQQHEw1N
b3VudGFpbiBWaWV3MRMwEQYDVQQKEwpHb29nbGUgSW5jMRgwFgYDVQQDEw9taXNj
Lmdvb2dsZS5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBANRk5KDRmXcT
dorqkBFq7Mz17PXY3L1XaypAA/gMju7TcS6cbMmOEhmIXX5Ul+GAxfLwmE2WSGe1
K58m++B4D153EKIXc+ilrDKt7K/BfcX1cH3qUhk6Zc3IO2PTPL3UYkWA6WiH1Ehu
af3989FfB7Vk20Nv2QOvNOHW18qZWgbzAgMBAAGjggN/MIIDezAdBgNVHSUEFjAU
BggrBgEFBQcDAQYIKwYBBQUHAwIwHQYDVR0OBBYEFArP+7JSI4++2qQ6xmNmryAB
bF8zMB8GA1UdIwQYMBaAFL/AMOv1QxE+Z7qekfv8atrjaxIkMFsGA1UdHwRUMFIw
UKBOoEyGSmh0dHA6Ly93d3cuZ3N0YXRpYy5jb20vR29vZ2xlSW50ZXJuZXRBdXRo
b3JpdHkvR29vZ2xlSW50ZXJuZXRBdXRob3JpdHkuY3JsMGYGCCsGAQUFBwEBBFow
WDBWBggrBgEFBQcwAoZKaHR0cDovL3d3dy5nc3RhdGljLmNvbS9Hb29nbGVJbnRl
cm5ldEF1dGhvcml0eS9Hb29nbGVJbnRlcm5ldEF1dGhvcml0eS5jcnQwDAYDVR0T
AQH/BAIwADCCAkUGA1UdEQSCAjwwggI4gg9taXNjLmdvb2dsZS5jb22CHSouYXBp
LmNsdXN0ZXIubGFicy5wcml6ZXMub3JnghAqLmFwaS5wcml6ZXMub3JnggwqLmNo
cm9tZS5jb22CGSouY2x1c3Rlci5sYWJzLnByaXplcy5vcmeCFyouZ2JjLmJlYXR0
aGF0cXVvdGUuY29tggwqLmdvb2dsZS5vcmeCECouZ29vZ2xlYXBwcy5jb22CFSou
Z29vZ2xlY29tcGFyZS5jby51a4IXKi5nb29nbGVmb3J2ZXRlcmFucy5jb22CGSou
cGVyc29uZmluZGVyLmdvb2dsZS5vcmeCDCoucHJpemVzLm9yZ4IeKi5xdW90ZXBy
b3h5LmJlYXR0aGF0cXVvdGUuY29tgg0qLnNjaGVtZXIuY29tghYqLnN0YWdpbmcu
d2lkZXZpbmUuY29tghIqLnVhdC53aWRldmluZS5jb22CDioud2lkZXZpbmUuY29t
ghoqLnlvdXR1YmVtb2JpbGVzdXBwb3J0LmNvbYINYnVmZmVyYm94LmNvbYIKY2hy
b21lLmNvbYIVZ2JjLmJlYXR0aGF0cXVvdGUuY29tggpnb29nbGUub3Jngg5nb29n
bGVhcHBzLmNvbYITZ29vZ2xlY29tcGFyZS5jby51a4IKcHJpemVzLm9yZ4IccXVv
dGVwcm94eS5iZWF0dGhhdHF1b3RlLmNvbYILc2NoZW1lci5jb22CGHlvdXR1YmVt
b2JpbGVzdXBwb3J0LmNvbTANBgkqhkiG9w0BAQUFAAOBgQAH3CeY/UPPqh4qIu+3
njZWVB+UVVSxRpkcUI/KLXWIW1rsw/ZvRFs9OwgUXtwMCANAfqvlABc7N+oe8NTK
i7VOo4G4WPIp66+S7YB/XkQ+yyoEcOlGLYz2Otdp7P324K3e4EyWh6aOQc9filrj
lIV6RClOC4aoyTM/aJ4e9tDWlA==
-----END CERTIFICATE-----

    [x-certificate] => MIIFrzCCBRigAwIBAgIKZAN/SgABAACRwTANBgkqhkiG9w0BAQUFADBGMQswCQYDVQQGEwJVUzETMBEGA1UEChMKR29vZ2xlIEluYzEiMCAGA1UEAxMZR29vZ2xlIEludGVybmV0IEF1dGhvcml0eTAeFw0xMzA3MTIwOTAwMDFaFw0xMzEwMzEyMzU5NTlaMGkxCzAJBgNVBAYTAlVTMRMwEQYDVQQIEwpDYWxpZm9ybmlhMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRMwEQYDVQQKEwpHb29nbGUgSW5jMRgwFgYDVQQDEw9taXNjLmdvb2dsZS5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBANRk5KDRmXcTdorqkBFq7Mz17PXY3L1XaypAA/gMju7TcS6cbMmOEhmIXX5Ul+GAxfLwmE2WSGe1K58m++B4D153EKIXc+ilrDKt7K/BfcX1cH3qUhk6Zc3IO2PTPL3UYkWA6WiH1Ehuaf3989FfB7Vk20Nv2QOvNOHW18qZWgbzAgMBAAGjggN/MIIDezAdBgNVHSUEFjAUBggrBgEFBQcDAQYIKwYBBQUHAwIwHQYDVR0OBBYEFArP+7JSI4++2qQ6xmNmryABbF8zMB8GA1UdIwQYMBaAFL/AMOv1QxE+Z7qekfv8atrjaxIkMFsGA1UdHwRUMFIwUKBOoEyGSmh0dHA6Ly93d3cuZ3N0YXRpYy5jb20vR29vZ2xlSW50ZXJuZXRBdXRob3JpdHkvR29vZ2xlSW50ZXJuZXRBdXRob3JpdHkuY3JsMGYGCCsGAQUFBwEBBFowWDBWBggrBgEFBQcwAoZKaHR0cDovL3d3dy5nc3RhdGljLmNvbS9Hb29nbGVJbnRlcm5ldEF1dGhvcml0eS9Hb29nbGVJbnRlcm5ldEF1dGhvcml0eS5jcnQwDAYDVR0TAQH/BAIwADCCAkUGA1UdEQSCAjwwggI4gg9taXNjLmdvb2dsZS5jb22CHSouYXBpLmNsdXN0ZXIubGFicy5wcml6ZXMub3JnghAqLmFwaS5wcml6ZXMub3JnggwqLmNocm9tZS5jb22CGSouY2x1c3Rlci5sYWJzLnByaXplcy5vcmeCFyouZ2JjLmJlYXR0aGF0cXVvdGUuY29tggwqLmdvb2dsZS5vcmeCECouZ29vZ2xlYXBwcy5jb22CFSouZ29vZ2xlY29tcGFyZS5jby51a4IXKi5nb29nbGVmb3J2ZXRlcmFucy5jb22CGSoucGVyc29uZmluZGVyLmdvb2dsZS5vcmeCDCoucHJpemVzLm9yZ4IeKi5xdW90ZXByb3h5LmJlYXR0aGF0cXVvdGUuY29tgg0qLnNjaGVtZXIuY29tghYqLnN0YWdpbmcud2lkZXZpbmUuY29tghIqLnVhdC53aWRldmluZS5jb22CDioud2lkZXZpbmUuY29tghoqLnlvdXR1YmVtb2JpbGVzdXBwb3J0LmNvbYINYnVmZmVyYm94LmNvbYIKY2hyb21lLmNvbYIVZ2JjLmJlYXR0aGF0cXVvdGUuY29tggpnb29nbGUub3Jngg5nb29nbGVhcHBzLmNvbYITZ29vZ2xlY29tcGFyZS5jby51a4IKcHJpemVzLm9yZ4IccXVvdGVwcm94eS5iZWF0dGhhdHF1b3RlLmNvbYILc2NoZW1lci5jb22CGHlvdXR1YmVtb2JpbGVzdXBwb3J0LmNvbTANBgkqhkiG9w0BAQUFAAOBgQAH3CeY/UPPqh4qIu+3njZWVB+UVVSxRpkcUI/KLXWIW1rsw/ZvRFs9OwgUXtwMCANAfqvlABc7N+oe8NTKi7VOo4G4WPIp66+S7YB/XkQ+yyoEcOlGLYz2Otdp7P324K3e4EyWh6aOQc9filrjlIV6RClOC4aoyTM/aJ4e9tDWlA==
)
```
