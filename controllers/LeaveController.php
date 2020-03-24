<?php

class LeaveController extends Controller{
    protected $model;

    public function __construct()
    {
        $this->model = new Leave();

        $this->auth();
    }

    public function index(){
        $data['title'] = 'Leave';
        $data['view'] = 'pay_leave/list';
        $data['active'] = 'leave';
        $data['leave'] = $this->model->getLeave();
        $data['assets'] = ['datatable'];
        return $this->view('layout',$data);
    }

    public function create(){
         $id = $this->input('id');
        $data['title'] = 'Leave';
        $data['subtitle'] = 'Create Leave';
        $data['view'] = 'pay_leave/form';
        $data['active'] = 'department';
        $data['leave'] = $this->model;
        if (isset($id) && $id !== ''){
            $data['subtitle'] = 'Edit Leave';
            $data['leave'] = $this->model->findLeave($id);
            if (!isset($data['leave']->id)){
                $this->setSession('error','Leave Not Found!');
                Redirect::to('leave-list');
            }
        }
        return $this->view('layout',$data);

    }

    public function store(){
        $data = [
            'emp_id' => $this->input('emp_id'),
            'start_date' => date('Y-m-d',strtotime($this->input('start_date'))),
            'end_date' => date('Y-m-d',strtotime($this->input('end_date'))),
            'comment' => $this->input('comment')
        ];

        $leave = $this->model->store($data);
        $this->setSession('success','Leave added successfully');
        Redirect::to('leave-list');
    }

    public function update(){
        $data = [
            'emp_id' => $this->input('emp_id'),
            'start_date' => date('Y-m-d',strtotime($this->input('start_date'))),
            'end_date' => date('Y-m-d',strtotime($this->input('end_date'))),
            'comment' => $this->input('comment')
        ];

        $leave = $this->model->update($data,'id',$this->input('id'));
        $this->setSession('success','Leave updated successfully');
        Redirect::to('leave-list');
    }

    public function delete(){
        $id = $this->input('id');
        $this->model->delete('id',$id);
        header('Content-Type: application/json');
        $data = ['message' => 'Leave deleted successfully!', 'status' => true];
        echo json_encode($data);
    }
}