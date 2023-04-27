<?php
use BaseClass\Controller;
use BaseClass\Redirect;
class ErrorController extends Controller{
  public function notFoud() {
    
    if ($_SESSION['username']) {
      return Redirect::to('error-404');
    }

    return Redirect::to('error-404');
  }

  public function pageNotFound(){
      view('404');
  }
}