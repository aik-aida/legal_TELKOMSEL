<?php
	include '../db_connect.php'; 
	if ($_FILES["file1"]["error"] > 0 && $_FILES["file2"]["error"] > 0 && $_FILES["file3"]["error"] > 0)
	  {
		  echo "Error: " . $_FILES["file1"]["error"] . "<br>";
		  echo "Error: " . $_FILES["file2"]["error"] . "<br>";
		  echo "Error: " . $_FILES["file3"]["error"] . "<br>";
	  }
	else
	  {
	  	  /*echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		  echo "Type: " . $_FILES["file"]["type"] . "<br>";
		  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		  echo "Stored in: " . $_FILES["file"]["tmp_name"];

		  /*echo "Upload: " . $_FILES["file1"]["name"] . "<br>";
		  echo "Type: " . $_FILES["file1"]["type"] . "<br>";
		  echo "Size: " . ($_FILES["file1"]["size"] / 1024) . " kB<br>";
		  echo "Stored in: " . $_FILES["file1"]["tmp_name"];

		  echo "Upload: " . $_FILES["file2"]["name"] . "<br>";
		  echo "Type: " . $_FILES["file2"]["type"] . "<br>";
		  echo "Size: " . ($_FILES["file2"]["size"] / 1024) . " kB<br>";
		  echo "Stored in: " . $_FILES["file2"]["tmp_name"];

		  echo "Upload: " . $_FILES["file3"]["name"] . "<br>";
		  echo "Type: " . $_FILES["file3"]["type"] . "<br>";
		  echo "Size: " . ($_FILES["file3"]["size"] / 1024) . " kB<br>";
		  echo "Stored in: " . $_FILES["file3"]["tmp_name"];*/
	  	  
	  	  $target_path1 = "images/shm/";
		  $target_path1 = $target_path1 . basename( $_FILES['file1']['name']); 
		  $target_path2 = "images/access/";
		  $target_path2 = $target_path2 . basename( $_FILES['file2']['name']); 
		  $target_path3 = "images/pajak/";
		  $target_path3 = $target_path3 . basename( $_FILES['file3']['name']); 

		  if(move_uploaded_file($_FILES['file1']['tmp_name'], $target_path1) && move_uploaded_file($_FILES['file2']['tmp_name'], $target_path2) && move_uploaded_file($_FILES['file3']['tmp_name'], $target_path3)) 
		  {
		  	  $sql="update legal 
		  	  		set land_shm_path = '".$target_path1."',
		  	  			land_shm_status = '". $_POST['status'] ."', 
		  	  			land_shm_no = '". $_POST['no'] ."',
		  	  			land_shm_title = '". $_POST['title'] ."',
		  	  			land_shm_doc = '". $_POST['own'] ."',
		  	  			land_shm_owner = '". $_POST['owner'] ."',
		  	  			land_shm_valid_start = '". $_POST['start'] ."',
		  	  			land_shm_valid_end = '". $_POST['end'] ."',
		  	  			land_shm_active = '". $_POST['active'] ."',
		  	  			land_access_path = '".$target_path2."',
		  	  			land_access_no = '". $_POST['no2'] ."',
		  	  			land_access_title = '". $_POST['title2'] ."',
		  	  			land_access_doc ='". $_POST['own2'] ."',
		  	  			land_access_owner = '". $_POST['owner2'] ."',
		  	  			land_access_valid_start = '". $_POST['start2'] ."',
		  	  			land_access_valid_end = '". $_POST['end2'] ."',
		  	  			land_access_active = '". $_POST['active2'] ."',
		  	  			land_pajak_path = '".$target_path3."',
		  	  			land_pajak_nop =  '". $_POST['nop'] ."',
		  	  			land_pajak_pbb_date = '". $_POST['pbbdate'] ."',
		  	  			land_pajak_pbb_amount = '". $_POST['pbbamount'] ."',
		  	  			land_pajak_paid_status = '". $_POST['paidstatus'] ."',
		  	  			land_pajak_paid_date = '". $_POST['paiddate'] ."',
		  	  			land_pajak_active = '". $_POST['active3'] ."'
					where site_id = '". $_POST['siteid'] ."'";
					
		  	  $result = mysql_query($sql);
		  } 
		  else
		  {
		      echo "There was an error uploading the file, please try again!";
		  }
  }
  //header("Location:javascript://history.go(-1)");
  header("Location:index.php");

 ?>