<!doctype html>
<?php 
session_start();
if(!isset($_SESSION["login"])){
	header("location:index.php");
	exit;
}
?>
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
	  
	  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 


    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/dist/css/datatables.min.css" rel="stylesheet">
	<link href="../assets/dist/css/custome.css" rel="stylesheet">
    <link href="../assets/dist/css/datatables-select.min.css" rel="stylesheet">
	<link href="../assets/dist/css/datapicker/bootstrap-datepicker.css" rel="stylesheet">
	<link href="../assets/dist/css/datapicker/bootstrap-datepicker.min.css" rel="stylesheet">
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

    </style>
	
    <!-- Custom styles for this template -->
    <link href="../assets/dashboard.css" rel="stylesheet">
	<script src = "https://code.highcharts.com/highcharts.js"></script>

  </head>
  <body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"><h4>BILLING HOTSPOT</h4></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="nav px-3">
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="" style="color: white;">Sign out </i></a>
      <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item"><a href="index.php?pg=profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="dropdown-item"><a href=""><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-item"><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
      
                    </ul>
    </li>
  </ul>
</nav>
<?php
if($_SESSION['level'] == "customer"){?>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php?pg=home">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#dropdown-cp" href="#">
              <span data-feather="file"></span>
              Configurasi
            </a>
                <div class="collapse multi-collapse" id="dropdown-cp">
                    <a href="index.php?pg=data_router" class="dropdown-item">List Router</a>
                </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="index.php?pg=billing_invoice">
              <span data-feather="clipboard"></span>
              Invoice
            </a>
          </li>
		  </li>
		      <li class="nav-item">
            <a class="nav-link" href="../logout.php">
              <span data-feather="log-out"></span>
              Logout
            </a>
          </li>
<?php }else{ ?>
		  
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php?pg=home">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#dropdown-cp" href="#">
              <span data-feather="file"></span>
              Configurasi
            </a>
                <div class="collapse multi-collapse" id="dropdown-cp">
                    <a href="index.php?pg=router" class="dropdown-item">Router</a>
                    <a href="index.php?pg=add_admin" class="dropdown-item">Admin</a>
                    <a href="index.php?pg=data_router" class="dropdown-item">List Router</a>
                </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pg=report">
              <span data-feather="file-text"></span>
              Report Admin
            </a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="../logout.php">
              <span data-feather="log-out"></span>
              Logout
            </a>
          </li>
        </ul>
</div><?php } ?>
</nav>
</div>
</div>
<?php
if(isset($_SESSION['host'])){
	if($_SESSION['level'] == "customer"){
		?>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php?pg=dashboard">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#dropdown-cp" href="#">
              <span data-feather="file"></span>
              Configurasi
            </a>
                <div class="collapse multi-collapse" id="dropdown-cp">
                    <a href="index.php?pg=data_router" class="dropdown-item">List Router</a>
                </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#dropdown-hs" href="#">
              <span data-feather="wifi"></span>
              Hotspot
            </a>
                <div class="collapse multi-collapse" id="dropdown-hs">
                    <a href="index.php?pg=set_paket" class="dropdown-item">Paket</a>
                    <a href="index.php?pg=online" class="dropdown-item">User Online</a>
                </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pg=data_user">
              <span data-feather="users"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pg=billing">
              <span data-feather="shopping-cart"></span>
              Billing
            </a>
          </li>
         <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="printer"></span>
              Voucher Print
            </a> -->
          </li>
		  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#dropdown-rp" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
			<div class="collapse multi-collapse" id="dropdown-rp">
                    <a href="index.php?pg=daily_rp" class="dropdown-item"> Daily Reports</a>
                    <a href="index.php?pg=priod_rp" class="dropdown-item"> Priod Reports</a>
                </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#dropdown-ts" href="#">
              <span data-feather="layers"></span>
              Tools
            </a>
			<div class="collapse multi-collapse" id="dropdown-ts">
                    <a href="index.php?pg=set_paket" class="dropdown-item"> Bandwith Management</a>
                    <a href="../reboot.php" class="dropdown-item"> Reboot Mikrotik</a>
                </div>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="../logout.php">
              <span data-feather="log-out"></span>
              Logout
            </a>
          </li>
		  <?php }else{ ?>
		  <div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php?pg=dashboard">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#dropdown-hs" href="#">
              <span data-feather="wifi"></span>
              Hotspot
            </a>
                <div class="collapse multi-collapse" id="dropdown-hs">
                    <a href="index.php?pg=set_paket" class="dropdown-item">Paket</a>
                    <a href="index.php?pg=online" class="dropdown-item">User Online</a>
                </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pg=data_user">
              <span data-feather="users"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pg=billing">
              <span data-feather="shopping-cart"></span>
              Billing
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="printer"></span>
              Voucher Print
            </a>
          </li> -->
		  <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#dropdown-hs" href="#">
              <span data-feather="layers"></span>
              Tools
            </a>
			<div class="collapse multi-collapse" id="dropdown-ts">
                    <a href="index.php?pg=set_paket" class="dropdown-item"><span data-feather="grid"></span> Bandwith Management</a>
                    <a href="../reboot.php" class="dropdown-item"><span data-feather="power"></span> Reboot Mikrotik</a>
                </div>
          </li>
		      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Admin Setting</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
		  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="collapse" data-target="#dropdown-cp" href="#">
              <span data-feather="file"></span>
              Configurasi
            </a>
                <div class="collapse multi-collapse" id="dropdown-cp">
                    <a href="index.php?pg=router" class="dropdown-item">Router</a>
                    <a href="index.php?pg=add_admin" class="dropdown-item">Admin</a>
                    <a href="index.php?pg=data_router" class="dropdown-item">List Router</a>
                </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="index.php?pg=report">
              <span data-feather="file-text"></span>
              Admin Report
            </a>
          </li>
        </ul>
		<?php }?>
</div>
</nav><?php }?>
</div>

