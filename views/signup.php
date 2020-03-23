<!DOCTYPE html>
 <html>
  <head>
      <title>Registration - Payroll System</title>
      <?php include 'partials/head.php' ?>
  </head>
  <body style="background: #ccc">
  <div class="container">
      <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">
          <div class="col-5">
              <div class="card">
                  <div class="card-body">
                      <form action="<?php route('signup') ?>" autocomplete="on" method="post" onsubmit="return check()">
                          <h2> Sign up </h2>
                          <div class="form-group">
                              <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                              <input id="usernamesignup" class="form-control" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                          </div>
                          <div class="form-group">
                              <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                              <input id="emailsignup" class="form-control" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/>
                          </div>
                          <div class="form-group">
                              <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                              <input id="passwordsignup" class="form-control" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                          </div>
                          <div class="form-group">
                              <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                              <input id="passwordsignup_confirm" class="form-control" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                          </div>

                          <div class="form-group d-flex justify-content-between align-items-center">
                              <input type="submit" value="Sign up" class="btn btn-primary"/>
                              <span class="">
                                  Already a member ?
                                  <a href="<?php route('') ?>" class="to_register"> Go and log in </a>
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
