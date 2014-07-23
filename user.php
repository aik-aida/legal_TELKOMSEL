<?php
    include_once '../db_connect.php';
    $sql = "select * from employee where division = 'Legal and Regulatory'";
    $user = mysql_query($sql) or die(mysql_error());
    $arr_user = array();
?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'header.php'; ?>
</head>

<body>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Management</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Management
                        </div>
                        <!-- /.panel-heading -->
                        <?php
                            if(isset($_GET['idsearch']) && $_GET['idsearch']!='gagal')
                            {
                                include_once '../db_connect.php';
                                global $legal;
                                global $data;
                                $sql = "select * from employee where employee_id=".$_GET['idsearch'].";";
                                $legal = mysql_query($sql) or die(mysql_error());
                                $data = mysql_fetch_array($legal);
                            } 
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel-body">
                                        <div class="table-responsive ">
                                            <h2> Tabel User Legal </h2>
                                            <div class="scrollable scroll-table-y">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-user">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nama</th>
                                                        <th>Departemen</th>
                                                        <th>Divisi</th>
                                                        <th>Email</th>
                                                        <th>No. Handphone</th>
                                                        <th>Area</th>
                                                        <th>Regional</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 10pt" class=>
                                                    <?php
                                                        while($temp = mysql_fetch_array($user)) { ?>
                                                            <tr>
                                                                <td><?php echo $temp['employee_id']; ?></td>
                                                                <td><?php echo $temp['name']; ?></td>
                                                                <td><?php echo $temp['department']; ?></td>
                                                                <td><?php echo $temp['division']; ?></td>
                                                                <td><?php echo $temp['email']; ?></td>
                                                                <td><?php echo $temp['handphone']; ?></td>
                                                                <td><?php 
                                                                          include '../db_connect.php'; 

                                                                          $ambila = "SELECT * FROM area WHERE area_code='".$temp['area_code']."'";  
                                                                          $ambilas = mysql_query($ambila);
                                                                          $temps = mysql_fetch_array($ambilas);

                                                                          echo $temps['area_description'];
                                                                    ?>
                                                                </td>
                                                                <td><?php 
                                                                          include '../db_connect.php'; 

                                                                          $ambilregion = "SELECT * FROM region WHERE region_code='".$temp['region_code']."'";  
                                                                          $regional = mysql_query($ambilregion);
                                                                          $tempss = mysql_fetch_array($regional);

                                                                          echo $tempss['region_description'];
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $temp['enabled']; ?></td>
                                                           </tr>     
                                                    <?php
                                                        } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->

        
        </div>
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
