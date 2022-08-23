	<?php 
	include "controller/config.php";
	$invoice = $_GET['inv'];
	/* source cetak invoice */
	$tampil = mysqli_query($mysql, "SELECT * FROM tbl_billing INNER JOIN tbl_admin ON tbl_billing.id_admin=tbl_admin.id_admin where idr = '$_SESSION[idr]' AND noinvoice='$invoice'");
	$hasil = mysqli_fetch_array($tampil);
	?>
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">PRINT INVOICE</h1>
    </div>
	<div class="row">
				<div class="col-lg-6">
				
                    <div class="jumbotron" style="padding-top:30px;">
					  <p style="text-align:center;"><b>Homeschooling Kak Seto</b><br>
					  Jl. Raya Parigi Lama No.3A, Parigi, Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15227</p>
					  <hr class="my-4">
					  <p>Invoice: inv-<?php echo $hasil['noinvoice']; ?><br>
					  Kasir: <?php echo $hasil['nm_lengkap']; ?></p>
					  <hr class="my-4">
					  <p>Jenis Paket: <?php echo $hasil['jenispaket']; ?><br>
					  Nama Paket: <?php echo $hasil['namapaket']; ?><br>
					  Harga: <?php echo $hasil['harga']; ?><br></p>

					  <p>Username: <?php echo $hasil['user']; ?><br>
					  Password: <?php echo $hasil['pass']; ?></p>
					  <hr class="my-4">
					  <p style="text-align:center;">Terima Kasih</p>
					</div>
				</div>
	</div>
	</main>

