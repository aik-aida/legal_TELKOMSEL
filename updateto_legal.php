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

	$countprob = count($_POST['idprob']);
	$choose = $_POST['klasifikasiproblem'];
	$idproblem = $_POST['idprob'];
	$deskripsi = $_POST['deskripsi'];
	$pic = $_POST['pic'];
	$status = $_POST['stproblem'];
	//foreach ($choose as $key)
	for($i=0 ; $i<$countprob ; $i++)
	{
		if(in_array($idproblem[$i],$choose))
		{
			$user_dt = mysql_query("SELECT * FROM detail_problem WHERE site_id='".$_POST['siteid'].
                               		"' and id_jenis_problem=".$idproblem[$i].";");
			$prob = mysql_fetch_array($user_dt);

			if($prob==NULL){
				$insertintodetailproblem =  "insert into detail_problem values('". $_POST['siteid'] ."',
										 	".$idproblem[$i].",'". $deskripsi[$i] ."','". $pic[$i] ."',
										 	'". $status[$i] ."')";
				$result2 = mysql_query($insertintodetailproblem);
				//echo $insertintodetailproblem;
				//echo "<br />";
			}
			else {
				$updateintodetailproblem =  "update detail_problem set deskripsi='". $deskripsi[$i] ."', pic='". $pic[$i] .
											"', status_problem='". $status[$i] ."' where site_id='". $_POST['siteid'] ."' and id_jenis_problem=
										 	".$idproblem[$i].";";
				
				//echo $updateintodetailproblem;
				//echo "<br />";
				/*
				echo $key;
				echo "<br />";
				echo $_POST['siteid'];
				echo "<br />";
				print_r($_POST['klasifikasiproblem']);
				echo "<br />";		
				print_r($deskripsi);
				echo "<br />";
				print_r($pic);
				echo "<br />";
				print_r($status);
				echo "<br />";
				*/
				$result2 = mysql_query($updateintodetailproblem);

			}	
		}
	}
		

	header("Location:land_document.php?id=".$_POST['siteid']);
?>