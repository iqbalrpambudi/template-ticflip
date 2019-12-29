<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'ticflip');
if (isset($_GET['key'])) {
    $key = $_GET['key'];
} else {
    $key = 'nama';
}
if (isset($_GET['order'])) {
    $order = $_GET['order'];
} else {
    $order = 'ASC';
}

$query = "SELECT * from tb_tiket ORDER BY $key $order";
$hasil = mysqli_query($koneksi, $query);
