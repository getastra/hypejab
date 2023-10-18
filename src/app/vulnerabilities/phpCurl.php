<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/php-curl',
    function (Request $request, Response $response) {
        if (array_key_exists("load",$request->getQueryParams())) {
            $url = $request->getQueryParams()['load'];

            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $agent = 'curl/7.81.0';
                
                $ch = curl_init(); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);            
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_USERAGENT, $agent);
                
                $result = curl_exec($ch);
                
                echo $result;
            }

        }
        $response->getBody()->write('');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/php-curl?load=hello',
    function (Request $request, Response $response) {
        $response->getBody()->write('');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);