<?php

use myClasses\Router;
use myClasses\BaseDB;

$time = date("H:m:s");

spl_autoload_register(function ($class) {
    $path=str_replace('\\', '/',$class.'.php');
    if (file_exists($path)){
        require $path;
    }
});

session_start ();

$router = new Router;
$router->run();

require 'Error/Dev.php';