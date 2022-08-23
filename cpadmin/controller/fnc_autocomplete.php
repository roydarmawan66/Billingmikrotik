<?php
include "config.php";

$term = trim(strip_tags($_GET['term']));
			$result = mysqli_query($mysql, "SELECT * FROM tbl_customer WHERE no_customer LIKE '%$term%'");
            $array=array();
                while($data=mysqli_fetch_assoc($result)){
					 $row['label']=$data['no_customer'].'-'.$data['nm_customer'];					
					 $row['value']=$data['no_customer'];
					 $row['descripsi']=$data['nm_customer'];
					 array_push($array, $row);
				}
 echo json_encode($array);

?>