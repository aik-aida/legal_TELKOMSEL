<?php
	include '../db_connect.php'; 

	$insertintolegal =  "insert into legal(site_id,site_area,site_region,site_name,site_address,target_tahap1, 
						 target_tahap2, target_tahap3, bapd_tahap1, bapd_tahap2, bapd_tahap3,
						 bast_tahap1, bast_tahap2, bast_tahap3, vendor, no_kontrak, harga_pekerjaan,tgl_efektif_kontrak,
						 tgl_akhir_kontrak, subkontraktor, remarks, log_added, log_input) 
						 values ('". $_POST['siteid'] ."','". $_POST['area'] ."',
						 '". $_POST['regional'] ."','". $_POST['sitename'] ."','". $_POST['siteaddr'] ."',
						 '". $_POST['targetahap1'] ."', '". $_POST['targetahap2'] ."','". $_POST['targetahap3'] ."',
						 '". $_POST['bapdtahap1'] ."','". $_POST['bapdtahap2'] ."', '". $_POST['bapdtahap3'] ."',
						 '". $_POST['basttahap1'] ."','". $_POST['basttahap2'] ."','". $_POST['basttahap3'] ."',
						 '". $_POST['vendor'] ."','". $_POST['no_kontrak'] ."','". $_POST['harga'] ."','". $_POST['tglefektif'] ."',
						 '". $_POST['tglakhir'] ."', '". $_POST['subkontraktor'] ."','". $_POST['remarks'] ."',SYSDATE(),'USER')";
	
	$result = mysql_query($insertintolegal);

	$countproblem = count($_POST['idprob']);
	$choose = $_POST['klasifikasiproblem'];
	$idproblem = $_POST['idprob'];
	$deskripsi = $_POST['deskripsi'];
	$pic = $_POST['pic'];
	$status = $_POST['stproblem'];
	

	for($i=0 ; $i<$countproblem ; $i++)
	{
		if(in_array($idproblem[$i],$choose))
		{
			$insertintodetailproblem =  "insert into detail_problem values('". $_POST['siteid'] ."',
								 		".$idproblem[$i].",'". $deskripsi[$i] ."','". $pic[$i] ."',
									 	'". $status[$i] ."')";
			$result2 = mysql_query($insertintodetailproblem);
			//echo $insertintodetailproblem;
		}
	}
	

	header("Location:land_document.php");
?>