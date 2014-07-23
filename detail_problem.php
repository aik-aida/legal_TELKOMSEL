<?php
	include_once '../db_connect.php'; 
	global $user_dt;
	global $site_id;

	$site_id = $_GET['id'];
	$user_dt = mysql_query("SELECT * FROM detail_problem d, jenisproblem j WHERE".
			   " d.id_jenis_problem = j.id_jenis_problem".
			   " and  d.site_id='".$site_id."'");

?>
<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></meta>
	  <link rel="stylesheet" href="global.css" type="text/css"></link>
	  <title>Detail Problem <?php echo $site_id; ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
</head>
<body>
				<div class="col-lg-12">
					<div align="right"><a style='color:red'  class='help-block' style='font-size: 6pt; align:right'><b> *Segera Tutup Jendela untuk Kembali ke Aplikasi Legal </b></a></div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<h5><b>
                            Detail Data Problem  SITE ID : <?php echo $site_id; ?>
                            </b></h5>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>Jenis Problem</th>
                                            <th>Deskripsi</th>
                                            <th>PIC</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
	                                    <?php 
	                                    	global $count;
	                                    	$count=1;
	                                    	while($prob = mysql_fetch_array($user_dt)) {
												//print_r($prob);
												//echo "<br />";
											
			                                    if($prob['status_problem']=="Open") {
					                                    echo "<tr class='danger'>";
					                                  }
					                            else if($prob['status_problem']=="Close") {
					                                  	echo "<tr class='info'>";
					                                  }
					                            ?>
			                                        
			                                            <td> <?php echo $count; ?> </td>
			                                            <td> <?php echo $prob['klasifikasi']; ?> </td>
			                                            <td> <?php echo $prob['deskripsi']; ?> </td>
			                                            <td> <?php echo $prob['pic']; ?> </td>
			                                            <td> <?php echo $prob['status_problem']; ?> </td>
			                                        </tr>
			                            <?php $count++;
			                            	} ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
</body>
</html>
