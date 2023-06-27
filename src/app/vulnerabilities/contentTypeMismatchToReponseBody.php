<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/Mismatch-Content-Type-Header-to-Body/',
    function (Request $request, Response $response, $args) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('{
            "hello":"world"
        }');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);


$app->get(
    '/Unauthenticated-Mismatch-Content-Type-Header-to-Body/',
    function (Request $request, Response $response, $args) {
        $response->getBody()->write('{
            "hello":"world"
        }');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);