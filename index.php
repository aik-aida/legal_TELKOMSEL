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
    <link href="css/bootstrap-combined.min.css" rel="stylesheet">
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
                                    <thead >
                                        <tr>
                                            <th rowspan="2"><button type="submit" class="btn btn-warning btn-circle" style="font-size: 7pt">
                                                            <i class="fa fa-times"></i>
                                                            </button><label style="font-size: 6pt"><b>hapus</b></label></th>
                                            <th rowspan="2">#</th>
                                            <th rowspan="2">Tanggal Penambahan</th>
                                            <th rowspan="2">Site ID</th>
                                            <th rowspan="2">Area</th>
                                            <th rowspan="2">Region</th>
                                            <th rowspan="2">Site Name</th>
                                            <th rowspan="2">Site Address</th>
                                            <th rowspan="2">Vendor/Notaris</th>
                                            <th colspan="3">BAST</th>
                                            <th rowspan="2">detail</th>
                                            <!--
                                            <th colspan="3">BAPD</th>
                                            <th colspan="3">Telkomsel</th>
                                            <th colspan="5">Informasi Kontak / PO</th>
                                            -->
                                        </tr>
                                        <tr>
                                            <th>Tahap 1</th>
                                            <th>Tahap 2</th>
                                            <th>Tahap 3</th>
                                            <!--
                                            <th>Target Tahap 1</th>
                                            <th>Target Tahap 2</th>
                                            <th>Target Tahap 3</th>
                                            <th>Tahap 1</th>
                                            <th>Tahap 2</th>
                                            <th>Tahap 3</th>
                                            <th>Harga Pekerjaan</th>
                                            <th>Tanggal Efektif Kontrak</th>
                                            <th>Tanggal AKhir Kontrak</th>
                                            <th>Sub Kontraktor</th>
                                            <th>Remarks</th>-->
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 7pt">
                                        <?php
                                            global $count;
                                             $count = 0;
                                            while($temp = mysql_fetch_array($legal)) { 
                                            $count++;?>
                                            <tr><font size=1>
                                                <td><input type="checkbox" name="del[]" id="del" value=<?php echo $temp['site_id']; ?> ></td>
                                                <td><?php echo $count ?></td>
                                                <td></td>
                                                <td style="color: #0000FF;">
                                                    <a href=<?php echo "update_legal.php?id=".$temp['site_id']; ?>>
                                                    <?php echo $temp['site_id']; ?></a></font></td>
                                                <td><?php echo $temp['site_area']; ?></td>
                                                <td><?php echo $temp['site_region']; ?></td>
                                                <td><?php echo $temp['site_name']; ?></td>
                                                <td><?php echo $temp['site_address']; ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td data-toggle="modal" data-target="#orderModal"
                                                    data-id=<?php echo $temp['site_id']; ?> 
                                                    data-telsatu=<?php echo $temp['target_tahap1']; ?> 
                                                    data-teldua=<?php echo $temp['target_tahap2']; ?> 
                                                    data-teltiga=<?php echo $temp['target_tahap3']; ?> 
                                                    >
                                                    <!--<a href='javascript:fg_popup_form("fg_formContainer","fg_form_InnerContainer","fg_backgroundpopup");'>-->
                                                    <button type="button" class="btn btn-primary btn-xs"></button>
                                                    </td>
                                                <!--
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>-->
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

    <div id="orderModal" class="modal hide fade" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
             <h3>Detail Informasi</h3>
        </div>
        <div id="orderDetails" class="modal-body"></div>
        <div id="orderItems" class="modal-body"></div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
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
    <script>
    $(function(){
        $('#orderModal').modal({
            keyboard: true,
            backdrop: "static",
            show:false,
            
        }).on('show', function(){
              var site_id = $(event.target).closest('td').data('id');
              //var tahap1 = $(event.target).closest('td').data('telsatu');
              //var tahap2 = $(event.target).closest('td').data('teldua');
              //var tahap3 = $(event.target).closest('td').data('teltiga');
            //make your ajax call populate items or what even you need
            //$(this).find('#orderDetails').html($('<b> Order Id selected: ' + site_id +' -- '+tahap1+','+tahap2+','+tahap3+ '</b>'))
            $(this).find('#orderDetails').html($('<b> Order Id selected: ' + site_id +'</b>'))
        });
    });
    </script>

</body>

</html>
