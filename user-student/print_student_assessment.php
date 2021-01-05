<!DOCTYPE html>
<html>
  <?php include('session.php'); ?>
    
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>STC WEB Portal</title>
    <meta name="description" content="RFID Attendance Monitoring with SMS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
 
 
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../admin/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
            
    <style>
    
    body{
        font-family: Verdana, sans-serif;
        font-size: 12px;
    }
    
    table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      width: 100%;
      font-size: 12px;
    }
    
    table td, table th {
      border: 1px solid #ddd;
      padding: 4px;
    }
    
    table th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #fff;
      color: black;
    }
    
    body {
        
    }
    </style>
    
    <style>
    #load{
        width:100%;
        height:100%;
        position:fixed;
        z-index:9999;
        background:url("../admin/img/ajax-loader.gif") no-repeat center center #dededf;
    }
    </style>
    
  </head>
  
  <body>
  
  
  <div class="col-lg-12">
            
                    <div class="form-group row">
  
  
            <table style="width: 100%;">
 
            <tr>
                <td style="border: none;">
                <center>
                <table>
                <tr>
                <td style="border: none; text-align: center;">
                 <img width="50" height="50" src="../admin/img/<?php echo $sf_row['logo']; ?>" />
                </td>
                </tr>
                <tr>
                <td style="border: none;">
                <center>
                <p style="margin: 4px; font-size: 18px; font-weight: bolder;"><?php echo strtoupper($schoolName); ?></p>
                <p style="margin: 4px; font-size: 12px;"><?php echo $sf_row['address']; ?></p>
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
                <p style="margin-bottom: 0px; margin-top: 0px; font-size: 20px;"><strong>STUDENT ACCOUNTS ASSESSMENT</strong></p>
                <p style="margin-top: 0px; font-size: 14px;"><strong>S.Y. <?php echo $data_src_sy; ?> <?php if($studData_row['dept']==='Senior High School' OR $studData_row['dept']==='College'){ ?>- <?php echo $data_src_sem;  } ?></strong></p>
                </center>
                </td>
            </tr>
            
            
            </table>
            
                      <div class="col-sm-12">
                      
                        <div class="row">
                        
                        <table>
                        <tr>
                        <td style="width: 60%; border: none; font-size: medium;"><strong>STUDENT:</strong>&nbsp;
                        
                        <?php
                            if($studData_row['mname']=='' OR $studData_row['mname']=='-')
                            {
                                $finalMName='';
                                
                            }else{
                                
                                if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                                
                                $finalMName=$suffix.$studData_row['mname'];
                            }
                            
                            echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?>
                            
                        </td>
                        <td style="width: 40%; border: none; font-size: medium;"><strong>LEVEL / SECTION:</strong>&nbsp;
                        
                        
                        <?php
                        if($studData_row['dept']=="Grade School" OR $studData_row['dept']=="Junior High School"){
                            echo $studData_row['gradeLevel'].' - '.$studData_row['section'];
                        
                        }elseif($studData_row['dept']=="Senior High School"){
                            echo $studData_row['gradeLevel']." - ".$studData_row['strand'].' - '.$studData_row['section'];
                        
                        }else{
                            
                            if($studData_row['major']==='N/A' OR $studData_row['major']==='-' OR $studData_row['major']===''){
                                echo $studData_row['gradeLevel']." - ".$studData_row['strand'].' - '.$studData_row['section'];
                            }else{
                                echo $studData_row['gradeLevel']." - ".$studData_row['strand'].' '.$studData_row['major'].' - '.$studData_row['section'];
                            }
                            
                        }
                        ?>
                        </tr>
                        </table>
                        
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
                                <th colspan="2" style="background-color: #b9d40b; width: 65%;">

                                <label for="assess<?php echo $acc_assess_row['assessment_id']; ?>"><?php echo $acc_assess_row['description']; ?></label>

                                </th>
                                
                                <th style="background-color: #b9d40b; width: 35%;">Discounts</th>
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
                                        
                                        <td colspan="2" style="padding: 0px;">
                                        <table>
                                        <thead>
                                        <tr>
                                        <th style="padding: 4px; width: 70%; border: none;"><?php echo $tbl_accounts_row['description']; ?></th>
                                        <th style="padding: 4px; width: 30%; text-align: right; border: none;">
                                        <?php echo number_format($tbl_accounts_row['totalAmount'], 2); ?>
                                        </th>
                                        </tr>
           
                                        </thead>
                                        
                                        <?php
                                        
                                        $tbl_accounts_particulars_query = $conn->query("SELECT * FROM tbl_accounts_particulars WHERE category_id='$tbl_assessPayable_row[category_id]' ORDER BY description ASC") or die(mysql_error());
                                        
                                        if($tbl_accounts_particulars_query->rowCount()>1){
                                            
                                        while ($tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch()) 
                                        {
                                            $pay_terms_query = $conn->query("SELECT * FROM tbl_payment_terms WHERE pterm_id='$tbl_accounts_particulars_row[paymentTerm]'") or die(mysql_error());
                                            $pterms_row = $pay_terms_query->fetch();
                                        
                                        ?>
                                        
                                        <tr>
                                        <td style="background-color: white; border: none;">
                                        
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
                                        
                                        <td style="background-color: white; text-align: right; border: none;">
                                        <?php echo number_format($tbl_accounts_particulars_row['amount'], 2); ?>
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
                                        <td style="vertical-align: top; padding: 0px;">
                                        <table>
                                        <?php
                                        $assigned_dis_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$studData_row[reg_id]' AND deduct_category_id='$tbl_assessPayable_row[category_id]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                                        while ($ad_row = $assigned_dis_query->fetch()) 
                                        {
                                        
                                        $totalDiscount+=$ad_row['amount'];
                                        
                                        ?>
                                        
                                        <tr>
                                        <td style="background-color: white; width: 65%; border: none;"><?php echo $ad_row['description'] ?></td>
                                        <td style="background-color: white; text-align: right; width: 35%; border: none;"><strong><?php echo number_format($ad_row['amount'], 2); ?></strong></td>
                                        </tr>
                                        
                                        <?php } ?>
                                        </table>
                                        </td>
                                        <!-- END DISCOUNT SETTINGS COLUMN -->
                                        
                                        </tr> 
                                        
                                        <?php } ?>
                                        
                                        
                                        <!-- ADVANCE PAYMENT SETTINGS -->
                                      
                                        <tr>
                                        <td colspan="2">Advanced Payment</a></td>
                                        <td>
                                        
                                        <table>
                                        <?php
                                        $total_adv_pay=0;
                                        $adv_pay_query = $conn->query("SELECT * FROM tbl_adv_payment WHERE reg_id='$studData_row[reg_id]'") or die(mysql_error());
                                        while ($adv_pay_row = $adv_pay_query->fetch()) 
                                        {
                                            $total_adv_pay+=$adv_pay_row['adv_pay_amt'];
                                            
                                        ?>
                                        
                                        <tr>
                                        <td style="background-color: white; width: 65%; border: none;"><?php echo $adv_pay_row['description']; ?></td>
                                        <td style="background-color: white; text-align: right; width: 35%; border: none;"><strong><?php echo number_format($adv_pay_row['adv_pay_amt'], 2); ?></strong></td>
                                        </tr>
                                        
                                        <?php } ?>
                                        </table>
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
                                 <th style="font-size: small; padding: 4px; background-color: lightgray;">Net Upon Enrollment</th>
                                 <th style="text-align: right; width: 35%; padding: 4px; background-color: lightgray;"><?php echo number_format($totalUponEnroll, 2); ?> (-<?php echo number_format($totalDiscount+$total_adv_pay, 2); ?>)</th>
                                 <th style="text-align: right; font-size: small; padding: 4px; background-color: lightgray;"><?php if($final_upon_enroll<=0){ echo "0.00"; }else{ echo number_format($final_upon_enroll, 2); } ?></th>
                                 </tr>
                                </tfoot>
                                
                                <tfoot>
                                 <tr>
                                 <th style="font-size: small; padding: 4px; background-color: lightgray;">Net Whole Year</th>
                                 <th style="text-align: right; width: 35%; padding: 4px; background-color: lightgray;"><?php echo number_format($totalWholeYear, 2); ?> (-<?php echo number_format($totalDiscount+$total_adv_pay, 2); ?>)</th>
                                 <th style="text-align: right; font-size: small; padding: 4px; background-color: lightgray;"><?php echo number_format($final_whole_year, 2); ?></th>
                                 </tr>
                                </tfoot>
                                
                                </table>
                                
                                <?php
                      
                                  $assess_footer_query = $conn->query("SELECT * FROM tbl_footer_assessment WHERE gradeLevel='$studData_row[gradeLevel]'") or die(mysql_error());
                                  $af_row = $assess_footer_query->fetch();
                                  
                                ?>
                                <br />
                                <p style="font-size: 14px;"><?php echo nl2br($af_row['contents']); ?></p>
                                <br /><br />
                                <table>
                                <tr>
                                
                                <td style="border: none; padding: 0px; width:  50%;">
                                <p style="text-align: center; font-size: 14px;">
                                <strong style="border-top: solid 1px black;">PARENT'S/GUARDIAN SIGNATURE</strong><br />
                                Over printed name
                                </p>
                                </td>
                                
                                <td style="border: none; padding: 0px; width:  50%;">
                                <p style="text-align: center; font-size: 14px;">
                                <strong style="border-top: solid 1px black;">REGISTRAR'S SIGNATURE </strong><br />
                                Over printed name
                                </p>
                                </td>
                                
                                </tr>
                                </table>
                                
                                </div>
                                
                                
                                
                                </div>
                                
                                <?php } ?>
                        </div>
                      </div>
                    </div>
                    
            </div>
 
 
    
    <?php include('js_scripts.php'); ?>
  </body>
</html>