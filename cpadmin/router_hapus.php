<?php
include "controller/fnc_r_server.php";
$id = $_GET["id"];
	if(delList_Router($id) > 0){
		header('Location: index.php?pg=data_router');
        echo "<script> alert('berhasil, hapus data router')
              </script>";
        }else{
		header('Location: index.php?pg=data_admin');
        echo "<script> alert('gagal, hapus data router')
             </script>";
			 
        }

?>