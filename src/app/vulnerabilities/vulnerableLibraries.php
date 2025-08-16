<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/vulnerable-libraries',
    function (Request $request, Response $response) {
        $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vulnerable Libraries - HypeJab</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Hypejab</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li class="active"><a href="/vulnerable-libraries">Vulnerable Libraries</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <h1>Vulnerable JavaScript Libraries</h1>
        <p class="lead">This page loads vulnerable JavaScript libraries for testing vulnerability scanners.</p>
        
        <div class="alert alert-warning">
            <strong>Warning:</strong> These libraries contain known security vulnerabilities and should only be used in testing environments.
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <h3>Loaded Libraries:</h3>
                <ul>
                    <li>jQuery 1.8.3 (XSS vulnerabilities)</li>
                    <li>Prototype.js (XSS & prototype pollution)</li>
                    <li>Underscore.js 1.13.0 (prototype pollution)</li>
                    <li>Lodash (prototype pollution)</li>
                    <li>RequireJS 2.3.5 (path traversal)</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Direct Library URLs:</h3>
                <ul>
                    <li><a href="/resources/js/vulnerable/jquery-1.8.3.min.js" target="_blank">jQuery 1.8.3</a></li>
                    <li><a href="/resources/js/vulnerable/prototype.js" target="_blank">Prototype.js</a></li>
                    <li><a href="/resources/js/vulnerable/underscore-1.13.0.js" target="_blank">Underscore.js</a></li>
                    <li><a href="/resources/js/vulnerable/lodash.js" target="_blank">Lodash</a></li>
                    <li><a href="/resources/js/vulnerable/require-2.3.5.js" target="_blank">RequireJS</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Load all vulnerable libraries -->
    <script src="/resources/js/vulnerable/jquery-1.8.3.min.js"></script>
    <script src="/resources/js/vulnerable/prototype.js"></script>
    <script src="/resources/js/vulnerable/underscore-1.13.0.js"></script>
    <script src="/resources/js/vulnerable/lodash.js"></script>
    <script src="/resources/js/vulnerable/require-2.3.5.js"></script>
</body>
</html>';
        
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

// Individual library endpoints - these will be automatically discovered by sitemap
$app->get(
    '/jquery-1.8.3-vulnerable.js',
    function (Request $request, Response $response) {
        $jsContent = file_get_contents(__DIR__ . "/../../public/resources/js/vulnerable/jquery-1.8.3.min.js");
        $response->getBody()->write($jsContent);
        return $response->withHeader("content-type", "application/javascript")
                        ->withStatus(200);
    }
);

$app->get(
    '/prototype-vulnerable.js',
    function (Request $request, Response $response) {
        $jsContent = file_get_contents(__DIR__ . "/../../public/resources/js/vulnerable/prototype.js");
        $response->getBody()->write($jsContent);
        return $response->withHeader("content-type", "application/javascript")
                        ->withStatus(200);
    }
);

$app->get(
    '/underscore-1.13.0-vulnerable.js',
    function (Request $request, Response $response) {
        $jsContent = file_get_contents(__DIR__ . "/../../public/resources/js/vulnerable/underscore-1.13.0.js");
        $response->getBody()->write($jsContent);
        return $response->withHeader("content-type", "application/javascript")
                        ->withStatus(200);
    }
);

$app->get(
    '/lodash-vulnerable.js',
    function (Request $request, Response $response) {
        $jsContent = file_get_contents(__DIR__ . "/../../public/resources/js/vulnerable/lodash.js");
        $response->getBody()->write($jsContent);
        return $response->withHeader("content-type", "application/javascript")
                        ->withStatus(200);
    }
);

$app->get(
    '/requirejs-2.3.5-vulnerable.js',
    function (Request $request, Response $response) {
        $jsContent = file_get_contents(__DIR__ . "/../../public/resources/js/vulnerable/require-2.3.5.js");
        $response->getBody()->write($jsContent);
        return $response->withHeader("content-type", "application/javascript")
                        ->withStatus(200);
    }
); 
