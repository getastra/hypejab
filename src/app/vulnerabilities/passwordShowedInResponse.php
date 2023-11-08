<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/profile',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        <h1>My Profile</h1>
        <input type="email" value="say+my+name@bb.com" name="email" />
        <input type="text" value="heisenberg" name="password" />
        ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
