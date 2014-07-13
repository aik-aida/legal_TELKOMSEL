<?php
	//include '../db_connect.php';
	$ln=mysql_connect("localhost","root", "", false, 128); //do not use connection pool (mysql_pconnect) in mysql transaction
	if (!$ln) {
		echo "error connect ";
		exit;
	}
	mysql_select_db("tamara");

	$ceknull = "SELECT bast_tahap1 from legal";
	$ceknulls = mysql_query($ceknull);
	$arr_ceknull = mysql_fetch_array($ceknulls) ;

	if($arr_ceknull['bast_tahap1']==NULL)
	{
		$result = "SELECT target_tahap1, SYSDATE(), 
				   datediff(target_tahap1,SYSDATE()) as selisih_hari
			   from legal ;";

		$results = mysql_query($result) or die(mysql_error());
		$arr_result = mysql_fetch_array($results);

		$different = $arr_result['selisih_hari'];
		
		if($different<=14 && $different>0)
		{
			mail(
				 'diniputrimandasari@gmail.com',
				 'TAMARA REMINDER UDAH PAKE CRONTAB',
				 'Perhatian, kurang '.$different.' hari lagi loooh. Segera upload dokumen! Btw, ini udah pake crontab loooh :p');
			 
			mail(
				 'aris_firman@telkomsel.co.id',
				 'TAMARA REMINDER UDAH PAKE CRONTAB',
				 'Perhatian, kurang '.$different.' hari lagi loooh. Segera upload dokumen! Btw, ini udah pake crontab loooh :p');

			mail(
				 'aida.muflichah@gmail.com',
				 'TAMARA REMINDER UDAH PAKE CRONTAB',
				 'Perhatian, kurang '.$different.' hari lagi loooh. Segera upload dokumen! Btw, ini udah pake crontab loooh :p');
		}
	}
	else
		echo "gagal";
	

	/*mail(
	     'aris_firman@telkomsel.co.id',
	     'TESTING TAMARA REMINDER',
	     'Ini adalah percobaan pengiriman email, tapi belom pake crontab loh maas :p');

	mail(
	     'aida.muflichah@gmail.com',
	     'TESTING TAMARA REMINDER',
	     'Ini adalah percobaan pengiriman email, tapi belom pake crontab loh maas :p');*/


?>