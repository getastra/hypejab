<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/log4j?val=boat',
    function (Request $request, Response $response, $args) {

        $query = $request->getQueryParams()['val'];
        echo $query;
        $data = "GET Log4j in use";

        if (strpos($query, 'jndi') !== false) {
            $pos = strpos($query,"boat.") + 5;
            $domain = $domain = substr($query, $pos, -3);
            echo $domain;

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

$app->get(
    '/log4j',
    function (Request $request, Response $response) {

        $header = $request->getHeader('User-Agent');
        $query = $request->getQueryParams()['val'];
        echo $query;
        $data = "Log4j in use";
        
        if (strpos($header[0], 'jndi') !== false) {
            $domain = substr($header[0], 13, -1);
            echo $domain;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, "http://".$domain);
            $data = curl_exec($ch);
            curl_close($ch);

        } else if (strpos($query, 'jndi') !== false) {
            $pos = strpos($query,"val.");
            $domain = $domain = substr($query, $pos, -1);
            echo $domain;

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