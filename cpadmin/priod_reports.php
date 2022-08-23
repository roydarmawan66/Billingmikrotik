<?php
include "controller/fnc_admin.php";
include "controller/fnc_ast.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h3">PRIOD REPORT</h1>
          
</div>
<div id="notifications"></div>
<!-- page -->	
<div class="row">
	<!-- Table -->
		<div class="col-lg-12">
			<div class="card" style="margin-bottom:20px;">
				<div class="card-body">
				<div class="row">
					<div class="col-md-6">
							<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>From Date </label>
												</div>
												<div class="col-md-8">
													<input class="form-control col-md-6 datepicker" id="f_date" name="f_date">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>To Date </label>
												</div>
												<div class="col-md-8">
													<input class="form-control col-md-6 datepicker" id="to_date" name="to_date">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Type </label>
												</div>
												<div class="col-md-6">
													<select id="type" name="type" class="form-control">
													<option value="">All Transcation</option>
														<?php
													$tampil = mysqli_query($mysql, "SELECT * FROM tbl_paket where idr = '$_SESSION[idr]' ORDER BY id_paket DESC");
													while ($row = mysqli_fetch_array($tampil)){ echo 
												'
												<option value="'.$row['nama'].'">'.$row['nama'].'</option>
													';} ?>
													</select>
												</div>
											</div>
										</div>
										
					</div>
				</div>
										<div class="form-group page-header well well-sm">
											<button class="btn btn-primary" type="submit" name="submit"><span data-feather="database"></span> Proses</button>
										</div>	
</form>										
				<!-- /.panel-body -->
				</div>
			</div>
		</div>
	</div>
	<?php
	include "controller/config.php";
	if (isset($_POST['submit'])) {
			date_default_timezone_set('Asia/Jakarta');
					$fr_date = $_POST['f_date'];
					$t_date = $_POST['to_date'];

		?>
					<p><b>All Transactions at Date:
					</b></p><dd style="margin-top: -15px;"><p>
					<?php echo ''.date('Y M d h:s:i A',strtotime($fr_date)).' - '.date('Y M d h:s:i A',strtotime($t_date)).''; ?></p>
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 float-right">
					<div class="btn-toolbar mb-2 mb-md-0">
					<form method="post" action="priod_reports_pdf.php" target="_blank">
						<input type="hidden" name="f_date" id="f_date" value="<?php echo $fr_date ?>">
						<input type="hidden" name="to_date" id="to_date" value="<?php echo $t_date ?>">
						<input type="hidden" name="type" id="type" value="<?php echo $_POST['type']; ?>">
						
						  <div class="btn-group mr-2">
							<a href="invoice.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
						  </div>
						  <button type="submit" name="submit" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export to PDF
						  </button>
						</div>
					</form>
					</div>
		<?php $thead = '
			<tr>
				<th>No</th>
				<th>No Invoice</th>
				<th>Username</th>
				<th>Nama Paket</th>
				<th>Type Paket</th>
				<th>Harga</th>
				<th>Aktif</th>
				<th>Validasi</th>
			</tr>';
			
		echo '
		<div class="table-responsive">
		<table class="table table-striped table-bordered">
				<thead>' . $thead . '</thead>
				<tbody>';
		$where = trim($_POST['type']) ? 'namapaket LIKE "%'.$_POST['type'].'%"':'';

		
	
		$periode = '(';
		$periode .= 'date_on BETWEEN "'.$_POST['f_date'].'"
			AND "'.$_POST['to_date'].'"';
			
			
			
			$where .=' AND '.trim($periode).' )';
			$where = ltrim($where, ' AND ');

			$sql = 'SELECT * FROM tbl_billing WHERE '.$where.'';		
		$result = mysqli_query($mysql, $sql);
		$no = 1;
		$total = 0;
		while($row = mysqli_fetch_array($result)) {
			$total += $row['harga'];
			echo '<tr>
				<td>' . $no . '</td> 
				<td>INV -' . $row['noinvoice'] . '</td> 
				<td>' . $row['user'] . '</td> 
				<td class="right">' . $row['namapaket'] . '</td> 
				<td class="right">' . $row['jenispaket'] . '</td> 
				<td class="right">' . rupiah ($row['harga']) . '</td> 
				<td class="right">'. $row['date_on']. '</td> 
				<td class="right">'. $row['masa_aktiv']. ' Hari</td>
			</tr>
			';
			$no++;
		}
		echo '</tbody>
		</table>
					
			
										<div class="float-right">
										<p><h5>TOTAL INCOME:<dd>'.rupiah($total);'</h5></p>
					</div>
		</div>';
			};
			
	
	?>
</main>


	