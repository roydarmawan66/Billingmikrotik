<?php
include "controller/fnc_admin.php";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h3">REPORT</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="invoice.php" target="_blank" class="btn btn-sm btn btn-primary"><span data-feather="printer"></span> Print</a>
          </div>
          <a href="invoice_pdf.php" class="btn btn-sm btn-success"><span data-feather="download"></span>
            Download
          </a>
        </div>
</div>
<div id="notifications"></div>
<!-- page -->	
<div class="row">
	<!-- Table -->
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
				<div class="row">
					<div class="col-md-6">
							<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>No. Customer </label>
												</div>
												<div class="col-md-8">
													<input class="form-control col-md-6" id="no_customer" name="no_customer" placeholder="Semua..." value="<?=@$_POST['no_customer'] ?: '' ?>">
													
												<div style="margin-top: 5px;">
														<text><i>Kosongkan isian untuk menampilkan semua data</i></text>
													</div>
												
												</div>
											</div>
										</div>
							<!--			<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Host Router </label>
												</div>
												<div class="col-md-4">
													<select name="host" id="host" class="form-control">
							<?php
							
							
								$selected = @$_POST['host'] == $key	? 'selected="selected"':'';
							echo '
	<option value="'.$key.'"'.$selected.'>'.$val.'</option>';?>
													</select>
													
													<div id="loading" style="margin-top: 15px;">
														<img src="../img/loading.gif" width="18"><small>Loading...</small>
													</div>
												</div>
											</div>
										</div> -->
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Status </label>
												</div>
												<div class="col-md-6">
													<select id="status" name="status" class="form-control">
													
														<option value="<?php echo '>' .date('Y-m-d');?>"'"<?= @$_POST['status'] == date('Y-m-d') ? 'selected="selected"' : ''?>>Active</option>
														<option value="<?php echo '<' .date('Y-m-d'); ?>"<?= @$_POST['status'] == date('Y-m-d') ? 'selected="selected"' : ''?>>Expiry</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Priode</label>
												</div>
												<div class="col-md-3">
													        <div class="input-group date">
								  <input type="text" class="form-control datepicker" name="date1" value="">
							<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
															</div>
												</div>
												<p> s.d </p>
												<div class="col-md-3">
													<div class="input-group date">
																								  <input type="text" class="form-control datepicker" name="date2"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
															</div>
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
		$where = trim($_POST['no_customer']) ? 'no_customer LIKE "%'.$_POST['no_customer'].'%"':'';

		
	
		$periode = '(';
		$periode .= 'created_on BETWEEN "'.$_POST['date1'].'"
			AND "'.$_POST['date2'].'"';
			
			
			
			$where .=' AND '.trim($periode).' )';
			$where = ltrim($where, ' AND ');
		

			
			
			
			$sql = 'SELECT * FROM tbl_detail_konfig WHERE '.$where.'';
	var_dump($sql);

		echo '<div class="success">Ditemukan <strong></strong> data</div>';
		$thead = '
			<tr>
				<th>No</th>
				<th>No Invoice</th>
				<th>No Customer</th>
				<th>Nama Customer</th>
				<th>Host</th>
				<th>Invoice Date</th>
				<th>Due Date</th>
				<th>Total</th>
				<th>Status</th>
			</tr>';
			
		echo '
		<div class="table-responsive">
		<table id="dtBasicExample" class="table table-striped table-bordered">
				<thead>' . $thead . '</thead>
				<tbody>';
				
		$result = mysqli_query($mysql, $sql);
		$no = 1;
		while($row = mysqli_fetch_array($result)) {
			$due_date = $row['expiry_date'];
			$date = date('Y-m-d');
			if($due_date > $date){
echo $status = 'Active';
				}else{
echo $status = '<style=color:red;">Expiry';
				};
			echo '<tr>
				<td>' . $no . '</td> 
				<td>INV -' . $row['no_invoice'] . '</td> 
				<td>' . $row['no_customer'] . '</td> 
				<td class="right">' . $row['nm_customer'] . '</td> 
				<td class="right">' . $row['host_router'] . '</td> 
				<td class="right">' . $row['created_on'] . '</td> 
				<td class="right">' . $row['expiry_date']. '</td> 
				<td class="right">' . $row['Biaya']. '</td>
				<td>' 	.$status.				 '</td>
			</tr>
			';
			$no++;
		}
		echo '<tfoot>' . $thead . '</tfoot></tbody>
		</table>
		</div>';
	}
			
	
	?>
</main>


	