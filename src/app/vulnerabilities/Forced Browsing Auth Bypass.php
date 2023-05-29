<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/Forced-Browsing-Admin/',
    function (Request $request, Response $response, $args) {
        $response->getBody()->write('
<html>
    <head>
        <title>FORCED BROWSING AUTH BYPASS</title>
        <style>
            ul{list-style-type:none}h1{text-align:center}body{font-family:sans-serif}td,th,tr{text-align:left}
        </style>
    </head>
    <body>
        <h1>Admin Panel</h1>
    </body>
</html>
    ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);