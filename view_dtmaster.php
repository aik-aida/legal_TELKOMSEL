<?php
    //connect to the database
    include_once '../db_connect.php'; 
    include_once '../global.php';
    global $user_id;
    global $userregion;
    global $userarea;
    $doc='';
    $date_now=date("M-Y");
    if (isset($_GET['doc'])) {
        $doc=$_GET['doc'];
    }
    if (isset($_POST['doc'])) {
        $doc=$_POST['doc'];
    }   

    $site_id=isset($_POST['site_id']) ? $_POST['site_id'] : '';
    if (!isset($_POST['site_id'])) {
        $site_id=isset($_GET['site_id']) ? $_GET['site_id'] : '';
    }   
    
    $site_name=isset($_POST['site_name']) ? $_POST['site_name'] : '';   
    if (!isset($_POST['site_name'])) {
        $site_name=isset($_GET['site_name']) ? $_GET['site_name'] : ''; 
    }
    
    $area=isset($_POST['area']) ? $_POST['area'] : '';
    if (!isset($_POST['area'])) {
        $area=isset($_GET['area']) ? $_GET['area'] : '';
    }   
    
    $region=isset($_POST['region']) ? $_POST['region'] : '';
    if (!isset($_POST['region'])) {
        $region=isset($_GET['region']) ? $_GET['region'] : '';
    }
    
    $propinsi=isset($_POST['propinsi']) ? $_POST['propinsi'] : '';
    if (!isset($_POST['propinsi'])) {
        $propinsi=isset($_GET['propinsi']) ? $_GET['propinsi'] : '';    
    }
    
    $kabupaten=isset($_POST['kabupaten']) ? $_POST['kabupaten'] : '';
    if (!isset($_POST['kabupaten'])) {
        $kabupaten=isset($_GET['kabupaten']) ? $_GET['kabupaten'] : ''; 
    }   

    $on_air_month=isset($_POST['on_air_month']) ? $_POST['on_air_month'] : '';
    if (!isset($_POST['on_air_month'])) {
        $on_air_month=isset($_GET['on_air_month']) ? $_GET['on_air_month'] : '';    
    }
    
    $on_air_year=isset($_POST['on_air_year']) ? $_POST['on_air_year'] : '';
    if (!isset($_POST['on_air_year'])) {
        $on_air_year=isset($_GET['on_air_year']) ? $_GET['on_air_year'] : '';   
    }

    $p=isset($_POST['p']) ? $_POST['p'] : 0;
    $msg=null;
    
    //get the Paging function
    include_once ('../Pagination.php');

        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        $limit = 10;
        $startpoint = ($page * $limit) - $limit;
?>

