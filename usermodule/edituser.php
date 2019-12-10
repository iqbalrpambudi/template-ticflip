<?php
// ambil data file
$namaFile = $_FILES['file']['name'];
$namaSementara = $_FILES['file']['tmp_name'];
$username = $_POST['username'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "../assets/profile/";

// Mendapatkan Ekstensi
// $ekstensivalid = ['jpg', 'jpeg', 'png'];
// $ekstensi = explode('.', $namaFile);
// $ekstensi = strtolower(end($ekstensi));

// if (!in_array($ekstensi, $ekstensivalid)) {
//     die('Upload Gagal!');
// }

// $filevalid = $username . '.' . $ekstensi;

// pindahkan file
// unlink($dirUpload.$username);

$conn = mysqli_connect('localhost', 'root', '', 'ticflip');
$lastPicQuery = mysqli_query($conn, "SELECT foto FROM tb_user WHERE username='$username'");
$lastPic = mysqli_fetch_assoc($lastPicQuery);

if ($lastPic['foto']) {
    unlink($dirUpload . $lastPic['foto']);
}

$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

mysqli_query($conn, "UPDATE tb_user SET foto = '$namaFile' WHERE tb_user.username = '$username'");
if ($terupload) {
    header('location:../user.php');
} else { }
