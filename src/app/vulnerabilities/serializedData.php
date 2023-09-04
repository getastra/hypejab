<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/serialized-data',
    function (Request $request, Response $response, $args) {

        $response->getBody()->write('<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serialized Data</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="post">
        <input type="text" name="uname" id="uname" placeholder="username"><br><br>
        <input type="password" name="pword" id="pword" placeholder="password"><br>
        <input type="hidden" name="isAdmin" value="rO0ABXNyABFqYXZhLmxhbmcuSW50ZWdlchLioKT3gYc4AgABSQAFdmFsdWV4cgAQamF2YS5sYW5nLk51bWJlcoaslR0LlOCLAgAAeHAAAAAH"><br>
        <input type="hidden" name="isTeacher" value="b:0;"><br>
        <input type="hidden" name="rememberMe" value="gANYCAAAAFhxRExaRm9GcQAu"><br>
        <input type="submit" value="submit"><br>
    </form>
</body>
</html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->post(
    '/serialized-data',
    function (Request $request, Response $response, $args) {

        $response->getBody()->write('<p>logged in: a:3:{i:0;s:3:"Red";i:1;s:5:"Green";i:2;s:4:"Blue";}</p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);