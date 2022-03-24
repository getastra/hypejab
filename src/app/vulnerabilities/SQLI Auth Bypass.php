<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/sqli-auth-bypass-login-page',
    function (Request $request, Response $response, $args) {
        require __DIR__ . '/../login/checkSession.php';

        session_start();
        if (isset($_SESSION["sqli-auth-bypass"])) {
            $response->getBody()->write('');
            return $response->withHeader("Location", "sqli-auth-bypass-admin-account")
                            ->withStatus(302);
        }

        $response->getBody()->write('
<html>
    <head>
        <title>SQLI AUTH BYPASS LOGIN PAGE</title>
        <style>
            body{margin:0;padding:0;background:url(https://i.ibb.co/VQmtgjh/6845078.png) no-repeat;height:100vh;font-family:sans-serif;background-size:cover;background-repeat:no-repeat;background-position:center;overflow:hidden}@media screen and (max-width:600px;){body{background-size:cover}}#particles-js{height:100%}.loginBox{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:350px;min-height:200px;background:#000;border-radius:10px;padding:40px;box-sizing:border-box}.user{margin:0 auto;display:block;margin-bottom:20px;border-radius:50%}h3{margin:0;padding:0 0 20px;color:#59238f;text-align:center}.loginBox input{width:100%;margin-bottom:20px}.loginBox input[type=password],.loginBox input[type=text]{border:none;border-bottom:2px solid #262626;outline:0;height:40px;color:#fff;background:0 0;font-size:16px;padding-left:20px;box-sizing:border-box}.loginBox input[type=password]:hover,.loginBox input[type=text]:hover{color:#42f3fa;border:1px solid #42f3fa;box-shadow:0 0 5px rgba(0,255,0,.3),0 0 10px rgba(0,255,0,.2),0 0 15px rgba(0,255,0,.1),0 2px 0 #000}.loginBox input[type=password]:focus,.loginBox input[type=text]:focus{border-bottom:2px solid #42f3fa}.inputBox{position:relative}.inputBox span{position:absolute;top:10px;color:#262626}.loginBox input[type=submit]{border:none;outline:0;height:40px;font-size:16px;background:#59238f;color:#fff;border-radius:20px;cursor:pointer}.loginBox a{color:#262626;font-size:14px;font-weight:700;text-decoration:none;text-align:center;display:block}a:hover{color:#0ff}p{color:#00f}
        </style>
    </head>
    <body>
        <div class="loginBox"> <img class="user" src="https://www.giantbomb.com/a/uploads/square_medium/0/5892/379088-naruto_shikamaru0199.jpg" height="100px" width="100px">
            <h3>Log in</h3>
            <form action="/sqli-auth-bypass-verification" method="post">
                <div class="inputBox"> 
                    <input id="uname" type="text" name="Username" placeholder="Username"> 
                    <input id="pass" type="password" name="Password" placeholder="Password"> 
                </div> 
                <input type="submit" name="login" value="Login">
            </form> <a href="#">Forgot Password<br> </a>
        </div>
    </body>
</html>
    ');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->post(
    '/sqli-auth-bypass-verification',
    function (Request $request, Response $response, $args) {

        require __DIR__ . '/../login/checkSession.php';

        $username = $_POST["Username"];
        $password = $_POST["Password"];

        if ($username == 'admin" or "1"="1' && $password == 'admin" or "1"="1') {
            session_start();
            $_SESSION["sqli-auth-bypass"] = "True";
            $response->getBody()->write('');
            return $response->withHeader("Location", "sqli-auth-bypass-admin-account")
                            ->withStatus(302);
        } else {
            $response->getBody()->write('Wrong credentials');
            return $response->withHeader("Content-Type", "text/html")
                            ->withStatus(200);
        }
    }
);

$app->get(
    '/sqli-auth-bypass-admin-account',
    function (Request $request, Response $response, $args) {
        require __DIR__ . '/../login/checkSession.php';

        session_start();
        if (isset($_SESSION["sqli-auth-bypass"])) {
            $response->getBody()->write('You\'re in!');
            return $response->withHeader("Content-Type", "text/html")
                            ->withStatus(200);
        } else {
            $response->getBody()->write('');
            return $response->withHeader("Location", "sqli-auth-bypass-login-page")
                            ->withStatus(302);
        }
    }
);