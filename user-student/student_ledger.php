<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  <body>
  
  <?php include('menu_sidebar.php'); ?>
  

    <div class="page">

    <?php include('top_navbar.php'); ?>
    
    <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li style="color: blue"><strong><?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Student Ledger</li>
             
          </ul>
          
        </div>
      </div>
      
      <?php include('quick_count.php'); ?>
 
      <div class="col-lg-12">
      
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
            <!-- kinder 1  -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">
                  ASSESSMENTS &amp; ACCOUNTS LEDGER <div class="badge badge-info">SY <?php echo $data_src_sy; ?> <?php if($studData_row['dept']==='Senior High School' OR $studData_row['dept']==='College'){ ?>- <?php echo $data_src_sem;  } ?></div>
                  </a>
                  </h2>
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a>
                </div>
                
                <div id="updates-boxContacts" role="tabpanel" class="collapse show" style="padding: 12px;">
                
                <?php if($studData_row['status']==='Setup'){ ?>
                
                <h5 style="margin-left: 12px;" class="text-info">Details can be viewed after submitting your application. Please be guided accordingly.</h5>
                
                <?php }else{ 
                    
                $assessment_query = $conn->query("SELECT DISTINCT assessment_id FROM tbl_student_assessments WHERE reg_id='$studData_row[reg_id]'") or die(mysql_error());
                $assessment_row = $assessment_query->fetch();
                
                $aGroup_query = $conn->query("SELECT description FROM tbl_accounts_assessments WHERE assessment_id='$assessment_row[assessment_id]'") or die(mysql_error());
                $aGroup_row = $aGroup_query->fetch();
                


                ?>
                
                    <h5>ASSESSMENT SUMMARY</h5>
                    
                    <table>
                    <thead>
                    <tr>
                    <th style="width: 16%;">Payables</th>
                    <th style="width: 10%;">Amount</th>
                    <th style="width: 30%;">Discount</th>
                    <th style="width: 10%;">Payable</th>
                    <th style="width: 10%;">Paid</th>
                    <th style="width: 10%;">Balance</th>
                    <th style="width: 14%;">Excess <small>(Billed)</small></th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    $totalPayables=0;
                    $totalNetPayable=0;
                    $totalNetDiscount=0;
                    
                    $total_amt_paid=0;
                    $total_amt_bal=0;
                    
                    $acctExcess=0;
                    $remainExcess=0;
                    
                    
                    $totalExcess=0;
                    $totalBilled=0;
                    
                    $tbl_student_assessments_query = $conn->query("SELECT DISTINCT category_id FROM tbl_assessment_payables WHERE assessment_id='$assessment_row[assessment_id]'") or die(mysql_error());
                    while ($tbl_student_assessments_row = $tbl_student_assessments_query->fetch()) 
                    {
                                    
                    $tbl_accounts_categories_query = $conn->query("SELECT * FROM tbl_accounts_categories WHERE category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
                    $tbl_accounts_row = $tbl_accounts_categories_query->fetch();
                    $totalPayables+=$tbl_accounts_row['totalAmount'];
                    
                    ?>
                                
                    <tr>
                    <td><?php echo $tbl_accounts_row['description']; ?></td>
                    <td style="text-align: right;"><?php echo number_format($tbl_accounts_row['totalAmount'], 2); ?></td>
                    <td style="text-align: right;">
                    
                    
                    <?php
                    $totalDiscount=0;
                    $tbl_assessments_discounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$studData_row[reg_id]' AND deduct_category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
                    while ($tbl_assessments_discounts_row = $tbl_assessments_discounts_query->fetch()) 
                    {
                        
                        $tbl_assessDCount_query = $conn->query("SELECT * FROM tbl_accounts_discount WHERE acct_discount_id='$tbl_assessments_discounts_row[acct_discount_id]' AND classification='Percentage'") or die(mysql_error());
                        if($tbl_assessDCount_query->rowCount()>0){
                            $assessDCount_row = $tbl_assessDCount_query->fetch();
                            
                            if($assessDCount_row['percentage']<1){
                                $percent_rate= '&nbsp;('.substr($assessDCount_row['percentage'], 2).'%)';
                                
                            }else{
                                $percent_rate= "&nbsp;(100%)";
                                
                            }
                            
                        }else{
                            $percent_rate="";
                        }
                        
                                      
                        $totalDiscount+=$tbl_assessments_discounts_row['amount'];
                    ?>
                    <table style="width: 100%; margin-bottom: 8px;">
                    <thead>
                    <tr>
                    <th colspan="3" style="padding: 2px; <?php if($tbl_assessments_discounts_row['type']==='Receivable'){ ?> background-color: #17a2b8; <?php }else{ ?>background-color: #ffc107; color: black; <?php } ?>"><?php echo $tbl_assessments_discounts_row['description']; ?><?php echo $percent_rate; ?>&nbsp;
                    <small>
                    <?php
                    
                    if($tbl_assessments_discounts_row['type']==='Receivable'){
                        echo 'School&#146;s A/R';
                    }elseif($tbl_assessments_discounts_row['type']==='Payable'){
                        echo 'School&#146;s A/P';
                    }
                    ?>
                    </small>
                    </th>
                    </tr>
                    
                    <!--tr>
                    <th style="padding: 2px; width: 33%;">Amount</th>
                    <th style="padding: 2px; width: 34%;">Received/Paid</th>
                    <th style="padding: 2px; width: 33%;">Balance</th>
                    </tr-->
                    
                    </thead>
                    
                    <tr>
                    <td style="background-color: white; width: 33%;"><?php echo $tbl_assessments_discounts_row['amount']; ?></td>
                    <td style="background-color: white; width: 34%;"><?php echo $tbl_assessments_discounts_row['amt_rcv']; ?></td>
                    <td style="background-color: white; width: 33%;"><?php echo $tbl_assessments_discounts_row['amt_bal']; ?></td>
                    </tr>
                    </table>
                    <?php } ?>
                    
                    
                    
                    </td>
                    
                    <td style="text-align: right;">
                    <?php if(number_format($tbl_accounts_row['totalAmount']-$totalDiscount, 2)<0){
                        $totalNetPayable=$totalNetPayable+0;
                        
                        $totalNetDiscount=$totalNetDiscount+($tbl_accounts_row['totalAmount']-$totalDiscount);
                        echo '0.00';
                        
                        $total_amt_payable='0.00';
                    }else{
                        
                        $totalNetPayable=$totalNetPayable+($tbl_accounts_row['totalAmount']-$totalDiscount);
                        echo number_format($tbl_accounts_row['totalAmount']-$totalDiscount, 2);
                        
                        $total_amt_payable=$tbl_accounts_row['totalAmount']-$totalDiscount;
                    }
                    
                    ?>
                    
                    </td>
                    <?php
                    $assessment2_query = $conn->query("SELECT category_id, total_amt_paid, total_amt_bal FROM tbl_student_assessments WHERE reg_id='$studData_row[reg_id]' AND assessment_id='$assessment_row[assessment_id]' AND category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
                    $assessment2_row = $assessment2_query->fetch();
                    
                    $total_amt_paid+=$assessment2_row['total_amt_paid'];
                    
                    ?>
                    <td style="width: 10%; text-align: right;"><?php echo number_format($assessment2_row['total_amt_paid'], 2); ?></td>
                    
                    <td style="width: 10%; text-align: right;">
                    
                    <?php
                    if($assessment2_row['total_amt_bal']<=0){
                        echo '0.00';
                        $total_amt_bal+=0;
                    }else{
                        echo number_format($assessment2_row['total_amt_bal'], 2);
                        $total_amt_bal+=$assessment2_row['total_amt_bal'];
                    } ?>
                    </td>
                    
                    
                    <td style="width: 10%; text-align: right;">
                    <?php
                    
                    $billing_query = $conn->query("SELECT amt_paid, amt_billed FROM tbl_billing WHERE category_id='$assessment2_row[category_id]' AND schoolYear='$data_src_sy'") or die(mysql_error());
                    $billing_row = $billing_query->fetch();
                    
                    
                    
                    
                    if($assessment2_row['total_amt_bal']<0){
                        
                        $totalExcess+=$assessment2_row['total_amt_bal'];
                        $totalBilled+=$billing_row['amt_paid'];
                    
                        $acctExcess=substr(number_format($assessment2_row['total_amt_bal'], 2), 1);
                        $remainExcess+=substr($assessment2_row['total_amt_bal'], 1)-$billing_row['amt_paid'];
                    }else{
                        
                        $totalExcess+=0;
                        $totalBilled+=0;
                    
                        $acctExcess+=0;
                        $remainExcess+=0;
                    }
                    
                    if($billing_query->rowCount()>0){
                        $chkBalance=$acctExcess-$billing_row['amt_billed'];
                        
                    }else{
                        $chkBalance=$acctExcess-0;
                    }
                    
                    
                    if($assessment2_row['total_amt_bal']<0){
                        echo $acctExcess.' <small>('. number_format($billing_row['amt_paid'], 2).')</small>';
                        
                    }else{
                        echo '0.00';
                        $remainExcess+=0;
                        
                    } ?>
                    
                    </td>
                    
                    </tr>
                    
                    <?php } ?>
                    
                    <?php
                    $totalDiscount=0;
                    $totalRcvdPaid=0;
                    $totalBal=0;
                    
                    $tbl_assessments_discounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$studData_row[reg_id]'") or die(mysql_error());
                    while ($tbl_assessments_discounts_row = $tbl_assessments_discounts_query->fetch()) 
                    {
                        $totalDiscount+=$tbl_assessments_discounts_row['amount'];
                        $totalRcvdPaid+=$tbl_assessments_discounts_row['amt_rcv'];
                        $totalBal+=$tbl_assessments_discounts_row['amt_bal'];
                    } ?>
                    
                    </tbody>
                    
                    <tfoot>
                    <tr>
                    <th style="text-align: right;">Total</td>
                    <th style="text-align: right;"><?php echo number_format($totalPayables, 2); ?></th>
                    
                    
                    
                    <th style="text-align: right;">
                    
                    <table style="width: 100%;">
                    <thead>
                    <tr>
                    <th style="padding: 2px; width: 33%;">Amount</th>
                    <th style="padding: 2px; width: 34%;">Received/Paid</th>
                    <th style="padding: 2px; width: 33%;">Balance</th>
                    </tr>
                    </thead>
                    
                    <tr>
                    <td style="background-color: white;"><?php echo number_format($totalDiscount, 2); ?></td>
                    <td style="background-color: white;"><?php echo number_format($totalRcvdPaid, 2); ?></td>
                    <td style="background-color: white;"><?php echo number_format($totalBal, 2); ?></td>
                    </tr>
                    </table>
                    
                    </th>
                    
                    
                    
                    <th style="text-align: right;"> <?php echo number_format($totalNetPayable, 2); ?> </th>
                    
                    <th style="text-align: right;"><?php echo number_format($total_amt_paid, 2); ?></th>
                    <th style="text-align: right;"><?php echo number_format($total_amt_bal, 2); ?></th>
                    <th style="text-align: right;">
                    <?php
        
                        if($totalExcess<0){
                            echo '<small>'.substr(number_format($totalExcess, 2), 1).' ('.number_format($totalBilled, 2).')</small>';
                        
                        }else{
                            echo '<small>'.number_format($totalExcess, 2).' ('.number_format($totalBilled, 2).')</small>';
                        
                        }
                    ?>
                    </th>
                    </tr>
                    </tfoot>
                    
                    </table>
                    <?php } ?>
                </div>
              </div>
              <!-- kinder End-->
              
                </div>
            </div>
        </div>
     </section>
     
     <?php if($studData_row['status']==='For Payment' OR $studData_row['status']==='Enrolled'){ ?>
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
            
            
            <!-- PAYMENT PLAN -->
            <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a href="print_student_assessment.php" target="_blank" class="btn btn-primary btn-sm" title="Click to print assessment" style="color: white;"><i class="fa fa-print"></i></a>
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts2" aria-expanded="true" aria-controls="updates-boxContacts2">PAYMENT PLAN <div class="badge badge-info">SY <?php echo $data_src_sy; ?> <?php if($studData_row['dept']==='Senior High School' OR $studData_row['dept']==='College'){ ?>- <?php echo $data_src_sem;  } ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts2" aria-expanded="true" aria-controls="updates-boxContacts2"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
            <div id="updates-boxContacts2" role="tabpanel" class="collapse">
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
                                        <td style="background-color: white;">
                                        
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
                                        
                                        if($pterms_row['payment_term']!='Full' AND $pterms_row['payment_term']!='Monthly' AND $pterms_row['category']!='Full' AND $pterms_row['category']!='Monthly'){
                                            
                                            if($pterms_row['month_set_up']==='01'){
                                                $dueDate='January';
                                            }elseif($pterms_row['month_set_up']==='02'){
                                                $dueDate='February';
                                            }elseif($pterms_row['month_set_up']==='03'){
                                                $dueDate='March';
                                            }elseif($pterms_row['month_set_up']==='04'){
                                                $dueDate='April';
                                            }elseif($pterms_row['month_set_up']==='05'){
                                                $dueDate='May';
                                            }elseif($pterms_row['month_set_up']==='06'){
                                                $dueDate='June';
                                            }elseif($pterms_row['month_set_up']==='07'){
                                                $dueDate='July';
                                            }elseif($pterms_row['month_set_up']==='08'){
                                                $dueDate='August';
                                            }elseif($pterms_row['month_set_up']==='09'){
                                                $dueDate='September';
                                            }elseif($pterms_row['month_set_up']==='10'){
                                                $dueDate='October';
                                            }elseif($pterms_row['month_set_up']==='11'){
                                                $dueDate='November';
                                            }elseif($pterms_row['month_set_up']==='12'){
                                                $dueDate='December';
                                            }elseif($pterms_row['month_set_up']==='13'){
                                                $dueDate='Upon Enrolment';
                                            }
                                            
                                            echo '&nbsp; ('.$dueDate.')';
                                        }
                                            if($pterms_row['payment_term']==='Monthly'){
                                                
                                            echo ' ('.number_format(($tbl_accounts_particulars_row['amount']/$pterms_row['month_set_up']), 2).' * '.$pterms_row['month_set_up'].' months) ';
                                            
                                            }
                                        ?>
                                        
                                        </td>
                                        
                                        <td style="background-color: white; text-align: right;">
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
                                        <?php
                                        $assigned_dis_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$studData_row[reg_id]' AND deduct_category_id='$tbl_assessPayable_row[category_id]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                                        while ($ad_row = $assigned_dis_query->fetch()) 
                                        {
                                        
                                        $totalDiscount+=$ad_row['amount'];
                                        
                                        ?>
                                        <p><?php echo $ad_row['description'] ?>: 
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
                                        <?php } ?>
                                        
                                        </td>
                                        <!-- END DISCOUNT SETTINGS COLUMN -->
                                        
                                        </tr> 
                                        
                                        <?php } ?>
                                        <!-- ADVANCE PAYMENT SETTINGS -->
                                      
                                        <tr>
                                        <td colspan="2">Advanced Payment</a></td>
                                        <td>
                                        
                                        <?php
                                        $total_adv_pay=0;
                                        $adv_pay_query = $conn->query("SELECT * FROM tbl_adv_payment WHERE reg_id='$studData_row[reg_id]'") or die(mysql_error());
                                        while ($adv_pay_row = $adv_pay_query->fetch()) 
                                        {
                                            $total_adv_pay+=$adv_pay_row['adv_pay_amt'];
                                            
                                        ?>
                                        
                                        <p><?php echo $adv_pay_row['description']; ?>: <strong class="text-primary"><?php echo number_format($adv_pay_row['adv_pay_amt'], 2); ?></strong></p>
                                         
                                          
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
                        </div>
                      </div>
                    </div>
                    
            </div>
            
            
            </div>
            
            </div>
            
            </div>
            
            <!-- kinder End-->
              
            </div>
                    

                    
        </div>
        
      </section>
      
      <?php } ?>
     
     
     <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
            <!-- kinder 1  -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts3" aria-expanded="true" aria-controls="updates-boxContacts">
                  <i class="fa fa-money"></i> PAYMENT HISTORY <div class="badge badge-info">SY <?php echo $data_src_sy; ?> <?php if($studData_row['dept']==='Senior High School' OR $studData_row['dept']==='College'){ ?>- <?php echo $data_src_sem;  } ?></div>
                  </a>
                  </h2>
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts3" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a>
                </div>
                
                <div id="updates-boxContacts3" role="tabpanel" class="collapse" style="padding: 12px;">
                
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%;">
                          <thead>
                            <tr>
                            <th>#</th>
                            <th>OR</th>
                            
                            <th>PAYABLE</th>
                            <th>CASH</th>
                            <th>CHANGE</th>
                            <th>DATE</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                          
                                <?php
                                $transCtr=0;
                                $transList_query = $conn->query("SELECT DISTINCT receipt_num, payment_type, net_amt_payable, payee_cash, payee_change, trans_date, status FROM tbl_student_payment WHERE reg_id='$studData_row[reg_id]' ORDER BY payment_id DESC") or die(mysql_error());
                                while($tList_row=$transList_query->fetch()){  
                                
                                $transCtr+=1;
                                
                                ?>
     
                                    
                            
                            <?php if($tList_row['status']==='Voided'){ ?>
                            <tr style="background-color: #ff5877;">
                            <td style="color: white;"><?php echo $transCtr; ?></td>
                            <td style="color: white;"><?php echo $tList_row['receipt_num']; ?></td>
                            <td style="color: white;"><?php echo $tList_row['net_amt_payable']; ?></td>
                            <td style="color: white;"><?php echo $tList_row['payee_cash']; ?></td>
                            <td style="color: white;"><?php echo $tList_row['payee_change']; ?></td>
                            <td style="color: white;"><?php echo $tList_row['trans_date']; ?></td>
                            
                            <td style="color: white;">Void </td>
                            
                            </tr>
                            
                            <?php }elseif($tList_row['payment_type']==='Post Billing'){ ?>
                            <tr style="background-color: #fad900;">
                            <td style="color: green;"><?php echo $transCtr; ?></td>
                            <td style="color: green;"><?php echo $tList_row['receipt_num']; ?></td>
                            <td style="color: green;"><?php echo $tList_row['net_amt_payable']; ?></td>
                            <td style="color: green;"><?php echo $tList_row['payee_cash']; ?></td>
                            <td style="color: green;"><?php echo $tList_row['payee_change']; ?></td>
                            <td style="color: green;"><?php echo $tList_row['trans_date']; ?></td>
                            
                            <td>
                            <button title="Click for transaction options..." data-toggle="dropdown" type="button" class="btn btn-primary"><i class="fa fa-gears"></i></button>
                            <div class="dropdown-menu">
                            
                            <a title="Reprint receipt..." href="print_receipt_billing.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                            
                            </div>
                            </td>
                            
                            </tr>
                            
                            <?php }else{ ?>
                            
                            <tr>
                            <td><?php echo $transCtr; ?></td>
                            <td><?php echo $tList_row['receipt_num']; ?></td>
                            <td style="text-align: right;"><?php echo $tList_row['net_amt_payable']; ?></td>
                            <td style="text-align: right;"><?php echo $tList_row['payee_cash']; ?></td>
                            <td style="text-align: right;"><?php echo $tList_row['payee_change']; ?></td>
                            <td><?php echo $tList_row['trans_date']; ?></td>
                            <td>
                            <button title="Click for transaction options..." data-toggle="dropdown" type="button" class="btn btn-outline-primary"><i class="fa fa-gears"></i></button>
                            <div class="dropdown-menu">
                            
                            <a title="Reprint receipt..." href="print_receipt.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>

                            </div>
                            </td>
                            </tr>
                            
                            <?php } } ?>
                           
                          </tbody>
                        </table>
                        </div>
                 
                </div>
              </div>
              <!-- kinder End-->
              
                </div>
            </div>
        </div>
     </section>
     
      </div>
      
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('js_scripts.php'); ?>
 
    
  </body>
</html>
