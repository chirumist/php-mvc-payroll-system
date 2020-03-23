<!DOCTYPE html>
 <html>
  <head>
    <title>Login - Payroll System</title>
      <?php include 'partials/head.php' ?>
  </head>
  <body style="background: #ccc">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <form  action="<?php route('login') ?>" autocomplete="on" method="post">
                            <h2 class="text-center">Log in</h2>
                            <div class="text-center"><?php $this->alertFlash('error','danger')?></div>
                            <div class="form-group">
                                <label for="username" class="uname" data-icon="u" > Your Email or Username </label>
                                <input id="username" class="form-control" name="username" required="required" type="text" placeholder="Enter Email or Username"/>
                            </div>
                            <div class="form-group">
                                <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                <input id="password" class="form-control" name="password" required="required" type="password" placeholder="*********" />
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" value="admin" name="type" class="custom-control-input" checked>
                                <label class="custom-control-label" for="customRadioInline1">Admin</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" value="employee" name="type" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Employee</label>
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <input type="submit" value="Login" class="btn btn-primary" />
                                <span class="">
                                    Not a member yet ?
                                    <a href="<?php route('signup'); ?>" class="to_register">Join us</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'partials/scripts.php' ?>
  </body>
</html>
