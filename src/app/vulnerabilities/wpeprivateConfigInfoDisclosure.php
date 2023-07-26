<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/_wpeprivate/',
    function (Request $request, Response $response) {
        $response->getBody()->write('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
    <head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
    <title>Index of /_wpeprivate/</title></head>
    <body>
    <h1>Index of /_wpeprivate/</h1><pre><img src="/_autoindex/icons/blank.png" alt="     "> <a href=\'?ND\'>Name</a>                                                                             <a href=\'?MA\'>Last modified</a>         <a href=\'?SA\'>Size</a>  <a href=\'?DA\'>Description </a>
    <hr><img src="/_autoindex/icons/up.png" alt="up"> <a href="/">Parent Directory</a>                                                                 21-Oct-2020 00:44        -       
<img src="/_autoindex/icons/unknown.png" alt="unknown"> <a href="/_wpeprivate/config.json">config.json</a>                                                                      25-Jun-2020 20:31       4k       
</pre><hr><address>Proudly Served by LiteSpeed Web Server at www.bergercommercial.com Port 443</address>
</body>
</html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/_wpeprivate/config.json',
    function (Request $request, Response $response) {
        $response->getBody()->write('{"env":{"WPENGINE_ACCOUNT":"bergercommer","WPENGINE_PHPSESSIONS":"on","WPENGINE_DB_SESSIONS":"off","WPENGINE_ALLOW_FLOCK":"off","WPENGINE_MAIL_HOOK":"on"},"constants":{"WPENGINE_ACCOUNT":"bergercommer","WPENGINE_SESSION_DB_HOST":"127.0.0.1","WPENGINE_SESSION_DB_USERNAME":"bergercommer","WPENGINE_SESSION_DB_PASSWORD":"5nIqfEi8jdb1jIFrOj8n","WPENGINE_SESSION_DB_SCHEMA":"wp_bergercommer","WPENGINE_SESSION_LOCKING":"on","WPENGINE_SITES_ENVIRONMENT":"unspecified"},"globals":{"wpengine_platform_config":{"content_regexs":[],"no_cdn_uris":[],"all_domains":["bergercommercial.com","bergerspecialassets.com","bergercommer.wpengine.com","www.bergercommercial.com"],"netdna_push_domains":[],"domain_mappings":[],"limit_heartbeat":true,"wpengine_apikey":"26168ff0b832684bf39f92cfa5c0632b36ce8fdd","locations":{"domain_base":"wpengine.com","api1":"https:\/\/api.wpengine.com\/1.2","api2":"https:\/\/api2.wpengine.com"},"wpe_php":{"7.2":"27cf01d180daff0fd284b561e4c568cb85c53501","7.3":"51b3982b205711c9df1f3edc8111e5913615e80b","7.4":"10e455c09a59c56410edc236917ae8b31ae93fda"}},"wpe_largefs_paths":[],"wpe_largefs_bucket":"largefs.wpengine","wpe_largefs_region":"us-east-1"},"defines":{"WPE_VENDOR":false,"WP_CACHE_KEY_SALT":"a1ee7b939d3d7879"}}');
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(200);
    }
);