	<?php include "controller/config.php"; 
	include "controller/fnc_beli_paket.php";


if(isset($_POST["submit"])){
        if(addTransaksi($_POST) > 0){
		echo"<script> alert('Berhasil, menambahkan data customer');
             </script>";
        }else{
        echo "<script> alert('gagal, menambahkan data customer');
             </script>";
        }
}
	?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">ORDER PAKET</h1>
    </div>
	<div class="row">
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-credit-card-alt fa-fw"></i> Form Order Paket Internet
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-body card text-right">
						<?php
						
						if(isset($_GET['idclient'])){
							$idclient = $_GET['idclient'];
							$tampil = mysqli_query($mysql, "SELECT * FROM tbl_client where id_client = '$idclient'");
							while ($data = mysqli_fetch_array($tampil)){
						 ?>
						<form action="" method="post" enctype="multipart/form-data">
						<input type="hidden" readonly value="<?php echo $data['id_client']; ?>" name="id_client" class="form-control" >
						<input type="hidden" name="invoice" value="<?php echo invoice('noinvoice','tbl_billing'); ?>">
										<input type="hidden" name="date_invoice" value="<?php echo date("Y-m-d h:i:s"); ?>">
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Full Name </label>
												</div>
												<div class="col-md-6">
													<select id="fullname" name="fullname" class="form-control fullname">
												<option value="<?php echo $data['nm_client']; ?>"><?php echo $data['nm_client']; ?></option>
												</select>
												</div>
											</div>
							</div>
							<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Username </label>
												</div>
												<div class="col-md-6">
													<input class="form-control" name="username" id="username"value="">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Password </label>
												</div>
												<div class="col-md-6">
													<input type="text" id="display" class="form-control" rel="generatePass" data-size="6" data-character-set="a-z,A-Z,0-9,#" name="password">
												</div>
											</div>
										</div>
										<div class="form-group page-header">
										<div class="col-md-10">
											<button class="btn btn-secondary btn-sm" onclick="generate()"> Generate</button>
										</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Nama Paket</label>
												</div>
												<div class="col-md-6">
												<select id="paket" name="paket" class="form-control paket">
												<option value="pilih">-Select Nama Paket-</option>
													<?php
													$tampil = mysqli_query($mysql, "SELECT * FROM tbl_paket where idr = '$_SESSION[idr]' ORDER BY id_paket DESC");
													while ($row = mysqli_fetch_array($tampil)){ echo 
												'
												<option value="'.$row['id_paket'].'">'.$row['nama'].'</option>
													';} ?>
											</select>
												</div>
											</div>
										</div>
										<div class="form-group page-header">
										<div class="col-md-6">
											<a class="btn btn-danger"  type="submit" name="submit" href="index.php?pg=data_user"> Batal</a>
											<button class="btn btn-primary" type="submit" id="submit" name="submit" > Beli Paket</a>
										</div>
										</div>
									</form><?php }
						}	else { ?>
							<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Full Name </label>
												</div>
												<div class="col-md-6">
													<select id="fullname" name="fullname" class="form-control fullname">
													<option value="pilih"> </option>
													<?php
													$tampil = mysqli_query($mysql, "SELECT * FROM tbl_client ORDER BY id_client DESC");
													while ($row = mysqli_fetch_array($tampil)){ echo '
												<option value="'.$row['nm_client'].'">'.$row['nm_client'].'</option>
													';} ?>
											</select>
												</div>
											</div>
							</div>
							<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Username </label>
												</div>
												<div class="col-md-6">
													<input class="form-control" name="tlp" id="tlp"value="">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Password </label>
												</div>
												<div class="col-md-6">
													<input type="text" id="display" class="form-control" rel="generatePass" data-size="6" data-character-set="a-z,A-Z,0-9,#">
												</div>
											</div>
										</div>
										<div class="form-group page-header">
										<div class="col-md-10">
											<button class="btn btn-secondary btn-sm" onclick="generate()"> Generate</button>
										</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Nama Paket</label>
												</div>
												<div class="col-md-6">
												<select id="jenispaket" name="jenispaket" class="form-control jenispaket">
												<option value="pilih">-Select Nama Paket-</option>
													<?php
													$tampil = mysqli_query($mysql, "SELECT * FROM tbl_paket where idr = '$_SESSION[idr]' ORDER BY id_paket DESC");
													while ($row = mysqli_fetch_array($tampil)){ echo 
												'
												<option value="'.$row['nama'].'">'.$row['nama'].'</option>
													';} ?>'
											</select>
												</div>
											</div>
										</div>
										<div class="form-group page-header">
										<div class="col-md-6">
											<a class="btn btn-danger"  type="submit" name="submit" href="index.php?pg=data_user"> Batal</a>
											<button class="btn btn-primary" type="submit" name="submit"> Beli Paket</button>
										</div>
										</div>
									</form>
					<?php	}							?>
										
                            
                        <!-- /.panel-body -->
                    </div>
					</div>
				</div>
	</div>
	</main>

