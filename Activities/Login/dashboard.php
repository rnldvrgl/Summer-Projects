<?php
require "header.php";
if (!isset($_SESSION['account_id'])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
   <title>Dashboard</title>
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
      <div class="login-content  d-flex align-items-center justify-content-center">
         <form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit" class="btn">Logout</button>
         </form>
      </div>
   </div>
   <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>