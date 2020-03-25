<?php
class Leave extends Model{

	protected $table = "leave";

	protected $fillable = ['emp_id','start_date','end_date','comment','status'];

    public function getLeave(){
        $this->rawQuery('Select employee.first_name,employee.last_name,employee.middle_name,`leave`.* from `leave` left join employee on  `leave`.emp_id=employee.id');

        return $this->fetchAll();
    }

    public function getEmployeeLeave($id){
        $this->rawQuery('Select employee.first_name,employee.last_name,employee.middle_name,`leave`.* from `leave` left join employee on  `leave`.emp_id=employee.id WHERE `leave`.`emp_id`='.$id);

        return $this->fetchAll();
    }

    public function findLeave($id){

        $this->rawQuery("Select employee.first_name, employee.last_name,`leave`.* from `leave` left join employee on  `leave`.emp_id=employee.id WHERE `leave`.id=".$id);

        return $this->fetch();
    }
}
?>