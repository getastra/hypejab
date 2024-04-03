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
        Discover Card = 6011 0009 9130 0009<br>
        JCB Card = 3566 0000 2000 0410<br>
        Maestro Card = 6759 6498 2643 8453<br>
        Master Card = 5425 2334 3010 9903<br>
        Visa Card = 4263 9826 4026 9299<br>
        Rupay Card = 6090 4027 8684 5731<br>
        Password = heisenberg<br>
        Passport Number = A1234567<br>
        Driving License Number = DL-0420110149646<br>
        Vehicle Registration Number = DL-0420110149646<br>
        SSN = 078-05-1120<br>
        IBAN = DE89 3704 0044 0532 0130 00<br>
        Username = say+my+name@bb.com<br>
        base64 pii = UUxRUFMxODM2RAo=
        Email = say+my+name@bb.com<br>
        Personal-Information = Location: Delhi -110011<br>
        JWT token = eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c <br>
        </p>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
