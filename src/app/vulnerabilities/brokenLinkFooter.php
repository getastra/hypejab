<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/broken-footer',
    function (Request $request, Response $response) {
        $response->getBody()->write('<footer><p>https://www.youtube.com/@tempbrokenlink<p></footer>');
        return $response->withHeader("content-type", "text/html")
        ->withStatus(200);
    }
);