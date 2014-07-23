<?php
    include_once '../db_connect.php';

    global $siteid_OK;
    global $reject_id;

    $reject_id = array();

    if(isset($_POST['siteid_main'])) {
        if($_POST['siteid_main']==""){
            $siteid_OK = NULL;
        }
        else {
            $sql = "select site_id, log_added, log_input from legal where site_id='".$_POST['siteid_main']."';";
            $legal = mysql_query($sql) or die(mysql_error());
            $data = mysql_fetch_array($legal);
            
            if($data==NULL)
            {
                $siteid_OK = true;
            }
            else
            {
                $siteid_OK = false;
                $reject_id = $data;
            }    
        }
    }
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
                    <h1 class="page-header">Input Data Legal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Input Data Legal ( Step 1 of 2 )
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                        
                                        <form role="form" action = '<?php echo $_SERVER['PHP_SELF'] ?>' method="POST">
                                            <label>Site ID</label>
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <input class="form-control" id="siteid_main" name="siteid_main" value=<?php if(isset($_POST['siteid_main'])) {
                                                                echo "'".$_POST['siteid_main']."'";
                                                            } ?> >
                                                </div>
                                                <div class="col-lg-2">
                                                    <button type="submit" class="btn btn-success">cari</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <p class="help-block" style="font-size: 8pt">Ex : ADL001</p>
                                                </div>
                                                <div class="col-lg-8" align="right">
                                                    <?php
                                                        if(isset($_POST['siteid_main'])) {
                                                            if($siteid_OK==true) {
                                                                echo "<a style='color:green'  class='help-block' style='font-size: 8pt'><b>SITE ID ini Valid untuk data baru</b>";
                                                            }
                                                            else if($siteid_OK==false && $_POST['siteid_main']!="") {
                                                                echo "<a style='color:red'  class='help-block' style='font-size: 8pt'><b> Data SITE ID ini telah diinput pada ".$reject_id['log_added']." melalui ".$reject_id['log_input']."</b>";
                                                            }
                                                            else if ($siteid_OK==NULL) {
                                                                echo "<a style='color:blue' class='help-block' style='font-size: 8pt'><b>anda harus memasukkan SITE ID baru terlebih dahulu</b>";    
                                                            }
                                                        }
                                                        else {
                                                            echo "<a style='color:blue' class='help-block' style='font-size: 8pt'><b>anda harus memasukkan SITE ID baru terlebih dahulu</b>";
                                                        }
                                                    ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <p></p>
                                        </form>
