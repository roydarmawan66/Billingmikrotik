<style>
table.table-bordered{
	border:1px solid black;
}
table.table-bordered > thead > tr > th{
	border:1px solid black;
}
table.table-bordered > tbody > tr > td{
	border:1px solid black;
}
.page {
        width: 210mm;
        min-height: 297mm;
        padding: 10mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	  			  				    <?php
  if(isset($_SESSION['pesan']) && $_SESSION['pesan'] <> ''){
	  echo '<div class="alert alert-success notifications">'.$_SESSION['pesan'].'</div>';
  }
  $_SESSION['pesan'] = '';
  
  include "controller/fnc_r_server.php";
  include "controller/fnc_ast.php";
  
  $id=$_GET['id'];
  $data=mysqli_fetch_array(mysqli_query($mysql, "SELECT * FROM tbl_detail_konfig INNER JOIN tbl_customer ON tbl_detail_konfig.no_customer = tbl_customer.no_customer WHERE no_invoice='$id'"));
 
  ?>      

	  <h1 class="h2"></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="invoice.php?id=<?php echo $data['no_invoice']; ?>" target="_blank" class="btn btn-sm btn btn-primary"><span data-feather="printer"></span> Print</a>
          </div>
          <a href="invoice_pdf.php" class="btn btn-sm btn-success"><span data-feather="download"></span>
            Download
          </a>
        </div>
      </div>
 

        <div class="page">
		<div class="col-lg-12">
		<div class="row">
			<img src="" class="img-responsive float-left" alt="">
				<div class="col-lg-12">
				<p><h4>Invoice #<?php echo $data['no_invoice']; ?></h4></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				<b>Invoiced To</b><dd>
					<p>
					<?php echo $data['nm_customer'];?><br>
					<?php echo $data['alamat']; ?><br>
					Indonesia<br> Telpon : <?php echo $data['tlp']; ?><dd>
				
				<p><b>Invoice Date</b><br>
				<?php echo $data['created_on']; ?>
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-4" style="text-align:right;">
				<b>Pay To</b><dd>
					<p>Royani Darmawan<br>
					Jl.HR Rasuna Said Gg.Ismail Kel Cipete, Kec Pinang
					Tangerang-Banten, 15142<br>
					Indonesia<dd>
				</div>
			</div>
			<div class="row">
			<div class="col-lg-11">
					<p><b>Invoice Items</b></p>
					<table class="table table-bordered">
					  <thead>
						<tr>
						  <th scope="col" style="width:580px"><b>Description</b></th>
						  <th scope="col"><b>Priode</b></th>
						  <th scope="col"><b>Amount</b></th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>BILLING - <?php echo $data['nm_customer']; ?> (<?php echo $data['created_on']; ?>-<?php echo$data['expiry_date'];?>), HOST Server <?php echo $data['host_router']; ?></td>
						  <td><?php echo $data['priode']; ?> Bulan</td>
						  <td><?php echo rupiah($data['Biaya']); ?></td>
						</tr>
						<tr>
						  
						  <td class="table-active" style="text-align:left" colspan="2"><b>Total</b></td>
						  <td class="table-active"><b><?php echo rupiah ($data['Biaya']); ?></b></td>
						</tr>
					  </tbody>
					</table>
			</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<p style="margin-top:15px;"><strong>Terbilang:</strong></p>
					<div class="card">
						<div class="card-body" style="max-width:18rem;"><i>
						<p><?php echo terbilang($data['Biaya']); ?> Rupiah</p></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-11" style="margin-top:80px;">
			<div class="row">
				<div class="col-md-8">
					
				</div>
				<div class="col-md-4" style="text-align:right;">
				<b>Terima Kasih</b><dd>
					<p>
					Tangerang, <?php echo date('d/m/yy'); ?><br>
					<dd>
				</div>
			</div>
        </div>
	</div>
</div>
    </main>