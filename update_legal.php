<?php
    /*include_once '../db_connect.php';
    $sql = "select * from tamara_aset_header;";
    $master = mysql_query($sql);
    $arr_master = mysql_fetch_array($master);
    print_r($arr_master);*/
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
                        <form role="form" action = "updateto_legal.php" method="POST">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control" id="siteid" name="siteid">
                                            <p></p>
                                            <label>Area</label>
                                            <select class="form-control" id="area" name="area">
                                                <option>Area 1</option>
                                                <option>Area 2</option>
                                                <option>Area 3</option>
                                                <option>Area 4</option>
                                            </select>
                                            <p></p>
                                            <label>Regional</label>
                                            <input class="form-control" id="regional" name="regional">
                                            <p></p>
                                            <label>Site Name</label>
                                            <input class="form-control" id="sitename" name="sitename">
                                            <p></p>
                                            <label>Site Address</label>
                                            <input class="form-control" id="siteaddr" name="siteaddr">
                                            <p></p>
                                            <label>Vendor / Notaris </label>
                                            <input class="form-control" id="vendor" name="vendor">
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
                                                                                        
                                            <!--<p class="help-block">Example block-level help text here.</p>-->
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                    <form role="form" action = "insert_into_legal.php" method="POST">
                                        <div class="form-group">
                                            
                                            <h2>Informasi Kontrak / PO</h2>                                            
                                            <label>Harga Pekerjaan</label>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="text" class="form-control" id="harga" name="harga">
                                            <span class="input-group-addon">.00</span>
                                            </div>
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
                                            <p></p>
                                            <label>Remarks</label>
                                            <input class="form-control" id="remarks" name="remarks">
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

                                                            $result2 = mysql_query("SELECT COUNT(*)+1 as idnow FROM jenisproblem");

                                                            
                                                            
                                                            $temp2 = mysql_fetch_array($result2);
                                                            while($temp = mysql_fetch_array($result)) { ?>
                                                            <tr>
                                                            <td><input type="checkbox" name="klasifikasiproblem[]" id="klasifikasiproblem" value=<?php echo $temp['id_jenis_problem']; ?> ></td>
                                                            <td><?php echo $temp['klasifikasi']; ?></td>
                                                            <td>
                                                                <textarea class="form-control" rows="3" name="deskripsi[]" id="deskripsi" >
                                                            </textarea></td>
                                                            <td><input style="width:100px" type="text" name="pic[]" id="pic" /></td>
                                                            <td>fin</td>                                                            
                                                       </tr>     
                                                    <?php
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
