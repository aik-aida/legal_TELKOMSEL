<?php
	//include '../db_connect.php';
	//ini_set("max_execution_time", 0);
	$ln=mysql_connect("localhost","root", "", false, 128); //do not use connection pool (mysql_pconnect) in mysql transaction
	if (!$ln) {
		echo "error connect ";
		exit;
	}
	mysql_select_db("tamara");
	
	$result = " SELECT site_id, SYSDATE(), 
				       (datediff(tgl_akhir_kontrak,SYSDATE()))/30 as selisih_bulan,
				       floor((datediff(tgl_akhir_kontrak,SYSDATE()))/7) as selisih_minggu
			   	from legal";
	$results = mysql_query($result);
	$arr_result = mysql_fetch_array($results);
	$different = $arr_result['selisih_bulan'];
	$different2 = $arr_result['selisih_minggu'];

	$i=1;

	//$to = 'diniputrimandasari@gmail.com';
	//$to1 = 'aris_firman@telkomsel.co.id';
	//$to = 'diniputrimandasari@gmail.com';
	//$to2 = 'aida.muflichah@gmail.com';
	$subjectPusat = 'REMINDER BERAKHIRNYA KONTRAK';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	if($different<=2)
	{
		
		$msg = '<html><body>';
		$msg .= "Yth Bapak/Ibu,<br><br>";
		$msg .= "Berikut kami sampaikan informasi Kontrak / PO yang akan berakhir jangka waktunya : <br>";
		$msg .= '<br><table border = "1" cellspacing="0">' ;
		$msg .= "<tr bgcolor =YELLOW><td width=40><center>No</center></td>
			         <td width=100><center>Site ID</center></td>
			         <td width=100><center>Site Name</center></td>
			         <td width=100><center>Site Region</center></td>
			         <td width=200><center>Nomor Kontrak / PO</center></td>
			 		 <td width=200><center>Jangka Waktu Kontrak</center></td>
			         <td width=100><center>Tanggal Berakhirnya Kontrak</center></td></tr>";

		$ambilid = " SELECT SYSDATE(), site_id, site_area, site_name, site_region, tgl_akhir_kontrak, no_kontrak, 
		                    floor((datediff(tgl_akhir_kontrak,SYSDATE()))/7) as selisih_minggu
			   	     from legal
			   	     where ((datediff(tgl_akhir_kontrak,SYSDATE()))/30 < 2) && ((datediff(tgl_akhir_kontrak,SYSDATE()))/30 > 0)";
		$ambilids = mysql_query($ambilid);
		while($b = mysql_fetch_array($ambilids))
		{
			$msg.="<tr><td width=40><center>".$i."</center></td>
		         	   <td width=100><center>".$b['site_id']."</center></td>
		               <td width=100><center>".$b['site_name']."</center></td>
		               <td width=100><center>".$b['site_region']."</center></td>
		               <td width=100><center>".$b['no_kontrak']."</center></td>
		               <td width=100><center>".$b['selisih_minggu']." minggu</center></td>
		 		       <td width=200><center>".$b['tgl_akhir_kontrak']."</center></td></tr>";
		 	$i++;
		}

		$msg.= '</table>';
		$msg.= "<br>Mohon dapat dilakukan perpanjangan atau penutupan atau hal lainnya ke departemen atau unit terkait.";
		$msg.= "<br>Terima Kasih<br>";
		$msg.='</body></html>';
		$i=1;

		//dicek lagi untuk masalah region code
		/*
		$cekemail = " SELECT email
			          from user_legal
			          where region_code_legal ='".$a[0]."'";
			           	  
		$cekemails = mysql_query($cekemail);

		while($arr_cekemail = mysql_fetch_array($cekemails))
		{
			//echo $cekemails;
			$to = $arr_cekemail[0];
			mail($to, $subjectRegion, $msg, $headers);
				//$to = '';
		}
		//$msg = 'lalalla';
		//$arr_cekemail[0];
		//mail('aris_firman@telkomsel.co.id', $subjectPusat, $msg, $headers);

		//echo $msg;*/
	}


?>