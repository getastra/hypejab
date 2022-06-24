<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/thisMostProbablyDoesNotExist',
    function (Request $request, Response $response) {
        $response->getBody()->write('404 Not Found');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);