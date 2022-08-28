<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

if (isset($_POST['reset-request-submit'])) {

   $selector = bin2hex(random_bytes(8));
   $token = random_bytes(32);

   $url = "http://localhost/Projects/Activities/Login/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

   $expires = date("U") + 1800;


   require 'connection/connection.php';

   $userEmail = $_POST['email'];
   $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
   $stmt = mysqli_stmt_init($conn);

   if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("Error404");
   } else {
      mysqli_stmt_bind_param($stmt, "s", $userEmail);
      mysqli_stmt_execute($stmt);
   }

   $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
   if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("Error404");
   } else {
      $hashedToken = password_hash($token, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $token, $expires);
      mysqli_stmt_execute($stmt);
   }
   //Server settings
   $mail = new PHPMailer();
   $mail->SMTPDebug = 0;                                       //Enable verbose debug output
   $mail->isSMTP();                                            //Send using SMTP
   $mail->Host       = "smtp.mail.com";                        //Set the SMTP server to send through
   $mail->SMTPAuth   = TRUE;                                   //Enable SMTP authentication
   $mail->Username   = "ronald_delacruz@rcc.edu.ph";               //SMTP username
   $mail->Password   = "zzcqzfjfitacbljw";                        //SMTP password
   $mail->SMTPSecure = "tls";                                  //Enable implicit TLS encryption
   $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

   //Recipients
   $mail->AddAddress($email_to);
   $mail->SetFrom("ronald_delacruz@rcc.edu.ph");

   //Content
   $email_to = $userEmail;
   $subject = "Password Recovery";
   $message = '<p>We received a password request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>';
   $message .= '<p>Here is your password reset link:</br>';
   $message .= '<a href="' . $url . '">' . $url . '</a></p>';
   $body = $message;

   $mail->isHTML(true);                                  //Set email format to HTML
   $mail->Subject = $subject;
   $mail->MsgHTML = $body;

   if (!$mail->Send()) {
      header("Location: ../reset-password.php?reset=failed");
      echo $mail->ErrorInfo;
   } else {
      header("Location: ../reset-password.php?reset=success");
   }


   mysqli_stmt_close($stmt);
} else {
   header("Location: ../index.php");
}
