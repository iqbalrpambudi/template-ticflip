<?php  
	session_start();
	include ("koneksi.php");

	if (isset($_POST["register"])){
		$name = $_POST["inputName"];
		$user = $_POST["inputUsername"];
		$email = $_POST["inputEmail"];
		$nomor = $_POST["inputNomor"];

		$pass1 = $_POST["inputPassword1"];
		$pass2 = $_POST["inputPassword2"];

		if($pass1!=$pass2){
			$_SESSION["message"] = "Password tidak sama!";
			header("location:register.php");
			exit();
		}else{
			$encryptpass = md5($pass1);
			$result = $connect->query("SELECT * FROM tb_user WHERE email LIKE'".$email."'");

			if($result->num_rows==0){
				$connect->query("INSERT INTO tb_user VALUES ('".$name."','".$user."','".$email."','".$nomor."','".$encryptpass."',0,'user')");
				header("location:login.php");
				exit();
			}else{
				$_SESSION["message"] = "Akun sudah digunakan!";
				header("location:register.php");
				exit();
			}
		}

	}
?>