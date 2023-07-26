<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/api/v4/ci/lint',
    function (Request $request, Response $response, array $args) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('{"error": "404 Not Found"}');
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(404);
    }
);

$app->post(
    '/api/v4/ci/lint',
    function (Request $request, Response $response, array $args) {
        require __DIR__ . '/../login/checkSession.php';
        $_body = $request->getBody();
        
        if(!empty($_body)){
            $_obj = json_decode($_body, FALSE);
            $_content = $_obj->content;
            if(isset($_content)){
                $_resp='{"status": "valid","errors": [],"warnings": [],"merged_yaml": "API\n:.api_test:\n  :rules:\n  - :if: $CI_PIPELINE_SOURCE==\"merge_request_event\"\n    :changes:\n    - src/api/*\n:deploy:\n  :rules:\n  - :when: manual\n    :allow_failure: true\n  :extends:\n  - \".api_test\"\n  :script:\n  - echo \"hello world\"" }';
                $response->getBody()->write($_resp);
                return $response->withHeader("content-type", "application/json")
                                ->withStatus(200);
            }
            else{
                $response->getBody()->write('{"error": "404 Not Found"}');
                return $response->withHeader("content-type", "application/json")
                                ->withStatus(404);
            }
        }else {
            return $response->withStatus(400);
        }
    }
);