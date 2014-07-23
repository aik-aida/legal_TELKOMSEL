<?php
	include '../db_connect.php'; 

	$searchid =  " SELECT *
				   FROM  jenisproblem
				   WHERE id_jenis_problem = '". $_POST['problemid'] ."'";

	$serachids = mysql_query($searchid) or die(mysql_error());
    $a = mysql_fetch_array($serachids);

	
	if($a['id_jenis_problem']!=NULL)
    {
    	header("Location:input_problem.php?idsearch=". $a['id_jenis_problem']);
    }
    
	else
	{
		$status = gagal;
		header("Location:input_problem.php?idsearch=". $status);
	}
	
?>