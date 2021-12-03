<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/wp-debug/',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('<b>Parse error</b> missing \')\' on line <b>189</b>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);