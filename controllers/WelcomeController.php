<?php
use BaseClass\Controller;
use BaseClass\Redirect;
class WelcomeController extends Controller{
    protected $dashboardData;

    protected $model;
    public function __construct()
    {
        $user = new Users();
        $this->dashboardData = $user->dashboard();
        $this->model = new Activity();
        $this->department = new Department();
        $this->auth();
    }

    public function index() {
      $data['title'] = 'Dashboard';

      $data['view'] = 'welcome';

      $data['active'] = 'dashboard';

      $data['dashboard'] = $this->dashboardData;

      return $this->view('layout',$data);
  }

  public function reports() {
    $data['title'] = 'Reports';
    $data['view'] = 'reports';
    $data['active'] = 'reports';
    $data['reportsData'] = $this->department->getReports();
    $data['assets'] = ['datatable'];
    $data['dashboard'] = $this->dashboardData;
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
              $items = $model->getEmployeeSalary();
              break;
      }

      $json = [
         'status' => 'true',
          'results' => $items
      ];

      echo json_encode($json);
  }

  public function activityList(){
      $data['title'] = 'Activity';
      $data['view'] = 'pay_activity/list';
      $data['active'] = 'activity';
      $data['activityList'] = $this->model->getActivity();
      $data['assets'] = ['datatable'];
      $data['dashboard'] = $this->dashboardData;
      return $this->view('layout',$data);
  }
}