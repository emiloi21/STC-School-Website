<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  <body>
  
  <?php include('menu_sidebar.php'); ?>
  

    <div class="page">

    <?php include('navbar_header.php'); ?>
    
    
    <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li style="color: blue"><strong><?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Print Reports</li>
          </ul>
        </div>
      </div>
      
      
      
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
 
              <!-- JHS -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a data-toggle="modal" data-target="#newTrans" href="#" class="btn btn-success btn-sm" style="color: white;"><i class="fa fa-refresh"></i></a>
                              
                          <!-- cancel billing Modal -->
                          <div id="newTrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                               
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">CONFIRM</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>Do you want to cancel billing?</h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button onclick="close_window()" class="btn btn-danger" style="color: white;">Yes</button>
                                </div>
                                 
                              </div>
                            </div>
                          </div>
                          <!-- end cancel billing Modal -->
                              
                   <strong style="font-weight: bolder;">BILLING SYSTEM</strong>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxJHS" aria-expanded="true" aria-controls="updates-boxJHS"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxJHS" role="tabpanel" class="collapse show">
 
                    <div class="row col-md-12">
                    
                    <div class="col-lg-12 col-md-12">
                    
                    <hr />
                    <div class="table-responsive">
                    <?php
                    $payee_query = $conn->query("SELECT * FROM students WHERE reg_id='$_GET[reg_id]'") or die(mysql_error());
                    $payee_row = $payee_query->fetch();
                    ?>
                    <table style="width: 100%;">
                    
                    <tr>
                    <td style="background-color: white;">
                    SCHOOL YEAR: 
                    <strong style="font-size: large; font-weight: bolder;"><?php echo $_GET['schoolYear']; ?></strong>
                    &middot;
                    <strong style="font-size: large; font-weight: bolder;"><?php echo $_GET['semester']; ?></strong>
                    </td>
                    
                    <td style="background-color: white;">
                    TYPE: <strong style="font-size: large; font-weight: bolder;"><?php echo $_GET['payment_type']; ?></strong>
                    </td>
                    </tr>
                    <tr>
                    
                    <td style="background-color: white;">
                    STUDENT ID CODE:<strong style="font-size: large; font-weight: bolder;"><?php echo $payee_row['student_id']; ?></strong>
                    </td>
        
                    
                    <td style="background-color: white;">
                    TRANSACTION CODE: <strong style="font-size: large; font-weight: bolder;"><?php echo $_GET['receipt_num']; ?></strong>
                    </td>
                    
                    </tr>
                    
                    <tr>
                    
                    <td style="background-color: white;">
                    <?php
                    $tbl_accounts_assessments_query = $conn->query("SELECT description FROM tbl_accounts_assessments WHERE assessment_id='$_GET[assessment_id]'") or die(mysql_error());
                    $tbl_accounts_assessments_row = $tbl_accounts_assessments_query->fetch();
                    ?>
                    
                    PAY TO: <strong style="font-size: large; font-weight: bolder;"><?php
                        if($payee_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($payee_row['suffix']=='-') { $suffix=''; }else{ $suffix=$payee_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$payee_row['mname'];
                        }
                        
                        echo $payee_row['lname'].", ".$payee_row['fname']." ".$finalMName;
                        
                    ?></strong> (<?php echo $tbl_accounts_assessments_row['description']; ?>)
                    </td>
                    
                    <td style="background-color: white;">
                    CLASS: <strong style="font-size: large; font-weight: bolder;"><?php
                        if($payee_row['strand']==='N/A')
                        {
                            echo $payee_row['gradeLevel'].'-'.$payee_row['section'];
                        }else{ 
                            echo $payee_row['gradeLevel'].'-'.$payee_row['strand'].'-'.$payee_row['section'];
                        } ?></strong>
                    </td>
       
                    
                    </tr>
                    
                    </table>
                    <hr />
                    <table id="" class="display" style="width:100%">
                    
                    <thead>
                    <tr>
                     
                    <th>Particulars</th>
                    <th>Payable Amount</th>
                    <th>Payment Amount</th>
                    <th></th>
                    </tr>
                    </thead>
                    
                          <tbody>
                          
                          <?php
                          
                          $totalPayable=0;
                          $totalPayment=0;
                          
                          $tbl_student_assessments_query = $conn->query("SELECT * FROM tbl_student_assessments WHERE reg_id='$_GET[reg_id]' AND assessment_id='$_GET[assessment_id]' AND total_amt_bal<0") or die(mysql_error());
                          while($tbl_student_assessments_row = $tbl_student_assessments_query->fetch()){
                            
                          
                          $tbl_student_payment_dummy_query = $conn->query("SELECT payment_id, amt_payable, amt_paid FROM tbl_student_payment_dummy WHERE receipt_num='$_GET[receipt_num]' AND category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
                          $tbl_student_payment_dummy_row = $tbl_student_payment_dummy_query->fetch();
                          
                          $chkBilled_query = $conn->query("SELECT amt_paid FROM tbl_billing WHERE category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
                          $chkBilled_row = $chkBilled_query->fetch();
                          
                          $payment_id=$tbl_student_payment_dummy_row['payment_id'];
                          
                          $totalPayable=substr($tbl_student_payment_dummy_row['amt_payable'], 1)-$chkBilled_row['amt_paid'];
                          
                          if($totalPayable>0){
                            
                          
                          ?>
                            
                            <tr>
                             
                            <td>
                            <?php
                            
                            $tbl_accounts_categories_query = $conn->query("SELECT description, totalAmount FROM tbl_accounts_categories WHERE category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
                            $tbl_accounts_row = $tbl_accounts_categories_query->fetch();
                        
                            echo $tbl_accounts_row['description'];
                            
                            ?> 
                            </td>
                            
                            <td>
                            <?php
                            echo number_format($totalPayable, 2);
                            ?>
                            </td>
                            
                            <td>
                            <?php 
                            $totalPayment+=$tbl_student_payment_dummy_row['amt_paid'];
                            
                            echo $tbl_student_payment_dummy_row['amt_paid'];
                            ?>
                            
                            </td>
                            <td style="width: 10px;">
                              <?php if($activeSchoolYear===$data_src_sy AND $totalPayable>0){ ?>
                              <a style="color: white !important;" data-toggle="modal" data-target="#enter_payment<?php echo $payment_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> PAYMENT</a>
                              
                               
                              <!-- enter payment Modal -->
                              <div id="enter_payment<?php echo $payment_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                <div role="document" class="modal-dialog">
                                  <div class="modal-content">
                                  
                                    <form action="save_cashiering_billing.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&payment_id=<?php echo $payment_id; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $_GET['receipt_num']; ?>" method="POST">
                              
                                    <div class="modal-header">
                                      <h5 id="exampleModalLabel" class="modal-title">Enter Payment</h5>
                                      <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></a>
                                    </div>
                                    
                                    <div class="modal-body">
                                    
                                    <h4><?php echo $tbl_accounts_row['description']; ?></h4>
                                    <table>
                                    <thead>
                                    <tr>
                                    <th>Amount Payable</th>
                                    <th>Payment Amount</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <tr>
                                    <td style="background-color: white; width: 50%;"><input value="<?php echo number_format($totalPayable, 2); ?>" name="amt_payable" readonly="" class="form-control form-control-lg" /></td>
                                    
                                    <td style="background-color: white; width: 50%;">
                                    <input name="payment_id" value="<?php echo $tbl_student_payment_dummy_row['payment_id']; ?>" type="hidden" />
                                    <?php
                                    if($tbl_accounts_row['description']==='TUITION FEE' OR $tbl_accounts_row['description']==='Tuition Fee' OR $tbl_accounts_row['description']==='tuition fee'  OR $tbl_accounts_row['description']==='TuitionFee'){ ?>
                                    
                                    <input name="amt_paid" value="<?php echo $tbl_student_payment_dummy_row['amt_paid']; ?>" type="number" min="0.50" max="100000.00" step="0.50" class="form-control form-control-lg" placeholder="Enter amount..." />
                                    
                                    <?php }else{ ?>
                                    
                                    <input name="amt_paid" value="<?php echo $tbl_student_payment_dummy_row['amt_paid']; ?>" type="number" min="0.50" max="<?php echo $totalPayable; ?>" step="0.50" class="form-control form-control-lg" placeholder="Enter amount..." />
                                    
                                    <?php } ?>
                                    
                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    
                                    </div>
 
                                      <button style="display: none;" name="updatePayment">updatePayment</button>
                                   
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <!-- end enter payment Modal -->
                              
                              <?php }else{ ?>
                              
                                    <?php
                                    if($tbl_accounts_row['description']==='TUITION FEE' OR $tbl_accounts_row['description']==='Tuition Fee' OR $tbl_accounts_row['description']==='tuition fee'  OR $tbl_accounts_row['description']==='TuitionFee'){ ?>
                                    
                                    <a style="color: white !important;" data-toggle="modal" data-target="#enter_payment<?php echo $payment_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> PAYMENT</a>
                              
                               
                                      <!-- enter payment Modal -->
                                      <div id="enter_payment<?php echo $payment_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                        <div role="document" class="modal-dialog">
                                          <div class="modal-content">
                                          
                                            <form action="save_cashiering_billing.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&payment_id=<?php echo $payment_id; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $_GET['receipt_num']; ?>" method="POST">
                                      
                                            <div class="modal-header">
                                              <h5 id="exampleModalLabel" class="modal-title">Enter Payment</h5>
                                              <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></a>
                                            </div>
                                            
                                            <div class="modal-body">
                                            
                                            <h4><?php echo $tbl_accounts_row['description']; ?></h4>
                                            <table>
                                            <thead>
                                            <tr>
                                            <th>Amount Payable</th>
                                            <th>Payment Amount</th>
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                            <tr>
                                            <td style="background-color: white; width: 50%;"><input value="<?php echo number_format($totalPayable, 2); ?>" name="amt_payable" readonly="" class="form-control form-control-lg" /></td>
                                            
                                            <td style="background-color: white; width: 50%;">
                                            <input name="payment_id" value="<?php echo $tbl_student_payment_dummy_row['payment_id']; ?>" type="hidden" />
                                            <?php
                                            if($tbl_accounts_row['description']==='TUITION FEE' OR $tbl_accounts_row['description']==='Tuition Fee' OR $tbl_accounts_row['description']==='tuition fee'  OR $tbl_accounts_row['description']==='TuitionFee'){ ?>
                                            
                                            <input name="amt_paid" value="<?php echo $tbl_student_payment_dummy_row['amt_paid']; ?>" type="number" min="0.50" max="100000.00" step="0.50" class="form-control form-control-lg" placeholder="Enter amount..." />
                                            
                                            <?php }else{ ?>
                                            
                                            <input name="amt_paid" value="<?php echo $tbl_student_payment_dummy_row['amt_paid']; ?>" type="number" min="0.50" max="<?php echo $totalPayable; ?>" step="0.50" class="form-control form-control-lg" placeholder="Enter amount..." />
                                            
                                            <?php } ?>
                                            
                                            </td>
                                            </tr>
                                            </tbody>
                                            </table>
                                            
                                            </div>
         
                                              <button style="display: none;" name="updatePayment">updatePayment</button>
                                           
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- end enter payment Modal -->
                                    <?php }else{ ?>
                                    
                                    No Payable
                                    
                                    <?php } ?>
                                    
                              
                              <?php } ?>
                            </td>
                            </tr> 
                            
                            <?php } } ?>
                           
                          </tbody>
                          
                     <tfoot>
                     <tr>
                     
                     <th>TOTAL: </th>
                     <th><?php echo number_format($totalPayable, 2); ?></th>
                     <th><?php echo number_format($totalPayment, 2); ?></th>
                     <th style="width: 10px;">
                     <?php if($activeSchoolYear===$data_src_sy AND $totalPayment>0){ ?>
                     <a style="color: white !important;" data-toggle="modal" data-target="#enter_payeeCash" href="#" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> PAY BILL</a>
                              
                              <!-- total payment Modal -->
                              <div id="enter_payeeCash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                <div role="document" class="modal-dialog">
                                  <div class="modal-content">
                                  
                                  <form action="save_cashiering_billing.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&payment_id=<?php echo $payment_id; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $_GET['receipt_num']; ?>" method="POST">
                              
                                    <div class="modal-header">
                                      <h5 id="exampleModalLabel" class="modal-title" style="color: black;">ENTER AMOUNT BILLED</h5>
                                      <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></a>
                                    </div>
                                    
                                    <div class="modal-body">
                                    
                                    <div class="form-group row">
                                      <label class="col-sm-4 form-control-label" style="color: black;">Entry Date</label>
                                      <div class="col-sm-8">
                                        <input type="date" value="<?php echo date('Y-m-d'); ?>" name="entryDate" class="form-control form-control-sm" />
                                        <small style="color: black;">MM/DD/YYYY</small>
                                      </div>
                                    </div>
                                    
                                    <table>
                                    <thead>
                                    <tr>
                                    <th>Total Amount Due</th>
                                    <th>Billed Amount</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <tr>
                                    <td style="background-color: white; width: 50%;">
                                    <input type="hidden" name="net_amt_payable" value="<?php echo $totalPayment; ?>" />
                                    <input value="<?php echo number_format($totalPayment, 2); ?>" readonly="" class="form-control form-control-lg" />
                                    </td>
                                    
                                    <td style="background-color: white; width: 50%;">
                                    <input name="payee_cash" value="<?php echo $totalPayment; ?>" type="number" min="<?php echo $totalPayment; ?>" max="100000.00" step="0.50" class="form-control form-control-lg" placeholder="Enter amount..." />
                                    </td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    
                                    <br />
                                    
                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <input type="text" name="remarks" placeholder="Billing Remarks ex. Voucher Code" class="form-control form-control-sm" />
                                        <small style="color: black;">Remarks</small>
                                      </div>
                                    </div>
                                    
                                    </div>
 
                                      <button style="display: none;" name="updatePayeeCash">updatePayeeCash</button>
                                   
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <!-- end total payment Modal -->
                              
                     <?php }else{ ?>
                     <a style="color: gray !important;" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> PAY BILL</a>
                     <?php } ?>
                     </th>
                     </tr>
                     </tfoot>
                     </table>
                     </div>
                    
                    
                    </div>
                    <br />
                    <div class="modal-footer">
                    
                    </div>

                    
                </div>
              </div>
              <!-- JHS End-->
 
               
            </div>
            
          </div>
        </div>
        
                  
      </section>
      
      <?php
      $payee_query=null;
      $payee_row=null;
      $tbl_accounts_assessments_query=null;
      $tbl_accounts_assessments_row=null;
      $tbl_accounts_categories_query=null;
      $tbl_accounts_row=null;
      $tbl_student_assessments_query=null;
      $tbl_student_assessments_row=null;
      $tbl_student_payment_dummy_query=null;
      $tbl_student_payment_dummy_row=null;
      $conn=null;
      ?>
      
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
    
    <script>
    function close_window(){
        
        close();
        
    }
    </script>
    
 
  </body>
</html>