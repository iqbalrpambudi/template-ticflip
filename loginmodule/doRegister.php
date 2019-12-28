<?php
session_start();
include("koneksi.php");

if (isset($_POST["register"])) {
	$name = $_POST["inputName"];
	$user = $_POST["inputUsername"];
	$email = $_POST["inputEmail"];

	$pass1 = $_POST["inputPassword1"];
	$pass2 = $_POST["inputPassword2"];

	if ($pass1 != $pass2) {
		$_SESSION["message"] = "Password tidak sama!";
		header("location:../register.php");
		exit();
	} else {
		$result = $connect->query("SELECT * FROM tb_user WHERE username='$username' or email='$email'");

		if ($result->num_rows == 0) {
			$connect->query("INSERT INTO tb_user VALUES ('" . $user . "','" . $name . "','" . $pass1 . "','" . $email . "','',0,'user','N','','')");
			$_SESSION["message"] = 'Silahkan Login';
			echo "<script type=text/javascript>
       	 			alert('Account successfully created');
        			window.location = '../login.php'
        			</script>";
			exit();
		} else {
			$_SESSION["message"] = "Akun sudah digunakan!";
			header("location:../register.php");
			exit();
		}
	}
}
