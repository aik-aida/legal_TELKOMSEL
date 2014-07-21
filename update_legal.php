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
                        <?php   
                            include_once '../db_connect.php';
                            global $legal;
                            global $data;
                            $sql = "select * from legal where site_id='".$_GET['id']."';";
                            $legal = mysql_query($sql) or die(mysql_error());
                            $data = mysql_fetch_array($legal);
                            //print_r($data);
                                    ?>
                        <?php //echo "<br />".$_GET['id']; ?>
                        <!-- /.panel-heading -->
                        <form role="form" action = "updateto_legal.php?id=".<?php echo $data['site_id']; ?> method="POST">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control" id="siteid" name="siteid"
                                                value=<?php echo "'".$data['site_id']."'"; ?> >
                                                <p class="help-block" style="font-size: 8pt">Ex : ADL001</p>
                                            <p></p>
                                            <label>Area</label>
                                            <select class="form-control" id="area" name="area">
                                                <?php  
                                                include_once '../db_connect.php'; 
                                                $sql_area = "select * from area";
                                                $master = mysql_query($sql_area);
                                                while($arr_master = mysql_fetch_array($master)) { 
                                                        echo $arr_master['area_code']."---".$data['site_area'];
                                                    ?>

                                                    <option value=<?php echo $arr_master['area_code']; ?> 
                                                            <?php if($data['site_area']==$arr_master['area_code'])
                                                                                {echo "selected='selected'";} ?>
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
                                                            <?php if($data['site_region']==$arr_master2['region_code'])
                                                                                {echo "selected='selected'";}?>
                                                            >
                                                        <?php echo $arr_master2['region_description']; ?></option>
                                                <?php
                                                        } ?>
                                            </select>
                                            <p class="help-block" style="font-size: 8pt">Pilih salah satu dari list yang telah disediakan</p>
                                            <p></p>
                                            <label>Site Name</label>
                                            <input class="form-control" id="sitename" name="sitename"
                                                    value=<?php echo $data['site_name']; ?> >
                                            <p class="help-block" style="font-size: 8pt">Ex : TUMAWA</p>
                                            <p></p>
                                            <label>Site Address</label>
                                            <textarea class="form-control" rows="5" name="address[]" id="address">
                                                    <?php echo $data['site_address']; ?></textarea>
                                            <p class="help-block" style="font-size: 8pt">Ex : Jl. BATU </p>
                                            <p></p>
                                            <label>Vendor / Notaris </label>
                                            <input class="form-control" id="vendor" name="vendor"
                                                    value=<?php echo "'".$data['vendor']."'"; ?> >
                                            <p class="help-block" style="font-size: 8pt">Ex : Kiki Faisal</p>
                                            <p></p>                                           
                                            <h2>Land Certification Project Accomplishment</h2>
                                            <label>Target Tahap 1</label>
                                            <p></p>
                                            <input id="targetahap1" type="date" name="targetahap1"
                                                    value=<?php echo $data['target_tahap1']; ?> >
                                            <p></p>
                                            <label>Target Tahap 2</label>
                                            <p></p>
                                            <input id="targetahap2" type="date" name="targetahap2"
                                                    value=<?php echo $data['target_tahap2']; ?> >
                                            <p></p>
                                            <label>Target Tahap 3</label>
                                            <p></p>
                                            <input id="targetahap3" type="date" name="targetahap3"
                                                    value=<?php echo $data['target_tahap3']; ?> >
                                            <p></p>
                                            <p></p>
                                            <h2>BAPD</h2>
                                            <label>Tahap 1</label>
                                            <p></p>
                                            <input id="bapdtahap1" type="date" name="bapdtahap1"
                                                    value=<?php echo $data['bapd_tahap1']; ?> >
                                            <p></p>
                                            <label>Tahap 2</label>
                                            <p></p>
                                            <input id="bapdtahap2" type="date" name="bapdtahap2"
                                                    value=<?php echo $data['bapd_tahap2']; ?> >
                                            <p></p>
                                            <label>Tahap 3</label>
                                            <p></p>
                                            <input id="bapdtahap3" type="date" name="bapdtahap3"
                                                    value=<?php echo $data['bapd_tahap3']; ?> >
                                            <p></p>
                                            <h2>BAST</h2>
                                            <label>Tahap 1</label>
                                            <p></p>
                                            <input id="basttahap1" type="date" name="basttahap1"
                                                    value=<?php echo $data['bast_tahap1']; ?> >
                                            <p></p>
                                            <label>Tahap 2</label>
                                            <p></p>
                                            <input id="basttahap2" type="date" name="basttahap2"
                                                    value=<?php echo $data['bast_tahap2']; ?> >
                                            <p></p>
                                            <label>Tahap 3</label>
                                            <p></p>
                                            <input id="basttahap3" type="date" name="basttahap3"
                                                    value=<?php echo $data['bast_tahap3']; ?> >
                                            <p></p>
                                                                                        
                                            <!--<p class="help-block">Example block-level help text here.</p>-->
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                    <form role="form" action="updateto_legal.php?id=".<?php echo $data['site_id']; ?> method="POST">
                                        <div class="form-group">
                                            
                                            <h2>Informasi Kontrak / PO</h2>
                                            <label>No. Kontrak</label>
                                            <input class="form-control" id="no_kontrak" name="no_kontrak" 
                                                    value=<?php echo $data['no_kontrak']; ?>>
                                            <p class="help-block" style="font-size: 8pt">Ex : 123</p>
                                            <p></p>                                             
                                            <label>Harga Pekerjaan</label>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="text" class="form-control" id="harga" name="harga"
                                                    value=<?php echo $data['harga_pekerjaan']; ?> >
                                            <span class="input-group-addon">.00</span>
                                            </div>
                                            <p class="help-block" style="font-size: 8pt">Ex : 125000</p>
                                            <p></p>
                                            <label>Tanggal Efektif Kontrak</label>
                                            <p></p>
                                            <input id="tglefektif" type="date" name="tglefektif"
                                                    value=<?php echo $data['tgl_efektif_kontrak']; ?> >
                                            <p></p>
                                            <label>Tanggal Berakhirnya Kontrak</label>
                                            <p></p>
                                            <input id="tglakhir" type="date" name="tglakhir"
                                                    value=<?php echo $data['tgl_akhir_kontrak']; ?> >
                                            <p></p>
                                            <label>Subkontraktor</label>
                                            <input class="form-control" id="subkontraktor" name="subkontraktor"
                                                    value=<?php echo $data['subkontraktor']; ?> >
                                            <p class="help-block" style="font-size: 8pt">Ex : Junaedi Rahman</p>
                                            <p></p>
                                            <label>Remarks</label>
                                            <input class="form-control" id="remarks" name="remarks"
                                                    value=<?php echo $data['remarks']; ?> >
                                            <p class="help-block" style="font-size: 8pt">Ex : YA</p>
                                            <p></p>
                                            <h2>Problem</h2>
                                        </div>
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
                                                            $user_dt = mysql_query("SELECT * FROM detail_problem WHERE site_id='".$data['site_id']."';");

                                                            $user_problem = array();

                                                            while ($prob = mysql_fetch_array($user_dt)) {
                                                                array_push($user_problem, $prob);
                                                            }

                                                            while($temp = mysql_fetch_array($result)) { 
                                                                if($user_problem==NULL){ ?>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="klasifikasiproblem[]" id="klasifikasiproblem"></td>
                                                                        <td><?php echo $temp['klasifikasi']; ?></td>
                                                                        <td>
                                                                            <textarea class="form-control" rows="3" name="deskripsi[]" id="deskripsi" >
                                                                        </textarea></td>
                                                                        <td><input style="width:100px" type="text" name="pic[]" id="pic" ></td>
                                                                        <td width="106px">
                                                                            <select class="form-control" id="stproblem" name="stproblem[]">
                                                                                <option value="Open" >Open</option>
                                                                                <option value="Close"  >Close</option>
                                                                            </select>
                                                                        </td>                                                            
                                                                    </tr>
                                                        <?php   }
                                                                else {
                                                                foreach ($user_problem as $usprob) {
                                                                    ?>
                                                                    
                                                                    <tr>
                                                                        <td><input type="checkbox" name="klasifikasiproblem[]" id="klasifikasiproblem" value=<?php echo $temp['id_jenis_problem']; ?> 
                                                                                <?php if($usprob['id_jenis_problem']==$temp['id_jenis_problem']){echo "checked";} ?> ></td>
                                                                        <td><?php echo $temp['klasifikasi']; ?></td>
                                                                        <td>
                                                                            <textarea class="form-control" rows="3" name="deskripsi[]" id="deskripsi" >
                                                                             <?php if($usprob['id_jenis_problem']==$temp['id_jenis_problem']){echo $usprob['deskripsi'];} ?>
                                                                        </textarea></td>
                                                                        <td><input style="width:100px" type="text" name="pic[]" id="pic" 
                                                                                value=<?php if($usprob['id_jenis_problem']==$temp['id_jenis_problem']){echo $usprob['pic'];}?> ></td>
                                                                        <td width="106px">
                                                                            <select class="form-control" id="stproblem" name="stproblem[]">
                                                                                <option value="Open" <?php if($usprob['id_jenis_problem']==$temp['id_jenis_problem'] && $usprob['status_problem']=="Open")
                                                                                                            {echo "selected";} ?> >Open</option>
                                                                                <option value="Close" <?php if($usprob['id_jenis_problem']==$temp['id_jenis_problem'] && $usprob['status_problem']=="Close")
                                                                                                            {echo "selected";} ?> >Close</option>
                                                                            </select>
                                                                        </td>                                                            
                                                                    </tr>     
                                                    <?php           }
                                                                }
                                                            } ?>
                                            </tbody>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            
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
                                
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        </form>
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
