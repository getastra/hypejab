<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/_next/',
    function (Request $request, Response $response) {
        $response->getBody()->write('<html>
<head>
    <title> Punisher </title>
    <style>
        h1 {
            text-align: center;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        body {
            background-color: #111;
            color: white;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <h1> The Punisher </h1>
    <img src="https://images.hdqwalls.com/wallpapers/thumb/punisher-fanart-g8.jpg" class="center">
</body>
        </html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/_next\..\..\..\..\..\..\..\..\..\etc\passwd',
    function (Request $request, Response $response) {
        $response->getBody()->write('<html>
<head>
    <title> Punisher </title>
    <style>
        h1 {
            text-align: center;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        body {
            background-color: #111;
            color: white;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <h1> The Punisher </h1>
    <img src="https://images.hdqwalls.com/wallpapers/thumb/punisher-fanart-g8.jpg" class="center">
    <p>
root:x:0:0:root:/root:/bin/bash
daemon:x:1:1:daemon:/usr/sbin:/usr/sbin/nologin
bin:x:2:2:bin:/bin:/usr/sbin/nologin
sys:x:3:3:sys:/dev:/usr/sbin/nologin
sync:x:4:65534:sync:/bin:/bin/sync
games:x:5:60:games:/usr/games:/usr/sbin/nologin
man:x:6:12:man:/var/cache/man:/usr/sbin/nologin
lp:x:7:7:lp:/var/spool/lpd:/usr/sbin/nologin
mail:x:8:8:mail:/var/mail:/usr/sbin/nologin
news:x:9:9:news:/var/spool/news:/usr/sbin/nologin
    </p>
</body>
        </html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);