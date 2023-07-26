<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/bower.json',
    function (Request $request, Response $response) {
        $json = file_get_contents(__DIR__ . "/../resources/bower/bower.json");
        $response->getBody()->write($json);
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(200);
    }
);