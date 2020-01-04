<?php

$conn = mysqli_connect('localhost', 'root', '', 'ticflip');
$tiketQuery = mysqli_query($conn, "SELECT * FROM tb_tiket");
$tourQuery = mysqli_query($conn, "SELECT * FROM tb_tour");
$promoQuery = mysqli_query($conn, "SELECT * from tb_promo WHERE id_promo='ticflipaja'");
$promo = mysqli_fetch_assoc($promoQuery);
