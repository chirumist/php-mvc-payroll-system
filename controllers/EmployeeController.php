<?php
use BaseClass\Controller;
use BaseClass\Redirect;
class EmployeeController extends Controller{
    protected $model;

    protected $userModel;

    protected $dashboardData;
    public function __construct()
    {
        $this->model = new Employee();

        $this->userModel = new Users();

        $this->dashboardData = $this->userModel->dashboard();

        $this->auth();

    }

    public function index(){
        $data['title'] = 'Employee';
        $data['view'] = 'pay_employee/list';
        $data['active'] = 'employee';
        $data['employeeList'] = $this->model->getEmployee();
        $data['assets'] = ['datatable'];
        $data['dashboard'] = $this->dashboardData;
        return $this->view('layout',$data);
    }

    public function create(){
        $id = $this->input('id');
        $data['title'] = 'Employee';
        $data['subtitle'] = 'Create Employee';
        $data['view'] = 'pay_employee/form';
        $data['active'] = 'employee';
        $data['employee'] = $this->model;
        $data['dashboard'] = $this->dashboardData;
        if (isset($id) && $id !== ''){
            $data['subtitle'] = 'Edit Employee';
            $data['employee'] = $this->model->findEmployee($id);
            if (!isset($data['employee']->id)){
                $this->setSession('error','Employee Not Found!');
                Redirect::to('employee-list');
            }
        }
        return $this->view('layout',$data);
    }

    public function store(){
        $data = [
            'username' =>  $this->input('username'),
            'email' =>  $this->input('email'),
            'password' =>  $this->input('password'),
        ];

        $userID = $this->userModel->store($data);

        $data = [
            'dept_id' => $this->input('dept_id'),
            'user_id' => $userID,
            'last_name' => $this->input('last_name'),
            'middle_name' => $this->input('middle_name'),
            'first_name' => $this->input('first_name'),
            'address' => $this->input('address'),
            'gender' => $this->input('gender'),
            'basic_salary' => $this->input('basic_salary'),
            'dob' => date('Y-m-d',strtotime($this->input('dob'))),
            'account_no' => $this->input('account_no'),
            'contact_no' => $this->input('contact_no')
        ];

        $employee = $this->model->store($data);
        $this->setSession('success','Employee added successfully');
        Redirect::to('employee-list');
    }

    public function update(){
        $data = [
            'username' =>  $this->input('username'),
            'email' =>  $this->input('email'),
            'password' =>  $this->input('password'),
        ];

        $userID = $this->userModel->update($data,'id',$this->input('user_id'));
        $data = [];
        $data = [
            'dept_id' => $this->input('dept_id'),
            'user_id' => $this->input('user_id'),
            'last_name' => $this->input('last_name'),
            'middle_name' => $this->input('middle_name'),
            'first_name' => $this->input('first_name'),
            'address' => $this->input('address'),
            'gender' => $this->input('gender'),
            'basic_salary' => $this->input('basic_salary'),
            'dob' => date('Y-m-d',strtotime($this->input('dob'))),
            'account_no' => $this->input('account_no'),
            'contact_no' => $this->input('contact_no')
        ];

        $employee = $this->model->update($data,'id',$this->input('id'));
        $this->setSession('success','Employee update successfully');
        Redirect::to('employee-list');
    }

    public function delete(){
        $id = $this->input('id');
        $employee = $this->model->find('id',$id);
        $this->userModel->delete('id',intval($employee->user_id));
        header('Content-Type: application/json');
        $data = ['message' => 'Employee deleted successfully!', 'status' => true];
        echo json_encode($data);
    }
}