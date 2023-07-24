<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/actuator/env',
    function (Request $request, Response $response) {
        $json = file_get_contents(__DIR__ . "/../resources/spring/env.json");
        $response->getBody()->write($json);
        return $response->withHeader("content-type", "application/vnd.spring-boot.actuator.v3+json")
                        ->withStatus(200);
    }
);

$app->get(
    '/actuator/loggers',
    function (Request $request, Response $response) {
        $json = file_get_contents(__DIR__ . "/../resources/spring/loggers.json");
        $response->getBody()->write($json);
        return $response->withHeader("content-type", "application/vnd.spring-boot.actuator.v3+json")
                        ->withStatus(200);
    }
);

$app->get(
    '/actuator/threaddump',
    function (Request $request, Response $response) {
        $json = file_get_contents(__DIR__ . "/../resources/spring/threaddump.json");
        $response->getBody()->write($json);
        return $response->withHeader("content-type", "application/vnd.spring-boot.actuator.v3+json")
                        ->withStatus(200);
    }
);
$app->get(
    '/actuator/configprops',
    function (Request $request, Response $response) {
        $json = file_get_contents(__DIR__ . "/../resources/spring/configprops.json");
        $response->getBody()->write($json);
        return $response->withHeader("content-type", "application/vnd.spring-boot.actuator.v3+json")
                        ->withStatus(200);
    }
);
$app->get(
    '/actuator/mappings',
    function (Request $request, Response $response) {
        $json = file_get_contents(__DIR__ . "/../resources/spring/mappings.json");
        $response->getBody()->write($json);
        return $response->withHeader("content-type", "application/vnd.spring-boot.actuator.v3+json")
                        ->withStatus(200);
    }
);

$app->get(
    '/actuator/metrics',
    function (Request $request, Response $response) {
        $json = file_get_contents(__DIR__ . "/../resources/spring/metrics.json");
        $response->getBody()->write($json);
        return $response->withHeader("content-type", "application/vnd.spring-boot.actuator.v3+json")
                        ->withStatus(200);
    }
);
$app->get(
    '/actuator/jolokia',
    function (Request $request, Response $response) {
        $json = file_get_contents(__DIR__ . "/../resources/spring/jolokia.json");
        $response->getBody()->write($json);
        return $response->withHeader("content-type", "application/vnd.spring-boot.actuator.v3+json")
                        ->withStatus(200);
    }
);

$app->get(
    '/actuator/beans',
    function (Request $request, Response $response) {
        $json = file_get_contents(__DIR__ . "/../resources/spring/beans.json");
        $response->getBody()->write($json);
        return $response->withHeader("content-type", "application/vnd.spring-boot.actuator.v3+json")
                        ->withStatus(200);
    }
);

$app->get(
    '/actuator',
    function (Request $request, Response $response) {
        $json = file_get_contents(__DIR__ . "/../resources/spring/actuator.json");
        $response->getBody()->write($json);
        return $response->withHeader("content-type", "application/vnd.spring-boot.actuator.v3+json")
                        ->withStatus(200);
    }
);