<?php

use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;

require __DIR__.'/../vendor/autoload.php';

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();

require __DIR__ . '/../src/app/index.php';
require __DIR__ . '/../src/app/robots.php';
require __DIR__ . '/../src/app/sitemap.php';
require __DIR__ . '/../src/app/vulnerabilities/Host Header Injection.php';
require __DIR__ . '/../src/app/vulnerabilities/Apache Tomcat Ghostcat CVE 2020-1938.php';
require __DIR__ . '/../src/app/vulnerabilities/Hidden File Sample.php';
require __DIR__ . '/../src/app/vulnerabilities/JSP Samples Page.php';
require __DIR__ . '/../src/app/vulnerabilities/Exposed Panels - CrushFTP.php';
require __DIR__ . '/../src/app/vulnerabilities/Apache Axis2 Default Login.php';
require __DIR__ . '/../src/app/vulnerabilities/Unauthenticated Gitlab SSRF CVE 2021-22214.php';
require __DIR__ . '/../src/app/vulnerabilities/Software Versions.php';
require __DIR__ . '/../src/app/vulnerabilities/Wordpress Username Enumeration.php';
require __DIR__ . '/../src/app/vulnerabilities/Drupal Username Enumeration.php';
require __DIR__ . '/../src/app/vulnerabilities/Magento Cacheleak.php';
require __DIR__ . '/../src/app/vulnerabilities/SSRF.php';
require __DIR__ . '/../src/app/vulnerabilities/Magento Config File.php';
require __DIR__ . '/../src/app/vulnerabilities/Magento Downloader.php';
require __DIR__ . '/../src/app/vulnerabilities/Swagger Config File.php';
require __DIR__ . '/../src/app/vulnerabilities/WP Debug.php';
require __DIR__ . '/../src/app/vulnerabilities/AWStats Script.php';
require __DIR__ . '/../src/app/vulnerabilities/API Key Scanner.php';
require __DIR__ . '/../src/app/vulnerabilities/Database Connection String.php';
require __DIR__ . '/../src/app/vulnerabilities/MySQL Username Disclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/WP-Media-Enum.php';
require __DIR__ . '/../src/app/vulnerabilities/403 Bypass.php';
require __DIR__ . '/../src/app/vulnerabilities/Firebase-Database-Url-Disclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/Base Tag Hijacking.php';
require __DIR__ . '/../src/app/vulnerabilities/Magento API Anonymous Access.php';
require __DIR__ . '/../src/app/vulnerabilities/OAST XXE.php';
require __DIR__ . '/../src/app/vulnerabilities/Laravel Log File.php';
require __DIR__ . '/../src/app/vulnerabilities/Apache Cassandra Unauthorized Access.php';
require __DIR__ . '/../src/app/vulnerabilities/Laravel XSS.php';
require __DIR__ . '/../src/app/vulnerabilities/S3 Bucket Publicly Accessible.php';
require __DIR__ . '/../src/app/vulnerabilities/Arbitrary File Read Next JS.php';
require __DIR__ . '/../src/app/vulnerabilities/Chrome Logger Information Disclosure.php';
require __DIR__ . '/../src/app/vulnerabilities/Apache Tomcat Examples Directory.php';
require __DIR__ . '/../src/app/vulnerabilities/Merurial Repository.php';
require __DIR__ . '/../src/app/vulnerabilities/Flask Debug Mode.php';
require __DIR__ . '/../src/app/vulnerabilities/Drupal Backup Migrate.php';


// Define Custom Error Handler
$customErrorHandler = function (
    ServerRequestInterface $request,
    Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails,
    ?LoggerInterface $logger = null
) use ($app) {
    //$logger->error($exception->getMessage());

    $payload = ['error' => $exception->getMessage()];

    $response = $app->getResponseFactory()->createResponse();
    $response->getBody()->write(
        json_encode($payload, JSON_UNESCAPED_UNICODE)
    );

    if ($exception->getMessage() == 'Not found.') {
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(404);
    }
    return $response->withHeader("content-type", "application/json");
};

// Add Error Middleware
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);

$app->run();
