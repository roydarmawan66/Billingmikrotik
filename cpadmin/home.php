<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
	  			  				    <?php
  if(isset($_SESSION['pesan']) && $_SESSION['pesan'] <> ''){
	  echo '<div class="alert alert-success notifications">'.$_SESSION['pesan'].'</div>';
  }
  $_SESSION['pesan'] = '';
  ?>
 
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-4">Welcome <?php echo $_SESSION['username']; ?></h3>
            <p class="lead"><B>Billing Hotspot</B> adalah sebuah aplikasi <i>"Billing Hotspot untuk Mikrotik"</i> dengan menggunakan bahasa pemrograman PHP dan menggunakan API Mikrotik sebagi komunikasi dengan router.
            <dd class="lead">Anda bisa memantau banyak router sekaligus dalam satu halaman, menambahkan batas pemakaian (limit-uptime) antar user dan lihat hasil penjualan pada laporan penjualan.
            </p>
        </div>
      </div>
    </main>