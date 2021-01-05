<?php

    include('session.php');

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
    <center>
    <table>
    <tr>
    <td style="width: 80px; border: none;">
     <img class="pull-right" width="75" height="75" src="img/<?php echo $sf_row['logo'];?>" />
    </td>
    
    <td style="border: none;">&nbsp;</td>
    
    <td style="border: none;">
    <center>
    <p style="margin: 4px; font-size: 28px; font-weight: bolder;"><?php echo strtoupper($schoolName); ?></p>
    <p style="margin: 4px; font-size: 22px;"><?php echo $sf_row['address']; ?></p>
    </center>
    </td>
    </tr>
    </table>
    </center>
    </td>
</tr>

<tr>
 
    
    <td style="border: none;">
    <center>
    <p style="margin: 4px; font-size: 22px;"><strong>DAILY ATTENDANCE - S.Y. <?php echo $sldq_row['schoolYear'];?></strong></p>
    <p style="margin: 4px; font-size: 18px;"><?php echo strtoupper($classData); ?></p>
    <p style="margin: 4px; font-size: 16px;"><?php echo strtoupper($dateWords); ?></p>
    </center>
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

$studData_query = $conn->query("SELECT * FROM students  WHERE class_id='$printClass_id' AND gender='Male' AND schoolYear='$activeSchoolYear' ORDER BY lname, fname ASC") or die(mysql_error());
while($studData_row=$studData_query->fetch())
{
    $RFTag_id=$studData_row['RFTag_id'];
    $maleCtr=$maleCtr+1;

    $studLogsScopeCHK_query = $conn->query("SELECT logFlow FROM student_logs WHERE RFTag_id='$RFTag_id' AND logDate='$printDate'") or die(mysql_error());
    $scopeCHK_row=$studLogsScopeCHK_query->fetch();
    
    if($scopeCHK_row['logFlow']==='AM IN' OR $scopeCHK_row['logFlow']==='AM OUT' OR $scopeCHK_row['logFlow']==='PM IN' OR $scopeCHK_row['logFlow']==='PM OUT' OR $studLogsScopeCHK_query->rowCount()<=0){ ?>

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
  
    <?php }elseif($scopeCHK_row['logFlow']==='TIME IN' OR $scopeCHK_row['logFlow']==='TIME OUT'){ ?>

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
    
    <!-- HALF DAY -->
    <td colspan="4"> 
    <table style="width: 98%; margin: 4px;" id="myTable">
     
    <thead>
    <tr>
    <th style="width: 50%;">HALF DAY IN</th>
    <th style="width: 50%;">HALF DAY OUT</th>
    </tr>
    </thead>
    
    
    <tr>
    <!-- TIME IN -->
    <td>
    <?php
    $studLogs_query_PM_IN = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='TIME IN' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_PM_IN_row=$studLogs_query_PM_IN->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_IN->rowCount()>0){ ?>
    
    
    <?php
    if($studLogs_PM_IN_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    <?php } }else{ ?>
    
    <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    
    <?php } ?>
    
    </td>
    
    
    <!-- TIME OUT -->
    <td>
    <?php
    $studLogs_query_PM_OUT = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='TIME OUT' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_PM_OUT_row=$studLogs_query_PM_OUT->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_OUT->rowCount()>0){ ?>
    
    <?php
    if($studLogs_PM_OUT_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_PM_OUT_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_PM_OUT_row['logTime']; ?> ]</p>
    <?php } }else{ ?>
        <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    <?php } ?>
    
    </td>
    </tr>
    </table>
    </td>
    </tr>
  
    <?php
        
    }elseif($scopeCHK_row['logFlow']==='OPEN IN' OR $scopeCHK_row['logFlow']==='OPEN OUT'){ ?>
    
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
    
    <!-- OPEN DAY -->
    <td colspan="4">
    
    <!-- OPEN IN / OPEN OUT TABLE -->
 
    <table style="width: 98%; margin: 4px;" id="myTable">
     
    <thead>
    <tr>
    <th style="width: 50%;">OPEN TIME IN</th>
    <th style="width: 50%;">OPEN TIME OUT</th>
    </tr>
    </thead>
     
    
    <tbody>
    
    <?php
    
    $in_gateLog_query = $conn->query("SELECT logTime, log_id FROM student_logs WHERE RFTag_id='$RFTag_id' AND logDate='$printDate' AND logFlow='OPEN IN' ORDER BY log_id ASC") or die(mysql_error());
    while ($in_gateLog_row = $in_gateLog_query->fetch()){
        
    $out_gateLog_query = $conn->query("SELECT logTime FROM student_logs WHERE ref_log_id='$in_gateLog_row[log_id]'") or die(mysql_error());
    $out_gateLog_row = $out_gateLog_query->fetch();
    
    ?>
    
    <tr>                         
    <td><?php echo $in_gateLog_row['logTime']; ?></td>
    <td><?php echo $out_gateLog_row['logTime']; ?></td>
    </tr>
    
    
    
    <?php } ?>
    </tbody>
    </table>
 
    </td>
    </tr>
        
    <?php } } ?>
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
    <center>
    <table>
    <tr>
    <td style="width: 80px; border: none;">
     <img class="pull-right" width="75" height="75" src="img/<?php echo $sf_row['logo'];?>" />
    </td>
    
    <td style="border: none;">&nbsp;</td>
    
    <td style="border: none;">
    <center>
    <p style="margin: 4px; font-size: 28px; font-weight: bolder;"><?php echo strtoupper($schoolName); ?></p>
    <p style="margin: 4px; font-size: 22px;"><?php echo $sf_row['address']; ?></p>
    </center>
    </td>
    </tr>
    </table>
    </center>
    </td>
