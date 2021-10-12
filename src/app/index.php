<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/** @var $app */

$app->get(
    '/',
    function (Request $request, Response $response, array $args) {
       
        $expected_key = "attachment_id";
        $expected_value = "100";
        $query_params = $request->getQueryParams();
        
        foreach ($query_params as $key => $value) {
            
            if ($key == $expected_key && $value == $expected_value) {
                $html = file_get_contents(__DIR__ . "/resources/wp-media-enum/attachment_id.html");
                $response->getBody()->write($html);
                return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
            }
        }
        
        $response->getBody()->write(
            "Welcome to HypeJab! 💉 😃 <br>"
            ."HypeJab is a deliberately vulnerable web application"
            ." intended for benchmarking automated scanners."
        );

        return $response;
    }
);

$app->get(
    '/favicon.ico',
    function (Request $request, Response $response, array $args) {
        return $response->withHeader(
            'Location',
            "/favicon.gif"
        )->withStatus(302);
    }
);