<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$app->get(
    '/idor?user=1',
    function (Request $request, Response $response, array $args) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('
        <p>hi say+my+name@bb.com</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/idor',
    function (Request $request, Response $response, array $args) {
        if ($request->getMethod() == "GET") {
            require __DIR__ . '/../login/checkSession.php';
        }
        if ($request->getQueryParams()['user'] == 1) {
            $response->getBody()->write('
            <p>hi say+my+name@bb.com</p>');
        } else{
            $response->getBody()->write('
            <p>hi nonexist@bb.com</p>');
        }
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);