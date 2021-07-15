<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
  '/sitemap.xml',
  function (Request $request, Response $response, array $args) use ($app) {
      $routes  = array_diff(
        array_map(
          function ($r) {
              return $r->getPattern();
          },
          $app->getRouteCollector()->getRoutes()
        ),
        ['/sitemap.xml']
      );
      $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL
                 . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'
                 . PHP_EOL;
      $baseurl = $request->getUri()->getScheme() . '://' . $request->getUri()
                                                                   ->getHost()
                 . ':' . $request->getUri()->getPort();
      foreach ($routes as $route) {
          $sitemap .= '<url>' . PHP_EOL;
          $sitemap .= '    <loc>' . $baseurl . $route . '</loc>' . PHP_EOL;
          $sitemap .= '</url>' . PHP_EOL;
      }
      $sitemap .= '</urlset>';
      $response->getBody()->write($sitemap);
      return $response->withHeader("content-type", "application/xml");
  }
);

$app->get(
  '/',
  function (Request $request, Response $response, array $args) {
      $response->getBody()->write(
        "Welcome to HypeJab! 💉 😃 <br>"
        . "HypeJab is a deliberately vulnerable web application"
        . " intended for benchmarking automated scanners."
      );
      return $response;
  }
);
