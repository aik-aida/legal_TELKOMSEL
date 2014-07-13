<?php
	include '../db_connect.php'; 

	$updatetolegal =  " UPDATE legal
						SET target_tahap1 = '". $_POST['targetahap1'] ."',
							target_tahap2 = '". $_POST['targetahap2'] ."', 
							target_tahap3 = '". $_POST['targetahap3'] ."', 
							bapd_tahap1 = '". $_POST['bapdtahap1'] ."', 
							bapd_tahap2 = '". $_POST['bapdtahap2'] ."', 
							bapd_tahap3 = '". $_POST['bapdtahap3'] ."',
							bast_tahap1 = '". $_POST['basttahap1'] ."', 
							bast_tahap2 = '". $_POST['basttahap2'] ."', 
							bast_tahap3 = '". $_POST['basttahap3'] ."', 
							vendor = '". $_POST['vendor'] ."', 
							harga_pekerjaan = '". $_POST['harga'] ."',
							tgl_efektif_kontrak = '". $_POST['tglefektif'] ."',
							tgl_akhir_kontrak = '". $_POST['tglakhir'] ."', 
							subkontraktor = '". $_POST['subkontraktor'] ."', 
							remarks = '". $_POST['remarks'] ."'
						WHERE site_id = '". $_POST['siteid'] ."'";
						 
	
	$result = mysql_query($updatetolegal);


	$choose = $_POST['klasifikasiproblem'];
	$deskripsi = $_POST['deskripsi'];
	$pic = $_POST['pic'];
	$count = 0;
	foreach ($choose as $key)
	{
		$insertintodetailproblem =  "insert into detail_problem values('". $_POST['siteid'] ."',
								 	".$choose[$count].",'". $deskripsi[$count] ."','". $pic[$count] ."')";
		$result2 = mysql_query($insertintodetailproblem);
		$count++;

	}

	header("Location:land_document.php");
?>