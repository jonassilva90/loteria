<?php

if(!defined("PATH")) {
    define("PATH", realpath(__DIR__) . DIRECTORY_SEPARATOR);
}

require PATH . 'vendor/autoload.php';

@session_start();
ob_start();

require PATH . "config.php";
require PATH . "src/routers/http.php";

