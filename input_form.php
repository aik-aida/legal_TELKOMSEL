<?php
    include_once '../db_connect.php';
    $sql = "select * from jenisproblem;";
    $master = mysql_query($sql) or die(mysql_error());
    $arr_master = array();
    
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
                    <h1 class="page-header">Input Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Input Form
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action = "insert_into_problem.php" method="post">
                                        <div class="form-group">
                                            <h2>Tambah Klasifikasi Problem</h2>
                                            <p></p>
                                            <fieldset disabled>
                                            <div class="form-group">
                                                <label for="disabledSelect">ID</label>
                                                
                                                <?php  
                                                            include_once '../db_connect.php'; 
                                                            $result = mysql_query("SELECT COUNT(*)+1 as idnow FROM jenisproblem");

                                                            while($temp = mysql_fetch_array($result)) { ?>
                                                            <input class="form-control" id="idproblem" name="idproblem" type="text" placeholder=<?php echo $temp['idnow'];?> 
                                                    <?php
                                                        } ?>
                                                        disabled>
                                            </div>
                                            </fieldset>
                                            <label>Jenis Problem</label>
                                            <input class="form-control" id="problem" name="problem">
                                            <p></p>
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
                                    </form>
                                </div>

                                <div class="col-lg-6">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <div class="scrollable">
                                            <h2> Tabel Problem </h2>
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-master">
                                                <thead>
                                                    <tr>
                                                        <th>ID Problem</th>
                                                        <th>Klasifikasi Problem</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        while($temp = mysql_fetch_array($master)) { ?>
                                                            <tr>
                                                            <!--<td><input type="checkbox" name="dtmaster[]" id="dtmaster" value=<?php echo $temp['site_id']; ?> ></td>-->
                                                            <td><?php echo $temp['id_jenis_problem']; ?></td>
                                                            <td><?php echo $temp['klasifikasi']; ?></td>
                                                            
                                                       </tr>     
                                                    <?php
                                                        } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel-body -->
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
