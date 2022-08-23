<?php
include "library/routerosapi.php";
include "controller/fnc_ast.php";
include "controller/config.php"; 
$API = new routeros_api();
$API->debug = false;

$conroute = $API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']);
$seeuser   = $API->comm('/ip/hotspot/user/print');

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">DATA BILLING</h1>
    </div>	
				<div class="col-lg-12">
				<?php
						$query = mysqli_query($mysql, "SELECT SUM(harga) FROM tbl_billing");
					
					// Print out result
					while($row=mysqli_fetch_array($query)){ 
						?>
				<div class="well well-large" >
					<p>Total Penghasilan : 
					<div class="list-group-item list-group-item-primary"><h3><b><?php echo rupiah($row['SUM(harga)']); ?></b></h3></div></p>
					<?php } ?>
				</div>
					<div class="card">
						<div class="card-header">
						Billing
                        <div class="float-right">
                        <a href="index.php?pg=order" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Order Paket</a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#beliPaket" ><i class="fa fa-file-pdf-o"></i> Export to PDF</button>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#beliPaket" ><i class="fa fa-file-excel-o"></i> Export to Excel</button>
						</div>
                        </div>
							<div class="card-body">
								<div class="table-responsive">
                                <table id="dtBasicExample" class="table table-striped" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
											<th>Jenis paket</th>
											<th>Nama Paket</th>
											<th>Harga</th>
                                            <th>Tanggal Aktif</th>
											<th>Validasi</th>
											<th>UP Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php //foreach( $seeuser as $index => $baris) :
									$query = mysqli_query($mysql, "SELECT * FROM tbl_billing WHERE idr = '$_SESSION[idr]'");
									$no=1;
									foreach($query as $row => $data){
									?>
									
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $data['user']; ?></td>
										<td><?php echo $data['jenispaket']; ?></td>
										<td><?php echo $data['namapaket']; ?></td>
										<td><?php echo rupiah($data['harga']); ?></td>
										<td><?php echo $data['date_on']; ?></td>
										<td><?php echo $data['masa_aktiv']; ?> Hari</td>
										<td></td>
									</tr>
									<?php }; ?>
                                    </tbody>
                                </table>
                            </div>
							</div>
						</div>
					</div>
					
					<!-- Modal -->
                            <div class="modal" id="beliPaket" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Beli Paket</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="" method="post">
												<div class="form-group">
													<label>Id Pelanggan :</label>
													<input name="idPelanggan" id="idPelanggan" class="form-control">
												</div>
												<div class="form-group">
													<label>Nama Pelanggan :</label>
													<input name="nmPelanggan" id="nmPelanggan" class="form-control">
												</div>
												<div class="form-group">
													<label>Jenis Paket :</label>
													<select id="jenispaket" name="jenispaket" class="form-control">
														<option>--Pilih--</option>
														<option value="unlimeted">Unlimeted</option>
														<option value="time base">Time Base</option>
														<option value="quota base">Quota Base</option>
													</select>
												</div>
												<div class="form-group">
													<label>Harga :</label>
													<input name="harga" id="harga" class="form-control" disabled>
												</div>
											</form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->