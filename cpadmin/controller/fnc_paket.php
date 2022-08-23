<?php
include "config.php";
include "library/routerosapi.php";

function addPaket($data){
	global $mysql;
	$nama 		= $data['name'];
	$jenispaket = $data['jenispaket'];
	$harga		= $data['harga'];
	$rate		= $data['rate'];
	$limit		= $data['limit'];
	$rate_d		= $data['rate_d'];
	$limit_d	= $data['limit_d'];
	$ratedwnup	= $data['ratedownup'];
	$masa_aktiv	= $data['masa_aktiv'];
	$share		= $data['sharedUser'];
	$idr		= $_SESSION['idr'];
	$id_admin	= $_SESSION['id_admin'];
	
	$API = new routeros_api();
	if ($API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']))
		 $API->comm("/ip/hotspot/user/profile/add", array(
			  		  /*"add-mac-cookie" => "yes",*/
      "name" => "$nama",
	  "shared-users" => "$share",
	  "rate-limit" => "$ratedwnup", 
      "status-autorefresh" => "1m",
      "transparent-proxy" => "yes",

    ));

	
	$query = "INSERT INTO tbl_paket VALUES('','$nama','$jenispaket','$harga','$rate','$limit','$rate_d','$limit_d','$masa_aktiv','$share','$idr','$id_admin',now(),now())";
	if(mysqli_query($mysql, $query)){
		$saved = true;
	}else{
		$error = true;
	}
	//return mysqli_affected_rows($mysql);
	//mysqli_close();
	}

	
function delPaket($id,$del){
	global $mysql;
	$API = new routeros_api();
	if ($API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']))
	$API->comm("/ip/hotspot/user/profile/remove", array(
		".id" => "$del",
		));

	$query = "DELETE FROM tbl_paket WHERE id_paket = '$id'";
	mysqli_query ($mysql, $query);
	return mysqli_affected_rows($mysql);
	mysqli_close();
	}

	?>