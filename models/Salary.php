<?php 

class Salary extends Model {

    protected $table = 'salary';

    protected $fillable = ['emp_id', 'leave_days', 'hr','da','expense','issue_date'];

    public function getSalary(){
        $this->rawQuery("Select CONCAT(employee.first_name,' ',employee.last_name) as emp_name, salary.* from salary left join employee on salary.emp_id=employee.id");

        return $this->fetchAll();
    }
} 