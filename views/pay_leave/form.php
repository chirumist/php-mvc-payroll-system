<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo isset($data['subtitle']) ? $data['subtitle'] : 'leave'; ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php (isset($data['leave']->id) && $data['leave']->id != '') ? route('leave-update') : route('leave-store') ;?>" method="post">
                    <input type="hidden" name="id" value="<?php echo (isset($data['leave']->id) && $data['leave']->id != '') ? $data['leave']->id : -1 ;?>">
                    <input type="hidden" name="status" value="<?php echo (isset($data['leave']->status) && $data['leave']->status != 0) ? $data['leave']->status : 0 ;?>">
                    <div class="row">
                        <?php if($this->getSession('auth')->type == 'admin') {?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Employee</label>
                                    <select name="emp_id" class="select2js form-control" data-placeholder="Select A Employee" data-ajax--url="<?php route('ajaxList?type=employee') ;?>" data-ajax--cache="true">
                                        <?php
                                        if (isset($data['leave']->emp_id)){
                                            echo '<option value="'.$data['leave']->emp_id.'" selected>'.$data['leave']->first_name.' '.$data['leave']->last_name.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <?php } else {?>
                            <input type="hidden" value="<?php echo $this->getSession('auth')->emp_id?>" name="emp_id">
                        <?php }?>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="">StartDate</label>
                                <input type="date" value="<?php echo isset($data['leave']->start_date) ? $data['leave']->start_date : ''; ?>" name="start_date" class="form-control" required="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">EndDate</label>
                                <input type="date" value="<?php echo isset($data['leave']->end_date) ? $data['leave']->end_date : ''; ?>" name="end_date" class="form-control" required="true">
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label for="">REASON FOR LEAVE:</label>
                                <textarea name="comment" class="form-control" required="true"></textarea>
                            </div>
                        </div>
    
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="<?php route('employee-list');?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                 </form>
            </div>
        </div>
    </div>
</div>
