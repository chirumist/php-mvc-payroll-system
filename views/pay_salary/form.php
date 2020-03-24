<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo isset($data['subtitle']) ? $data['subtitle'] : 'salary'; ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php (isset($data['salary']->id) && $data['salary']->id != '') ? route('salary-update') : route('salary-store') ;?>" method="post">
                    <input type="hidden" name="id" value="<?php echo (isset($data['salary']->id) && $data['salary']->id != '') ? $data['salary']->id : -1 ;?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Employee ID</label>
                                <input type="text" value="<?php echo isset($data['leave']->name) ? $data['leave']->name : ''; ?>" name="empid" class="form-control">
                            </div>
                        </div>
                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NO.OF LEAVES</label>
                                <input type="number" step="any" value="<?php echo isset($data['salary']->noofleave) ? $data['salary']->noofleave : ''; ?>" name="noofleave" class="form-control">
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">HR</label>
                                <input type="number" step="any" value="<?php echo isset($data['salary']->hr) ? $data['salary']->hr : ''; ?>" name="hr" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">DA</label>
                                <input type="number" step="any" value="<?php echo isset($data['salary']->da) ? $data['salary']->da : ''; ?>" name="da" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">EXPENSES</label>
                                <input type="number" step="any" value="<?php echo isset($data['salary']->expense) ? $data['salary']->expense : ''; ?>" name="expense" class="form-control">
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
