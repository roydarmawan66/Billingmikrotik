<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">PROFILE</h1>
    </div>
        <div class="row">
            <div class="col-lg-3">
                    <div class="text-center">                  
                    <img src="../assets/image/images.png" alt="..." class="img-thumbnail">
                    </div>
                            <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file Logo</label>
</div></ul>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Informasi
                    </div>
					<?php
					 if(isset($_GET['no_customer'])){
							$id=$_GET['no_customer'];
						}
						else {
							die ("Error. No ID Selected!");    
						}
					include "controller/config.php";
					$query = mysqli_query($mysql, "SELECT * FROM tbl_customer WHERE no_customer='$id'");
					$row = mysqli_fetch_array($query);
					
					?>
                    <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Account</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Router</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab" aria-controls="billing" aria-selected="false">Billing</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <ul class="list-group list-group-flush">
									<li class="list-group-item">
									<div class="row">
										<div class="col-sm-3"><strong>No. Customer </strong></div>
										  <input type="text" class="col-sm-3" id="staticEmail" value="<?php echo $row['no_customer']; ?>">	  
									</div>
									</li>
                                    <li class="list-group-item">
									<div class="row">
										<div class="col-sm-3"><strong>Full Name </strong></div>
										<input type="text" class="col-sm-3" id="staticEmail" value="<?php echo $row['nm_customer']; ?>">
									</div>
									</li>
                                    <li class="list-group-item">
									<div class="row">
										<div class="col-sm-3"><strong>Busines Name</strong></div>
										  <input type="text" class="col-sm-3" id="staticEmail" value="">
									</div>
									</li>
                                    <li class="list-group-item">
									<div class="row">
									<div class="col-sm-3"><strong>No tlp / Hp</strong></div>
									<input type="text" class="col-sm-3" id="staticEmail" value="<?php echo $row['tlp']; ?>">
									</div>
									</li>
									<li class="list-group-item">
									<div class="row">
									<div class="col-sm-3"><strong>Email</strong></div>
									<input type="text" class="col-sm-3" id="staticEmail" value="<?php echo $row['email']; ?>">
									</div>
									</li>
                                    <li class="list-group-item">
									<div class="row">
									<div class="col-sm-3"><strong>Alamat</strong></div>
									<textarea type="text" class="col-sm-3" id="staticEmail" value="<?php echo $row['alamat']; ?>"><?php echo $row['alamat']; ?></textarea>
									</div>
									</li>
                                    <li class="list-group-item">
									<div class="row">
									<div class="col-sm-3"><strong>Username</strong></div>
									<input type="text" class="col-sm-3" id="staticEmail" value="">
									</div>
									</li>
									 <li class="list-group-item">
									<div class="row">
										<div class="col-sm-6"><button class="btn btn-primary">Save changes</button></div>
										    
									</div>
									</li>
                            </ul>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								  <tr>
									<th>No.</th>
									<th>IP / Host</th>
									<th>Router Name</th>
									<th>Status Active</th>
									<th>Action</th>
								  </tr>
								</thead>						
								<tbody>
								<?php
								include "controller/config.php";
								if(isset($_GET['no_customer'])){
							$id=$_GET['no_customer'];
						}
						else {
							die ("Error. No ID Selected!");    
						}
								$tampil = mysqli_query($mysql,"SELECT * FROM tbl_konfig WHERE no_customer=$id");
								$no=1;
								while($row = mysqli_fetch_array($tampil)){
									?>
									<tr class="odd gradeX">
									<td><?php echo $no++ ?></td>
									<td><?php echo $row['host_router']; ?></td>
									<td><?php echo $row['user_router']; ?></td>
									<td><?php echo $row['pass_router']; ?></td>
									<td><div class="btn-group pull-right">
									<button type="button" class="btn btn-outline btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<label>More</i></label>
									</button>
											<ul class="dropdown-menu slidedown card-body">
												<li>
													<a href="" data-toggle="modal" data-target="#update_router<?php echo $row['idr']; ?>">
													<span data-feather="repeat"></span>	Change
													</a>
												</li>
												<li>
													<a href="#">
													<span data-feather="trash-2"></span> Delete
													</a>		
												</li>
											</ul>
								</div> </td>
								  </tr>
								
								<div class="modal" id="update_router<?php echo $row['idr']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
										<h4 class="modal-title">CHANGE DATA</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="update_router.php" method="get">
											<?php 
										$id = $row['idr'];
										$query_edit = mysqli_query($mysql, "SELECT * FROM tbl_konfig WHERE idr = '$id'");
										while ($data = mysqli_fetch_array($query_edit)){ 
										?><input type="hidden" readonly value="<?php echo $data['idr']; ?>" name="idr" class="form-control" >
										<input type="hidden" readonly value="<?php echo $data['no_customer']; ?>" name="no_customer" class="form-control" >
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> IP Host </label>
													</div>
													<div class="col-md-8">
														<input class="form-control" name="ip_host" id="ip_host" style="width:100%;" value="<?php echo $data['host_router']; ?>">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> Username </label>
													</div>
													<div class="col-md-8">
														<input class="form-control" name="user_router" id="user_router" style="width:100%;" value="<?php echo $row['user_router']; ?>">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> Password </label>
													</div>
													<div class="col-md-8">
														<input class="form-control" name="pass_router" id="pass_router" style="width:100%;" value="<?php echo $row['pass_router']; ?>">
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
								
								<?php  } ?>
								</tbody>
								
						  </table>
  </div>
  
    <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
								  <tr>
									<th>No.</th>
									<th>#Invoice</th>
									<th>IP / Host</th>
									<th>Created Date</th>
									<th>Expiry Date</th>
									<th>Total</th>
									<th>Status Active</th>
									<th>Action</th>
								  </tr>
								</thead>						
								<tbody>
								<?php
								include "controller/config.php";
								if(isset($_GET['no_customer'])){
							$id=$_GET['no_customer'];
						}
						else {
							die ("Error. No ID Selected!");    
						}
								$tampil = mysqli_query($mysql,"SELECT * FROM tbl_detail_konfig 
								WHERE no_customer = '$id' AND expiry_date >= 'time()'");
								$no=1;
								while($row = mysqli_fetch_array($tampil)){
									$mulai =  $row['created_on'];// waktu mulai
$exp = $row['expiry_date']; // batas waktu
if (!(strtotime($mulai) <= time() AND time() >= strtotime($exp))) {
$status = '<label class="badge badge-success">Active</label>';
} else {
$status = '<label class="badge badge-warning">Tidak Active</label>';
}
									?>
									<tr class="odd gradeX">
									<td><?php echo $no++ ?></td>
									<td>INV-<?php echo $row['no_invoice']; ?></td>
									<td><?php echo $row['host_router']; ?></td>
									<td><?php echo $row['created_on']; ?></td>
									<td><?php echo $row['expiry_date']; ?></td>
									<td>Rp. <?php echo $row['Biaya']; ?></td>
									<td><?php echo $status ?></td>
									<td><div class="btn-group pull-right">
									<button type="button" class="btn btn-outline btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										<label>More</i></label>
									</button>
											<ul class="dropdown-menu slidedown card-body">
												<li>
													<a href="" data-toggle="modal" data-target="#update_router<?php echo $row['idr']; ?>">
													<span data-feather="repeat"></span>	Change
													</a>
												</li>
												<li>
													<a href="#">
													<span data-feather="trash-2"></span> Delete
													</a>		
												</li>
											</ul>
								</div> </td>
								  </tr>
								
								
								<?php  } ?>
								</tbody>
								
						  </table>
  </div>
</div>
                    </div>
                </div>
            </div>
        </div>

</main>