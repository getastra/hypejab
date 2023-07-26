<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/_fragment',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        <!DOCTYPE html>
<html>
	<head>
		<title>Symfony Exception</title>
		<meta charset="UTF-8">
		<link href="favicon.ico" rel="shortcut icon">
	</head>
	<body>
    FragmentListener
  </body>
</html>

        ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(403);
    }
);
