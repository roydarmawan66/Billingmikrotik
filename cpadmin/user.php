			<?php
include "controller/fnc_user.php";
if(isset($_POST["submit"])){
        if(addUser($_POST) > 0){
        echo "<script> alert('berhasil, menambahkan data user')
                        document.location.href = 'index.php?pg=data_user'
                </script>";
        }else{
        echo "<script> alert('gagal, pastikan data dan password sudah sesuai')
                        document.location.href = 'index.php?pg=data_user'
             </script>";
        }
    }
?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">DATA USERS</h1>
    </div>
	<div class="row">
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-users fa-fw"></i> List Data Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-body">
						<div class="well">
							<button class="btn btn-primary" data-toggle="modal" data-target="#add_pelanggan"><i class="fa fa-plus-circle"></i> Add User</button>
							<a href="report/test_cetak_user.php" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> Print to PDF</a>
							<a href="report/user_excel.php" target="_blank" class="btn btn-warning"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
						</div>
                            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								  <tr>
									<th>No.</th>
									<th>Full Name</th>
									<th>Address</th>
                                    <th>No HP</th>
									<th>Email</th>
									<th>Transaksi</th>
									<th>Action</th>
								  </tr>
								</thead>							
								<tbody>
								<?php
						include "controller/config.php";
						$tampil = mysqli_query($mysql, "SELECT * FROM tbl_client WHERE idr = '$_SESSION[idr]' OR id_admin = '$_SESSION[id_admin]' ORDER BY id_client DESC");
						$no=1;
						while ($row = mysqli_fetch_array($tampil)){ ?>
									<tr class="odd gradeX">
									<td><?php echo $no++ ?></td>
									<td><?php echo $row['nm_client']; ?></td>
									<td><?php echo $row['alamat']; ?></td>
									<td><?php echo $row['noHP']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><a class="btn btn-primary" href="index.php?pg=order&idclient=<?php echo $row['id_client']; ?>" role="button" > Order Paket</a></td>
									<td><div class="btn-group pull-right">
									<button type="button" class="btn btn-outline btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<label>More</label>
									</button>
											<ul class="dropdown-menu slidedown card-body">
												<li>
													<a href="#">
													<span data-feather="eye"></span> Detail
													</a>
												</li>
												<li>
												<a href="" data-toggle="modal" data-target="#update_user<?php echo  $row['id_client']; ?>"><span data-feather="repeat"></span> Change
													</a>	
												</li>
												<li>
													<a href="user_hapus.php?id=<?php echo $row['id_client']; ?>">
													<span data-feather="trash-2"></span> Delete
													</a>		
												</li>
											</ul>
								</div> </td>
								</tr>
						<!-- /.update user -->
							<div class="modal" id="update_user<?php echo  $row['id_client']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
										<h4 class="modal-title">CHANGE DATA</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="" method="post">
											<?php 
										$id = $row['id_client'];
										$query_edit = mysqli_query($mysql, "SELECT * FROM tbl_client WHERE id_client = '$id'");
										while ($data = mysqli_fetch_array($query_edit)){ 
										?><input type="hidden" readonly value="<?php echo $data['id_client']; ?>" name="id_client" class="form-control" >
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> Full Name </label>
													</div>
													<div class="col-md-8">
														<input class="form-control" name="nm_client" id="nm_client" style="width:100%;" value="<?php echo $data['nm_client']; ?>">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> Address </label>
													</div>
													<div class="col-md-8">
														<textarea class="form-control" name="alamat" id="alamat" style="width:100%;" cols="4" rows="3"><?php echo $row['alamat']; ?></textarea>
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> No Telp </label>
													</div>
													<div class="col-md-8">
														<input class="form-control" name="noHP" id="noHP" style="width:100%;" value="<?php echo $row['noHP']; ?>">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> Email </label>
													</div>
													<div class="col-md-8">
														<input class="form-control" name="email" id="email" style="width:100%;" value="<?php echo $row['email']; ?>">
													</div>
													</div>
												</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        </div><?php } ?>
									</form>
                                    </div>
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
	
							
			<div class="modal" id="add_pelanggan" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
										<h4 class="modal-title">INSERT DATA</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="" method="post">
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> Full Name </label>
													</div>
													<div class="col-md-8">
														<input class="form-control" name="nm_client" id="nm_client" style="width:100%;">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> Address </label>
													</div>
													<div class="col-md-8">
														<textarea class="form-control" name="alamat" id="alamat" style="width:100%;" cols="4" rows="3"></textarea>
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> No Telp </label>
													</div>
													<div class="col-md-8">
														<input class="form-control" name="noHP" id="noHP" style="width:100%;">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> Email </label>
													</div>
													<div class="col-md-8">
														<input class="form-control" name="email" id="email" style="width:100%;">
													</div>
													</div>
												</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        </div>
									</form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
	</main>
