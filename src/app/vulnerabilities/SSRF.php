<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/ssrf-parameter-based',
    function (Request $request, Response $response) {
        $html = file_get_contents(__DIR__ . "/../resources/ssrf/dns-spoofing.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->post(
    '/ssrf-parameter-based',
    function (Request $request, Response $response) {
        $_body = $request->getParsedBody();
        $file = strtolower($_body['file']);
        $html = '<html>
        <head>
            <title>HypeJab - SSRF Parameter Based</title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <style>
                body {
                background: url(resources/images/head.jpg);
                background-size: 100% 700px;
                background-repeat: no-repeat;
                font-family: Tahoma;
                background-color: #0b0533;
                }
                table {
                    background-color: #0b0533;
                }
                textarea{
                    background-color: #0b0533;
                    color: white;
                    align: center;
                }
            </style>
        </head>
    </html>';
        if(strstr($file, 'localhost') == false && preg_match('/(^https*:\/\/[^:\/]+)/', $file)==true){
            $host=parse_url($file,PHP_URL_HOST);

            if(filter_var($host, FILTER_VALIDATE_IP)){
                if(filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE |  FILTER_FLAG_NO_RES_RANGE)== false) {
                    $response->getBody()->write(
                        $html
                        .'<html><head><title>HypeJab - SSRF Parameter Based</title><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style>body {background: url(resources/images/head.jpg);background-size: 100% 700px;background-repeat: no-repeat;font-family: Tahoma;background-color: #0b0533;}</style></head></html>'
                        .'<table width="50%" cellspacing="0" cellpadding="0" class="tb1" style="opacity: 0.6;">'
                        .'<tr><td align=center style="padding: 10px;" >'
                        .'The provided IP is from Private range and hence not allowed'
                        .''
                        .'</td></tr></table>'
                        .'<table width="50%" cellspacing="0" cellpadding="0" class="tb1" style="margin:10px 2px 10px;opacity: 0.6;" >'
                    );
                }else{
                    $response->getBody()->write(
                        $html
                        .'<textarea rows=20 cols=60>'.file_get_contents($file)."</textarea>"
                    );
                }
            }else{
                $response->getBody()->write(
                    $html
                    .'<textarea rows=20 cols=60>'.file_get_contents($file)."</textarea>"
                );
            }
        }elseif(strstr(strtolower($file), 'localhost') == true && preg_match('/(^https*:\/\/[^:\/]+)/', $file)==true){
            $response->getBody()->write(
                $html
                .'<table width="30%" cellspacing="0" cellpadding="0" class="tb1" style="opacity: 0.6;">'
                .'<tr><td align=center style="padding: 10px;" >'
                .'Tyring to access Localhost o_0 ? '
                .''
                .'</td></tr></table>'
                .'<table width="50%" cellspacing="0" cellpadding="0" class="tb1" style="margin:10px 2px 10px;opacity: 0.6;" >'
            );
        }else{
            $response->getBody()->write(
                $html
                .'<textarea rows=20 cols=60>'.file_get_contents($file, true)."</textarea>"
            );
        }
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);