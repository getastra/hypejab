<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/.svn/',
    function (Request $request, Response $response) {
        $response->getBody()->write('
<html>
<head><title>Index of /.svn/</title></head>
<body bgcolor="white">
<h1>Index of /.svn/</h1><hr><pre><a href="../">../</a>
<a href="pristine/">pristine/</a>                                          27-Apr-2017 06:57                   -
<a href="tmp/">tmp/</a>                                               22-Oct-2019 00:30                   -
<a href="entries">entries</a>                                            27-Apr-2017 06:45                   3
<a href="format">format</a>                                             27-Apr-2017 06:45                   3
<a href="wc.db">wc.db</a>                                              22-Jan-2020 23:00            24759296
</pre><hr></body>
</html>
');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
