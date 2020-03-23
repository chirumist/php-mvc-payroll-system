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

function dd(...$value){
    foreach ($value as $key => $data){
        echo  '<pre style="background: #000;color: #d16625;font-weight: bolder;padding-left: 10px;">' . var_export($data, true) . '</pre>';
    }

}