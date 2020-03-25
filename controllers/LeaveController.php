<?php

class LeaveController extends Controller{
    protected $model;
    protected $dashboardData;

    public function __construct()
    {
        $this->model = new Leave();
        $user = new Users();
        $this->dashboardData = $user->dashboard();

        $this->auth();
    }

    public function index(){
        $data['title'] = 'Leave';
        $data['view'] = 'pay_leave/list';
        $data['active'] = 'leave';
        $data['dashboard'] = $this->dashboardData;
        $auth = $this->auth();
        if (isset($auth->id) && $auth->type == 'employee'){
            $data['leave'] = $this->model->getEmployeeLeave($auth->emp_id);
        }else{
            $data['leave'] = $this->model->getLeave();
        }
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
        $data['dashboard'] = $this->dashboardData;
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
            'comment' => $this->input('comment'),
            'status' => $this->input('status')
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
            'comment' => $this->input('comment'),
            'status' => $this->input('status'),
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

    public function status(){
        $id = $this->input('id');
        $type = $this->input('status');
        $this->model->update(['status' => $type],'id',$id);
        $this->setSession('success','Leave Status updated successfully');
        Redirect::to('leave-list');
    }
}