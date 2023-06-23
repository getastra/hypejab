<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/session-id-modification-auth-bypass',
    function (Request $request, Response $response, $args) {
        require __DIR__ . '/../login/checkSession.php';

        $cookieB64Decode = base64_decode($_COOKIE["AUTH"]);
        $cookieJsonDecode = json_decode($cookieB64Decode);
        $authCookieUser = $cookieJsonDecode->user;
        $authCookieRole = $cookieJsonDecode->role;

        if ($authCookieRole == "admin") {
            $isAdmin = TRUE;
        } else {
            $isAdmin = FALSE;
        }

        if($isAdmin) {
            $response->getBody()->write('
            <html>
                <head>
                    <title>SESSION ID MODIFICATION AUTH BYPASS</title>
                    <style>
                        h1{font-family: sans-serif;}
                    </style>
                </head>
                <body>
                    <h1>WE USE SECURE SESSION IDs</h1>
                    <h4> Welcome ' . $authCookieUser . '</h4>
                    <p> Role - ' . $authCookieRole . '</p>
                    <h2> Manage users </h2>
                    <table>
                        <tr>
                            <th> Peter </th>
                            <td> <button>Delete</button> </td>
                            <td> <button>Promote to admin</button> </td>
                        </tr>
                        <tr>
                            <th> Carlos </th>
                            <td> <button>Delete</button> </td>
                            <td> <button>Promote to admin</button> </td>
                        </tr>
                    </table>
                </body>
            </html>
                ');
        } else {
            $response->getBody()->write('
            <html>
                <head>
                    <title>SESSION ID MODIFICATION AUTH BYPASS</title>
                    <style>
                        h1{font-family: sans-serif;}
                    </style>
                </head>
                <body>
                    <h1>WE USE SECURE SESSION IDs</h1>
                    <h4> Welcome ' . $authCookieUser . '</h4>
                    <p> Role - ' . $authCookieRole . '</p>
                </body>
            </html>
                ');
        }
        
        return $response->withHeader("content-type", "text/html")
                    ->withStatus(200);
        
    }
);