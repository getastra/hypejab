<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/403-bypass',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
            $response->getBody()->write('Forbidden page');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(403);
        }
    }
);

$app->get(
    '/403-bypass/',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
            $response->getBody()->write('Hemlo Hecker');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        }
    }
);
