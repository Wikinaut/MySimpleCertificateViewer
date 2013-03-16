MySimpleCertViewer
==================

MySimpleCertViewer - a simple server certificate viewer in PHP.

#### References
* http://stackoverflow.com/questions/6426927/php-ssl-certificate-fingerprint
* http://kubieziel.de/blog/archives/1484-Fingerprints-von-SSL-Seiten-pruefen.html

#### Example output for www.cacert.org
```
MySimpleCertViewer

source code on GitHub

Certificate data for https://www.cacert.org:443 (x-fields added by the viewer)

Array
(
    [x-server-port] => www.cacert.org:443
    [x-server] => www.cacert.org
    [x-port] => 443
    [x-fingerprints] => Array
        (
            [sha1] => 2164c049b001b7a84e459ba6f0d7ef232cfcad58
            [sha256] => 3d8b7e2b565d9fc45eff89482098c2b0a03e3a4e12804978dbb37da3e0c65d63
            [md5] => 6cbcd679bef2e32a1874bd2d3dc91457
        )

    [name] => /C=AU/ST=NSW/L=Sydney/O=CAcert Inc./CN=www.cacert.org
    [subject] => Array
        (
            [C] => AU
            [ST] => NSW
            [L] => Sydney
            [O] => CAcert Inc.
            [CN] => www.cacert.org
        )

    [hash] => c1df002e
    [issuer] => Array
        (
            [O] => Root CA
            [OU] => http://www.cacert.org
            [CN] => CA Cert Signing Authority
            [emailAddress] => support@cacert.org
        )

    [version] => 2
    [serialNumber] => 766918
    [validFrom] => 120506184641Z
    [validTo] => 140506184641Z
    [validFrom_time_t] => 1336330001
    [validTo_time_t] => 1399402001
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
                    [0] => 
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
            [basicConstraints] => CA:FALSE
            [extendedKeyUsage] => TLS Web Client Authentication, TLS Web Server Authentication, Netscape Server Gated Crypto, Microsoft Server Gated Crypto
            [keyUsage] => Digital Signature, Key Encipherment
            [authorityInfoAccess] => OCSP - URI:http://ocsp.cacert.org/

            [subjectAltName] => DNS:www.cacert.org, DNS:secure.cacert.org, DNS:wwwmail.cacert.org, DNS:cacert.org, DNS:www.cacert.net, DNS:cacert.net, DNS:www.cacert.com, DNS:cacert.com
        )

    [x-certificate-base64] => -----BEGIN CERTIFICATE-----
MIIFZDCCA0ygAwIBAgIDC7PGMA0GCSqGSIb3DQEBBQUAMHkxEDAOBgNVBAoTB1Jv
b3QgQ0ExHjAcBgNVBAsTFWh0dHA6Ly93d3cuY2FjZXJ0Lm9yZzEiMCAGA1UEAxMZ
Q0EgQ2VydCBTaWduaW5nIEF1dGhvcml0eTEhMB8GCSqGSIb3DQEJARYSc3VwcG9y
dEBjYWNlcnQub3JnMB4XDTEyMDUwNjE4NDY0MVoXDTE0MDUwNjE4NDY0MVowWzEL
MAkGA1UEBhMCQVUxDDAKBgNVBAgTA05TVzEPMA0GA1UEBxMGU3lkbmV5MRQwEgYD
VQQKEwtDQWNlcnQgSW5jLjEXMBUGA1UEAxMOd3d3LmNhY2VydC5vcmcwggEiMA0G
CSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQDeNSAxSFtymeN6rQD69eXIJEnCCP7Z
24/fdOgxRDSBhfQDUVhdmsuDOvuziOoWGqRxZPcWdMEMRcJ5SrA2aHIstvnaLhUl
xp2fuaeXx9XMCJ9ZmzHZbH4wqLaU+UlhcSsdkPzapf3N3HaUAW8kT4bHEGzObYVC
UBxxhpY01EoGRQmnFojzLNF3+0O1npQzXg5MeIWHW/Z+9jE+6odL6IXgg1bvrP4d
FgoveTcG6BmJu+50RwHaUad7hQuNeS+pNsVzCiDdMF2qoCQXtAGhnEQ9/KHpBD2z
ISBVIyEbYxdyU/WxnkaOof63Mf/TAgMNzVN9duqEtFyvvMrQY1XkBBwfAgMBAAGj
ggERMIIBDTAMBgNVHRMBAf8EAjAAMDQGA1UdJQQtMCsGCCsGAQUFBwMCBggrBgEF
BQcDAQYJYIZIAYb4QgQBBgorBgEEAYI3CgMDMAsGA1UdDwQEAwIFoDAzBggrBgEF
BQcBAQQnMCUwIwYIKwYBBQUHMAGGF2h0dHA6Ly9vY3NwLmNhY2VydC5vcmcvMIGE
BgNVHREEfTB7gg53d3cuY2FjZXJ0Lm9yZ4IRc2VjdXJlLmNhY2VydC5vcmeCEnd3
d21haWwuY2FjZXJ0Lm9yZ4IKY2FjZXJ0Lm9yZ4IOd3d3LmNhY2VydC5uZXSCCmNh
Y2VydC5uZXSCDnd3dy5jYWNlcnQuY29tggpjYWNlcnQuY29tMA0GCSqGSIb3DQEB
BQUAA4ICAQA2+uCGX18kZD8gyfj44TlwV4TXJ5BrT0M9qogg2k5u057i+X2ePy3D
iE2REyLkU+i5ekH5gvTl74uSJKtpSf/hMyJEByyPyIULhlXCl46z2Z60drYzO4ig
apCdkm0JthVGvk6/hjdaxgBGhUvSTEP5nLNkDa+uYVHJI58wfX2oh9gqxf8VnMJ8
/A8Zi6mYCWUlFUobNd/ozyDZ6WVntrLib85sAFhds93nkoUYxgx1N9Xg/I31/jcL
6bqmpRAZcbPtvEom0RyqPLM+AOgySWiYbg1Nl8nKx25C2AuXk63NN4CVwkXpdFF3
q5qk1izPruvJ68jNW0pG7nrMQsiY2BCesfGyEzY8vfrMjeR5MLNv5r+obeYFnC1j
uYp6JBt+thW+xPFzHYLjohKPwo/NbMOjIUM9gv/Pq3rVRPgWru4/8yYWhrmEK370
rtlYBUSGRUdR8xed1Jvs+4qJ3s9t41mLSXvUfwyPsT7eoloUAfw3RhdwOzXoC2P6
ftmniyu/b/HuYH1AWK+HFtFi9CHiMIqOJMhj/LnzL9udrQOpir7bVej/mlb3kSRo
2lZymKOvuMymMpJkvBvUU/QEbCxWZAkTyqL2qlcQhHv7W366DOFjxDqpthaTRD69
T8i/2AnsBDjYFxa47DisIvR57rLmE+fILjSvd94N/IpGs3lSOS5JeA==
-----END CERTIFICATE-----

)
```

