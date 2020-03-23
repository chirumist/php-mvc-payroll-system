<!DOCTYPE html>
<html>
   <head>
       <title>Login and Registration Form</title>

       <?php include 'partials/head.php' ?>
   </head>
   <body>
       <div class="container">
           <header>
               <h1>THANK YOU FOR REGISTERATION</h1>
               <h1>YOUR USERNAME IS <?= $data['username']; ?></h1>
               <h1>YOUR EMAIL ADDRESS IS <?= $data['email']; ?></h1>
           </header>
       <?php
           //adding your code here
       ?>
           
 </div>
       <?php include 'partials/scripts.php' ?>
   </body>
</html>
