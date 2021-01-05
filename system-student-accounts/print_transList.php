<?php
include('session.php');  
include('header_print.php');
?>
<style>
@media print {
    body{
        width: 20.32cm;
        height: 31.75cm;
        margin: 0.635cm 0.635cm 0.635cm 0.635cm; 
        /* change the margins as you want them to be. */
   } 
}
</style>
<body>

<?php

$dateFrom=$_GET['dateFrom'];
$dateTo=$_GET['dateTo'];

?>

<div class="row">
    
                <div class="col-lg-12">
                    
                        <center>
                        <table>
                        <tr>
                        <td style="width: 80px; border: none;">
                         <img class="pull-right" width="75" height="75" src="../admin/img/<?php echo $sf_row['logo']; ?>" />
                        </td>
                         
                        <td style="border: none;">
                        <p><strong style="font-size: large;"><?php echo strtoupper($schoolName); ?></strong><br />
                        <strong>CASH COLLECTION</strong> &middot; <?php if($_GET['type']==='AR'){ echo "PAYMENT VALIDATION"; }else{ echo "OVER THE COUNTER"; }?><br />
                        SY <?php echo $activeSchoolYear; ?> &middot; <?php echo $activeSemester; ?></p>
                        </td>
                        </tr>
                        </table>
                        </center>
         
                  
                  </div>
 
                    <div class="col-lg-12" style="padding: 12px;">
                    <div class="table-responsive" style="margin-top: 12px; padding: 12px;">
                    
                    <?php if($_GET['type']==='AR'){ ?>
                    
                    <table style="width: 100%;">
                          <thead>
                            <tr>
                            <th style="background-color: white; color: black;">#</th>
                            <th style="background-color: white; color: black;">AR</th>
                            <th style="background-color: white; color: black;">PAYEE</th>
                            <th style="background-color: white; color: black;">PAYMENT METHOD</th>
                            <th style="background-color: white; color: black;">AMOUNT</th>
                            <th style="background-color: white; color: black;">TRANS DETAILS</th>
                            <th style="background-color: white; color: black;">DATE</th>
                            </tr>
                          </thead>
                          <tbody> 
                                <?php
                                $transCtr=0;
                                $totalCollection=0;
                                $transList_query = $conn->query("SELECT DISTINCT reg_id, receipt_num, method_id, net_amt_payable, payee_cash, payee_change, trans_date FROM tbl_student_payment WHERE (trans_date BETWEEN '$dateFrom' AND '$dateTo') AND (payment_type='Payment Validation' OR payment_type='Book Payment Validation') AND status!='Voided' ORDER BY payment_id ASC") or die(mysql_error());
                                while($tList_row=$transList_query->fetch()){  
                                
                                $transCtr+=1;
                                
                                $totalCollection+=$tList_row['net_amt_payable'];
                                
                                $studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$tList_row[reg_id]'") or die(mysql_error());
                                $sData_row = $studData_query->fetch();
                                
                                $payValid_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE request_id='$tList_row[method_id]'");
                                $payValid_row=$payValid_query->fetch();
                                
                                $payMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE pm_id='$payValid_row[pm_id]'") or die(mysql_error());
                                $payMethod_row = $payMethod_query->fetch();
                                
                                ?>
     
                                    
     
               
                            <tr>
                            <td style="background-color: white; color: black; padding: 4px; width: 30px;"><?php echo $transCtr; ?></td>
                            <td style="background-color: white; color: black; padding: 4px;"><?php echo $tList_row['receipt_num']; ?></td>
                            
                            <td style="background-color: white; color: black;  padding: 4px;">
                              <?php
                              
                              if($sData_row['suffix']=="-")
                              {
                                echo $sData_row['fname']." ".substr($sData_row['mname'], 0,1).". ".$sData_row['lname'];
                                            
                              }else{
                                echo $sData_row['fname']." ".substr($sData_row['mname'], 0,1).". ".$sData_row['lname']." ".$sData_row['suffix'];
                                            
                              } ?>
                            </td>
                            
                            <td>
                            <?php echo $payMethod_row['nameProvider']; ?><br />
                            <?php echo $payMethod_row['accountName']; ?><br />
                            <?php echo $payMethod_row['accountNum_link']; ?>
                            </td>
                              
                            <td style="text-align: right;"><?php echo number_format($payValid_row['transAmt'], 2); ?></td>
                            
                            <td>
                            Date: <?php echo $payValid_row['transDate']; ?><br />
                            Status: <?php echo $payValid_row['status']; ?>
                            </td>
                            
                            <td style="background-color: white; color: black; padding: 4px;"><?php echo $tList_row['trans_date']; ?></td>
                            </tr> 
                             <?php } ?>
                           
                          </tbody>
                          
                          <tfoot>
                            <tr>
                            <th style="background-color: white; color: black; text-align: right;" colspan="3">TOTAL COLLECTION:</th>
                            <th style="background-color: white; color: black; padding: 4px; text-align: right;" colspan="2"><?php echo number_format($totalCollection, 2); ?></th>
                            <th style="background-color: white; color: black; text-align: center;" colspan="2">FOR DATE: <?php echo $dateFrom.' - '.$dateTo; ?></th>
                            </tr>
                          </tfoot>
                        
                        </table>
                        
                    <?php }else{ ?>
                    
                    <table style="width: 100%;">
                          <thead>
                            <tr>
                            <th style="background-color: white; color: black;">#</th>
                            <th style="background-color: white; color: black;">OR</th>
                            <th style="background-color: white; color: black;">PAYEE</th>
                            <th style="background-color: white; color: black;">PAID AMOUNT</th>
                            <th style="background-color: white; color: black;">CASH</th>
                            <th style="background-color: white; color: black;">CHANGE</th>
                            <th style="background-color: white; color: black;">DATE</th>
                            </tr>
                          </thead>
                          <tbody> 
                                <?php
                                $transCtr=0;
                                $totalCollection=0;
                                $transList_query = $conn->query("SELECT DISTINCT reg_id, receipt_num, net_amt_payable, payee_cash, payee_change, trans_date FROM tbl_student_payment WHERE (trans_date BETWEEN '$dateFrom' AND '$dateTo') AND (payment_type='Post Billing' OR payment_type='Book Fee' OR payment_type='Student Fee' OR payment_type='Non-Student Fee') AND status!='Voided' ORDER BY payment_id ASC") or die(mysql_error());
                                while($tList_row=$transList_query->fetch()){  
                                
                                $transCtr+=1;
                                
                                $totalCollection+=$tList_row['net_amt_payable'];
                                
                                $studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$tList_row[reg_id]'") or die(mysql_error());
                                $sData_row = $studData_query->fetch(); ?>
     
                                    
     
               
                            <tr>
                            <td style="background-color: white; color: black; padding: 4px; width: 30px;"><?php echo $transCtr; ?></td>
                            <td style="background-color: white; color: black; padding: 4px;"><?php echo $tList_row['receipt_num']; ?></td>
                            
                            <td style="background-color: white; color: black;  padding: 4px;">
                              <?php
                              
                              if($sData_row['suffix']=="-")
                              {
                                echo $sData_row['fname']." ".substr($sData_row['mname'], 0,1).". ".$sData_row['lname'];
                                            
                              }else{
                                echo $sData_row['fname']." ".substr($sData_row['mname'], 0,1).". ".$sData_row['lname']." ".$sData_row['suffix'];
                                            
                              } ?>
                            </td>
                            
                            <td style="background-color: white; color: black; padding: 4px; text-align: right;"><?php echo number_format($tList_row['net_amt_payable'], 2); ?></td>
                            <td style="background-color: white; color: black; padding: 4px; text-align: right;"><?php echo number_format($tList_row['payee_cash'], 2); ?></td>
                            <td style="background-color: white; color: black; padding: 4px; text-align: right;"><?php echo number_format($tList_row['payee_change'], 2); ?></td>
                            <td style="background-color: white; color: black; padding: 4px;"><?php echo $tList_row['trans_date']; ?></td>
                            </tr> 
                             <?php } ?>
                           
                          </tbody>
                          
                          <tfoot>
                            <tr>
                            <th style="background-color: white; color: black; text-align: right;" colspan="3">TOTAL COLLECTION:</th>
                            <th style="background-color: white; color: black; padding: 4px; text-align: right;"><?php echo number_format($totalCollection, 2); ?></th>
                            <th style="background-color: white; color: black; text-align: center;" colspan="3">FOR DATE: <?php echo $dateFrom.' - '.$dateTo; ?></th>
                            </tr>
                          </tfoot>
                        
                        </table>
                        
                    <?php } ?>
                    
                    
                    </div>
                    </div>
                    
                    <div class="col-lg-12">
                    <p style="margin-left: 12px;">PREPARED BY:</p>
                    <br />
                    <p>
                    <strong style="text-decoration-line: underline; margin-left: 12px;">____________________________________</strong>
                    <br />
                    <strong style="margin-left: 12px; font-weight: lighter; font-size: small;">Signature over Printed Name</strong>
                    </p>
                    
                    </div>
                    
                    <div class="col-lg-12" style="text-align: right;">
                    <small style="margin-right: 12px; font-weight: lighter;">Date | Time Printed: <?php echo date('m/d/Y').' | '.date('h:i:s A')?></small>  
                    </div>
              
        
</div>
 

</body>
</html>
       
            