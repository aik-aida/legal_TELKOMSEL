<?php
session_start();
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

<html>
<body  bgcolor="#eeeeff" onload="show_date()">
<!--
<div class="normalbox">
-->
<table border=0 width=100%>
<tr><td colspan=4 align=right width=200><img border="0" src="images/header.png" alt="" height="80" width="260">
<!--
<font size=5 face=Arial,Helvetica,Geneva color=blue><b>Tamara Application</b></td>
<td width="100">&nbsp;</td>
-->
<td align="right"><font size=-1 face=Arial,Helvetica,Geneva color=blue><?php if(isset($_SESSION['useremployee'])) { echo "Welcome : ".$_SESSION['useremployee'];} ?><a href="logout.php"> [ Logout ]</a></td>
<td align="right" width="140" nowrap><font size=-1 face=Arial,Helvetica,Geneva color=blue><div id="waktu"></div></font></td></tr>
</table>
<!--
</div>
-->

</body>
</html>
