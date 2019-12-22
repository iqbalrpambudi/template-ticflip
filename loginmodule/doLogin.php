<?php
session_start();

if (isset($_POST["login"])) {
	include("koneksi.php");

	$user = $_POST["inputUsername"];
	$pass = $_POST["inputPassword"];

	$query = mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$user' AND password='$pass'");

	if ($query->num_rows == 1) {
		$data = mysqli_fetch_assoc($query);

		if ($data['role'] == "admin") {
			$_SESSION['username'] = $user;
			$_SESSION['role'] = "admin";
			header("location:../admin.php");
		} else if ($data['role'] == "user") {
			$_SESSION['username'] = $user;
			$_SESSION['role'] = "user";
			header("location:../user.php");
		} else {
			header("location:../login.php");
			exit();
		}
	} else {
		$_SESSION["message"] = "Invalid Username or Password";
		header("location:../login.php");
		exit();
	}
}
