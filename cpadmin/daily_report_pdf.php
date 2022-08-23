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
include 'controller/fnc_ast.php';

$nama_dokumen='hasil-ekspor';
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>MPDF Printout</title>
    <style>
        *
        {
            margin:0;
            padding:0;
            font-family: calibri;
            font-size:10pt;
            color:#000;
        }
        body
        {
            width:100%;
            font-family: calibri;
            font-size:8pt;
            margin:0;
            padding:0;
        }
         
        p
        {
            margin:0;
            padding:0;
            margin-left: 200px;
        }
         
        #wrapper
        {
            width:200mm;
            margin:0 5mm;
        }
         
        .page
        {
            height:297mm;
            width:210mm;
            page-break-after:always;
        }
 
        table
        {
            border-left: 1px solid #fff;
            border-top: 1px solid #fff;
            font-family: calibri; 
            border-spacing:0;
            border-collapse: collapse; 
             
        }
         
        table td 
        {
            border-right: 1px solid #fff;
            border-bottom: 1px solid #fff;
            padding: 2mm;
            
        }
         
        table.heading
        {
            height:50mm;
        }
         
        h1.heading
        {
            font-size:10pt;
            color:#000;
            font-weight:normal;
            font-style: italic;
        }
         
        h2.heading
        {
            font-size:10pt;
            color:#000;
            font-weight:normal;
        }
         
        hr
        {
            color:#ccc;
            background:#ccc;
        }
         
        #invoice_body
        {
            height: auto;
        }
         
        #invoice_body , #invoice_total
        {   
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
     
            border-spacing:0;
            border-collapse: collapse; 
             
            margin-top:5mm;
        }
         
        #invoice_body table td , #invoice_total table td
        {
            text-align:center;
            font-size:8pt;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
            padding:2mm 0;
        }
         
        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            text-align:right;
            padding-right:3mm;
            font-size:8pt;
        }
         
        #footer
        {   
            width:200mm;
            margin:0 5mm;
            padding-bottom:3mm;
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            background:#eee;
             
            border-spacing:0;
            border-collapse: collapse; 
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
		#total-right {
			float: right;
			right: 0;
			top: 100px;
			width: 200px;
			margin-top:5mm;
		}
    </style>
</head>
<body>
<div id="wrapper">
  
    <table class="heading" style="width:100%;">
        <tr>
        <td> <center><p style="text-align:center; font-size: 16px; font-weight:bold;">DAILY REPORTS</p></center></td>
        </tr>
    </table>
         
         
    <div id="content">
			<div  id="invoice_body">
            <b>All Transaction at date :</b><br>
			<?php date_default_timezone_set('Asia/Jakarta');					
					$tgl = date('Y M d h:i:s A');
					echo $tgl; ?>
			</div>
        <div id="invoice_body">
              <table border="1">
            <tr>
                <td style="width:10%;"><b>No</b></td>
                <td style="width:10%;"><b>Username</b></td>
                <td style="width:10%;"><b>Jenis Paket</b></td>
                <td style="width:10%;"><b>Nama Paket</b></td>
				<td style="width:10%;"><b>Harga</b></td>
                <td style="width:10%;"><b>Tanggal Aktif</b></td>
                <td style="width:10%;"><b>Validasi</b></td>
            </tr>
            <?php
				$tgl2 = date('Y-m-d');
				$query = mysqli_query($mysql, "SELECT * FROM tbl_billing WHERE idr = '$_SESSION[idr]' AND date_on = '$tgl2'");
				$no=1;
				foreach($query as $row => $data){
					$masa_aktiv = $data['masa_aktiv'];
					$invoice_date = $data['invoice_date'];
					$due_date		= date('Y-m-d h:i:s', strtotime(''.+$masa_aktiv.' month', strtotime($invoice_date)));
			?>
							
			<tr>
				<td style="width:10%;" class="mono"><?php echo $no++ ?></td>
				<td style="width:10%;" class="mono"><?php echo $data['user']; ?></td>
				<td style="width:10%;" class="mono"><?php echo $data['jenispaket']; ?></td>
				<td style="width:10%;" class="mono"><?php echo $data['namapaket']; ?></td>
				<td style="width:10%;" class="mono"><?php echo rupiah($data['harga']); ?></td>
				<td style="width:10%;" class="mono"><?php echo $data['date_on']; ?></td>
				<td style="width:10%;" class="mono"><?php echo $data['masa_aktiv']; ?> Hari</td>
			</tr>
			<?php }; ?>    
        </table>
        </div>
		<?php
		$date = date("Y-m-d");
		$query = mysqli_query($mysql, "SELECT SUM(harga) FROM tbl_billing WHERE date_on = '$date'");
		while($row=mysqli_fetch_array($query)){ ?>
        <div id="total-right">
            <p><h3>TOTAL INCOME:<dd><?php echo rupiah($row['SUM(harga)']); ?></h3></p>
        </div>
		<?php }; ?>
        <br />
        <hr />
        <br />
    </div>
    <br />
    </div>
<?php
$html = ob_get_contents(); //Proses untuk mengambil data
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,1);
$mpdf->Output();
$db1->close();
?>
 
