<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/telescope',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        <strong>Laravel</strong> Telescope
        ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);