<?php
if(function_exists("date_default_timezone_set") and function_exists("date_default_timezone_get"))
#@date_default_timezone_set(@date_default_timezone_get());
@date_default_timezone_set("Asia/Jakarta");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></meta>
  <link rel="shortcut icon" href="images/signal.png"></link>
  <link rel="stylesheet" href="global.css" type="text/css"></link>
  <title>Legal Application</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!--
    <link rel="stylesheet" href="../global.css" type="text/css"></link>-->
    <link href="../pagination.css" rel="stylesheet" type="text/css" />
    <link href="../yellow.css" rel="stylesheet" type="text/css" />
    
    <style type="text/css">
    
        .th, .td {
            border: 1px solid #B6B6B6;
        }
        .records {
            width: 1345px;
            margin: 0px;
            padding:4px 5px;
            border:1px solid #B6B6B6;
        }
        
        .record {
            color: #474747;
            margin: 0px 0;
            padding: 5px 5px;
            background:#E6E6E6;  
            border: 1px solid #B6B6B6;
            cursor: pointer;
            letter-spacing: 2px;
        }
        .record:hover {
            background:#D3D2D2;
        }
        
        
        .round {
            -moz-border-radius:8px;
            -khtml-border-radius: 8px;
            -webkit-border-radius: 8px;
            border-radius:8px;    
        }    
        
        p.createdBy{
            padding:5px;
            width: 510px;
            font-size:15px;
            text-align:center;
        }
        p.createdBy a {color: #666666;text-decoration: none;}        
    </style>
</head>

<body bgcolor=#eeeeff>

<script type="text/javascript">
var FNDDMwindow=null;
var ray={
ajax:function(st)
    {
        this.show('load');
    },
show:function(el)
    {
        this.getID(el).style.display='';
    },
getID:function(el)
    {
        return document.getElementById(el);
    }
}

function open_window(url,x,y) {
            var left = (screen.width)/2;
            var top = (screen.height/2)-(y/2);
            //var top = 0;          
         var attributes="resizable=no,scrollbars=no,toolbar=no,menubar=no,width="+x+",height="+ y +",top="+top+",left="+left;
          FNDDMwindow = window.open(url, "FNDDMwindow", attributes);
          FNDDMwindow.focus();
          FNDDMwindow.opener = self;
}

function AddNewOption(ddlID, display, value) {
     var ddl = document.getElementById(ddlID);
        ddl.options[ddl.options.length] = new Option('No Access','disabled', true);
}


function ChangeSelectByValue(ddlID, value, change) {
    var ddl = document.getElementById(ddlID);
    if (value == 'disabled') {
        ddl.add(new Option('No Access Area','disabled', true));
        ddl.disabled=true;
    }   
     for (var i = 0; i < ddl.options.length; i++) {
         if (ddl.options[i].value == value) {
             if (ddl.selectedIndex != i) {
                 ddl.selectedIndex = i;
                if (change) {
                     ddl.onchange();
                }    
             }
             break;
         }
    }
 }

function refresh() {
        var sURL = unescape(window.location.pathname);
        window.location.replace( sURL );
}

function parent_disable() {
    if(FNDDMwindow && !FNDDMwindow.closed)
    FNDDMwindow.focus();
}
function submit1() {
    var oForm = document.forms["tamara_inquiry"];
    oForm.action="AssetFindForm.php";
    oForm.target="_self";   
    oForm.submit();
}
function close_it(doc, a, b) {
    var doc=doc;
    if (doc == 'asset_movement1') {
        window.opener.document.asset_movement.asset_master_id_original.value=a;
        window.opener.document.asset_movement.site_id_original.value=b;
    }

    if (doc == 'asset_movement2') {
        window.opener.document.asset_movement.asset_master_id_destination.value=a;
        window.opener.document.asset_movement.site_id_destination.value=b;
    }
    
    if ((doc == 'asset_movement1') || (doc == 'asset_movement2')) {
        window.opener.document.asset_movement.submit();
    }
    if (doc == 'bsite') {
        window.opener.document.bsiteid.asset_master_id.value=a;
        window.opener.document.bsiteid.site_id.value=b;
        //window.opener.document.bsiteid.submit();
    }
    if (doc == 'trans') {
        window.opener.document.trans.asset_master_id_destination.value=a;
        window.opener.document.trans.site_id_destination.value=b;
    }
    window.close();
}

</script>

<div id="load" style="display:none;"><img src=../images/progress.gif  height="15" width="15"> Loading... Please wait</div>

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
                    <h1 class="page-header">Data Master</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>

<FORM  name="tamara_inquiry" id="tamara_inquiry" action='<?php echo $_SERVER['PHP_SELF'] ?>' method="post">
<INPUT type=hidden name=p value=<?php echo $p; ?>>
<INPUT type=hidden name=doc value=<?php echo $doc; ?>>

<table width=100% border=1 cellpadding=1 cellspacing=1 align=center BGCOLOR=#efefef>
<tr><td>
<table width=100% border=0 cellpadding=1 cellspacing=1 align=center>

<tr>
<td align=left><font face=verdana,helvetica size=-1>Site ID</font></td>
<td><input type=text name=site_id value='<?php echo $site_id ?>'  size=19 class=selectMandatory onchange=submit();></td>

<td align=left><font face=verdana,helvetica size=-1>Site Name</font></td>
<td><input type=text name=site_name value='<?php echo $site_name ?>'  size=19 class=selectMandatory onchange=submit();></td>
</tr>

<tr><td align=left nowrap><font face=verdana,helvetica size=-1>Area</font></td>
<td>
<?php

        $area_query='';
        if ($userarea <> '') {
            if ($userarea == '010') {
                $area_query="";
            } else {
                $area_query=" where area_code='$userarea'";
            }   
        }   
        $query="select area_code, area_description from area  $area_query
                order by area_code";
        $result=mysql_query($query);
?>
<select name=area id="area" size=1 class=selectMandatory onchange=submit();>
        <option value=''>--- Select Area ---
<?php

        while ($row=mysql_fetch_row($result)) {
        $area_code=$row[0];
        $area_description=$row[1];
?>
                <option <?php if($area == $area_code) echo "selected"; ?> value=<?php echo $area_code; ?>><?php echo $area_code.'-'.$area_description; ?></option>
<?php
        }
?>
</select>
</td>
<?php

        if ($userarea <> '' && $userarea <> '0' & $userarea <> '010') {
            echo "<script type='text/javascript'>"
                , "ChangeSelectByValue('area', $userarea, 'change');"
                , "</script>";
            $area=$userarea;
        } 
        
        if ($userarea == '' || $userarea == '0' ) {
            $area="disabled";   
        }   
        

?>
<td align=left nowrap><font face=verdana,helvetica size=-1>Region</font></td>
<td>
<?php
$region_query ='';
        //user area
        if (($userarea <> '' && $userarea <> '0') && ($userregion == '' && $userregion == '0')) { 
                $region_query='';
        }
        //user region only
        if (($userarea <> '' && $userarea <> '0') && ($userregion <> '' && $userregion <> '0')) { 
            $region_query=" and region_code='$userregion'";
        }  
        
        if ($userarea == '010') {
                $region_query='';
        }
        
        $query="select a.region_code, a.region_description
                            from region a left join area b on a.area_id=b.area_id
                            where a.region_code <> b.area_code and b.area_code='$area' $region_query 
                            order by a.region_code";

        $result=mysql_query($query);
?>
<select name=region id="region" size=1 class=selectMandatory onchange="submit();">
        <option value=''>--- Select Region ---
<?php

        while ($row=mysql_fetch_row($result)) {
        $region_code=$row[0];
        $region_description=$row[1];
?>
                <option <?php if($region == $region_code) echo "selected"; ?> value=<?php echo $region_code; ?>><?php echo $region_code.'-'.$region_description; ?></option>
<?php
        }
?>
</select>
</td>
<?php
        //user region only
        if (($userarea <> '' && $userarea <> '0') && ($userregion <> '' && $userregion <> '0')) { 
            echo "<script type='text/javascript'>"
                , "ChangeSelectByValue('region', $userregion, 'change');"
                , "</script>";
        }  

        
        if (($userarea == '' || $userarea == '0') && ($userregion == '' || $userregion == '0')) { 
            echo "<script type='text/javascript'>"
                , "ChangeSelectByValue('area', 'disabled', 'change');"
                , "</script>";
            echo "<script type='text/javascript'>"
                , "ChangeSelectByValue('region', 'disabled', 'change');"
                , "</script>";  
        }       
        
?>

</tr> 


<tr><td align=left nowrap><font face=verdana,helvetica size=-1>Propinsi</font></td>
<td>
<?php
        $query="select id_prov, nama_prov from mp_prov
                order by nama_prov";
        $result=mysql_query($query);
?>
<select name=propinsi id=propinsi size=1 class=selectMandatory onchange="submit();">
        <option value=''>--- Select Propinsi ---
<?php

        while ($row=mysql_fetch_row($result)) {
        $id_prov=$row[0];
        $nama_prov=$row[1];
?>
                <option <?php if($propinsi == $id_prov) echo "selected"; ?> value=<?php echo $id_prov; ?>><?php echo $nama_prov; ?></option>
<?php
        }
?>
</select>
</td>
<td align=left nowrap><font face=verdana,helvetica size=-1>Kabupaten</font></td>
<td>
<?php
        $query="select id_kabkot, nama_kabkot from mp_kabkot
                where id_prov='$propinsi' order by nama_kabkot";
        $result=mysql_query($query);
?>
<select name=kabupaten id=kabupaten size=1 class=selectMandatory onchange="submit();">
        <option value=''>--- Select Kabupaten ---
<?php

        while ($row=mysql_fetch_row($result)) {
        $id_kabkot=$row[0];
        $nama_kabkot=$row[1];
?>
                <option <?php if($kabupaten == $id_kabkot) echo "selected"; ?> value=<?php echo $id_kabkot; ?>><?php echo $nama_kabkot; ?></option>
<?php
        }
?>
</select>
</td>
</tr> 
<?php
$month_list=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
$sql_year="select aiy.on_air_year from (SELECT distinct(ifnull(date_format(ifnull(on_air_date,'0000'),'%Y'),'0000')) on_air_year 
            FROM `tamara_asset_header`) aiy where aiy.on_air_year != '0000' order by aiy.on_air_year";
