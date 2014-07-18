
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
                            Input Land Document ( Step 2 of 2 )
                        </div>
                        <!-- /.panel-heading -->
                        <?php   
                            if(isset($_GET['id']))
                            {
                                include_once '../db_connect.php';
                                global $legal;
                                global $data;
                                $sql = "select * from legal where site_id='".$_GET['id']."';";
                                $legal = mysql_query($sql) or die(mysql_error());
                                $data = mysql_fetch_array($legal);
                            } 
                            else if(isset($_GET['idsearch']))
                            {
                                include_once '../db_connect.php';
                                global $legal;
                                global $data;
                                $sql = "select * from legal where site_id='".$_GET['idsearch']."';";
                                $legal = mysql_query($sql) or die(mysql_error());
                                $data = mysql_fetch_array($legal);
                            } 

                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <form action="searchid_doc.php" method="post">
                                            <label>Site ID</label>
                                            <table>
                                                <tr>
                                                    <td width = "500">
                                                        <input class="form-control" id="siteid" name="siteid" value=
                                                        <?php 
                                                            if (isset($_GET['id'])) 
                                                                {
                                                                    echo $data['site_id'];
                                                                } 
                                                                else if(isset($_GET['idsearch'])) 
                                                                {
                                                                    echo $data['site_id'];
                                                                } 
                                                            else echo "";?>>                                                        
                                                    </td>
                                                    <td width = "100" >
                                                        <center><input type="submit" value="cari"></center> 
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php
                                                     if(!isset($_GET['id']) && !isset($_GET['idsearch']))
                                                     {
                                                        ?>
                                                        <p class="help-block">Anda harus memasukkan Site ID terlebih dahulu</p><?php } ?>
                                                    </td>
                                                </tr>
                                            </table>
                                            </form>
                                            
                                            <?php 
                                            if(isset($_GET['id']) || isset($_GET['idsearch']))
                                                {?>
                                            <form action="update_land_shm.php" method="post" enctype="multipart/form-data">
                                               
                                                <input style="display:none;"  id="siteid_shm" name="siteid_shm" value=<?php 
                                                            if (isset($_GET['id'])) 
                                                                {
                                                                    echo $data['site_id'];
                                                                } 
                                                            else if(isset($_GET['idsearch'])) 
                                                                {
                                                                    echo $data['site_id'];
                                                                } 
                                                            else echo "";?>> 
                                                <h2>Land Document</h2>
                                                <label for="file"><h4><b>1. Land SHM /PKS</b></h4></label>
                                                <p></p>
                                                <script language="javascript"> 
                                                    function toggle() {
                                                        var ele = document.getElementById("toggleText");
                                                        var text = document.getElementById("displayText");
                                                        if(ele.style.display == "block") {
                                                                ele.style.display = "none";
                                                            text.innerHTML = "Isi Detail Dokumen";
                                                        }
                                                        else {
                                                            ele.style.display = "block";
                                                            text.innerHTML = "Tutup";
                                                            
                                                        }
                                                    } 
                                                </script>
                                                <a id="displayText" href="javascript:toggle();">Isi Detail Dokumen</a>
                                                <ul>
                                                   
                                                    <div id="toggleText" style="display: none">
                                                        <p></p>
                                                        <label>Land Status</label>
                                                        <input class="form-control" id="status" name="status" value=<?php echo $data['land_shm_status']; ?>>
                                                        <p></p>
                                                        <label>SHM/PKS No.</label>
                                                        <input class="form-control" id="no" name="no" value=<?php echo $data['land_shm_no']; ?>>
                                                        <p></p>
                                                        <label>Title Dokumen</label>
                                                        <select class="form-control" id="title" name="title" >
                                                            <option value="Kuitansi" <?php if($data['land_shm_title']=="Kuitansi")
                                                                                                            {echo "selected";} ?> >Kuitansi</option>
                                                            <option value="BAK" <?php if($data['land_shm_title']=="BAK")
                                                                                                            {echo "selected";} ?> >BAK</option>
                                                            <option value="AJB" <?php if($data['land_shm_title']=="AJB")
                                                                                                            {echo "selected";} ?> >AJB</option>
                                                            <option value="PKS" <?php if($data['land_shm_title']=="PKS")
                                                                                                            {echo "selected";} ?> >PKS</option>
                                                            <option value="SHM/SGB" <?php if($data['land_shm_title']=="SHM/SGB")
                                                                                                            {echo "selected";} ?> >SHM/SGB</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Dokumen yang Dimiliki</label>
                                                        <select class="form-control" id="own" name="own">
                                                            <option value="Asli" <?php if($data['land_shm_doc']=="Asli")
                                                                                                            {echo "selected";} ?> >Asli</option>
                                                            <option value="Copy" <?php if($data['land_shm_doc']=="Copy")
                                                                                                            {echo "selected";} ?> >Copy</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Pemegang Dokumen Asli</label>
                                                        <input class="form-control" id="owner" name="owner" value=<?php echo $data['land_shm_owner']; ?>>
                                                        <p></p>
                                                        <label>Valid Period</label>
                                                        <p></p>
                                                        <input id="start" type="date" name="start" value=<?php echo $data['land_shm_valid_start']; ?>>
                                                        <label> until </label>
                                                        <input id="end" type="date" name="end" value=<?php echo $data['land_shm_valid_end']; ?>>
                                                        <p></p>
                                                        <label>Active</label>
                                                        <select class="form-control" id="active" name="active">
                                                            <option value="Yes" <?php if($data['land_shm_active']=="Yes")
                                                                                                            {echo "selected";} ?> >Yes</option>
                                                            <option value="No" <?php if($data['land_shm_active']=="No")
                                                                                                            {echo "selected";} ?> >No</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Upload Berkas</label>
                                                        <p></p>
                                                        <?php if($data['land_shm_path']!=NULL){
                                                            ?> <label><?php echo $data['land_shm_path']; ?></label> <?php }?>
                                                        <input type="file" name="file1" id="file1">
                                                        <p class="help-block" style="font-size: 8pt">File yang disarankan berformat .pdf, .jpg, atau .doc</p>
                                                        <p></p>
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
                                                </ul>
                                            </form>
                                            <form action="update_land_access.php" method="post" enctype="multipart/form-data">
                                                
                                                <input style="display:none;" id="siteid_access" name="siteid_access" value=<?php 
                                                            if (isset($_GET['id'])) 
                                                                {
                                                                    echo $data['site_id'];
                                                                } 
                                                            else if(isset($_GET['idsearch'])) 
                                                                {
                                                                    echo $data['site_id'];
                                                                } 
                                                            else echo "";?>> 
                                                <br><br><br>
                                                <label for="file"><h4><b>2. Land Access SHM / PKS</b></h4></label>
                                                <p></p>
                                                <script language="javascript"> 
                                                    function toggle2() {
                                                        var ele = document.getElementById("toggleText2");
                                                        var text = document.getElementById("displayText2");
                                                        if(ele.style.display == "block") {
                                                                ele.style.display = "none";
                                                            text.innerHTML = "Isi Detail Dokumen";
                                                            text.strong;
                                                        }
                                                        else {
                                                            ele.style.display = "block";
                                                            text.innerHTML = "Tutup";
                                                            
                                                        }
                                                    } 
                                                </script>
                                                <a id="displayText2" href="javascript:toggle2();">Isi Detail Dokumen</a>
                                                <ul>
                                                   
                                                    <div id="toggleText2" style="display: none">
                                                        <p></p>
                                                        <label>SHM/PKS No.</label>
                                                        <input class="form-control" id="no2" name="no2" value=<?php echo $data['land_access_no']; ?>>
                                                        <p></p>
                                                        <label>Title Dokumen</label>
                                                        <select class="form-control" id="title2" name="title2">
                                                            <option value="Kuitansi" <?php if($data['land_access_title']=="Kuitansi")
                                                                                                            {echo "selected";} ?> >Kuitansi</option>
                                                            <option value="BAK" <?php if($data['land_access_title']=="BAK")
                                                                                                            {echo "selected";} ?> >BAK</option>
                                                            <option value="AJB" <?php if($data['land_access_title']=="AJB")
                                                                                                            {echo "selected";} ?> >AJB</option>
                                                            <option value="PKS" <?php if($data['land_access_title']=="PKS")
                                                                                                            {echo "selected";} ?> >PKS</option>
                                                            <option value="SHM/SGB" <?php if($data['land_access_title']=="SHM/SGB")
                                                                                                            {echo "selected";} ?> >SHM/SGB</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Dokumen yang Dimiliki</label>
                                                        <select class="form-control" id="own2" name="own2">
                                                            <option value="Asli" <?php if($data['land_access_doc']=="Asli")
                                                                                                            {echo "selected";} ?> >Asli</option>
                                                            <option value="Copy" <?php if($data['land_access_doc']=="Copy")
                                                                                                            {echo "selected";} ?> >Copy</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Pemegang Dokumen Asli</label>
                                                        <input class="form-control" id="owner2" name="owner2" value=<?php echo $data['land_access_owner']; ?>>
                                                        <p></p>
                                                        <label>Valid Period</label>
                                                        <p></p>
                                                        <input id="start2" type="date" name="start2" value=<?php echo $data['land_access_valid_start']; ?>>
                                                        <label> until </label>
                                                        <input id="end2" type="date" name="end2" value=<?php echo $data['land_access_valid_end']; ?>>
                                                        <p></p>
                                                        <label>Active</label>
                                                        <select class="form-control" id="active2" name="active2">
                                                            <option value="Yes" <?php if($data['land_access_active']=="Yes")
                                                                                                            {echo "selected";} ?> >Yes</option>
                                                            <option value="No" <?php if($data['land_access_active']=="No")
                                                                                                            {echo "selected";} ?> >No</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Upload Berkas</label>
                                                        <p></p>
                                                        <input type="file" name="file2" id="file2">
                                                        <p class="help-block" style="font-size: 8pt">File yang disarankan berformat .pdf, .jpg, atau .doc</p>
                                                        <p></p>
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
                                                </ul>
                                            </form>
                                            <form action="update_land_pajak.php" method="post" enctype="multipart/form-data">
                                                <input style="display:none;" id="siteid_pajak" name="siteid_pajak" value=<?php 
                                                            if (isset($_GET['id'])) 
                                                                {
                                                                    echo $data['site_id'];
                                                                } 
                                                            else if(isset($_GET['idsearch'])) 
                                                                {
                                                                    echo $data['site_id'];
                                                                } 
                                                            else echo "";?>> 
                                                <br><br><br>
                                                <label for="file"><h4><b>3. No. Obyek Pajak</b></h4></label>
                                                <p></p>
                                                <script language="javascript"> 
                                                    function toggle3() {
                                                        var ele = document.getElementById("toggleText3");
                                                        var text = document.getElementById("displayText3");
                                                        if(ele.style.display == "block") {
                                                                ele.style.display = "none";
                                                            text.innerHTML = "Isi Detail Dokumen";
                                                            text.strong;
                                                        }
                                                        else {
                                                            ele.style.display = "block";
                                                            text.innerHTML = "Tutup";
                                                            
                                                        }
                                                    } 
                                                </script>
                                                <a id="displayText3" href="javascript:toggle3();">Isi Detail Dokumen</a>
                                                <ul>
                                                   
                                                    <div id="toggleText3" style="display: none">
                                                        <p></p>
                                                        <label>NOP</label>
                                                        <input class="form-control" id="nop" name="nop" value=<?php echo $data['land_pajak_nop']; ?>>
                                                        <p></p>
                                                        <label>PBB Due Date</label>
                                                        <p></p>
                                                        <input id="pbbdate" type="date" name="pbbdate" value=<?php echo $data['land_pajak_pbb_date']; ?>>
                                                        <p></p>
                                                        <label>PBB Amount</label>
                                                        <input class="form-control" id="pbbamount" name="pbbamount" value=<?php echo $data['land_pajak_pbb_amount']; ?>>
                                                        <p></p>
                                                        <label>Paid Status</label>
                                                        <select class="form-control" id="paidstatus" name="paidstatus" >
                                                            <option value="Yes" <?php if($data['land_pajak_paid_status']=="Yes")
                                                                                                            {echo "selected";} ?> >Yes</option>
                                                            <option value="No" <?php if($data['land_pajak_paid_status']=="No")
                                                                                                            {echo "selected";} ?> >No</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Paid Date</label>
                                                        <p></p>
                                                        <input id="paiddate" type="date" name="paiddate" value=<?php echo $data['land_pajak_paid_date']; ?>>
                                                        <p></p>
                                                        <label>Active</label>
                                                        <select class="form-control" id="active3" name="active3">
                                                            <option value="Yes" <?php if($data['land_pajak_active']=="Yes")
                                                                                                            {echo "selected";} ?> >Yes</option>
                                                            <option value="No" <?php if($data['land_pajak_active']=="No")
                                                                                                            {echo "selected";} ?> >No</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Upload Berkas</label>
                                                        <p></p>
                                                        <input type="file" name="file3" id="file3">
                                                        <p class="help-block" style="font-size: 8pt">File yang disarankan berformat .pdf, .jpg, atau .doc</p>
                                                        <p></p>
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
                                                </ul>
                                                <!--<button type="submit" class="btn btn-primary btn-xs">Submit</button>-->
                                            </form><?php } ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                            
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
