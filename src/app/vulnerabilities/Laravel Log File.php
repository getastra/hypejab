<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/storage/logs/laravel.log',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        [2019-08-29 14:35:04] laravel.EMERGENCY: Unable to create configured logger. Using emergency logger. {"exception":"[object] (InvalidArgumentException(code: 0): Log [] is not defined. at C:\\wamp64\\www\\cportal-laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\LogManager.php:168)
            [stacktrace]
            #0 C:\\wamp64\\www\\cportal-laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\LogManager.php(102): Illuminate\\Log\\LogManager->resolve(NULL)
            #1 C:\\wamp64\\www\\cportal-laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\LogManager.php(90): Illuminate\\Log\\LogManager->get(NULL)
            #2 C:\\wamp64\\www\\cportal-laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Log\\LogManager.php(500): Illuminate\\Log\\LogManager->driver()
            #3 C:\\wamp64\\www\\cportal-laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php(118): Illuminate\\Log\\LogManager->error(\'syntax error, u...\', Array)
            #4 C:\\wamp64\\www\\cportal-laravel\\app\\Exceptions\\Handler.php(37): Illuminate\\Foundation\\Exceptions\\Handler->report(Object(Symfony\\Component\\Debug\\Exception\\FatalThrowableError))
            #5 C:\\wamp64\\www\\cportal-laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(314): App\\Exceptions\\Handler->report(Object(Symfony\\Component\\Debug\\Exception\\FatalThrowableError))
            #6 C:\\wamp64\\www\\cportal-laravel\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php(122): Illuminate\\Foundation\\Http\\Kernel->reportException(Object(Symfony\\Component\\Debug\\Exception\\FatalThrowableError))
            #7 C:\\wamp64\\www\\cportal-laravel\\public\\index.php(55): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))
            #8 {main}
            "}');
        return $response->withHeader("content-type", "text/plain")
                        ->withStatus(200);
    }
);