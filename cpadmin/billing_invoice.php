<?php 
if(!isset($_SESSION["login"])){
	header("location:index.php");
	exit;
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">DATA INVOICE</h1>
    </div>
	<div class="row">
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-bar-chart-o fa-fw"></i> List Data Invoice
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-body">
                            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								  <tr>
									<th>No.</th>
									<th>#Invoice</th>
									<th>No. Customer</th>
									<th>Full Name</th>
									<th>IP / Host</th>
									<th>Created On</th>
									<th>Expiry Date</th>
									<th>Status Active</th>
									<th>Action</th>
								  </tr>
								</thead>						
								<tbody>
								<?php
								include "controller/config.php";
								if($_SESSION['level'] == "customer"){
								$tampil = mysqli_query($mysql,"SELECT * FROM tbl_detail_konfig where no_customer = '$_SESSION[no_customer]'");
								}else{
									$id = $_GET['idr'];
									$tampil = mysqli_query($mysql,"SELECT * FROM tbl_detail_konfig where idr = '$id'");
								}
								$no=1;
								while($row = mysqli_fetch_array($tampil)){
									$mulai =  $row['created_on'];// waktu mulai
$exp = $row['expiry_date']; // batas waktu
if (!(strtotime($mulai) <= time() AND time() >= strtotime($exp))) {
$status = '<label class="badge badge-success">Active</label>';
} else {
$status = '<label class="badge badge-warning">Tidak Active</label>';
}
									echo '
									<tr class="odd gradeX">
									<td>'.$no++.'</td>
									<td>INV-'.$row['no_invoice'].'</td>
									<td>'.$row['no_customer'].'</td>
									<td>'.$row['nm_customer'].'</td>
									<td>'.$row['host_router'].'</td>
									<td>'.$row['created_on'].'</td>
									<td>'.$row['expiry_date'].'</td>
									<td>'.$status.'</td>
									<td><div class="btn-group pull-right">
									<a type="button" class="btn btn-outline btn-primary" href="index.php?pg=invoice&id='.$row['no_invoice'].'">
										<label><span data-feather="printer"></span> Cetak</label></a>
								</div></td>
								  </tr>
								'; } ?>
								</tbody>
								
						  </table>
                        <!-- /.panel-body -->
                    </div>
					</div>
				</div>
	</div>
	</main>