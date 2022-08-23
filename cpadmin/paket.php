<?php
include "controller/fnc_paket.php";
if(isset($_POST["submit"])){
	if(addPaket($_POST) > 0){
		echo "<script> alert('berhasil, menambahkan data paket')
                        documents.location.href = 'index.php?pg=set_paket'
                </script>";
        }else{
        echo "<script> alert('gagal, menambahkan data paket')
                        documents.location.href = 'index.php?pg=set_paket'
             </script>";
        }
}
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h3">PAKET LAYANAN </h1>
</div>
 <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-bar-chart-o fa-fw"></i> List Data Paket
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-body">
                            <table id="dtBasicExample" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
								<thead>
								  <tr>
									<th>No</th>
									<th>Name Paket</th>
									<th>Paket</th>
									<th>Price</th>
									<th>Time Limit</th>
									<th>Quota Limit</th>
									<th>Shared Users</th>
									<th>Masa Aktif</th>
									<th>Action</th>
								  </tr>
								</thead>
								<tbody>
								<?php
						include "controller/config.php";
						$tampil = mysqli_query($mysql, "SELECT * FROM tbl_paket WHERE idr = '$_SESSION[idr]' OR id_admin = '$_SESSION[id_admin]' ORDER BY id_paket DESC");
						$no=1;
						while ($row = mysqli_fetch_array($tampil)){ ?>
									<tr class="odd gradeX">
										<td><?php echo $no++ ?></td>
										<td><?php echo $row['nama']; ?></td>
										<td><?php echo $row['tipe_limit']; ?></td>
										<td><?php echo $row['harga']; ?></td>
										<td><?php echo $row['time_limit'];?> <?php echo $row['time_unit']; ?></td>
										<td><?php echo $row['data_limit']; ?> <?php echo $row['data_unit']; ?></td>
										<td><?php echo $row['share']; ?>  Device</td>
										<td><?php echo $row['masa_aktiv']; ?> Day</td>
										<td><div class="btn-group pull-right">
											<button type="button" class="btn btn-outline btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
												<label>More</label>
											</button>
													<ul class="dropdown-menu slidedown card-body">
														<li>
															<a 
															href="#"
															data-toggle="modal" data-target="#update_paket">
															<span data-feather="repeat"></span>	Change
															</a>
														</li>
														<li>
															<a href="paket_hapus.php?id=<?php echo $row['id_paket']; ?>&del=<?php echo $row['nama']; ?>">
															<span data-feather="trash-2"></span> Delete
															</a>		
														</li>
													</ul>
											</div> 
										</td>
						</tr>	<?php } ?>	
								</tbody>
						  </table>
                        <!-- /.panel-body -->
                    </div>
				</div>
			</div>
			
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							<i class="fa fa-plus fa-fw"></i> Form Data Paket
						</div>
					<div class="card-body">
									<form role="form" action="" method="post">
										<div class="form-group" style="width:80%">
											<label>Nama Paket :</label>
											<input name="name" id="name" class="form-control" value=""
											placeholder="Paket Name">
										</div>
										<div class="form-group" style="width:50%">
											<label>Jenis Paket :</label>
											<select id="jenispaket" name="jenispaket" class="form-control jenispaket" onchange="showDiv(this, 'quotabase','timebase')">
												<option value="pilih">--Pilih--</option>
												<option value="unlimited">Unlimited</option>
												<option value="timebase">Time Base</option>
												<option value="quotabase">Quota Base</option>
											</select>
										</div>
										<div class="form-group" style="width:80%">
											<label>Harga :</label>
											<input name="harga" id="harga" class="form-control" placeholder="Rp">
										</div>
										<!-- quota base -->
										<div class="form-group quotabase" id="quotabase" style="width:70%; display:none;">
											<label>Data Limit:</label>
											<div class="row">
											<div class="col-lg-4">
											<input name="rate_d" id="rate_d" class="form-control" value="0">
											</div>
											<div class="col-lg-8">
											<select id="limit_d" name="limit_d" class="form-control" style="margin-left:5px;">
												<option value="MB">MB</option>
												<option value="KB">KB</option>
											</select>
											</div>
										</div>
										</div>
										<!-- akhir quota base -->
										<!-- time base -->
										<div class="form-group timebase" id="timebase" style="width:70%; display:none;">
											<label>Time Limit:</label>
											<div class="row">
											<div class="col-lg-4">
											<input name="rate" id="rate" class="form-control" value="0">
											</div>
											<div class="col-lg-8">
											<select id="limit" name="limit" class="form-control" style="margin-left:5px;">
												<option value="Hrs">Hrs</option>
												<option value="Mins">Mins</option>
											</select>
											</div>
										</div>
										</div>
										<!-- akhir time base -->
										
										<div class="form-group" style="width:70%">
											<label>Rate (Down/Up) :</label>
											<input name="ratedownup" class="form-control" placeholder="1M/1M">
										</div>
										<div class="form-group" style="width:70%">
											<label>Masa Aktif (hari) :</label>
											<input name="masa_aktiv" class="form-control" placeholder="30">
										</div>
										<div class="form-group" style="width:70%">
											<label>Shared Users :</label>
											<input name="sharedUser" class="form-control"
											placeholder="Max 10">
										</div>
										<div class="form-group page-header well well-sm">
											<button class="btn btn-primary right" type="submit" name="submit" id="submit"><span data-feather="save"></span> Save</button>
										</div>
									</form>			  
					</div>
					</div>
				</div>

<!-- /.ubah data paket -->				
<div class="modal" id="update_paket" tabindex="-1" role="dialog">
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
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> Nama Paket </label>
													</div>
													<div class="col-md-8">
														<input class="form-control" name="nm_paket" id="nm_paket" style="width:100%;">
													</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
													<div class="col-md-4" style="width:140px;">
														<label> Jenis Paket </label>
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
                                            <button class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        </div>
									</form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
</main>



	
