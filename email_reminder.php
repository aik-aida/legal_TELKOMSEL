<?php
	//include '../db_connect.php';
	$ln=mysql_connect("localhost","root", "", false, 128); //do not use connection pool (mysql_pconnect) in mysql transaction
	if (!$ln) {
		echo "error connect ";
		exit;
	}
	mysql_select_db("tamara");

	$cek = " SELECT target_tahap1, target_tahap2, target_tahap3,
	                bast_tahap1, bast_tahap2, bast_tahap3 
	         from legal ";
	$ceks = mysql_query($cek);
	$arr_cek = mysql_fetch_array($ceks) ;

	$to = 'diniputrimandasari@gmail.com';
	//$to1 = 'aris_firman@telkomsel.co.id';
	//$to2 = 'aida.muflichah@gmail.com';
	
	$i = 1;
	
	$ambilregion = "SELECT DISTINCT site_region FROM legal";
	$ambilregions = mysql_query($ambilregion);

	while($a = mysql_fetch_array($ambilregions))
	{
		$subjectRegion = 'REMINDER PROGRESS TAHAP';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$msg = '';
		$msg = '<html><body>';
		$msg .= "Berikut adalah list site id dan site name beserta tahap yang sedang ditempuh : ";
		$msg .= '<br><table border = "1" cellspacing="0">' ;
		$msg .= "<tr bgcolor =YELLOW><td width=40><center>No</center></td>
			         <td width=100><center>Site ID</center></td>
			         <td width=100><center>Site Name</center></td>
			         <td width=100><center>Site Region</center></td>
			         <td width=100><center>Mitra</center></td>
			 		 <td width=200><center>Tahap yang sedang Ditempuh</center></td></tr>";

		$result = "SELECT target_tahap1, target_tahap2, target_tahap3, SYSDATE(), 
				          datediff(target_tahap1,SYSDATE()) as selisih_hari1,
				          datediff(target_tahap2,SYSDATE()) as selisih_hari2,
				          datediff(target_tahap3,SYSDATE()) as selisih_hari3
			   	   from legal ;";
		$results = mysql_query($result) or die(mysql_error());
		$arr_result = mysql_fetch_array($results);
		$different1 = $arr_result['selisih_hari1'];
		$different2 = $arr_result['selisih_hari2'];
		$different3 = $arr_result['selisih_hari3'];

		$ceknull = " SELECT site_id, site_area, site_name, site_region, vendor 
		           	 from legal 
		           	 where bast_tahap1='0000-00-00' and site_region='".$a[0]."'";
		$ceknulls = mysql_query($ceknull);
		while($arr_ceknull = mysql_fetch_array($ceknulls))
		{
			if($different1<=7)
			{
				$msg.="<tr><td width=40><center>".$i."</center></td>
		         	   <td width=100><center>".$arr_ceknull['site_id']."</center></td>
		               <td width=100><center>".$arr_ceknull['site_name']."</center></td>
		               <td width=100><center>".$arr_ceknull['site_region']."</center></td>
		               <td width=100><center>".$arr_ceknull['vendor']."</center></td>
		 		       <td width=200><center>Tahap 1</center></td></tr>";
		 		$i++;
			}
		}

		$ceknull2 = " SELECT site_id, site_area, site_name, site_region, vendor 
		              from legal 
		              where bast_tahap1!='0000-00-00' and bast_tahap2='0000-00-00' and site_region='".$a[0]."'";
		$ceknulls2 = mysql_query($ceknull2);
		while($arr_ceknull2 = mysql_fetch_array($ceknulls2))
		{
			if($different2<=7)
			{
				$msg.="<tr><td width=40><center>".$i."</center></td>
		         	   <td width=100><center>".$arr_ceknull2['site_id']."</center></td>
		               <td width=100><center>".$arr_ceknull2['site_name']."</center></td>
		               <td width=100><center>".$arr_ceknull2['site_region']."</center></td>
		               <td width=100><center>".$arr_ceknull2['vendor']."</center></td>
		 		       <td width=200><center>Tahap 2</center></td></tr>";
		 		$i++;
		 	}
		}

		$ceknull3 = " SELECT site_id, site_area, site_name, site_region, vendor 
		              from legal 
		              where bast_tahap1!='0000-00-00' and bast_tahap2!='0000-00-00' and bast_tahap3='0000-00-00' and site_region='".$a[0]."'";
		$ceknulls3 = mysql_query($ceknull3);
		while($arr_ceknull3 = mysql_fetch_array($ceknulls3))
		{
			if($different3<=7)
			{
				$msg.="<tr><td width=40><center>".$i."</center></td>
		         	   <td width=100><center>".$arr_ceknull3['site_id']."</center></td>
		               <td width=100><center>".$arr_ceknull3['site_name']."</center></td>
		               <td width=100><center>".$arr_ceknull3['site_region']."</center></td>
		               <td width=100><center>".$arr_ceknull3['vendor']."</center></td>
		 		       <td width=200><center>Tahap 3</center></td></tr>";
		 		$i++;
		 	}
		}

		$msg.= '</table></body></html>';
		$i=1;

		$cekemail = " SELECT emailuser
		           	  from dummy
		           	  where region_code='".$a[0]."'";
		           	  
		$cekemails = mysql_query($cekemail);

		while($arr_cekemail = mysql_fetch_array($cekemails))
		{
			//echo $cekemails;
			$to = $arr_cekemail[0];
			mail($to, $subjectRegion, $msg, $headers);
			//$to = '';
		}

		//echo $msg;
		
	}
	
	
	
		//print_r($b);
		
		/*
		*/
	

	
		
		/*
		while($arr_cek = mysql_fetch_array($ceks))
		{
			
			/*$msg.="	 <tr><td width=40><center>1</center></td>
			         <td width=100><center>".$arr_cek['site_id']."</center></td>
			         <td width=100><center>".$arr_cek['site_name']."</center></td>
			         <td width=100><center>".$arr_cek['vendor']."</center></td>
			 		 <td width=200><center>Tahap 1</center></td></tr>"
			 		 ;
		}*/

		//$arr_cek['site_id'].'\t' . $arr_cek['site_name'].'\t'.$arr_cek['vendor'];
		
	//if($different<=7 && $different>0)
	//{
	//echo $msg;
			//mail($to1, $subjectRegion, $msg, $headers);
			//mail($to, $subjectRegion, $msg, $headers);
			//mail($to2, $subjectRegion, $msg, $headers);
			 
			/*mail(
				 'aris_firman@telkomsel.co.id',
				 'TAMARA REMINDER UDAH PAKE CRONTAB',
				 'Perhatian, kurang '.$different.' hari lagi loooh. Segera upload dokumen! Btw, ini udah pake crontab loooh :p');

			mail(
				 'aida.muflichah@gmail.com',
				 'TAMARA REMINDER UDAH PAKE CRONTAB',
				 'Perhatian, kurang '.$different.' hari lagi loooh. Segera upload dokumen! Btw, ini udah pake crontab loooh :p');*/
	//}
	//}
	//else
		//echo "gagal";
	


?>