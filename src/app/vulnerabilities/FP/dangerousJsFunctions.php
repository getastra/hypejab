<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/fp/dangerousJSFunctions',
    function (Request $request, Response $response) {
        $response->getBody()->write('<html>
<head>
    <title> Dangerous JS Functions FP </title>
<head>
<body>
    <h2> Dangerous JS Functions FP <h2>
    
    <p> This should not have been alerted. </p>

    <script>
        function globaleval() {
            return true;
        }

        if (globaleval()) {
            console.log("hello there");
        }
    </script>
</body>
        </html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);