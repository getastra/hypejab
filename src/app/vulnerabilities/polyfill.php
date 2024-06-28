<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get('/polyfill', function (Request $request, Response $response) {
    $response->getBody()->write("<script src=https://cdn.polyfill.io></script><h1>helloWorld<h1>");
    return $response->withHeader("content-type", "text/html")
                    ->withStatus(200);
});