<!DOCTYPE html>
<html>

<?php include('session.php');  ?>

<head>
<title>Student Imformation - SMS v. 1.0</title>
<meta name="description" content="RFID Attendance Monitoring with SMS">
<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
<link rel="shortcut icon" href="../img/<?php echo $sf_row['logo']; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- data table -->
 
    <style>
    div.dataTables_wrapper {
        margin-bottom: 3em;
    }
    
    table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    table td, table th {
      border: 1px solid #ddd;
      padding: 2px;
      font-family: Verdana, sans-serif;
      font-size: 12px;
    }
    
    table tr:nth-child(even){background-color: #f2f2f2;}
    
    table tr:hover {background-color: #fff;} 
    
    table th {
      padding-top: 2px;
      padding-bottom: 2px;
      text-align: left;
      background-color: #fff;
      color: black;
    }

    .pb{
       page-break-after: always; 
    }
     
    body{
        font-family: Verdana, sans-serif;
        font-size: 12px;
    }
    </style>
    
    <style>
    #load{
        width:100%;
        height:100%;
        position:fixed;
        z-index:9999;
        background:url("../img/ajax-loader.gif") no-repeat center center transparent;
    }
    </style>
    
    
    <script src="../vendor/jquery/jquery.min.js"></script>
    
    <script>
    document.onreadystatechange = function () {
      var state = document.readyState
      if (state == 'interactive') {
           document.getElementById('contents').style.visibility="hidden";
      } else if (state == 'complete') {
          setTimeout(function(){
             document.getElementById('interactive');
             document.getElementById('load').style.visibility="hidden";
             document.getElementById('contents').style.visibility="visible";
          },1000);
      }
    }
    
    </script>
    
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="../DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../DataTables/Buttons-1.6.1/js/buttons.print.min.js"></script>
    
</head>

<body>

<div id="load"></div>
 
                <?php
                
                $classDetails_query = $conn->query("SELECT gradeLevel, strand, section, dept FROM classes WHERE class_id='$_GET[class_id]'") or die(mysql_error());
                $cDetails_row = $classDetails_query->fetch();
                
                        $classDetails=$cDetails_row['gradeLevel']." - ".$cDetails_row['section'];
                        
                ?>
                
                <?php $docType="GRADE SHEETS"." <br /><small>S.Y. ".$data_src_sy."</small>"; ?>
                <?php $groupDetails=$classDetails; ?>

                
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                title: '<?php include('header_print_letterHead.php'); ?>',
                messageTop: '<hr /><table style="width: 100%;"><tr><td style="border: none; width: 50%;"><p style="margin-bottom: 12px;"><?php if($cDetails_row['strand']=="N/A"){ echo "Grade Level: "; }else{ echo "Grade Level - Strand: "; } ?> <strong style="text-decoration-line: underline;"><?php if($cDetails_row['strand']=="N/A"){ echo $cDetails_row['gradeLevel']; }else{ echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']; } ?></strong></p></td><td style="border: none; width: 35%;"><p style="margin-bottom: 12px;">Section: <strong style="text-decoration-line: underline;"><?php echo $cDetails_row['section']; ?></strong></p></td><td style="border: none; width: 15%;"><p style="margin-bottom: 12px;">Sex: <strong style="text-decoration-line: underline;">Male</strong></p></td></tr><tr><td style="border: none;" colspan="2"><p style="margin-bottom: 12px;">Subject Teacher: ________________________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Subject: ________________________________________</p></td></tr></table>',
                messageBottom: '<br /><table style="width: 100%;"><tr><th style="width: 40%; border: none;">Prepared by:</th><th style="width: 60%; border: none;">Checked by:</th></tr><tr><td style="border: none;"><p style="margin-bottom: 12px;"><?php if($_GET['sem']==='1st Semester'){ echo '1st Quarter: ________________________________</p><p style="margin-bottom: 12px;">2nd Quarter: ________________________________</p>'; }else{ echo '3rd Quarter: ________________________________</p><p style="margin-bottom: 12px;">4th Quarter: ________________________________</p>'; }?></td><td style="border: none;"><?php if($_GET['sem']==='1st Semester'){ echo '<p style="margin-bottom: 12px;">1st Quarter: ________________________________ Date: ___/___/________</p><p style="margin-bottom: 12px;">2nd Quarter: ________________________________ Date: ___/___/________</p>'; }else{ echo '<p style="margin-bottom: 12px;">3rd Quarter: ________________________________ Date: ___/___/________</p><p style="margin-bottom: 12px;">4th Quarter: ________________________________ Date: ___/___/________</p>'; } ?></td></tr></table><hr /><center><?php echo strtoupper($schoolName); ?> | Office of the Registrar | <i class="fa fa-print"></i> <?php echo date('m/d/Y'); ?></center>'
            }
        ]
    } );
} );
</script>

