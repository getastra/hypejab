<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/api/swagger/docs/v2/swagger.json',
    function (Request $request, Response $response) {
        $response->getBody()->write('{
            "swagger": "3.0",
            "info": {
              "version": "8.0.0",
              "title": "SuiteCRM REST API (JSON API v1.0.0)",
              "contact": {
                "name": "Support",
                "url": "https://suitecrm.com/forum"
              },
              "description": "",
              "license": {
                "name": "GNU AFFERO GENERAL PUBLIC LICENSE VERSION 3",
                "url": "https://github.com/salesagility/SuiteCRM/blob/master/LICENSE.txt"
              }
            }}');
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(200);
    }
);