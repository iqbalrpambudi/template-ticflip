<?php
session_start();

if (isset($_POST["login"])) {
	include("./koneksi.php");

	$user = $_POST["inputUsername"];
	$pass = $_POST["inputPassword"];

	$query = mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$user' AND password='$pass'");
	$data = mysqli_fetch_assoc($query);
	$query2 = mysqli_query($connect, "SELECT * FROM tb_user WHERE username='$user'");
	$data2 = mysqli_fetch_assoc($query2);
	$ban = $data2['baned'];

	if ($query->num_rows == 1) {

		if ('N' == $ban) {
			$reset = mysqli_query($connect, "UPDATE tb_user SET logintime = 0 where username='$user'");

			if ($data['role'] == "admin") {
				$_SESSION['username'] = $user;
				$_SESSION['role'] = "admin";
				header("location:../admin/admin.php");
			} else if ($data['role'] == "user") {
				$_SESSION['username'] = $user;
				$_SESSION['role'] = "user";
				header("location:../user.php");
			} else {
				header("location:../login.php");
				exit();
			}
		} else if ('Y' == $ban) {
			echo "<script type=text/javascript>
       	 		alert('Username $user Telah Di Blokir, Silahkan Hubungi Administrator');
        		window.location = '../login.php'
        		</script>";
			return false;
		} else {
			header("location:../login.php");
			exit();
		}
	} else {
		$query = mysqli_query($connect, "UPDATE tb_user SET logintime = logintime + 1 where username='$user'");
		$query2 = mysqli_query($connect, "SELECT logintime from tb_user where username= '$user'");
		$data2 = mysqli_fetch_assoc($query2);
		$cek = $data2['logintime'];
		if ($cek > 3) {
			$query = mysqli_query($connect, "UPDATE tb_user SET baned = 'Y' where username='$user'");
			echo "<script type=text/javascript>
          		alert('Username $user Telah Di Blokir, Silahkan Hubungi Administrator');
          		window.location = '../login.php'
          		</script>";
		} else {
			echo "<script type=text/javascript>
                alert('Username Atau Password Tidak Benar, Anda Sudah $cek Kali Mencoba');
                window.location.href='../login.php'
                </script>";
		}
		return false;
	}
}
