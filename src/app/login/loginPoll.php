<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/loginPoll',
    function (Request $request, Response $response) {
        session_start();
        $now = time();
        if (isset($_SESSION['expire']) && $now > $_SESSION['expire']) {
            session_destroy();
        }

        if (isset($_SESSION['user'])) {
            $response->getBody()->write('
<h1 style="text-align:center;">Welcome! '.$_SESSION['user'].'</h1>
<img src="https://c.tenor.com/g2IzuWs8bpEAAAAC/breaking-bad-walter-white.gif" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        } else {
            $response->getBody()->write('<h1 style="text-align: center;">Please login first.</h1>');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        }
    }
);