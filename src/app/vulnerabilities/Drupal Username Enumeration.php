<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/user/1',
    function (Request $request, Response $response) {
        return $response->withHeader("location", "/user/admin")
                        ->withStatus(301);
    }
);

$app->get(
    '/user/2',
    function (Request $request, Response $response) {
        return $response->withHeader("location", "/user/karthik")
                        ->withStatus(301);
    }
);

$app->get(
    '/user/3',
    function (Request $request, Response $response) {
        return $response->withHeader("location", "/user/prince")
                        ->withStatus(301);
    }
);

$app->get(
    '/guest/password',
    function (Request $request, Response $response) {
        $response->getBody()->write("<h1>Forbidden</h1>");
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(403);
    }
);

$app->get(
    '/user/{name}',
    function (Request $request, Response $response, $args) {
        $response->getBody()->write("<h1>" . $args['name'] . "</h1>");
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
