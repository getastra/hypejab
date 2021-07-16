<?php

use Slim\Factory\AppFactory;

require __DIR__.'/../vendor/autoload.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();

require __DIR__ . '/../src/app/index.php';
require __DIR__ . '/../src/app/robots.php';
require __DIR__ . '/../src/app/sitemap.php';
require __DIR__ . '/../src/app/vulnerabilities/host-header-injection.php';
require __DIR__ . '/../src/app/vulnerabilities/GhostCatCVE20201938.php';
require __DIR__ . '/../src/app/vulnerabilities/HiddenFileFinder.php';

$app->run();