$result_year=mysql_query($sql_year);            
?>

<tr>
<td>&nbsp;</td><td>&nbsp;</td>
<td align=left nowrap><font face=verdana,helvetica size=-1>On Air Month-Year</font></td>
<td align=left nowrap>
<select name=on_air_month id=on_air_month size=1 class=selectMandatory  onchange="submit();">
        <option value=''>-Month-
<?php
        $i=0;
        $count_month=count($month_list);
        while ($i < $count_month) {
?>
                <option <?php if($on_air_month == $month_list[$i]) echo "selected"; ?> value=<?php echo $month_list[$i]; ?>><?php echo $month_list[$i]; ?></option>
<?php
            $i++;
        }
?>
</select>
<select name=on_air_year id=on_air_year size=1 class=selectMandatory onchange="submit();">
        <option value=''>-Year-
<?php

        while ($row=mysql_fetch_row($result_year)) {
        $on_air_year_list=$row[0];
?>
                <option <?php if($on_air_year == $on_air_year_list) echo "selected"; ?> value=<?php echo $on_air_year_list; ?>><?php echo $on_air_year_list; ?></option>
<?php
        }
?>
</select>
</td> 
</tr>

<tr><td align=center colspan=2>
<!--
<table Width=50% border=0 cellpadding=1 cellspacing=1 align=center>
<tr><td colspan=1>
<TABLE border=0 cellpadding=0 cellspacing=0 align=left>
<TR><TD>&nbsp;</TD></TR>
<TR><TD height=22 rowspan=3><A href="javascript:submit1();" onMouseOver="window.status='Connect';return true" onclick="return ray.ajax();"><IMG src="../menuicons/FNDBWHRL.gif" alt="" height=22 width=15 border=0></A></TD>
<TD height=1 bgcolor="000000"><IMG src="../menuicons/FNDINVDT.gif" alt="" height=1 width=1></TD>
<TD height=22 rowspan=3><A href="javascript:submit1()" onMouseOver="window.status='Connect';return true" onclick="return ray.ajax();"><IMG src="../menuicons/FNDBWHRR.gif" alt="" height=22 width=15 border=0></A></TD></TR>

