<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
  <?php
  
  $studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$_GET[regx_id]'") or die(mysql_error());
  $studData_row = $studData_query->fetch();
  
  
  if($studData_row['mname']=='' OR $studData_row['mname']=='-')
  {
    $finalMName='';
                                
  }else{
                                
    if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                                
        $finalMName=$suffix.$studData_row['mname'];
  }
  
  if($studData_row['dept']==='College' OR $studData_row['dept']==='Senior High School'){
    $classDetails=$studData_row['gradeLevel'].' - '.$studData_row['strand'];
  }else{
    $classDetails=$studData_row['gradeLevel'];
  }
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
            <li class="breadcrumb-item"><a href="list_assessment_reqs.php?dept=<?php echo $_GET['dept']; ?>">Assessment Requests - <?php echo $_GET['dept']; ?></a></li>
            <li class="breadcrumb-item active">Accounts Assessment - <?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?></li>
             
          </ul>
          
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <br />
 
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
            
            
            <!-- PAYMENT PLAN -->
            <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts2" aria-expanded="true" aria-controls="updates-boxContacts2"><?php echo strtoupper($classDetails); ?>&nbsp;PAYMENT PLAN <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts2" aria-expanded="true" aria-controls="updates-boxContacts2"><?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-down"></i></a> 
              
              </div>
              
            <div id="updates-boxContacts2" role="tabpanel" class="collapse show">
            <div class="col-lg-12">
            
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                        
                                <?php
                                
                                $acc_assess_query = $conn->query("SELECT * FROM tbl_accounts_assessments WHERE assessment_id='$studData_row[assessment_id]'") or die(mysql_error());
                                while($acc_assess_row = $acc_assess_query->fetch()){
                                
                                $plan_description=$acc_assess_row['description'];
                                ?>
                                
                                <div class="col-md-12">
                                
                                
                                <div class="table-responsive" style="margin-top: 18px;">
                                <table class="table table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                <th colspan="2" style="background-color: #218838; width: 65%;">

                                <label for="assess<?php echo $acc_assess_row['assessment_id']; ?>"><?php echo $acc_assess_row['description']; ?></label>

                                </th>
                                
                                <th style="background-color: #218838; width: 35%;">Discounts</th>
                                </tr>
                                </thead>
                                      
                                      <tbody>
                                      
                                      <?php
                                      $payCtr=0;
                                      $totalUponEnroll=0;
                                      $totalWholeYear=0;
                                      
                                      $totalDiscount=0;
                                      
                                      $tbl_assessPayable_query = $conn->query("SELECT DISTINCT category_id FROM tbl_assessment_payables WHERE assessment_id='$acc_assess_row[assessment_id]' ORDER BY category_id ASC") or die(mysql_error());
                                      while ($tbl_assessPayable_row = $tbl_assessPayable_query->fetch()) 
                                      {
                                        $payCtr+=1;
                                        $category_id=$tbl_assessPayable_row['category_id'];
                                      
                                        $tbl_accounts_categories_query = $conn->query("SELECT * FROM tbl_accounts_categories WHERE category_id='$category_id'") or die(mysql_error());
                                        $tbl_accounts_row = $tbl_accounts_categories_query->fetch();
                                                                                                     
                                      ?>
                                        
                                        <tr> 
                                        
                                       
                                        <?php
                                        
                                        $tbl_accounts_categories_query = $conn->query("SELECT category_id, description, totalAmount FROM tbl_accounts_categories WHERE category_id='$tbl_assessPayable_row[category_id]'") or die(mysql_error());
                                        $tbl_accounts_row = $tbl_accounts_categories_query->fetch();
                                                                                
                                        $totalWholeYear+=$tbl_accounts_row['totalAmount'];
                                        
                                        ?>
                                        
                                        <td colspan="2">
                                        
                                        <table>
                                        
                                        <thead>
                                        <tr>
                                        <th style="padding: 4px; background-color: #17a2b8; width: 70%;"><?php echo $tbl_accounts_row['description']; ?></th>
                                        <th style="padding: 4px; background-color: #17a2b8; width: 30%; text-align: right;">
                                        <?php echo number_format($tbl_accounts_row['totalAmount'], 2); ?>
                                        </th>
                                        </tr>
                                        <?php
                                        $tbl_accounts_particulars_query = $conn->query("SELECT * FROM tbl_accounts_particulars WHERE category_id='$tbl_assessPayable_row[category_id]' ORDER BY description ASC") or die(mysql_error());
                                        if($tbl_accounts_particulars_query->rowCount()>1){ ?>
                                        <tr>
                                        <th style="padding: 4px;">Particulars</th>
                                        <th style="padding: 4px; text-align: right;">Amount</th>
                                        </tr>
                                        <?php } ?>
                                        </thead>
                                        
                                        <?php
                                        if($tbl_accounts_particulars_query->rowCount()>1){ 
                                        while ($tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch()) 
                                        {
                                            
                                            $pay_terms_query = $conn->query("SELECT * FROM tbl_payment_terms WHERE pterm_id='$tbl_accounts_particulars_row[paymentTerm]'") or die(mysql_error());
                                            $pterms_row = $pay_terms_query->fetch();
                                        
                                        ?>
                                        
                                        <tr>
                                        <td style="background-color: white; padding: 4px;">
                                        
                                        <?php
                                        
                                        if($pterms_row['payment_term']==='Monthly'){
                                            
                                            $totalUponEnroll+=($tbl_accounts_particulars_row['amount']/$pterms_row['month_set_up']);
                                            
                                        }else{
                                            if($pterms_row['payment_term']==='Full' OR $pterms_row['payment_term']==='1st Adjustment'){
                                                $totalUponEnroll+=$tbl_accounts_particulars_row['amount'];
                                                    
                                            }elseif($pterms_row['payment_term']==='2nd Adjustment' OR $pterms_row['payment_term']==='3rd Adjustment'){
                                                $totalUponEnroll+=0;
                                                    
                                            }
                                        }
                                                                                                                                                                
                                        echo $tbl_accounts_particulars_row['description'];
                                        
                                            if($pterms_row['payment_term']==='Monthly'){
                                                
                                            echo ' ('.number_format(($tbl_accounts_particulars_row['amount']/$pterms_row['month_set_up']), 2).' * '.$pterms_row['month_set_up'].' months) ';
                                            
                                            }
                                        ?>
                                        
                                        </td>
                                        
                                        <td style="background-color: white; text-align: right; padding: 4px;">
                                        <?php
                                        if($pterms_row['payment_term']==='Monthly'){
                                                
                                            echo number_format($tbl_accounts_particulars_row['amount'], 2);
                                             
                                        }else{
                                            echo number_format($tbl_accounts_particulars_row['amount'], 2);
                                        }
                                        ?>
                                        </td>
                                        
                                        
                                        </tr>
                                        
                                        <?php } }else{
                                                                                                                                                                                                                            
                                        $tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch();
                                                                                                                                                                                
                                        $pay_terms_query = $conn->query("SELECT * FROM tbl_payment_terms WHERE pterm_id='$tbl_accounts_particulars_row[paymentTerm]'") or die(mysql_error());
                                        $pterms_row = $pay_terms_query->fetch();
                                            
                                        if($pterms_row['payment_term']==='Monthly'){
                                            
                                            $totalUponEnroll+=($tbl_accounts_particulars_row['amount']/$pterms_row['month_set_up']);
                                            
                                        }else{
                                            if($pterms_row['payment_term']==='Full' OR $pterms_row['payment_term']==='1st Adjustment'){
                                                $totalUponEnroll+=$tbl_accounts_particulars_row['amount'];
                                                    
                                            }elseif($pterms_row['payment_term']==='2nd Adjustment' OR $pterms_row['payment_term']==='3rd Adjustment'){
                                                $totalUponEnroll+=0;
                                                    
                                            }
                                        }
                                                                                                                                                                                
                                                                                    
                                        } ?>
                                        
                                       </table>
                                       
                                        </td>
                                        
                                        <!-- DISCOUNT SETTINGS COLUMN -->
                                        <td>
                                        <a data-toggle="modal" data-target="#assign_assess_discount<?php echo $tbl_assessPayable_row['category_id']; ?>" href="#" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-plus"></i> Discount</a>
                                        <hr />
                                       <p>
                                       <?php
                                      
                                       ?></p>
                                        <?php
                                        $assigned_dis_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$studData_row[reg_id]' AND deduct_category_id='$tbl_assessPayable_row[category_id]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                                        while ($ad_row = $assigned_dis_query->fetch()) 
                                        {
                                            
                                        $totalDiscount+=$ad_row['amount'];
                                        
                                        ?>
                                        <p><a data-toggle="modal" data-target="#delAssignDiscount<?php echo $ad_row['discount_id'] ?>" href="#" title="Click to remove assigned discount..."><i class="fa fa-times"></i> <?php echo $ad_row['description'] ?>:&nbsp;
                                        
                                        <strong class="text-primary">
                                        <?php
                                        
                                        $tbl_assessDCount_query = $conn->query("SELECT * FROM tbl_accounts_discount WHERE acct_discount_id='$ad_row[acct_discount_id]'") or die(mysql_error());
                                        $assessDCount_row = $tbl_assessDCount_query->fetch(); 
                      
                                        if($assessDCount_row['classification']==='Fixed Amount'){
                                            echo number_format($assessDCount_row['amount'], 2);
                                        }else{
                                            if($assessDCount_row['percentage']<1){
                                                echo number_format($ad_row['amount'], 2);
                                                echo ' ('.substr($assessDCount_row['percentage'], 2).'%)';
                                            }else{
                                                echo "100%";
                                            }
                                            
                                            
                                        }
                                        ?>
                                        </strong>
                                        
                                        </a></p>
                                        
                                        
                                        <!-- remove assigned discount confirmation Modal -->
                                          <div id="delAssignDiscount<?php echo $ad_row['discount_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                            <div role="document" class="modal-dialog">
                                              <div class="modal-content">
                                              <form action="save_assessment_reqs_setup.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>&discount_id=<?php echo $ad_row['discount_id'] ?>" method="POST">
                
                                                <div class="modal-header">
                                                  <h5 id="exampleModalLabel" class="modal-title">CONFIRMATION</h5>
                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                <p>Payable: <?php echo $tbl_accounts_row['description']; ?> (<strong class="text-primary"><?php echo number_format($tbl_accounts_row['totalAmount'], 2); ?></strong>)</p>
                                                <p>Discount: <?php echo $ad_row['description'] ?> (<strong class="text-primary"><?php echo number_format($ad_row['amount'], 2); ?></strong>)</p>
                                                <hr />
                                                <h4>Remove assigned discount?</h4>
                                                  
                                                </div>
                                                
                                                <div class="modal-footer">
                                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                                  <button name="removeAssDis" type="submit" class="btn btn-danger">Yes</button>
                                                </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- end remove assigned discount Modal -->
                                        <?php } ?>
                                        
                                        </td>
                                        <!-- END DISCOUNT SETTINGS COLUMN -->
                                        
                                        </tr> 
                                        
                                        <?php } ?>
                                        
                                        <!-- ADVANCE PAYMENT SETTINGS -->
                                      
                                        <tr>
                                        <td colspan="2"><a data-toggle="modal" data-target="#addAdvPay" href="#" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-plus"></i> Advance Payment</a></td>
                                        <td>
                                        
                                        <?php
                                        $total_adv_pay=0;
                                        $adv_pay_query = $conn->query("SELECT * FROM tbl_adv_payment WHERE reg_id='$studData_row[reg_id]'") or die(mysql_error());
                                        while ($adv_pay_row = $adv_pay_query->fetch()) 
                                        {
                                            $total_adv_pay+=$adv_pay_row['adv_pay_amt'];
                                            
                                        ?>
                                        
                                        <p><a data-toggle="modal" data-target="#delAdvPay<?php echo $adv_pay_row['adv_pay_id']; ?>" href="#" title="Click to remove advanced payment..."><i class="fa fa-times"></i>&nbsp;&nbsp;<?php echo $adv_pay_row['description']; ?>: <strong class="text-primary"><?php echo number_format($adv_pay_row['adv_pay_amt'], 2); ?></strong></a></p>
                                        <!-- remove advance payment Modal -->
                                          <div id="delAdvPay<?php echo $adv_pay_row['adv_pay_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                            <div role="document" class="modal-dialog">
                                              <div class="modal-content">
                                              <form action="save_assessment_reqs_setup.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>&adv_pay_id=<?php echo $adv_pay_row['adv_pay_id']; ?>" method="POST">
                
                                                <div class="modal-header">
                                                  <h5 id="exampleModalLabel" class="modal-title">CONFIRMATION</h5>
                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                <p>Description: <?php echo $adv_pay_row['description']; ?></p>
                                                <p>Total Amount: <?php echo number_format($adv_pay_row['adv_pay_amt'], 2); ?></p>
                                                <hr />
                                                <h4>Remove advanced payment?</h4>
                                                  
                                                </div>
                                                
                                                <div class="modal-footer">
                                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                                  <button name="remove_adv_pay" type="submit" class="btn btn-danger">Yes</button>
                                                </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- end remove advance payment Modal -->
                                          
                                        <?php } ?>
                                        </td>
                                        </tr>
                                        <!-- END ADVANCE PAYMENT SETTINGS -->
                                      </tbody>
                                 
                                 
                                 <?php
                                 $final_upon_enroll=($totalUponEnroll-$totalDiscount)-$total_adv_pay;
                                 $final_whole_year=($totalWholeYear-$totalDiscount)-$total_adv_pay;
                                 ?>
                                 <tfoot>
                                 <tr>
                                 <th style="font-size: small;">Net Upon Enrollment</th>
                                 <th style="text-align: right; width: 35%; padding-right: 14px;"><?php echo number_format($totalUponEnroll, 2); ?> (-<?php echo number_format($totalDiscount+$total_adv_pay, 2); ?>)</th>
                                 <th style="font-size: small;">Net Total with Discount: <strong style="font-weight: bold; color: white; font-size: medium;"><?php if($final_upon_enroll<=0){ echo "0.00"; }else{ echo number_format($final_upon_enroll, 2); } ?></strong></th>
                                 </tr>
                                </tfoot>
                                
                                <tfoot>
                                 <tr>
                                 <th style="font-size: small; background-color: #17a2b8;">Net Whole Year</th>
                                 <th style="text-align: right; width: 35%; padding-right: 14px; background-color: #17a2b8;"><?php echo number_format($totalWholeYear, 2); ?> (-<?php echo number_format($totalDiscount+$total_adv_pay, 2); ?>)</th>
                                 <th style="font-size: small; background-color: #17a2b8;">Net Total with Discount: <strong style="font-weight: bold; color: white; font-size: medium;"><?php echo number_format($final_whole_year, 2); ?></strong></th>
                                 </tr>
                                </tfoot>
                                
                                </table>
                                </div>
                                
                                
                                
                                </div>
                                
                                <?php } ?>
                                
                                
                                
                                        <!-- add advance payment Modal -->
                                          <div id="addAdvPay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                                            <div role="document" class="modal-dialog">
                                              <div class="modal-content">
                                              <form action="save_assessment_reqs_setup.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>" method="POST">
                
                                                <div class="modal-header">
                                                  <h5 id="exampleModalLabel" class="modal-title">ADD ADVANCED PAYMENT</h5>
                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                
                                                    <div class="form-group row">
                                                      <label class="col-sm-3 form-control-label">Description</label>
                                                      <div class="col-sm-9">
                                                        <input name="description" type="text" class="form-control" placeholder="Enter advanced payment description..." />
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                      <label class="col-sm-3 form-control-label">Amount</label>
                                                      <div class="col-sm-9">
                                                        <input name="adv_pay_amt" type="number" min="0.50" max="100000.00" step="0.50" class="form-control" placeholder="Enter amount..." />
                                                      </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="modal-footer">
                                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                                                  <button name="add_adv_pay" type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- end add advance payment Modal -->
                                          
                        </div>
                      </div>
                    </div>
                    
            </div>
            
            
            </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-12 text-center">
                      
                        <a data-toggle="modal" data-target="#setAcctPayment" href="#" class="btn btn-primary" style="color: white;"><i class="fa fa-check"></i> Set Account for Payment</a>
                         
                          <!-- for payment confirmation Modal -->
                          <div id="setAcctPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_assessment_reqs_setup.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>" method="POST">

                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">CONFIRMATION</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                <?php
                                if($studData_row['mname']=='')
                                {
                                    $finalMName='';
                                  
                                }else{
                                    
                                    if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                                    
                                    $finalMName=$suffix.substr($studData_row['mname'], 0, 1).'.';
                                }
                                  ?>
                                <p><strong>Student:</strong> <?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?></p>
                                <p><strong>Class Details:</strong>&nbsp;
                                <?php
                        
                                    if($_GET['dept']=="Grade School" OR $_GET['dept']=="Junior High School")
                                    {
                                        echo $studData_row['gradeLevel'];
                                    }elseif($_GET['dept']=="Senior High School"){
                                        echo $studData_row['gradeLevel']." - ".$studData_row['strand'];
                                    }else{
                                        echo $studData_row['gradeLevel']." - ".$studData_row['strand'].' '.$studData_row['major'] ;
                                    }
                                    
                                ?>&nbsp;<small class="text-primary"><?php echo $studData_row['classification']; ?></small>
                                </p>
                                <p><strong>Payment Plan:</strong> <?php echo $plan_description; ?></p>
                                <hr />
                                <h4>Set student account for payment?</h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">No</a>
                                  <button name="updateStatus" type="submit" class="btn btn-primary">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end for payment confirmation Modal -->
                          
                          
                      </div>
                    </div>
            </div>
            
            </div>
            
            <!-- kinder End-->
              
            </div>
                    

                    
        </div>
        
        
        
        <?php
        
        $tbl_assessPayable_query2 = $conn->query("SELECT DISTINCT category_id FROM tbl_assessment_payables WHERE assessment_id='$studData_row[assessment_id]' ORDER BY category_id ASC") or die(mysql_error());
        while ($tbl_assessPayable_row2 = $tbl_assessPayable_query2->fetch())
        {
            $tbl_accounts_categories_query2 = $conn->query("SELECT description, totalAmount FROM tbl_accounts_categories WHERE category_id='$tbl_assessPayable_row2[category_id]'") or die(mysql_error());
            $tbl_accounts_row2 = $tbl_accounts_categories_query2->fetch();
            
            include('list_assessment_reqs_setup_modal.php');
        
        }
        ?>
        
        
      </section>
     
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
 
  </body>
</html>
