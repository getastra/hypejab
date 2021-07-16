<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/WebInterface/login.html',
    function (Request $request, Response $response) {
        $html = file_get_contents(__DIR__ . "/../resources/CrushFTP-WebInterface/index.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/WebInterface/logo.png',
    function (Request $request, Response $response, array $args) {
        return $response->withHeader(
            'Location',
            "/favicon.gif"
        )->withStatus(302);
    }
);