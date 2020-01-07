<?php
include "./usermodule/koneksi.php";
require './printpdf/fpdf.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT tb_pembayaran.*,tb_checkout.jumlah,tb_checkout.total FROM tb_pembayaran JOIN tb_checkout ON tb_checkout.id_checkout=tb_pembayaran.id_checkout where id_pembayaran='$id'");

// Setting halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial', 'B', 16);
// Membuat string
$pdf->Cell(190, 7, 'Bukti Pembayaran', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(190, 7, 'Ticflip', 0, 1, 'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'Id Pembayaran', 1, 0);
$pdf->Cell(50, 6, 'Item', 1, 0);
$pdf->Cell(20, 6, 'Qty', 1, 0);
$pdf->Cell(30, 6, 'Total', 1, 0);
$pdf->Cell(20, 6, 'Metode', 1, 0);
$pdf->Cell(25, 6, 'Tanggal', 1, 1);

$pdf->SetFont('Arial', '', 10);
foreach ($query as $row) {
    $pdf->Cell(30, 6, $row['id_pembayaran'], 1, 0);
    $pdf->Cell(50, 6, $row['item'], 1, 0);
    $pdf->Cell(20, 6, $row['jumlah'], 1, 0);
    $pdf->Cell(30, 6, 'Rp. ' . number_format($row['total'], 0, ',', '.'), 1, 0);
    $pdf->Cell(20, 6, strtoupper($row['metode']), 1, 0);
    $pdf->Cell(25, 6, $row['tanggal'], 1, 1);
}

$pdf->Output();
