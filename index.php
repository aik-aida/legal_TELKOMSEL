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
    <link href="js/bootstrap.min.js" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <!--
      <FRAMESET id="main" BORDER=0 rows="15%,*">
      <FRAME NAME="header" src=header.php scrolling=no >
      </FRAME>
    -->
</head>


<body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">LEGAL</a>
            </div>

            <ul class="nav navbar-top-links">
                <li>
                    <a class="dropdown-toggle"  href="index.php">
                        Data Legal
                    </a>
                </li>
                <li class= "dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    Input Data Legal <i class="fa fa-caret-down"></i>
                    </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <a class="dropdown-toggle" href="input_legal.php">
                                    <div>
                                        <strong>Input Data Legal</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-toggle" href="land_document.php">
                                    <div>
                                        <strong>Input Land Document</strong>
                                    </div>
                                </a>
                            </li>
                        </ul>
                </li>
                <li>
                    <a class="dropdown-toggle"  href="view_dtmaster.php">
                        Data Master
                    </a>
                </li>
                <!-- aku tambah yg ini -->
                <li>
                    <a class="dropdown-toggle"  href="input_form.php">
                        Input Form
                    </a>
                </li>
                <!---->
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
                                            <tr data-toggle="modal" data-target="#smallModal"  class="id-detail-modal"><font size=1>
                                                <td><input type="checkbox" name="del[]" id="del" value=<?php echo $temp['site_id']; ?> ></td>
                                                <td><?php echo $count ?></td>
                                                <td></td>
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
                                                <td><a href="#" class="btn btn-xs btn-success"  style="font-size: 7pt">detail</a></td>
                                                <td id="bapd_tahap1"  style="display:none;"><?php echo $temp['bapd_tahap1']; ?></td>
                                                <td id="bapd_tahap2"  style="display:none;"><?php echo $temp['bapd_tahap2']; ?></td>
                                                <td id="bapd_tahap3"  style="display:none;"><?php echo $temp['bapd_tahap3']; ?></td>
                                                <td id="target_tahap1"  style="display:none;"><?php echo $temp['target_tahap1']; ?></td>
                                                <td id="target_tahap2"  style="display:none;"><?php echo $temp['target_tahap2']; ?></td>
                                                <td id="target_tahap3"  style="display:none;"><?php echo $temp['target_tahap3']; ?></td>
                                                <td id="harga_pekerjaan"  style="display:none;"><?php echo $temp['harga_pekerjaan']; ?></td>
                                                <td id="tgl_efektif_kontrak"  style="display:none;"><?php echo $temp['tgl_efektif_kontrak']; ?></td>
                                                <td id="tgl_akhir_kontrak"  style="display:none;"><?php echo $temp['tgl_akhir_kontrak']; ?></td>
                                                <td id="subkontraktor"  style="display:none;"><?php echo $temp['subkontraktor']; ?></td>
                                                <td id="remarks"  style="display:none;"><?php echo $temp['remarks']; ?></td>
                                                <td id="land_shm_path"  style="display:none;"><?php echo $temp['land_shm_path']; ?></td>
                                                <td id="land_access_path"  style="display:none;"><?php echo $temp['land_access_path']; ?></td>
                                                <td id="land_pajak_path"  style="display:none;"><?php echo $temp['land_pajak_path']; ?></td>
                                                </font>
                                           </tr>     
                                        <?php
                                            } ?>
                                    </tbody>
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
                var modal = document.getElementById('smallModal');

                var title = document.getElementById('modal-id');
                var siteid = $(this).find('#site_id').html();
                $(modal).find('.modal-id').html("<h5><b>"+siteid+"</b></h5>");

                var target1 = $(this).find('#target_tahap1').html();
                var target2 = $(this).find('#target_tahap2').html();
                var target3 = $(this).find('#target_tahap3').html();
                var bapd1 = $(this).find('#bapd_tahap1').html();
                var bapd2 = $(this).find('#bapd_tahap2').html();
                var bapd3 = $(this).find('#bapd_tahap3').html();
                var harga = $(this).find('#harga_pekerjaan').html();
                var awal = $(this).find('#tgl_efektif_kontrak').html();
                var akhir = $(this).find('#tgl_akhir_kontrak').html();
                var sub = $(this).find('#subkontraktor').html();
                var rem = $(this).find('#remarks').html();
                var doc1 = $(this).find('#land_shm_path').html();
                var doc2 = $(this).find('#land_access_path').html();
                var doc3 = $(this).find('#land_pajak_path').html();

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

                //var sitename = $(this).find('#site_name').html();
                //var modal = document.getElementById('basicModal');
                //var text = "";
                
                //$(modal).find('.modal-body').html(text);
                $('#smallModal').modal('show');
            });
        });
    </script>
</body>

</html>
