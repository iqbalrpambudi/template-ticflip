<?php 
	session_start();
	include("./koneksi.php");

	if(isset($_POST['change'])){
 		$email = $_POST["inputEmail"];
 		$pass1 = $_POST["inputPassword1"];
		$pass2 = $_POST["inputPassword2"];

		if($pass1!=$pass2){
			$_SESSION["message"] = "Password tidak sama!";
			header("location:forgot.php");
			exit();
		}else{
			$query= mysqli_query($connect,"SELECT * FROM tb_user WHERE email='$email'");
			$result=mysqli_fetch_array($query);
			$query2 = mysqli_query($connect,"SELECT * FROM tb_user WHERE email='$email'");
			$data2 = mysqli_fetch_assoc($query2);
      		$ban = $data2['baned'];

			if($query->num_rows==1){
				if('N'==$ban){
					$result = mysqli_query($connect,"UPDATE tb_user SET password='$pass1' WHERE email='$email'");
					echo "<script type=text/javascript>
       	 			alert('Password Changed Successfully');
        			window.location = '../login.php'
        			</script>";
  				}else if ('Y'==$ban){
					echo "<script type=text/javascript>
       	 			alert('Email $email Telah Di Blokir, Silahkan Hubungi Administrator');
        			window.location = '../login.php'
        			</script>";
        			return false;
				}else{
					header("location:../login.php");
					exit();
				}
			}else{
  				$_SESSION["message"]="Invalid email";
  				header("location:./forgot.php");
  				exit();
			}
		}
	}
