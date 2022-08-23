<?php
include "controller/fnc_r_server.php";
include "controller/fnc_ast.php";

if( isset($_POST["submit"])){
        if(addCustomer($_POST) > 0){
        echo "<script> alert('berhasil, menambahkan data customer')
                        document.location.href = 'index.php?pg=router'
                </script>";
        }else{
        echo "<script> alert('gagal, menambahkan data customer')
                        document.location.href = 'index.php?pg=router'
             </script>";
        }
    }else if(isset($_POST["simpan"])){
		if(addRouter($_POST) > 0){
			echo "<script> alert('berhasil, menambahkan data router')
                        document.location.href = 'index.php?pg=router'
                </script>";
			}else{
			echo "<script> alert('gagal, menambahkan data router')
							document.location.href = 'index.php?pg=router'
				 </script>";
			}
	}else if(isset($_POST["recharge"])){
		if(recharge($_POST) > 0){
			
			echo "<script> alert('berhasil, menambahkan data recharge')
			document.location.href = 'index.php?pg=router'
                </script>";
			}else{
			echo "<script> alert('gagal, menambahkan data recharge')
							document.location.href = 'index.php?pg=router'
				 </script>";
			}
	}
			
?>	
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">SISTEM KONFIGURASI</h1>
    </div>		 
	<div class="row">
	<div class="col-lg-12">
			<div class="card">
                    <div class="card-header">
                            <i class="fa fa-bar-chart-o fa-fw"></i> KONFIGURASI
                    </div>
							<div class="row" style="padding-left:10px; padding-right:10px; padding-top:10px; padding-bottom:10px;">
							<!-- Operator -->
							<div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-user fa-fw"></i> Operator
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-body">
                            <div class="col-md-12">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>No. Customer </label>
												</div>
												<div class="col-md-6">
													<input class="form-control" id="no_customer" name="no_customer" value="<?php echo get_autonumber('no_customer','tbl_customer'); ?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Full Name </label>
												</div>
												<div class="col-md-6">
													<input class="form-control" name="nm_customer" id="nm_customer" value="">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>No. KTP</label>
												</div>
												<div class="col-md-6">
													<input class="form-control" name="noktp" id="noktp" value="">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Telpon </label>
												</div>
												<div class="col-md-6">
													<input class="form-control" name="tlp" id="tlp"value="">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>Address Full </label>
												</div>
												<div class="col-md-6">
													<textarea class="form-control" name="alamat" id="alamat" rows="4"></textarea>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>email </label>
												</div>
												<div class="col-md-6">
													<input class="form-control" name="email" id="email" value="">
												</div>
											</div>
										</div>
										<div class="form-group page-header">
											<button class="btn btn-primary" type="submit" name="submit"><span data-feather="save"></span> Save</button>
										</div>
									</form>
							</div>
                        <!-- /.panel-body -->
                    </div>
				</div>
			</div>
			<!-- Akhir Operator -->
							<div class="col-lg-4">
							<div class="card">
								<div class="card-header">
									<i class="fa fa-sliders fa-fw"></i> Router
								</div>
                        <!-- /.panel-heading -->
								<div class="card-body">
									<div class="col-md-12">
											<form role="form" action="" method="post">
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label>No. Customer </label>
													</div>
													<div class="col-md-6">
														<input class="form-control" class="no_customer_rel" id="no_customer_rel" name="no_customer_rel">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label>Customer Name </label>
													</div>
													<div class="col-md-6">
													<input class="form-control nm_operator" name="nm_customer_rel" id="nm_custom_rel">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label>Router Name </label>
													</div>
													<div class="col-md-6">
														<input class="form-control" name="nm_router" id="nm_router" value="">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label>IP / Host </label>
													</div>
													<div class="col-md-6">
														<input class="form-control" name="host_router" id="host_router" value="">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label>Username Router </label>
													</div>
													<div class="col-md-6">
														<input class="form-control" name="user_router" id="user_router" value="">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label>Password Router </label>
													</div>
													<div class="col-md-6">
														<input class="form-control" name="pass_router" id="pass_router" type="password" value="">
													</div>
													</div>
												</div>
												<div class="form-group page-header">
													<button class="btn btn-primary" name="simpan" type="submit"><span data-feather="save"></span> Save</button>
													<button class="btn btn-danger" name="ping" type="submit"><i class="fa fa-exchange fa-fw"></i> Test Connecting</>
												</div>
											</form>
									</div>
								</div>
                        <!-- /.panel-body -->
							</div>
							</div>
							</div>
							
							
			</div>
	 </div>
	 </div>

 

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">DATA KONFIGURASI</h1>
    </div>
	<div class="row">
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-bar-chart-o fa-fw"></i> List Data Admin
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-body">
                            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								  <tr style="text-align:center;">
									<th>No.</th>
									<th>No. Customer</th>
									<th>Full Name</th>
									<th>No KTP</th>
									<th>Alamat</th>
									<th>No Telpon</th>
									<th>Router Name</th>
                                    <th>IP / Host</th>
									<th>Action</th>
								  </tr>
								</thead>							
								<tbody>
								<?php
								include "controller/config.php";
								$tampil = mysqli_query($mysql, "SELECT * FROM tbl_konfig INNER JOIN tbl_customer ON tbl_konfig.no_customer = tbl_customer.no_customer ");
								$no=1;
								
								while($row = mysqli_fetch_array($tampil)){
								?>
								
									<tr class="odd gradeX" style="position:center;">
									<td><?php echo $no++ ?></td>
                                    <td><?php echo $row['no_customer']; ?></td>
									<td><?php echo $row['nm_customer']; ?></td>
									<td><?php echo $row['noktp']; ?></td>
									<td><?php echo $row['alamat']; ?></td>
									<td><?php echo $row['tlp']; ?></td>
									<td><?php echo $row['nm_router']; ?></td>
									<td><?php echo $row['host_router']; ?></td>
									<td><div class="btn-group pull-right">	<a type="button" class="btn btn-success" a href="index.php?pg=billing_invoice&&idr=<?php echo $row['idr']; ?>"><span data-feather="printer"></span><label> Invoice</label></a>
									
									<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit_server<?php echo $row['idr']; ?>"><span data-feather="repeat"></span><label> Recarge</label></button>
									
									<button type="button" class="btn btn-outline btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<label>More</label>
									</button>
											<ul class="dropdown-menu slidedown card-body">
												<li>
													<a href="index.php?pg=profile&no_customer=<?php echo $row['no_customer']; ?>">
													<span data-feather="eye"></span> Detail
													</a>
												</li>
												<li>
													<a href="r_server_hapus.php?id=<?php echo $row['idr']; ?>">
													<span data-feather="trash-2"></span> Hapus
													</a>		
												</li>
											</ul>
								</div> </td>
								</tr>
								
								<div class="modal fade" tabindex="-1" role="dialog" id="edit_server<?php echo $row['idr']; ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
										<h4 class="modal-title">UBAH DATA</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
                                        </div>				
										<div class="modal-body">
										<form role="form" action="" method="post">
										<?php
										$id = $row['idr'];
										$query_edit = mysqli_query($mysql, "SELECT * FROM tbl_konfig WHERE idr = '$id'");
										while ($data = mysqli_fetch_array($query_edit)){ 
										?>
										<input type="hidden" readonly value="<?php echo $data['idr']; ?>" name="idr" class="form-control" >
										<input type="hidden" name="noinvoice" value="<?php echo invoice('no_invoice','tbl_detail_konfig'); ?>">
										<input type="hidden" name="date_invoice" value="<?php echo date("Y-m-d h:i:s"); ?>">
										<div class="row">
										<div class="col-lg-6">
											<div class="form-group" style="width:90%">
											<div class="row">
												<div class="col-sm-4">
													<label>No Customer </label>
												</div>
												<div class="col-md-8">
													<input name="no_customer" class="form-control" value="<?php echo $data['no_customer']; ?>" >
												</div>
											</div>
											</div>
											<div class="form-group" style="width:90%">
											<div class="row">
												<div class="col-sm-4">
													<label>Full Name </label>
												</div>
												<div class="col-md-8">
													<input name="nm_customer" class="form-control" value="<?php echo $data['nm_customer']; ?>" >
												</div>
											</div>
											</div>
												<div class="form-group" style="width:90%">
						 							<div class="row">
						 								<div class="col-sm-4">
															<label>Router Name </label>
						 								</div>
														<div class="col-md-8">
															<input name="nm_router" class="form-control" value="<?php echo $data['nm_router']; ?>">
						 								</div>
													</div>
												</div>
												<div class="form-group" style="width:90%">
						 							<div class="row">
													 <div class="col-sm-4">
														<label>Priode </label>
													 </div>
													 <div class="col-md-8">
														<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="3">
														<label class="form-check-label" for="inlineRadio1">3 Bulan</label>

														<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="6">
														<label class="form-check-label" for="inlineRadio1">6 Bulan</label>
												
														<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="12">
														<label class="form-check-label" for="inlineRadio1">12 Bulan</label>
														</div>
													 </div>
													</div>
												</div>
												<div class="form-group" style="width:90%">
													<div class="row">
														<div class="col-sm-4">
															<label>Status </label>
														</div>
														<div class="col-sm-4">
														<select id="status" name="status" class="form-control">
														<option value="paid">Paid</option>
														<option value="refund">Refund</option>
														</select>
														<!-- <label class="switch">
															<input type="checkbox" name="stat_active" id="stat_1">
															<span class="slider"> </span>
														</label> -->
														</div>
													</div>
												</div>
												</div>
												
												<div class="col-lg-6">
											<div class="form-group" style="width:90%">
											<div class="row">
												<div class="col-md-4">
													<label>IP Host </label>
												</div>
												<div class="col-md-6">
													<input name="host_router" class="form-control" value="<?php echo $data['host_router']; ?>" >
												</div>
											</div>
											</div>
											<div class="form-group" style="width:90%">
											<div class="row">
												<div class="col-md-4">
													<label>Username </label>
												</div>
												<div class="col-md-6">
													<input name="user_router" class="form-control" value="<?php echo $data['user_router']; ?>" >
												</div>
											</div>
											</div>
												<div class="form-group" style="width:90%">
						 							<div class="row">
						 								<div class="col-md-4">
															<label>Password </label>
						 								</div>
														<div class="col-md-6">
															<input name="password" class="form-control" value="<?php echo $data['pass_router']; ?>">
						 								</div>
													</div>
												</div>
												</div>
												
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											<button type="recharge" name="recharge" class="btn btn-primary" onClick="documents.location.href='index.php?pg=invoice&id=$id'">Save Change</button>
										</div> <?php } ?> 
										</form>
										<!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
						</div><?php } ?>
								</tbody>
						  </table>
                        <!-- /.panel-body -->
                    </div>
					</div>
				</div>
	</div>
	</main>
