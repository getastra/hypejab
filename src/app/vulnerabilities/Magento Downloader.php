<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/downloader/',
    function (Request $request, Response $response) {
        require __DIR__ . '/../login/checkSession.php';
        $response->getBody()->write('
        <html>
            <head>
                <title>Magento Downloader</title>
            </head>
            <body>
                <div style="width: 50%; margin: auto; margin-top: 100px; font-family: sans-serif;">
                    <h1>Login</h1>
                    <p>
                        Please re-enter your Magento Adminstration Credentials. <br>
                        Only administrators with full permissions will be able to log in.
                    </p>
                    <form>
                        <table>
                            <tr>
                                <th> Username: </th>
                                <td> <input type="text" name="username" id="username"> </td>
                            </tr>
                            <tr>
                                <th> Password: </th>
                                <td> <input type="password" name="pass" id="pass"> </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </body>
        </html>
        ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);