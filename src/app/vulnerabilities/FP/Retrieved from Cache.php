<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/thisPageWillBeRetrievedFromCache.html',
    function (Request $request, Response $response) {
        $response->getBody()->write('This page will return "X-Cache: Hit from cloudfront" header. But the alert should not be generated for this one as we have made it look like 404 has not been configured on the server even though it has, because of this te 404 check of scanner rules should fail and the scan rule should not alert this.');
        return $response->withHeader("content-type", "text/html")
                        ->withHeader("X-Cache", "Hit from cloudfront")
                        ->withHeader("Age", "196")
                        ->withStatus(200);
    }
);