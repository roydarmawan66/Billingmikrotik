<?php
include "library/routerosapi.php";
include "controller/fnc_ast.php";
$API = new routeros_api();
$API->debug = false;

$conroute = $API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']);

//status router
if($conroute){$ARRAY=$API->comm("/system/resource/print");
$first = $ARRAY['0'];

?>
<script>
	var chart;

	function requestDatta(interface) {
		$.ajax({
			url: 'data.php?interface='+interface,
			datatype: "json",
			success: function(data) {
				 var midata = JSON.parse(data);
				// console.log(midata);
				if( midata.length > 0 ) {
					var TX=parseInt(midata[0].data);
					var RX=parseInt(midata[1].data);
					var x = (new Date()).getTime();
					shift=chart.series[0].data.length > 19;
					chart.series[0].addPoint([x, TX], true, shift);
					chart.series[1].addPoint([x, RX], true, shift);
					document.getElementById("tabletx").innerHTML=convert(TX);
					document.getElementById("tablerx").innerHTML=convert(RX);
				}else{
					document.getElementById("tabletx").innerHTML="0";
					document.getElementById("tablerx").innerHTML="0";
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.error("Status: " + textStatus + " request: " + XMLHttpRequest); console.error("Error: " + errorThrown);
			}
		});
	}

	$(document).ready(function() {
			Highcharts.setOptions({
				global: {
					useUTC: false
				}
			});


           chart = new Highcharts.Chart({
			   chart: {
				renderTo: 'graph',
				animation: Highcharts.svg,
				type: 'spline',
				events: {
					load: function () {
						setInterval(function () {
							requestDatta(document.getElementById("interface").value);
						}, 1000);
					}
			}
		 },
		 title: {
			text: 'Monitoring'
		 },
		 xAxis: {
			type: 'datetime',
				tickPixelInterval: 150,
				maxZoom: 20 * 1000
		 },

		yAxis: {
                            minPadding: 0.2,
                            maxPadding: 0.2,
                            title: {
                              text: 'Traffic'
                            },
                            labels: {
                              formatter: function () {
                                var bytes = this.value;
                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];
                              },
                            },
                        },
            series: [{
                name: 'TX',
                data: []
            }, {
                name: 'RX',
                data: []
            }],
			  tooltip: {
        headerFormat: '<b>{series.name}</b><br/>',
        pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y}'
    },


	  });
  });
  function convert( bytes) {

                                var sizes = ['bps', 'kbps', 'Mbps', 'Gbps', 'Tbps'];
                                if (bytes == 0) return '0 bps';
                                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];
                              }
</script>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <div class="row card-deck">
      <div class="card mb-3 text-white bg-dark" style="max-width: 410px;">
            <div class="row no-gutters">
                    <div class="col-md-4 card-body text-center">
                    <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">System</h5>
                        <p class="card-text">Model : <br><?php if($conroute){echo $first['board-name'];}else{echo "N/A";} ?></p>
                        <p class="card-text">Router OS : <br><?php if($conroute){echo $first['version'];}else{echo "N/A";} ?></p>
                    </div>
                    </div>
            </div>
      </div>
      <div class="card mb-3 text-white bg-dark" style="max-width: 410px;">
            <div class="row no-gutters">
                    <div class="col-md-4 card-body text-center">
                    <i class="fa fa-database fa-5x"></i>
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Resource</h5>
                        <p class="card-text">Free Memory : <br><?php if($conroute){echo formatBytes ($first['free-memory'])."/".formatBytes ($first['total-memory']);}else{echo "N/A";} ?></p>
                        <p class="card-text">Free HDD : <br><?php if($conroute){echo formatBytes($first['free-hdd-space'])."/".formatBytes($first['total-hdd-space']);}else{echo "N/A";} ?></p>
                    </div>
                    </div>
            </div>
      </div>
	  <?php }

	  ?>
      <div class="card mb-3 text-white bg-dark" style="max-width: 410px;">
            <div class="row no-gutters">
                    <div class="col-md-4 card-body text-center">
                    <i class="fa fa-credit-card fa-5x"></i>
                    </div>
                    <div class="col-md-8">
					<?php
					include "controller/config.php";
					$date = date("Y-m-d");
					$query = mysqli_query($mysql, "SELECT SUM(harga) FROM tbl_billing WHERE date_on = '$date'");

					// Print out result
					while($row=mysqli_fetch_array($query)){
					?>
                    <div class="card-body">
                        <h5 class="card-title">Pendapatan</h5>
                        <p class="card-text">Hari ini : <br><?php echo rupiah($row['SUM(harga)']);
					}
						?></p>
						<?php
						$query = mysqli_query($mysql, "SELECT SUM(harga) FROM tbl_billing");

					// Print out result
					while($row=mysqli_fetch_array($query)){
						?>
                        <p class="card-text">Total : <br><?php echo rupiah ($row['SUM(harga)']); ?></p>
                    </div>
					<?php } ?>
                    </div>
            </div>
      </div>
      </div>

      <div class="row">
	   <div class="col-md-7">
	   <div class="card">
            <div class="card-header">
            Chart
            </div>
		    <div id="graph" class="graph"></div>
		</div>
			<div class="table-responsive">
			<table class="table table-bordered">
			<tr>
				<th>Interace</th>
				<th>TX</th>
				<th>RX</th>
			</tr>
			<tr>
				<td><input name="interface" id="interface" class="interface" type="text" value="Hotspot" /></td>
				<td><div id="tabletx"></div></td>
				<td><div id="tablerx"></div></td>
			</tr>
			</table>
			</div>
	   </div>

          <div class="col-md-5">
                <div class="card">
                      <div class="card-header">
                      Log Router
                      </div>
                            <div class="card-body">
                            <table id="dtBasicExample" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                            <thead>
                                  <tr>
                                  <th>time</th>
                                  <th>message</th>
                                  </tr>
                            </thead>
                            <tbody>
							<?php
							if($conroute)foreach ($log=$API->comm("/log/print") as $a)
							{
								?>
								<tr>
							<td>  <?php echo $a["time"]; ?></td>
							<td width="100%">
							<?php echo $a["message"]; ?></td>
							</tr>
							 <?php
							}

							?>
                            </tbody>
                            </table>
                            </div>

                </div>
          </div>

<!--
          <div class="col-lg-4">
                <div class="card">
                      <div class="card-header">
                      Statistic Client Active
                      </div>
                            <div class="card-body">
                            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
                            </div>
                </div>
          </div>
      </div> -->

    </main>
