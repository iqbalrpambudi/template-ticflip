<?php
include './koneksi.php';
session_start();
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $username = $_SESSION['username'];
    mysqli_query($conn, "UPDATE `tb_pembayaran` SET `konfirmasi` = '1', `status`= 'pending' WHERE `tb_pembayaran`.`id_pembayaran` = '$id'");

    $get = mysqli_query($conn, "SELECT poin from `tb_user` WHERE `username` = '$username'");
    $poin = mysqli_fetch_assoc($get);

    $addpoin = (int) $poin['poin'] + 10;

    mysqli_query($conn, "UPDATE `tb_user` SET `poin` = $addpoin WHERE username = '$username'");
    header('location:../user.php');
}
