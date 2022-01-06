<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/fp/dangerousJSFunctions',
    function (Request $request, Response $response) {
        $response->getBody()->write('<html>
<head>
    <title> Dangerous JS Functions </title>
<head>
<body>
    <h2> Dangerous JS Functions <h2>
    
    <p id="demo"></p>

    <script>
        let x = 10;
        let y = 20;
        let text = "x * y";
        let result = eval(text);

        document.getElementById("demo").innerHTML = result;
    </script>
</body>
        </html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);