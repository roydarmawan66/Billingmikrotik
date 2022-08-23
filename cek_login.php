<?php
session_start();
include "cpadmin/controller/config.php";

$username = $_POST['txtusername'];
$pass = $_POST['txtpassword'];

$login = mysqli_query($mysql, "SELECT * FROM tbl_admin WHERE username='$username'");

if(mysqli_num_rows($login) > 0){
	$data = mysqli_fetch_assoc($login);
	$id_admin = $data['id_admin'];
	$paswd = $data['password'];
	$no_customer = $data['no_customer'];
	if($data['level']=="administrator" && password_verify($pass, $paswd)) 
		{
		session_start();
		$_SESSION['login'] = true;
		$_SESSION['id_admin'] = $id_admin;
		$_SESSION['username'] = $username;
		$_SESSION['no_customer'] = $no_customer;
		$_SESSION['level'] = "administrator";
		$_SESSION['pesan'] = 'Login Berhasil';
		header("location:cpadmin/index.php");
	}else if($data['level']=="customer" && password_verify($pass, $paswd)){
		session_start();
		$_SESSION['login'] = true;
		$_SESSION['id_admin'] = $id_admin;
		$_SESSION['username'] = $username;
		$_SESSION['no_customer'] = $no_customer;
		$_SESSION['pesan'] = 'Login Berhasil';
		$_SESSION['level'] = "customer";
		header("location:cpadmin/index.php");
	}
}else {
		$_SESSION['pesan'] = 'Login Gagal';
       echo '<script language="javascript">
                window.location.href="./";
             </script>';
    }

?>