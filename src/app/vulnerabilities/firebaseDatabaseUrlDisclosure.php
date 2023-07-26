<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/firebase-db',
    function (Request $request, Response $response) {
        $response->getBody()->write('<p>Detect me:  https://test-project-7a1a0-default-rtdb.firebaseio.com/</p><br><p>https://hypejab-test-default-rtdb.asia-southeast1.firebasedatabase.app/</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);