<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/hypejablogin',
    function (Request $request, Response $response) {
        session_start();
        if (isset($_SESSION['user'])) {
            header("Location: /loginPoll");
            die();
        }
        $html = file_get_contents(__DIR__ . "/../resources/hypejab-login/hypejablogin.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/hypejablogout',
    function (Request $request, Response $response) {
        session_start();
        if (isset($_SESSION['user'])) {
            session_destroy();
            header("Location: /hypejablogin");
            die();
        } else {
            header("Location: /loginPoll");
            die();
        }
        $response->getBody()->write('Logging out...');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->post(
    '/loginVerify',
    function (Request $request, Response $response) {
        if ($_POST['username'] == 'say+my+name@bb.com' && $_POST['password'] == 'heisenberg') {
            session_start();
            $_SESSION['user'] = 'Heisenberg';
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
            header("Location: /loginPoll");
            die();
        } else {
            $response->getBody()->write('Wrong username or password.');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        }
    }
);