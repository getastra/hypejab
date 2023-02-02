<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/text4shell?search=kurama',
    function (Request $request, Response $response, $args) {

        $query = '';
        if (isset($request->getQueryParams()['search'])) {
            $query = urldecode($request->getQueryParams()['search']);
        }
        $data = "<h1>Search results for: " . $query . "</h1>";

        $pattern = '/\$\{(url|dns)\:(UTF-8\:)?[^\}]+\}/i';

        if (preg_match($pattern, $query)) {
            $query = explode(":", substr($query, 2, -1));
            if ($query[0] == "url") {
                $domain = $query[2] . ":" . $query[3];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $domain);
                $response_data = curl_exec($ch);
                curl_close($ch);
            }

        }

        $response->getBody()->write($data);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/text4shell',
    function (Request $request, Response $response) {

        $query = '';
        if (isset($request->getQueryParams()['search'])) {
            $query = urldecode($request->getQueryParams()['search']);
        }
        $data = "<h1>Search results for: " . $query . "</h1>";

        $pattern = '/\$\{(url|dns)\:(UTF-8\:)?[^\}]+\}/i';

        if (preg_match($pattern, $query)) {
            $query = explode(":", substr($query, 2, -1));
            if ($query[0] == "url") {
                $domain = $query[2] . ":" . $query[3];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $domain);
                $response_data = curl_exec($ch);
                curl_close($ch);
            }

        }

        $response->getBody()->write($data);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);