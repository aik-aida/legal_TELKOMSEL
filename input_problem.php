<?php
    include_once '../db_connect.php';
    $sql = "select * from jenisproblem;";
    $master = mysql_query($sql) or die(mysql_error());
    $arr_master = array();
    
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
                    <h1 class="page-header">Input Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Problem Management
                        </div>
                        <?php
                            if(isset($_GET['idsearch']) && $_GET['idsearch']!='gagal')
                            {
                                include_once '../db_connect.php';
                                global $legal;
                                global $data;
                                $sql = "select * from jenisproblem where id_jenis_problem=".$_GET['idsearch'].";";
                                $legal = mysql_query($sql) or die(mysql_error());
                                $data = mysql_fetch_array($legal);
                            } 
                        ?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action = "insert_into_problem.php" method="post">
                                        <div class="form-group">
                                            <h2>Tambah Klasifikasi Problem</h2>
                                            <p></p>
                                            <fieldset disabled>
                                            <div class="form-group">
                                                <label for="disabledSelect">ID</label>
                                                
                                                <?php  
                                                            include_once '../db_connect.php'; 
                                                            $result = mysql_query("SELECT COUNT(*)+1 as idnow FROM jenisproblem");

                                                            while($temp = mysql_fetch_array($result)) { ?>
                                                            <input class="form-control" id="idproblem" name="idproblem" type="text" placeholder=<?php echo $temp['idnow'];?> 
                                                    <?php
                                                        } ?>
                                                        disabled>
                                            </div>
                                            </fieldset>
                                            <label>Jenis Problem</label>
                                            <input class="form-control" id="problem" name="problem">
                                            <p></p>
                                             <table border = 0 align="right"><br>
                                        
                                            <tr>
                                                <td align="center" width="70px"><button type="submit" class="btn btn-info btn-circle"><i class="fa fa-check"></i>
                                                    </button>
                                                    
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td align="center" width="70px">Submit</td>
                                                
                                            </tr>

                                        </table>
                                        </div>
                                    </form>
                                    <br><br>

                                    
                                        <div class="form-group">
                                            <h2>Edit Klasifikasi Problem</h2>
                                            <p></p>
                                            <label>ID Problem</label>
                                            <form role="form" action = "searchid_problem.php" method="post">
                                                <table>
                                                    <tr>
                                                        <td width = "600">
                                                            <input class="form-control" id="problemid" name="problemid" value=
                                                             <?php 
                                                            if (isset($_GET['idsearch']) && $_GET['idsearch']!='gagal') 
                                                                {
                                                                    echo $data['id_jenis_problem'];
                                                                } 
                                                            else echo "";?>>
                                                        </td>
                                                        <td width = "100">
                                                            <center><input type="submit" value="cari"></center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                                 if(!isset($_GET['idsearch']))
                                                                 {
                                                                    ?>
                                                                    <p class="help-block">Anda harus memasukkan ID Problem terlebih dahulu</p><?php } 
                                                                    else if($_GET['idsearch']=='gagal')
                                                                    {
                                                                    ?>
                                                                    <p class="help-block">ID yang Anda masukkan belum terdaftar!</p><?php } ?>
                                                         </td>
                                                    </tr>

                                                </table>
                                            </form>
                                            <?php 
                                                if(isset($_GET['idsearch']) && $_GET['idsearch']!='gagal')
                                                { ?>

                                            <form role="form" action = "edit_problem.php" method="post">
                                                <input style="display:none;"  id="problemid" name="problemid" value=<?php 
                                                            if (isset($_GET['idsearch'])) 
                                                                {
                                                                    echo "'".$data['id_jenis_problem']."'";
                                                                } 
                                                            else echo "";?> > 
                                            <br>
                                            <label>Jenis Problem</label>
                                            <input class="form-control" id="problem" name="problem" value=<?php echo "'".$data['klasifikasi']."'"; ?>>
                                            <p></p>
                                             <table border = 0 align="right"><br>
                                                <tr>
                                                    <td align="center" width="70px"><button type="submit" class="btn btn-info btn-circle"><i class="fa fa-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" width="70px">Edit</td>
                                                </tr>
                                            </table>
                                            </form>
                                            <?php } ?>
                                        </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <div class="scrollable">
                                            <h2> Tabel Problem </h2>
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-master">
                                                <thead>
                                                    <tr>
                                                        <th width="100">ID Problem</th>
                                                        <th>Klasifikasi Problem</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 10pt">
                                                    <?php
                                                        while($temp = mysql_fetch_array($master)) { ?>
                                                            <tr>
                                                            <!--<td><input type="checkbox" name="dtmaster[]" id="dtmaster" value=<?php echo $temp['site_id']; ?> ></td>-->
                                                            <td><?php echo $temp['id_jenis_problem']; ?></td>
                                                            <td><?php echo $temp['klasifikasi']; ?></td>
                                                            
                                                       </tr>     
                                                    <?php
                                                        } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel-body -->
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
