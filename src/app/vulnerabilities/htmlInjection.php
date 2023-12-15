<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/html-injection?search=value',
    function (Request $request, Response $response) {
        $response->getBody()->write("Html Injection");
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/html-injection',
    function (Request $request, Response $response) {
        $value = isset($_GET['search'])?urldecode($_GET['search']):"";
        // echo preg_match('/[^a-zA-Z\d]/', $value);
        if (preg_match('/[^a-zA-Z\d]/', $value) && !str_contains($value,'<h1>Astra')) {
            $value="denied";
        }
        $response->getBody()->write("Html Injection: ".$value);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);