</tr>

<tr>
 
    
    <td style="border: none;">
    <center>
    <p style="margin: 4px; font-size: 22px;"><strong>DAILY ATTENDANCE - S.Y. <?php echo $sldq_row['schoolYear'];?></strong></p>
    <p style="margin: 4px; font-size: 18px;"><?php echo strtoupper($classData); ?></p>
    <p style="margin: 4px; font-size: 16px;"><?php echo strtoupper($dateWords); ?></p>
    </center>
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

$studData_query = $conn->query("SELECT * FROM students  WHERE class_id='$printClass_id' AND gender='Female' AND schoolYear='$activeSchoolYear' ORDER BY lname, fname ASC") or die(mysql_error());
while($studData_row=$studData_query->fetch())
{     
    $RFTag_id=$studData_row['RFTag_id'];
    $maleCtr=$maleCtr+1;

    $studLogsScopeCHK_query = $conn->query("SELECT logFlow FROM student_logs WHERE RFTag_id='$RFTag_id' AND logDate='$printDate'") or die(mysql_error());
    $scopeCHK_row=$studLogsScopeCHK_query->fetch();
    
    if($scopeCHK_row['logFlow']==='AM IN' OR $scopeCHK_row['logFlow']==='AM OUT' OR $scopeCHK_row['logFlow']==='PM IN' OR $scopeCHK_row['logFlow']==='PM OUT' OR $scopeCHK_row['logFlow']==='PM OUT' OR $studLogsScopeCHK_query->rowCount()<=0){ ?>

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
  
    <?php }elseif($scopeCHK_row['logFlow']==='TIME IN' OR $scopeCHK_row['logFlow']==='TIME OUT'){ ?>

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
    
    <!-- HALF DAY -->
    <td colspan="4"> 
    <table style="width: 98%; margin: 4px;" id="myTable">
     
    <thead>
    <tr>
    <th style="width: 50%;">HALF DAY IN</th>
    <th style="width: 50%;">HALF DAY OUT</th>
    </tr>
    </thead>
    
    
    <tr>
    <!-- TIME IN -->
    <td>
    <?php
    $studLogs_query_PM_IN = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='TIME IN' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_PM_IN_row=$studLogs_query_PM_IN->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_IN->rowCount()>0){ ?>
    
    
    <?php
    if($studLogs_PM_IN_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    <?php } }else{ ?>
    
    <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    
    <?php } ?>
    
    </td>
    
    
    <!-- TIME OUT -->
    <td>
    <?php
    $studLogs_query_PM_OUT = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='TIME OUT' AND logDate='$printDate'") or die(mysql_error());
    $studLogs_PM_OUT_row=$studLogs_query_PM_OUT->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_OUT->rowCount()>0){ ?>
    
    <?php
    if($studLogs_PM_OUT_row['late_status']=="on"){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_PM_OUT_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_PM_OUT_row['logTime']; ?> ]</p>
    <?php } }else{ ?>
        <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    <?php } ?>
    
    </td>
    </tr>
    </table>
    </td>
    </tr>
  
    <?php
        
    }elseif($scopeCHK_row['logFlow']==='OPEN IN' OR $scopeCHK_row['logFlow']==='OPEN OUT'){ ?>
    
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
    
    <!-- OPEN DAY -->
    <td colspan="4">
    
    <!-- OPEN IN / OPEN OUT TABLE -->
 
    <table style="width: 98%; margin: 4px;" id="myTable">
     
    <thead>
    <tr>
    <th style="width: 50%;">OPEN TIME IN</th>
    <th style="width: 50%;">OPEN TIME OUT</th>
    </tr>
    </thead>
     
    
    <tbody>
    
    <?php
    
    $in_gateLog_query = $conn->query("SELECT logTime, log_id FROM student_logs WHERE RFTag_id='$RFTag_id' AND logDate='$printDate' AND logFlow='OPEN IN' ORDER BY log_id ASC") or die(mysql_error());
    while ($in_gateLog_row = $in_gateLog_query->fetch()){
        
    $out_gateLog_query = $conn->query("SELECT logTime FROM student_logs WHERE ref_log_id='$in_gateLog_row[log_id]'") or die(mysql_error());
    $out_gateLog_row = $out_gateLog_query->fetch();
    
    ?>
    
    <tr>                         
    <td><?php echo $in_gateLog_row['logTime']; ?></td>
    <td><?php echo $out_gateLog_row['logTime']; ?></td>
    </tr>
    
    
    
    <?php } ?>
    </tbody>
    </table>
 
    </td>
    </tr>
        
    <?php } } ?>
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
