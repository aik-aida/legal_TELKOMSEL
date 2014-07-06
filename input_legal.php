<?php
    include_once '../db_connect.php';
    $sql = "select * from tamara_aset_header;";
    $master = mysql_query($sql);
    $arr_master = mysql_fetch_array($master);
    print_r($arr_master);
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
                <a class="navbar-brand" href="index.html">LEGAL</a>
            </div>

            <ul class="nav navbar-top-links">
                <li>
                    <a class="dropdown-toggle"  href="#">
                        Data Legal
                    </a>
                </li>
                <li>
                    <a class="dropdown-toggle" href="input_legal.php">
                        Input Data Legal
                    </a>
                </li>
                <li>
                    <a class="dropdown-toggle"  href="view_dtmaster.php">
                        Data Master
                    </a>
                </li>
                
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
                            Input Data Legal
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Site ID</label>
                                            <input class="form-control">
                                            <p></p>
                                            <label>Area</label>
                                            <select class="form-control">
                                                <option>Area 1</option>
                                                <option>Area 2</option>
                                                <option>Area 3</option>
                                                <option>Area 4</option>
                                            </select>
                                            <p></p>
                                            <label>Regional</label>
                                            <input class="form-control">
                                            <p></p>
                                            <label>Site Name</label>
                                            <input class="form-control">
                                            <p></p>
                                            <label>Site Address</label>
                                            <input class="form-control">
                                            <p></p>                                           
                                            <h2>Land Certification Project Accomplishment</h2>
                                            <label>Target Tahap 1</label>
                                            <p></p>
                                            <input id="targetahap1" type="date">
                                            <p></p>
                                            <label>Target Tahap 2</label>
                                            <p></p>
                                            <input id="targetahap2" type="date">
                                            <p></p>
                                            <label>Target Tahap 3</label>
                                            <p></p>
                                            <input id="targetahap3" type="date">
                                            <p></p>
                                            <p></p>
                                            <h2>BAPD</h2>
                                            <label>Tahap 1</label>
                                            <p></p>
                                            <input id="bapdtahap1" type="date">
                                            <p></p>
                                            <label>Tahap 2</label>
                                            <p></p>
                                            <input id="bapdtahap2" type="date">
                                            <p></p>
                                            <label>Tahap 3</label>
                                            <p></p>
                                            <input id="bapdtahap3" type="date">
                                            <p></p>
                                            <h2>BAST</h2>
                                            <label>Tahap 1</label>
                                            <p></p>
                                            <input id="bapdtahap1" type="date">
                                            <p></p>
                                            <label>Tahap 2</label>
                                            <p></p>
                                            <input id="bapdtahap2" type="date">
                                            <p></p>
                                            <label>Tahap 3</label>
                                            <p></p>
                                            <input id="bapdtahap3" type="date">
                                            <p></p>
                                            <!--<p class="help-block">Example block-level help text here.</p>-->
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <h2>Informasi Kontrak / PO</h2>
                                            <label>Vendor / Notaris </label>
                                            <input class="form-control">
                                            <p></p>
                                            <label>Harga Pekerjaan</label>
                                            <input class="form-control">
                                            <p></p>
                                            <label>Tanggal Efektif Kontrak</label>
                                            <p></p>
                                            <input id="tglefektif" type="date">
                                            <p></p>
                                            <label>Tanggal Berakhirnya Kontrak</label>
                                            <p></p>
                                            <input id="tglakhir" type="date">
                                            <p></p>
                                            <label>Subkontraktor</label>
                                            <input class="form-control">
                                            <p></p>
                                            <label>Remarks</label>
                                            <input class="form-control">
                                            <p></p>
                                            <h2>Problem</h2>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>Jenis Case</th>
                                                <th>Deskripsi</th>
                                                <th>PIC</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">Klasifikasi 1
                                                        </label>
                                                    </div>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </td>
                                                    <td>
                                                        <input style="width:100px" type="text" name="pic" id="pic" />
                                                    </td>
                                                    <td>
                                                        fin
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">Klasifikasi 2
                                                        </label>
                                                    </div>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </td>
                                                    <td>
                                                        <input style="width:100px" type="text" name="pic" id="pic" />
                                                    </td>
                                                    <td>
                                                        fin
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">Klasifikasi 3
                                                        </label>
                                                    </div>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </td>
                                                    <td>
                                                        <input style="width:100px" type="text" name="pic" id="pic" />
                                                    </td>
                                                    <td>
                                                        fin
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </div>
                                    </form>
                                </div>
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
