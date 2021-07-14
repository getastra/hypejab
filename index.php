<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();

$app->get(
  '/',
  function (Request $request, Response $response, array $args) {
      $response->getBody()->write(
        "Welcome to HypeJab! 💉 😃 <br>"
        . "HypeJab is a deliberately vulnerable web application"
        . " intended for benchmarking automated scanners."
      );
      return $response;
  }
);
require './src/app/sitemap.php';
require './src/app/vulnerabilities/host-header-injection.php';

$app->run();
