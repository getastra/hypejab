<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/fp/sqli',
    function (Request $request, Response $response) {

        $query = '';
        if (isset($request->getQueryParams()['search'])) {
            $query = urldecode($request->getQueryParams()['search']);
        }
        $data = "<h1>Search results for: " . $query . "</h1>";

        if (str_contains($query, "sleep")) {
            preg_match("/sleep\((\d+(?:\.\d+)?)\)/", $query, $matches);
            sleep($matches[1]);
        }

        $response->getBody()->write($data);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/fp/sqli?search=shampoo',
    function (Request $request, Response $response, $args) {

        $response->getBody()->write('');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);