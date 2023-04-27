<?php 
namespace BaseClass;
class Redirect {
  public static function to($path, $data = []) {
    header('Location: http://' . $_SERVER['HTTP_HOST'].BASE_URL. '/'.$path );
    exit;
  }

  public static function back(){
      header('Location: '.$_SERVER['HTTP_REFERER']);
      exit;
  }
}