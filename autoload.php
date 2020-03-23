<?php
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