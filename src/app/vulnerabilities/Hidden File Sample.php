<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/FileZilla.xml',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $xml = file_get_contents(__DIR__ . "/../resources/FileZilla.xml");
        $response->getBody()->write($xml);
        return $response->withHeader("content-type", "application/xml")
                        ->withStatus(200);
    }
);