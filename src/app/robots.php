<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

/** @var App $app */

$app->get(
    '/robots.txt',
    function (Request $request, Response $response, array $args) use ($app) {
        $baseurl = $request->getUri()->getScheme().'://'.$request->getUri()
                ->getHost().($request->getUri()->getHost() == "localhost" ? ':'
                .$request->getUri()->getPort() : '');
        $robots  = "User-agent: *".PHP_EOL."Disallow:".PHP_EOL.PHP_EOL
            ."Sitemap: $baseurl/sitemap.xml";
        $response->getBody()->write($robots);

        return $response->withHeader("content-type", "text/plain");
    }
);
