<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$app->get(
    '/hypejablogin',
    function (Request $request, Response $response) {
        session_start();
        if (isset($_SESSION['user'])) {
            header("Location: /loginPoll");
            die();
        }
        $html = file_get_contents(__DIR__ . "/../resources/hypejab-login/hypejablogin.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);


$app->get(
    '/hypejablogin2',
    function (Request $request, Response $response) {
        session_start();
        if (isset($_SESSION['user'])) {
            header("Location: /loginPoll");
            die();
        }
        $html = file_get_contents(__DIR__ . "/../resources/hypejab-login/hypejablogin2.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);


$app->get(
    '/hypejablogin3',
    function (Request $request, Response $response) {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            // If no username provided, present the auth challenge.
            header('WWW-Authenticate: Basic realm="My Website"');
            header('HTTP/1.0 401 Unauthorized');
            // User will be presented with the username/password prompt
            // If they hit cancel, they will see this access denied message.
            echo '<p>Access denied. You did not enter a password.</p>';
            exit; // Be safe and ensure no other content is returned.
        }
        
        // If we get here, username was provided. Check password.
        if ($_SERVER['PHP_AUTH_PW'] == 'heisenberg') {
            session_start();
            $_SESSION['user'] = 'Heisenberg';
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
            header("Location: /loginPoll");
            die();
        } else {
            $response->getBody()->write('Wrong username or password.');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        }
    }
);

$app->get(
    '/hypejablogin4',
    function (Request $request, Response $response) {
        session_start();
        if (isset($_SESSION['user'])) {
            header("Location: /loginPoll");
            die();
        }
        $html = file_get_contents(__DIR__ . "/../resources/hypejab-login/hypejab2falogin.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/hypejablogin5',
    function (Request $request, Response $response) {
        session_start();
        if (isset($_SESSION['user'])) {
            header("Location: /loginPoll");
            die();
        }
        $html = file_get_contents(__DIR__ . "/../resources/hypejab-login/hypejabloginJWT.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/hypejablogin6',
    function (Request $request, Response $response) {
        session_start();
        if (isset($_SESSION['user'])) {
            header("Location: /loginPoll");
            die();
        }
        $html = file_get_contents(__DIR__ . "/../resources/hypejab-login/hypejablogin6.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/hypejablogin2fa',
    function (Request $request, Response $response) {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /");
            die();
        }
        $html = file_get_contents(__DIR__ . "/../resources/hypejab-login/hypejab2fa.html");
        $response->getBody()->write($html);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get('/jwt-protected-page', function(Request $request, Response $response) {
    $token = $_COOKIE['jwt_token'];

    if (!$token) {
        $response->getBody()->write('<p>Access Denied - No token provided.</p>');
        return $response->withHeader("content-type", "text/html")
            ->withStatus(404);
    }

    $key = 'my_secret_astra_key';
    $tokenData = [
        "user_id" => 123,
        "username" => "exampleuser",
        "scope" => "limited"
    ];

    $actualToken = [
        "user_id" => 123,
        "username" => "exampleuser",
        "panCard" => "AKYSG1973G"
    ];

    $bodytoken = JWT::encode($tokenData, $key, 'HS256');

    try {
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
        $response->getBody()->write('<h3>'.$bodytoken.'</h3><p>Access Granted. Decoded Data: ' . json_encode($actualToken) . '</p>');
        return $response->withHeader("content-type", "text/html")
            ->withStatus(200);
    } catch (Exception $e) {
        $response->getBody()->write('<p>Access Denied. Exception arised : ' . $e->getMessage() . '</p>');
        return $response->withHeader("content-type", "text/html")
            ->withStatus(501);
    }
});

$app->post(
    '/hypejabloginpassword',
    function (Request $request, Response $response) {

        if ($_POST['username'] == 'say+my+name@bb.com') {
            session_start();
            if (isset($_SESSION['user'])) {
                header("Location: /loginPoll");
                die();
            }
            $html = file_get_contents(__DIR__ . "/../resources/hypejab-login/hypejabloginpassword.html");
            $response->getBody()->write($html);
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
            die();
        } else {
            $response->getBody()->write('Wrong username');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        }
    }
);

$app->post(
    '/hypejablogout',
    function (Request $request, Response $response) {
        session_start();
        if (isset($_SESSION['user'])) {
            session_destroy();
            if (isset($_SESSION['logindif'])) {
                header("Location: /hypejablogin2");
            } else {
                header("Location: /hypejablogin");
            }
            die();
        } else {
            header("Location: /loginPoll");
            die();
        }
        $response->getBody()->write('Logging out...');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->post(
    '/loginVerify',
    function (Request $request, Response $response) {
        if (($_POST['username'] == 'say+my+name@bb.com' && $_POST['password'] == 'heisenberg') || ($_POST['username'] == 'say+my+name+admin@bb.com' && $_POST['password'] == 'heisenberg')) {
            session_start();
            if ($_POST['username'] == 'say+my+name+admin@bb.com'){
                $_SESSION['user'] = 'Admin';
            } else {
                $_SESSION['user'] = 'Heisenberg';
            }
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

            if ($_POST['username'] == 'say+my+name+admin@bb.com'){
                header("Location: /loginPollAdmin");
            } else {
                header("Location: /loginPoll");
            }
            
            
            die();
        } else {
            $response->getBody()->write('Wrong username or password.');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        }
    }
);


$app->post(
    '/loginVerify2',
    function (Request $request, Response $response) {
        if ($_POST['password'] == 'heisenberg') {
            session_start();
            $_SESSION['user'] = 'Heisenberg';
            $_SESSION['logindif'] = 'true';
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
            header("Location: /loginPoll");
            die();
        } else {
            $response->getBody()->write('Wrong password.');
            return $response->withHeader("content-type", "text/html")
                            ->withStatus(200);
        }
    }
);

$app->post(
    '/loginVerify4',
    function (Request $request, Response $response) {
        session_start();

        if (isset($_SESSION['user'])) {
            header("Location: /loginPoll");
            die();
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == 'say+my+name@bb.com' && $password == 'heisenberg') {
            // Check the 2FA code
            $_SESSION['user'] = 'Heisenberg';
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
            header("Location: /hypejablogin2fa");
            die();
        } else {
            $response->getBody()->write('Wrong username or password.');
        }

        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->post(
    '/2faVerify',
    function (Request $request, Response $response) {
        session_start();

        $_body = $request->getBody();
        
        if(!empty($_body)){
            $_obj = json_decode($_body, FALSE);
            $_otp = $_obj->otp;
            //echo $_otp;
            $status  = 200;
            if(isset($_otp)){
                if (is_string($_otp) && $_otp == '123456') {
                    $resp = [
                        'success' => true
                    ];
                } else if (is_array($_otp) && in_array('123456', $_otp)) {
                    $resp = [
                        'success' => true
                    ];
                } else {
                    $resp = [
                        'success' => false
                    ];
                    $status = 401;
                }
                
                $response->getBody()->write(json_encode($resp, JSON_PRETTY_PRINT));
                return $response->withHeader("content-type", "application/json")
                                ->withStatus($status);
            }
            else{
                $resp = [
                    'success' => false
                ];
                $response->getBody()->write(json_encode($resp, JSON_PRETTY_PRINT));
                return $response->withHeader("content-type", "application/json")
                                ->withStatus(401);
            }
        } else {
            $response->getBody()->write('{"error":" Bad request"}');
            return $response->withStatus(400);
        }
    }
);

$app->post(
    '/loginVerifyJWT', function (Request $request, Response $response) {

    if ($_POST['username'] == 'say+my+name@bb.com' && $_POST['password'] == 'heisenberg') {
        $key = 'my_secret_astra_key'; 
        $tokenData = [
            "user_id" => 123,
            "username" => "exampleuser",
            "panCard" => "AKYSG1973G"
        ];

        $token = JWT::encode($tokenData, $key, 'HS256');
        setcookie('jwt_token', $token, time() + 3600, '/');
        header("Location: /jwt-protected-page");
        exit;
    } else {
        http_response_code(401);
        echo json_encode(["message" => "Access denied."]);
        exit;
    }
});

$app->post(
    '/loginVerify6',
    function (Request $request, Response $response) {
        session_start();

        if (isset($_SESSION['user'])) {
            header("Location: /loginPoll");
            die();
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == 'say+my+name@bb.com' && $password == 'heisenberg') {
            // Check the 2FA code
            $_SESSION['user'] = 'Heisenberg';
            $_SESSION['redirect'] = true;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
            header("Location: /session?phpsessid=1234567890");
            die();
        } else {
            $response->getBody()->write('Wrong username or password.');
        }

        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);