<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/source-disclosure',
    function (Request $request, Response $response) {
        $response->getBody()->write("select db_name() as db_name from world;");
        return $response->withHeader("content-type", "text/plain")
                        ->withStatus(200);
    }
); 