<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/b4a4a31176e946ac6b982caa26a78c9f.txt',
    function (Request $request, Response $response) {
        $response->getBody()->write('Detectify');
        return $response->withHeader("content-type", "text/plain")
                        ->withStatus(200);
    }
);
