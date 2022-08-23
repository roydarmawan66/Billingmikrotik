<?php
include "controller/config.php";

$id = $_POST['idr'];
$ip_host = $_POST['ip_host'];
$user_router = $_POST['user_router'];
$pass_router = $_POST['pass_router'];
$no_customer = $_POST['no_customer'];
$query = "UPDATE tbl_konfig, tbl_detail_konfig SET tbl_konfig.host_router='$ip_host',tbl_konfig.user_router='$user_router',tbl_konfig.pass_router='$pass_router', tbl_detail_konfig.host_router='$ip_host' WHERE tbl_konfig.idr=tbl_detail_konfig.idr AND tbl_detail_konfig.idr='$id'";

if(mysqli_query($mysql, $query)){
header('Location: index.php?pg=profile&no_customer='.$no_customer.'');
        echo "<script> alert('berhasil, Update data router')
              </script>";
        }else{
		header('Location: index.php?pg=profile&no_customer='.$no_customer.'');
        echo "<script> alert('gagal, Update data router')
             </script>";
			 
        }
?>