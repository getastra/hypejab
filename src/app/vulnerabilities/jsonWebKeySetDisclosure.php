<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/oidc/jwks.json',
    function (Request $request, Response $response) {
        $response->getBody()->write('{"keys":[{"kty":"EC","crv":"P-256","x":"MKBCTNIcKUSDii11ySs3526iDZ8AiTo7Tu6KPAqv7D4","y":"4Etl6SRW2YiLUrN5vfvVHuhp7x8PxltmWWlbbM4IFyM","d":"870MB6gfuTJ4HtUnUvYMyJpr5eUZNP4Bk43bVdj3eAE","use":"enc","kid":"1"},{"kty":"RSA","e":"AQAB","use":"sig","kid":"any.oidc-signature-id.production.jwk.v.1","alg":"RS256","n":"uYE6l99b6A9w1Vv3SMDpbncFtlXJrrCC8cYb7vBV9FEBAF_79r7UvJEgBKBUn9Q3ZNJBhc9WI5ep9WYk_LiT0uh8Ykci83S8HFbiEdxraEal3U-Pc_W8h_cjEyzghcy1B00updZYjbSERg1n6kUYM9mq3e_LA8ObO42xVl2V1SUArbk2OS6U6cKO3imjVTWnHJAecWVbRxqiBovps6G3Lkh-rorriFNRBHW_HsdCqYxBjbQU-GNsDwlOLsjXNfkyS0LLxSxYFkPFNJQ_cYbVjb9N2TnEVj8H4SOSqKoqCL_vRfD-ZXVqwt2LGEYdaLGPfcaADKdBT7fYkzbbil_VEQ"},{"kty":"RSA","e":"AQAB","use":"sig","kid":"prod.signature-oidc-hsmod","alg":"RS256","n":"jFRXSddTjVrkkr32_0GNosGCYYh6YRO5RYnwqNEvbfiV7imO12YePz_J2MjdnFfoNCr6NDPkLWKZ4-f0oCIZ2wRY6TZ6gYO0FrqIEfuQ5mAPDVZU1ukGVhvoAIISTd1Lg91BSOxpGxeCSQu2-dsQisjaRWUe4VOwtNn5w3V2G3aymOWwSXhsP1quWoAzlw-Kkrou3KXbr4jObqAqaqoPaO6Xrk4-lDJsps1JIgCHBTu8OoRawlta20qHszxMLVtdWrLenlTwagr1ZsWa635Xw-0HiFvO4XyGHr6SjqvJhG6XfLX-n-th7FOOKhIdOu03fzJC9idjuNVqM1yx0WOmqw"},{"kty":"RSA","e":"AQAB","use":"sig","kid":"prod.signature-oidc-hsmod-2022","alg":"RS256","n":"0-8NhYXyBrMIsIpYqmEt27Kr5n81hW9QCuU7OfIDUsVrdGoHY7YwfV8VLiWBvgHMpxsTeFqfsdzHJ3qqHYfaFuOHmsEmgx_waXPvnI2Ow15Yiii9tjWCpBSSUknCNJJqvfirT2M4N1fJgInT8bJD3CI8iYz5Lc2eeN9wReB3YD8Ojzl3_2Gw02HRqPguykQXLog3HzETcpHgq_PB55atMeSUy7RUnC2c0ZtbZ1yNy5ckDUDNLAYgXmFthKLrcj-MHBh5Y2YPaN8yIHLrbzt9eM9XNPOLq6O2f9wU0V87aEiRVRl_yIPaiyb-ZMOE0IyKCXFnGZudi4iEnlvIvp_Mrw"},{"kty":"RSA","e":"AQAB","use":"enc","kid":"any.oidc-encryption-id.production.jwk.v.1","alg":"RSA-OAEP","n":"gHxmL6IZhCqlvZilyZdu5R-V-EW7c9rAU0Y0seiqc15aJ9mmq3ffE_Z__gmnfWxwunr19mJLdifx07rGJ0AKqv0gvyxIOk5TBDWKrkluYfP0DQrcSuOFPmic7i47WpFmvlgXm6HDMD3VpI6JD5NHChZsVosuSGBxSa8WK4O3twlaWrS394W6XR0GL69RvFePZkFopPhkAUMWgVN6IUTdBJN3AbINb4_mgxBRZPeeWjcNBD_dexKdSvoLYigO3Y1pz8JrPkqXuvHQQmwZjLk4YwPs3fFkuisjbZHTDP-ECI7QmquvJjg9dnO1ICjmC5btzXsaQnnyswRNb28XK24x9w"}]}');
        return $response->withHeader("content-type", "application/json")
                        ->withStatus(200);
    }
);