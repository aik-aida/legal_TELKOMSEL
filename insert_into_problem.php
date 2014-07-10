<?php
	include '../db_connect.php'; 

	$result = "SELECT COUNT(*)+1 as idnow FROM jenisproblem";
	$results = mysql_query($result);
	$arr_result = mysql_fetch_array($results);
	//echo $arr_result;


	$insertintoproblem =  "insert into jenisproblem(id_jenis_problem,klasifikasi)
						  values (". $arr_result['idnow'].",'". $_POST['problem'] ."')";
	
	//echo $insertintoproblem;
	$result2 = mysql_query($insertintoproblem);

	header("Location:input_form.php");
?>