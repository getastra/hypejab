<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/c7cbd039-22c0-46d8-ad50-507dc3514e72.txt',
    function (Request $request, Response $response) {
        $response->getBody()->write('Probely');
        return $response->withHeader("content-type", "text/plain")
                        ->withStatus(200);
    }
);
