<?php
include "controller/config.php";
if(isset($_GET['host'])){
	$host=$_GET['host'];
	$query = mysqli_query($mysql, "SELECT * FROM tbl_konfig WHERE host_router = '$host'");
$data = mysqli_fetch_assoc($query);
	$idr  = $data['idr'];
	$host = $data['host_router'];
	$user = $data['user_router'];
	$pass = $data['pass_router'];
		$_SESSION['idr']  = $idr;
		$_SESSION['host'] = $host;
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?pg=dashboard">';
exit;
}else{
	die("Error. No Host Selected");
}



?>
