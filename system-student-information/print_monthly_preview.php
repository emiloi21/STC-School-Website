<?php

include('session.php');  
    
    
    //output bdaymonth=2019-04
  $get_RFTag_id=$_GET['RFTag_id'];
  $selectedMM=substr($_GET['dateFrom'], 5,2);
  $selectedYYYY=substr($_GET['dateFrom'], 0,4);
  
  
  $printClass_id=$_GET['class_id'];
  
  
                 
                if($selectedMM=="01")
                {
                    
                    $mmWords="January";
                    $MMmaxDay=32;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/31/'.$selectedYYYY;
    
                }
                
                if($selectedMM=="02")
                {
                    $mmWords="February";
                    
                    $leap = date('L', mktime(0, 0, 0, 1, 1, $selectedYYYY));
            
                    if($leap==0)
                    {
                    $MMmaxDay=29;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/28/'.$selectedYYYY;
                    
                    }else{
                    $MMmaxDay=30;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/29/'.$selectedYYYY;
                            
                    }
                    
                }
                
                
                if($selectedMM=="03")
                {
                    $mmWords="March";
                    $MMmaxDay=32;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/31/'.$selectedYYYY;
                      
                }
                
                
                if($selectedMM=="04")
                {
                    $mmWords="April";
                    $MMmaxDay=31;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/30/'.$selectedYYYY; 
                }
                
                
                if($selectedMM=="05")
                {
                    $mmWords="May";
                    $MMmaxDay=32;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/31/'.$selectedYYYY;
                }
                
                
                if($selectedMM=="06")
                {
                    $mmWords="June";
                    $MMmaxDay=31;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/30/'.$selectedYYYY;
                }
                
                
                
                if($selectedMM=="07")
                {
                    $mmWords="July";
                    $MMmaxDay=32;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/31/'.$selectedYYYY;
                }
                
                
                if($selectedMM=="08")
                {
                    $mmWords="August";
                    $MMmaxDay=32;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/31/'.$selectedYYYY;
                }
                
                
                if($selectedMM=="09")
                {
                    $mmWords="September";
                    $MMmaxDay=31;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/30/'.$selectedYYYY;
                }
                
                
                if($selectedMM=="10")
                {
                    $mmWords="October";
                    $MMmaxDay=32;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/31/'.$selectedYYYY;
                }
                
                
                if($selectedMM=="11")
                {
                    $mmWords="November";
                    $MMmaxDay=31;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/30/'.$selectedYYYY;
                }
                
                
                if($selectedMM=="12")
                {
                    $mmWords="December";
                    $MMmaxDay=32;
                    
                    $logDateCtrchk_from=$selectedMM.'/01/'.$selectedYYYY;
                    $logDateCtrchk_to=$selectedMM.'/31/'.$selectedYYYY;
                }
 
 

    $set_class_query = $conn->query("select * FROM classes WHERE class_id='$printClass_id'") or die(mysql_error());
    $setClass_row = $set_class_query->fetch();
    
    $setGradeLevel=$setClass_row['gradeLevel'];
    $setStrand=$setClass_row['strand'];
    $setSection=$setClass_row['section'];
    
        if($setStrand=="N/A")
        {
            $classData=$setGradeLevel." - ".$setSection;
        }else{
            $classData=$setGradeLevel." - ".$setStrand." - ".$setSection;
        }

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
 
                  
    $studLogsData_query = $conn->query("select * FROM student_logs WHERE logDate BETWEEN '$logDateCtrchk_from' AND '$logDateCtrchk_to'") or die(mysql_error());

    if($studLogsData_query->rowCount()==0){
        
    $studData_query = $conn->query("select * FROM students WHERE RFTag_id='$get_RFTag_id'") or die(mysql_error());
    $studData_row=$studData_query->fetch();
    
    if($mname=='')
    {
 
            $studName=$studData_row['lname'].", ".$studData_row['fname'];
            
    }else{
            
            $suffix=$studData_row['suffix'];
            
            if($suffix === '-') { $suffix=''; }else{ $suffix=$suffix.' '; }
            
            $finalMName=$suffix.substr($mname, 0, 1).'.';
            
            $studName=$studData_row['lname'].", ".$studData_row['fname']." ".$finalMName;
            
    }
    
    ?>
    
    <script>
    window.alert('No data to print for <?php echo strtoupper($studName); ?> in Log Date: <?php echo $logDateCtrchk_from.' - '.$logDateCtrchk_to; ?> ...');
    window.close();
    </script>
    
    <?php }else{ $sldq_row=$studLogsData_query->fetch(); ?>


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
    <p style="margin: 4px; font-size: 22px;"><strong>MONTHLY ATTENDANCE - S.Y. <?php echo $sldq_row['schoolYear'];?></strong></p>
    </center>
    </td>

</tr>


</table>



<br />
<table id="myTable">

  <tr style="font-size: large;">
    
    <td style="width: 20%;"><strong><?php echo strtoupper($mmWords); ?></strong><br /><small>MONTH</small></td>
    <td style="width: 40%;" colspan="2"><strong><?php echo strtoupper($classData); ?></strong><br /><small>CLASS DETAILS</small></td>
    <td style="width: 40%;" colspan="2"><strong><?php echo strtoupper($setClass_row['adviser']); ?></strong><br /><small>ADVISER</small></td>
     
  </tr>
  
</table>
  
<table id="myTable">
<?php
$studData_query = $conn->query("select * FROM students WHERE RFTag_id='$get_RFTag_id' AND schoolYear='$activeSchoolYear'") or die(mysql_error());
$studData_row=$studData_query->fetch();
?>
  <tr style="font-weight: light; font-size: 14px">
    
    <td style="width: 30%;" rowspan="2"><p style="font-size: large; font-weight: bolder; margin: 0px;"><?php
    $mname=$studData_row['mname'];
            
    if($mname=='')
    {
 
            echo $studData_row['lname'].", ".$studData_row['fname'];
            
    }else{
            
            $suffix=$studData_row['suffix'];
            
            if($suffix === '-') { $suffix=''; }else{ $suffix=$suffix.' '; }
            
            $finalMName=$suffix.substr($mname, 0, 1).'.';
            
            echo strtoupper($studData_row['lname'].", ".$studData_row['fname']." ".$finalMName);
            
    }
    ?></p>
    <small>STUDENT NAME</small>
    </td>
    
    <td style="width:35%;" colspan="2"><center><strong>A M</strong></center></td>
    <td style="width:35%;" colspan="2"><center><strong>P M</strong></center></td>
    
     
  </tr>
  
  <tr style="font-weight: light; font-size: 14px">
  
    <td style="width:17.5%;"><center>IN</center></td>
    <td style="width:17.5%;"><center>OUT</center></td>
    <td style="width:17.5%;"><center>IN</center></td>
    <td style="width:17.5%;"><center>OUT</center></td>
     
  </tr>
  
    <?php
 
    $RFTag_id=$studData_row['RFTag_id'];
 
    $amPresentCtr=0;
    $pmPresentCtr=0;
    
    $amLateCtr=0;
    $pmLateCtr=0;
    
    $amAbsentCtr=0;
    $pmAbsentCtr=0;
    
    
    for($d=1; $d<$MMmaxDay; $d++){
        
        
        
        if($d<10){
        $logDateCtr=$selectedMM.'/0'.$d.'/'.$selectedYYYY;
        }else{
        $logDateCtr=$selectedMM.'/'.$d.'/'.$selectedYYYY;
        }
 
    ?>
    
    <tr>
 
    <td>
    <strong><?php
    
    $timestamp = strtotime($logDateCtr);
    $dayName=date('D', $timestamp);
    
    echo $logDateCtr." [ ".$dayName." ]";
    
    ?></strong>
    </td>
    
    <?php 
      $studLogsScopeCHK_query = $conn->query("SELECT logFlow FROM student_logs WHERE RFTag_id='$RFTag_id' AND logDate='$logDateCtr'") or die(mysql_error());
      $scopeCHK_row=$studLogsScopeCHK_query->fetch();

      if($scopeCHK_row['logFlow']==='AM IN' OR $scopeCHK_row['logFlow']==='AM OUT' OR $scopeCHK_row['logFlow']==='PM IN' OR $scopeCHK_row['logFlow']==='PM OUT' OR $studLogsScopeCHK_query->rowCount()<=0){ ?>

    <?php if(($dayName=='Sat' OR $dayName=='Sun') AND $studLogsScopeCHK_query->rowCount()<=0){ ?>
      
      <td colspan="4"><center><strong>N O  C L A S S </strong></center></td>
      
    <?php }else{ ?>
    
    <?php
    $SC_query = $conn->query("select * FROM activity_calendar WHERE completeDate='$logDateCtr'") or die(mysql_error());
    if($SC_query->rowCount()>0){
    $SC_row=$SC_query->fetch();
    ?>
      <td colspan="4"><center><strong><?php echo $SC_row['event_title'].'</strong> [ '.$SC_row['act_type'].' ]'; ?></center></td>
    
    <?php }else{ ?>
      
    <!-- AM IN -->
    <td>
    <?php
    $studLogs_query_AM_IN = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='AM IN' AND logDate='$logDateCtr'") or die(mysql_error());
    $studLogs_AM_IN_row=$studLogs_query_AM_IN->fetch();
    ?>
    
    <?php
    if($studLogs_query_AM_IN->rowCount()>0){ ?>
 
    <?php
    if($studLogs_AM_IN_row['late_status']==='on'){
        
        $amLateCtr=$amLateCtr+1;
        $amPresentCtr=$amPresentCtr+1;
        
        ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_AM_IN_row['logTime']; ?> ]</p>
    <?php }else{ 
        
        $amPresentCtr=$amPresentCtr+1;
        
        ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_AM_IN_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{
       
       $amAbsentCtr=$amAbsentCtr+1;
        
        ?>
        <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    <?php } ?>
    
    </td>
    
    
    <!-- AM OUT -->
    <td>
    <?php
    $studLogs_query_AM_OUT = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='AM OUT' AND logDate='$logDateCtr'") or die(mysql_error());
    $studLogs_AM_OUT_row=$studLogs_query_AM_OUT->fetch();
    ?>
    
    <?php
    if($studLogs_query_AM_OUT->rowCount()>0){ ?>
    
    <?php
    if($studLogs_AM_OUT_row['late_status']==='on'){ ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_AM_OUT_row['logTime']; ?> ]</p>
    <?php }else{ ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_AM_OUT_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{ ?>
    
    <?php
    $studLogs_query_PM_OUT_chk = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM OUT' AND logDate='$logDateCtr'") or die(mysql_error());
    
    if($studLogs_query_PM_OUT_chk->rowCount()>0 AND $studLogs_query_AM_IN->rowCount()>0){ }else{ ?>
    
    <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    
    <?php } } ?>
    
    
    </td>
    
    
    <!-- PM IN -->
    <td>
    <?php
    $studLogs_query_PM_IN = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM IN' AND logDate='$logDateCtr'") or die(mysql_error());
    $studLogs_PM_IN_row=$studLogs_query_PM_IN->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_IN->rowCount()>0){ ?>
    
    
    <?php
    if($studLogs_PM_IN_row['late_status']==='on'){
        
        $pmLateCtr=$pmLateCtr+1;
        $pmPresentCtr=$pmPresentCtr+1;
        
        ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    <?php }else{ 
        
        $pmPresentCtr=$pmPresentCtr+1;
        
        ?>
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    <?php } ?>

    <?php }else{ ?>
    
    <?php
    $studLogs_query_PM_OUT_chk = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM OUT' AND logDate='$logDateCtr'") or die(mysql_error());
    
    if($studLogs_query_PM_OUT_chk->rowCount()>0 AND $studLogs_query_AM_IN->rowCount()>0){ $pmPresentCtr=$pmPresentCtr+1; }else{ 
        
        $pmAbsentCtr=$pmAbsentCtr+1;
        
        ?>
    
    <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    
    <?php } } ?>
    
    </td>
    
    
    <!-- PM OUT -->
    <td>
    <?php
    $studLogs_query_PM_OUT = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='PM OUT' AND logDate='$logDateCtr'") or die(mysql_error());
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
    
    <?php } } }elseif($scopeCHK_row['logFlow']==='TIME IN' OR $scopeCHK_row['logFlow']==='TIME OUT'){
 
    
    ?>
    
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
    $studLogs_query_PM_IN = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='TIME IN' AND logDate='$logDateCtr'") or die(mysql_error());
    $studLogs_PM_IN_row=$studLogs_query_PM_IN->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_IN->rowCount()>0){ ?>
    
    
    <?php
    if($studLogs_PM_IN_row['late_status']==='on'){
        
        $amLateCtr=0.5;
        $pmLateCtr=0.5;
        
        ?>
        <p style="background-color: #ffb526; margin: 0px;">&nbsp;<i class="fa fa-check"></i>&nbsp;&nbsp;Late [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    
    <?php }else{
        
    $amPresentCtr=1;
    $pmPresentCtr=1;
    
    ?>
    
        <p style="background-color: white; margin: 0px;"><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ <?php echo $studLogs_PM_IN_row['logTime']; ?> ]</p>
    
    <?php } }else{
    
    $amAbsentCtr=1;
    $pmAbsentCtr=1;
    
    ?>
    
    <p style="background-color: #ff4974; margin: 0px; color: white;">&nbsp;<i class="fa fa-times"></i>&nbsp;&nbsp;Absent</p>   
    
    <?php } ?>
    
    </td>
    
    
    <!-- TIME OUT -->
    <td>
    <?php
    $studLogs_query_PM_OUT = $conn->query("select * FROM student_logs WHERE RFTag_id='$RFTag_id' AND logFlow='TIME OUT' AND logDate='$logDateCtr'") or die(mysql_error());
    $studLogs_PM_OUT_row=$studLogs_query_PM_OUT->fetch();
    ?>
    
    <?php
    if($studLogs_query_PM_OUT->rowCount()>0){ ?>
    
    <?php if($studLogs_PM_OUT_row['late_status']=="on"){ ?>
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
    <?php }elseif($scopeCHK_row['logFlow']==='OPEN IN' OR $scopeCHK_row['logFlow']==='OPEN OUT'){
    $amPresentCtr=1;
    $pmPresentCtr=1;
    ?>
  
    <!-- OPEN IN / OPEN OUT TABLE -->
    <td colspan="4">
    <table style="width: 98%; margin: 4px;" id="myTable">
     
    <thead>
    <tr>
    <th style="width: 50%;">OPEN TIME IN</th>
    <th style="width: 50%;">OPEN TIME OUT</th>
    </tr>
    </thead>
     
    
    <tbody>
    
    <?php
    
    $in_gateLog_query = $conn->query("SELECT logTime, log_id FROM student_logs WHERE RFTag_id='$RFTag_id' AND logDate='$logDateCtr' AND logFlow='OPEN IN' ORDER BY log_id ASC") or die(mysql_error());
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
    
    <?php } ?>
    
  </tr>

<?php } ?>

<tr>
<td colspan="5">
<h2>Attendance Summary:</h2>
<table id="myTable">
<thead>
<tr>
<th colspan="2">Days Present</th>
<th colspan="2">Days Late</th>
<th colspan="2">Days Absent</th>
</tr>
</thead>

<tbody>
<tr>
<td>AM</td>
<td>PM</td>
<td>AM</td>
<td>PM</td>
<td>AM</td>
<td>PM</td>
</tr>


<tr>
<td><?php echo $amPresentCtr; ?></td>
<td><?php echo $pmPresentCtr; ?></td>

<td><?php echo $amLateCtr; ?></td>
<td><?php echo $pmLateCtr; ?></td>

<td><?php echo $amAbsentCtr; ?></td>
<td><?php echo $pmAbsentCtr; ?></td>
</tr>

<tr>
<td colspan="2"><strong>Total Days Present:</strong> <?php echo (($amPresentCtr+$pmPresentCtr)/2) ?></td>
<td colspan="2"><strong>Total Days Late:</strong> <?php echo $amLateCtr+$pmLateCtr; ?></td>
<td colspan="2"><strong>Total Days Absent:</strong> <?php echo ($amAbsentCtr+$pmAbsentCtr)/2; ?></td>
</tr>
</tbody>
</table>

</td>
</tr>
</table>

<?php } ?>
</body>
</html>
       
            