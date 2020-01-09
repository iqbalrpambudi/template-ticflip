<?php
session_start();
if (isset($_SESSION["email"])) {
	header("location:../user.php");
}
session_abort();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

	<!-- Icons -->
	<script src="../assets/fontawesome/js/all.min.js"></script>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="./assets/style/style.css">

	<!-- Jquery -->
	<script src="../assets/jquery/jquery.min.js"></script>
	<script src="../assets/popper/popper.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.min.js"> </script>
	<style type="text/css">
		body {
			color: #fff;
			background-image: url('../assets/hero.jpg');
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
			margin: 170px auto;
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

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
	<div class="container">
		<!-- Brand -->
		<a class="navbar-brand" href="homepage.php">
			<h2 class="text-light">TicFlip</h2>
		</a>

		<!-- Button -->
		<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Menu Navigation -->
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ml-auto">

				<li class="nav-item">
					<a class="nav-link text-white" href="../homepage.php"><i class="fa fa-home mr-2"></i>Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="../paket-tour.php"><i class="fas fa-box mr-2"></i>Paket
						Tour</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="../tiket.php"><i class="fas fa-ticket-alt mr-2"></i>Tiket</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="../about.php"><i class="fas fa-star mr-2"></i>About</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-5">
				<?php session_start();
				if (isset($_SESSION['username'])) { ?>
					<li class="dropdown">
						<a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
							Welcome, <?php echo ucfirst($_SESSION['username']); ?><b class="caret"></b>
						</a>
						<div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#"><i class="fas fa-coins mr-2 text-warning"></i><?php
																											$username = $_SESSION['username'];
																											$conn = mysqli_connect('localhost', 'root', '', 'ticflip');
																											$getData = mysqli_query($conn, "SELECT poin from tb_user where username='$username'");
																											$getpoin = mysqli_fetch_assoc($getData);
																											echo $getpoin['poin']; ?> Poin</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="../user.php">User Dashboard</a>
							<a class="dropdown-item" href="../loginmodule/logout.php">Logout</a>
						</div>
					</li>
					<li class="nav-item">

					</li>
					<!--  -->
				<?php } else { ?>
					<div class="nav-item ml-3">
						<a href="../login.php"><button type="button" class="btn btn-success">Login</button></a>
						<a href="../register.php"><button type="button" class="btn btn-primary">Register</button></a>
					</div>
				<?php }
				session_abort();
				?>
			</ul>
		</div>
	</div>
</nav>

<body>
	<div class="login-form">
		<form action="doforget.php" method="post">
			<h2 class="text-center">Forgot Password?</h2>
			<p class="text-center">You can reset your password here</p><br />
			<?php
			if (isset($_SESSION["message"])) {
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			}
			?>
			<div class="form-group has-error">
				<input type="text" class="form-control" name="inputEmail" placeholder="email" required="required">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="inputPassword1" placeholder="New Password" required="required">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="inputPassword2" placeholder="confirm Password" required="required">
			</div>
			<div class="form-group">
				<button type="submit" name="change" class="btn btn-primary btn-lg btn-block">Reset Password</button>
			</div>
			<p class="text-center small"><a href="../login.php">Back</a></p>
		</form>
	</div>
</body>

</html>