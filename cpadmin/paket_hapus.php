<?php
session_start();
if(!isset($_SESSION["login"])){
	header("location:index.php");
	exit;
}
include "controller/fnc_paket.php";
$id = $_GET["id"];
$del = $_GET["del"];
	if(delPaket($id, $del) > 0){
		header('Location: index.php?pg=set_paket');
        echo "<script> alert('berhasil, hapus data paket')
              </script>";
        }else{
		header('Location: index.php?pg=set_paket');
        echo "<script> alert('gagal, hapus data paket')
             </script>";
			 
        }

?>
