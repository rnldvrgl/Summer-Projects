<?php

if (isset($_POST['signup-submit'])) {
   require 'connection/connection.php';

   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $repeatPassword = $_POST['repeat-password'];


   if (empty($username) || empty($email) || empty($password) || empty($repeatPassword)) {
      header("Location: ../signup.php?error=emptyfields&username=" . $username . "&mail=" . $email);
      exit();
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invalidmailusername");
      exit();
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=invalidmail&username=?" . $username);
      exit();
   } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invalidusername&mail=" . $email);
      exit();
   } else if ($password !== $repeatPassword) {
      header("Location: ../signup.php?error=passwordcheck&username=" . $username . "&mail=" . $email);
      exit();
   } else {
      $sql = "SELECT `username` FROM `accounts` WHERE `username`=?";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("Location: ../signup.php?error=sqlerror");
         exit();
      } else {
         mysqli_stmt_bind_param($stmt, "s", $username);
         mysqli_stmt_execute($stmt);
         mysqli_stmt_store_result($stmt);
         $resultCheck = mysqli_stmt_num_rows($stmt);
         if ($resultCheck > 0) {
            header("Location: ../signup.php?error=usertaken&mail=" . $email);
            exit();
         } else {
            $sql = "INSERT INTO `accounts`(`username`, `password`, `email`) values(?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
               header("Location: ../signup.php?error=sqlerror");
               exit();
            } else {
               $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
               mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $email);
               mysqli_stmt_execute($stmt);
               header("Location: ../signup.php?signup=success");
               exit();
            }
         }
      }
   }
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
} else {
   header("Location: ../signup.php");
   exit();
}
