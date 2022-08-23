<?php
include "config.php";


function get_autonumber($no, $tabel){
	 global $mysql;
	 $query = mysqli_query($mysql, 'SELECT MAX(RIGHT('.$no.',4)) as noCustomer FROM '.$tabel.'');
	 $data = mysqli_fetch_array($query);
	 $noCustomer = $data['noCustomer'];
	 $sort_num = (int) substr($noCustomer, 1, 4);
	 $sort_num++;
	 $noc = sprintf("%04s", $sort_num);
	 
	 
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy').$noc;
}
 
function addCustomer($data){
	global $mysql;
	$no_customer = $data['no_customer'];
	$nm_customer = $data['nm_customer'];
	$noktp 		 = $data['noktp'];
	$tlp		 = $data['tlp'];
	$alamat		 = $data['alamat'];
	$email		 = $data['email'];
	$query = "INSERT INTO tbl_customer VALUES('','$no_customer','$nm_customer','$noktp','$tlp','$alamat','$email','','','')";
	mysqli_query($mysql, $query);
	return mysqli_affected_rows($mysql);
	mysqli_close();
		
}

function addRouter($data){
	global $mysql;
	$no_customer = $data['no_customer_rel'];
	$nm_customer = $data['nm_customer_rel'];
	$nm_router	 = $data['nm_router'];
	$host_router = $data['host_router'];
	$user_router = $data['user_router'];
	$pass_router = $data['pass_router'];
	$query = "INSERT INTO tbl_konfig VALUES('','$nm_router','$host_router','$user_router','$pass_router','$no_customer','$nm_customer',NOW())";
	mysqli_query($mysql, $query);
	return mysqli_affected_rows($mysql);
	mysqli_close();
	
	}
	
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

function recharge($data){
	global $mysql;
	$invoice 		= $data['noinvoice'];
	$no_customer	= $data['no_customer'];
	$nm_customer	= $data['nm_customer'];
	$idr			= $data['idr'];
	$host			= $data['host_router'];
	$invoice_date	= $data['date_invoice'];

	$priode			= $data['inlineRadioOptions'];
	
	if($priode == 3){
	$total = 100000;
	}else if($priode == 6){
	$total = 150000;
	}else{
	$total = 250000;
	}
	
	$due_date		= date('Y-m-d h:i:s', strtotime(''.+$priode.' month', strtotime($invoice_date)));
	$status			= $data['status'];
	
	$query = "insert INTO tbl_detail_konfig VALUES('','$invoice','$no_customer','$nm_customer','$idr','$host','$invoice_date','$due_date','$priode','$total')";

	mysqli_query($mysql, $query);
	return mysqli_affected_rows($mysql);
	mysqli_close();
	
	
	
}


function delRouter($id){
        global $mysql;
        $query = "DELETE FROM tbl_konfig WHERE idr = '$id'";
        mysqli_query($mysql, $query);
        return mysqli_affected_rows($mysql);
		mysqli_close();
    };
	
function delList_Router($id){
		global $mysql;
		$query = "DELETE FROM tbl_detail_konfig WHERE id_detail = '$id'";
		mysqli_query($mysql, $query);
		return mysqli_affected_rows($mysql);
		mysqli_close();
	};
        


?>