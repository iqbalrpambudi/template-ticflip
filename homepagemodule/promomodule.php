<?php
require_once './getdata.php';

session_start();
$_SESSION['promo'] = $promo['diskon'];
header('location:../homepage.php');
