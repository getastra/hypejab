<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/mysql-username-disclosure',
    function (Request $request, Response $response) {
        $response->getBody()->write("
        <html>
            <head>
                <title>MySQL Username Disclosure</title>
                <style>
                    body {
                        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
                        background-size: 400% 400%;
                        animation: gradient 15s ease infinite;
                        height: 100vh;
                    }
                    
                    @keyframes gradient {
                        0% {
                            background-position: 0% 50%;
                        }
                        50% {
                            background-position: 100% 50%;
                        }
                        100% {
                            background-position: 0% 50%;
                        }
                    }

                    h1 {
                        font-family: Montserrat;
                        text-align: center;
                    }
        
                    a {
                        text-decoration: none;
                        font-size: 30px;
                        color: white;	
                        font-weight: lighter;
                        font-family: Montserrat;
                        text-align: center;
                    }
        
                    h5 {
                        margin-top: 250px;
                    }
                </style>
            </head>
            <body>
                <div class=\"d-flex flex-column justify-content-center w-100 h-100\">

                    <div class=\"d-flex flex-column justify-content-center align-items-center\">
                        <h1 class=\"fw-light text-white m-0\">The Fourth</h1>
                        </div>
                            <a href=\"https://www.google.com/search?q=minato+namikaze\" class=\"text-decoration-none\">
                                <h5 class=\"fw-light text-white m-0\">— Minato Namikaze —</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <!--
                Connection attributes of length 570 were truncated (76 bytes lost) for connection 30, user user@host (as user), auth: yes.
                'proxies_priv' entry '@% root@mariadb-3702996102-qbr18' ignored in --skip-name-resolve mode.
                Access denied for user 'yagami'@'tokyo'
                'user' entry 'pingu@master' ignored in --skip-name-resolve mode.
                Found invalid password for user: 'itachi@localhost'; Ignoring user
                'db' entry 'logaholicdb_host logaholic@localhost' had database in mixed case that has been forced to lowercase because lower_case_table_names is set. It will not be possible to remove this privilege using REVOKE.
                The operation \"DROP\" cannot be performed for user 'orochimaru'@'konohagakure' configured to connect without a password.
                Access denied for user 'goku'@'kamehouse'. Account is blocked for 12 day(s) (6 day(s) remaining) due to 4 consecutive failed logins. Use FLUSH PRIVILEGES or ALTER USER to reset.
                Unavailable public key with fingerprint something for user sheldon in tenancy something else
                Aborted connection 34 to db: 'secret_db' user: 'odin' host: 'valhalla' (something)
                -->
            </body>
        </html>
        ");
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
