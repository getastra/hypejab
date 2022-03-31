<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

//Mocks authorized WebDAV instances, which return 401
$app->get(
    '/webdav/authorized',
    function (Request $request, Response $response) {
        $response->getBody()->write('<html>
            <head>
                <title>Authorized WebDAV Instance</title>
            <head>
            <body>
                <h2> Authorized WebDAV Instance <h2>

                <p> This page should return 401 </p>

            </body>
                    </html>');
        return $response->withHeader("content-type", "text/html")
            ->withStatus(401);
    }
);

//Mocks unauthorized (or post authorization) WebDAV instances, where PROPFIND returns 207, and OPTIONS might return PUT
$app->get(
    '/webdav/unauthorized',
    function (Request $request, Response $response) {

        $response->getBody()->write('<html>
            <head>
                <title>Unauthorized WebDAV Instance</title>
            <head>
            <body>
                <h2> Authorized WebDAV Instance <h2>

                <p> Send a PROPFIND request at this URL to get 207 status </p>
                <p> Send an OPTIONS request at this URL to see the allowed HTTP Methods in the Allow header</p>

            </body>
                    </html>');


        return $response->withHeader("content-type", "text/html")
            ->withStatus(207);
    }
);
$app->map(
    ['OPTIONS'],
    '/webdav/unauthorized',
    function ($request, $response, array $args) {
        return $response->withHeader("Allow", "OPTIONS PUT GET HEAD POST DELETE");
    }
);

$app->map(
    ['PROPFIND'],
    '/webdav/unauthorized',
    function ($request, $response, array $args) {
        return $response->withStatus(207);
    }
);
