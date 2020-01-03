<?php
$conn = mysqli_connect('localhost', 'root', '', 'ticflip');
if (!$conn) {
    die('Tidak dapat tersambung dengan database');
}

if (!$_SESSION['username']) {
    header('Location:./login.php');
}
$username = $_SESSION['username'];

// Query
$getUserDataQuery = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'");
$getUserTaxQuery = mysqli_query($conn, "SELECT * FROM tb_pembayaran WHERE username = '$username' and konfirmasi=1");
$getUserPaidTaxQuery = mysqli_query($conn, "SELECT tb_pembayaran.*,tb_checkout.jumlah, tb_checkout.total FROM tb_pembayaran JOIN tb_checkout ON tb_pembayaran.id_checkout=tb_checkout.id_checkout WHERE tb_pembayaran.status='belum lunas' and konfirmasi=0 and tb_pembayaran.username='$username'");
$getCheckoutQuery = mysqli_query($conn, "SELECT a.id_checkout, a.id_tiket, a.id_tour,a.username, a.tanggal, a.jumlah, b.nama as tiket, b.harga as harga_tiket, c.nama as tour, c.harga as harga_tour FROM tb_checkout a LEFT JOIN tb_tiket b ON a.id_tiket = b.id_tiket LEFT JOIN tb_tour c ON a.id_tour = c.id_tour  WHERE username = '$username' and status=0");
$checktax = mysqli_query($conn, "SELECT * FROM tb_pembayaran WHERE username = '$username' AND konfirmasi='0'");
$checkcart = mysqli_query($conn, "SELECT * FROM tb_checkout WHERE username = '$username' and status=0");
// Get Query
$getUserData = mysqli_fetch_assoc($getUserDataQuery);
