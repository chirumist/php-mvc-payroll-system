<?php
use BaseClass\Controller;
use BaseClass\Redirect;
class RegisterController extends Controller{
  public function index() {
    $data = [];

    view('signup', $data);

    session_destroy();
  }

  public function signup() {
    session_start();

    $user  = $_POST['username'];
    $email = $_POST['email'];
    $pass  = $_POST['passowrd'];
    $cpass = $_POST['confirm_password'];

    if ( $pass == $cpass ) {
        $model = new Users();
        $result = $model->add([
            'username' => $user,
            'email' => $email,
            'password' => password_hash($pass, PASSWORD_DEFAULT)
        ]);
      if ($result) {
        $_SESSION['username'] = $user;
        $_SESSION['email'] = $email;
        return Redirect::to('thankyou');
      }

      $_SESSION['error'] = 'Username has been used!';
      return Redirect::to('signup');
    }

    echo '<script>';
      echo 'alert(\'Password does not matched\');';
      echo 'history.go(-1);';
    echo '</script>';
  }

  public function thankyou() {
    session_start();

    $user  = $_SESSION['username'];
    $email = $_SESSION['email'];

    view('thankyou', 
      array('username' => $user, 'email' => $email)
    );
  }
}