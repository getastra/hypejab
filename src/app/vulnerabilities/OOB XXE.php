<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/oob-xxe-dashboard',
    function (Request $request, Response $response) {
        // require __DIR__ . '/../login/checkSession.php';
        $data = file_get_contents(__DIR__ . "/../resources/OOB-XXE/index.html");
        $response->getBody()->write($data);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->post(
    '/oob-xxe',
    function (Request $request, Response $response) {
        
        $reqBody = $request->getParsedBody();
        preg_match('/<!DOCTYPE.*?\[.*?<!ENTITY.*?(\w+xxe).*?SYSTEM.*?"(.*?)".*?%\1.*?\].*?>/s', (string)$request->getBody(), $matches);

        if ($reqBody != NULL && $reqBody->productId != NUlL && strcmp($reqBody->productId, "2") == 0) {

            $response->getBody()->write("In stock.");
            //$reqBody->asXML()

        } else if ($matches) {
            $ch = curl_init($matches[2]);
 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($ch);
            
            curl_close($ch);
            
            echo $data;

        }

        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);