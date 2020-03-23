<!DOCTYPE html>
 <html>
    <head>
      <title>Login and Registration Form</title>

        <?php include 'partials/head.php' ?>
    </head>
    <body>
      <div class="container">

        <?php if ($data['authenticated']): ?>
          <?php Redirect::to('/welcome'); ?>
        <?php endif; ?>

        <?php $_SESSION['errormsg'] = 'Wrong username or password'; ?>

        <p>Wrong username or password!</p>
        <p>Please go back to re enter them again</p>
        <a href="/" style="margin: 20px; display: block;">Go Back to Login</a>
      </div>
      <?php include 'partials/scripts.php' ?>
    </body>
</html>
