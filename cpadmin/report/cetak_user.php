<?php
include "../controller/config.php";
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Daftar_seleksi_calon_siswa'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../library/mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();
?>
 
<style>
 	table{margin: auto;}
 	td,th{padding: 5px;text-align: center; width: 150px}
 	h1{text-align: center}
 	th{background-color: #95a5a6; padding: 10px;color: #fff}
 </style>
<h1>List Data User</h1>
<table border="1">
	<tr>
		<th>No</th>
		<th>Full Name</th>
		<th>Address</th>
		<th>No HP</th>
		<th>Email</th>
	</tr>
	<?php $tampil = mysqli_query($mysql,"SELECT * FROM tbl_client");
	$no=1;
	while($row = mysqli_fetch_array($tampil)){?>
	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $row ['nm_client']; ?></td>
		<td><?php echo $row ['alamat']; ?></td>
		<td><?php echo $row ['noHP']; ?></td>
		<td><?php echo $row ['email']; ?></td>
	</tr>
   <?php }?>
   
</table>
 
<?php
 
$mpdf->setFooter('{PAGENO}');
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>