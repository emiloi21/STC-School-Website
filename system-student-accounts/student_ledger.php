<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
<?php
if(isset($_POST['search'])){
    
$searched=$_POST['searchStudent'];

}else{

$searched=$_GET['searched'];

} ?>
 


<?php //include('loaderFX.php'); ?>
 
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
            <li class="breadcrumb-item active">Student Ledger</li>
             
          </ul>
          
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <br />
 
      <div class="col-lg-12">

      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
            <!-- kinder 1  -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><i class="icon-search"></i> STUDENT LEDGER LOOK-UP <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></h2>
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a>
                </div>
                
                <div id="updates-boxContacts" role="tabpanel" class="collapse show">
                 
                <div id="London" class="tabcontent" style = "display: block;">
                
                <form method="POST">
                <div class="form-group row">
                        <div class="col-sm-12">
                          <div class="input-group">
                          
                          <input value="<?php echo $searched; ?>" name="searchStudent" list="search_list1" placeholder="Search for Student's ID Code / Lastname..." class="form-control" required="true" />
                          
                          
                          
                          <datalist id="search_list1">
                                    <?php
                                    
                                    $fnameList_query = $conn->query("SELECT DISTINCT student_id, lname, fname, mname, suffix FROM students WHERE schoolYear='$data_src_sy'");
                                    while($fnlq_row = $fnameList_query->fetch()){
                                        
                                  
                                    if($fnlq_row['suffix']=="-")
                                    {
                                    $listName=$fnlq_row['fname']." ".substr($fnlq_row['mname'], 0,1).". ".$fnlq_row['lname'];
                                                                
                                    }else{
                                        
                                    $listName=$fnlq_row['fname']." ".substr($fnlq_row['mname'], 0,1).". ".$fnlq_row['lname']." ".$fnlq_row['suffix'];
                                                                
                                    } ?>
                                    
                                    
                                    <option value="<?php echo $fnlq_row['student_id']; ?>"><small><?php echo $listName; ?></small></option>
                                    
                                    <?php } ?>
                          </datalist>
                           
                            
                            <div class="input-group-append">
                              <button name="search" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                            </div>
                          </div>
                        </div>
                    </div>
                 </form>   
 
                <hr />
 
                <?php
                $studData_query = $conn->query("SELECT * FROM students WHERE student_id='$searched'") or die(mysql_error());
                
                if($studData_query->rowCount()>0){
                    
                $sData_row = $studData_query->fetch();
                
                $assessment_query = $conn->query("SELECT DISTINCT assessment_id FROM tbl_student_assessments WHERE reg_id='$sData_row[reg_id]'") or die(mysql_error());
                $assessment_row = $assessment_query->fetch();
                
                $aGroup_query = $conn->query("SELECT description FROM tbl_accounts_assessments WHERE assessment_id='$assessment_row[assessment_id]'") or die(mysql_error());
                $aGroup_row = $aGroup_query->fetch();
                


                ?>
                <div class="form-group row">
                    <div class="col-sm-6">
                    <p>
                    <?php
                              
                    if($sData_row['suffix']=="-")
                    {
                    echo $sData_row['fname']." ".substr($sData_row['mname'], 0,1).". ".$sData_row['lname'];
                                                
                    }else{
                        
                    echo $sData_row['fname']." ".substr($sData_row['mname'], 0,1).". ".$sData_row['lname']." ".$sData_row['suffix'];
                                                
                    } ?>
                     &nbsp; [ <?php echo $sData_row['student_id']; ?> ]
                    <br />
                    <small>Student &nbsp; [ ID Code ]</small>
                    </p>
                    </div>
                    
                    <div class="col-sm-3">
                    <p>
                    <?php
                              
                    if($sData_row['dept']==='SHS')
                    {
                    echo $sData_row['gradeLevel']." - ".$sData_row['strand']." - ".$sData_row['section'];
                                                
                    }else{
                    echo $sData_row['gradeLevel']." - ".$sData_row['section'];
                                                
                    } ?>
                    <br />
                    <small>Class Details</small>
                    </p>
                    </div>
                    
                    <div class="col-sm-3">
                    <p>
                    <?php echo $aGroup_row['description']; ?>
                    <br />
                    <small>Assessment Group</small>
                    </p>
                    </div>
                </div>
                
                    <h4>ASSESSMENT SUMMARY</h4>
                    
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
                    $tbl_assessments_discounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$sData_row[reg_id]' AND deduct_category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
                    while ($tbl_assessments_discounts_row = $tbl_assessments_discounts_query->fetch()) 
                    {
                        $totalDiscount+=$tbl_assessments_discounts_row['amount'];
                    ?>
                    <table style="width: 100%; margin-bottom: 8px;">
                    <thead>
                    <tr>
                    <th colspan="3" style="padding: 2px; <?php if($tbl_assessments_discounts_row['type']==='Receivable'){ ?> background-color: #17a2b8; <?php }else{ ?>background-color: #ffc107; color: black; <?php } ?>"><?php echo $tbl_assessments_discounts_row['description']; ?>&nbsp;
                    <small>
                    <?php
                    
                    if($tbl_assessments_discounts_row['type']==='Receivable'){
                        echo 'A/R';
                    }elseif($tbl_assessments_discounts_row['type']==='Payable'){
                        echo 'A/P';
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
                    $assessment2_query = $conn->query("SELECT category_id, total_amt_paid, total_amt_bal FROM tbl_student_assessments WHERE reg_id='$sData_row[reg_id]' AND assessment_id='$assessment_row[assessment_id]' AND category_id='$tbl_student_assessments_row[category_id]'") or die(mysql_error());
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
                    
                    $tbl_assessments_discounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$sData_row[reg_id]'") or die(mysql_error());
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
                    
                    if($remainExcess>0){ ?>
                    &nbsp;<a href="billing_system_newTrans.php?student_id=<?php echo $sData_row['student_id']; ?>" style="color: white;" title="Post refund billing..." target="_blank"><i class="icon-bill" style="color: #ff8288;"></i> <?php echo number_format($remainExcess, 2); ?></a>
                    <?php }else{
                        
                        if($totalExcess<0){
                            echo '<small>'.substr(number_format($totalExcess, 2), 1).' ('.number_format($totalBilled, 2).' )</small>';
                        
                        }else{
                            echo '<small>'.number_format($totalExcess, 2).' ('.number_format($totalBilled, 2).' )</small>';
                        
                        }
                        
                    } ?>
                    </th>
                    </tr>
                    </tfoot>
                    
                    </table>
                    
                    
                    <h4 style="margin-top: 18px;">BOOK ASSESSMENT SUMMARY</h4>
                    
                    <?php
                    
                    $chk_payables_query = $conn->prepare('SELECT DISTINCT reg_id, payment_plan, status FROM tbl_book_payables WHERE reg_id = :reg_id');
                    $chk_payables_query->execute(['reg_id' => $sData_row['reg_id']]);
                    $chk_pay_row = $chk_payables_query->fetch();

                      $book_ctr=0;
                      $total_book_amt=0;
                      $book_query = $conn->prepare('SELECT * FROM tbl_book_booklist WHERE gradeLevel = :gradeLevel AND strand = :strand AND major = :major AND section = :section AND type = :type');
                      $book_query->execute(['gradeLevel' => $sData_row['gradeLevel'], 'strand' => $sData_row['strand'], 'major' => $sData_row['major'], 'section' => $sData_row['section'], 'type' => 'Required']);
            
                      $book_res_query = $conn->prepare('SELECT * FROM tbl_book_reserved WHERE reg_id = :reg_id ORDER BY type DESC');
                      $book_res_query->execute(['reg_id' => $session_id]);
                      
                      //BOOK DISCOUNTS
                      $net_discount=0;
                      $book_dis_query = $conn->prepare('SELECT * FROM tbl_book_discounts WHERE gradeLevel = :gradeLevel');
                      $book_dis_query->execute(['gradeLevel' => $sData_row['gradeLevel']]);
                      $book_dis_row = $book_dis_query->fetch();
                      
                      while($book_row = $book_query->fetch()){
                      
                        $total_book_amt+=$book_row['book_amt'];
                        
                      }
                      
                        $total_num_reserved=0;
                        $total_num_reserved_amt=0;
                        
                        $total_num_reserved_deduct=0;
                        $total_num_reserved_amt_decuct=0;
                        
                        $book_opt_query = $conn->prepare('SELECT * FROM tbl_book_booklist WHERE gradeLevel = :gradeLevel AND strand = :strand AND major = :major AND section = :section AND type = :type');
                        $book_opt_query->execute(['gradeLevel' => $sData_row['gradeLevel'], 'strand' => $sData_row['strand'], 'major' => $sData_row['major'], 'section' => $sData_row['section'], 'type' => 'Optional']);
                        
                        $book_res_dummy_query = $conn->prepare('SELECT * FROM tbl_book_res_dummy WHERE reg_id = :reg_id');
                        $book_res_dummy_query->execute(['reg_id' => $sData_row['reg_id']]);
                                          
                        while($book_opt_row = $book_opt_query->fetch()){
                            
                            $total_num_reserved+=1;
                            $total_num_reserved_amt+=$book_opt_row['book_amt'];
                        
                        }
                        
                        if($book_res_dummy_query->rowCount()>0){
                            
                                while($book_res_dummy_row = $book_res_dummy_query->fetch())
                                {
                                    $total_num_reserved_deduct+=1;
                                    $total_num_reserved_amt_decuct+=$book_res_dummy_row['book_amt'];
                                
                                }
                                
                            }else{
                                
                                $total_num_reserved_deduct=0;
                                $total_num_reserved_amt_decuct=0;
                            }
                            
                            $final_opt_ctr=$total_num_reserved-$total_num_reserved_deduct;
                            
                            $final_opt_amt=$total_num_reserved_amt-$total_num_reserved_amt_decuct;
                            
                    
                        function randomcode(){
                        $var = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                        srand((double)microtime()*1000000);
                        $i = 0;
                        $code = '';
                        while ($i <= 9) {
                        $num = rand() % 33;
                        $tmp = substr($var, $num, 1);
                        $code = $code . $tmp;
                        $i++;
                        }
                        return $code;
                        }
    
                        $receipt_num=randomcode();
                        
                    $chk_order_query = $conn->query("SELECT * FROM tbl_book_payables WHERE reg_id='$sData_row[reg_id]'") or die(mysql_error());
                    $chl_order_row = $chk_order_query->fetch();
                    
                    ?>
                    <!-- CASH -->
                    <div class="col-sm-12" style="margin-bottom: 18px;">
                      <div class="row">
                        <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%;">
                            <thead>
                            <tr>
                            <th>
                            
                            <label for="cash">Payment Plan: <?php echo $chl_order_row['payment_plan']; ?></label>
                             
                            </th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="background-color: white; padding: 6px;">
                            <table class="table table-bordered" style="width:100%; margin: 0px;">
                            <thead>
                            <tr>
                            <th style="padding: 6px; width: 10%;">No. of Books</th>
                            <th style="padding: 6px; width: 15%;">Total Amount</th>
                            <th style="padding: 6px; width: 15%;">Discount</th>
                            <th style="padding: 6px; width: 15%;">Payable</th>
                            <th style="padding: 6px; width: 15%;">Paid</th>
                            <th style="padding: 6px; width: 15%;">Balance</th>
                            <th></th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="padding: 6px; vertical-align: middle;"><?php $total_final_books=$book_query->rowCount()+$final_opt_ctr; if($total_final_books>1){ echo $total_final_books.' Books'; }else{ echo $total_final_books.' Book'; } ?></td>
                            <td style="padding: 6px; vertical-align: middle;"><?php echo 'Php '.number_format($total_book_amt, 2); ?></td>
                            <td style="padding: 6px; vertical-align: middle;">
                            <?php
                            
                            if($book_dis_row['type']==='Amount'){
                                $net_discount=$book_dis_row['discount_value'];
                                $dis_details=number_format($net_discount, 2);
                            }else{
                                $net_discount=$total_book_amt*$book_dis_row['discount_value'];
                                
                                if($book_dis_row['discount_value']<1){
                                    $dis_details=number_format($net_discount, 2).' ( '.substr($book_dis_row['discount_value'], 2).'% )';
                                }else{
                                    $dis_details=number_format($net_discount, 2).' ( 100% )';
                                }
                                
                            }
                            echo 'Php '.$dis_details;
                             
                            ?>
                            </td>
                           
                            <td style="vertical-align: top;">
                            Php <?php echo number_format($chl_order_row['total_amt'], 2); ?>
                            </td>
                            
                            <td style="vertical-align: top;">
                            Php <?php echo number_format($chl_order_row['total_amt_paid'], 2); ?>
                            </td>
                          
                            <td style="vertical-align: top;">
                            Php <?php echo number_format($chl_order_row['total_amt']-$chl_order_row['total_amt_paid'], 2); ?>
                            </td>
                            
                            <td style="vertical-align: top;">
                        
                            <?php
                            
                            if($chk_order_query->rowCount()>0){ ?>
                                <a href="cashiering_system_load_particulars.php?reg_id=<?php echo $sData_row['reg_id']; ?>&assessment_id=Books&schoolYear=<?php echo $sData_row['schoolYear']; ?>&semester=<?php echo $sData_row['sem']; ?>&payment_type=Book Fee&receipt_num=<?php echo $receipt_num; ?>&request_id=0" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-calculator"></i> Pay</a>
                             
                            <?php }else{ ?>
                                <a href="#" class="btn btn-secondary btn-sm" style="color: white;"><i class="fa fa-calculator"></i> Pay</a>
                             
                            <?php } ?>
                            
                            </td>
                        
                            </tr>
                            </tbody>
                            
                            </table>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        
                      </div>
                    </div>
                   
                    
                <hr />
                    
                    <h4>PAYMENT HISTORY</h4>
                    
                        <div class="table-responsive" style="margin-top: 12px;">
                        <h5>OVER THE COUNTER</h5>
                        <table id="" class="display" style="width:100%">
                          <thead>
                            <tr>
                            <th>OR #</th>
                            <th>AMT. PAID</th>
                            <th>CASH</th>
                            <th>CHANGE</th>
                            <th>DATE</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                          
                                <?php
                                $transCtr=0;
                                $transList_query = $conn->query("SELECT DISTINCT receipt_num, payment_type, net_amt_payable, payee_cash, payee_change, trans_date, status FROM tbl_student_payment WHERE reg_id='$sData_row[reg_id]' AND (payment_type='Post Billing' OR payment_type='Book Fee' OR payment_type='Student Fee' OR payment_type='Non-Student Fee') ORDER BY payment_id DESC") or die(mysql_error());
                                while($tList_row=$transList_query->fetch()){  
                                
                                $transCtr+=1;
                                
                                ?>
     
                                    
                            
                            <?php if($tList_row['status']==='Voided'){ ?>
                            <tr style="background-color: #ff5877;">
                            <td style="color: white;">
                            <?php echo $transCtr; ?>. <?php echo $tList_row['receipt_num']; ?><br />
                            <small><?php echo $tList_row['payment_type']; ?></small>
                            </td>
                            <td style="color: white;"><?php echo $tList_row['net_amt_payable']; ?></td>
                            <td style="color: white;"><?php echo $tList_row['payee_cash']; ?></td>
                            <td style="color: white;"><?php echo $tList_row['payee_change']; ?></td>
                            <td style="color: white;"><?php echo $tList_row['trans_date']; ?></td>
                            
                            <td style="color: white;">Voided</td>
                            
                            </tr>
                            
                            <?php }elseif($tList_row['payment_type']==='Post Billing'){ ?>
                            <tr style="background-color: #fad900;">
                            <td style="color: green;"><?php echo $transCtr; ?>. <?php echo $tList_row['receipt_num']; ?></td>
                            <td style="color: green;"><?php echo $tList_row['net_amt_payable']; ?></td>
                            <td style="color: green;"><?php echo $tList_row['payee_cash']; ?></td>
                            <td style="color: green;"><?php echo $tList_row['payee_change']; ?></td>
                            <td style="color: green;"><?php echo $tList_row['trans_date']; ?></td>
                            
                            <td>
                            <button title="Click for transaction options..." data-toggle="dropdown" type="button" class="btn btn-primary">&nbsp;<i class="fa fa-ellipsis-v"></i>&nbsp;</button>
                            <div class="dropdown-menu">
                            
                            <a title="Reprint receipt..." href="print_receipt_billing.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>&report_type=OR" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                            <a title="Void billing..." data-toggle="modal" data-target="#voidTrans<?php echo $tList_row['receipt_num']; ?>" href="#" class="dropdown-item"><i class="fa fa-times"></i> Void</a>
                           
                            </div>
                            </td>
                            
                            </tr>
                            
                            
                            <?php }else{ ?>
                            
                            
                            <tr>
                            <td>
                            <?php echo $transCtr; ?>. <?php echo $tList_row['receipt_num']; ?><br />
                            <small><?php echo $tList_row['payment_type']; ?></small>
                            </td>
                            <td style="text-align: right;"><?php echo $tList_row['net_amt_payable']; ?></td>
                            <td style="text-align: right;"><?php echo $tList_row['payee_cash']; ?></td>
                            <td style="text-align: right;"><?php echo $tList_row['payee_change']; ?></td>
                            <td><?php echo $tList_row['trans_date']; ?></td>
                            <td>
                            <button title="Click for transaction options..." data-toggle="dropdown" type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-ellipsis-v"></i>&nbsp;</button>
                            <div class="dropdown-menu">
                            
                            <?php if($tList_row['payment_type']==='Book Fee' OR $tList_row['payment_type']==='Book Payment Validation'){ ?>
                            <a title="Reprint receipt..." href="print_receipt_books.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>&report_type=OR" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                            
                            <?php }else{ ?>
                            <a title="Reprint receipt..." href="print_receipt.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>&report_type=OR" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                            
                            <?php } ?>
                            
                            <a title="Void transaction..." data-toggle="modal" data-target="#voidTrans<?php echo $tList_row['receipt_num']; ?>" href="#" class="dropdown-item"><i class="fa fa-times"></i> Void</a>
                           
                            </div>
                            </td>
                            </tr>
                            <?php } ?>
                            
                        <!-- void billing Modal -->
                          <div id="voidTrans<?php echo $tList_row['receipt_num']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                               
                                <div class="modal-header">
                                <?php if($tList_row['payment_type']==='Post Billing'){ ?>
                                    <h5 id="exampleModalLabel" class="modal-title">VOID BILLING</h5>
                                <?php }else{ ?>
                                    <h5 id="exampleModalLabel" class="modal-title">VOID TRANSACTION</h5>
                                <?php } ?>
                                
                                  
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                
                                <div class="modal-body">
                                
                                <?php if($tList_row['payment_type']==='Post Billing'){ ?>
                                
                                <form method="POST" action="save_cashiering_billing.php?reg_id=<?php echo $sData_row['reg_id']; ?>&receipt_num=<?php echo $tList_row['receipt_num']; ?>&searched=<?php echo $sData_row['student_id']; ?>&type=OR">
                                    <h4>Do you want to void billing with OR <?php echo $tList_row['receipt_num']; ?>?</h4>
                                <?php }else{ ?>
                                <form method="POST" action="save_cashiering.php?reg_id=<?php echo $sData_row['reg_id']; ?>&receipt_num=<?php echo $tList_row['receipt_num']; ?>&searched=<?php echo $sData_row['student_id']; ?>&type=OR">
                                    <h4>Do you want to void transaction with OR <?php echo $tList_row['receipt_num']; ?>?</h4>
                                <?php } ?>
                                
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                  <hr />
                                    <label>Void Remarks</label>
                                    <textarea name="void_remarks" style="resize: none;" rows="3" class="form-control" placeholder="Enter remarks/notes for voiding..." required=""></textarea>
                                  </div>
                                </div>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="voidTrans" class="btn btn-danger" style="color: white;">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end void billing Modal -->
                          
                            
                            <?php } ?>
                           
                          </tbody>
                        </table>
                        </div>
                        
                        <div class="table-responsive" style="margin-top: 12px;">
                        <h5>PAYMENT VALIDATION</h5>
                        <table id="" class="display" style="width:100%">
                          <thead>
                            <tr>
                            <th>AR #</th>
                            <th>PAYMENT METHOD</th>
                            <th>TRANS DETAILS</th>
                            <th>PROOF OF PAYMENT</th>
                            <th>DATE</th>
                            <th></th>
                            </tr>
                          </thead>
                          <tbody>
                          
                                <?php
                                $transCtr=0;
                                $transList_query = $conn->query("SELECT DISTINCT receipt_num, payment_type, method_id, net_amt_payable, payee_cash, payee_change, trans_date, status FROM tbl_student_payment WHERE reg_id='$sData_row[reg_id]' AND (payment_type='Payment Validation' OR payment_type='Book Payment Validation') ORDER BY payment_id DESC") or die(mysql_error());
                                while($tList_row=$transList_query->fetch()){  
                                
                                $transCtr+=1;
                                
                                $payValid_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE request_id='$tList_row[method_id]'");
                                $payValid_row=$payValid_query->fetch();
                                
                                $payMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE pm_id='$payValid_row[pm_id]'") or die(mysql_error());
                                $payMethod_row = $payMethod_query->fetch();
                                
                                ?>
     
                                    
                            
                            <?php if($tList_row['status']==='Voided'){ ?>
                            <tr style="background-color: #ff5877;">
                            <td style="color: white;">
                            <?php echo $transCtr; ?>. <?php echo $tList_row['receipt_num']; ?><br />
                            <small><?php echo $tList_row['payment_type']; ?></small>
                            </td>
                            
                            <td style="color: white;">
                            <?php echo $payMethod_row['nameProvider']; ?><br />
                            <?php echo $payMethod_row['accountName']; ?><br />
                            <?php echo $payMethod_row['accountNum_link']; ?>
                            </td>
                              
                            <td style="color: white;">
                            Amount: <?php echo number_format($payValid_row['transAmt'], 2); ?><br />
                            Date: <?php echo $payValid_row['transDate']; ?><br />
                            Status: <?php echo $payValid_row['status']; ?>
                            </td>
                              
                            <td style="text-align: center;"><img src="../system-book-inventory/<?php echo $payValid_row['file_name']; ?>" class="img" style="width: 150px; height: 100px; border: solid 1px white;" /></td>

                            <td style="color: white;"><?php echo $tList_row['trans_date']; ?></td>
                            
                            <td style="color: white;">Voided</td>
                            
                            </tr>
                            
                            <?php }else{ ?>
                            
                            
                            <tr>
                            <td>
                            <?php echo $transCtr; ?>. <?php echo $tList_row['receipt_num']; ?><br />
                            <small><?php echo $tList_row['payment_type']; ?></small>
                            </td>
                            
                            <td>
                            <?php echo $payMethod_row['nameProvider']; ?><br />
                            <?php echo $payMethod_row['accountName']; ?><br />
                            <?php echo $payMethod_row['accountNum_link']; ?>
                            </td>
                              
                            <td>
                            Amount: <?php echo number_format($payValid_row['transAmt'], 2); ?><br />
                            Date: <?php echo $payValid_row['transDate']; ?><br />
                            Status: <?php echo $payValid_row['status']; ?>
                            </td>
                              
                            <td style="text-align: center;"><img src="../system-book-inventory/<?php echo $payValid_row['file_name']; ?>" class="img" style="width: 150px; height: 100px;" /></td>
                            
                            <td><?php echo $tList_row['trans_date']; ?></td>
                            <td>
                            <button title="Click for transaction options..." data-toggle="dropdown" type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-ellipsis-v"></i>&nbsp;</button>
                            <div class="dropdown-menu">
                            
                            <?php if($tList_row['payment_type']==='Book Fee' OR $tList_row['payment_type']==='Book Payment Validation'){ ?>
                            <a title="Reprint receipt..." href="print_receipt_books.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>&report_type=AR" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                            
                            <?php }else{ ?>
                            <a title="Reprint receipt..." href="print_receipt.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>&report_type=AR" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                            
                            <?php } ?>
                            
                            
                            <a title="Void transaction..." data-toggle="modal" data-target="#voidTrans<?php echo $tList_row['receipt_num']; ?>" href="#" class="dropdown-item"><i class="fa fa-times"></i> Void</a>
                           
                            </div>
                            </td>
                            </tr>
                            <?php } ?>
                            
                          <!-- void billing Modal -->
                          <div id="voidTrans<?php echo $tList_row['receipt_num']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                               
                                <div class="modal-header">
                                    <h5 id="exampleModalLabel" class="modal-title">VOID TRANSACTION</h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                
                                <form method="POST" action="save_cashiering.php?reg_id=<?php echo $sData_row['reg_id']; ?>&receipt_num=<?php echo $tList_row['receipt_num']; ?>&searched=<?php echo $sData_row['student_id']; ?>&type=AR">
                                    
                                <h4>Do you want to void transaction with AR <?php echo $tList_row['receipt_num']; ?>?</h4>
                                
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                  <hr />
                                    <label>Void Remarks</label>
                                    <textarea name="void_remarks" style="resize: none;" rows="3" class="form-control" placeholder="Enter remarks/notes for voiding..." required=""></textarea>
                                  </div>
                                </div>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="voidTrans" class="btn btn-danger" style="color: white;">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end void billing Modal -->
                          
                            
                            <?php } ?>
                           
                          </tbody>
                        </table>
                        </div>
                    
                <?php }else{ if($searched===''){ echo "<h5>SEARCH FOR STUDENT ID CODE / LASTNAME</h5>"; }else{ echo "<h5>NO DATA FOUND FOR SEARCHED: ".$searched."</h5>"; } } ?>
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
    
    <?php include('scripts_files.php'); ?>
 
    
  </body>
</html>
