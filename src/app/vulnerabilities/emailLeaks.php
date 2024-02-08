<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/user-emails', 
    function (Request $request, Response $response) {
        $response->getBody()->write('
            <p>testmail@hypejab.com</p>
            <p>adminmail@hypejab.com</p>
            <p>superadmin@hypejab.com</p>
            <p>adminmail@hypejab.com</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);