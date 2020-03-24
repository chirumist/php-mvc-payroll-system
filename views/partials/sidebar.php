<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small" style="font-size: 34px;">
                <i class="nc-icon nc-briefcase-24"></i>
            </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Payroll
            <!-- <div class="logo-image-big">
              <img src="../assets/img/logo-big.png">
            </div> -->
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <?php if($this->getSession('auth')->type == 'admin') {?>
            <li class="<?php if($data['active'] == 'dashboard'){ echo 'active'; } ?>">
                <a href="<?php route('welcome');?>">
                    <i class="nc-icon nc-layout-11"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="<?php if($data['active'] == 'department'){ echo 'active'; } ?>">
                <a href="<?php route('department-list');?>">
                    <i class="nc-icon nc-bank"></i>
                    <p>Departments</p>
                </a>
            </li>
            <li class="<?php if($data['active'] == 'employee'){ echo 'active'; } ?>">
                <a href="<?php route('employee-list');?>">
                    <i class="nc-icon nc-badge"></i>
                    <p>Employee</p>
                </a>
            </li>
            <?php } ?>
            <?php if($this->getSession('auth')->type == 'employee' || $this->getSession('auth')->type == 'admin') {?>
            <li class="<?php if($data['active'] == 'leave'){ echo 'active'; } ?>">
                <a href="<?php route('leave-list');?>">
                    <i class="nc-icon nc-user-run"></i>
                    <p>Leave</p>
                </a>
            </li>
            <li class="<?php if($data['active'] == 'pay_salary'){ echo 'active'; } ?>">
                <a href="<?php route('salary-create');?>">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Salary</p>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>