<TD height=20 align=center valign=center bgcolor="#efefef" nowrap><A href="javascript:submit1()" style="text-decoration:none" onMouseOver="window.status='Connect';return true" onclick="return ray.ajax();"><FONT size=2 face="Arial,Helvetica,Geneva"  color=000000>Submit</FONT></A></TD></TR>
<TR><TD height=1 bgcolor="000000"><IMG src="../menuicons/FNDINVDT.gif" alt="" width=1 height=1></TD></TR>
<TR><TD>&nbsp;</TD></TR>
</TABLE>

</td>
</table> -->


</td></tr>
</table>
</td></tr></table>


<tr><td><?php echo $msg; ?></td></tr>

</td></tr></table>


<?php

function removeEmpty($var) {
   return (!empty($var)); 
}


            //get num records
            $statement="(select site_id from tamara_asset_header where ";
            //show records
//            $sql = "select tah.site_id, tah.site_name, tah.address, kec.nama_kec, kab.nama_kabkot, prop.nama_prov, tah.site_type, tah.project_id, 
//                  tah.site_latitude, tah.site_longitude, tah.msc_include, tah.ttc_include, tah.site_simpul_include, tah.site_backbone_include, 
//                  tah.on_air_date, tah.region, tah.area, tah.asset_status, tah.asset_master_id from tamara_asset_header tah 
//                  left join mp_kec kec on tah.kecamatan=kec.id_kec 
//                  left join mp_kabkot kab on tah.kabupaten=kab.id_kabkot 
//                  left join mp_prov prop on tah.propinsi=prop.id_prov where ";

            $sql = "select tah.site_id, tah.site_name, tah.address, kec.nama_kec, kab.nama_kabkot, prop.nama_prov, tah.site_type, tah.project_id, 
                    tah.site_latitude, tah.site_longitude, tah.msc_include, tah.ttc_include, tah.site_simpul_include, tah.site_backbone_include, 
                    tah.on_air_date, tah.region, tah.area, tah.asset_status, tah.asset_master_id from tamara_asset_header tah 
                    left join mp_kec kec on (tah.propinsi=kec.id_prov and tah.kabupaten=kec.id_kabkot and tah.kecamatan=kec.id_kec)
                    left join mp_kabkot kab on (tah.propinsi=kab.id_prov and tah.kabupaten=kab.id_kabkot) 
                    left join mp_prov prop on tah.propinsi=prop.id_prov 
                    where ";

