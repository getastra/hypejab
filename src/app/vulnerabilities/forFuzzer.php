<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/administrator/AdminTools',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $value = isset($_GET['search'])?$_GET['search']:"";
        $response->getBody()->write("Welcome to the hidden world ".$value);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/administrator',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write("Forbidden World");
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(403);
    }
);
