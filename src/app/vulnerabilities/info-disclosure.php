<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/info-disclosure?PAN=QLQPS1836D',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        Info disclosure in url');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/info-disclosure?PAN=QLQPS1836D',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        Info disclosure in url');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/info-disclosure',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        Info disclosure in url');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);