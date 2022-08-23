<?php
include "config.php";


function addUser($data){
	global $mysql;
	$nama 		= $data['nm_client'];
	$alamat 	= $data['alamat'];
	$noHP		= $data['noHP'];
	$email		= $data['email'];
	$idr		= $_SESSION['idr'];
	$id_admin	= $_SESSION['id_admin'];
	$pass = password_hash('$password', PASSWORD_DEFAULT);
	$query = "INSERT INTO tbl_client VALUES('','$nama','$alamat','$noHP','$email','$pass','$idr','$id_admin',now(),now())";
	mysqli_query($mysql, $query);
	return mysqli_affected_rows($mysql);
	mysqli_close();
	}

function delUser($id){
	global $mysql;
	$query = "DELETE FROM tbl_client WHERE id_client = '$id'";
	mysqli_query ($mysql, $query);
	return mysqli_affected_rows($mysql);
	mysqli_close();
	}
	
	?>