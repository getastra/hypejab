<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/fp/x-powered-by',
    function (Request $request, Response $response) {
        $response->getBody()->write('This page is a false positive for X-Powered-By Header Disclosure');
        return $response->withHeader("content-type", "text/html")
                        ->withHeader("X-Powered-By", "Express")
                        ->withStatus(200);
    }
);