<div class="badan">
        	<?php 
	if(isset($_GET['pg'])){
		$page = $_GET['pg'];
		switch ($page) {
			case 'home':
				include "home.php";
				break;
			case 'router':
				include "r_server.php";
				break;
			case 'add_admin':
				include "admin.php";
				break;
			case 'data_router':
				include "listRouter.php";
				break;
			case 'set_paket':
				include "paket.php";
				break;
			case 'online':
				include "usr_online.php";
				break;
			case 'profile':
				include "profile.php";
				break;
			case 'dashboard':
				include "dashboard.php";
				break;
			case 'launce':
				include "launce.php";
				break;
			case 'data_user':
				include "user.php";
				break;
			case 'order';
				include "order_paket.php";
				break;
			case 'update_r';
				include "update_listrouter.php";
				break;
			case 'update_router';
				include "update_router.php";
				break;
			case 'billing';
				include "billing.php";
				break;
			case 'billing_invoice';
				include "billing_invoice.php";
				break;
			case 'reboot';
				include "reboot.php";
				break;
			case 'report';
				include "pg_report_admin.php";
				break;
			case 'daily_rp';
				include "daily_reports.php";
				break;
			case 'priod_rp';
				include "priod_reports.php";
				break;
			case 'invoice';
				include "invoice_billing.php";
				break;
			case 'print_invoice';
				include "print_invoice.php";
				break;
			default:
				echo '<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><center>Maaf. Halaman tidak di temukan !</center></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    </div>';
				break;
		}
	}else{
		include "home.php";
	}
 
	 ?>
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

<script src="../assets/dist/js/datepicker.js"></script>
<script src="../assets/dist/js/datepicker.min.js"></script>
<script src="../assets/dist/js/config.js"></script>


<script type="text/javascript" src="highchart/js/highcharts.js"></script>


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

<script type="text/javascript">
function confirmalert(){
var userselection = confirm("Are you sure you want to close this account permanently?");
if (userselection == true){
    alert("Your Account deleted!");
  }
else{
    alert("Your account is not deleted!");
}    
}
</script>

<script> 
$(".datepicker").datepicker({
    dateFormat:"yy-mm-dd",
});
  </script>


