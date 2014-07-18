<?php
	include '../db_connect.php'; 

	$searchid =  " SELECT *
				   FROM  legal
				   WHERE site_id = '". $_POST['siteid'] ."'";

	$serachids = mysql_query($searchid) or die(mysql_error());
    $a = mysql_fetch_array($serachids);

    //echo $a['site_id'];

    header("Location:land_document.php?idsearch=". $a['site_id']);
	
	
?>