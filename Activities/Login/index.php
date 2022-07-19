<?php
require "header.php";
if (isset($_SESSION['account_id'])) {
	header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
	<img class="wave wave-left" src="assets/img/wave.svg">
	<img class="wave wave-right" src="assets/img/wave2.svg">
	<div class="container d-flex align-items-center justify-content-center">
		<div class="form-content">
			<form action="includes/signin.inc.php" method="post">
				<img src="assets/img/avatar.svg">
				<h2 class="title">Sign-In</h2>
				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == "emptyfields") {
						echo '<p class="text-danger">Fill in all fields!</p>';
					} else if ($_GET['error'] == "sqlerror") {
						echo '<p class="text-danger">SQL Error!</p>';
					} else if ($_GET['error'] == "wrongpassword") {
						echo '<p class="text-danger">Your password is incorrect!</p>';
					} else if ($_GET['error'] == "nouser") {
						echo '<p class="text-danger">No user found!</p>';
					}
				}
				?>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Username</h5>
						<input type="text" name="username" class="input">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" name="password" class="input">
					</div>
				</div>
				<a href="reset-password.php">Forgot Password?</a>
				<button type="submit" name="signin-submit" class="btn">Login</button>
				<a href="signup.php"><button type="button" class="btn">Sign up</button></a>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>