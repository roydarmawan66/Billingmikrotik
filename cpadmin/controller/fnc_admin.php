<?php
include "config.php";

function addAdmin($data){
	global $mysql;
	$no_customer_rel = $data['no_customer_rel'];
	$nm_customer_rel = $data['nm_customer_rel'];
	$email_rel		 = $data['email_rel'];
	$level			 = $data['level'];
	$username		 = $data['username'];
	$password		 = $data['password'];
	$konfrm			 = $data['konfrm'];
	if($konfrm == $password){
	$pass = password_hash('$password', PASSWORD_DEFAULT);
	$query = "INSERT INTO tbl_admin VALUES('','$no_customer_rel','$nm_customer_rel','$email_rel','$level','$username','$pass','')";
	mysqli_query($mysql, $query);
	return mysqli_affected_rows($mysql);
	mysqli_close();
	}
}

    function delAdmin($id){
        global $mysql;
        $query = "DELETE FROM tbl_admin WHERE id_admin = '$id'";
        mysqli_query($mysql, $query);
        return mysqli_affected_rows($mysql);
		mysqli_close();
    };
?>