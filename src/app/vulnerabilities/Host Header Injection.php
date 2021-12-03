<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get(
    '/host-header-injection/redirect',
    function (Request $request, Response $response, array $args) {
        require __DIR__ . '/../login/checkSession.php';
        return $response->withHeader(
            'Location',
            "http://{$_SERVER['HTTP_HOST']}"
        )->withStatus(302);
    }
);

$app->get(
    '/host-header-injection/html-poisoning',
    function (Request $request, Response $response, array $args) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write(
            "Click <a href = http://{$_SERVER['HTTP_HOST']}>here</a> for treats."
        );

        return $response;
    }
);