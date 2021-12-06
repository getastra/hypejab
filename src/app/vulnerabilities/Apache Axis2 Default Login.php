<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/axis2/axis2-admin/welcome.html',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $html = file_get_contents(__DIR__ . "/../resources/axis2/welcome.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/axis2/axis2-admin/welcome',
    function (Request $request, Response $response, array $args) {
        require __DIR__ . '/../login/checkSession.php';
        return $response->withHeader(
            'Location',
            "http://{$_SERVER['HTTP_HOST']}/axis2/axis2-admin/welcome.html"
        )->withStatus(302);
    }
);

$app->post(
    '/axis2-admin/login',
    function (Request $request, Response $response, array $args) {
        require __DIR__ . '/../login/checkSession.php';
        $_body = $request->getParsedBody();
        $_usname = $_body['userName'];
        $_pass = $_body['password'];
        
        if(!empty($_usname) && !empty($_pass)){
            if($_usname == 'admin' && $_pass == 'axis2') {
                $html = file_get_contents(__DIR__ . "/../resources/axis2/login.html");
                $response->getBody()->write($html);
                return $response->withHeader("content-type", "text/html")
                                ->withStatus(200);
            }else {
                return $response->withStatus(500);
            }
        }else {
            return $response->withStatus(204);
        }
    }
);