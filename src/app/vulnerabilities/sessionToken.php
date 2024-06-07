<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/session?phpsessid=1234567890',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('<p>some session ID</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/session',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        if (isset($_SESSION['redirect'])) {
            header("Location: /loginPoll");
            die();
        } else {
            $response->getBody()->write('<p>some session ID</p>');
        }
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);