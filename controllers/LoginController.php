<?php

class LoginController extends Controller{
    protected $model;
    public function __construct()
    {
        $this->model = new Users();
    }

    public function index () {
    session_start();
  }

  public function index () {
      return self::view('index');
  }

  public function login() {
    ob_start(); 

    $user = $_POST['username'];
    $pass = $_POST['password'];
   
    $this->model->rawQuery("SELECT * FROM users WHERE username='".$user."' AND  password = '".$pass."' ") ;
    $data  = $this->model->fetch();

    if(!empty($data)){

      $_SESSION["username"] = $data->username ;
      $_SESSION["user_id"] = $data->id ;
    
    } else {
      echo 'Login Not Successful.';
      unset($_SESSION);
    }
    
    // $data = array(
    //   'username' => $USER,
    //   'authenticated' => 
    //     (new Users())->isAuthenticated()
    // );

    view('login', $data);
  }

    public function logout() {
        session_destroy();
        return Redirect::to('');
    }
}