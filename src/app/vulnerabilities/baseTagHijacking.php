<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/base-tag-hijacking',
    function (Request $request, Response $response, $args) {
        require __DIR__ . '/../login/checkSession.php';
        $query = $request->getQueryParams()['val'];
        $response->getBody()->write('
        <html>
            <head>
                <title>Base Tag Hijacking</title>
                <base href="' . $query .'" target="_blank">
                <style>
                    body {
                        background-color: #111;
                    }
                    a {
                        text-align: center;
                        color: white;
                        font-family: sans-serif;
                        text-decoration: none;
                    }
                    img {
                        border: 2px solid lime;
                    }
                </style>
            </head>
            <body>
                <img src="resources/images/goodbye.jpeg" alt="Goodbye Friend" style="display: block; margin: auto;">
                <a href="resources/images/goodbye.jpeg">Download image from our secure website</a>
            </body>
        </html>'
    );
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/base-tag-hijacking?val=nara',
    function (Request $request, Response $response, $args) {
        require __DIR__ . '/../login/checkSession.php';
        $query = $request->getQueryParams()['val'];
        $response->getBody()->write('
        <html>
            <head>
                <title>Base Tag Hijacking</title>
                <base href="' . $query .'" target="_blank">
                <style>
                    body {
                        background-color: #111;
                    }
                    a {
                        text-align: center;
                        color: white;
                        font-family: sans-serif;
                        text-decoration: none;
                    }
                    img {
                        border: 2px solid lime;
                    }
                </style>
            </head>
            <body>
                <img src="resources/images/goodbye.jpeg" alt="Goodbye Friend" style="display: block; margin: auto;">
                <a href="resources/images/goodbye.jpeg">Download image from our secure website</a>
            </body>
        </html>'
    );
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