// grab the search types.

      $on_air_param = $on_air_month.'-'.$on_air_year;       
      $types = array();
      $types[] = (!empty($site_id)) ?"`site_id` LIKE '%{$site_id}%'":'';
      $types[] = (!empty($site_name)) ?"`site_name` LIKE '%{$site_name}%'":'';
      $types[] = (!empty($area)) ?"`area` LIKE '%{$area}%'":'';
      $types[] = (!empty($region)) ?"`region` LIKE '%{$region}%'":'';
      $types[] = (!empty($propinsi)) ?"`propinsi` LIKE '%{$propinsi}%'":'';
      $types[] = (!empty($kabupaten)) ?"`kabupaten` LIKE '%{$kabupaten}%'":'';
      $types[] = (($on_air_param != '-')) ?"date_format(`on_air_date` , '%b-%Y') LIKE '%{$on_air_param}%'":'';
      
      $types = array_filter($types, "removeEmpty"); // removes any item that was empty (not checked)
  
        if (count($types) < 1) {
            $types[] = "`site_id` LIKE '%{$site_id}%'"; // use the body as a default search if none are checked
        }    
        
        $sql .= implode(" AND ", $types) ." ORDER BY `site_id` limit {$startpoint} , {$limit}"; // order by title.      
        $statement .= implode(" AND ", $types);
        $statement .= " ) tah";
        
#   echo "<font face=sans-serif size=-2 color=blue>$sql";
#   exit;
            $result=mysql_query($sql);
            $count=mysql_num_rows($result);
            if (!$result) {
                    $message  = '<b>Invalid query:</b><br>' . mysql_error() . '<br><br>';
                    $message .= '<b>query:</b><br>' . $sql . '<br><br>';
                    die($message);
                    raise_error('db_query_error: ' . $message);
            }

    $param_name='';     
    if (!empty($site_id)) {
        $param_name .= "&site_id=$site_id";         
    }   
    if (!empty($site_name)) {
        $param_name .= "&site_name=$site_name";         
    }   
    if (!empty($area)) {
        $param_name .= "&area=$area";           
    }   
    if (!empty($region)) {
        $param_name .= "&region=$region";           
    }   
    if (!empty($propinsi)) {
        $param_name .= "&propinsi=$propinsi";           
    }   
    if (!empty($kabupaten)) {
        $param_name .= "&kabupaten=$kabupaten";         
    }   
    if (!empty($on_air_param)) {
        $param_name .= "&on_air_month=$on_air_month&on_air_year=$on_air_year";          
    }
    $param_name .= "&doc=$doc"; 
        
