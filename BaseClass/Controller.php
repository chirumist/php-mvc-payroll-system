<?php
namespace BaseClass;

use BaseClass\DB;
class Controller extends DB {
    public function view($path,$data = []){

        $errors = $this->getSession('errors');

        if (file_exists("views/$path.php")) {
            require_once "views/$path.php";
        }else{
            echo "<div>$path View not found</div>";
        }
        $this->forgetSession('errors');
        $this->forgetSession('success');
    }

    public function input($inputName){
        if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            return isset($_POST[$inputName]) ? $_POST[$inputName] : NULL;
        }

        if (strtoupper($_SERVER['REQUEST_METHOD']) == 'GET'){
            return isset($_GET[$inputName]) ? $_GET[$inputName] : NULL;
        }
    }

    public function validation($data,$message = []){
        foreach ($data as $key => $value){
            $validateParm = explode('|', $value);
            $validateMessage = [];
            foreach ($validateParm as $p => $parm){
                switch ($parm){
                    case 'required':
                        if ($this->input($key) !== null && empty($this->input($key)) && $this->input($key) == ''){
                            $validateMessage[$key] = count($message) > 0 ? $message[$key] : $key.' is required';
                        }
                        break;

                    case 'unique':
                        if (!empty($this->input($key))){
                            $unique = explode(':',$parm);
                            $filedData = explode(',',$unique[1]);
                            $valiQuery = 'SELECT '.$filedData[1].' FROM '.$filedData[1].' WHERE '.$filedData[1].'='.$this->input($key);
                            if (isset($filedData[2])){
                                $valiQuery .= ' AND id <>'.$filedData[2];
                            }

                            $this->query($valiQuery);

                            if ($this->rowCount() > 0){
                                $validateMessage[$key] = count($message) > 0 ? $message[$key] : 'Sorry this '.$key.' is already exist';
                            }
                        }
                        break;
                }
            }
        }

        return $validateMessage;
    }

    public function validate($message){
        if (count($message) > 0){
            $this->setSession('errors',$message);
            Redirect::back();
        }
    }

    public function setSession($key,$value){
        if (!empty($key) && !empty($value)){
            $_SESSION[$key] = $value;
        }
    }

    public function getSession($key){
        if (!empty($key) && isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
    }

    public function forgetSession($key){
        if (!empty($key) && isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    public function destroySession(){
        session_destroy();
    }

    public function alertFlash($key,$class = 'success',$type = ''){
        if (!empty($key) && isset($_SESSION[$key]) && $_SESSION[$key] !== ''){
            if ($type == 'alert') {
                $typeClass = 'alert alert-'.$class.' fade show';
            }else{
                $typeClass = 'text-'.$class;
            }
            echo '<div class="'.$typeClass.'">'.$this->getSession($key).'</div>';
            $this->forgetSession($key);
        }
    }

    public function auth(){

        $auth = $this->getSession('auth');
        if (!isset($auth) && $auth == '' && '/login' != $_SERVER['REQUEST_URI']) {
            Redirect::to('login');
        }

        return $auth;
    }

    public function checkAuth(){
        if (isset($auth) && $auth !== '' && '/logout' != $_SERVER['REQUEST_URI']) {
            Redirect::to('welcome');
        }
    }
}