<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/cloudStorageAcl',
    function (Request $request, Response $response) {

        $response->getBody()->write("<html>
    <head>
        <title>404 Not Found</title>
    </head>
    <body>
        <a href='https://sajke-sawarke.s3.amazonaws.com/'>Looks like you are lost. Go back home.</a>
        <a href='https://lollipop-lagelu.s3.us-east-1.amazonaws.com/'>Looks like you are lost. Go back home.</a>
    </body>
</html>");
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(404);
    }
);