<script>
$(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                title: '<?php include('header_print_letterHead.php'); ?>',
                messageTop: '<hr /><table style="width: 100%;"><tr><td style="border: none; width: 50%;"><p style="margin-bottom: 12px;"><?php if($cDetails_row['strand']=="N/A"){ echo "Grade Level: "; }else{ echo "Grade Level - Strand: "; } ?> <strong style="text-decoration-line: underline;"><?php if($cDetails_row['strand']=="N/A"){ echo $cDetails_row['gradeLevel']; }else{ echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']; } ?></strong></p></td><td style="border: none; width: 35%;"><p style="margin-bottom: 12px;">Section: <strong style="text-decoration-line: underline;"><?php echo $cDetails_row['section']; ?></strong></p></td><td style="border: none; width: 15%;"><p style="margin-bottom: 12px;">Sex: <strong style="text-decoration-line: underline;">Female</strong></p></td></tr><tr><td style="border: none;" colspan="2"><p style="margin-bottom: 12px;">Subject Teacher: ________________________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Subject: ________________________________________</p></td></tr></table>',
                messageBottom: '<br /><table style="width: 100%;"><tr><th style="width: 40%; border: none;">Prepared by:</th><th style="width: 60%; border: none;">Checked by:</th></tr><tr><td style="border: none;"><p style="margin-bottom: 12px;"><?php if($_GET['sem']==='1st Semester'){ echo '1st Quarter: ________________________________</p><p style="margin-bottom: 12px;">2nd Quarter: ________________________________</p>'; }else{ echo '3rd Quarter: ________________________________</p><p style="margin-bottom: 12px;">4th Quarter: ________________________________</p>'; }?></td><td style="border: none;"><?php if($_GET['sem']==='1st Semester'){ echo '<p style="margin-bottom: 12px;">1st Quarter: ________________________________ Date: ___/___/________</p><p style="margin-bottom: 12px;">2nd Quarter: ________________________________ Date: ___/___/________</p>'; }else{ echo '<p style="margin-bottom: 12px;">3rd Quarter: ________________________________ Date: ___/___/________</p><p style="margin-bottom: 12px;">4th Quarter: ________________________________ Date: ___/___/________</p>'; } ?></td></tr></table><hr /><center><?php echo strtoupper($schoolName); ?> | Office of the Registrar | <i class="fa fa-print"></i> <?php echo date('m/d/Y'); ?></center>'
            }
        ]
    } );
} );
</script>
<div class="col-lg-12">
    <div class="row">
    
                    <div class="col-lg-12">
                    <?php include('header_print_letterHead.php'); ?>
                    <hr />
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="example" class="display" style="width:100%">
                          <?php if($_GET['sem']==='1st Semester'){ ?>
                          <thead>
                            <tr>
                              <th>LEARNER'S NAME</th>
                              <th>1<sup>ST</sup> QUARTER</th>
                              <th>REMARKS</th>
                              <th>2<sup>ND</sup> QUARTER</th>
                              <th>REMARKS</th>
                            </tr>
                          </thead>
                          <?php }else{ ?>
                          <thead>
                            <tr>
                              <th>LEARNER'S NAME</th>
                              <th>3<sup>RD</sup> QUARTER</th>
                              <th>REMARKS</th>
                              <th>4<sup>TH</sup> QUARTER</th>
                              <th>REMARKS</th>
                            </tr>
                          </thead>
                          <?php } ?>
                          
                          <tbody>
                          
                
                                    
                                <?php
                                $maleCtr=0;
                                
                                $studData_query = $conn->query("SELECT lrn, lname, fname, mname, suffix FROM students WHERE gender='Male' AND class_id='$_GET[class_id]' AND schoolYear='$data_src_sy' ORDER BY lname, fname ASC") or die(mysql_error());
                                while ($studData_row=$studData_query->fetch())
                                { $maleCtr=$maleCtr+1;
                                
                                if($studData_row['mname']=='')
                                {
                                    $finalMName='';
                                    
                                }else{
                                    
                                    if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                                    
                                    $finalMName=$suffix.$studData_row['mname'];
                                }
                                
                                ?>
                            
                                <?php if($_GET['sem']==='1st Semester'){ ?>
                                <tr>
                                <td><?php echo $maleCtr.". ";?><?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?></td>
                                
                                <td></td>
                                <td></td>
                                
                                <td></td>
                                <td></td>
                                </tr>
                                <?php }else{ ?>
                                <tr>
                                <td><?php echo $maleCtr.". ";?><?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?></td>
                                
                                <td></td>
                                <td></td>
                                
                                <td></td>
                                <td></td>
                                </tr>      
                                <?php } ?>
                          

                            
                            <?php }  ?>
                           
                          </tbody>
                        </table>
                        </div>
                        </div>
              
                    <div class="col-lg-12" style="margin-top: 24px;">
                     
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="example2" class="display" style="width:100%">
                          <?php if($_GET['sem']==='1st Semester'){ ?>
                          <thead>
                            <tr>
                              <th>LEARNER'S NAME</th>
                              <th>1<sup>ST</sup> QUARTER</th>
                              <th>REMARKS</th>
                              <th>2<sup>ND</sup> QUARTER</th>
                              <th>REMARKS</th>
                            </tr>
                          </thead>
                          <?php }else{ ?>
                          <thead>
                            <tr>
                              <th>LEARNER'S NAME</th>
                              <th>3<sup>RD</sup> QUARTER</th>
                              <th>REMARKS</th>
                              <th>4<sup>TH</sup> QUARTER</th>
                              <th>REMARKS</th>
                            </tr>
                          </thead>
                          <?php } ?>
                          
                          <tbody>
                          
                
                                    
                                <?php
                                $maleCtr=0;
                                
                                $studData_query = $conn->query("SELECT lrn, lname, fname, mname, suffix FROM students WHERE gender='Male' AND class_id='$_GET[class_id]' AND schoolYear='$data_src_sy' ORDER BY lname, fname ASC") or die(mysql_error());
                                while ($studData_row=$studData_query->fetch())
                                { $maleCtr=$maleCtr+1;
                                
                                if($studData_row['mname']=='')
                                {
                                    $finalMName='';
                                    
                                }else{
                                    
                                    if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                                    
                                    $finalMName=$suffix.$studData_row['mname'];
                                }
                                
                                ?>
                            
                                <?php if($_GET['sem']==='1st Semester'){ ?>
                                <tr>
                                <td><?php echo $maleCtr.". ";?><?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?></td>
                                
                                <td></td>
                                <td></td>
                                
                                <td></td>
                                <td></td>
                                </tr>
                                <?php }else{ ?>
                                <tr>
                                <td><?php echo $maleCtr.". ";?><?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?></td>
                                
                                <td></td>
                                <td></td>
                                
                                <td></td>
                                <td></td>
                                </tr>      
                                <?php } ?>
                          

                            
                            <?php }  ?>
                           
                          </tbody>
                        </table>
                        </div>
                        </div>
                        
                 
    </div>
</div>

</body>
</html>
       
            