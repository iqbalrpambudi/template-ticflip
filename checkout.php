<?php

if (isset($_POST['submit'])) {
    $jumlah = $_POST['jumlah'];
    $penginapan = $_POST['penginapan'];
    $tanggal = $_POST['tanggal'];
    $kendaraan = $_POST['kendaraan'];
    $item = $_POST['id'];

    echo 'id : ' . $item . '<br/>';
    echo 'jumlah : ' . $jumlah . '<br/>';
    echo 'penginapan : ' . $penginapan . '<br/>';
    echo 'tanggal : ' . $tanggal . '<br/>';
    echo 'kendaraan : ' . $kendaraan . '<br/>';
}
