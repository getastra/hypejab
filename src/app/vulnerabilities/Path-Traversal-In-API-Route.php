<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteContext;
use Slim\Factory\AppFactory;

$app->get(
    '/api/v1/load/{file}',
    function (Request $request, Response $response) {
        $routeContext = RouteContext::fromRequest($request);
        $route = $routeContext->getRoute();
        $fileValue = $route->getArgument('file');
        if (str_contains($fileValue, "web.xml")) {
            $response->getBody()->write('<web-app xmlns="http://java.sun.com/xml/ns/j2ee" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://java.sun.com/xml/ns/j2ee http://java.sun.com/xml/ns/j2ee/web-app_2_4.xsd" version="2.4">
    <display-name>WOK Resources Server</display-name>
    <description> WOK Resources Server </description>
</web-app>');
            return $response->withHeader("content-type", "application/xml")
                            ->withStatus(200);
        } else {
            $response->getBody()->write('Meta data.');
            return $response->withHeader("content-type", "text/plain")
                            ->withStatus(200);
        }
    }
);