<?php
require "header.php";
?>
<!DOCTYPE html>
<html>

<head>
   <title>Sign-Up</title>
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
         <form action="includes/signup.inc.php" method="post">
            <img src="assets/img/avatar.svg">
            <h2 class="title">Sign-Up</h2>
            <?php
            if (isset($_GET['error'])) {
               if ($_GET['error'] == "emptyfields") {
                  echo '<p class="text-danger">Fill in all fields!</p>';
               } else if ($_GET['error'] == "invalidmailusername") {
                  echo '<p class="text-danger">Invalid username and email!</p>';
               } else if ($_GET['error'] == "invalidmail") {
                  echo '<p class="text-danger">Invalid Email!</p>';
               } else if ($_GET['error'] == "invalidusername") {
                  echo '<p class="text-danger">Invalid Username!</p>';
               } else if ($_GET['error'] == "passwordcheck") {
                  echo '<p class="text-danger">Your passwords do not match!</p>';
               } else if ($_GET['error'] == "usertaken") {
                  echo '<p class="text-danger">Username is already taken!</p>';
               }
            } else if (isset($_GET['signup']) == "success") {
               echo '<p class="text-success">Signup Successfully!</p>';
            }
            ?>
            <div class="input-div">
               <div class="i">
                  <i class="fas fa-envelope"></i>
               </div>
               <div class="div">
                  <h5>Email</h5>
                  <input type="text" id="email" name="email" class="input">
               </div>
            </div>
            <div class="input-div ">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <h5>Username</h5>
                  <input type="text" id="username" name="username" class="input">
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>Password</h5>
                  <input type="password" id="password" name="password" class="input">
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>Repeat Password</h5>
                  <input type="password" id="repeat-password" name="repeat-password" class="input">
               </div>
            </div>
            <a href="index.php">Already have an account?</a>
            <button type="submit" name="signup-submit" class="btn">Signup</button>
         </form>
      </div>

   </div>
   <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>