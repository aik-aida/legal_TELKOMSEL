<?php
	include '../db_connect.php'; 

	$insertintolegal =  "insert into legal(site_id,site_area,site_region,site_name,site_address,target_tahap1, 
						 target_tahap2, target_tahap3, bapd_tahap1, bapd_tahap2, bapd_tahap3,
						 bast_tahap1, bast_tahap2, bast_tahap3, vendor, harga_pekerjaan,tgl_efektif_kontrak,
						 tgl_akhir_kontrak, subkontraktor, remarks) 
						 values ('". $_POST['siteid'] ."','". $_POST['area'] ."',
						 '". $_POST['regional'] ."','". $_POST['sitename'] ."','". $_POST['siteaddr'] ."',
						 '". $_POST['targetahap1'] ."', '". $_POST['targetahap2'] ."','". $_POST['targetahap3'] ."',
						 '". $_POST['bapdtahap1'] ."','". $_POST['bapdtahap2'] ."', '". $_POST['bapdtahap3'] ."',
						 '". $_POST['basttahap1'] ."','". $_POST['basttahap2'] ."','". $_POST['basttahap3'] ."',
						 '". $_POST['vendor'] ."','". $_POST['harga'] ."','". $_POST['tglefektif'] ."',
						 '". $_POST['tglakhir'] ."', '". $_POST['subkontraktor'] ."','". $_POST['remarks'] ."')";
	
	$result = mysql_query($insertintolegal);


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