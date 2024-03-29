<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/input-not-validated',
    function (Request $request, Response $response) {
        $data = [
            'next' => $request->getQueryParams()['next'],
        ];
        $dataJson = json_encode($data, JSON_PRETTY_PRINT);
        $response->getBody()->write($dataJson);
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(200);
    }
);
