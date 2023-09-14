<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

// 404 page with 200 status code
$app->get(
    '/page-not-found[/{segments:.*}]',
    function (Request $request, Response $response) {
        $response->getBody()->write('404 Not Found');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

// Reflected path 404 page with 200 status code
$app->get(
    '/reflected-page-not-found[/{segments:.*}]',
    function (Request $request, Response $response) {
        $response->getBody()->write('404 Not Found ' . htmlspecialchars($request->getUri()->getPath()));
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);