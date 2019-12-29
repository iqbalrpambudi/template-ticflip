<?php
require_once './getdata.php';
session_start();
if (isset($_SESSION['username'])) {
    $_SESSION['promo'] = $promo['diskon'];
    $_SESSION['kodepromo'] = $promo['id_promo'];
    header('location:../homepage.php');
} else {
    $_SESSION['message'] = 'Silahkan login terlebih dahulu';
    header('location:../login.php');
}
