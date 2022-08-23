<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/dist/css/datatables.min.css" rel="stylesheet">
	<link href="../assets/dist/css/custome.css" rel="stylesheet">
    <link href="../assets/dist/css/datatables-select.min.css" rel="stylesheet">
    <link href="../assets/vendor/autocomplete/jquery-ui.css" rel="stylesheet">
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	  

	.typeahead-devs, .op,.tt-hint,.country,.allcountry  {
 	border: 2px solid #CCCCCC;
    border-radius: 8px 8px 8px 8px;
    font-size: 24px;
    height: 45px;
    line-height: 30px;
    outline: medium none;
    padding: 8px 12px;
    width: 400px;
}

.tt-dropdown-menu {
  width: 400px;
  margin-top: 5px;
  padding: 8px 12px;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px 8px 8px 8px;
  font-size: 18px;
  color: #111;
  background-color: #F1F1F1;
}

.notifications {
    cursor: pointer;
    position: fixed;
    right: 0px;
    z-index: 9999;
    top: 0px;
    margin-top: 22px;
    margin-right: 15px;
    min-width: 300px; 
    max-width: 800px;  
}
div.badan{
	background-color: white;
	border-radius: 5px;
	margin-bottom: 10px;
}

.content{
	font-size:12px;
}

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
        padding: 20mm;
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
	
    <!-- Custom styles for this template -->
    <link href="../assets/dashboard.css" rel="stylesheet">

  </head>
  <html>
  <body>      
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

        <div class="page">
			<div class="row">
			<img src="" class="img-responsive float-left" alt="">
				<div class="col-lg-12">
				<p><h4>Invoice #<?php echo $data['no_invoice']; ?></h4></p>
				</div>
			</div>
			<div class="row" style="margin-top:30px;">
				<div class="col-sm-6" style="font-size:14px;">
				<b>Invoiced To</b><br>
					<?php echo $data['nm_customer'];?><br>
					<?php echo $data['alamat']; ?><br>
					Indonesia<br> Telpon : <?php echo $data['tlp']; ?><dd>
					
				<p><b>Invoice Date</b><br>
				<?php echo $data['created_on']; ?>
				</div>
				<div class="col-sm-6" style="text-align:right;font-size:14px;">
				<b>Pay To</b><dd>
				<p>Royani Darmawan<br>
					Jl.HR Rasuna Said Gg.Ismail Kel Cipete, Kec Pinang
					Tangerang-Banten, 15142<br>
					Indonesia<dd>
				</div>
			</div>
			<div class="row" style="margin-top:30px;">
			<div class="col-lg-12" style="font-size:18px;">
					<p><b>Invoice Items</b></p>
					<table class="table table-bordered">
					  <thead>
						<tr>
						  <th scope="col" style="width:580px"><b>Description</b></th>
						  <th scope="col"><b>Priode</b></th>
						  <th scope="col"><b>Amount</b></th>
						</tr>
					  </thead>
					  <tbody">
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
			<div class="col-lg-12" style="margin-top:80px; font-size:18px;">
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
	</body>
  </html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="../assets/dist/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="../assets/dashboard.js"></script>

<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/typeahead.js"></script>	

<!-- Memanggil jQuery.js -->
<script src="../assets/js/jquery-3.2.1.min.js"></script>

<!-- Memanggil Autocomplete.js -->
<script src="../assets/vendor/autocomplete/jquery-1.8.3.js"></script>
<script src="../assets/vendor/autocomplete/jquery-ui.js"></script>

<script src="../assets/dist/js/datatables.min.js"></script>
<script src="../assets/dist/js/datatables-select.min.js"></script>

<script>
window.print();
</script>

  
<script>
function randString(id){
  var dataSet = $(id).attr('data-character-set').split(',');  
  var possible = '';
  if($.inArray('a-z', dataSet) >= 0){
    possible += 'abcdefghijklmnopqrstuvwxyz';
  }
  if($.inArray('A-Z', dataSet) >= 0){
    possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  }
  if($.inArray('0-9', dataSet) >= 0){
    possible += '0123456789';
  }
  if($.inArray('#', dataSet) >= 0){
    possible += '![]{}()%&*$#^<>~@|';
  }
  var text = '';
  for(var i=0; i < $(id).attr('data-size'); i++) {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }
  return text;
}

$('input[rel="generatePass"]').each(function(){
  $(this).val(randString($(this)));
});

$(".btngenerate").click(function(){
  var field = $(this).closest('div').find('input[rel="generatePass"]');
  $(this).val(randString($(this)));
});

$('input[rel="generatePass"]').on("click", function () {
   $(this).select();
});
</script>
<script>   
    $('#notifications').slideDown('slow').delay(6000).slideUp('slow');
</script>
<script>
$(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
});
</script>
<script type="text/javascript">
$(document).ready(function() {

    $('#no_customer_rel').autocomplete({
        source: "controller/fnc_autocomplete.php",
        select: function (event, ui) {
            $('[name="no_customer_rel"]').val(ui.item.value);
            $('[name="nm_customer_rel"]').val(ui.item.descripsi);
            $('[name="email_rel"]').val(ui.item.email);
        }
    });
});
</script>

<script>
function isPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#konfrm").val();

    if (password != confirmPassword) $("#divCheckPassword").html("Passwords do not match!");
    else $("#divCheckPassword").html("");
}

$(document).ready(function () {
    $("#konfrm").keyup(isPasswordMatch);
});
</script>


<script type="text/javascript">
    function showDiv(element, divId_Q, divId_T){
    if(element.value == "quotabase")
    {
        document.getElementById(divId_Q).style.display = "block";
		document.getElementById(divId_T).style.display = "none";
    }else if(element.value == "timebase"){
        document.getElementById(divId_T).style.display = "block";
		document.getElementById(divId_Q).style.display = "none";
    }
    
 
    }
</script>

<script>
window.setTimeout(function() {
$(".alert").fadeTo(500, 0).slideUp(500, 
    function(){
        $(this).remove(); 
    });
}, 2000);
</script>
