<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
			color: #fff;
			background-image: url('./assets/hero.jpg');
			background-position: center;
			background-repeat: no-repeat;
		}

		.form-control {
			min-height: 41px;
			background: #f2f2f2;
			box-shadow: none !important;
			border: transparent;
		}

		.form-control:focus {
			background: #e2e2e2;
		}

		.form-control,
		.btn {
			border-radius: 2px;
		}

		.login-form {
			width: 350px;
			margin: 120px auto;
			text-align: center;
		}

		.login-form h2 {
			margin: 10px 0 25px;
		}

		.login-form form {
			color: #7a7a7a;
			border-radius: 3px;
			margin-bottom: 15px;
			background: #fff;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}

		.login-form .btn {
			font-size: 16px;
			font-weight: bold;
			background: #3598dc;
			border: none;
			outline: none !important;
		}

		.login-form .btn:hover,
		.login-form .btn:focus {
			background: #2389cd;
		}

		.login-form a {
			color: #fff;
			text-decoration: underline;
		}

		.login-form a:hover {
			text-decoration: none;
		}

		.login-form form a {
			color: #7a7a7a;
			text-decoration: none;
		}

		.login-form form a:hover {
			text-decoration: underline;
		}
	</style>
</head>

<body>
	<div class="login-form">
		<form action="./loginmodule/doRegister.php" method="post">
			<h2 class="text-center">Register</h2>
			<?php
			if (isset($_SESSION["message"])) {
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			}
			?>
			<div class="form-group has-error">
				<input type="text" class="form-control" name="inputName" placeholder="Name" required="required">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="inputUsername" placeholder="Username" required="required">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="inputEmail" placeholder="Email" required="required">
			</div>
			<div class="form-group">
				<input type="tel" class="form-control" name="inputNomor" placeholder="No.Telepon" required="required">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="inputPassword1" placeholder="Password" required="required">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="inputPassword2" placeholder="Retype Password" required="required">
			</div>

			<div class="form-group">
				<button type="submit" name="register" class="btn btn-primary btn-lg btn-block">Register</button>
			</div>
			<p class="text-center small">Already have account? <a href="login.php">Login here!</a></p>
		</form>
	</div>
</body>

</html>