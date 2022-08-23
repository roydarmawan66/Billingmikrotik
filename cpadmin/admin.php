<?php
include "controller/fnc_admin.php";
if( isset($_POST["submit"])){
        if(addAdmin($_POST) > 0){
        echo "<script> alert('berhasil, menambahkan data admin')
                        documents.location.href = 'index.php?pg=add_admin'
                </script>";
        }else{
        echo "<script> alert('gagal, pastikan data dan password sudah sesuai')
                        documents.location.href = 'index.php?pg=add_admin'
             </script>";
        }
    }
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h3">ADMINISTRATOR</h1>
</div>
<div id="notifications"></div>
<!-- page -->	
<div class="row">
	<!-- Table -->
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-bar-chart-o fa-fw"></i> List Data Admin
				</div>
				<div class="card-body">
					<table id="dtBasicExample" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
						<thead>
							  <tr>
									<th>No</th>
									<th>No Customer</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>Username</th>
									<th>Level</th>
									<th>Action</th>
							  </tr>
						</thead>
						<tbody>
						<?php
						include "controller/config.php";
						$tampil = mysqli_query($mysql, "SELECT * FROM tbl_admin ORDER BY id_admin DESC");
						$no=1;
						while ($row = mysqli_fetch_array($tampil)){ ?>
									
							<tr class="odd gradeX">
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['no_customer']; ?></td>
							<td><?php echo $row['nm_lengkap']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['level']; ?></td>
							<td><div class="btn-group pull-right">
									<button type="button" class="btn btn-outline btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<label>More </label>
									</button>
											<ul class="dropdown-menu slidedown card-body">
												<li>
													<a 
													href=""
													data-toggle="modal" data-target="#edit_admin_main<?php echo $row['id_admin']; ?>">
													<span data-feather="repeat"></span>	Change
													</a>
												</li>
												<li>
													<a href="admin_hapus.php?id=<?php echo $row['id_admin']; ?>">
													<span data-feather="trash-2"></span> Delete
													</a>		
												</li>
											</ul>
								</div> 
							</td>
							</tr>
							
							<div class="modal fade" tabindex="-1" role="dialog" id="edit_admin_main<?php echo $row['id_admin']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
										<h4 class="modal-title">UBAH DATA</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
                                        </div>				
										<div class="modal-body">
										<form role="form" action="update_admin.php" method="get">
										<?php
										$id = $row['id_admin'];
										$query_edit = mysqli_query($mysql, "SELECT * FROM tbl_admin WHERE id_admin = '$id'");
										while ($data = mysqli_fetch_array($query_edit)){ 
										?>
										<input type="hidden" readonly value="<?php echo $data['id_admin']; ?>" name="id_admin" class="form-control" >
											<div class="form-group" style="width:90%">
											<div class="row">
												<div class="col-md-4">
													<label>No Customer </label>
												</div>
												<div class="col-md-8">
													<input name="no_customer" class="form-control" value="<?php echo $data['no_customer']; ?>" disabled>
												</div>
											</div>
											</div>
											<div class="form-group" style="width:90%">
											<div class="row">
												<div class="col-md-4">
													<label>Full Name </label>
												</div>
												<div class="col-md-8">
													<input name="nm_customer_m" class="form-control" value="<?php echo $data['nm_lengkap']; ?>" disabled>
												</div>
											</div>
											</div>
												<div class="form-group" style="width:90%">
						 							<div class="row">
						 								<div class="col-md-4">
															<label>Username </label>
						 								</div>
														<div class="col-md-8">
															<input name="username" class="form-control" value="<?php echo $data['username']; ?>">
						 								</div>
													</div>
												</div>
												<div class="form-group" style="width:90%">
													<div class="row">
														<div class="col-md-4">
															<label>Level </label>
														</div>
														<div class="col-md-8">
															<select name="level" id="level" name="level" class="form-control">
															<?php if($data['level'] == "administrator"){
																echo "<option value='administrator' selected>administrator</option>
												<option value='customer'>customer</option>";
															}else{
																echo "<option value='administrator'>administrator</option>
												<option value='customer' selected>customer</option>";
															} echo
											"</select>" ?>
														</div>
													</div>
												</div>
												<div class="form-group" style="width:90%">
						 							<div class="row">
													 <div class="col-md-4">
														<label>New Password </label>
													 </div>
													 <div class="col-md-8">
														<input name="new_pass" type="password" class="form-control">
													 </div>
													</div>
												</div>
												<div class="form-group" style="width:90%">
						 							<div class="row">
													 <div class="col-md-4">
														<label>Confrm Password </label>
													 </div>
													 <div class="col-md-8">
														<input name="konfrm" type="password" class="form-control">
													 </div>
													</div>
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Save Change</button>
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
			
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							<i class="fa fa-plus fa-fw"></i> Form Data Admin
						</div>
					<div class="card-body">
									<form role="form" action="" method="post">
										<div class="form-group" style="width:80%">
											<label>No. Customer :</label>
											<input name="no_customer_rel" id="no_customer_rel" class="form-control">
										</div>
										<div class="form-group" style="width:80%">
											<label>Nama Lengkap :</label>
											<input name="nm_customer_rel" id="nm_customer_rel" class="form-control">
										</div>
										<div class="form-group" style="width:50%">
											<label>email :</label>
											<input name="email_rel" id="email_rel" class="form-control">
										</div>
										<div class="form-group" style="width:80%">
											<label>Level :</label>
											<select name="level" id="level" name="level" class="form-control">
						 						<option>--Select--</option>
						 						<option value="administrator">Administrator</option>
												<option value="customer">Customer</option>
											</select>
										</div>
										<div class="form-group" style="width:80%">
											<label>Username :</label>
											<input name="username" id="username" class="form-control">
										</div>
										<div class="form-group" style="width:70%">
											<label>Password :</label>
											<input name="password" id="password" type="password" class="form-control">
										</div>
										<div class="form-group" style="width:70%">
											<label>Confrm Password :</label>
											<input name="konfrm" id="konfrm" type="password" class="form-control" onChange="isPasswordMatch();" />
											<div style="color:red;" id="divCheckPassword">
											</div>
										</div>
										<div class="form-group page-header well well-sm">
											<button class="btn btn-primary" type="submit" name="submit"><span data-feather="save"></span> Save</button>
										</div>
									</form>			  
					</div>
					</div>
				</div>
				
</main>


	