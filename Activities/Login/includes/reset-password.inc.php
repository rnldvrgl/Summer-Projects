<?php

if (isset($_POST['reset-password-submit'])) {
   $selector = $_POST['selector'];
   $validator = $_POST['validator'];
   $password = $_POST['password'];
   $passwordRepeat = $_POST['repeat-password'];

   if (empty($password) || empty($passwordRepeat)) {
      header("Location: ../create-new-password.php?newpwd=empty");
      exit();
   } else if ($password != $passwordRepeat) {
      header("Location: ../create-new-password.php?newpwd=pwdnotsame");
      exit();
   }

   $currentDate = date("U");

   require('connection/connection.php');
   $sql = "SELECT * FROM  pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >=?;";
   $stmt = mysqli_stmt_init($conn);

   if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("Error404");
   } else {
      mysqli_stmt_bind_param($stmt, "s", $selector);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);
      if (!$row = mysqli_fetch_assoc($result)) {
         echo "You need to re-submit your request.";
         exit();
      } else {

         $tokenBin = hex2bin($validator);
         $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);

         if ($tokenCheck === false) {
            echo "You need to re-submit your request.";
            exit();
         } elseif ($tokenCheck === true) {
            $tokenEmail = $row['pwdResetEmail'];

            $sql = "SELECT * FROM accounts WHERE email=?;";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
               die("Error404");
            } else {
               mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
               mysqli_stmt_execute($stmt);
               $result = mysqli_stmt_get_result($stmt);
               if (!$row = mysqli_fetch_assoc($result)) {
                  echo "There was an error!";
                  exit();
               } else {
                  $sql = "UPDATE accounts SET password=? WHERE email=?;";
                  $stmt = mysqli_stmt_init($conn);

                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                     die("Error404");
                  } else {
                     $newPasswordHashed = password_hash($password, PASSWORD_DEFAULT);
                     mysqli_stmt_bind_param($stmt, "ss", $newPasswordHashed, $tokenEmail);
                     mysqli_stmt_execute($stmt);

                     $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
                     $stmt = mysqli_stmt_init($conn);

                     if (!mysqli_stmt_prepare($stmt, $sql)) {
                        die("Error404");
                     } else {
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?newpwd=passwordupdated");
                     }
                  }
               }
            }
         }
      }
   }
} else {
   header("Location: ../index.php");
}
