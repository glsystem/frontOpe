<?php

$pastaInterna = "server/";

define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");

if (substr($_SERVER['DOCUMENT_ROOT'], -1) === '/') {
    define('DIRDOC', "{$_SERVER['DOCUMENT_ROOT']}{$pastaInterna}");
} else {
    define('DIRDOC', "{$_SERVER['DOCUMENT_ROOT']}/{$pastaInterna}");
}


#Diretorios Esoecificos

define('DIRCSS', DIRDOC . "css");
define('DIRJS', DIRDOC . "src/js");
define('DIRIMG', DIRDOC . "src/imagens");

