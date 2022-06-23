<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/api/v1/user/me',
    function (Request $request, Response $response) {
        $response->getBody()->write('{"name":"Akabane Karma","age":14,"birthday":"December 25"}');
        return $response->withHeader("content-type", "application/json")
                        ->withHeader("X-Content-Type-Options", "nosniff")
                        ->withHeader("Strict-Transport-Security", "max-age=63072000")
                        ->withStatus(200);
    }
);