<?php if($siteid_OK) { ?>
                                        
                                        <form role="form" action = "insert_into_legal.php" method="POST">
                                            <input class="form-control" id="siteid" name="siteid" value=<?php echo "'".$_POST['siteid_main']."'"; ?> style="display:none;">
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
                                            <label>Site Name</label>
                                            <input class="form-control" id="sitename" name="sitename">
                                            <p class="help-block" style="font-size: 8pt">Ex : TUMAWA</p>
                                            <p></p>
                                            <label>Site Address</label>
                                            <textarea class="form-control" rows="5" name="address[]" id="address"></textarea>
                                            <p class="help-block" style="font-size: 8pt">Ex : Jl. BATU </p>
                                            <p></p>
                                            <label>Vendor / Notaris </label>
                                            <input class="form-control" id="vendor" name="vendor">
                                            <p class="help-block" style="font-size: 8pt">Ex : Kiki Faisal</p>
                                            <p></p>                                           
                                            <h2>Land Certification Project Accomplishment</h2>
                                            <label>Target Tahap 1</label>
                                            <p></p>
                                            <input id="targetahap1" type="date" name="targetahap1">
                                            <p></p>
                                            <label>Target Tahap 2</label>
                                            <p></p>
                                            <input id="targetahap2" type="date" name="targetahap2">
                                            <p></p>
                                            <label>Target Tahap 3</label>
                                            <p></p>
                                            <input id="targetahap3" type="date" name="targetahap3">
                                            <p></p>
                                            <p></p>
                                            <h2>BAPD</h2>
                                            <label>Tahap 1</label>
                                            <p></p>
                                            <input id="bapdtahap1" type="date" name="bapdtahap1">
                                            <p></p>
                                            <label>Tahap 2</label>
                                            <p></p>
                                            <input id="bapdtahap2" type="date" name="bapdtahap2">
                                            <p></p>
                                            <label>Tahap 3</label>
                                            <p></p>
                                            <input id="bapdtahap3" type="date" name="bapdtahap3">
                                            <p></p>
                                            <h2>BAST</h2>
                                            <label>Tahap 1</label>
                                            <p></p>
                                            <input id="basttahap1" type="date" name="basttahap1">
                                            <p></p>
                                            <label>Tahap 2</label>
                                            <p></p>
                                            <input id="basttahap2" type="date" name="basttahap2">
                                            <p></p>
                                            <label>Tahap 3</label>
                                            <p></p>
                                            <input id="basttahap3" type="date" name="basttahap3">
                                            <p></p>
                                            </div>
                                            <!--<p class="help-block">Example block-level help text here.</p>-->
                                            <div class="col-lg-6">
                                            <h2>Informasi Kontrak / PO</h2>
                                            <label>No. Kontrak</label>
                                            <input class="form-control" id="no_kontrak" name="no_kontrak">
                                            <p class="help-block" style="font-size: 8pt">Ex : 123</p>
                                            <p></p>                                 
                                            <label>Harga Pekerjaan</label>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="text" class="form-control" id="harga" name="harga">
                                            <span class="input-group-addon">.00</span>
                                            </div>
                                            <p class="help-block" style="font-size: 8pt">Ex : 125000</p>
                                            <p></p>
                                            <label>Tanggal Efektif Kontrak</label>
                                            <p></p>
                                            <input id="tglefektif" type="date" name="tglefektif">
                                            <p></p>
                                            <label>Tanggal Berakhirnya Kontrak</label>
                                            <p></p>
                                            <input id="tglakhir" type="date" name="tglakhir">
                                            <p></p>
                                            <label>Subkontraktor</label>
                                            <input class="form-control" id="subkontraktor" name="subkontraktor">
                                            <p class="help-block" style="font-size: 8pt">Ex : Junaedi Rahman</p>
                                            <p></p>
                                            <label>Remarks</label>
                                            <input class="form-control" id="remarks" name="remarks">
                                            <p class="help-block" style="font-size: 8pt">Ex : YA</p>
                                            <p></p>
                                            <h2>Problem</h2>
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="dataTables-example">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Jenis Case</th>
                                                    <th>Deskripsi</th>
                                                    <th>PIC</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                            <?php  
                                                                include_once '../db_connect.php'; 
                                                                $result = mysql_query("SELECT id_jenis_problem, klasifikasi FROM jenisproblem");

                                                                $result2 = mysql_query("SELECT COUNT(*)+1 as idnow FROM jenisproblem");

                                                                
                                                                
                                                                $temp2 = mysql_fetch_array($result2);
                                                                while($temp = mysql_fetch_array($result)) { ?>
                                                                <tr>
                                                                <td><input type="checkbox" name="klasifikasiproblem[]" id="klasifikasiproblem" value=<?php echo $temp['id_jenis_problem']; ?> ></td>
                                                                <td width="100px"><?php echo $temp['klasifikasi']; ?></td>
                                                                <td>
                                                                    <textarea class="form-control" rows="3" name="deskripsi[]" id="deskripsi" >
                                                                </textarea></td>
                                                                <td><input style="width:100px" type="text" name="pic[]" id="pic" /></td>
                                                                <td width="106px">
                                                                    <select class="form-control" id="stproblem" name="stproblem[]">
                                                                        <option value="Open">Open</option>
                                                                        <option value="Close">Close</option>
                                                                    </select>
                                                                </td>                                                            
                                                           </tr>     
                                                        <?php
                                                            } ?>
                                                </tbody>
                                                <tr></tr>
                                                <tr></tr>
                                                <tr></tr>
                                                </table>
                                                
                                            </div>

                                            <table border = 0 align="right">
                                            
                                                <tr>
                                                    <td align="center" width="100px"><button type="submit" class="btn btn-info btn-circle" ><i class="fa fa-check"></i>
                                                        </button>
                                                        
                                                    </td>
                                                    <td align="center" width="100px">
                                                        <button type="reset" class="btn btn-warning btn-circle"><i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" width="100px">Submit</td>
                                                    <td align="center" width="100px">Reset </td>
                                                </tr>
                                            </table>
                                            </div>
                                            </form>
                                            </div>
                                </div>
                            </div>
                        </div>
<?php } ?>
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
