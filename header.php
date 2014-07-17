<?php
include_once '../global.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></meta>

<link rel="stylesheet" href="layersmenu-demo.css" type="text/css"></link>

<script type="text/javascript">
//menuju ke fungsi show_date() 1000 milidetik atau 1 detik kemudian
window.setTimeout("show_date()",1000);

function show_date(){

var tanggal = new Date();
document.getElementById("waktu").innerHTML= tanggal.toLocaleString();
//kembali ke awal fungsi show_date() 1000 milidetik atau 1 detik kemudian
setTimeout("show_date()",1000);
}
</script>

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
    
<body  bgcolor="#eeeeff" onload="show_date()">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0 ">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                <img src="images/header.png" height="40" width="200">
                <b><font size="6" face="verdana" color="red">LEGAL</b></font></a>
            </div>

            <ul class="nav navbar-top-links" style="margin-bottom: 0 ">
                <li >
                    <a class="dropdown-toggle"  href="index.php">
                        <b><font size="2.5">[ Data Legal ]</b></font>
                    </a>
                </li>
                <li class= "dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                     <b><font size="2.5">[ Input Data Legal ]</b></font> <i class="fa fa-caret-down"></i>
                    </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <a class="dropdown-toggle" href="upload_data_xls.php">
                                    <div>
                                        <strong><font size="2.5">[ Upload Data dari Excel ]</b></font></strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-toggle" href="input_legal.php">
                                    <div>
                                        <strong> <b><font size="2.5">[ Input Data Legal ]</b></font></strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-toggle" href="land_document.php">
                                    <div>
                                        <strong> <b><font size="2.5">[ Input Land Document ]</b></font></strong>
                                    </div>
                                </a>
                            </li>
                        </ul>
                </li>
                <li>
                    <a class="dropdown-toggle"  href="view_dtmaster.php">
                         <b><font size="2.5">[ Data Master ]</b></font>
                    </a>
                </li>
                <!-- aku tambah yg ini -->
                <li>
                    <a class="dropdown-toggle"  href="input_problem.php">
                         <b><font size="2.5">[ Input Form ]</b></font>
                    </a>
                </li>
                    <table align="right" CELLPADDING="100" border="0">
                        <tr ><td align="right" height = "30 "><font size=-1 face=Arial,Helvetica,Geneva color=blue>
                                <?php if(isset($_SESSION['useremployee'])) 
                                    { echo "Welcome : ".$_SESSION['useremployee'];} ?>
                                <a href="logout.php"> [ Logout ]</a></font></td>
                        </tr>
                        <tr>
                            <td align="right" width="140">
                            <font size=-1 face=Arial,Helvetica,Geneva color=blue>
                            <div id="waktu"></div></font></td></tr>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                    </table>
            </ul>
            </li>
        </nav>
</body>
</html>
