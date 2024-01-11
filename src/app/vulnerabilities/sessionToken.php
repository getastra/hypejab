<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/session',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $cookievalue = $request->getCookieParams()['PHPSESSID'];
        $response->getBody()->write('<p>Session token: </p><a href="/?PHPSESSID='.$cookievalue.'">Click here</a>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);