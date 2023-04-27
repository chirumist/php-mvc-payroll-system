<?php
use BaseClass\Controller;
use BaseClass\Redirect;
class DepartmentController extends Controller {

    protected $model;
    protected $dashboardData;

    public function __construct()
    {

        $this->model = new Department();
        $user = new Users();
        $this->dashboardData = $user->dashboard();

        $this->auth();
    }

    public function index(){
        $data['title'] = 'Department';
        $data['view'] = 'pay_departments/list';
        $data['active'] = 'department';
        $data['departments'] = $this->model->get();
        $data['assets'] = ['datatable'];
        $data['dashboard'] = $this->dashboardData;
        return $this->view('layout',$data);
    }

    public function create(){
        $id = $this->input('id');
        $data['title'] = 'Department';
        $data['subtitle'] = 'Create Department';
        $data['view'] = 'pay_departments/form';
        $data['active'] = 'department';
        $data['department'] = $this->model;
        $data['dashboard'] = $this->dashboardData;
        if (isset($id) && $id !== ''){
            $data['subtitle'] = 'Edit Department';
            $data['department'] = $this->model->find('id',$id);
            if (!isset($data['department']->id)){
                $this->setSession('error','Department Not Found!');
                Redirect::to('department-list');
            }
        }
        return $this->view('layout',$data);

    }

    public function store(){
        $validate = $this->validation([
            'name' => 'required'
        ]);
        $this->validate($validate);
        $data = ['name' => $this->input('name')];
        $this->model->store($data);
        $this->setSession('success','Department Added Successfully');
        Redirect::to('department-list');
    }

    public function update(){
        $validate = $this->validation([
            'name' => 'required'
        ]);
        $this->validate($validate);
        $data = ['name' => $this->input('name')];
        $id = $this->input('id');
        $this->model->update($data,'id',$id);
        $this->setSession('success','Department Updated Successfully');
        Redirect::to('department-list');
    }

    public function delete(){
        $id = $this->input('id');
        $this->model->delete('id',$id);
        header('Content-Type: application/json');
        $data = ['message' => 'Department deleted successfully!', 'status' => true];
        echo json_encode($data);
    }
}