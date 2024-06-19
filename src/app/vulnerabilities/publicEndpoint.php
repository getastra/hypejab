<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get('/public-endpoint', function (Request $request, Response $response) {
    $data = [
        "hello" => "world"
    ];
    $json_data = json_encode($data, JSON_PRETTY_PRINT);
    $response->getBody()->write($json_data);
    return $response->withHeader("content-type", "application/json")
                    ->withStatus(200);
});

$app->post('/public-endpoint', function (Request $request, Response $response) {
    $response->getBody()->write('
        hello public');
    return $response->withHeader("content-type", "text/html")
                    ->withStatus(200);
});

$app->options('/public-endpoint', function (Request $request, Response $response) {
    $response->getBody()->write('');
    return $response->withHeader("content-type", "text/html")
                    ->withHeader("Access-Control-Allow-Methods", "GET, POST, OPTIONS")
                    ->withStatus(200);
});