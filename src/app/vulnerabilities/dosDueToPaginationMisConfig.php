<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


$app->get('/pagination-dos', function (Request $request, Response $response) {
    $limit = $request->getQueryParams()['limit'] ?? 1;

    $limit = max(1, (int)$limit);

    $responseData = str_repeat('Your response data here. This is a sample response that will be repeated.', $limit);

    $response->getBody()->write($responseData);
    return $response->withHeader("content-type", "text/plain")->withStatus(200);
});