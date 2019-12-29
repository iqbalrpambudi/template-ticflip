<?php
session_start();
$username = $_SESSION['username'];
session_abort();
$id = $_POST['id'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];
$tanggal = $_POST['tanggal'];

$conn = mysqli_connect('localhost', 'root', '', 'ticflip');
// membuat query max
$cariid = mysqli_query($conn, "SELECT max(id_checkout) as id FROM tb_checkout") or die(mysqli_error($connect));
// menjadikannya array
$dataid = mysqli_fetch_assoc($cariid);
// jika $datakode
if ($dataid) {
    $nilaiid = substr($dataid['id'], 2);
    // menjadikan $nilaikode ( int )
    $kode = (int) $nilaiid;
    // setiap $kode di tambah 1
    $kode = $kode + 1;
    $id_otomatis = str_pad("OR00", 5, $kode);
} else {
    $id_otomatis = "OR001";
}

//   Filter Id Tiket/Tour
$id = $_POST['id'];
$getid = substr($id, 0, 2);
// menjadikan $nilaikode ( int )
if ($getid == 'TC') {
    $insert = mysqli_query($conn, "INSERT INTO `tb_checkout` (`id_checkout`, `id_tiket`, `id_tour`, `username`, `jumlah`, `total`, `tanggal`, `status`) VALUES ('$id_otomatis', '$id', NULL, '$username', '$jumlah', '$total', '$tanggal', '0');");
    header('location:./pembayaran.php');
} else {
    $insert = mysqli_query($conn, "INSERT INTO `tb_checkout` (`id_checkout`, `id_tiket`, `id_tour`, `username`, `jumlah`, `total`, `tanggal`, `status`) VALUES ('$id_otomatis', NULL,'$id', '$username', '$jumlah', '$total', '$tanggal', '0');");
    header('location:./pembayaran.php');
}
