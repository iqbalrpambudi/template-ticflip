<?php
include '../usermodule/koneksi.php';
session_start();
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $item = $_POST['item'];
    $metode = $_POST['pembayaran'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['jumlah'] * $_POST['harga'];
    $id_item = $_POST['id_item'];
    $promo = $_POST['promo'];
    $tukarpoin = $_POST['tukarpoin'];
    $username = $_SESSION['username'];

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

    // TUKAR POIN
    // Ambil data poin di database
    $tukarpoinquery = mysqli_query($conn, "SELECT poin from tb_user where username='$username'");
    $getpoin = mysqli_fetch_assoc($tukarpoinquery);
    // Validasi apakah poin ada dan lebih dari 200
    if ($getpoin != null && (int) $getpoin['poin'] >= 200) {
        // Membuat diskon sebesar 5 persen dari total harga
        $diskonpoin = (0.05 * (int) $total);
        // Mengurangi poin sebesar 200
        $updatepoin = (int) $getpoin['poin'] - 200;
        // Update tabel poin dengan poin yang sudah dikurangi 200
        mysqli_query($conn, "UPDATE `tb_user` SET `poin` = '$updatepoin' WHERE `tb_user`.`username` = '$username'");
    } else {
        // Bila tidak memenuhi syarat diskon poin default 0
        $diskonpoin = 0;
    }

    // AMBIL PROMO KODE
    // Ambil data diskon di database
    $querypromo = mysqli_query($conn, "SELECT diskon from tb_promo where id_promo='$promo'");
    $diskon = mysqli_fetch_assoc($querypromo);
    // Cek apakah kode promo tersedia
    if ($diskon != null) {
        // Bila tersedia buat diskon sebesar diskon yang ada didatabase
        $diskonpromo = (((int) $diskon['diskon'] / 100) * (int) $total);
    } else {
        // Set default diskon 0
        $diskonpromo = 0;
    }

    //Menjumlahkan semua diskon dan tukar poin
    $total = (int) $total - (int) $diskonpromo - (int) $diskonpoin;
    // Insert ke database pembayaran
    $insert = mysqli_query($conn, "INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_checkout`, `username`,`id_item`,`item`, `metode`, `tanggal`, `barcode`, `status`,`konfirmasi`) VALUES ('$kode', '$id', '$username','$id_item', '$item', '$metode', '$date', 'das', 'belum lunas','0');");
    if ($insert) {
        //Update tabel checkout dengan status kode 1 artinya sudah diorder 
        mysqli_query($conn, "UPDATE `tb_checkout` SET `status` = '1',`jumlah` = '$jumlah', `total`=$total WHERE `tb_checkout`.`id_checkout` = '$id'");
        // redirect ke halaman konfirmasi
        header('location:../konfirmasi.php');
    }
    echo mysqli_error($insert);
    // Jika tombol hapus ditekan
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $username = $_SESSION['username'];
    mysqli_query($conn, "DELETE FROM `tb_checkout` WHERE `tb_checkout`.`id_checkout` = '$id'");
    header('location:../pembayaran.php');
}
