<?php
$conn = mysqli_connect('localhost', 'root', '', 'ticflip');
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    session_abort();
    $getCheckoutQuery = mysqli_query($conn, "SELECT a.id_checkout, a.id_tiket, a.id_tour,a.username, a.tanggal, a.jumlah, b.nama as tiket, b.harga as harga_tiket, c.nama as tour, c.harga as harga_tour FROM tb_checkout a LEFT JOIN tb_tiket b ON a.id_tiket = b.id_tiket LEFT JOIN tb_tour c ON a.id_tour = c.id_tour  WHERE username = '$username' and status=0");
    $getData = mysqli_query($conn, "SELECT * from tb_checkout where username='$username'");
    $get = mysqli_fetch_assoc($getCheckoutQuery);
} else {
    // session_start();
    $_SESSION['message'] = 'Silahkan Login terlebih dahulu';
    session_abort();
    header('location:../login.php');
}
