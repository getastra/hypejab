<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get('/@snyk/docker-registry-v2-client/', function (Request $request, Response $response) {
    $packageData = [
        'name' => 'Your Package Name',
        'version' => '1.0.0',
        'description' => 'Description of your package',
        'author' => 'Your Name',
        'dependencies'=> [
            'fake-dependency-astra' => '2.0.1',
            'http-server' => '^14.1.1',
            'express'=> '^4.18.2',
        ]
    ];

    // Convert the PHP array to a JSON string
    $packageJson = json_encode($packageData, JSON_PRETTY_PRINT);

    // Set the JSON content type and return the package.json content
    $response->getBody()->write($packageJson);
    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
});

$app->get('/config/docker/v2/', function (Request $request, Response $response) {
    $packageData = [
        'name' => 'Your Package Name',
        'version' => '1.0.0',
        'description' => 'Description of your package',
        'author' => 'Your Name',
        'dependencies'=> [
            'fake-dependency-astra' => '2.0.1',
            'http-server' => '^14.1.1',
            'express'=> '^4.18.2',
        ]
    ];

    // Convert the PHP array to a JSON string
    $packageJson = json_encode($packageData, JSON_PRETTY_PRINT);

    // Set the JSON content type and return the package.json content
    $response->getBody()->write($packageJson);
    return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
});


$app->get('/.svn/', function (Request $request, Response $response) {

    $response->getBody()->write("This is a plain text");
    return $response->withHeader('Content-Type', 'text/plain')->withStatus(200);
});