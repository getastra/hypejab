<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/wp-debug',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('<b>Parse error</b> missing \')\' on line <b>189</b>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/laravel-debug',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('<title>Whoops! There was an error.</title><br><span class="exc-title-primary">ErrorException</span>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(500);
    }
);

$app->get(
    '/asp-debug',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('<span><H1>Server Error in \'/\' Application.<hr width=100% size=1 color=silver></H1><br><h2> <i>Configuration Error</i> </h2>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(500);
    }
);

$app->get(
    '/django-debug',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('<h1>TypeError at /app </h1><br><th>Exception Type:</th> <td>TypeError</td>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(500);
    }
);

$app->get(
    '/flask-debug',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('
      <html>
        <head>
          <title>TypeError: The view function did not return a valid response. The function either returned None or ended without a return statement. // Werkzeug Debugger</title>
        </head>
        <body style="background-color: #fff">
          <div class="debugger">
      <h1>TypeError</h1>
      <div class="detail">
        <p class="errormsg">TypeError: The view function did not return a valid response. The function either returned None or ended without a return statement.</p>
      </div>
      <h2 class="traceback">Traceback <em>(most recent call last)</em></h2>
      <div class="traceback">
        
        <ul><li><div class="frame" id="frame-140626349833576">
        <h4>File <cite class="filename">"/usr/local/lib/python3.5/dist-packages/flask/app.py"</cite>,
            line <em class="line">2463</em>,
            in <code class="function">__call__</code></h4>
        <div class="source "><pre class="line before"><span class="ws"></span> </pre>
      <pre class="line before"><span class="ws">    </span>def __call__(self, environ, start_response):</pre>
      <pre class="line before"><span class="ws">        </span>&quot;&quot;&quot;The WSGI server calls the Flask application object as the</pre>
      <pre class="line before"><span class="ws">        </span>WSGI application. This calls :meth:`wsgi_app` which can be</pre>
      <pre class="line before"><span class="ws">        </span>wrapped to applying middleware.&quot;&quot;&quot;</pre>
      <pre class="line current"><span class="ws">        </span>return self.wsgi_app(environ, start_response)</pre>
      <pre class="line after"><span class="ws"></span> </pre>
      <pre class="line after"><span class="ws">    </span>def __repr__(self):</pre>
      <pre class="line after"><span class="ws">        </span>return &quot;&lt;%s %r&gt;&quot; % (self.__class__.__name__, self.name)</pre></div>
      </div>
      ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(500);
    }
);