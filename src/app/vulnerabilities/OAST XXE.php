<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/xxe-post?productId=2',
    function (Request $request, Response $response) {
        $response->getBody()->write('');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/xxe-post',
    function (Request $request, Response $response) {
        $data = '<?xml version="1.0"?><check>';
        $query = $request->getQueryParams();
        foreach ($query as $key => $value) {
            $data = $data . '<' . $key . '>' . $value . '</' . $key . '>';
        }
        $data = $data . '</check>';
        $response->getBody()->write($data);
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->post(
    '/xxe-post',
    function (Request $request, Response $response) {

        $reqBody = $request->getParsedBody();
        $reqBody = $request->getParsedBody()->asXML();
        $prodIdPattern = '/productId\>([a-zA-Z0-9&;]+)/';
        preg_match_all($prodIdPattern, (string)$reqBody, $prodMatch);
        $prodId = $prodMatch[1][0];
        $doctypePattern = '/\<\!ENTITY ([a-zA-Z0-9]+) SYSTEM \"([^\"]+)"/';
        preg_match_all($doctypePattern, (string)$reqBody, $matches);
        $urlPattern = '/http(s)?:\/\/[a-zA-Z0-9\-\.]+[a-zA-Z]{2,4}(\/)?/';
        preg_match_all($urlPattern, (string)$reqBody, $urlMatch);

        if (strcmp($prodId, "2") == 0) {

            $response->getBody()->write("In stock.");
            //$reqBody->asXML()

        } else if (preg_match($doctypePattern, (string)$reqBody) && ('&'.$matches[1][0].';') == $prodId && $matches[2][0] == 'file:///etc/passwd') {
            
            $passwd = 'SoMeThIng WeNt Wr0nG
root:x:0:0:root:/root:/bin/bash
bin:x:1:1:bin:/bin:/sbin/nologin
daemon:x:2:2:daemon:/sbin:/sbin/nologin
adm:x:3:4:adm:/var/adm:/sbin/nologin
lp:x:4:7:lp:/var/spool/lpd:/sbin/nologin
sync:x:5:0:sync:/sbin:/bin/sync
shutdown:x:6:0:shutdown:/sbin:/sbin/shutdown
halt:x:7:0:halt:/sbin:/sbin/halt
mail:x:8:12:mail:/var/spool/mail:/sbin/nologin
news:x:9:13:news:/etc/news:
uucp:x:10:14:uucp:/var/spool/uucp:/sbin/nologin
operator:x:11:0:operator:/root:/sbin/nologin
games:x:12:100:games:/usr/games:/sbin/nologin
gopher:x:13:30:gopher:/var/gopher:/sbin/nologin
ftp:x:14:50:FTP User:/var/ftp:/sbin/nologin
nobody:x:99:99:Nobody:/:/sbin/nologin
rpm:x:37:37::/var/lib/rpm:/sbin/nologin
dbus:x:81:81:System message bus:/:/sbin/nologin
nscd:x:28:28:NSCD Daemon:/:/sbin/nologin
vcsa:x:69:69:virtual console memory owner:/dev:/sbin/nologin
pcap:x:77:77::/var/arpwatch:/sbin/nologin
rpc:x:32:32:Portmapper RPC user:/:/sbin/nologin
avahi:x:70:70:Avahi daemon:/:/sbin/nologin';

            $response->getBody()->write($passwd);
        } else if (preg_match($urlPattern, (string)$reqBody)) {
            
            $ch = curl_init($urlMatch[0][0]);
 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($ch);
            
            curl_close($ch);
            
            echo $data;

        }

        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);