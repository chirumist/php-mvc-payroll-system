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
      $type = $this->input('type');

      $data_type = $this->input('data_type');

      $q = $this->input('q');

      $keyword = isset($q) ? $q : '';

      $items = [];

      header('Content-Type: application/json');

      switch ($type){
          case 'department' :
              $model = new Department();
              $items = $model->get('name as text,id as id ');
              break;
          case 'employee' :
              $model = new Employee();
              $items = $model->get("CONCAT(first_name,' ',last_name) as text,id as id");
              break;
      }

      $json = [
         'status' => 'true',
          'results' => $items
      ];

      echo json_encode($json);
  }
}