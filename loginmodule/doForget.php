<?php 
	session_start();
	include("koneksi.php");

	if(isset($_POST['change'])){
 		$email = $_POST["inputEmail"];
 		$pass1 = $_POST["inputPassword1"];
		$pass2 = $_POST["inputPassword2"];

		if($pass1!=$pass2){
			$_SESSION["message"] = "Password tidak sama!";
			header("location:forgot.php");
			exit();
		}else{
			$query=$connect->query("SELECT * FROM tb_user WHERE email='$email'");
			$result=mysqli_fetch_array($query);

			if($query->num_rows==1){
				$connect->query("UPDATE tb_user SET password='$pass1' WHERE email='$email'");
  				$_SESSION["message"]="Password Changed Successfully";
  				header("location:login.php");
			}else{
  				$_SESSION["message"]="Invalid email";
  				header("location:forgot.php");
  				exit();
			}
		}
	}
?>