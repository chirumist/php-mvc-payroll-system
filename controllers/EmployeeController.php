<?php

class EmployeeController extends Controller{
    protected $model;
    public function __construct()
    {
        $this->model = new Employee();

        $this->auth();

    }

    public function index(){
        $data['title'] = 'Employee';
        $data['view'] = 'pay_employee/list';
        $data['active'] = 'employee';
        $data['employeeList'] = [];
        $data['assets'] = ['datatable'];
        return $this->view('layout',$data);
    }

    public function create(){
        $id = $this->input('id');
        $data['title'] = 'Employee';
        $data['subtitle'] = 'Create Employee';
        $data['view'] = 'pay_employee/form';
        $data['active'] = 'employee';
        $data['employee'] = $this->model;
        if (isset($id) && $id !== ''){
            $data['subtitle'] = 'Edit Employee';
            $data['employee'] = $this->model->find('id',$id);
            if (!isset($data['employee']->id)){
                $this->setSession('error','Employee Not Found!');
                Redirect::to('employee-list');
            }
        }
        return $this->view('layout',$data);
    }

    public function store(){

    }

    public function update(){

    }

    public function delete(){

    }

    public function salaryCreate(){

    }

    public function salaryGenerate(){

    }
}