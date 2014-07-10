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
                <a class="navbar-brand" href="index.html">LEGAL</a>
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
                            Input Land Document ( Step 2 of 2 )
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <form action="upload_file.php" method="post" enctype="multipart/form-data">
                                                <label>Site ID</label>
                                                <input class="form-control" id="siteid" name="siteid">
                                                <p></p>
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
                                                        <input class="form-control" id="status" name="status">
                                                        <p></p>
                                                        <label>SHM/PKS No.</label>
                                                        <input class="form-control" id="no" name="no">
                                                        <p></p>
                                                        <label>Title Dokumen</label>
                                                        <select class="form-control" id="title" name="title">
                                                            <option>Kuitansi</option>
                                                            <option>BAK</option>
                                                            <option>AJB</option>
                                                            <option>PKS</option>
                                                            <option>SHM/SHGB</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Dokumen yang Dimiliki</label>
                                                        <select class="form-control" id="own" name="own">
                                                            <option>Asli</option>
                                                            <option>Copy</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Pemegang Dokumen Asli</label>
                                                        <input class="form-control" id="owner" name="owner">
                                                        <p></p>
                                                        <label>Valid Period</label>
                                                        <p></p>
                                                        <input id="start" type="date" name="start">
                                                        <label> until </label>
                                                        <input id="end" type="date" name="end">
                                                        <p></p>
                                                        <label>Active</label>
                                                        <select class="form-control" id="active" name="active">
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Upload Berkas</label>
                                                        <p></p>
                                                        <input type="file" name="file1" id="file1">
                                                        <p></p>
                                                    </div>
                                                </ul>
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
                                                        <input class="form-control" id="no2" name="no2">
                                                        <p></p>
                                                        <label>Title Dokumen</label>
                                                        <select class="form-control" id="title2" name="title2">
                                                            <option>Kuitansi</option>
                                                            <option>BAK</option>
                                                            <option>AJB</option>
                                                            <option>PKS</option>
                                                            <option>SHM/SHGB</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Dokumen yang Dimiliki</label>
                                                        <select class="form-control" id="own2" name="own2">
                                                            <option>Asli</option>
                                                            <option>Copy</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Pemegang Dokumen Asli</label>
                                                        <input class="form-control" id="owner2" name="owner2">
                                                        <p></p>
                                                        <label>Valid Period</label>
                                                        <p></p>
                                                        <input id="start2" type="date" name="start2">
                                                        <label> until </label>
                                                        <input id="end2" type="date" name="end2">
                                                        <p></p>
                                                        <label>Active</label>
                                                        <select class="form-control" id="active2" name="active2">
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Upload Berkas</label>
                                                        <p></p>
                                                        <input type="file" name="file2" id="file2">
                                                        <p></p>
                                                    </div>
                                                </ul>
                                                <p></p>
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
                                                        <input class="form-control" id="nop" name="nop">
                                                        <p></p>
                                                        <label>PBB Due Date</label>
                                                        <p></p>
                                                        <input id="pbbdate" type="date" name="pbbdate">
                                                        <p></p>
                                                        <label>PBB Amount</label>
                                                        <input class="form-control" id="pbbamount" name="pbbamount">
                                                        <p></p>
                                                        <label>Paid Status</label>
                                                        <select class="form-control" id="paidstatus" name="paidstatus">
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Paid Date</label>
                                                        <p></p>
                                                        <input id="paiddate" type="date" name="paiddate">
                                                        <p></p>
                                                        <label>Active</label>
                                                        <select class="form-control" id="active3" name="active3">
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                        <p></p>
                                                        <label>Upload Berkas</label>
                                                        <p></p>
                                                        <input type="file" name="file3" id="file3">
                                                        <p></p>
                                                    </div>
                                                </ul>
                                                <p></p><br><br>
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
                                                
                                                <!--<button type="submit" class="btn btn-primary btn-xs">Submit</button>-->
                                            </form>
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
