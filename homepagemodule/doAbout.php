<?php
include '../usermodule/koneksi.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $saran = $_POST['saran'];

    $query = mysqli_query($conn, "INSERT INTO `tb_saran` (`nama`, `email`, `telp`, `saran`) VALUES ('$nama', '$email', '$telepon', '$saran')");
    header('location:../about.php');
}
