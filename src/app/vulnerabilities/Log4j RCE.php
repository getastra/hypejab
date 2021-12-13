<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/log4j',
    function (Request $request, Response $response) {

        $header = $request->getHeader('User-Agent');
        print_r($header);
        $domain = substr($header[0], 13, -1);
        echo $domain;
        $data = "Log4j in use";
        
        if (strpos($header[0], 'jndi') !== false) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, "http://".$domain);
            $data = curl_exec($ch);
            curl_close($ch);
        }
        
        $response->getBody()->write($data);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);