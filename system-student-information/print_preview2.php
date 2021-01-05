
  <?php include('session.php'); ?>
  
 
<!DOCTYPE html>
<html>
<head>
<title>RAS - SMS v. 2.0</title>
<meta name="description" content="RFID Attendance Monitoring with SMS">
<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
<link rel="shortcut icon" href="img/ras_logo.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

 
#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 12px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 6px;
}

#myTable tr, td {
  border: 1px solid #ddd;
  
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

.pb{
    page-break-after: always;
     
}
</style>
</head>






<body>


  <?php
  
    $printDateFrom=$_GET['dateFrom'];
    $printDateTo=$_GET['dateTo'];
    $printClass_id=$_GET['class_id'];
    

    $set_class_query = $conn->query("select * FROM classes WHERE class_id='$printClass_id'") or die(mysql_error());
    $setClass_row = $set_class_query->fetch();
    
    $setGradeLevel=$setClass_row['gradeLevel'];
    $setStrand=$setClass_row['strand'];
    $setSection=$setClass_row['section'];
    
        if($setStrand=="N/A")
        {
            $classData="<strong>Grade Level - Section:</strong> ".$setGradeLevel." - ".$setSection;
        }else{
            $classData="<strong>Grade Level - Strand - Section:</strong> ".$setGradeLevel." - ".$setStrand." - ".$setSection;
        }
 
  
        $studLogs_query = $conn->query("select DISTINCT logDate FROM student_logs WHERE (logDate BETWEEN '$printDateFrom' AND '$printDateTo') ORDER BY log_id ASC") or die(mysql_error());
        while($studLogs_row = $studLogs_query->fetch())
        {
            
        $printDate=$studLogs_row['logDate'];


  ?>
 
<?php include('docHeader.php'); ?>
  
<table id="myTable">

  <tr style="font-weight: light; font-size: 14px">
    
    <td style="width:40%;">Learner's Name</td>
    <td style="width:15%;">AM IN</td>
    <td style="width:15%;">AM OUT</td>
    <td style="width:15%;">PM IN</td>
    <td style="width:15%;">PM OUT</td>
     
  </tr>

  <tr class="header">
    
    <th colspan="5">MALE</th>
     
  </tr>
<?php

$maleCtr=0;

$studData_query = $conn->query("select * FROM students  WHERE gradeLevel='$setGradeLevel' AND strand='$setStrand' AND section='$setSection' AND gender='Male' AND schoolYear='$activeSchoolYear' ORDER BY lname, fname ASC") or die(mysql_error());
while($studData_row=$studData_query->fetch())
{   
    $RFTag_id=$studData_row['RFTag_id'];
    $maleCtr=$maleCtr+1;
    
    ?>

  <tr>
    <td><?php echo $maleCtr; ?>.&nbsp;
    <?php
    
    $mname=$studData_row['mname'];
            
    if($mname=='')
    {
 
            echo $studData_row['lname'].", ".$studData_row['fname'];
            
    }else{
            
            $suffix=$studData_row['suffix'];
            
            if($suffix === '-') { $suffix=''; }else{ $suffix=$suffix.' '; }
            
            $finalMName=$suffix.substr($mname, 0, 1).'.';
            
            echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName;
            
    }
 
 
    ?>
    </td>
    
    <!-- AM IN -->
    <td>
    <?php
    $studLogs_query_AM_IN = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='AM IN' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_AM_IN_row=$studLogs_query_AM_IN->fetch();
    ?>
    
    <?php
    if($studLogs_query_AM_IN->rowCount()>0){ ?>
 
    <?php
    if($studLogs_AM_IN_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_AM_IN_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_AM_IN_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{ ?>
        <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    <?php } ?>
    
    </td>
    
    
    <!-- AM OUT -->
    <td>
    <?php
    $studLogs_query_AM_OUT = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='AM OUT' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_AM_OUT_row=$studLogs_query_AM_OUT->fetch();
    ?>
    
    <?php
    if($studLogs_query_AM_OUT->rowCount()>0){ ?>
    
    <?php
    if($studLogs_AM_OUT_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_AM_OUT_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_AM_OUT_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{ ?>
    
    <?php
    $studLogs_query_PM_OUT_chk = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM OUT' AND logDate='$printDate'") or die(mysql_error());
    
    if($studLogs_query_PM_OUT_chk->rowCount()>0 AND $studLogs_query_AM_IN->rowCount()>0){ }else{ ?>
    
    <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    
    <?php } } ?>
    
    
    </td>
    
    
    <!-- PM IN -->
    <td>
    <?php
    $studLogs_query_PM_IN = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM IN' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_PM_IN_row=$studLogs_query_PM_IN->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_IN->rowCount()>0){ ?>
    
    
    <?php
    if($studLogs_PM_IN_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{ ?>
    
    <?php
    $studLogs_query_PM_OUT_chk = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM OUT' AND logDate='$printDate'") or die(mysql_error());
    
    if($studLogs_query_PM_OUT_chk->rowCount()>0 AND $studLogs_query_AM_IN->rowCount()>0){ }else{ ?>
    
    <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    
    <?php } } ?>
    
    </td>
    
    
    <!-- PM OUT -->
    <td>
    <?php
    $studLogs_query_PM_OUT = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM OUT' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_PM_OUT_row=$studLogs_query_PM_OUT->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_OUT->rowCount()>0){ ?>
    
    <?php
    if($studLogs_PM_OUT_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_PM_OUT_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_PM_OUT_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{ ?>
        <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    <?php } ?>
    
    </td>
  </tr>

<?php } ?>
<tr>
<td colspan="5">
<center>
<strong>*** NOTHING FOLLOWS ***</strong>
</center>
</td>
</tr>
</table>





<h1 class="pb"></h1>

<?php include('docHeader.php'); ?>
  
<table id="myTable">

  <tr style="font-weight: light; font-size: 14px">
    
    <td style="width:40%;">Learner's Name</td>
    <td style="width:15%;">AM IN</td>
    <td style="width:15%;">AM OUT</td>
    <td style="width:15%;">PM IN</td>
    <td style="width:15%;">PM OUT</td>
     
  </tr>

  <tr class="header">
    
    <th colspan="5">FEMALE</th>
     
  </tr>
<?php

$maleCtr=0;

$studData_query = $conn->query("select * FROM students  WHERE gradeLevel='$setGradeLevel' AND strand='$setStrand' AND section='$setSection' AND gender='Female' AND schoolYear='$activeSchoolYear' ORDER BY lname, fname ASC") or die(mysql_error());
while($studData_row=$studData_query->fetch())
{   
    $RFTag_id=$studData_row['RFTag_id'];
    $maleCtr=$maleCtr+1;
    
    ?>

  <tr>
    <td><?php echo $maleCtr; ?>.&nbsp;
    <?php
    $mname=$studData_row['mname'];
            
    if($mname=='')
    {
 
            echo $studData_row['lname'].", ".$studData_row['fname'];
            
    }else{
            
            $suffix=$studData_row['suffix'];
            
            if($suffix === '-') { $suffix=''; }else{ $suffix=$suffix.' '; }
            
            $finalMName=$suffix.substr($mname, 0, 1).'.';
            
            echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName;
            
    }
    ?>
    </td>
    
    <!-- AM IN -->
    <td>
    <?php
    $studLogs_query_AM_IN = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='AM IN' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_AM_IN_row=$studLogs_query_AM_IN->fetch();
    ?>
    
    <?php
    if($studLogs_query_AM_IN->rowCount()>0){ ?>
 
    <?php
    if($studLogs_AM_IN_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_AM_IN_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_AM_IN_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{ ?>
        <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    <?php } ?>
    
    </td>
    
    
    <!-- AM OUT -->
    <td>
    <?php
    $studLogs_query_AM_OUT = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='AM OUT' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_AM_OUT_row=$studLogs_query_AM_OUT->fetch();
    ?>
    
    <?php
    if($studLogs_query_AM_OUT->rowCount()>0){ ?>
    
    <?php
    if($studLogs_AM_OUT_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_AM_OUT_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_AM_OUT_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{ ?>
    
    <?php
    $studLogs_query_PM_OUT_chk = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM OUT' AND logDate='$printDate'") or die(mysql_error());
    
    if($studLogs_query_PM_OUT_chk->rowCount()>0 AND $studLogs_query_AM_IN->rowCount()>0){ }else{ ?>
    
    <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    
    <?php } } ?>
    
    </td>
    
    
    <!-- PM IN -->
    <td>
    <?php
    $studLogs_query_PM_IN = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM IN' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_PM_IN_row=$studLogs_query_PM_IN->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_IN->rowCount()>0){ ?>
    
    <?php
    if($studLogs_PM_IN_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{ ?>

    <?php
    $studLogs_query_PM_OUT_chk = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM OUT' AND logDate='$printDate'") or die(mysql_error());
    
    if($studLogs_query_PM_OUT_chk->rowCount()>0 AND $studLogs_query_AM_IN->rowCount()>0){ }else{ ?>
    
    <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    
    <?php } } ?>
    
    </td>
    
    
    <!-- PM OUT -->
    <td>
    <?php
    $studLogs_query_PM_OUT = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM OUT' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_PM_OUT_row=$studLogs_query_PM_OUT->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_OUT->rowCount()>0){ ?>
    
    <?php
    if($studLogs_PM_OUT_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_PM_OUT_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_PM_OUT_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{ ?>
        <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    <?php } ?>
    
    </td>
  </tr>

<?php } ?>
<tr>
<td colspan="5">
<center>
<strong>*** NOTHING FOLLOWS ***</strong>
</center>
</td>
</tr>
</table>
<h1 class="pb"></h1>
<?php } ?>

</body>
</html>
