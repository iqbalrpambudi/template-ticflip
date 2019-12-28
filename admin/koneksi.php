<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ticflip';
$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
	echo "koneksi gagal";
}
