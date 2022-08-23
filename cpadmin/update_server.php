<?php
include "controller/config.php";

$id = $_GET['idr'];
$no_customer = $_GET['no_customer'];
$nm_customer = $_GET['nm_customer'];
$nm_router	 = $_GET['nm_router'];
$rb_priode	 = $_GET['inlineRadioOptions'];
$status		 = $_GET['status'];
$host		 = $_GET['host_router'];
$username	 = $_GET['user_router'];
$pass		 = $_GET['password'];

if($rb_priode == "3 Bulan"){
	$harga = 100000;
}else if($rb_priode == "6 Bulan"){
	$harga = 150000;
}else{
	$harga = 250000;
}


$query = "UPDATE tbl_konfig SET nm_router='$nm_router', host_router='$host', user_router='$username', pass_router='$pass', no_customer='$no_customer', nm_customer='$nm_customer', Priode='$rb_priode', Harga='$harga', status_active='$status' WHERE idr='$id'";

if(mysqli_query($mysql, $query)){
header('Location: index.php?pg=router');
        echo "<script> alert('berhasil, Update data admin')
              </script>";
        }else{
		header('Location: index.php?pg=router');
        echo "<script> alert('gagal, Update data admin')
             </script>";
			 
        }
?>