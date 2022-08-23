<?php
session_start();
include "cpadmin/library/routerosapi.php";
if(!isset($_SESSION["login"])){
	header("location:index.php");
	exit;
}
 else {

  if (isset($_POST['submit'])) {
    $API = new routeros_api();
	$API->debug = false;
	$conroute = $API->connect($_SESSION['host'], $_SESSION['user'], $_SESSION['pass']);
	if($conroute){
      $API->write('/system/reboot');
	  $API->read();
	  if($API){
		   echo "<script> alert('Mikrotik, Berhasil di Reboot..!');
                </script>";
	  }else{
		  echo "<script> alert('Gagal Reboot..!');
                </script>";
	  }
			}
session_destroy();
    echo "<script>window.location.href='./';</script>";
  }
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


    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.css" rel="stylesheet">
    <link href="assets/dist/css/datatables.min.css" rel="stylesheet">
	<link href="assets/dist/css/custome.css" rel="stylesheet">
    <link href="assets/dist/css/datatables-select.min.css" rel="stylesheet">
	<link href="assets/dist/css/datapicker/bootstrap-datepicker.css" rel="stylesheet">
	<link href="assets/dist/css/datapicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/vendor/autocomplete/jquery-ui.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    

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

  </head>
  <body>
<div class="col-md-4 offset-md-4"
<div style="padding-top:10%;" class="register-box">
  <div class="card">
    <div class="card-header">
        <h4 class="card-title"><i class="fa fa-power-off"></i> Reboot Mikrotik</h4>
    </div>
  	<div class="card-body text-center">
  		<form action="" method="post" enctype="multipart/form-data">
        <div>
         <h3></h3>
        </div>
  	  <button class="btn bg-warning" type="submit" title="Yes" name="submit">Yes, Reboot..!</button>
      <a class="btn bg-primary" href="./cpadmin/index.php?pg=dashboard" title="No">Back To Home</a>
      
    </form>
  </div>
</div>
</div>
</div>

 </body>
  </html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="assets/dist/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="assets/dashboard.js"></script>

<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/typeahead.js"></script>	

<!-- Memanggil jQuery.js -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Memanggil Autocomplete.js -->
<script src="assets/vendor/autocomplete/jquery-1.8.3.js"></script>
<script src="assets/vendor/autocomplete/jquery-ui.js"></script>

<script src="assets/dist/js/datatables.min.js"></script>
<script src="assets/dist/js/datatables-select.min.js"></script>

<script src="assets/dist/js/datepicker.js"></script>
<script src="assets/dist/js/datepicker.min.js"></script>
<script src="assets/dist/js/config.js"></script>




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
