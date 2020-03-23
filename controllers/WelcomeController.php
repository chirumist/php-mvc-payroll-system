<?php

class WelcomeController extends Controller{

    public function __construct()
    {

//        if (!isset($_SESSION['user'])) {
//                  return Redirect::to('');
//        }
    }

    public function index() {
      $data['title'] = 'Dashboard';

      $data['view'] = 'welcome';

      $data['active'] = 'dashboard';

      return $this->view('layout',$data);
  }

  public function ajaxList () {

  }
}