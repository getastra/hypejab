<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/mercurial/testing/hemlo',
    function (Request $request, Response $response) {
        $response->getBody()->write('Under Construction');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);

$app->get(
    '/mercurial/testing/.hg/',
    function (Request $request, Response $response) {
        $response->getBody()->write('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
        <html>
         <head>
          <title>Index of /.hg</title>
         </head>
         <body>
        <h1>Index of /.hg</h1>
          <table>
           <tr><th valign="top">&nbsp;</th><th><a href="?C=N;O=D">Name</a></th><th><a href="?C=M;O=A">Last modified</a></th><th><a href="?C=S;O=A">Size</a></th><th><a href="?C=D;O=A">Description</a></th></tr>
           <tr><th colspan="5"><hr></th></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="/">Parent Directory</a>       </td><td>&nbsp;</td><td align="right">  - </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="00changelog.i">00changelog.i</a>          </td><td align="right">2014-09-27 09:23  </td><td align="right"> 57 </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="bookmarks">bookmarks</a>              </td><td align="right">2015-04-13 08:59  </td><td align="right">  0 </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="branch">branch</a>                 </td><td align="right">2021-10-03 10:42  </td><td align="right">  8 </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="cache/">cache/</a>                 </td><td align="right">2021-10-03 10:42  </td><td align="right">  - </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="dirstate">dirstate</a>               </td><td align="right">2021-10-03 10:42  </td><td align="right">166K</td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="hgrc">hgrc</a>                   </td><td align="right">2014-09-28 04:22  </td><td align="right"> 36 </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="last-message.txt">last-message.txt</a>       </td><td align="right">2018-10-27 06:50  </td><td align="right">  9 </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="requires">requires</a>               </td><td align="right">2014-09-27 09:23  </td><td align="right"> 33 </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="shamap">shamap</a>                 </td><td align="right">2014-09-27 10:11  </td><td align="right"> 89K</td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="store/">store/</a>                 </td><td align="right">2021-10-03 10:42  </td><td align="right">  - </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="undo.backup.dirstate">undo.backup.dirstate</a>   </td><td align="right">2018-10-27 06:44  </td><td align="right">144K</td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="undo.bookmarks">undo.bookmarks</a>         </td><td align="right">2021-10-03 10:42  </td><td align="right">  0 </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="undo.branch">undo.branch</a>            </td><td align="right">2021-10-03 10:42  </td><td align="right">  7 </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="undo.desc">undo.desc</a>              </td><td align="right">2021-10-03 10:42  </td><td align="right"> 37 </td><td>&nbsp;</td></tr>
        <tr><td valign="top">&nbsp;</td><td><a href="undo.dirstate">undo.dirstate</a>          </td><td align="right">2021-10-03 10:42  </td><td align="right">166K</td><td>&nbsp;</td></tr>
           <tr><th colspan="5"><hr></th></tr>
        </table>
        </body></html>');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);