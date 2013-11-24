MySimpleCertificateViewer
==================

MySimpleCertificateViewer - a simple server certificate viewer in PHP.

#### Usage

Deploy the script ```index.php``` to your web server and point to it.

#### Additional information: 
#### command line to dump the fingerprint of a server certificate without using the script

If you only want to print the SHA1 fingerprint of ```www.google.org:443```, instead of installing the script you can simply use

```
openssl s_client -connect www.google.org:443 2>/dev/null </dev/null | \
openssl x509 -fingerprint -sha1 -noout
```


#### References
* http://stackoverflow.com/questions/6426927/php-ssl-certificate-fingerprint
* http://kubieziel.de/blog/archives/1484-Fingerprints-von-SSL-Seiten-pruefen.html
* http://unitstep.net/blog/2009/05/05/using-curl-in-php-to-access-https-ssltls-protected-sites/
* http://stackoverflow.com/questions/18981671/php-openssl-how-to-match-the-private-key-with-the-certificate
* http://stackoverflow.com/a/18984036
* http://badpenguins.com/source/misc/isCertSigner.php

#### Example output of index.php for https://www.google.org:443

```
MySimpleCertificateViewer

source code on GitHub

Example for www.google.org

www.google.org:443

sha1    4e:97:09:d0:68:52:6d:80:ad:07:ad:0b:7d:14:11:a0:af:94:1c:93
md5     44:74:1e:60:06:21:17:04:a3:e9:2d:67:71:ab:1f:3a
sha256  35:00:e4:56:aa:dc:ac:a2:24:15:87:00:99:74:e7:5e:cc:c7:98:67:91:26:45:f8:0c:7a:67:6e:06:19:d8:a5

Array
(
    [x-server-port] => www.google.org:443
    [x-server] => www.google.org
    [x-port] => 443
    [x-retrieval-time] => Array
        (
            [utc] => 20131124090735Z
            [unix] => 1385284055
        )

    [x-mysimplecertificateviewer-version] => 1.5 20131124
    [x-fingerprints] => Array
        (
            [x-sha1] => 4e:97:09:d0:68:52:6d:80:ad:07:ad:0b:7d:14:11:a0:af:94:1c:93
            [x-md5] => 44:74:1e:60:06:21:17:04:a3:e9:2d:67:71:ab:1f:3a
            [x-sha256] => 35:00:e4:56:aa:dc:ac:a2:24:15:87:00:99:74:e7:5e:cc:c7:98:67:91:26:45:f8:0c:7a:67:6e:06:19:d8:a5
            [sha1] => 4e9709d068526d80ad07ad0b7d1411a0af941c93
            [md5] => 44741e6006211704a3e92d6771ab1f3a
            [sha256] => 3500e456aadcaca2241587009974e75eccc79867912645f80c7a676e0619d8a5
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
            [CN] => Google Internet Authority G2
        )

    [version] => 2
    [serialNumber] => 5361796810368630160
    [validFrom] => 131106140326Z
    [validTo] => 140306000000Z
    [validFrom_time_t] => 1383746606
    [validTo_time_t] => 1394064000
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
            [subjectAltName] => DNS:misc.google.com, DNS:*.chrome.com, DNS:*.gbc.beatthatquote.com, DNS:*.google.org, DNS:*.googleapps.com, DNS:*.googlecompare.co.uk, DNS:*.googleforveterans.com, DNS:*.googletraveladservices.com, DNS:*.personfinder.google.org, DNS:*.quickoffice.com, DNS:*.quoteproxy.beatthatquote.com, DNS:*.schemer.com, DNS:*.screenwisetrendspanel.com, DNS:*.shibboleth.tv, DNS:*.staging.widevine.com, DNS:*.uat.widevine.com, DNS:*.widevine.com, DNS:*.youtubemobilesupport.com, DNS:chrome.com, DNS:gbc.beatthatquote.com, DNS:google.org, DNS:googleapps.com, DNS:googlecompare.co.uk, DNS:googletraveladservices.com, DNS:quoteproxy.beatthatquote.com, DNS:schemer.com, DNS:screenwisetrendspanel.com, DNS:youtubemobilesupport.com
            [authorityInfoAccess] => CA Issuers - URI:http://pki.google.com/GIAG2.crt
OCSP - URI:http://clients1.google.com/ocsp

            [subjectKeyIdentifier] => 60:5D:45:C9:49:52:AC:B4:24:60:86:86:30:F1:D6:6A:EC:FC:D9:46
            [basicConstraints] => CA:FALSE
            [authorityKeyIdentifier] => keyid:4A:DD:06:16:1B:BC:F6:68:B5:76:F5:81:B6:BB:62:1A:BA:5A:81:2F

            [certificatePolicies] => Policy: 1.3.6.1.4.1.11129.2.5.1

            [crlDistributionPoints] => 
Full Name:
  URI:http://pki.google.com/GIAG2.crl

            [x-subjectAltName] => Array
                (
                    [0] => DNS:misc.google.com
                    [1] =>  DNS:*.chrome.com
                    [2] =>  DNS:*.gbc.beatthatquote.com
                    [3] =>  DNS:*.google.org
                    [4] =>  DNS:*.googleapps.com
                    [5] =>  DNS:*.googlecompare.co.uk
                    [6] =>  DNS:*.googleforveterans.com
                    [7] =>  DNS:*.googletraveladservices.com
                    [8] =>  DNS:*.personfinder.google.org
                    [9] =>  DNS:*.quickoffice.com
                    [10] =>  DNS:*.quoteproxy.beatthatquote.com
                    [11] =>  DNS:*.schemer.com
                    [12] =>  DNS:*.screenwisetrendspanel.com
                    [13] =>  DNS:*.shibboleth.tv
                    [14] =>  DNS:*.staging.widevine.com
                    [15] =>  DNS:*.uat.widevine.com
                    [16] =>  DNS:*.widevine.com
                    [17] =>  DNS:*.youtubemobilesupport.com
                    [18] =>  DNS:chrome.com
                    [19] =>  DNS:gbc.beatthatquote.com
                    [20] =>  DNS:google.org
                    [21] =>  DNS:googleapps.com
                    [22] =>  DNS:googlecompare.co.uk
                    [23] =>  DNS:googletraveladservices.com
                    [24] =>  DNS:quoteproxy.beatthatquote.com
                    [25] =>  DNS:schemer.com
                    [26] =>  DNS:screenwisetrendspanel.com
                    [27] =>  DNS:youtubemobilesupport.com
                )

        )

    [x-certificate] => Array
        (
            [$] => Certificate -> Certificate Signature Value
            [base64] => -----BEGIN CERTIFICATE-----
MIIGxjCCBa6gAwIBAgIISmjtyn/YPZAwDQYJKoZIhvcNAQEFBQAwSTELMAkGA1UE
BhMCVVMxEzARBgNVBAoTCkdvb2dsZSBJbmMxJTAjBgNVBAMTHEdvb2dsZSBJbnRl
cm5ldCBBdXRob3JpdHkgRzIwHhcNMTMxMTA2MTQwMzI2WhcNMTQwMzA2MDAwMDAw
WjBpMQswCQYDVQQGEwJVUzETMBEGA1UECAwKQ2FsaWZvcm5pYTEWMBQGA1UEBwwN
TW91bnRhaW4gVmlldzETMBEGA1UECgwKR29vZ2xlIEluYzEYMBYGA1UEAwwPbWlz
Yy5nb29nbGUuY29tMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAkseP
gKe6YKglt+TqoQtF7TFxuWSPhWQRPASBK1uQRA2x83CBd4LbwxGajtrl35m+sFXt
vQoWuYGZnUUIwQ0yjz0YeOYjGxOK/q6PW4qrPrhjbGmIoaFsdn8+9BpWjfhCUkw5
aYMIsg2OAx2FS6BXeUBx0CfrC3yTyfruKcoQbGWvCU+NDBFI8+Sk1gIfBwk88nEy
XuoPQ92rScIqHsr6nhG/davI85B8YzPYW+k9+vsAFPpTJaEbagzQIv18REhvuOZe
Y+A9M0gWv9tcUDt5adMG58N9YjFA/S8rJhuJXC2qqMVKI2jMrygBckgQWdECPUVz
9rCrWMPqELGCrIVtCQIDAQABo4IDkDCCA4wwHQYDVR0lBBYwFAYIKwYBBQUHAwEG
CCsGAQUFBwMCMIICZgYDVR0RBIICXTCCAlmCD21pc2MuZ29vZ2xlLmNvbYIMKi5j
aHJvbWUuY29tghcqLmdiYy5iZWF0dGhhdHF1b3RlLmNvbYIMKi5nb29nbGUub3Jn
ghAqLmdvb2dsZWFwcHMuY29tghUqLmdvb2dsZWNvbXBhcmUuY28udWuCFyouZ29v
Z2xlZm9ydmV0ZXJhbnMuY29tghwqLmdvb2dsZXRyYXZlbGFkc2VydmljZXMuY29t
ghkqLnBlcnNvbmZpbmRlci5nb29nbGUub3JnghEqLnF1aWNrb2ZmaWNlLmNvbYIe
Ki5xdW90ZXByb3h5LmJlYXR0aGF0cXVvdGUuY29tgg0qLnNjaGVtZXIuY29tghsq
LnNjcmVlbndpc2V0cmVuZHNwYW5lbC5jb22CDyouc2hpYmJvbGV0aC50doIWKi5z
dGFnaW5nLndpZGV2aW5lLmNvbYISKi51YXQud2lkZXZpbmUuY29tgg4qLndpZGV2
aW5lLmNvbYIaKi55b3V0dWJlbW9iaWxlc3VwcG9ydC5jb22CCmNocm9tZS5jb22C
FWdiYy5iZWF0dGhhdHF1b3RlLmNvbYIKZ29vZ2xlLm9yZ4IOZ29vZ2xlYXBwcy5j
b22CE2dvb2dsZWNvbXBhcmUuY28udWuCGmdvb2dsZXRyYXZlbGFkc2VydmljZXMu
Y29tghxxdW90ZXByb3h5LmJlYXR0aGF0cXVvdGUuY29tggtzY2hlbWVyLmNvbYIZ
c2NyZWVud2lzZXRyZW5kc3BhbmVsLmNvbYIYeW91dHViZW1vYmlsZXN1cHBvcnQu
Y29tMGgGCCsGAQUFBwEBBFwwWjArBggrBgEFBQcwAoYfaHR0cDovL3BraS5nb29n
bGUuY29tL0dJQUcyLmNydDArBggrBgEFBQcwAYYfaHR0cDovL2NsaWVudHMxLmdv
b2dsZS5jb20vb2NzcDAdBgNVHQ4EFgQUYF1FyUlSrLQkYIaGMPHWauz82UYwDAYD
VR0TAQH/BAIwADAfBgNVHSMEGDAWgBRK3QYWG7z2aLV29YG2u2IaulqBLzAXBgNV
HSAEEDAOMAwGCisGAQQB1nkCBQEwMAYDVR0fBCkwJzAloCOgIYYfaHR0cDovL3Br
aS5nb29nbGUuY29tL0dJQUcyLmNybDANBgkqhkiG9w0BAQUFAAOCAQEAYsCnVhWP
xlsUOnEHCYA0rOPOyyQA2UDOB2JQTb0cs4pWB5V6jgI44GUbgw00+u/s28USAzo6
XWh9ENHtq+dZJTxLgugSrClpxu+RwFmU0+KSVTvm5d7x5QA4PMrfcCZ//gxFLWSn
pCulrrtS0USQLDVJtZnXwat6KTqtwIyqwcTCta7yJR7Yk8SBSzt/SjZC9b2L5peq
d9eR9iYKGeBisE4AXimH1Iiz9BXFSbHMw6iMw3zTM7nRA07jk47TL4K1j90K+VDi
SauQsJZ0oMwsYfGhPbHKmZJZintIBIxETPnQZh/YMFxYTeDR4+HTt9ACLAykdabZ
jIwuAaSrwXMaYg==
-----END CERTIFICATE-----

            [hex] => 62c0a756158fc65b143a7107098034ace3cecb2400d940ce0762504dbd1cb38a
5607957a8e0238e0651b830d34faefecdbc512033a3a5d687d10d1edabe75925
3c4b82e812ac2969c6ef91c05994d3e292553be6e5def1e500383ccadf70267f
fe0c452d64a7a42ba5aebb52d144902c3549b599d7c1ab7a293aadc08caac1c4
c2b5aef2251ed893c4814b3b7f4a3642f5bd8be697aa77d791f6260a19e062b0
4e005e2987d488b3f415c549b1ccc3a88cc37cd333b9d1034ee3938ed32f82b5
8fdd0af950e249ab90b09674a0cc2c61f1a13db1ca9992598a7b48048c444cf9
d0661fd8305c584de0d1e3e1d3b7d0022c0ca475a6d98c8c2e01a4abc1731a62
        )

    [subject-public-key-info] => Array
        (
            [rsa] => Array
                (
                    [$] => Certificate -> Subject Public Key Info -> Subject's Public Key
                    [base64] => ksePgKe6YKglt+TqoQtF7TFxuWSPhWQRPASBK1uQRA2x83CBd4LbwxGajtrl35m+
sFXtvQoWuYGZnUUIwQ0yjz0YeOYjGxOK/q6PW4qrPrhjbGmIoaFsdn8+9BpWjfhC
Ukw5aYMIsg2OAx2FS6BXeUBx0CfrC3yTyfruKcoQbGWvCU+NDBFI8+Sk1gIfBwk8
8nEyXuoPQ92rScIqHsr6nhG/davI85B8YzPYW+k9+vsAFPpTJaEbagzQIv18REhv
uOZeY+A9M0gWv9tcUDt5adMG58N9YjFA/S8rJhuJXC2qqMVKI2jMrygBckgQWdEC
PUVz9rCrWMPqELGCrIVtCQ==
                    [hex] => 92c78f80a7ba60a825b7e4eaa10b45ed3171b9648f8564113c04812b5b90440d
b1f370817782dbc3119a8edae5df99beb055edbd0a16b981999d4508c10d328f
3d1878e6231b138afeae8f5b8aab3eb8636c6988a1a16c767f3ef41a568df842
524c39698308b20d8e031d854ba057794071d027eb0b7c93c9faee29ca106c65
af094f8d0c1148f3e4a4d6021f07093cf271325eea0f43ddab49c22a1ecafa9e
11bf75abc8f3907c6333d85be93dfafb0014fa5325a11b6a0cd022fd7c44486f
b8e65e63e03d334816bfdb5c503b7969d306e7c37d623140fd2f2b261b895c2d
aaa8c54a2368ccaf280172481059d1023d4573f6b0ab58c3ea10b182ac856d09
                )

        )

)
```
