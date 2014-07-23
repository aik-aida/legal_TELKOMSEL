<?php
	include '../db_connect.php'; 

	$searchid =  " SELECT *
				   FROM  legal
				   WHERE site_id = '". $_POST['siteid'] ."'";

	$serachids = mysql_query($searchid) or die(mysql_error());
    $a = mysql_fetch_array($serachids);

    if($a['site_id']!=NULL)
    {
    	header("Location:land_document.php?idsearch=". $a['site_id']);
    }
    
	else
	{
		$status = gagal;
		header("Location:land_document.php?idsearch=".$status);
	}

	
?>