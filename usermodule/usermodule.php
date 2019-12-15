<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'ticflip';

$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die('Tidak dapat tersambung dengan database');
}

if (!isset($_POST['submit'])) {
    header('Location:./login.php');
}

$username = $_POST['username'];
$password = $_POST['password'];
$userQuery = mysqli_query($conn, "SELECT * FROM tb_user where username='$username' and password='$password'");
$cek = mysqli_num_rows($userQuery);

// Validasi Login
if (!$cek) {
    session_start();
    $_SESSION['message'] = "Wrong Username/Password";
    header('Location:./login.php');
}

// Query
$getUserDataQuery = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username'");
$getUserTaxQuery = mysqli_query($conn, "SELECT * FROM tb_pembayaran WHERE username = '$username'");
$getUserPaidTaxQuery = mysqli_query($conn, "SELECT tb_pembayaran.*,tb_checkout.jumlah, tb_checkout.total FROM tb_pembayaran JOIN tb_checkout ON tb_pembayaran.id_checkout=tb_checkout.id_checkout WHERE status='belum lunas'");
$getCheckoutQuery = mysqli_query($conn, "SELECT a.id_checkout, a.id_tiket, a.id_tour,a.username, a.tanggal, a.jumlah, b.nama as tiket, b.harga as harga_tiket, c.nama as tour, c.harga as harga_tour FROM tb_checkout a LEFT JOIN tb_tiket b ON a.id_tiket = b.id_tiket LEFT JOIN tb_tour c ON a.id_tour = c.id_tour  WHERE username = '$username'");
$checktax = mysqli_query($conn, "SELECT * FROM tb_pembayaran WHERE username = '$username' AND status='belum lunas'");
$checkcart = mysqli_query($conn, "SELECT * FROM tb_checkout WHERE username = '$username'");
// Get Query
$getUserData = mysqli_fetch_assoc($getUserDataQuery);
