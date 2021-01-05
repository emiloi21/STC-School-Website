<?php include('session.php'); ?>
  
<!DOCTYPE html>
<html>
<head>
<title>STC Web Portal</title>
<meta name="description" content="RFID Attendance Monitoring with SMS">
<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
<link rel="shortcut icon" href="../img/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
* {
  box-sizing: border-box;
}

 
#myTable {
  border-collapse: collapse;
  width: 100%;
  border: none;
  font-size: 12px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 2px;
}

#myTable tr, td {
  border: none;
  
}

#myTable tr.header, #myTable tr:hover {
  background-color: #fff;
}

.pb{
    page-break-after: always;
     
}
</style>

<style>
@media print {
    body{
        width: 11.43cm;
        height: 13.97cm;
        margin: 0cm 0cm 0cm 0cm;
        /* change the margins as you want them to be. */
   } 
}
</style>

</head>






<body style="font-family: Verdana, sans-serif;">

<table style="width: 100%; height: 100%; margin-left: 18px; margin-right:auto;">
 
<tr>
    <td style="border: none;">
    <table style="margin-left:auto; margin-right:auto;">
    <tr>
    <td style="width: 10px; border: none;">
     <img class="pull-right" width="45" height="45" src="../admin/img/<?php echo $sf_row['logo'];?>" />
    </td>
    
    <td style="border: none;">
    <center>
    <p style="margin: 2px; font-size: 14px; font-weight: bolder;"><?php echo strtoupper($schoolName); ?></p>
    <p style="margin: 2px; font-size: 10px;"><?php echo $sf_row['address']; ?></p>
    <p style="margin: 2px; font-size: 10px;">TIN: XXX XXX XXX</p>
    </center>
    </td>
    </tr>
    </table>
  
    </td>
</tr>

<tr>

    <td style="border: none;">
    <center>
    <p style="margin: 2px; font-size: 14px;"><strong>OFFICIAL RECEIPT</strong></p>
    <p style="margin: 2px; font-size: 10px;">S.Y. <?php echo $activeSchoolYear;?> &middot; <?php echo $activeSemester; ?></p>
    </center>
    </td>

</tr>

<tr>
<td>
<?php
$trans_query = $conn->query("SELECT * FROM tbl_student_payment WHERE receipt_num='$_GET[receipt_num]'") or die(mysql_error());
$trans_row = $trans_query->fetch();


$stud_query = $conn->query("SELECT * FROM students WHERE reg_id='$trans_row[reg_id]'") or die(mysql_error());
$stud_row = $stud_query->fetch();


$tbl_student_assessments_query = $conn->query("SELECT assessment_id FROM tbl_student_assessments WHERE reg_id='$trans_row[reg_id]'") or die(mysql_error());
$tbl_student_assessments_row = $tbl_student_assessments_query->fetch();


$tbl_accounts_assessments_query = $conn->query("SELECT description FROM tbl_accounts_assessments WHERE assessment_id='$tbl_student_assessments_row[assessment_id]'") or die(mysql_error());
$tbl_accounts_assessments_row = $tbl_accounts_assessments_query->fetch();

    if($stud_row['mname']=='')
    {
        $finalMName='';
    }else{
        if($stud_row['suffix']=='-') { $suffix=''; }else{ $suffix=$stud_row['suffix'].' '; }
    
    $finalMName=$suffix.$stud_row['mname'];
    }
                        
?>

<table id="myTable">

<tr>
<td style="font-weight: lighter; width: 50%;">OR #: <strong style="font-size: 14px;"><?php echo $_GET['receipt_num']; ?></strong></td>
<td style="font-weight: lighter; width: 50%; text-align: right; padding-right: 12px;"><?php echo $trans_row['trans_time']; ?></td>
</tr>
 
 
<tr>
<td colspan="2" style="font-weight: lighter;">STUDENT: <strong style="font-size: 12px;"><?php echo $stud_row['lname'].", ".$stud_row['fname']." ".$finalMName; ?></strong></td>
</tr>

