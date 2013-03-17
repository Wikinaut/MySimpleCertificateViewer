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
            [utc] => 20130317224651Z
            [unix] => 1363556811
        )

    [x-mysimplecertviewer-version] => 1.01 20130317
    [x-fingerprints] => Array
        (
            [sha1] => ec3914135ddf70774a2429f01110220d98bba741
            [md5] => e43370d2231b5f341295957948c36ed6
            [sha256] => ceb2a71fa2e66fd1eb0a216f990e797c1933484648d3b268e3b63a3575c538e6
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
    [serialNumber] => 96943236392830655036860
    [validFrom] => 130220133724Z
    [validTo] => 130607194327Z
    [validFrom_time_t] => 1361367444
    [validTo_time_t] => 1370634207
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
            [subjectKeyIdentifier] => 08:19:9A:02:9E:C8:AF:0F:5C:81:8E:01:4F:BF:E6:BF:F1:37:2E:61
            [authorityKeyIdentifier] => keyid:BF:C0:30:EB:F5:43:11:3E:67:BA:9E:91:FB:FC:6A:DA:E3:6B:12:24

            [crlDistributionPoints] => 
Full Name:
  URI:http://www.gstatic.com/GoogleInternetAuthority/GoogleInternetAuthority.crl

            [authorityInfoAccess] => CA Issuers - URI:http://www.gstatic.com/GoogleInternetAuthority/GoogleInternetAuthority.crt

            [basicConstraints] => CA:FALSE
            [subjectAltName] => DNS:misc.google.com, DNS:*.api.cluster.labs.prizes.org, DNS:*.api.prizes.org, DNS:*.chrome.com, DNS:*.cluster.labs.prizes.org, DNS:*.gbc.beatthatquote.com, DNS:*.google.org, DNS:*.googleapps.com, DNS:*.googlecompare.co.uk, DNS:*.googleforveterans.com, DNS:*.personfinder.google.org, DNS:*.prizes.org, DNS:*.quoteproxy.beatthatquote.com, DNS:*.schemer.com, DNS:*.youtubemobilesupport.com, DNS:chrome.com, DNS:gbc.beatthatquote.com, DNS:google.org, DNS:googleapps.com, DNS:googlecompare.co.uk, DNS:prizes.org, DNS:quoteproxy.beatthatquote.com, DNS:schemer.com, DNS:youtubemobilesupport.com
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
                    [14] =>  DNS:*.youtubemobilesupport.com
                    [15] =>  DNS:chrome.com
                    [16] =>  DNS:gbc.beatthatquote.com
                    [17] =>  DNS:google.org
                    [18] =>  DNS:googleapps.com
                    [19] =>  DNS:googlecompare.co.uk
                    [20] =>  DNS:prizes.org
                    [21] =>  DNS:quoteproxy.beatthatquote.com
                    [22] =>  DNS:schemer.com
                    [23] =>  DNS:youtubemobilesupport.com
                )

        )

    [x-certificate-base64] => -----BEGIN CERTIFICATE-----
MIIFZDCCBM2gAwIBAgIKFIdNqgAAAAB9vDANBgkqhkiG9w0BAQUFADBGMQswCQYD
VQQGEwJVUzETMBEGA1UEChMKR29vZ2xlIEluYzEiMCAGA1UEAxMZR29vZ2xlIElu
dGVybmV0IEF1dGhvcml0eTAeFw0xMzAyMjAxMzM3MjRaFw0xMzA2MDcxOTQzMjda
MGkxCzAJBgNVBAYTAlVTMRMwEQYDVQQIEwpDYWxpZm9ybmlhMRYwFAYDVQQHEw1N
b3VudGFpbiBWaWV3MRMwEQYDVQQKEwpHb29nbGUgSW5jMRgwFgYDVQQDEw9taXNj
Lmdvb2dsZS5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAOD1FbMyG0IT
8JOi2El6RVciBJp4ENfTkpJ2vn/HUq+gjprmUNxLSvcK+D8vBpkq8N41Qv+82PyT
uZIB0pg2CJfs07C5+ZAQnwm01DiQjM/j2jKb5GegOBRYngbRkAPSGCufzJy+QBWb
d1htqceIREEI/JH7pUGgg90XUQgBddBbAgMBAAGjggM0MIIDMDAdBgNVHSUEFjAU
BggrBgEFBQcDAQYIKwYBBQUHAwIwHQYDVR0OBBYEFAgZmgKeyK8PXIGOAU+/5r/x
Ny5hMB8GA1UdIwQYMBaAFL/AMOv1QxE+Z7qekfv8atrjaxIkMFsGA1UdHwRUMFIw
UKBOoEyGSmh0dHA6Ly93d3cuZ3N0YXRpYy5jb20vR29vZ2xlSW50ZXJuZXRBdXRo
b3JpdHkvR29vZ2xlSW50ZXJuZXRBdXRob3JpdHkuY3JsMGYGCCsGAQUFBwEBBFow
WDBWBggrBgEFBQcwAoZKaHR0cDovL3d3dy5nc3RhdGljLmNvbS9Hb29nbGVJbnRl
cm5ldEF1dGhvcml0eS9Hb29nbGVJbnRlcm5ldEF1dGhvcml0eS5jcnQwDAYDVR0T
AQH/BAIwADCCAfoGA1UdEQSCAfEwggHtgg9taXNjLmdvb2dsZS5jb22CHSouYXBp
LmNsdXN0ZXIubGFicy5wcml6ZXMub3JnghAqLmFwaS5wcml6ZXMub3JnggwqLmNo
cm9tZS5jb22CGSouY2x1c3Rlci5sYWJzLnByaXplcy5vcmeCFyouZ2JjLmJlYXR0
aGF0cXVvdGUuY29tggwqLmdvb2dsZS5vcmeCECouZ29vZ2xlYXBwcy5jb22CFSou
Z29vZ2xlY29tcGFyZS5jby51a4IXKi5nb29nbGVmb3J2ZXRlcmFucy5jb22CGSou
cGVyc29uZmluZGVyLmdvb2dsZS5vcmeCDCoucHJpemVzLm9yZ4IeKi5xdW90ZXBy
b3h5LmJlYXR0aGF0cXVvdGUuY29tgg0qLnNjaGVtZXIuY29tghoqLnlvdXR1YmVt
b2JpbGVzdXBwb3J0LmNvbYIKY2hyb21lLmNvbYIVZ2JjLmJlYXR0aGF0cXVvdGUu
Y29tggpnb29nbGUub3Jngg5nb29nbGVhcHBzLmNvbYITZ29vZ2xlY29tcGFyZS5j
by51a4IKcHJpemVzLm9yZ4IccXVvdGVwcm94eS5iZWF0dGhhdHF1b3RlLmNvbYIL
c2NoZW1lci5jb22CGHlvdXR1YmVtb2JpbGVzdXBwb3J0LmNvbTANBgkqhkiG9w0B
AQUFAAOBgQA+S1/rzUlZDSKDPcEqqsM3C5pUaj7RgZoiJ3h/8KeQyx7VqTizca6/
R9a+e4Y+pr6O7lvnKoDJaEzqouSecno7C9iklWpFD6Zrxew216ojNGvRsDyFQ8cH
DaGc1y6dOFl3H4RxlnP/FqbjbeQ59zGXNzcoXYPBxX9W/TPEmdVZ2w==
-----END CERTIFICATE-----

)
```
