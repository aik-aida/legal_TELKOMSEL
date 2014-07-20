<?php
	include '../db_connect.php'; 

	$searchid =  " SELECT *
				   FROM  user_legal
				   WHERE userid = '". $_POST['iduser'] ."'";

	$serachids = mysql_query($searchid) or die(mysql_error());
    $a = mysql_fetch_array($serachids);

    //echo $a['site_id'];

    header("Location:user.php?idsearch=". $a['userid']);
	
	
?>