
<?php 
session_start();
if(!isset($_SESSION["login"])){
}else{

$interface = $_GET['interface'];
include "library/routerosapi.php";
include "controller/fnc_ast.php";

 //"<pppoe-nombreusuario>";
$API = new routeros_api();
$API->debug = false;
$conroute = $API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']);
	if($conroute){

//$getinterface = $API->comm("/interface/print");
    //$interface = $getinterface[$iface-1]['name'];
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
}
?>
