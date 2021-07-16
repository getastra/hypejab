<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/** @var $app */

$app->get(
    '/',
    function (Request $request, Response $response, array $args) {
        $response->getBody()->write(
            "Welcome to HypeJab! 💉 😃 <br>"
            ."HypeJab is a deliberately vulnerable web application"
            ." intended for benchmarking automated scanners."
        );

        return $response;
    }
);

$app->get(
    '/favicon.ico',
    function (Request $request, Response $response, array $args) {
        return $response->withHeader(
            'Location',
            "/favicon.gif"
        )->withStatus(302);
    }
);