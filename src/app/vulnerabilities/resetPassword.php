<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;

$app->add(function (Request $request, RequestHandlerInterface $handler) {
    global $storage;
    $maxRequests = 10;

    $ip = $_SERVER['REMOTE_ADDR'];
    $key = 'rate_limit:' . $ip;

    if (!isset($storage[$key])) {
        $storage[$key] = 0;
    }

    echo $ip;
    echo $storage[$key];

    if ($storage[$key] >= $maxRequests) {
        return $response->withStatus(429)
            ->withHeader('Content-Type', 'text/html')
            ->write('Too Many Requests');
    }

    $storage[$key]++;
    echo($storage[$key]);
    $response = $handler->handle($request);
    return $response;
});

// Define the routes
$app->get(
    '/reset-password',
    function (Request $request, Response $response) {
        $response->getBody()->write('
            <p>Enter your email address to reset your password.</p>
            <form action="/reset-password" method="POST">
                <input type="email" name="email" placeholder="Email address" required>
                <input type="submit" value="Reset password">
            </form>
        ');
        return $response->withHeader("content-type", "text/html")
            ->withStatus(200);
    }
);

$app->post(
    '/reset-password',
    function (Request $request, Response $response) {
        $email = $_POST['email'];
        $response->getBody()->write('
            <p>Check your email for a link to reset your password.</p>
        ');
        return $response->withHeader("content-type", "text/html")
            ->withStatus(200);
    }
);