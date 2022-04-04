<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/parameter-modification-auth-bypass',
    function (Request $request, Response $response, $args) {
        require __DIR__ . '/../login/checkSession.php';
        if (isset($request->getQueryParams()['isLoggedIn'])) {
            $query = $request->getQueryParams()['isLoggedIn'];
        }

        $h1 = "Un-authenticated";

        if (isset($request->getQueryParams()['isLoggedIn']) && $query == "true") {
            $h1 = "Authenticated";
        }

        $response->getBody()->write('
<html>
    <head>
        <title>PARAMETER MODIFICATION AUTH BYPASS</title>
        <style>
            h1{font-family: sans-serif;}
        </style>
    </head>
    <body>
        <h1>'. $h1 .'</h1>
    </body>
</html>
    ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/parameter-modification-auth-bypass?isLoggedIn=false',
    function (Request $request, Response $response, $args) {
        require __DIR__ . '/../login/checkSession.php';
        if (isset($request->getQueryParams()['isLoggedIn'])) {
            $query = $request->getQueryParams()['isLoggedIn'];
        }

        $h1 = "Un-authenticated";

        if (isset($request->getQueryParams()['isLoggedIn']) && $query == "true") {
            $h1 = "Authenticated";
        }

        $response->getBody()->write('
<html>
    <head>
        <title>PARAMETER MODIFICATION AUTH BYPASS</title>
        <style>
            h1{font-family: sans-serif;}
        </style>
    </head>
    <body>
        <h1>'. $h1 .'</h1>
    </body>
</html>
    ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);