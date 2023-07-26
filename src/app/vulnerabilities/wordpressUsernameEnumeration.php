<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/wp-json/wp/v2/users',
    function (Request $request, Response $response) {
        $dataArray = '[{"id":4,"name":"Darth Vader","url":"","description":"","link":"https:\/\/www.iamyourfather.luther.in\/author\/dankdark\/","slug":"vaderdarth","avatar_urls":{"24":"https:\/\/secure.gravatar.com\/avatar\/fea263f99fef430cac704256381586d8?s=24&d=mm&r=g"},"meta":[],"_links":{"self":[{"href":"https:\/\/www.iamyourfather.luther.in\/wp-json\/wp\/v2\/users\/4"}],"collection":[{"href":"https:\/\/www.iamyourfather.luther.in\/wp-json\/wp\/v2\/users"}]}},{"id":1,"name":"ganeshalhat","url":"","description":"Developer","link":"https:\/\/www.iamyourfather.luther.in\/author\/ganeshalhat\/","slug":"ganeshalhat","avatar_urls":{"24":"https:\/\/secure.gravatar.com\/avatar\/39ff801fc17d17c3481a7b1a4d387450?s=24&d=mm&r=g"},"meta":[],"_links":{"self":[{"href":"https:\/\/www.iamyourfather.luther.in\/wp-json\/wp\/v2\/users\/1"}],"collection":[{"href":"https:\/\/www.iamyourfather.luther.in\/wp-json\/wp\/v2\/users"}]}}]';
        $response->getBody()->write(json_encode(json_decode($dataArray, true)));
        return $response->withHeader("Content-Type", "application/json")
                        ->withStatus(200);
    }
); 