<?php
include './koneksi.php';
session_start();
$user = $_SESSION['username'];
$item = $_POST['id_item'];
$rate = (int) $_POST['rate'];

$cek = mysqli_query($conn, "SELECT * FROM `tb_rating` WHERE username = '$user' and id_tiket='$item'");
if ($cek->num_rows > 0) {
    mysqli_query($conn, "UPDATE `tb_rating` SET `rate` = $rate WHERE `username` = '$user' AND id_tiket='$item'");
    header('location:../user.php');
} else {
    mysqli_query($conn, "INSERT INTO `tb_rating` (`username`, `id_tiket`, `id_tour`, `rate`, `comments`) VALUES ('$user', '$item', NULL, '$rate', NULL);");
    header('location:../user.php');
}
