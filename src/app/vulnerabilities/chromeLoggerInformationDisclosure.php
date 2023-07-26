<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/chromephp-data',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('The fat man flies at midnight.');
        return $response->withHeader("content-type", "text/html")->withHeader("X-ChromePhp-Data", "passwordIs-Orochimaru")
                        ->withStatus(200);
    }
);

$app->get(
    '/chromelogger-data',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('The train goes backward through the tunnel.');
        return $response->withHeader("content-type", "text/html")->withHeader("X-ChromeLogger-Data", "highlySensitiveData")
                        ->withStatus(200);
    }
);