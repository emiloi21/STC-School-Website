
  <?php include('session.php'); ?>

  <?php
 
    $printDate=substr($_GET['dateFrom'], 5,2).'/'.substr($_GET['dateFrom'], 8,2).'/'.substr($_GET['dateFrom'], 0,4);
    
    $printClass_id=$_GET['class_id'];

    $set_class_query = $conn->query("SELECT * FROM classes WHERE class_id='$printClass_id'") or die(mysql_error());
    $setClass_row = $set_class_query->fetch();
    
    $setGradeLevel=$setClass_row['gradeLevel'];
    $setStrand=$setClass_row['strand'];
    $setSection=$setClass_row['section'];
    
        if($setClass_row['dept']!="SHS")
        {
            $classData=$setGradeLevel." - ".$setSection;
        }else{
            $classData=$setGradeLevel." - ".$setStrand." - ".$setSection;
        }
     
    
                if(substr($_GET['dateFrom'], 5,2)=="01")
                {
                    
                    $mmWords="January";
                  
                }
                
                if(substr($_GET['dateFrom'], 5,2)=="02")
                {
                    $mmWords="February"; 
                }
                
                
                if(substr($_GET['dateFrom'], 5,2)=="03")
                {
                    $mmWords="March";
                }
                
                
                if(substr($_GET['dateFrom'], 5,2)=="04")
                {
                    $mmWords="April";
                }
                
                
                if(substr($_GET['dateFrom'], 5,2)=="05")
                {
                    $mmWords="May";

                }
                
                
                if(substr($_GET['dateFrom'], 5,2)=="06")
                {
                    $mmWords="June";
                }
                
                
                
                if(substr($_GET['dateFrom'], 5,2)=="07")
                {
                    $mmWords="July";
                }
                
                
                if(substr($_GET['dateFrom'], 5,2)=="08")
                {
                    $mmWords="August";
                }
                
                
                if(substr($_GET['dateFrom'], 5,2)=="09")
                {
                    $mmWords="September";
                }
                
                
                if(substr($_GET['dateFrom'], 5,2)=="10")
                {
                    $mmWords="October";
                }
                
                
                if(substr($_GET['dateFrom'], 5,2)=="11")
                {
                    $mmWords="November";
                }
                
                
                if(substr($_GET['dateFrom'], 5,2)=="12")
                {
                    $mmWords="December";
                }
                
                $dateWords=$mmWords.' '.substr($_GET['dateFrom'], 8,2).', '.substr($_GET['dateFrom'], 0,4);
           
  ?>
  
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
    $studLogsData_query = $conn->query("SELECT * FROM student_logs WHERE logDate='$printDate'") or die(mysql_error());
    $sldq_row=$studLogsData_query->fetch();
    
    if($studLogsData_query->rowCount()==0){ ?>
    
    <script>
    window.alert('No data to print for student Log Date: <?php echo $printDate; ?> ...');
    window.close();
    </script>
    
    <?php }else{ ?>
        
     

<table style="width: 100%;">

<tr>
<td style="border: none;">
<table>
<tr>

    <td style="width: 80px; border: none;" rowspan="3">
     <img class="pull-right" width="75" height="75" src="img/<?php echo $sf_row['logo'];?>" />
    </td>
    
    <td style="border: none;">&nbsp;</td>
    
    <td style="font-size: x-large; border: none;"> <?php echo $schoolName; ?> </td>

</tr>

<tr>
    <td style="border: none;">&nbsp;</td>
    <td style="border: none;">
    <?php echo $sf_row['address']; ?>
    </td>
</tr>

<tr>
    <td style="border: none;">&nbsp;</td>
    <td style="border: none;">
    S.Y. <?php echo $sldq_row['schoolYear'];?> <?php //echo $activeSemester; ?>
    </td>
</tr>
</table>
</td>

<td style="border: none;">
<table>
  <tr style="font-weight: light; font-size: 14px">
    <td style="width:30%; border: none;" colspan="5">
    <center>
    <p style="margin: 4px; font-size: 22px"><strong>DAILY ATTENDANCE</strong></p>
    <p style="margin: 4px; font-size: 18px"><?php echo strtoupper($classData); ?></p>
    <p style="margin: 4px; font-size: 16px"><?php echo strtoupper($dateWords); ?></p>
    </center>
    </td>
  </tr>
</table>

</td>
</tr>
</table>



<?php //include('docHeader.php'); ?>
  
<table id="myTable">
 
  <tr style="font-weight: light; font-size: 14px">
    
    <td style="width:40%;" rowspan="2"><center><strong>LEARNER'S NAME</strong></center></td>
    <td style="width:30%;" colspan="2"><center><strong>A M</strong></center></td>
    <td style="width:30%;" colspan="2"><center><strong>P M</strong></center></td>
    
     
  </tr>
  
  <tr style="font-weight: light; font-size: 14px">
 
    
    <td style="width:15%;"><center>IN</center></td>
    <td style="width:15%;"><center>OUT</center></td>
    <td style="width:15%;"><center>IN</center></td>
    <td style="width:15%;"><center>OUT</center></td>
     
  </tr>
  
  <tr class="header">
    
    <th colspan="5">MALE</th>
     
  </tr>
<?php

$maleCtr=0;

$studData_query = $conn->query("select * FROM students  WHERE class_id='$printClass_id' AND gender='Male' AND schoolYear='$activeSchoolYear' ORDER BY lname, fname ASC") or die(mysql_error());
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
    $studLogs_query_AM_IN = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_AM_IN_row=$studLogs_query_AM_IN->fetch();
    ?>
    
    <?php
    if($studLogs_query_AM_IN->rowCount()>0){ ?>
    
    <?php
    if($studLogs_AM_IN_row['logFlow']=="AM IN"){
        
    }elseif($studLogs_AM_IN_row['logFlow']=="TIME IN"){
        
    }elseif($studLogs_AM_IN_row['logFlow']=="OPEN IN"){
        
    }
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

<table style="width: 100%;">

<tr>
<td style="border: none;">
<table>
<tr>

    <td style="width: 80px; border: none;" rowspan="3">
     <img class="pull-right" width="75" height="75" src="img/<?php echo $sf_row['logo'];?>" />
    </td>
    
    <td style="border: none;">&nbsp;</td>
    
    <td style="font-size: x-large; border: none;"> <?php echo $schoolName; ?> </td>

</tr>

<tr>
    <td style="border: none;">&nbsp;</td>
    <td style="border: none;">
    <?php echo $sf_row['address']; ?>
    </td>
</tr>

<tr>
    <td style="border: none;">&nbsp;</td>
    <td style="border: none;">
    S.Y. <?php echo $sldq_row['schoolYear'];?> <?php //echo $activeSemester; ?>
    </td>
</tr>
</table>
</td>

<td style="border: none;">
<table>
  <tr style="font-weight: light; font-size: 14px">
    <td style="width:30%; border: none;" colspan="5">
    <center>
    <p style="margin: 4px; font-size: 22px"><strong>DAILY ATTENDANCE</strong></p>
    <p style="margin: 4px; font-size: 18px"><?php echo strtoupper($classData); ?></p>
    <p style="margin: 4px; font-size: 16px"><?php echo strtoupper($dateWords); ?></p>
    </center>
    </td>
  </tr>
</table>

</td>
</tr>
</table>
  
<table id="myTable">

  <tr style="font-weight: light; font-size: 14px">
    
    <td style="width:30%;" rowspan="2"><center><strong>LEARNER'S NAME</strong></center></td>
    <td style="width:35%;" colspan="2"><center><strong>A M</strong></center></td>
    <td style="width:35%;" colspan="2"><center><strong>P M</strong></center></td>
    
     
  </tr>
  
  <tr style="font-weight: light; font-size: 14px">
    <td style="width:17.5%;"><center>IN</center></td>
    <td style="width:17.5%;"><center>OUT</center></td>
    <td style="width:17.5%;"><center>IN</center></td>
    <td style="width:17.5%;"><center>OUT</center></td>
  </tr>

  <tr class="header">
    
    <th colspan="5">FEMALE</th>
     
  </tr>
<?php

$maleCtr=0;

$studData_query = $conn->query("select * FROM students  WHERE class_id='$printClass_id' AND gender='Female' AND schoolYear='$activeSchoolYear' ORDER BY lname, fname ASC") or die(mysql_error());
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
 
<?php } ?>
</body>
</html>
