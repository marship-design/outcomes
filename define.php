<?php

if(strstr($_SERVER["SERVER_NAME"], "localhost") != ''){

    define('HTTP', 'http://');
    define('HOST','localhost');
    define('PROJECT_FOLDER', '/outcomes/');

    define('SITE', 'local');

}else{

    define('HTTP', 'http://');
    define('HOST','outcomes.marshipdesign.pl');
    define('PROJECT_FOLDER', '/');

    define('SITE', 'dev');

}