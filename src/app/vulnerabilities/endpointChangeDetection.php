<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/endpoint-change-detection',
    function (Request $request, Response $response) {
        $data = [
            'master_card' => $request->getHeaderLine('X-DELTA-TESTING') ? true : '5425 2334 3010 9903',
        ];

        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(200);
    }
);
