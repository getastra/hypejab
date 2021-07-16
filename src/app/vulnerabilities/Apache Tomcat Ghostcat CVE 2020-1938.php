<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get(
    '/conf/server.xml',
    function (Request $request, Response $response) {
        $xml = file_get_contents(__DIR__."/../resources/server.xml");
        $response->getBody()->write($xml);

        return $response->withHeader("content-type", "application/xml")
            ->withStatus(200);
    }
);