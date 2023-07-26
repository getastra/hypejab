<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/index.php',
    function (Request $request, Response $response) {
        $response->getBody()->write('
        <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr"><head>
<link rel="icon" href="./favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
<title>www.birros.eu / localhost / information_schema | phpMyAdmin 2.11.6</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">
// <![CDATA[
    // definitions used in querywindow.js
    var common_query = \'token=884a16bd5c1a59935d2c3588db518d33\';
    var opendb_url = \'db_structure.php\';
    var safari_browser = true;
    var querywindow_height = 400;
    var querywindow_width = 600;
    var collation_connection = \'utf8_unicode_ci\';
    var lang = \'en-utf-8\';
    var server = \'1\';
    var table = \'\'
    var db    = \'information_schema\';
    var text_dir = \'ltr\';
    var pma_absolute_uri = \'http://www.birros.eu/phpMyAdmin/\';

    // for content and navigation frames

    var frame_content = 0;
    var frame_navigation = 0;
    function getFrames() {
        frame_content = window.frames[1];
        frame_navigation = window.frames[0];
    }
    var onloadCnt = 0; 
    var onLoadHandler = window.onload;
    window.onload = function() {
        if (onloadCnt == 0) {
            if (typeof(onLoadHandler) == "function") { 
                onLoadHandler(); 
            }
            if (typeof(getFrames) != \'undefined\' && typeof(getFrames) == \'function\') { 
                getFrames(); 
            }
            onloadCnt++;
        }
    };
// ]]>
</script>
<script src="./js/querywindow.js" type="text/javascript"></script>
</head>
<frameset cols="200,*" rows="*" id="mainFrameset">
        <frame frameborder="0" id="frame_navigation" src="navigation.php?db=information_schema&amp;token=884a16bd5c1a59935d2c3588db518d33" name="frame_navigation">
        <frame frameborder="0" id="frame_content" src="db_structure.php?db=information_schema&amp;token=884a16bd5c1a59935d2c3588db518d33" name="frame_content">
        <noframes>
        <body>
            <p>phpMyAdmin is more friendly with a <b>frames-capable</b> browser.</p>
        </body>
    </noframes>
</frameset>

</html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);