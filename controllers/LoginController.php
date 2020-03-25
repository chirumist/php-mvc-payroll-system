<?php

class LoginController extends Controller{

    protected $model;

    protected $activity;

    protected $auth;

    public function __construct()
    {
        $this->model = new Users();

        $this->activity = new Activity();

        $this->auth = $this->getSession('auth');

        $this->checkAuth();
    }

  public function index () {
      return self::view('index');
  }

  public function login() {

    $user = $this->input('username');
    $pass = $this->input('password');
    $type = $this->input('type');
   
    $this->model->rawQuery("SELECT * FROM users WHERE email='".$user."' OR username = '".$user."' AND  password = '".$pass."' AND type='".$type."' ") ;
      $data  = $this->model->fetch();
      if(!empty($data) && $data !== NULL){
          if ($data->type == 'employee'){
              $this->model->rawQuery('SELECT id as emp_id from `employee` WHERE user_id='.$data->id);
              $emp = $this->model->fetch();
              $data->emp_id = $emp->emp_id;
          }
        $this->setSession('auth',$data);

        $this->activity->store(['type' => 'login','created_at' => date('Y-m-d h:i:s'), 'user_id' => $data->id]);

    } else {

      $this->setSession('error','Username and password incorrect.');

      Redirect::back();
    }
    
    // $data = array(
    //   'username' => $USER,
    //   'authenticated' => 
    //     (new Users())->isAuthenticated()
    // );

    Redirect::to('welcome');
  }

    public function logout() {

        echo $this->auth->id;

        $this->activity->store(['type' => 'logout','created_at' => date('Y-m-d h:i:s'),'user_id' => $this->auth->id]);

        $this->destroySession();

        return Redirect::to('');
    }
}