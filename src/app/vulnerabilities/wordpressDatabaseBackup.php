<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/wp-content/uploads/db-backup/',
    function (Request $request, Response $response) {
        $response->getBody()->write('
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
 <head>
  <title>Index of /wp-content/uploads/db-backup</title>
 </head>
 <body>
<h1>Index of /wp-content/uploads/db-backup</h1>
<pre><img src="/__ovh_icons/blank.gif" alt="Icon "> <a href="?C=N;O=D">Name</a>                    <a href="?C=M;O=A">Last modified</a>      <a href="?C=S;O=A">Size</a>  <a href="?C=D;O=A">Description</a><hr><img src="/__ovh_icons/back.gif" alt="[PARENTDIR]"> <a href="/wp-content/uploads/">Parent Directory</a>                             -   
<img src="/__ovh_icons/unknown.gif" alt="[   ]"> <a href="databse.sql">databse.sql</a>             2019-11-12 08:58    0   
<hr></pre>
</body></html>
');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
