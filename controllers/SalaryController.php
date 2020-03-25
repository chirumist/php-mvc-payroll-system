<?php

class SalaryController extends Controller{

    protected $model;

    protected $empModel;

    protected $leave;

    protected $dashboardData;

    public function __construct()
    {
        $this->model = new Salary();

        $this->empModel = new Employee();

        $this->leave = new Leave();

        $user = new Users();
        $this->dashboardData = $user->dashboard();

        $this->auth();

    }

    public function index(){
        $data['title'] = 'Salary';
        $data['view'] = 'pay_salary/list';
        $data['active'] = 'salary';
        $data['salary'] = $this->model->getSalary();
        $data['assets'] = ['datatable'];
        $data['dashboard'] = $this->dashboardData;
        return $this->view('layout',$data);
    }

    public function create(){
        $data['title'] = 'Salary';
        $data['subtitle'] = 'Generate Salary';
        $data['view'] = 'pay_salary/form';
        $data['active'] = 'salary';
        $data['dashboard'] = $this->dashboardData;
        return $this->view('layout',$data);
    }

    public function store(){
        $total = 0;
        $empID = $this->input('emp_id');
        $this->model->rawQuery('SELECT SUM(total_days) as leave_days from `leave` WHERE emp_id='.$empID);
        $leave = $this->model->fetch();

        $total = ($this->input('totalExp') + $this->input('basic_salary')) - ($leave->leave_days * 750);

        $data = [
            'emp_id' => $this->input('emp_id'),
            'leave_days' => $leave->leave_days,
            'expense' => json_encode($this->input('expense')),
            'total' => $total,
            'issue_date' => date('Y-m-d')
        ];
        $this->model->store($data);
        $this->setSession('success','Employee added successfully');
        Redirect::to('salary-list');
    }
}