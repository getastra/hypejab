<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/serverPathDisclosure/windows',
    function (Request $request, Response $response) {
        $response->getBody()->write(
            "Error Body C://Inetpub/lynx/strawberry/perl/site/lib/Catalyst/Action/Deserialize/JSON.pm Error Body"
        );
        return $response->withHeader("content-type", "text/html")
            ->withStatus(200);
    }
);
$app->get(
    '/serverPathDisclosure/linux',
    function (Request $request, Response $response) {
        $response->getBody()->write(
            "Warning: session_start() [function.session-start]: The session id contains illegal characters,
            valid characters are a-z, A-Z, 0-9 and '-,' in /home/example/public_html/includes/functions.php on line 2"
        );
        return $response->withHeader("content-type", "text/html")
            ->withStatus(200);
    }
);