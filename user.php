<?php
    include_once '../db_connect.php';
    $sql = "select * from user_legal;";
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
                            if(isset($_GET['idsearch']))
                            {
                                include_once '../db_connect.php';
                                global $legal;
                                global $data;
                                $sql = "select * from user_legal where userid=".$_GET['idsearch'].";";
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
                                                                <td><?php echo $temp['userid']; ?></td>
                                                                <td><?php echo $temp['username']; ?></td>
                                                                <td><?php echo $temp['department']; ?></td>
                                                                <td><?php echo $temp['division']; ?></td>
                                                                <td><?php echo $temp['email']; ?></td>
                                                                <td><?php echo $temp['handphone']; ?></td>
                                                                <td><?php 
                                                                          include '../db_connect.php'; 

                                                                          $ambila = "SELECT * FROM area WHERE area_code='".$temp['area_code_legal']."'";  
                                                                          $ambilas = mysql_query($ambila);
                                                                          $temps = mysql_fetch_array($ambilas);

                                                                          echo $temps['area_description'];
                                                                    ?>
                                                                </td>
                                                                <td><?php 
                                                                          include '../db_connect.php'; 

                                                                          $ambilregion = "SELECT * FROM region WHERE region_code='".$temp['region_code_legal']."'";  
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

                                <div class="col-lg-6">
                                    <div class="panel-body">
                                        <form role="form" action = "insert_into_user_legal.php" method="post">
                                            <div class="form-group">
                                                <h2>Tambah User Legal</h2>
                                                <p></p>
                                                <script language="javascript"> 
                                                    function toggle() {
                                                        var ele = document.getElementById("toggleText");
                                                        var text = document.getElementById("displayText");
                                                        if(ele.style.display == "block") {
                                                                ele.style.display = "none";
                                                            text.innerHTML = "Tambah";
                                                        }
                                                        else {
                                                            ele.style.display = "block";
                                                            text.innerHTML = "Tutup";
                                                            
                                                        }
                                                    } 
                                                </script>
                                                <a id="displayText" href="javascript:toggle();">Tambah</a>
                                                <ul>
                                                   
                                                    <div id="toggleText" style="display: none">
                                                        <fieldset disabled>
                                                        <div class="form-group">
                                                            <label for="disabledSelect">ID</label>
                                                            
                                                            <?php  
                                                                        include_once '../db_connect.php'; 
                                                                        $result = mysql_query("SELECT COUNT(*)+1 as idnow FROM user_legal");

                                                                        while($temp = mysql_fetch_array($result)) { ?>
                                                                        <input class="form-control" id="iduser" name="iduser" type="text" placeholder=<?php echo $temp['idnow'];?> 
                                                                <?php
                                                                    } ?>
                                                                    disabled>
                                                        </div>
                                                        </fieldset>
                                                        <label>Nama</label>
                                                        <input class="form-control" id="nama" name="nama">
                                                        <p class="help-block" style="font-size: 8pt">Ex : Kiki Faisal</p>
                                                        <p></p>
                                                        <label>Departemen</label>
                                                        <input class="form-control" id="dept" name="dept">
                                                        <p class="help-block" style="font-size: 8pt">Ex : NOS, Assest Management Database Integrator</p>
                                                        <p></p>
                                                        <label>Divisi</label>
                                                        <input class="form-control" id="div" name="div">
                                                        <p class="help-block" style="font-size: 8pt">Ex : Assest Management</p>
                                                        <p></p>
                                                        <label>Email</label>
                                                        <input class="form-control" id="email" name="email">
                                                        <p class="help-block" style="font-size: 8pt">Ex : kiki@telkomsel.co.id</p>
                                                        <p></p>
                                                        <label>No. Handphone</label>
                                                        <input class="form-control" id="hp" name="hp">
                                                        <p class="help-block" style="font-size: 8pt">Ex : 08123250987</p>
                                                        <p></p>
                                                        <label>Area</label>
                                                        <select class="form-control" id="area" name="area">
                                                            <?php  
                                                                include_once '../db_connect.php'; 
                                                                $sql_area = "select * from area";
                                                                $master = mysql_query($sql_area);
                                                                while($arr_master = mysql_fetch_array($master)) { ?>
                                                                    <option value=<?php echo $arr_master['area_code']; ?>
                                                                            >
                                                                        <?php echo $arr_master['area_description']; ?></option>
                                                                <?php
                                                                        } ?>
                                                        </select>
                                                        <p class="help-block" style="font-size: 8pt">Pilih salah satu dari list yang telah disediakan</p>
                                                        <p></p>
                                                        <label>Regional</label>
                                                        <select class="form-control" id="regional" name="regional">
                                                            <?php  
                                                                include_once '../db_connect.php'; 
                                                                $sql_region = "select * from region";
                                                                $master2 = mysql_query($sql_region);
                                                                while($arr_master2 = mysql_fetch_array($master2)) { ?>
                                                                    <option value=<?php echo $arr_master2['region_code']; ?>
                
                                                                            >
                                                                        <?php echo $arr_master2['region_description']; ?></option>
                                                                <?php
                                                                        } ?>
                                                        </select>
                                                        <p class="help-block" style="font-size: 8pt">Pilih salah satu dari list yang telah disediakan</p>
                                                        <p></p>
                                                        <label>Status</label>
                                                        <input class="form-control" id="status" name="status">
                                                        <p class="help-block" style="font-size: 8pt">Ex : True, False</p>
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
                                                    </ul>
                                                </a>
                                            </div>
                                        </form>
                                        <br><br>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <h2>Edit User Legal</h2>
                                            <p></p>
                                            <label>ID</label>
                                            <form role="form" action = "searchid_user.php" method="post">
                                                <table>
                                                    <tr>
                                                        <td width = "600">
                                                            <input class="form-control" id="iduser" name="iduser" value=
                                                            <?php 
                                                            if (isset($_GET['idsearch'])) 
                                                                {
                                                                    echo $data['userid'];
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
                                                        <p class="help-block">Anda harus memasukkan ID User terlebih dahulu</p><?php } ?>
                                                        </td>
                                                    </tr>

                                                </table>
                                                
                                            </form>

                                        <?php 
                                            if(isset($_GET['idsearch']))
                                            {
                                        ?>
                                                <form role="form" action = "update_user_legal.php" method="post">
                                                    <!--<div class="form-group">-->
                                                        <input style="display:none;"  id="iduser" name="iduser" value=<?php 
                                                            if (isset($_GET['idsearch'])) 
                                                                {
                                                                    echo $data['userid'];
                                                                } 
                                                            else echo "";?>> 
                                                        <script language="javascript"> 
                                                            function toggle2() {
                                                                var ele = document.getElementById("toggleText2");
                                                                var text = document.getElementById("displayText2");
                                                                if(ele.style.display == "block") {
                                                                        ele.style.display = "none";
                                                                    text.innerHTML = "Edit";
                                                                }
                                                                else {
                                                                    ele.style.display = "block";
                                                                    text.innerHTML = "Tutup";
                                                                    
                                                                }
                                                            } 
                                                        </script>
                                                        <br>
                                                        <a id="displayText2" href="javascript:toggle2();">Edit</a>
                                                        <ul>
                                                            <div id="toggleText2" style="display: none">
                                                                <label>Nama</label>
                                                                <input class="form-control" id="nama" name="nama" value=<?php echo $data['username']; ?>>
                                                                <p class="help-block" style="font-size: 8pt">Ex : Kiki Faisal</p>
                                                                <p></p>
                                                                <label>Departemen</label>
                                                                <input class="form-control" id="dept" name="dept" value=<?php echo $data['department']; ?>>
                                                                <p class="help-block" style="font-size: 8pt">Ex : NOS, Assest Management Database Integrator</p>
                                                                <p></p>
                                                                <label>Divisi</label>
                                                                <input class="form-control" id="div" name="div" value=<?php echo $data['division']; ?>>
                                                                <p class="help-block" style="font-size: 8pt">Ex : Assest Management</p>
                                                                <p></p>
                                                                <label>Email</label>
                                                                <input class="form-control" id="email" name="email" value=<?php echo $data['email']; ?>>
                                                                <p class="help-block" style="font-size: 8pt">Ex : kiki@telkomsel.co.id</p>
                                                                <p></p>
                                                                <label>No. Handphone</label>
                                                                <input class="form-control" id="hp" name="hp" value=<?php echo $data['handphone']; ?>>
                                                                <p class="help-block" style="font-size: 8pt">Ex : 08123250987</p>
                                                                <p></p>
                                                                <label>Area</label>
                                                                <select class="form-control" id="area" name="area">
                                                                    <?php  
                                                                        include_once '../db_connect.php'; 
                                                                        $sql_area = "select * from area";
                                                                        $master = mysql_query($sql_area);
                                                                        while($arr_master = mysql_fetch_array($master)) { ?>
                                                                            <option value=<?php echo $arr_master['area_code']; ?>
                                                                                    selected=<?php if($data['area_code_legal']==$arr_master['area_code'])
                                                                                                        {echo "selected";}
                                                                                                    else{echo "";} ?>
                                                                                    >
                                                                                <?php echo $arr_master['area_description']; ?></option>
                                                                    <?php
                                                                            } ?>
                                                                </select>
                                                                <p class="help-block" style="font-size: 8pt">Pilih salah satu dari list yang telah disediakan</p>
                                                                <p></p>
                                                                <label>Regional</label>
                                                                <select class="form-control" id="regional" name="regional">
                                                                  <?php  
                                                                    include_once '../db_connect.php'; 
                                                                    $sql_region = "select * from region";
                                                                    $master2 = mysql_query($sql_region);
                                                                    while($arr_master2 = mysql_fetch_array($master2)) { ?>
                                                                        <option value=<?php echo $arr_master2['region_code']; ?>
                                                                                selected=<?php if($data['region_code_legal']==$arr_master2['region_code'])
                                                                                                    {echo "selected";}
                                                                                                else{echo "";} ?>
                                                                                >
                                                                            <?php echo $arr_master2['region_description']; ?></option>
                                                                    <?php
                                                                            } ?>
                                                                </select>
                                                                <p class="help-block" style="font-size: 8pt">Pilih salah satu dari list yang telah disediakan</p>
                                                                <p></p>
                                                                <label>Status</label>
                                                                <input class="form-control" id="status" name="status" value=<?php echo $data['enabled']; ?> >
                                                                <p class="help-block" style="font-size: 8pt">Ex : True, False</p>
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
                                                        </ul>
                                                    </a>
                                                    </div>
                                                </form>
                                                <!--</form>-->
                                            <?php 
                                                }
                                            ?>
                                        <br><br>
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
