<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get('/mass-assignment-form', function (Request $request, Response $response) {
    require __DIR__ . '/../login/checkSession.php';
    $_SESSION['data'] = [
        "name" => "mass-assignment",
        "admin" => false,
        "role" => "user"
    ];
    $html = file_get_contents(__DIR__ . "/../resources/mass-assignment.html");
    $response->getBody()->write($html);
    return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
});

$app->get('/mass-assignment', function (Request $request, Response $response) use(&$responseData){
    require __DIR__ . '/../login/checkSession.php';
    //global $responseData;
    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = [
            "name" => "mass-assignment",
            "admin" => false,
            "role" => "user"
        ];
    }
    $res = json_encode($_SESSION['data'], JSON_PRETTY_PRINT);
    $response->getBody()->write($res);
    return $response->withHeader("content-type", "application/json")
                    ->withStatus(200);
});

$app->post('/mass-assignment', function (Request $request, Response $response) use(&$responseData){
    require __DIR__ . '/../login/checkSession.php';
    $data = $request->getParsedBody();
    //global $responseData;
    $_SESSION['data'] = $data;
    $res = json_encode($_SESSION['data'], JSON_PRETTY_PRINT);
    $response->getBody()->write($res);
    return $response->withHeader("content-type", "application/json")
                    ->withStatus(200);
});