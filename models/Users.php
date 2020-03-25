<?php 

class Users extends Model {

    protected $table = 'users';

    protected $fillable = ['username', 'email', 'password'];

    public function dashboard(){
        $auth = $_SESSION['auth'];
        if ($auth->type == 'employee'){
            $this->rawQuery('SELECT basic_salary as salary,id from employee where user_id='.$auth->id);
            $salary = $this->fetch();
            $this->rawQuery('SELECT COUNT(*) as `leave` from `leave` where emp_id='.$salary->id);
            $leave = $this->fetch();
        }else{
            $this->rawQuery('SELECT COUNT(*) as department from `department`');
            $department = $this->fetch();
            $this->rawQuery('SELECT COUNT(*) as employee from `employee`');
            $employee = $this->fetch();
            $this->rawQuery('SELECT SUM(basic_salary) as salary from employee');
            $salary = $this->fetch();
            $this->rawQuery('SELECT COUNT(*) as `leave` from `leave`');
            $leave = $this->fetch();
        }
        return [
            'department' => isset($department->department) ? $department->department : 0,
            'employee' => isset($employee->employee) ? $employee->employee : 0,
            'salary' => $salary->salary,
            'leave' => $leave->leave
        ];
    }
} 