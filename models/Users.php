<?php 

class Users extends Model {

    protected $table = 'users';

    protected $fillable = ['username', 'email', 'password'];
} 