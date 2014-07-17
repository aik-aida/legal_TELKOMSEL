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
							remarks = '". $_POST['remarks'] ."',
							no_kontrak = '". $_POST['no_kontrak'] ."'
						WHERE site_id = '". $_POST['siteid'] ."'";
						 
	
	$result = mysql_query($updatetolegal);


	$choose = $_POST['klasifikasiproblem'];
	$deskripsi = $_POST['deskripsi'];
	$pic = $_POST['pic'];
	$status = $_POST['stproblem'];
	$count = 0;
	foreach ($choose as $key)
	{
		$updateintodetailproblem =  "update detail_problem set deskripsi='". $deskripsi[$count] ."', pic='". $pic[$count] .
									"', status_problem='". $status[$count] ."' where site_id='". $_POST['siteid'] ."' and id_jenis_problem=
								 	".$choose[$count].";";
		echo $updateintodetailproblem;
		echo "<br />";
		$result2 = mysql_query($updateintodetailproblem);
		$count++;

	}

	header("Location:land_document.php");
?>