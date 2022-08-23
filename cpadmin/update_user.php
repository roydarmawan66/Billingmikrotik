<?php
include "controller/config.php";

$id = $_GET['id_client'];
$nm_client = $_GET['nm_client'];
$alamat = $_GET['alamat'];
$noHP	= $_GET['noHP'];
$email	= $_GET['email'];

$query = "UPDATE tbl_client SET nm_client='$nm_client',alamat='$alamat' ,noHP='$noHP',email='$email' WHERE id_admin='$id'";

if(mysqli_query($mysql, $query)){
header('Location: index.php?pg=data_user');
        echo "<script> alert('berhasil, Update data admin')
              </script>";
        }else{
		header('Location: index.php?pg=data_user');
        echo "<script> alert('gagal, Update data admin')
             </script>";
			 
        }
?>