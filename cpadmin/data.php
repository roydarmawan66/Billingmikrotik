<?php
session_start();
if(!isset($_SESSION["login"])){
	header("location:index.php");
	exit;
} ?>
<?php require_once ('library/routerosapi.php'); ?>
<?php

$interface = $_GET["interface"]; //"<pppoe-nombreusuario>";

	$API = new routeros_api();
	$API->debug = false;
	if($API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass'])){
		$getinterfacetraffic = $API->comm("/interface/monitor-traffic", array(
      "interface" => "$interface",
      "once" => "",
      ));

    $rows = array(); $rows2 = array();

    $ftx = $getinterfacetraffic[0]['tx-bits-per-second'];
    $frx = $getinterfacetraffic[0]['rx-bits-per-second'];

      $rows['name'] = 'Tx';
      $rows['data'][] = $ftx;
      $rows2['name'] = 'Rx';
      $rows2['data'][] = $frx;
	  
      
  }else{
		echo "<font color='#ff0000'>Connection Failed!!</font>";
  }
  
  $API->disconnect();

	$result = array();

	array_push($result,$rows);
	array_push($result,$rows2);
  print json_encode($result);

?>
