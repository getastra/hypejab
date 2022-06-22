<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/wp-content/uploads/wc-logs/',
    function (Request $request, Response $response) {
        $response->getBody()->write('<!DOCTYPE html><html><head><meta http-equiv="Content-type" content="text/html; charset=UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" /><link rel="stylesheet" href="/_autoindex/assets/css/autoindex.css" /><script src="/_autoindex/assets/js/tablesort.js"></script><script src="/_autoindex/assets/js/tablesort.number.js"></script><title>Index of /wp-content/uploads/wc-logs/</title></head>
        <body><div class="content"><h1>Index of /wp-content/uploads/wc-logs/</h1>
        <div id="table-list"><table id="table-content"><thead class="t-header"><tr><th class="colname" aria-sort="ascending"><a class="name" href="?ND"  onclick="return false"">Name</a></th><th class="colname" data-sort-method="number"><a href="?MA"  onclick="return false"">Last Modified</a></th><th class="colname" data-sort-method="number"><a href="?SA"  onclick="return false"">Size</a></th></tr></thead>
        <tr data-sort-method="none"><td><a href="/wp-content/uploads/"><img class="icon" src="/_autoindex/assets/icons/corner-left-up.svg" alt="Up">Parent Directory</a></td><td></td><td></td></tr>
        <tr><td data-sort="fatal-errors-2021-02-08-bdf40a8ab42517b015214fa7004ad5f4.log"><a href="/wp-content/uploads/wc-logs/fatal-errors-2021-02-08-bdf40a8ab42517b015214fa7004ad5f4.log"><img class="icon" src="/_autoindex/assets/icons/file.svg" alt="File">fatal-errors-2021-02-08-bdf40a8ab42517b015214fa7004ad5f4.log</a></td><td data-sort="1612764066">2021-02-08 06:01</td><td data-sort="8192">      8k</td></tr>
        <tr><td data-sort="wc-image-regeneration-2021-02-03-c39b1c142558e588061d2705787c788f.log"><a href="/wp-content/uploads/wc-logs/wc-image-regeneration-2021-02-03-c39b1c142558e588061d2705787c788f.log"><img class="icon" src="/_autoindex/assets/icons/file.svg" alt="File">wc-image-regeneration-2021-02-03-c39b1c142558e588061d2705787c788f.log</a></td><td data-sort="1612339360">2021-02-03 08:02</td><td data-sort="4096">      4k</td></tr>
        <tr><td data-sort="wc-image-regeneration-2021-02-04-c39b1c142558e588061d2705787c788f.log"><a href="/wp-content/uploads/wc-logs/wc-image-regeneration-2021-02-04-c39b1c142558e588061d2705787c788f.log"><img class="icon" src="/_autoindex/assets/icons/file.svg" alt="File">wc-image-regeneration-2021-02-04-c39b1c142558e588061d2705787c788f.log</a></td><td data-sort="1612415898">2021-02-04 05:18</td><td data-sort="4096">      4k</td></tr>
        <tr><td data-sort="wc-image-regeneration-2021-02-06-c39b1c142558e588061d2705787c788f.log"><a href="/wp-content/uploads/wc-logs/wc-image-regeneration-2021-02-06-c39b1c142558e588061d2705787c788f.log"><img class="icon" src="/_autoindex/assets/icons/file.svg" alt="File">wc-image-regeneration-2021-02-06-c39b1c142558e588061d2705787c788f.log</a></td><td data-sort="1612600556">2021-02-06 08:35</td><td data-sort="4096">      4k</td></tr>
        <tr><td data-sort="wc-image-regeneration-2021-02-08-c39b1c142558e588061d2705787c788f.log"><a href="/wp-content/uploads/wc-logs/wc-image-regeneration-2021-02-08-c39b1c142558e588061d2705787c788f.log"><img class="icon" src="/_autoindex/assets/icons/file.svg" alt="File">wc-image-regeneration-2021-02-08-c39b1c142558e588061d2705787c788f.log</a></td><td data-sort="1612764078">2021-02-08 06:01</td><td data-sort="4096">      4k</td></tr>
        </table></div>
        </div><script>new Tablesort(document.getElementById("table-content"));</script></body></html>
        ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);