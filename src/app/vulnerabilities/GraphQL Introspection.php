<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/graphql',
    function (Request $request, Response $response) {
        $data = '{"errors":[{"message":"Unexpected end of document","locations":[]}]}';

        $response->getBody()->write($data);
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(200);;
    }
);

$app->post('/graphql', function (Request $request, Response $response) {
    $query = $request->getParsedBody()['query'];

    // Check if introspection query is made
    if (preg_match('/__schema/', $query)) {
        // If introspection query is made, return introspection information
        $introspection = '{
            "__schema": {
                "queryType": {
                  "name": "Query"
                },
                "types": [
                  {
                    "kind": "OBJECT",
                    "name": "Query",
                    "fields": [
                      {
                        "name": "hello",
                        "type": {
                          "kind": "SCALAR",
                          "name": "String"
                        }
                      }
                    ]
                  }
                ]
            }
        }';

        $response->getBody()->write($introspection);
    } else {
        // If not introspection query, return dummy data
        $data = '{
            "data": {
                "hello": "world"
            }
        }';

        $response->getBody()->write($data);
    }

    return $response->withHeader("content-type", "application/json")
                    ->withStatus(200);;
});