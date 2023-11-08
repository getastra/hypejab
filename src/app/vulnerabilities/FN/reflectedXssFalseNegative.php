<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/ref-xss-fn',
    function (Request $request, Response $response) {

        $query = '';
        if (isset($request->getQueryParams()['search'])) {
            $query = $request->getQueryParams()['search'];
        }

        $query = str_replace('"', '&quot;', $query);
        $data = "<div class=\"image-container\" data-snk-e-parent=\"null\">
        <a class=\"link\" href=\"/yolo\"
        data-snk-e-cxt='[{\"\$entity\": \"element\", \"id\": \"imageLink\", \"location\": \"" . $query . "\"}]'
        data-snk-e-loc=\"" . $query . "\">Hello</a>
        </div>";

        $response->getBody()->write($data);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/ref-xss-fn?search=fancyPants',
    function (Request $request, Response $response, $args) {

        $response->getBody()->write("");
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);