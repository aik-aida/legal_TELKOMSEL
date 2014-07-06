<?php
    include_once '../db_connect.php';
    $sql = "select * from tamara_asSet_header limit 500;";
    $master = mysql_query($sql) or die(mysql_error());
    $arr_master = array();
    
?>
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
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    
    <!--
      <FRAMESET id="main" BORDER=0 rows="15%,*">
      <FRAME NAME="header" src=header.php scrolling=no >
      </FRAME>
    -->
</head>

<body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">LEGAL</a>
            </div>

            <ul class="nav navbar-top-links">
                <li>
                    <a class="dropdown-toggle"  href="#">
                        Data Legal
                    </a>
                </li>
                <li>
                    <a class="dropdown-toggle" href="#">
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
                    <h1 class="page-header">Data Master</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Data Master
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="scrollable">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-master">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th>Site ID</th>
                                            <th>Site Name</th>
                                            <th>Address</th>
                                            <th>Kecamantan</th>
                                            <th>Kabupaten</th>
                                            <th>Propinsi</th>
                                            <th>Area</th>
                                            <th>Region</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($temp = mysql_fetch_array($master)) { ?>
                                                <tr>
                                                <td><input type="checkbox" name="dtmaster[]" id="dtmaster" value=<?php echo $temp['site_id']; ?> ></td>
                                                <td><?php echo $temp['site_id']; ?></td>
                                                <td><?php echo $temp['site_name']; ?></td>
                                                <td><?php echo $temp['address']; ?></td>
                                                <td><?php echo $temp['kecamatan']; ?></td>
                                                <td><?php echo $temp['kabupaten']; ?></td>
                                                <td><?php echo $temp['propinsi']; ?></td>
                                                <td><?php echo $temp['area']; ?></td>
                                                <td><?php echo $temp['region']; ?></td>
                                                <td><?php echo $temp['asset_status']; ?></td>
                                           </tr>     
                                        <?php
                                            } ?>
                                    </tbody>
                                </table>
                                </div>
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
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-master').dataTable();
    });
    </script>
    <!-- Page-Level Demo Scripts - Forms - Use for reference -->

</body>

</html>
