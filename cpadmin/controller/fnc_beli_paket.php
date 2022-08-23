<?php
include "config.php";
include "library/routerosapi.php";

function invoice($no, $tabel){
	 global $mysql;
	 $query = mysqli_query($mysql, 'SELECT MAX(RIGHT('.$no.',3)) as invoice FROM '.$tabel.'');
	 $data = mysqli_fetch_array($query);
	 $invoice = $data['invoice'];
	 $sort_num = (int) substr($invoice, 1, 3);
	 $sort_num++;
	 $noc = sprintf("%03s", $sort_num);
	 
	 
        date_default_timezone_set('Asia/Jakarta');
        return date('d').$noc;
}

function addTransaksi($data){
	global $mysql;
	$invoice 		= $data['invoice'];
	$fullname 		= $data['fullname'];
	$username		= $data['username'];
	$password		= $data['password'];
	$paket			= $data['paket'];
	$id_client		= $data['id_client'];
	$invoice_date	= $data['date_invoice'];
	
	
	$p_query = mysqli_query($mysql, "SELECT * FROM tbl_paket WHERE id_paket='$paket'");
	$p = mysqli_fetch_array($p_query);
	$jenispaket = $p['tipe_limit'];
	$namapaket	= $p['nama'];
	$timelimit	= $p['time_limit'];
	$datalimit	= $p['data_limit'];
	$harga		= $p['harga'];
	$masa_aktiv = $p['masa_aktiv'];
	$idr		= $_SESSION['idr'];
	$id_admin	= $_SESSION['id_admin'];
	
	
	if($jenispaket=='unlimited'){
		$API = new routeros_api();
		if ($API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']))
				 $API->comm("/ip/hotspot/user/add", array(
		  "name" => "$username",
		  "password" => "$password",
		  "profile" => "$namapaket",

    ));
	$query = "INSERT INTO tbl_billing VALUES('','$invoice','$jenispaket','$id_client','$username','$password','$paket','$namapaket','$harga','$idr','$id_admin',now(),'$masa_aktiv')";
	mysqli_query($mysql, $query);
	echo "<script>
	document.location.href = 'index.php?pg=print_invoice&&inv=$invoice'
	</script>";

	
	
}elseif($jenispaket=='timebase'){
		$API = new routeros_api();
		if ($API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']))
				 $API->comm("/ip/hotspot/user/add", array(
		  "name" => "$username",
		  "password" => "$password",
		  "profile" => "$namapaket",
		  "limit-uptime" => "$timelimit:00:00",

    ));
	$query = "INSERT INTO tbl_billing VALUES('','$invoice','$jenispaket','$id_client','$username','$password','$paket','$namapaket','$harga','$idr','$id_admin',now(),'$masa_aktiv')";
	mysqli_query($mysql, $query);
	echo "<script>
	document.location.href = 'index.php?pg=print_invoice&&inv=$invoice'
	</script>";
	
	
}elseif($jenispaket=='quotabase'){
		$API = new routeros_api();
		if ($API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']))
				 $API->comm("/ip/hotspot/user/add", array(
		  "name" => "$username",
		  "password" => "$password",
		  "profile" => "$namapaket",
		  "limit-bytes-total" => "$datalimit",

    ));
	$query = "INSERT INTO tbl_billing VALUES('','$invoice','$jenispaket','$id_client','$username','$password','$paket','$namapaket','$harga','$idr','$id_admin',now(),'$masa_aktiv')";
	mysqli_query($mysql, $query);
	echo "<script>
	document.location.href = 'index.php?pg=print_invoice&&inv=$invoice'
	</script>";

	
	//return mysqli_affected_rows($mysql);
	//mysqli_close();
	}
}
?>