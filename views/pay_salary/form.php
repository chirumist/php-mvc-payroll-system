<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo isset($data['subtitle']) ? $data['subtitle'] : 'salary'; ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php route('salary-store') ;?>" method="post">
                    <input type="hidden" name="id" value="<?php echo (isset($data['salary']->id) && $data['salary']->id != '') ? $data['salary']->id : -1 ;?>">
                    <div class="row">
                        <div class="col-md-6">
 <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Employee ID</label>
                                        <select name="emp_id" class="select2js form-control" data-placeholder="Select A Employee" data-ajax--url="<?php route('ajaxList?type=employee') ;?>" data-ajax--cache="true">
                                            <?php
                                            if (isset($data['leave']->emp_id)){
                                                echo '<option value="'.$data['leave']->emp_id.'" selected>'.$data['leave']->first_name.' '.$data['leave']->last_name.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">HR</label>
                                        <input type="number" step="any" value="<?php echo isset($data['salary']->hr) ? $data['salary']->hr : ''; ?>" name="hr" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">DA</label>
                                        <input type="number" step="any" value="<?php echo isset($data['salary']->da) ? $data['salary']->da : ''; ?>" name="da" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">TRAVELLING EXPENSES</label>
                                        <input type="number" step="any" value="<?php echo isset($data['salary']->expense) ? $data['salary']->expense : ''; ?>" name="expense[travelling]" class="form-control exp sal-exp">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">FULE EXPENSES</label>
                                        <input type="number" step="any" value="<?php echo isset($data['salary']->expense) ? $data['salary']->expense : ''; ?>" name="expense[fule]" class="form-control exp ful-exp">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">TEA & LUNCH EXPENSES</label>
                                        <input type="number" step="any" value="<?php echo isset($data['salary']->expense) ? $data['salary']->expense : ''; ?>" name="expense[tea_lunch]" class="form-control exp tl-exp">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <input type="hidden" value="" name="totalExp" class="exp-total-hidden">
                            <input type="hidden" value="" name="basic_salary" class="basic_salary-hidden">
                            <h6>Basic Salary: <span id="basic_salary">0</span></h6>
                            <h6>Total Expenses: <span id="total_exp">0</span></h6>
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
