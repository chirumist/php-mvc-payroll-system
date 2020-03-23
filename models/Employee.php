<?php

class Employee extends Model {
    protected $table = 'employee';

    protected $fillable = [
        'dept_id',
        'user_id',
        'last_name',
        'middle_name',
        'first_name',
        'address',
        'gender',
        'basic_salary',
        'dob',
        'account_no',
        'contact_no'
    ];
}