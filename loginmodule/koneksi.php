<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ticflip';
$connect = mysqli_connect($host, $username, $password, $database) or die("Koneksi gagal");

if ($connect) {
	//echo "koneksi berhasil";
} else {
	echo "koneksi gagal";
}
