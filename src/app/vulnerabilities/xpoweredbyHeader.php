<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/x-powered-by',
    function (Request $request, Response $response) {
        $response->getBody()->write('This page is the vuln page for X-Powered-By Header Disclosure');
        return $response->withHeader("content-type", "text/html")
                        ->withHeader("X-Powered-By", "Express/16.2.2")
                        ->withStatus(200);
    }
);