<?php
	include '../db_connect.php'; 

	$result = "SELECT COUNT(*)+1 as idnow FROM user_legal";
	$results = mysql_query($result);
	$arr_result = mysql_fetch_array($results);
	//echo $arr_result;


	$insertintouserlegal = " insert into user_legal(userid,username,department,division,email,handphone,area_code,region_code,enabled)
							 values (". $arr_result['idnow'].",'". $_POST['nama'] ."',
							        '". $_POST['dept']."','". $_POST['div'] ."',
							        '". $_POST['email']."',". $_POST['hp'] .",
							        '". $_POST['area']."','". $_POST['regional'] ."',
							        '". $_POST['status'] ."')";
	
	//echo $insertintouserlegal;
	$result2 = mysql_query($insertintouserlegal);

	header("Location:user.php");
?>