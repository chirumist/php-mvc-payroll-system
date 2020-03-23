<?php

class EmployeeController extends Controller{
    public function __construct()
    {

//        if (!isset($_SESSION['user'])) {
//                  return Redirect::to('');
//        }
    }

    public function index(){
        $data['title'] = 'Employee';

        $data['view'] = 'pay_employee/list';

        $data['active'] = 'employee';

        return $this->view('layout',$data);
    }

    public function create(){

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