<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/api-key-scanner',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        <h1>API Key Scanner</h1>
        <p>
        Aadhaar number = 0123 4567 8901<br>
        PAN Number = QLQPS1836D<br>
        Social Security Number = 078-05-1120<br>
        JitPack Authentication Token = jp_hjhggfhgfvdbhfsdhg32<br>
        American Express Card = 3782 822463 10005<br>
        Diners Club Card = 3056 9309 0259 04<br>
        Discover Card = 6011 1111 1111 1117<br>
        JCB Card = 3530 1113 3330 0000<br>
        Maestro Card = 6759 6498 2643 8453<br>
        Master Card = 5555 5555 5555 4444<br>
        Visa Card = 4111 1111 1111 1111<br>
        Rupay Card = 6521 6521 6521 6521<br>
        Password = 12345678<br>
        Religion = Hindu<br>
        Sexual Orientation <br>
        Racial Background <br>
        Passport Number = A1234567<br>
        Driving License Number = DL-0420110149646<br>
        Vehicle Registration Number = DL-0420110149646<br>
        SSN = 078-05-1120<br>
        IBAN = DE89 3704 0044 0532 0130 00<br>
        Username = admin<br>
        Email = admin@gmail.com<br>
        Personal-Information = 1234567890<br>
        JWT token = eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJ0ZXN0IiwiaWF0Ijox <br>

        </p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
