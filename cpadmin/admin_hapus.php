<?php
include "controller/fnc_admin.php";
$id = $_GET["id"];
	if(delAdmin($id) > 0){
		header('Location: index.php?pg=add_admin');
        echo "<script> alert('berhasil, hapus data admin')
              </script>";
        }else{
		header('Location: index.php?pg=add_admin');
        echo "<script> alert('gagal, hapus data admin')
             </script>";
			 
        }

?>