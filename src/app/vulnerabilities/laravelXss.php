<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/_ignition/scripts/{attack}',
    function (Request $request, Response $response, $args) {
        $response->getBody()->write('
<html>
    <head>
        <title>UI</title>
    </head>
    <body>
        <!-- Comment for developer ' . $args['attack'] . ' -->
        <h2> •/-\• </h2>
    </body>
</html>
        ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);