<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/.bzr/',
    function (Request $request, Response $response) {
        $response->getBody()->write('<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Index of /.bzr/</title>
<style type="text/css">
a, a:active {text-decoration: none; color: blue;}
a:visited {color: #48468F;}
a:hover, a:focus {text-decoration: underline; color: red;}
body {background-color: #F5F5F5;}
h2 {margin-bottom: 12px;}
table {margin-left: 12px;}
th, td { font: 90% monospace; text-align: left;}
th { font-weight: bold; padding-right: 14px; padding-bottom: 3px;}
td {padding-right: 14px;}
td.s, th.s {text-align: right;}
div.list { background-color: white; border-top: 1px solid #646464; border-bottom: 1px solid #646464; padding-top: 10px; padding-bottom: 14px;}
div.foot { font: 90% monospace; color: #787878; padding-top: 4px;}
</style>
</head>
<body>
<h2>Index of /.bzr/</h2>
<div class="list">
<table summary="Directory Listing" cellpadding="0" cellspacing="0">
<thead><tr><th class="n">Name</th><th class="m">Last Modified</th><th class="s">Size</th><th class="t">Type</th></tr></thead>
<tbody>
<tr><td class="n"><a href="../">Parent Directory</a>/</td><td class="m">&nbsp;</td><td class="s">- &nbsp;</td><td class="t">Directory</td></tr>
<tr><td class="n"><a href="branch/">branch</a>/</td><td class="m">2015-Nov-08 03:01:25</td><td class="s">- &nbsp;</td><td class="t">Directory</td></tr>
<tr><td class="n"><a href="branch-lock/">branch-lock</a>/</td><td class="m">2015-Nov-08 03:01:24</td><td class="s">- &nbsp;</td><td class="t">Directory</td></tr>
<tr><td class="n"><a href="checkout/">checkout</a>/</td><td class="m">2015-Nov-08 03:01:25</td><td class="s">- &nbsp;</td><td class="t">Directory</td></tr>
<tr><td class="n"><a href="repository/">repository</a>/</td><td class="m">2015-Nov-08 03:01:25</td><td class="s">- &nbsp;</td><td class="t">Directory</td></tr>
<tr><td class="n"><a href="README">README</a></td><td class="m">2015-Nov-08 03:01:24</td><td class="s">0.1K</td><td class="t">application/octet-stream</td></tr>
<tr><td class="n"><a href="branch-format">branch-format</a></td><td class="m">2015-Nov-08 03:01:24</td><td class="s">0.1K</td><td class="t">application/octet-stream</td></tr>
</tbody>
</table>
</div>
<div class="foot">lighttpd/1.4.35</div>
</body>
</html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);