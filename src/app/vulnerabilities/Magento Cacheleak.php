<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/var/resource_config.json',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('{"media_directory":"\/home\/goku\/public_html\/pub\/media\/","allowed_resources":["css","css_secure","js","theme","favicon","logo","email","wysiwyg","tmp","media\/catalog\/product\/cache\/","catalog","custom_options","captcha","dhl"],"update_time":"3600"}');
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(200);
    }
);