<tr>
<td colspan="2" style="font-weight: lighter;">CLASS: <strong><?php if($stud_row['dept']==='SHS'){ echo strtoupper($stud_row['gradeLevel'].' - '.$stud_row['strand'].' - '.$stud_row['section']); }else{ echo strtoupper($stud_row['gradeLevel'].' - '.$stud_row['section']); } ?></strong></td>
</tr>
</table>


<table id="myTable" style="width: 100%;">
<thead>
<tr>
<th colspan="2" style="text-align: center; font-size: 12; border-bottom: solid 1px; border-top: solid 1px;">PAYMENT DETAILS</th>
</tr>
</table>


<table id="myTable" style="width: 100%;">
<tr>
<th style="width: 65%;">PARTICULARS</th>
<th style="width: 35%; text-align: right; padding-right: 14px;">AMOUNT</th>
</tr>
</thead>

<?php
$particulars_query = $conn->query("SELECT * FROM tbl_student_payment WHERE receipt_num='$_GET[receipt_num]' ORDER BY payment_id DESC") or die(mysql_error());
while($particulars_row = $particulars_query->fetch()){

$tbl_accounts_categories_query = $conn->query("SELECT description FROM tbl_accounts_categories WHERE category_id='$particulars_row[category_id]'") or die(mysql_error());
$tbl_accounts_categories_row = $tbl_accounts_categories_query->fetch();



?>
<tr>
<td><?php echo $tbl_accounts_categories_row['description']; ?></td>
<td style="text-align: right; padding-right: 14px;"><?php echo number_format($particulars_row['amt_paid'], 2); ?></td>
</tr>
<?php } ?>
<tr>
<td colspan="2" style="border-bottom: solid 1px;"></td>
</tr>
</table>
 
<table id="myTable" style="width: 100%;">
<tr>
<td style="text-align: right; padding-right: 14px; font-weight: bold">TOTAL:</td>
<td style="text-align: right; padding-right: 14px; font-weight: bold"><?php echo number_format($trans_row['net_amt_payable'], 2); ?></td>
</tr>

<tr>
<td style="text-align: right; padding-right: 14px; font-weight: bold;">CASH:</td>
<td style="text-align: right; padding-right: 14px; font-weight: bold"><?php echo number_format($trans_row['payee_cash'], 2); ?></td>
</tr>
<tr>
<td></td>
<td style="border-bottom: solid 1px;"></td>
</tr>
<tr>
<td style="text-align: right; padding-right: 14px; font-weight: bold">CHANGE:</td>
<td style="text-align: right; padding-right: 14px; font-weight: bold"><?php echo number_format($trans_row['payee_change'], 2); ?></td>
</tr>

<tr>

<td colspan="2">&nbsp;</td>

</tr>

<tr>

<td>

<?php

$personnel_query = $conn->prepare('SELECT fname, lname FROM useraccount WHERE user_id = :user_id');
$personnel_query->execute(['user_id' => $trans_row['personnel_user_id']]);
$personnel_row = $personnel_query->fetch();

?>
<p style="margin-left: 14px;"><strong style="text-decoration-line: underline;"><?php echo substr($personnel_row['fname'], 0, 1).'. '.$personnel_row['lname']; ?></strong><br />Cashier</p>
</td>

<td>Entry Date: <?php echo $trans_row['trans_date']; ?> <br /></td>

</tr>

<tr>
<td colspan="2" style="text-align: center; font-size: smaller;">THIS IS A SYSTEM GENERATED DOCUMENT &middot; <?php echo date('m/d/Y').' | '.date('h:i:s A')?></td>
</tr>

</table>

</td>
</tr>

</table>
<?php
$particulars_query=null;
$particulars_row=null;
$stud_query=null;
$stud_row=null;
$trans_query=null;
$trans_row=null;
$tbl_accounts_assessments_query=null;
$tbl_accounts_assessments_row=null;
$tbl_accounts_categories_query=null;
$tbl_accounts_categories_row=null;
$tbl_student_assessments_query=null;
$tbl_student_assessments_row=null;

$conn=null;
?>
</body>
</html>
