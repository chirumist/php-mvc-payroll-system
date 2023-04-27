<?php 

function view($path, $data = []) {
  require "views/{$path}.php";
}

function route($path){
    echo BASE_URL.'/'.$path;
}

function assets($path){
    echo 'http://'.$_SERVER['HTTP_HOST'].BASE_URL.$path;
}