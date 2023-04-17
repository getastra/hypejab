<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/** @var $app */

$app->get(
    '/',
    function (Request $request, Response $response, array $args) {
       
        $expected_key = "attachment_id";
        $expected_value = "100";
        $query_params = $request->getQueryParams();

        $cookie_name = "AUTH";
        $cookie_value = new stdClass();
        $cookie_value->user = "user1";
        $cookie_value->role = "stdUser";
        $cookieJSON = json_encode($cookie_value);
        $cookieB64 = base64_encode($cookieJSON);
        setcookie($cookie_name, $cookieB64, time() + (86400 * 30), "/");
        
        foreach ($query_params as $key => $value) {
            
            if ($key == $expected_key && $value == $expected_value) {
                $html = file_get_contents(__DIR__ . "/resources/wp-media-enum/attachment_id.html");
                $response->getBody()->write($html);
                return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
            }
        }
        
        $response->getBody()->write('<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hypejab</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse  bg-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Hypejab</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/hypejablogin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="/hypejablogin2"><span class="glyphicon glyphicon-log-in"></span> Login2</a></li>
      <li><a href="/hypejablogin3"><span class="glyphicon glyphicon-log-in"></span> Login3</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Welcome to HypeJab! 💉 😃 </h3>
  <p>HypeJab is a deliberately vulnerable web application intended for benchmarking automated scanners.</p>
  <p>v1.1.4</p>
</div>

</body>
</html>
');

        return $response;
    }
);

$app->get(
    '/favicon.ico',
    function (Request $request, Response $response, array $args) {
        return $response->withHeader(
            'Location',
            "/favicon.gif"
        )->withStatus(302);
    }
);