<?php include "controller/config.php"; 

?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">EDIT ROUTER</h1>
    </div>
	<div class="row">
				<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-credit-card-alt fa-fw"></i> Form Edit Router
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-body card text-right">
						<?php
						
						if(isset($_GET['id'])){
							$idr = $_GET['id'];
							$tampil = mysqli_query($mysql, "SELECT * FROM tbl_konfig where idr = '$idr'");
							while ($data = mysqli_fetch_array($tampil)){
						 ?>
						<form action="up_router.php" method="post">
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Full Name </label>
												</div>
												<div class="col-md-6">
													<input type="hidden" name="idr" value="<?php echo $data['idr']; ?>">
													<input type="text" id="fullname" name="fullname" class="form-control fullname" disabled
													
													value="<?php echo $data['nm_customer']; ?>">
												</div>
											</div>
							</div>
							<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Ip Host </label>
												</div>
												<div class="col-md-6">
													<input class="form-control" name="ip_host" id="ip_host" value="<?php echo $data['host_router']; ?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Username Router </label>
												</div>
												<div class="col-md-6">
													<input type="text" id="display" class="form-control" name="user_router"
													value="<?php echo $data['user_router']; ?>">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-4" >
													<label>Password Router</label>
												</div>
												<div class="col-md-6">
												<input type="text" id="pass_router" name="pass_router" class="form-control"
												value="<?php echo $data['pass_router']; ?>">
												</div>
											</div>
										</div>
										<div class="form-group page-header">
										<div class="col-md-6">
											<button class="btn btn-primary"  type="submit" name="save"> Save</button>
											<a class="btn btn-success"  type="submit" name="connect" href="index.php?pg=launce&host=<?php echo $data['host_router']; ?>"> Connect</a>
											<button class="btn btn-danger" type="submit" id="act" name="act"> Ping !</button>
										</div>
										</div>
									</form>
						<?php	} ?>
										
                            	<?php	} ?>
                        <!-- /.panel-body -->
                    </div>
					</div>
				</div>
	</div>
	</main>