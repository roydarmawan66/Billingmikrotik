<?php
include "controller/fnc_user.php";
$id = $_GET["id"];
	if(delUser($id) > 0){
		header('Location: index.php?pg=data_user');
        echo "<script> alert('berhasil, hapus data user')
              </script>";
        }else{
		header('Location: index.php?pg=data_user');
        echo "<script> alert('gagal, hapus data user')
             </script>";
			 
        }

?>