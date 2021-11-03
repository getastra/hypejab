<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/s3-buckets',
    function (Request $request, Response $response) {
        $response->getBody()->write('<html>
    <head>
        <title>S3 Buckets</title>
    </head>
    <body>
        <h1>Astra</h1>
        <!-- https://s3.amazonaws.com/gregory -->
        <!-- https://adhelp-test.s3.amazonaws.com/ -->
        <h2> It is really important to secure your digital assets like S3 buckets. </h2>
        <h3> Take a step towards security, take a step towards Astra. </h3>
    </body>
</html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);