<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/.git-credentials',
    function (Request $request, Response $response) {
        $response->getBody()->write('https://user:pass@example.com');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);