<?php
if (isset($_POST['cekpromo'])) {
    $id = $_POST['promo'];
    $conn = mysqli_connect('localhost', 'root', '', 'ticflip');
    $query = mysqli_query($conn, "SELECT * from tb_promo WHERE id_promo='$id'");
    $promo = mysqli_fetch_assoc($query);
    if ($promo) {
        session_start();
        $_SESSION['kodepromo'] = 'Diskon ' . $diskon . '% terpasang.';
        session_abort();
        // header('location:../pembayaran.php');
    } else {
        echo 'tralala';
    }
}
