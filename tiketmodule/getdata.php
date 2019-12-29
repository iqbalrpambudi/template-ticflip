<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'ticflip';

$koneksi = mysqli_connect($host, $user, $password, $db);
if (!$koneksi) {
    die('Tidak dapat tersambung dengan database');
}

$tourquery = mysqli_query($koneksi, "SELECT * from tb_tiket GROUP BY nama");
$datatour = mysqli_fetch_assoc($tourquery);
