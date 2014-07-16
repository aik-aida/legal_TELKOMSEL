<?php

	$result = " SELECT date(sysdate()) as now, time(sysdate()) as now2";
	//$result = " SELECT sysdate() as now";
	$results = mysql_query($result);
	$arr_result = mysql_fetch_array($results);

	$dir = "D:/log_trouble";

	if( is_dir($dir) === false )
	{
	    mkdir($dir);
	}

	$myFile='D:/log_trouble/'.$arr_result['now'].'.txt';

	if( is_file($myFile) === true )
	{
		$i = 1;
		do
		{
			$myFile='D:/log_trouble/'.$arr_result['now'].'('.$i.').txt';
			$i++;	
		}
		while(is_file($myFile) === true);
	}

	
	$fh = fopen($myFile, 'w') or die("can't open file");
	$stringData = "Bobby Bopper\n";
	fwrite($fh, $stringData);
	$stringData = "Tracy Tanner\n";
	fwrite($fh, $stringData);
	fclose($fh);

?>