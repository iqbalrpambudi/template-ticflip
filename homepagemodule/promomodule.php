<?php
require_once './getdata.php';
$_SESSION['promo'] = $promo['diskon'];
header('location:../homepage.php');
