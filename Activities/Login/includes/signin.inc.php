<?php
if (isset($_POST['signin-submit'])) {
   require 'connection/connection.php';
   $username = $_POST['username'];
   $password = $_POST['password'];

   if (empty($username) || empty($password)) {
      header("Location: ../index.php?error=emptyfields");
      exit();
   } else {
      $sql = "SELECT * FROM `accounts` WHERE `username`=?;";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("Location: ../index.php?error=sqlerror");
         exit();
      } else {
         mysqli_stmt_bind_param($stmt, "s", $username);
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         if ($row = mysqli_fetch_assoc($result)) {
            $passwordCheck = password_verify($password, $row['password']);
            if ($passwordCheck == false) {
               header("Location: ../index.php?error=wrongpassword");
               exit();
            } else if ($passwordCheck == true) {
               session_start();
               $_SESSION['account_id'] = $row['account_id'];
               $_SESSION['username'] = $row['username'];

               header("Location: ../dashboard.php?login=sucess");
               exit();
            } else {
               header("Location: ../index.php?error=wrongpassword");
               exit();
            }
         } else {
            header("Location: ../index.php?error=nouser");
            exit();
         }
      }
   }
} else {
   header("Location: ../index.php");
   exit();
}
