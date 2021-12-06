<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/site/sites/default/files/backup_migrate/manual/test.txt',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('this file should not be publicly accesible');
        return $response->withHeader("content-type", "text/plain")
                        ->withStatus(200);
    }
);

$app->get(
    '/site/sites/default/files/backup_migrate/manual/',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('
<html>
<body>
<h1> Index of /site/sites/default/files/backup_migrate/manual/ </h1>
<a href="/site/sites/default/files/backup_migrate/manual/test.txt">text.txt</a>
</body>
</html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);