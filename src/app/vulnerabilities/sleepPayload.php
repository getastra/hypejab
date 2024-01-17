<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/sleep?search=a',
    function (Request $request, Response $response, array $args) {
        $response->getBody()->write('
        sleep');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/sleep',
    function (Request $request, Response $response, $args) {
        $query = '';
        $userAgent = $request->getHeaderLine('User-Agent');
        if (isset($request->getQueryParams()['search'])) {
            $query = urldecode($request->getQueryParams()['search']);
        } else {
            return $response->withStatus(400);
        }

        if (strpos($query, 'sleep') !== false) {
            $regex = '/(?<=sleep)[\s\W]?(\d+)/';
            $matches = [];
            preg_match($regex, $query, $matches);

            $sleepTime = intval($matches[1]);
            sleep($sleepTime);
        } elseif (strpos($userAgent, 'sleep') !== false) { // meant for shellshock detection
            $regex = '/(?<=sleep)[\s\W]?(\d+)/';
            $matches = [];
            preg_match($regex, $userAgent, $matches);

            $sleepTime = intval($matches[1]);
            sleep($sleepTime);
        }

        $data = [
            'search' => $query,
            'User-Agent' => $userAgent,
        ];
    
        $json = json_encode($data, JSON_PRETTY_PRINT);

        $response->getBody()->write($json);
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
);