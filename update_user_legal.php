<?php
	include '../db_connect.php'; 

	//$result = "SELECT COUNT(*)+1 as idnow FROM user_legal";
	//$results = mysql_query($result);
	//$arr_result = mysql_fetch_array($results);
	//echo $arr_result;


	$updatetouserlegal = " UPDATE user_legal
						   SET username='". $_POST['nama'] ."',
						       department='". $_POST['dept']."',
						       division='". $_POST['div'] ."',
						       email='". $_POST['email']."',
						       handphone=". $_POST['hp'] .",
						       area_code='". $_POST['area']."',
						       region_code='". $_POST['regional'] ."',
						       enabled='". $_POST['status'] ."'
							WHERE userid = '". $_POST['iduser'] ."'";
	
	//echo $insertintouserlegal;
	$result2 = mysql_query($updatetouserlegal);

	header("Location:user.php");
?>