<?php 

namespace BaseClass;

class Route {
  public static $isRoute = false;

  public static function callController($path, $location) {
    $cluster    = explode('@', $location);
    $controller = $cluster[0];
    $function   = $cluster[1];
    (new $controller)->$function();
  }
  
  public static function get($path, $location ) {
        $url = strtok($_SERVER['REQUEST_URI'],'?');
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $url == BASE_URL.$path) {
          self::callController(BASE_URL.$path, $location);
          self::$isRoute = true;
        }
  }

  public static function post( $path, $location ) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == BASE_URL.$path) {
      self::callController(BASE_URL.$path, $location);
      self::$isRoute = true;
    }
  }

  public static function any( $path, $location ) {
    if( !self::$isRoute ) {
      self::callController(BASE_URL.$path, $location);
    }
  }

}