<?php
include "controller/config.php";

$id = $_GET['id_admin'];
$username = $_GET['username'];
$level = $_GET['level'];

$query = "UPDATE tbl_admin SET level='$level',username='$username' WHERE id_admin='$id'";

if(mysqli_query($mysql, $query)){
header('Location: index.php?pg=add_admin');
        echo "<script> alert('berhasil, Update data admin')
              </script>";
        }else{
		header('Location: index.php?pg=add_admin');
        echo "<script> alert('gagal, Update data admin')
             </script>";
			 
        }
?>