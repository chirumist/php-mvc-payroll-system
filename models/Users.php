<?php 

class Users extends Model {

    protected $table = 'users';

    protected $fillable = ['username', 'email', 'password'];
  
  public function add($data) {
    self::store($data);
    return false;
  }

  public function login($user, $pass) {
    session_start();
      if ( $person['username'] == $user && $person['password'] == $pass ) {
          return $_SESSION['username'] = $user;
      }

    session_destroy();
    return false;
  }

  public function isExists() {
      if ( $person['username'] == $user ) {
          return true;
      }

    return false;
  }

  public function isAuthenticated() {
    session_start();
    return $_SESSION['username'];
  }
} 