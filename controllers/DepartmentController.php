<?php

class DepartmentController extends Controller {

    protected $model;
    public function __construct()
    {

        $this->model = new Department();

//        if (!isset($_SESSION['user'])) {
//                  return Redirect::to('');
//        }
    }

    public function index(){
        $data['title'] = 'Department';

        $data['view'] = 'pay_departments/list';

        $data['active'] = 'department';

        $data['departments'] = $this->model->get();

        $data['assets'] = ['datatable'];

        return $this->view('layout',$data);
    }

    public function create(){
        $id = $this->input('id');

        $data['title'] = 'Department';

        $data['subtitle'] = 'Create Department';

        $data['view'] = 'pay_departments/form';

        $data['active'] = 'department';

        $data['department'] = $this->model;

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

        $data = [
            'name' => $this->input('name')
        ];
        try {
            $this->model->store($data);

            Redirect::to('department-list');
        } catch (Exception $e) {
            $this->setSession('error',$e->getMessage());
            Redirect::to('department-create');
        }
    }

    public function update(){
        $validate = $this->validation([
            'name' => 'required'
        ]);

        $this->validate($validate);

        $data = [
            'name' => $this->input('name')
        ];
        $id = $this->input('id');
        try {
            $this->model->update($data,'id',$id);

            Redirect::to('department-list');
        } catch (Exception $e) {
            $this->setSession('error',$e->getMessage());
            Redirect::to('department-create');
        }
    }

    public function delete(){
        $id = $this->input('id');

        $this->model->delete('id',$id);

        header('Content-Type: application/json');

        $data = [
            'message' => 'Department deleted successfully!',
            'status' => true
        ];

        echo json_encode($data);
    }
}