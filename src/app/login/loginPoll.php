<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/loginPoll',
    function (Request $request, Response $response) {
        session_start();
        $now = time();
        if (isset($_SESSION['expire']) && $now > $_SESSION['expire']) {
            session_destroy();
        }

        if (isset($_SESSION['user'])) {
            $response->getBody()->write('<!DOCTYPE html>
            <html lang="en">
            <head>
              <title>Welcome</title>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            </head>
            <body>
            
            <nav class="navbar navbar-inverse bg-dark">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">Hypejab</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="/">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="/hypejablogout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
              </div>
            </nav>
<h1 style="text-align:center;">Welcome! '.$_SESSION['user'].'</h1>
<img src="https://c.tenor.com/g2IzuWs8bpEAAAAC/breaking-bad-walter-white.gif" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        } else {
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
            
            <nav class="navbar navbar-inverse bg-dark">
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
                </ul>
              </div>
            </nav>
            <h1 style="text-align: center;">Please login first.</h1>
            <img src="https://c.tenor.com/EhHxLBh6SxoAAAAM/breakdown-crying.gif" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        }
    }
);