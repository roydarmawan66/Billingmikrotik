  <?php
//Jika download plugin mpdf tanpa composer (versi lama)
define('_MPDF_PATH','library/mpdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4', 11, 'Georgia');
 
//Jika download plugin mpdf dengan composer (versi baru)
//require_once __DIR__ . '/vendor/autoload.php';
//$mpdf = new \Mpdf\Mpdf();
 
//Menggabungkan dengan file koneksi yang telah kita buat
include 'controller/config.php';
 
$nama_dokumen='hasil-ekspor';
ob_start();
$html ='

<!DOCTYPE html>
<html>
  <body>      

        <div class="container">
			<div class="row">
			<img src="../img/smartlink.png" class="img-responsive float-left" alt="">
				<div class="col-lg-12">
				<p><h3><b>Invoice #20001</b></h3></p>
				</div>
			</div>
		</div>
	</body>
  </html>';

$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>
 
