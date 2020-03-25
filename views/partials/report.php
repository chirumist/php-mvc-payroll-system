<?php $col = $this->getSession('auth')->type != 'admin' ? 6 : 3 ?>
<div class="row">
    <?php if($this->getSession('auth')->type == 'admin') {?>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-globe text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Departments</p>
                            <p class="card-title"><?php echo isset($data['dashboard']['department']) ? $data['dashboard']['department'] : ''; ?>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-vector text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Employees</p>
                            <p class="card-title"><?php echo isset($data['dashboard']['employee']) ? $data['dashboard']['employee'] : ''; ?>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="col-lg-<?php echo $col ?> col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-money-coins text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category"><?php if ($this->getSession('auth')->type != 'admin') { echo 'Monthly Salary'; } else { echo 'Monthly Expenses'; }?></p>
                            <p class="card-title"><?php echo $data['dashboard']['salary']; ?>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($this->getSession('auth')->type == 'employee' || $this->getSession('auth')->type == 'admin') {?>
    <div class="col-lg-<?php echo $col ?> col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-favourite-28 text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Leave</p>
                            <p class="card-title"><?php echo $data['dashboard']['leave']; ?>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>