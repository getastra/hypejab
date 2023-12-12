<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/fp/session',
    function (Request $request, Response $response) {
        $response->getBody()->write('<p>Session token False Positive</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/temp?auth=1234567890',
    function (Request $request, Response $response) {
        $response->getBody()->write('<p>Session token True Positive</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);