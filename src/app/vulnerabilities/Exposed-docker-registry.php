<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/v2/',
    function (Request $request, Response $response) {
        $response->getBody()->write('
            
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
 <head>
  <title>Index of /v2</title>
 </head>
 <body>
<h1>Index of /v2</h1>
  <table>
   <tr><th valign="top"><img src="/apacheicons/blank.gif" alt="[ICO]"></th><th><a href="?C=N;O=D">Name</a></th><th><a href="?C=M;O=A">Last modified</a></th><th><a href="?C=S;O=A">Size</a></th><th><a href="?C=D;O=A">Description</a></th></tr>
   <tr><th colspan="5"><hr></th></tr>
<tr><td valign="top"><img src="/apacheicons/unknown.gif" alt="[   ]"></td><td><a href="/">Parent Directory</a>       </td><td>&nbsp;</td><td align="right">  - </td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/apacheicons/layout.gif" alt="[   ]"></td><td><a href="01_Haller.pdf">01_Haller.pdf</a>          </td><td align="right">2015-04-04 17:57  </td><td align="right">4.4M</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/apacheicons/layout.gif" alt="[   ]"></td><td><a href="02_Thiel_Maggraf_Druck.pdf">02_Thiel_Maggraf_Dru..&gt;</a></td><td align="right">2015-04-04 17:57  </td><td align="right">247K</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/apacheicons/layout.gif" alt="[   ]"></td><td><a href="03_Schweiger_Ferjani.pdf">03_Schweiger_Ferjani..&gt;</a></td><td align="right">2015-04-04 17:57  </td><td align="right">216K</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/apacheicons/layout.gif" alt="[   ]"></td><td><a href="04_Zapilko.pdf">04_Zapilko.pdf</a>         </td><td align="right">2015-04-04 17:57  </td><td align="right">197K</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/apacheicons/layout.gif" alt="[   ]"></td><td><a href="05_Nuppenau.pdf">05_Nuppenau.pdf</a>        </td><td align="right">2015-04-04 17:57  </td><td align="right">243K</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/apacheicons/layout.gif" alt="[   ]"></td><td><a href="06_Heyder_Theuvsen.pdf">06_Heyder_Theuvsen.pdf</a> </td><td align="right">2015-04-04 17:58  </td><td align="right">284K</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/apacheicons/layout.gif" alt="[   ]"></td><td><a href="07_Mack.pdf">07_Mack.pdf</a>            </td><td align="right">2015-04-04 17:55  </td><td align="right">748K</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/apacheicons/layout.gif" alt="[   ]"></td><td><a href="08_Wydler.pdf">08_Wydler.pdf</a>          </td><td align="right">2015-04-04 17:55  </td><td align="right">329K</td><td>&nbsp;</td></tr>
<tr><td valign="top"><img src="/apacheicons/layout.gif" alt="[   ]"></td><td><a href="09_Kilchsperger.pdf">09_Kilchsperger.pdf</a>    </td><td align="right">2015-04-04 17:55  </td><td align="right">199K</td><td>&nbsp;</td></tr>
   <tr><th colspan="5"><hr></th></tr>
</table>
</body></html>
');
        return $response->withHeader("content-type", "text/html")
                        ->withStatus(200);
    }
);
