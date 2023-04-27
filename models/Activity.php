<?php

use BaseClass\Model;
class Activity extends Model{

    protected $table = 'activity';

    protected $fillable = ['type', 'created_at','user_id'];

    public function getActivity(){
        $auth = $_SESSION['auth'];
        if ($auth->type == 'employee'){
            $this->query('SELECT activity.*, users.username as name from `activity` left join users on users.id=activity.user_id WHERE user_id='.$auth->id);
            $data = $this->fetchAll();
        }else{
            $this->query('SELECT activity.*, users.username as name from `activity` left join users on users.id=activity.user_id');
            $data = $this->fetchAll();
        }

        return $data;
    }

}