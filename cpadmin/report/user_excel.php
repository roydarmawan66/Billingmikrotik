<html>
<body>
<?php
session_start();
if(!isset($_SESSION["login"])){
	header("location:index.php");
	exit;
}
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data User.xls");

?>
<div class="card-header">
                            <i class="fa fa-users fa-fw"></i> List Data Users
                        </div>
<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%" border="1">
								<thead>
								  <tr>
									<th>No.</th>
									<th>Full Name</th>
									<th>Address</th>
                                    <th>No HP</th>
									<th>Email</th>
								  </tr>
								</thead>							
								<tbody>
								<?php
include "../controller/config.php";
						$tampil = mysqli_query($mysql, "SELECT * FROM tbl_client WHERE idr = '$_SESSION[idr]' OR id_admin = '$_SESSION[id_admin]' ORDER BY id_client DESC");
						$no=1;
						while ($row = mysqli_fetch_array($tampil)){ ?>
									<tr class="odd gradeX">
									<td><?php echo $no++ ?></td>
									<td><?php echo $row['nm_client']; ?></td>
									<td><?php echo $row['alamat']; ?></td>
									<td><?php echo $row['noHP']; ?></td>
									<td><?php echo $row['email']; ?></td>
									</tr>
						<?php } ?>
									</tbody>
						  </table>
						  </body>
						  </html>
						  