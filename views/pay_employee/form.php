<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo isset($data['subtitle']) ? $data['subtitle'] : 'employee'; ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php (isset($data['employee']->id) && $data['employee']->id != '') ? route('employee-update') : route('employee-store') ;?>" method="post">
                    <input type="hidden" name="id" value="<?php echo (isset($data['employee']->id) && $data['employee']->id != '') ? $data['employee']->id : -1 ;?>">
                    <input type="hidden" name="user_id" value="<?php echo (isset($data['employee']->user_id) && $data['employee']->user_id != '') ? $data['employee']->user_id : -1 ;?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" value="<?php echo isset($data['employee']->username) ? $data['employee']->username : ''; ?>" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="<?php echo isset($data['employee']->email) ? $data['employee']->email : ''; ?>" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" value="<?php echo isset($data['employee']->password) ? $data['employee']->password : ''; ?>" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Department Name</label>
                                <select name="dept_id" class="select2js form-control" data-placeholder="Select A Department" data-ajax--url="<?php route('ajaxList?type=department') ;?>" data-ajax--cache="true">
                                    <?php
                                    if (isset($data['employee']->dept_id)){
                                        echo '<option value="'.$data['employee']->dept_id.'" selected>'.$data['employee']->dept_name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" value="<?php echo isset($data['employee']->first_name) ? $data['employee']->first_name : ''; ?>" name="first_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Middle Name</label>
                                <input type="text" value="<?php echo isset($data['employee']->middle_name) ? $data['employee']->middle_name : ''; ?>" name="middle_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" value="<?php echo isset($data['employee']->last_name) ? $data['employee']->last_name : ''; ?>" name="last_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control"><?php echo isset($data['employee']->address) ? $data['employee']->address : ''; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Basic Salary</label>
                                <input type="number" step="any" value="<?php echo isset($data['employee']->basic_salary) ? $data['employee']->basic_salary : ''; ?>" name="basic_salary" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">DOB</label>
                                <input type="date" value="<?php echo isset($data['employee']->dob) ? $data['employee']->dob : ''; ?>" name="dob" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Contact No</label>
                                <input type="number" value="<?php echo isset($data['employee']->contact_no) ? $data['employee']->contact_no : ''; ?>" name="contact_no" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Account No</label>
                                <input type="number" value="<?php echo isset($data['employee']->account_no) ? $data['employee']->account_no : ''; ?>" name="account_no" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Gender</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" value="male" name="gender" class="custom-control-input" <?php echo isset($data['employee']->gender) && $data['employee']->gender == 'male' ? 'checked' : ''; ?>>
                                        <label class="custom-control-label" for="customRadioInline1">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" value="female" name="gender" class="custom-control-input" <?php echo isset($data['employee']->gender) && $data['employee']->gender == 'female' ? 'checked' : ''; ?>>
                                        <label class="custom-control-label" for="customRadioInline2">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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