if ($count >0) {            
?>
<div class="records round"  align="right">
<table align=center cellpadding=1 cellspacing=0 width=100% >
<tr bgcolor=#000000>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b> </td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Site ID</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Site Name</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Address</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Kecamatan</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Kabupaten</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Propinsi</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>On Air</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Area</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Region</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Status</td>

<!--
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Site Type</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Project ID</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Latitude</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Longitude</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>MSC Include</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>TTC Include</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Site Simpul Include</td>
<td align=left><font face=sans-serif size=-2 color="#FFFFFF"><b>Site Backbone Include</td>
<tr bgcolor=#fffae4>
-->
<?php
                $warna0 = "#D8DBFE";
                $warna1 = "#fffff8";
                $i=0;
                while($row=mysql_fetch_row($result)) {
                        echo "<tr>";
                        $bgcolor=$warna0;
                        $i%2  ? 0: $bgcolor = $warna1;
?>
                        <tr bgcolor=<?php echo $bgcolor; ?> onmouseOver="this.style.backgroundColor='yellow'" onMouseOut="this.style.backgroundColor='<?php echo $bgcolor; ?>'">
                        <?php
                        $site_id=$row[0];
                        $site_name=$row[1];
                        $address=$row[2];
                        $kecamatan=$row[3];
                        $kabupaten=$row[4]; 
                        $propinsi=$row[5]; 
                        $site_type=$row[6]; 
                        $project_id=$row[7]; 
                        $site_latitude=$row[8]; 
                        $site_longitude=$row[9]; 
                        $msc_include=$row[10]; 
                        $ttc_include=$row[11]; 
                        $site_simpul_include=$row[12]; 
                        $site_backbone_include=$row[13]; 
                        $on_air_date=$row[14]; 
                        $region=$row[15]; 
                        $area=$row[16]; 
                        $asset_status=$row[17];
                        $asset_master_id=$row[18];

                        if (($doc == "asset_movement1") || ($doc == "asset_movement2") || ($doc == "bsite") || ($doc == "trans"))  {
                            $ref="javascript:close_it('$doc','$asset_master_id','$site_id')";
                        } else {
                            $ref="SiteLoader.php?asset_master_id=$asset_master_id";
                        }   
                        ?>
            <td><input type="checkbox" name="dtmaster[]" id="dtmaster" value=<?php echo $site_id; ?> ></td>
            <td align=left class="td"><font face=sans-serif size=-2><span style='width:0px;'><?php echo $site_id; ?></span></a></td>
            <td align=left class="td"><font face=sans-serif size=-2><span style='width:0px;'><?php echo $site_name; ?></span></a></td>
            <td align=left class="td"><font face=sans-serif size=-2><span style='width:0px;'><?php echo $address; ?></span></td>
            <td align=left class="td"><font face=sans-serif size=-2><span style='width:0px;'><?php echo $kecamatan; ?></span></td>
            <td align=left class="td"><font face=sans-serif size=-2><span style='width:0px;'><?php echo $kabupaten; ?></span></td>
            <td align=left class="td"><font face=sans-serif size=-2><span style='width:0px;'><?php echo $propinsi; ?></span></td>
            <td align=left class="td"><font face=sans-serif size=-2><span style='width:0px;'><?php echo $on_air_date; ?></span></td>
            <td align=left class="td"><font face=sans-serif size=-2><span style='width:0px;'><?php echo $area; ?></span></td>
            <td align=left class="td"><font face=sans-serif size=-2><span style='width:0px;'><?php echo $region; ?></span></td>
            <td align=left class="td"><font face=sans-serif size=-2><span style='width:0px;'><?php echo $asset_status; ?></span></td>

            <!--
            <td align=right class="td"><font face=sans-serif size=-2><?php echo $site_type; ?></td>
            <td align=right class="td"><font face=sans-serif size=-2><?php echo $project_id; ?></td>
            <td align=right class="td"><font face=sans-serif size=-2><?php echo $site_latitude; ?></td>
            <td align=left class="td"><font face=sans-serif size=-2><?php echo $site_longitude; ?></td>
            <td align=left class="td"><font face=sans-serif size=-2><?php echo $msc_include; ?></td>
            <td align=left class="td"><font face=sans-serif size=-2><?php echo $ttc_include; ?></td>
            <td align=left class="td"><font face=sans-serif size=-2><?php echo $site_simpul_include; ?></td>
            <td align=left class="td"><font face=sans-serif size=-2><?php echo $site_backbone_include; ?></td>
            -->
            <?php
                $i++;
                }
?>
</tr>
</table>
        <br />
        <button type="button" class="btn btn-primary btn-lg btn-block">Tambahkan yang Terpilih ke LEGAL</button>
        <br />
</div>

<?php
echo pagination($statement,$limit,$page,'?',$param_name);
}
?>
</form>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Forms -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>
</body>
</html>
