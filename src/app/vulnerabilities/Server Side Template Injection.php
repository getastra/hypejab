<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/ssti-django',
    function (Request $request, Response $response, $args) {

        $query = $request->getQueryParams()['msg'];

        try {
          if ($query == '{% widthratio 9 1 1371742 %}') {
            $inject = '12345678';
          } else {
            $inject = rand(10, 100);
          }
        } catch (Exception $err) {
          echo 'Message: ' . $err->getMessage();
          $inject = '';
        }

        $response->getBody()->write('
        <html>
            <head>
                <title>SSTI - Django</title>
                <style>
                    body {
                        background-color: #111;
                    }
                    a {
                        text-align: center;
                        color: white;
                        font-family: sans-serif;
                        text-decoration: none;
                    }
                    p {
                        color: #eeeeee;
                        font-family: sans-serif;
                    }
                </style>
            </head>
            <body>
                  <p> Stock status: &nbsp;' . $inject . ' </p>  
            </body>
        </html>'
    );
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(500);
    }
);

$app->get(
    '/ssti-django?msg=outofstock',
    function (Request $request, Response $response, $args) {
        $query = $request->getQueryParams()['msg'];

        try {
          if ($query == '{% widthratio 9 1 1371742 %}') {
            $inject = '12345678';
          } else {
            $inject = rand(10, 100);
          }
        } catch (Exception $err) {
          echo 'Message: ' . $err->getMessage();
          $inject = '';
        }
        
        $response->getBody()->write('
        <html>
            <head>
                <title>SSTI - Django</title>
                <style>
                    body {
                        background-color: #111;
                    }
                    a {
                        text-align: center;
                        color: white;
                        font-family: sans-serif;
                        text-decoration: none;
                    }
                    p {
                      color: #eeeeee;
                      font-family: sans-serif;
                    }
                </style>
            </head>
            <body>
                  <p> Stock status: &nbsp;' . $inject . ' </p>  
            </body>
        </html>'
    );
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);