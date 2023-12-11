<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/_config',
    function (Request $request, Response $response) {
        $response->getBody()->write('<h1>couchdb api httpd</h1>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
