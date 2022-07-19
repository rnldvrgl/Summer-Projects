<?php
require "header.php";

use PHPMailer\PHPMailer;
?>
<!DOCTYPE html>
<html>

<head>
   <title>Reset Password</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://kit.fontawesome.com/a81368914c.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
   <img class="wave" src="assets/img/wave.svg">
   <div class="container">
      <div class="img">
         <img src="assets/img/bg.svg">
      </div>
      <div class="form-content">
         <form action="includes/request-password.inc.php" method="post">
            <h2 class="title">Reset Your Password</h2>
            <p>An e-mail will be send to you with instructions on how to reset your password.</p>
            <div class="input-div">
               <div class="i">
                  <i class="fas fa-envelope"></i>
               </div>
               <div class="div">
                  <h5>Enter your email address</h5>
                  <input type="text" id="email" name="email" class="input">
               </div>
            </div>
            <?php
            if (isset($_GET['reset'])) {
               if (($_GET['reset'] == "success")) {
                  echo '<p class="text-success">Check your email!</p>';
               }
            }
            ?>
            <a href="index.php"><button type="button" class="btn">Cancel</button></a>
            <button type="submit" name="reset-request-submit" class="btn">Receive New Password</button>
         </form>
      </div>

   </div>
   <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>