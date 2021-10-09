<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/api-key-scanner',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        <h1>API Key Scanner</h1>
        <p>
        Aadhaar number = 0123 4567 8901<br>
        PAN Number = QLQPS1836D<br>
        Social Security Number = 078-05-1120<br>
        </p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
