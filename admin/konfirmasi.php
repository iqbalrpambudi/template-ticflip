<?php
include './koneksi.php';

$id = $_GET['id'];
mysqli_query($connect, "UPDATE `tb_pembayaran` SET `status`= 'lunas' WHERE `id_pembayaran` = '$id'");
header('location:./dftpembayaran.php');
