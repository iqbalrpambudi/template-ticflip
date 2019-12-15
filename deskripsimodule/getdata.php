<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'ticflip';

$koneksi = mysqli_connect($host, $user, $password, $db);
if (!$koneksi) {
    die('Tidak dapat tersambung dengan database');
}

$id = $_GET['id'];
$tourquery = mysqli_query($koneksi, "SELECT * from tb_tour WHERE id_tour='$id'");
$tiketquery = mysqli_query($koneksi, "SELECT * from tb_tiket WHERE id_tiket='$id'");
$datatour = mysqli_fetch_assoc($tourquery);
$datatiket = mysqli_fetch_assoc($tiketquery);
