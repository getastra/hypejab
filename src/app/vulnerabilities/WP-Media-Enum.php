<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/wp/wp-content/uploads',
    function (Request $request, Response $response) {
        $html = file_get_contents(__DIR__ . "/../resources/wp-media-enum/uploads.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
); 


$app->get(
    '/wp/',
    function (Request $request, Response $response) {
        $expected_key = "attachment_id";
        $expected_value = "100";
        $query_params = $request->getQueryParams();
        
        foreach ($query_params as $key => $value) {
            
            if ($key == $expected_key && $value == $expected_value) {
                $html = file_get_contents(__DIR__ . "/../resources/wp-media-enum/attachment_id.html");
                $response->getBody()->write($html);
                return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
            }
        }
        
        $response->getBody()->write("<h1>404 Not Found</h1>");
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(404);
    
    }
); 

