<?php
include('session.php');  
include('header_print.php');
?>
 

<style>
@media print {
    body{
        width: 20.32cm;
        height: 26.67cm;
        margin: 0.635cm 0.635cm 0.635cm 0.635cm; 
        /* change the margins as you want them to be. */
   } 
}
</style>

<body>

<?php

    $schoolYear=$_GET['schoolYear'];
    $semester=$_GET['semester'];
    $inc_month=$_GET['inc_month'];
    $class_id=$_GET['class_id'];
 

$studData_query = $conn->query("SELECT * FROM students WHERE class_id='$class_id' AND schoolYear='$schoolYear' ORDER BY lname, fname");
while($studData_row=$studData_query->fetch()){

                        if($studData_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$studData_row['mname'];
                        }
                        
                        if($studData_row['dept']==='SHS')
                        {
                            $classDetails=$studData_row['gradeLevel'].' - '.$studData_row['strand'].' - '.$studData_row['section'];
                        }else{
                            $classDetails=$studData_row['gradeLevel'].' - '.$studData_row['section'];
                        }

$tbl_accounts_assessments_query = $conn->query("SELECT * FROM tbl_accounts_assessments WHERE assessment_id='$studData_row[assessment_id]' AND schoolYear='$schoolYear'");
$tbl_accounts_assessments_row=$tbl_accounts_assessments_query->fetch();

?>

                    <div class="row" style="margin-top: 12px;">
                    <div class="col-lg-12">
                    
                        <center>
                        <table>
                        <tr>
                        <td style="width: 80px; border: none;">
                         <img class="pull-right" width="75" height="75" src="../img/<?php echo $sf_row['logo']; ?>" />
                        </td>
                         
                        <td style="border: none;">
                        <h2><?php echo strtoupper($schoolName); ?></h2>
                        <h3>EXAMINATION ASSESSMENT</h3>
                        <h5>SY <?php echo $activeSchoolYear; ?> &middot; <?php echo $activeSemester; ?></h5>
                        </td>
                        </tr>
                        </table>
                        </center>
     
                   
                    </div>
                    
                    <div class="col-lg-12" style="margin-left: 12px;">
                    <table id="tableEA" style="width: 100%; height: 100%;">
                    <tr>
                    <td style="width: 40%; background-color: white; border-top: 1px solid lightgray; border-bottom: 1px solid lightgray;">
                    <strong><?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?></strong><br />
                    <small>STUDENT NAME</small>
                    </td>
                    
                    <td style="width: 30%; background-color: white; border-top: 1px solid lightgray; border-bottom: 1px solid lightgray;">
                    <strong><?php echo $classDetails; ?></strong><br />
                    <small>CLASS</small>
                    </td>
                    
                    <td style="width: 30%; background-color: white; border-top: 1px solid lightgray; border-bottom: 1px solid lightgray;">
                    <strong><?php echo $tbl_accounts_assessments_row['description']; ?></strong><br />
                    <small>ASSESSMENT GROUP</small>
                    </td>
                    </tr>
                    </table>
                    </div>
                    
                    
                    <!-- ################# LEFT SIDE BAR REPORT ################# -->
                    <table id="tableEA" style="width: 100%; height: 100%;">
                    <tr>
                    <td style="width: 30%; background-color: white; vertical-align: top;">
                    
                    <div class="col-lg-12">
                    <div class="table-responsive">
                    <table style="width:100%">
                    
                    <thead>
                    <tr>
                    <th style="background-color: white; width: 70%; padding: 0px 0px 0px 12px; border: none; color: black;">PARTICULARS</th>
                    <th style="background-color: white; width: 30%; padding: 0px 0px 0px 2px; border: none; color: black;">AMOUNT</th>
                    </tr>
                    </thead>
                      
                      <tbody>
                      
                      <?php
                      $payCtr=0;
                      $totalWholeYear=0;
                      $tbl_student_assessments_query = $conn->query("SELECT DISTINCT category_id FROM tbl_student_assessments WHERE assessment_id='$studData_row[assessment_id]' ORDER BY category_id ASC") or die(mysql_error());
                      while ($tbl_student_assessments_row = $tbl_student_assessments_query->fetch()) 
                      {
                        $payCtr+=1;
                        $category_id=$tbl_student_assessments_row['category_id']; ?>
                        
                        <tr>
                        
                        <?php
                        $tbl_accounts_categories_query = $conn->query("SELECT description, totalAmount FROM tbl_accounts_categories WHERE category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
                        $tbl_accounts_row = $tbl_accounts_categories_query->fetch();
                        $totalWholeYear+=$tbl_accounts_row['totalAmount'];
                        ?>
                        
                        <td colspan="4" style="background-color: white; border: none;">
                        <table>
                        <tr>
                        <th style="background-color: white; width: 71%; padding: 0px 0px 0px 2px; border: none; color: black;"><?php echo $tbl_accounts_row['description']; ?></th>
                        <th style="background-color: white; width: 29%; padding: 0px 0px 0px 2px; border: none; color: black;"><?php echo number_format($tbl_accounts_row['totalAmount'], 2); ?></th>
                        </tr>
                        
                        <?php
                        $tbl_accounts_particulars_query = $conn->query("SELECT * FROM tbl_accounts_particulars WHERE category_id='$tbl_student_assessments_row[category_id]' ORDER BY description ASC") or die(mysql_error());
                        while ($tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch()) 
                        { ?>
                        
                        <tr>
                        <td style="background-color: white; padding: 0px 0px 0px 2px; border: none;"><?php echo $tbl_accounts_particulars_row['description']; ?></td>
                        <td style="background-color: white; padding: 0px 0px 0px 2px; border: none;"><?php echo number_format($tbl_accounts_particulars_row['amount'], 2); ?></td>
                        </tr>
                        
                        <?php } ?>
 
                       </table>
                        </td>
 
                        </tr> 
                            
                            
                        <?php } ?>
                       
                      </tbody>
                    <tfoot>
                    <tr>
                    <th style="background-color: white; padding: 0px 0px 0px 12px; border: none; color: black;">TOTAL</th>
                    <th style="background-color: white; padding: 0px 0px 0px 2px; border: none; color: black;"><?php echo number_format($totalWholeYear, 2); ?></th>
                    </tr>
                    </tfoot>
                    </table>
                    </div>
                    </div>
                    <!-- ################# END LEFT SIDE BAR REPORT ################# -->
                    </td>
                    
                    <td style="width: 70%; background-color: white; vertical-align: top !important;">
                    
                    <!-- ################# RIGHT SIDE BAR REPORT ################# -->
                    <div class="col-lg-12">
                    <!-- ################# ASSESSMENT OF ACCOUNTS ################# -->
                    <h4>ASSESSMENT OF ACCOUNTS</h4>
                    <table style="width: 100%;">
                    <thead>
                    <tr>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; width: 22%;">PARTICULARS</th>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; text-align: right; width: 16%;">AMOUNT</th>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; text-align: right; width: 30%;">DISCOUNT</th>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; text-align: right; width: 16%;">PAYABLE</th>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; text-align: right; width: 16%;">EXCESS</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    $totalPayables=0;
                    $totalNetDiscount=0;
                    $totalNetPayable=0;
                    $totalNetExcess=0;
                    
                    $tbl_student_assessments_query = $conn->query("SELECT DISTINCT category_id FROM tbl_student_assessments WHERE reg_id='$studData_row[reg_id]' AND assessment_id='$studData_row[assessment_id]'") or die(mysql_error());
                    while ($tbl_student_assessments_row = $tbl_student_assessments_query->fetch()) 
                    {
                                    
                    $tbl_accounts_categories_query = $conn->query("SELECT * FROM tbl_accounts_categories WHERE category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
                    $tbl_accounts_row = $tbl_accounts_categories_query->fetch();
                    $totalPayables+=$tbl_accounts_row['totalAmount'];
                    
                    ?>
                                
                    <tr>
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px;"><?php echo $tbl_accounts_row['description']; ?></td>
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px; text-align: right;"><?php echo number_format($tbl_accounts_row['totalAmount'], 2); ?></td>
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px; text-align: right;">
                    <?php
                    $totalDiscount=0;
                    $tbl_assessments_discounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$studData_row[reg_id]' AND deduct_category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
                    while ($tbl_assessments_discounts_row = $tbl_assessments_discounts_query->fetch()) 
                    {
                        $totalDiscount+=$tbl_assessments_discounts_row['amount'];
                        
                        
                        echo '<small>('.$tbl_assessments_discounts_row['description'].')</small> '.number_format($tbl_assessments_discounts_row['amount'], 2).'<br />';
                    
                    } ?>
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px; text-align: right;">
                    <?php if(number_format($tbl_accounts_row['totalAmount']-$totalDiscount, 2)<0){
                        $totalNetPayable+=0;
                        echo '0.00';
                    }else{
                        
                        $totalNetPayable+=$tbl_accounts_row['totalAmount']-$totalDiscount;
                        echo number_format($tbl_accounts_row['totalAmount']-$totalDiscount, 2);
                        
                    } ?>
                    
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px; text-align: right;">
                    <?php if(number_format($tbl_accounts_row['totalAmount']-$totalDiscount, 2)<0){
                        
                        $totalNetDiscount+=$tbl_accounts_row['totalAmount']-$totalDiscount;
                        $totalNetExcess+=$totalNetDiscount;
                        
                        echo substr(number_format($tbl_accounts_row['totalAmount']-$totalDiscount, 2), 1);
                    
                    }else{
                        $totalNetExcess+=0;
                        echo '0.00';
                    } ?>
                    
                    </td>
                    
                    </tr>
                    
                    <?php } ?>
                    
                    <?php
                    $totalDiscount=0;
                    $tbl_assessments_discounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$studData_row[reg_id]'") or die(mysql_error());
                    while ($tbl_assessments_discounts_row = $tbl_assessments_discounts_query->fetch()) 
                    {
                        $totalDiscount+=$tbl_assessments_discounts_row['amount'];
                    } ?>
                    
                    <tr>
                    
                    <td style="text-align: right; color: black; background-color: white; padding: 8px 4px 4px 4px;">TOTAL</td>
                    
                    <td style="color: black; background-color: white; padding: 8px 4px 4px 4px; text-align: right;">
                    <?php echo number_format($totalPayables, 2); ?>
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 8px 4px 4px 4px; text-align: right;">
                    <?php echo number_format($totalDiscount, 2); ?>
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 8px 4px 4px 4px; text-align: right;">
                    <?php echo number_format($totalNetPayable, 2); ?>
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 8px 4px 4px 4px; text-align: right;">
                    <?php
                    if($totalNetDiscount<0){
                        echo substr(number_format($totalNetDiscount, 2), 1);
                        
                    }else{
                        echo '0.00';
                    } ?>
                    </td>
                    
                    </tr>
 
                    </tbody>
                    </table>
                    <!-- ################# END ASSESSMENT OF ACCOUNTS ################# -->


                    <!-- ################# PAYMENT SUMMARY ################# -->
                    <h4 style="margin-top: 12px;">PAYMENT SUMMARY</h4>
                    <table style="width: 100%;">
                    <thead>
                    <tr>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; width: 30%;">PARTICULARS</th>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; text-align: right; width: 14%;">PAYABLE</th>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; text-align: right; width: 14%;">PAID</th>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; text-align: right; width: 14%;">BALANCE</th>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; text-align: right; width: 14%;">EXCESS</th>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; text-align: right; width: 14%;">BILLED</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    $totalAcctPayable=0;
                    $totalPaid=0;
                    $totalBal=0;
                    
                    $totalExcess=0;
                    $totalBilled=0;
                    
                    $tsaPS_query = $conn->query("SELECT * FROM tbl_student_assessments WHERE assessment_id='$studData_row[assessment_id]' AND reg_id='$studData_row[reg_id]'") or die(mysql_error());
                    while ($tsaPS_row = $tsaPS_query->fetch()) 
                    {
                                    
                    $tacPS_query = $conn->query("SELECT description FROM tbl_accounts_categories WHERE category_id='$tsaPS_row[category_id]'") or die(mysql_error());
                    $tacPS_row = $tacPS_query->fetch();
                    
                    $totalAcctPayable+=$tsaPS_row['total_amt_payable'];
                    
                    
                    $billing_query = $conn->query("SELECT amt_paid, amt_billed FROM tbl_billing WHERE category_id='$tsaPS_row[category_id]' AND schoolYear='$data_src_sy'") or die(mysql_error());
                    $billing_row = $billing_query->fetch();
              
                    
                    $finalPaidAmt=$tsaPS_row['total_amt_paid'];
                    
                    $finalBilledAmt=$billing_row['amt_billed'];
                    
                    $totalPaid+=$finalPaidAmt;
                    
                    ?>
                                
                    <tr>
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px;"><?php echo $tacPS_row['description']; ?></td>
                     
 
                     
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px; text-align: right;">
                    <?php echo number_format($tsaPS_row['total_amt_payable'], 2); ?>
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px; text-align: right;">
                    <?php echo number_format($finalPaidAmt, 2); ?>
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px; text-align: right;">
                    <?php
                    
                    if($tsaPS_row['total_amt_bal']>=0){
                        echo number_format($tsaPS_row['total_amt_bal'], 2);
                        $totalBal+=$tsaPS_row['total_amt_bal'];
                        
                    }else{
                        echo '0.00';
                        $totalBal+=0;
                    }
                    
                    ?>
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px; text-align: right;">
                    <?php
                    
                    if($tsaPS_row['total_amt_bal']>=0){
                        $totalExcess+=0;
                        
                        echo '0.00';
                    }else{
                        $totalExcess+=$tsaPS_row['total_amt_bal'];
                        
                        echo substr(number_format($tsaPS_row['total_amt_bal'], 2), 1);
                    }
                    
                    ?>
                    </td>
                    
                    
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px; text-align: right;">
                    <?php
                    
                    if($tsaPS_row['total_amt_bal']>=0){
                        $totalBilled+=0;
                        echo '0.00';
                    }else{
                        $totalBilled+=$finalBilledAmt;
                        echo number_format($finalBilledAmt, 2);
                    }
                    
                    ?>
                    </td>
                    
                    </tr>
                    
                    <?php } ?>
  
                    <tr>
                    
                    <td style="text-align: right; color: black; background-color: white; padding: 8px 4px 4px 4px;">TOTAL</td>
                    
                    <td style="color: black; background-color: white; padding: 8px 4px 4px 4px; text-align: right;">
                    <?php echo number_format($totalAcctPayable, 2); ?>
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 8px 4px 4px 4px; text-align: right;">
                    <?php echo number_format($totalPaid, 2); ?>
                    </td>
 
                    
                    <td style="color: black; background-color: white; padding: 8px 4px 4px 4px; text-align: right;">
                    <?php echo number_format($totalBal, 2); ?>
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 8px 4px 4px 4px; text-align: right;">
                    <?php
                    if($totalExcess<0){
                        echo substr(number_format($totalExcess, 2), 1);
                    }else{
                        echo number_format($totalExcess, 2);
                    }
                    ?>
                    </td>
                    
                    <td style="color: black; background-color: white; padding: 8px 4px 4px 4px; text-align: right;">
                    <?php echo number_format($totalBilled, 2); ?>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    
                    <!-- ################# END PAYMENT SUMMARY ################# -->
                    
                    <!-- ################# EXAM DUE ################# -->
                    <h4 style="margin-top: 12px;">EXAM DUE FOR <?php if($_GET['inc_month']==='1'){ echo $_GET['inc_month'].' MONTH'; }else{ echo $_GET['inc_month'].' MONTHS'; } ?></h4>
                    <table style="width: 100%;">
                    <thead>
                    <tr>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; width: 65%;">PARTICULARS</th>
                    <th style="color: black; background-color: white; padding: 4px 4px 8px 4px; width: 35%; text-align: right;">AMOUNT</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    $totalPayables=0;
                    $totalNetPayable=0;
                    $totalDiscounted=0;
                    
                    $tbl_StudAssess_query = $conn->query("SELECT * FROM tbl_student_assessments WHERE assessment_id='$studData_row[assessment_id]' AND reg_id='$studData_row[reg_id]'") or die(mysql_error());
                    while ($tbl_StudAssess_row = $tbl_StudAssess_query->fetch()) 
                    {
                        
                    $tbl_AcctCateg_query = $conn->query("SELECT * FROM tbl_accounts_categories WHERE category_id='$tbl_StudAssess_row[category_id]'") or die(mysql_error());
                    $tbl_AcctCateg_row = $tbl_AcctCateg_query->fetch();
                    
               
                    
                    $tbl_AssessDCounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$studData_row[reg_id]' AND deduct_category_id='$tbl_StudAssess_row[category_id]'") or die(mysql_error());
                    while ($tbl_AssessDCounts_row = $tbl_AssessDCounts_query->fetch())
                    
                    { $totalDiscounted+=$tbl_AssessDCounts_row['amount']; }  
                    
                    if($tbl_AcctCateg_row['paymentTerm']==='Monthly'){
                        $totalPayables=((($tbl_StudAssess_row['total_amt_payable']-$totalDiscounted)/10)*$_GET['inc_month'])-$tbl_StudAssess_row['total_amt_paid'];
                    }else{
                        $totalPayables=$tbl_StudAssess_row['total_amt_payable']-$tbl_StudAssess_row['total_amt_paid'];
                    }
                    
                    
                    if($totalPayables<=0){ $totalPayables=0; }
                    
                    $totalNetPayable+=$totalPayables;
                    ?>
                                
                    <tr>
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px;"><?php echo $tbl_AcctCateg_row['description']; ?></td>
 
                    
                    <td style="color: black; background-color: white; padding: 0px 4px 0px 4px; text-align: right;">
                    <?php echo number_format($totalPayables, 2); ?>
                    </td>
                    </tr>
                    
                    <?php } ?>
                    <tr>
                    <td></td>
                    <td style="border-bottom: 1px solid;"></td>
                    </tr>
                    
                    <tr>
                    <td style="text-align: right; color: black; background-color: white; padding: 8px 4px 4px 4px;"><strong style=" font-size: large;">TOTAL EXAM DUE: </strong></td>
                    <td style="color: black; background-color: white; padding: 8px 4px 4px 4px; text-align: right;">
                    <strong style="text-decoration-line: underline; text-decoration-style: double; font-size: large;">
                    
                    <?php echo number_format($totalNetPayable, 2); ?>
                    </strong>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    <!-- ################# END EXAM DUE ################# -->
           
                    </div>
                    <!-- ################# END RIGHT SIDE BAR REPORT ################# -->
                    </td>
                    </tr>
                    </table>
                    
                    <div class="col-lg-12">
                    <hr />
                    <p>PREPAPRED BY:</p>
                    <br />
                    <p>
                    <strong style="text-decoration-line: underline;">EMILIO B. MAGTOLIS JR.</strong><br />
                    Assessment Adminsitrator
                    </p>
                    <hr />
                    <p style="font-size: small;"><strong>Email:</strong> schoolname@gmail.com &middot; <strong>Contact #:</strong> 09307654321 &middot; 09121234567</p>
                    </div>
                    
              
                    
                    </div>

<h1 class="pb"></h1>
<?php }

$conn=null;
?>

</body>
</html>
       
            