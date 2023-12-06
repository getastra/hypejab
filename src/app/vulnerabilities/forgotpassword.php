<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

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
            $response->getBody()->write('Wrong username or password.');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(404);
        }
    }
);

