<?php
$conn = mysqli_connect('localhost', 'root', '','ticflip');
$fetch=mysqli_query($conn, "select * from tb_count");
$orderquery = mysqli_query($conn, "select count(id_pembayaran) as ordercount from tb_pembayaran where status='lunas'");

// Visitor counter
foreach ($fetch as $fet)
{
    $id=$fet['id'];
    $counts=$fet['count'];
    $tolcount2=$counts+1;
    $updates=mysqli_query($conn, "update tb_count set count='$tolcount2' where id='$id' ");
}

// Order COunter
$ordercounter = mysqli_fetch_assoc($orderquery);
