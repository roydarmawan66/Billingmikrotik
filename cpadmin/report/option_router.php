<?php
// Load file koneksi.php
include "config.php";

// Ambil data ID Provinsi yang dikirim via ajax post
$no_customer = $_POST['no_customer'];

// Buat query untuk menampilkan data kota dengan provinsi tertentu (sesuai yang dipilih user pada form)
$sql = mysqli_query($mysql, "SELECT * FROM tbl_konfig WHERE no_customer = '".$no_customer."'");

// Buat variabel untuk menampung tag-tag option nya
// Set defaultnya dengan tag option Pilih
$html = "<option value=''>Pilih</option>";

while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$html .= "<option value='".$data['host_router']."'>".$data['host_router']."</option>"; // Tambahkan tag option ke variabel $html
}

$callback = array('data_host'=>$html); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota
echo json_encode($callback); // konversi variabel $callback menjadi JSON 
?>
