<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();

require __DIR__ . '/../src/app/sitemap.php';
require __DIR__ . '/../src/app/vulnerabilities/host-header-injection.php';
require __DIR__ . '/../src/app/vulnerabilities/GhostCatCVE20201938.php';

$app->run();
