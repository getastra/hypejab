<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/file-upload',
    function (Request $request, Response $response, $args) {

        $response->getBody()->write('<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="post">
        <input type="file" name="profilePic" id="profilePic">
        <input type="text" name="fullName" id="fullName">
        <input type="submit" value="submit">
    </form>
</body>
</html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->post(
    '/file-upload',
    function (Request $request, Response $response, $args) {

        $response->getBody()->write('{"status":"success"}');
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(200);
    }
);