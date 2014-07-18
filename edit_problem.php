<?php
	include '../db_connect.php'; 

	
	$editproblem =  " UPDATE jenisproblem
					  SET klasifikasi = '". $_POST['problem'] ."'
					  WHERE id_jenis_problem = '". $_POST['problemid'] ."'";
	
	
	$result2 = mysql_query($editproblem);

	header("Location:input_problem.php");
?>