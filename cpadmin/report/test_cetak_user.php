<?php
session_start();
if(!isset($_SESSION["login"])){
	header("location:index.php");
	exit;
}

include "../controller/config.php";
require('../library/fpdf/fpdf.php');
// Setting halaman PDF
$pdf = new FPDF('l','mm','A4');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(290,7,'Desa Digital Cyber Net',0,1,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(290,7,'Jl. Abece No. 80 Kodamar, jakarta Utara.',0,1,'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,5,'NO',1,0);
$pdf->Cell(55,5,'Full Name',1,0);
$pdf->Cell(120,5,'Address',1,0);
$pdf->Cell(30,5,'No HP',1,0);
$pdf->Cell(50,5,'Email',1,1);
 
$pdf->SetFont('Arial','',11);
$tampil = mysqli_query($mysql, "SELECT * FROM tbl_client WHERE idr = '$_SESSION[idr]' OR id_admin = '$_SESSION[id_admin]' ORDER BY id_client DESC");
$no=1;
while($row = mysqli_fetch_array($tampil)){
    $pdf->Cell(10,5,$no++,1,0);
    $pdf->Cell(55,5,$row['nm_client'],1,0);
    $pdf->Cell(120,5,$row['alamat'],1,0);
    $pdf->Cell(30,5,$row['noHP'],1,0);
    $pdf->Cell(50,5,$row['email'],1,1);
}

$pdf->Output();
?>