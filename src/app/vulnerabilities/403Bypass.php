<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/403-bypass',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $header = $request->getHeaderLine('X-Forwarded-Host');
        if ($header == '127.0.0.1') {
            $response->getBody()->write('Hemlo Hecker');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        } else {
            $response->getBody()->write('Forbidden' . $header);
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(403);
        }
    }
);

$app->post(
    '/403-bypass',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $cl = $request->getHeaderLine('Content-Length');
        if ($cl == '0') {
            $response->getBody()->write('Hemlo Hecker');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        } else {
            $response->getBody()->write('Forbidden');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(403);
        }
    }
);