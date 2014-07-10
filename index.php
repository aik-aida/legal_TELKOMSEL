<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></meta>
  <link rel="shortcut icon" href="images/signal.png"></link>
  <link rel="stylesheet" href="global.css" type="text/css"></link>
  <title>Tamara Application</title>

  <FRAMESET id="main" BORDER=0 rows="15%,*">
    <FRAME NAME="header" src=header.php scrolling=no >
    </FRAME>
    <FRAME NAME="body" scr=dashboard.php scrolling=yes>
    </FRAME>
  </FRAMESET>
</head>

</html>
-->
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></meta>
  <link rel="shortcut icon" href="images/signal.png"></link>
  <link rel="stylesheet" href="global.css" type="text/css"></link>
  <title>Legal Application</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <!--
      <FRAMESET id="main" BORDER=0 rows="15%,*">
      <FRAME NAME="header" src=header.php scrolling=no >
      </FRAME>
    -->
</head>

<?php 
    global $count_insert;
    $count_insert=0;
    if(isset($_POST['dtmaster'])){
        $from_master = $_POST['dtmaster'];
        foreach ($from_master as $siteid) {
            //echo $siteid;
            //echo "<br />";
            include_once '../db_connect.php';
            $sql = "select * from tamara_asset_header where site_id='".$siteid."'";
            $master = mysql_query($sql) or die(mysql_error());
            $temp = mysql_fetch_array($master);

            $sql_check = "select * from legal where site_id='".$siteid."'";
            $check = mysql_query($sql_check) or die(mysql_error());
            $temp_check = mysql_fetch_array($check);

            if($temp_check==NULL) {
                $sql_insert = "insert into legal (site_id, site_area, site_region, site_name, site_address)".
                          " values ('".$temp['site_id']."','".$temp['area']."','".$temp['region']."','".$temp['site_name']."','".$temp['address']."')";
                $insert = mysql_query($sql_insert);
                $count_insert++;
            }
        }
    } 
?>
<body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">LEGAL</a>
            </div>

            <ul class="nav navbar-top-links">
                <li>
                    <a class="dropdown-toggle"  href="index.php">
                        Data Legal
                    </a>
                </li>
                <li>
                    <a class="dropdown-toggle" href="input_legal.php">
                        Input Data Legal
                    </a>
                </li>
                <li>
                    <a class="dropdown-toggle"  href="view_dtmaster.php">
                        Data Master
                    </a>
                </li>
                
            </ul>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Legal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        <?php if(isset($_POST['dtmaster'])){ ?>
            <div class="row" id="keterangan_input">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Info Legal
                        </div>
                        <div class="panel-body">
                            Telah ditambahkan <?php echo $count_insert ?> data baru dari Data Master.
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Data Legal
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <?php   
                                        include_once '../db_connect.php';
                                        global $legal;
                                        $sql = "select * from legal;";
                                        $legal = mysql_query($sql) or die(mysql_error());
                                    ?>
                                    <thead>
                                        <tr>
                                            <th rowspan="2">#</th>
                                            <th rowspan="2">Site ID</th>
                                            <th rowspan="2">Area</th>
                                            <th rowspan="2">Region</th>
                                            <th rowspan="2">Site Name</th>
                                            <th rowspan="2">Site Address</th>
                                            <th rowspan="2">Vendor/Notaris</th>
                                            <th colspan="3">Telkomsel</th>
                                            <th rowspan="2">Vendor</th>
                                        </tr>
                                        <tr>
                                            
                                            <th>Target Tahap 1</th>
                                            <th>Target Tahap 2</th>
                                            <th>Target Tahap 3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            global $count;
                                             $count = 0;
                                            while($temp = mysql_fetch_array($legal)) { 
                                            $count++;?>
                                            <tr>
                                                <td><?php echo $count ?></td>
                                                <td><?php echo $temp['site_id']; ?></td>
                                                <td><?php echo $temp['site_area']; ?></td>
                                                <td><?php echo $temp['site_region']; ?></td>
                                                <td><?php echo $temp['site_name']; ?></td>
                                                <td><?php echo $temp['site_address']; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                           </tr>     
                                        <?php
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
            </div>
            <!-- /.row -->
        </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Forms -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
