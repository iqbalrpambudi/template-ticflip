<?php
// Ambil data
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];

if ($_FILES['file']['size'] == 0) {
    $conn = mysqli_connect('localhost', 'root', '', 'ticflip');
    mysqli_query($conn, "UPDATE `tb_user` SET `nama` = '$nama', `email` = '$email', `alamat` = '$alamat' WHERE `tb_user`.`username` = '$username'");
    if ($terupload) {
        header('location:../user.php');
    } else {
        header('location:../user.php');
    }
} else {

    // ambil data file
    $namaFile = $_FILES['file']['name'];
    $namaSementara = $_FILES['file']['tmp_name'];


    // lokasi file yang akan diupload
    $dirUpload = "../assets/profile/";

    // Ambil nama gambar sebelumnya di database
    $conn = mysqli_connect('localhost', 'root', '', 'ticflip');
    $lastPicQuery = mysqli_query($conn, "SELECT foto FROM tb_user WHERE username='$username'");
    $lastPic = mysqli_fetch_assoc($lastPicQuery);

    // jika nama gambar ada di database maka hapus 
    if ($lastPic['foto']) {
        unlink($dirUpload . $lastPic['foto']);
    }

    // memindahkan file ke direktori server
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

    // update nama gambar ke database
    mysqli_query($conn, "UPDATE `tb_user` SET `nama` = '$nama', `email` = '$email', `alamat` = '$alamat', `foto` = '$namaFile' WHERE `tb_user`.`username` = '$username'");
    if ($terupload) {
        header('location:../user.php');
    } else {
        header('location:../user.php');
    }
}
