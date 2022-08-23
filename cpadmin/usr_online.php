<?php
include "library/routerosapi.php";
include "controller/fnc_ast.php";
$API = new routeros_api();
$API->debug = false;

$conroute = $API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']);

$gethosts = $API->comm("/ip/hotspot/host/print");
		$TotalReg = count($gethosts);

		$counthosts = $API->comm("/ip/hotspot/host/print", array(
			"count-only" => "",
		));
		for ($i = 0; $i < $TotalReg; $i++) {
	$hosts = $gethosts[$i];
	$id = $hosts['.id'];
	$serveractive = $hosts['server'];
		
if ($serveractive != "") {
		$gethotspotactive = $API->comm("/ip/hotspot/active/print", array("?server" => "" . $serveractive . ""));
		$TotalReg = count($gethotspotactive);

		$counthotspotactive = $API->comm("/ip/hotspot/active/print", array(
			"count-only" => "", "?server" => "" . $serveractive . ""
		));

	} else {
		$gethotspotactive = $API->comm("/ip/hotspot/active/print");
		$TotalReg = count($gethotspotactive);

		$counthotspotactive = $API->comm("/ip/hotspot/active/print", array(
			"count-only" => "",
		));
	}
		}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h3">USER ACTIVE</h1>
</div>
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
						List Data Users Aktif
						</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped" id="dataTables-example">
										<thead>
											<tr>
												<th>Server</th>
												<th>User</th>
												<th>Address</th>
												<th>Mac</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>
										<?php
for ($i = 0; $i < $TotalReg; $i++) {
	$hotspotactive = $gethotspotactive[$i];
	$id = $hotspotactive['.id'];
	$server = $hotspotactive['server'];
	$user = $hotspotactive['user'];
	$address = $hotspotactive['address'];
	$mac = $hotspotactive['mac-address'];
	$uptime = $hotspotactive['uptime'];
	echo "<tr>";
	echo "<td>" . $server . "</td>";
	echo "<td>" . $user . "</td>";
	echo "<td>" . $address . "</td>";
	echo "<td>" . $mac . "</td>";
	echo "<td>" . $uptime . "</td>";
	echo "</tr>";
}
?>
										</tbody>
									</table>
								</div>
							</div>
					</div>
				</div>
</main>