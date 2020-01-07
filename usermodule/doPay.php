<?php
include './koneksi.php';
session_start();
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $item = $_POST['item'];
    $metode = $_POST['pembayaran'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['jumlah'] * $_POST['harga'];
    $id_item = $_POST['id_item'];
    $username = $_SESSION['username'];

    if ($_POST['penginapan'] != '') {
        $penginapan = $_POST['penginapan'];
    }
    if ($_POST['kendaraan'] != '') {
        $kendaraan = $_POST['kendaraan'];
    }

    // Generate New Id
    $getlastid = mysqli_query($conn, 'SELECT max(id_pembayaran) as id from tb_pembayaran');
    $lastid = mysqli_fetch_assoc($getlastid);
    $sub = substr($lastid['id'], 2);
    $sub = (int) $sub;
    $sub++;
    $char = 'PB';
    $kode = $char . sprintf("%03s", $sub);

    // GetDate
    $date = date('Y-m-d');
    $nextdate = date('Y-m-d', strtotime('+1 days', strtotime($date))); //operasi penjumlahan tanggal sebanyak 6 hari

    $insert = mysqli_query($conn, "INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_checkout`, `username`,`id_item`,`item`, `metode`, `tanggal`, `barcode`, `status`,`konfirmasi`) VALUES ('$kode', '$id', '$username','$id_item', '$item', '$metode', '$date', 'das', 'belum lunas','0');");
    if ($insert) {
        mysqli_query($conn, "UPDATE `tb_checkout` SET `status` = '1',`jumlah` = '$jumlah', `total`='$total' WHERE `tb_checkout`.`id_checkout` = '$id'");
        header('location:../user.php');
    }
    echo mysqli_error($insert);
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $username = $_SESSION['username'];
    mysqli_query($conn, "DELETE FROM `tb_checkout` WHERE `tb_checkout`.`id_checkout` = '$id'");
    header('location:../user.php');
}
