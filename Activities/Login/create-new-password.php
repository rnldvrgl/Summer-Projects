<?php
require "header.php";
?>
<!DOCTYPE html>
<html>

<head>
   <title>Create New Password</title>
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
         <?php
         $selector = $_GET['selector'];
         $validator = $_GET['validator'];

         if (empty($selector) || empty($validator)) {
            echo "Could not validate your request!";
         } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
         ?>
               <form action="includes/reset-password.inc.php" method="post">
                  <input type="hidden" name="selector" class="input" value="<?php echo $selector; ?>">
                  <input type="hidden" name="validator" class="input" value="<?php echo $validator; ?>">
                  <h2 class="title">Reset Your Password</h2>
                  <div class="input-div pass">
                     <div class="i">
                        <i class="fas fa-lock"></i>
                     </div>
                     <div class="div">
                        <h5>Enter new password...</h5>
                        <input type="password" id="password" name="password" class="input">
                     </div>
                  </div>
                  <div class="input-div pass">
                     <div class="i">
                        <i class="fas fa-lock"></i>
                     </div>
                     <div class="div">
                        <h5>Repeat new password...</h5>
                        <input type="password" id="repeat-password" name="repeat-password" class="input">
                     </div>
                  </div>
                  <button type="submit" name="reset-password-submit" class="btn">Reset Password</button>
               </form>
         <?php
            }
         }
         ?>
      </div>

   </div>
   <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>