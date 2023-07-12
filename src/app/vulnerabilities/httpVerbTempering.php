<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$app->get(
    '/http-verb-tempering?filename=a',
    function (Request $request, Response $response, array $args) {
        $response->getBody()->write('
        <h1>API Key Scanner</h1>
        <p>
        Denied
        for '.$_REQUEST['filename'].'</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/http-verb-tempering',
    function (Request $request, Response $response, array $args) {
        $response->getBody()->write('
        <h1>API Key Scanner</h1>
        <p>
        Denied
        for '.$_REQUEST['filename'].'</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->post(
    '/http-verb-tempering',
    function (Request $request, Response $response, array $args) {
        $response->getBody()->write('
        <h1>API Key Scanner</h1>
        <p>
        Successful
        for '.$_POST['filename'].'</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);