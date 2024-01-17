<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/.git',
    function (Request $request, Response $response) {
        $html = '
        <!DOCTYPE HTML>
        <html lang="en">
        <head>
        <meta charset="utf-8">
        <title>Directory listing for /.git/</title>
        </head>
        <body>
        <h1>Directory listing for /.git/</h1>
        <hr>
        <ul>
        <li><a href="branches/">branches/</a></li>
        <li><a href="COMMIT_EDITMSG">COMMIT_EDITMSG</a></li>
        <li><a href="config">config</a></li>
        <li><a href="description">description</a></li>
        <li><a href="FETCH_HEAD">FETCH_HEAD</a></li>
        <li><a href="HEAD">HEAD</a></li>
        <li><a href="hooks/">hooks/</a></li>
        <li><a href="index">index</a></li>
        <li><a href="info/">info/</a></li>
        <li><a href="logs/">logs/</a></li>
        <li><a href="objects/">objects/</a></li>
        <li><a href="ORIG_HEAD">ORIG_HEAD</a></li>
        <li><a href="packed-refs">packed-refs</a></li>
        <li><a href="refs/">refs/</a></li>
        </ul>
        <hr>
        </body>
        </html>
        ';
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);