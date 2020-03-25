<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo isset($data['subtitle']) ? $data['subtitle'] : 'Department'; ?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php (isset($data['department']->id) && $data['department']->id != '') ? route('department-update') : route('department-store') ;?>" method="post">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo (isset($data['department']->id) && $data['department']->id != '') ? $data['department']->id : -1 ;?>" required="true">
                                <label for="">Name</label>
                                <input type="text" value="<?php echo isset($data['department']->name) ? $data['department']->name : ''; ?>" name="name" class="form-control" required="true"required pattern="[A-Za-z]+">
                                <?php if (isset($errors) && isset($errors['name'])) { ?>
                                    <p class="mt-2 text-danger text-capitalize"><?php echo $errors['name'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <a href="<?php route('department-list');?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>