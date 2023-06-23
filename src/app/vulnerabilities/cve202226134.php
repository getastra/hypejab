<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/confluence/',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $html = file_get_contents(__DIR__ . "/../resources/axis2/welcome.html");
        $response->getBody()->write("
<!DOCTYPE html>
<html lang=\"en-GB\" >
    <head>
                        <title>Log In - Confluence</title>
    </head>
    <body>
        Confluence installation for CVE-2022-26134
    </body>
</html>");
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/confluence/${(#a=@org.apache.commons.io.IOUtils@toString(@java.lang.Runtime@getRuntime().exec("echo astra-detects-confluence-CVE-2022-26134").getInputStream(),"utf-8")).(@com.opensymphony.webwork.ServletActionContext@getResponse().setHeader("X-Cmd-Response",#a))}/',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $html = file_get_contents(__DIR__ . "/../resources/axis2/welcome.html");
        $response->getBody()->write("CVE-2022-26134");
        return $response->withHeader("content-type", "text/html")
                        ->withHeader("X-Cmd-Response", "astra-detects-confluence-CVE-2022-26134")
                        ->withHeader("Location", "/confluence/")
                        ->withStatus(302);
    }
);