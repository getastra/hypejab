<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;

$app->add(function (Request $request, RequestHandlerInterface $handler) {
    
    $storageFile = '/tmp/storage.txt';

    $maxRequests = 10;

    $ip = $_SERVER['REMOTE_ADDR'];
    $key = 'rate_limit:' . $ip;

    // Load storage data from file
    $storage = [];
    if (file_exists($storageFile)) {
        $storage = unserialize(file_get_contents($storageFile));
    }

    if (!isset($storage[$key])) {
        $storage[$key] = 0;
    }

    $response = $handler->handle($request);

    if ($storage[$key] >= $maxRequests) {
        $response->getBody()->write('Too many requests');
        return $response->withStatus(429)
            ->withHeader('Content-Type', 'text/html');
    }

    $storage[$key]++;
    
    // Save updated storage data to file
    file_put_contents($storageFile, serialize($storage));

    return $response;
});

$app->get('/forgot-password', function (Request $request, Response $response) {
    $response->getBody()->write('
    <
    <h1>Forgot Password</h1>
    <p>Enter your email address to reset your password</p>
    <form action="resetPassword" method="POST" class="form-signin">
        <input type="email" name="email" required/>
        <button type="submit">Reset Password</button>
    </form>
    ');
    return $response->withHeader('Content-Type', 'text/html')->withStatus(200);
});


$app->post(
    '/resetPassword',
    function (Request $request, Response $response) {
        if ($_POST['email'] == 'say+my+name@bb.com') {
            $response->getBody()->write('Email send successfully.');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        } else {
            $response->getBody()->write('Wrong username');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(404);
        }
    }
);

