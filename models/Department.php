<?php

use BaseClass\Model;
class Department extends Model{
    protected $table = 'department';

    protected $fillable = ['name'];
}