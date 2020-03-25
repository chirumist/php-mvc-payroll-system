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

    public function getEmployee(){
        $this->rawQuery('Select department.name as dept_name,users.username,employee.* from employee left join department on employee.dept_id=department.id left join users on employee.user_id=users.id');

        return $this->fetchAll();
    }

    public function findEmployee($id){
        $this->rawQuery("Select department.name as dept_name,users.username,users.email,users.password,employee.* from employee left join department on employee.dept_id=department.id left join users on employee.user_id=users.id WHERE employee.id=".$id);

        return $this->fetch();
    }

    public function getEmployeeSalary(){
        $this->rawQuery("Select CONCAT(first_name,' ',last_name) as text,id as id,basic_salary from employee");

        return $this->fetchAll();
    }
}