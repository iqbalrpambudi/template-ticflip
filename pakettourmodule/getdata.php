<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'ticflip';

$koneksi = mysqli_connect($host, $user, $password, $db);
if (!$koneksi) {
    die('Tidak dapat tersambung dengan database');
}

$querytour = mysqli_query($koneksi, "SELECT * from tb_tour");
$tourquery = mysqli_query($koneksi, "SELECT * from tb_tour");

$datatour = mysqli_fetch_assoc($tourquery);
$tour = mysqli_fetch_assoc($querytour);
