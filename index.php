<?php
    global $count_delete;
    global $site_deleted;
    $count_delete=0;
    $site_deleted="";
    if(isset($_POST['del'])){        
        $from_master = $_POST['del'];
        foreach ($from_master as $siteid) {
            
            include_once '../db_connect.php';
            
            $sql_check = "delete from legal where site_id='".$siteid."'";
            $check = mysql_query($sql_check);
            
            $site_deleted.=$siteid." , ";

            $count_delete++;
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
                    <h1 class="page-header">Data Legal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php if(isset($_POST['del'])){ ?>
                <div class="row" id="keterangan_input">
                    <div class="col-lg-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                Info Legal
                            </div>
                            <div class="panel-body">
                                Telah TERHAPUS <?php echo $count_delete; ?> data  dari Data Legal, dengan SITE ID :
                                <?php echo $site_deleted; ?>
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
                            <div class="table-responsive scroll-table">
                                <form method="post" action='<?php echo $_SERVER['PHP_SELF'] ?>'>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <?php   
                                        include_once '../db_connect.php';
                                        global $legal;
                                        $sql = "select * from legal;";
                                        $legal = mysql_query($sql) or die(mysql_error());
                                    ?>
                                    <thead>
                                        <tr>
                                            <th><button type="submit" class="btn btn-warning btn-circle" style="font-size: 7pt">
                                                            <i class="fa fa-times"></i>
                                                            </button><br /><label style="font-size: 6pt"><b>hapus</b></label></th>
                                            <th>#</th>
                                            <th>Tanggal Penambahan</th>
                                            <th>Site ID</th>
                                            <th>Area</th>
                                            <th>Region</th>
                                            <th>Site Name</th>
                                            <th>Site Address</th>
                                            <th>Vendor/ Notaris</th>
                                            <th>BAST Tahap 1</th>
                                            <th>BAST Tahap 2</th>
                                            <th>BAST Tahap 3</th>
                                            <th>Status Problem</th>
                                            <th>detail</th>
                                            <th style="display:none;"></th>
                                            <th style="display:none;">BAPD Tahap 1</th>
                                            <th style="display:none;">BAPD Tahap 2</th>
                                            <th style="display:none;">BAPD Tahap 3</th>
                                            <th style="display:none;">Telkomsel Target Tahap 1</th>
                                            <th style="display:none;">Telkomsel Target Tahap 2</th>
                                            <th style="display:none;">Telkomsel Target Tahap 3</th>
                                            <th style="display:none;">Harga Pekerjaan</th>
                                            <th style="display:none;">Tanggal Efektif Kontrak</th>
                                            <th style="display:none;">Tanggal AKhir Kontrak</th>
                                            <th style="display:none;">Sub Kontraktor</th>
                                            <th style="display:none;">Remarks</th>
                                            <th style="display:none;">Dokumen 1</th>
                                            <th style="display:none;">Dokumen 2</th>
                                            <th style="display:none;">Dokumen 3</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 7pt">
                                        <?php
                                            global $count;
                                             $count = 0;
                                            while($temp = mysql_fetch_array($legal)) { 
                                            $count++;?>
                                            <tr ><font size=1>
                                                <td><input type="checkbox" name="del[]" id="del" value=<?php echo $temp['site_id']; ?> ></td>
                                                <td><?php echo $count ?></td>
                                                <td><?php echo $temp['log_added']; ?></td>
                                                <td style="color: #0000FF;" id="site_id">
                                                    <a href=<?php echo "update_legal.php?id=".$temp['site_id']; ?>>
                                                    <?php echo $temp['site_id']; ?></a></font></td>
                                                <td><?php echo $temp['site_area']; ?></td>
                                                <td><?php echo $temp['site_region']; ?></td>
                                                <td><?php echo $temp['site_name']; ?></td>
                                                <td><?php echo $temp['site_address']; ?></td>
                                                <td><?php echo $temp['vendor']; ?></td>
                                                <td><?php echo $temp['bast_tahap1']; ?></td>
                                                <td><?php echo $temp['bast_tahap2']; ?></td>
                                                <td><?php echo $temp['bast_tahap3']; ?></td>
                                                <?php
                                                    include_once '../db_connect.php';
                                                    global $legal;
                                                    global $stat;
                                                    $sql = "select * from detail_problem where site_id='".$temp['site_id']."';";
                                                    $problem = mysql_query($sql) or die(mysql_error());
                                                    $stat="Close";
                                                    while($prob = mysql_fetch_array($problem)) {
                                                        if($prob['status_problem']=="Open"){
                                                            $stat="Open";
                                                            break;
                                                        }
                                                    }
                                                    echo "<td>".$stat."</td>";
                                                ?>
                                                <td data-toggle="modal" data-target="#smallModal"  class="id-detail-modal"><a href="#" class="btn btn-xs btn-success"  style="font-size: 7pt">detail</a></td>
                                                <!-- aida -->
                                                <!-- nambahin class="hidden-dulu" -->
                                                <td id="siteid" style="display:none;" class="hidden-dulu">
                                                    <a href=<?php echo "update_legal.php?id=".$temp['site_id']; ?>>
                                                    <?php echo $temp['site_id']; ?></a></font></td>
												<td id="bapd_tahap1"  style="display:none;" class="hidden-dulu"><?php echo $temp['bapd_tahap1']; ?></td>
                                                <td id="bapd_tahap2"  style="display:none;" class="hidden-dulu"><?php echo $temp['bapd_tahap2']; ?></td>
                                                <td id="bapd_tahap3"  style="display:none;" class="hidden-dulu"><?php echo $temp['bapd_tahap3']; ?></td>
                                                <td id="target_tahap1"  style="display:none;" class="hidden-dulu"><?php echo $temp['target_tahap1']; ?></td>
                                                <td id="target_tahap2"  style="display:none;" class="hidden-dulu"><?php echo $temp['target_tahap2']; ?></td>
                                                <td id="target_tahap3"  style="display:none;" class="hidden-dulu"><?php echo $temp['target_tahap3']; ?></td>
                                                <td id="harga_pekerjaan"  style="display:none;" class="hidden-dulu"><?php echo $temp['harga_pekerjaan']; ?></td>
                                                <td id="tgl_efektif_kontrak"  style="display:none;" class="hidden-dulu"><?php echo $temp['tgl_efektif_kontrak']; ?></td>
                                                <td id="tgl_akhir_kontrak"  style="display:none;" class="hidden-dulu"><?php echo $temp['tgl_akhir_kontrak']; ?></td>
                                                <td id="subkontraktor"  style="display:none;" class="hidden-dulu"><?php echo $temp['subkontraktor']; ?></td>
                                                <td id="remarks"  style="display:none;" class="hidden-dulu"><?php echo $temp['remarks']; ?></td>
                                                <td id="land_shm_path"  style="display:none;" class="hidden-dulu"><?php echo $temp['land_shm_path']; ?></td>
                                                <td id="land_access_path"  style="display:none;" class="hidden-dulu"><?php echo $temp['land_access_path']; ?></td>
                                                <td id="land_pajak_path"  style="display:none;" class="hidden-dulu"><?php echo $temp['land_pajak_path']; ?></td>
												<!-- aida -->
                                                </font>
                                           </tr>     
                                        <?php
                                            } ?>
                                    </tbody>
                                </table>
                                </form>
                                <form method="post" action="save_to_excel.php">
                                    <table align="right">
                                        <tr>
                                            <td> 
                                                <center><input type="image" src="submit.png" width="34" height="34"></center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width ="100"><font size=1><center> 
                                                Save to Excel</center></font>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
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
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" ><b>Detail Informasi</b></h4>
                </div>
                <div id="detailLegal" class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th colspan="3"><div class="modal-id"></div></th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 7pt">
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>TELKOMSEL Target Tahap 1</b></td>
                                                    <td><div class="target1"></div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>TELKOMSEL Target Tahap 2</b></td>
                                                    <td><div class="target2"></div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>TELKOMSEL Target Tahap 3</b></td>
                                                    <td><div class="target3"><div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>BAPD Tahap 1</b></td>
                                                    <td><div class="bapd1"></div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>BAPD Tahap 2</b></td>
                                                    <td><div class="bapd2"></div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>BAPD Tahap 3</b></td>
                                                    <td><div class="bapd3"><div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>Harga Pekerjaan</b></td>
                                                    <td><div class="harga"></div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>Tanggal Efektif Kontrak</b></td>
                                                    <td><div class="awal"></div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>Tanggal Akhir Kontrak</b></td>
                                                    <td><div class="akhir"><div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>Subkontraktor</b></td>
                                                    <td><div class="sub"></div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>Remarks</b></td>
                                                    <td><div class="rem"></div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>Dokumen Land SHM/PKS</b></td>
                                                    <td><div class="doc1"><div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>Dokumen Land Access SHM/PKS</b></td>
                                                    <td><div class="doc2"><div></td>
                                                </tr>
                                                <tr>
                                                    <td><b>*</b></td>
                                                    <td><b>Dokumen No. Objek Pajak</b></td>
                                                    <td><div class="doc3"><div></td>
                                                </tr>
												<!-- aida -->
												<tr>
                                                    <td><b>*</b></td>
                                                    <td><b>Dokumen No. Objek Pajak</b></td>
                                                    <td><div class="doc3"><div></td>
                                                </tr>
												<!-- aida -->
                                            </tbody>
                                        </table>
                                </div>
                        </div>
                </div>
                <!--
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                -->
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.id-detail-modal').click(function(){
				// aida
				var parent = $(this).parent();
				// aida
                var modal = document.getElementById('smallModal');
                /*
                var title = document.getElementById('modal-id');
                var siteid = $(this).find('#site_id').html();
                $(modal).find('.modal-id').html("<h5><b>"+siteid+"</b></h5>");
				*/
				// aida
                var siteid = $(parent).find('#siteid').html();
                var target1 = $(parent).find('#target_tahap1').html();
                var target2 = $(parent).find('#target_tahap2').html();
                var target3 = $(parent).find('#target_tahap3').html();
                var bapd1 = $(parent).find('#bapd_tahap1').html();
                var bapd2 = $(parent).find('#bapd_tahap2').html();
                var bapd3 = $(parent).find('#bapd_tahap3').html();
                var harga = $(parent).find('#harga_pekerjaan').html();
                var awal = $(parent).find('#tgl_efektif_kontrak').html();
                var akhir = $(parent).find('#tgl_akhir_kontrak').html();
                var sub = $(parent).find('#subkontraktor').html();
                var rem = $(parent).find('#remarks').html();
                var doc1 = $(parent).find('#land_shm_path').html();
                var doc2 = $(parent).find('#land_access_path').html();
                var doc3 = $(parent).find('#land_pajak_path').html();
				// aida
				$(modal).find('.modal-id').html("<h5><b>"+siteid+"</b></h5>");
                $(modal).find('.target1').html(target1);
                $(modal).find('.target2').html(target2);
                $(modal).find('.target3').html(target3);
                $(modal).find('.bapd1').html(bapd1);
                $(modal).find('.bapd2').html(bapd2);
                $(modal).find('.bapd3').html(bapd3);
                $(modal).find('.harga').html(harga);
                $(modal).find('.awal').html(awal);
                $(modal).find('.akhir').html(akhir);
                $(modal).find('.sub').html(sub);
                $(modal).find('.rem').html(rem);
                $(modal).find('.doc1').html(doc1);
                $(modal).find('.doc2').html(doc2);
                $(modal).find('.doc3').html(doc3);
                $('#smallModal').modal('show');
            });
        });
    </script>
</body>

</html>
