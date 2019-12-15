<?php

$conn = mysqli_connect('localhost', 'root', '', 'ticflip');
$tiketQuery = mysqli_query($conn, "SELECT id_tiket, nama FROM tb_tiket");
$tourQuery = mysqli_query($conn, "SELECT id_tour, nama FROM tb_tour");
$promoQuery = mysqli_query($conn, "SELECT diskon from tb_promo WHERE id_promo='ticflipaja'");
$promo = mysqli_fetch_assoc($promoQuery);
