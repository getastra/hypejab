<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/user-emails', 
    function (Request $request, Response $response) {
        $response->getBody()->write('
            <p>testmail@hypejab.com</p>
            <p>somemail@hypejab.com</p>
            <p>superman@hypejab.com</p>
            <p>astranaut@hypejab.com</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);