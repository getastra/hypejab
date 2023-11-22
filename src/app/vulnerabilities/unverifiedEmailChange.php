<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/update-email',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        <h1>Change Email Address</h1>
        New Email Address
        <input type="email" />
        Confirm New Email Address
        <input type="email" />
        <button>Update</button>
        ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
