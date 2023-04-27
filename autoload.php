<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('BASE_URL',$_ENV['BASE_PATH']);
define('DB_HOST',$_ENV['DB_HOST']);
define('DB_DATABASE',$_ENV['DB_DATABASE']);
define('DB_USER',$_ENV['DB_USERNAME']);
define('DB_PASSWORD',$_ENV['DB_PASSWORD']);

session_start();

require 'utils/functions.php';


spl_autoload_register(function ($className){
    $path = "BaseClass/$className.php";
    if (file_exists($path)){
        include $path;
    }
});
spl_autoload_register(function ($className){
    $path = "models/$className.php";
    if (file_exists($path)){
        include $path;
    }
});
spl_autoload_register(function ($className){
    $path = "controllers/$className.php";
    if (file_exists($path)){
        include $path;
    }
});
