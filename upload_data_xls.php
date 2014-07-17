<?php
    include '../db_connect.php'; 
    global $target_path1;
    global $dt_legal;
    global $id_inlegal;
    global $html;
    global $id_reject;
    global $id_double;
    global $id_acc;
    global $count_acc;
    global $count_rej;

    $count_rej =0;
    $count_acc =0;

    $id_acc = array();
    $id_reject = array();
    $id_inlegal = array();
    $id_double = array();

    $sql_legal = "select site_id from legal";
    $tmp_legal = mysql_query($sql_legal) or die(mysql_error());
    while($dt = mysql_fetch_array($tmp_legal)) {
        array_push($id_inlegal, $dt['site_id']);
    }
    //print_r($id_inlegal);
    if(isset($_FILES["upload_doc"])) {
        if ($_FILES["upload_doc"]["error"] > 0 )
          {
              echo "Error: " . $_FILES["upload_doc"]["error"] . "<br>";
          }
        else
          {
            $target_path1 = "file/" . basename( "temp_upload_".$_FILES['upload_doc']['name']); 
            if(move_uploaded_file($_FILES['upload_doc']['tmp_name'], $target_path1)){
                ini_set("display_errors",1);

                include '../excel_reader2.php'; 

                $connection=mysql_connect("localhost","root", "", false, 128); //do not use connection pool (mysql_pconnect) in mysql transaction
                    if (!$connection) {
                      echo "error connect ";
                      exit;
                    }
                    mysql_select_db("tamara");
                 
                $data = new Spreadsheet_Excel_Reader($target_path1);
                 
                //echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";
                 
                $html="<table border='1' style='font-size: 7pt'>";
                for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
                {    
                    if(count($data->sheets[$i]['cells'])>0) // checking sheet not empty
                    {
                        //echo "Sheet $i:<br /><br />Total rows in sheet $i  ".count($data->sheets[$i]['cells'])."<br />";
                        for($j=1;$j<=count($data->sheets[$i]['cells']);$j++) // loop used to get each row of the sheet
                        { 
                          if($j>1) {
                                $area = $data->sheets[$i]['cells'][$j][2];
                                $region = $data->sheets[$i]['cells'][$j][3];
                                $siteid = $data->sheets[$i]['cells'][$j][4];
                                $name = $data->sheets[$i]['cells'][$j][5];
                                $address = $data->sheets[$i]['cells'][$j][6];
                                $vendor = $data->sheets[$i]['cells'][$j][7];
                                $no = $data->sheets[$i]['cells'][$j][8];
                                $harga = $data->sheets[$i]['cells'][$j][9];
                                $awal = $data->sheets[$i]['cells'][$j][10];
                                $akhir = $data->sheets[$i]['cells'][$j][11];
                                $sub = $data->sheets[$i]['cells'][$j][12];
                                //$status = $data->sheets[$i]['cells'][$j][13];
                                $remarks = $data->sheets[$i]['cells'][$j][13];

                            if(in_array($siteid, $id_inlegal)){
                                $count_rej++;
                                $sql_reject = "select site_id, log_added, log_input from legal where site_id='".
                                                $siteid."';";
                                $tmp_reject = mysql_query($sql_reject) or die(mysql_error());
                                $dt = mysql_fetch_array($tmp_reject);
                                array_push($id_double, $siteid);
                                array_push($id_reject, $dt);
                                //print_r($id_reject);
                                //echo "<br />";
                            }
                            else {
                                $count_acc++;
                                $html.="<tr>";
                                for($k=1;$k<=count($data->sheets[$i]['cells'][$j]);$k++) // This loop is created to get data in a table format.
                                {
                                    $html.="<td>";
                                    $html.=$data->sheets[$i]['cells'][$j][$k];
                                    $html.="</td>";
                                }
                                array_push($id_acc, $siteid);
                                

                                
                                    $insertintolegal =  "insert into legal(site_id,site_area,site_region,site_name,site_address,vendor,".
                                                        "harga_pekerjaan,tgl_efektif_kontrak,tgl_akhir_kontrak,subkontraktor,remarks,log_added,log_input,no_kontrak) ".
                                                        "values ('". $siteid ."','". $area ."','". $region ."','". $name ."','". $address .
                                                        "','". $vendor ."','". $harga ."','". $awal ."','". $akhir ."', '". $sub ."','". $remarks ."',SYSDATE(),'EXCEL','".$no."');";
                         
                                    $result = mysql_query($insertintolegal);
                                    //echo $insertintolegal;
                                    //echo "<br />";
                                
                                $html.="</tr>";
                            }
                          }
                          else {
                                $html.="<tr>";
                                for($k=1;$k<=count($data->sheets[$i]['cells'][$j]);$k++) // This loop is created to get data in a table format.
                                {
                                    $html.="<td>";
                                    $html.=$data->sheets[$i]['cells'][$j][$k];
                                    $html.="</td>";
                                }
                          }
                        }
                    }
                }
                $html.="</table>";
                unlink($target_path1);
            }
            else
            {
                echo "There was an error uploading the file, please try again!";
            }
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
                    <h1 class="page-header">Input Data Legal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload Data dari EXCEL
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <label>File input</label> <input type="file" name="upload_doc" id="upload_doc">
                            <BR />
                            <table border = 0 align="LEFT">
                                                    <tr>
                                                        <td align="center" width="100px"><button type="submit" class="btn btn-info btn-circle" ><i class="fa fa-check"></i>
                                                            </button>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" width="100px">Upload</td>
                                                    </tr>
                                                </table>
                        </div>
                    </div>
                </div>                              
            </form>

            <?php if(isset($_FILES["upload_doc"])){ ?>
                <div class="row" id="keterangan_input">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Info Legal
                            </div>
                            <div class="panel-body">
                                <?php //echo $target_path1; ?>
                                <?php if($count_acc>0){
                                        echo $count_acc; ?> Data Berhasil ditambahkan dalam Database Legal, 
                                <?php if($count_acc<=50) { ?>
                                    berikut detail datanya :
                                    <br />
                                    <?php echo $html; ?>
                                <?php } else  { ?>
                                    dengan SITE_ID :
                                <?php foreach ($id_acc as $key) {
                                    echo $key." , ";
                                }}
                                    echo "<br />";
                                    echo "<br />";
                                    }?>
                                    
                                <?php if($count_rej>0){
                                    $string = "";
                                    echo $count_rej." Data Konflik dan tidak berhasil ditambahkan, cek LOG FILE dengan nama tanggal hari ini pada Folder D:/log_trouble pada PC anda untuk melihat detail Konflik.";
                                    $string.= $count_rej." Data Konflik dan tidak berhasil ditambahkan, dengan detail LOG berikut :\r\n";
                                    foreach ($id_reject as $key) {

                                    $string.= "SITE_ID : ".$key['site_id']." KONFLIK dengan data >> ".
                                        $key['site_id']." ditambahkan pada ".$key['log_added']." lewat data ".$key['log_input']."\r\n";
                                } 

                                $result = " SELECT date(sysdate()) as now, time(sysdate()) as now2";
                                
                                $results = mysql_query($result);
                                $arr_result = mysql_fetch_array($results);

                                $dir = "D:/log_trouble";

                                if( is_dir($dir) === false )
                                {
                                    mkdir($dir);
                                }

                                $myFile='D:/log_trouble/'.$arr_result['now'].'.txt';

                                if( is_file($myFile) === true )
                                {
                                    $i = 1;
                                    do
                                    {
                                        $myFile='D:/log_trouble/'.$arr_result['now'].'('.$i.').txt';
                                        $i++;   
                                    }
                                    while(is_file($myFile) === true);
                                }

                                
                                $fh = fopen($myFile, 'w') or die("can't open file");
                                fwrite($fh, $string);
                                fclose($fh);
                                }?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

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

</body>

</html>
