<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Billing Hotspot</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.css" rel="stylesheet">
    <link href="assets/dist/css/datatables.min.css" rel="stylesheet">
    <link href="assets/dist/css/datatables-select.min.css" rel="stylesheet">
    <link href="assets/vendor/autocomplete/jquery-ui.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .notifications {
    cursor: pointer;
    position: fixed;
    right: 0px;
    z-index: -99999px;
    top: 0px;
    margin-top: 22px;
    margin-right: 15px;
    min-width: 300px; 
    max-width: 800px;  
}


      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/login.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <?php
  if(isset($_GET['pesan'])){
	  if($_GET['pesan']=="gagal"){
		  echo "<div class='alert'>username dan password tidak sesuai !</div>";
	  }
  }
  ?>
  <form class="form-signin" action="cek_login.php" method="post">
  <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
  <p>Please Sign in to Control Panel</p>
  <label for="inputEmail" class="sr-only">Username</label>
  <input type="text" id="txtusername" name="txtusername" class="form-control" placeholder="Username" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="txtpassword" name="txtpassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; Royani Darmawan</p>
  <?php
  session_start();
  if(isset($_SESSION['pesan']) && $_SESSION['pesan'] <> ''){
	  echo '<div class="alert alert-danger notifications">'.$_SESSION['pesan'].'</div>';
  }
  $_SESSION['pesan'] = '';
  ?>
</form>
</body>
</html>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="assets/dist/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="assets/dashboard.js"></script>

<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/typeahead.js"></script>	

<!-- Memanggil jQuery.js -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Memanggil Autocomplete.js -->
<script src="assets/vendor/autocomplete/jquery-1.8.3.js"></script>
<script src="assets/vendor/autocomplete/jquery-ui.js"></script>

<script src="assets/dist/js/datatables.min.js"></script>
<script src="assets/dist/js/datatables-select.min.js"></script>
<script>   
    $('.notifications').slideDown('slow').delay(3000).slideUp('slow');
</script>
<script>
	$(document).ready(function(){setTimeout(function(){$(".pesan").fadein('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
</script>