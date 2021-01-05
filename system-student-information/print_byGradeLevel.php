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
                
                $classDetails_query = $conn->query("SELECT gradeLevel, strand, section, dept FROM classes WHERE gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]'") or die(mysql_error());
                $cDetails_row = $classDetails_query->fetch();
       
                    if($cDetails_row['strand']=="N/A")
                    {
                        $classDetails=$cDetails_row['gradeLevel']." - ".$cDetails_row['section'];
                    }else{
                        $classDetails=$cDetails_row['gradeLevel']." - ".$cDetails_row['strand']." - ".$cDetails_row['section'];
                    }
                    
                ?>
                
                <?php $docType="LIST OF ENROLEES"." <br /><small>S.Y. ".$data_src_sy."</small>"; ?>
                <?php $groupDetails=$classDetails; ?>
                
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                title: '<?php include('header_print_letterHead.php'); ?>',
                messageTop: '<hr /><table style="width: 100%;"><tr><td style="border: none; width: 50%;"><p style="margin-bottom: 12px;"><?php if($cDetails_row['strand']=="N/A"){ echo "Grade Level: "; }else{ echo "Grade Level - Strand: "; } ?> <strong style="text-decoration-line: underline;"><?php if($cDetails_row['strand']=="N/A"){ echo $cDetails_row['gradeLevel']; }else{ echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']; } ?></strong></p></td><td style="border: none; width: 50%;"><p style="margin-bottom: 12px;">Sex: <strong style="text-decoration-line: underline;">Male</strong></p></td></tr><table>',
                messageBottom: '<br /><center><?php echo strtoupper($schoolName); ?> | Office of the Registrar | <i class="fa fa-print"></i> <?php echo date('m/d/Y'); ?></center>'
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
                messageTop: '<hr /><table style="width: 100%;"><tr><td style="border: none; width: 50%;"><p style="margin-bottom: 12px;"><?php if($cDetails_row['strand']=="N/A"){ echo "Grade Level: "; }else{ echo "Grade Level - Strand: "; } ?> <strong style="text-decoration-line: underline;"><?php if($cDetails_row['strand']=="N/A"){ echo $cDetails_row['gradeLevel']; }else{ echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']; } ?></strong></p></td><td style="border: none; width: 50%;"><p style="margin-bottom: 12px;">Sex: <strong style="text-decoration-line: underline;">Female</strong></p></td></tr><table>',
                messageBottom: '<br /><center><?php echo strtoupper($schoolName); ?> | Office of the Registrar | <i class="fa fa-print"></i> <?php echo date('m/d/Y'); ?></center>'
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
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>LRN</th>
                              <th>LAST NAME</th>
                              <th>FIRST NAME</th>
                              <th>SUFFIX</th>
                              <th>MIDDLE NAME</th>
                              <th>LAST SCHOOL</th>
                              <th>TYPE</th>
                              <th>GEN. AVE.</th>
                              <th>REMARKS</th>
                            </tr>
                          </thead>
                          <tbody>
                          
                
                                    
                                <?php
                                $maleCtr=0;
                                
                                $printDataAge_query = $conn->query("SELECT lrn, lname, fname, mname, suffix, lastSchool, schoolType, genAve FROM students WHERE gender='Male' AND  gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]' AND schoolYear='$data_src_sy' ORDER BY lname, fname ASC") or die(mysql_error());
                                while ($printDA_row=$printDataAge_query->fetch())
                                { $maleCtr=$maleCtr+1; ?>
                         
                            <tr>
                            
                            <td><?php echo $maleCtr.". ";?></td>
                            <td><?php echo $printDA_row['lrn']; ?></td>
                            <td><?php echo $printDA_row['lname']; ?></td>
                            <td><?php echo $printDA_row['fname']; ?></td>
                            <td><?php echo $printDA_row['suffix']; ?></td>
                            <td><?php echo $printDA_row['mname']; ?></td>
                            <td><?php echo $printDA_row['lastSchool']; ?></td>
                            <td><?php echo $printDA_row['schoolType']; ?></td>
                            <td><?php echo $printDA_row['genAve']; ?></td>
                            <td></td>
                            </tr>
                            
                            <?php }  ?>
                           
                          </tbody>
                        </table>
                        </div>
                        </div>
              
                    <div class="col-lg-12" style="margin-top: 24px;">
                     
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="example2" class="display" style="width:100%">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>LRN</th>
                              <th>LAST NAME</th>
                              <th>FIRST NAME</th>
                              <th>SUFFIX</th>
                              <th>MIDDLE NAME</th>
                              <th>LAST SCHOOL</th>
                              <th>TYPE</th>
                              <th>GEN. AVE.</th>
                              <th>REMARKS</th>
                            </tr>
                          </thead>
                          <tbody>
                          
                
                                    
                                <?php
                                $maleCtr=0;
                                
                                $printDataAge_query = $conn->query("SELECT lrn, lname, fname, mname, suffix, lastSchool, schoolType, genAve FROM students WHERE gender='Female' AND  gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]' AND schoolYear='$data_src_sy' ORDER BY lname, fname ASC") or die(mysql_error());
                                while ($printDA_row=$printDataAge_query->fetch())
                                { $maleCtr=$maleCtr+1; ?>
                         
                            <tr>
                            
                            <td><?php echo $maleCtr.". ";?></td>
                            
                            <td><?php echo $printDA_row['lrn']; ?></td>
                            <td><?php echo $printDA_row['lname']; ?></td>
                            <td><?php echo $printDA_row['fname']; ?></td>
                            <td><?php echo $printDA_row['suffix']; ?></td>
                            <td><?php echo $printDA_row['mname']; ?></td>
                            <td><?php echo $printDA_row['lastSchool']; ?></td>
                            <td><?php echo $printDA_row['schoolType']; ?></td>
                            <td><?php echo $printDA_row['genAve']; ?></td>
                            <td></td>
                            </tr>
                            
                            <?php }  ?>
                           
                          </tbody>
                        </table>
                        </div>
                        </div>
                        
                 
    </div>
</div>
</body>
</html>
       
            