<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "db_login_activity";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
   die("Connection Failed: " . mysqli_connect_error());
}
