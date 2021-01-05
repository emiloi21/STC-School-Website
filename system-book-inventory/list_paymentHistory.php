<!DOCTYPE html>
<html>
  <?php include('session.php'); ?>
    
  <?php include('header.php'); ?>
  <body>
    
    <?php include('menu_sidebar.php'); ?>
    
    <div class="page">
      <?php include('top_navbar.php'); ?>

      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li style="color: blue"><strong>SY <?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Payments - Payment History</li>
          </ul>
          
        </div>
      </div>
      
      <?php include('quick_count.php'); ?>
      
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Payment History <div class="badge badge-info">SY <?php echo $data_src_sy; ?> <?php if($studData_row['dept']==='Senior High School' OR $studData_row['dept']==='College'){ ?>- <?php echo $data_src_sem;  } ?></div></h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
            
            
            <div class="tab" style="margin-bottom: 12px;">
                <a class="tablinks active" onclick="openCity(event, 'elem')">Over the Counter</a>
                <a class="tablinks" onclick="openCity(event, 'jhs')">Payment Validation</a>
            </div>
            
            <div id="elem" class="tabcontent" style="display: block;">
                        <div class="table-responsive" style="margin-top: 12px;">
                        <h4>OVER THE COUNTER</h4>
                        <hr />
                        <table id="" class="display" style="width:100%">
                          <thead>
                            <tr>
                            <th>OR #</th>
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
                                $transList_query = $conn->query("SELECT DISTINCT reg_id, receipt_num, payment_type, net_amt_payable, payee_cash, payee_change, trans_date, status FROM tbl_student_payment WHERE payment_type='Book Fee' AND status!='Voided' ORDER BY payment_id ASC") or die(mysql_error());
                                while($tList_row=$transList_query->fetch()){  
                                
                                $transCtr+=1;
                                
                                ?>
                                
                            <tr>
                            <td>
                            <?php echo $transCtr; ?>. <?php echo $tList_row['receipt_num']; ?><br />
                            <small><?php echo $tList_row['payment_type']; ?></small>
                            </td>
                            
                            <td><?php echo $tList_row['net_amt_payable']; ?></td>
                            <td><?php echo $tList_row['payee_cash']; ?></td>
                            <td><?php echo $tList_row['payee_change']; ?></td>
                            <td><?php echo $tList_row['trans_date']; ?></td>
                            <td>
                            <button title="Click for transaction options..." data-toggle="dropdown" type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-ellipsis-v"></i>&nbsp;</button>
                            <div class="dropdown-menu">
                            
                            <a title="Reprint receipt..." href="print_receipt_books.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>&report_type=OR" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                           
                            </div>
                            </td>
                            </tr>
                            <?php } ?>
                           
                          </tbody>
                        </table>
                        </div>
                    </div>
                    
                    <div id="jhs" class="tabcontent">
                        <div class="table-responsive" style="margin-top: 12px;">
                        <h4>PAYMENT VALIDATION</h4>
                        <hr />
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
                                $transList_query2 = $conn->query("SELECT DISTINCT reg_id, receipt_num, payment_type, method_id, net_amt_payable, payee_cash, payee_change, trans_date, status FROM tbl_student_payment WHERE payment_type='Book Payment Validation' AND status!='Voided' ORDER BY payment_id ASC") or die(mysql_error());
                                while($tList_row=$transList_query2->fetch()){  
                                
                                $transCtr+=1;
                                
                                $payValid_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE request_id='$tList_row[method_id]'");
                                $payValid_row=$payValid_query->fetch();
                                
                                $payMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE pm_id='$payValid_row[pm_id]'") or die(mysql_error());
                                $payMethod_row = $payMethod_query->fetch();
                      
                                ?>
                                
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
                              
                              <td style="text-align: center;"><img src="<?php echo $payValid_row['file_name']; ?>" class="img" style="width: 150px; height: 100px;" /></td>
        
                     
                            <td><?php echo $tList_row['trans_date']; ?></td>
                            <td>
                            <button title="Click for options..." data-toggle="dropdown" type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-ellipsis-v"></i>&nbsp;</button>
                            <div class="dropdown-menu">
                            <a title="Download file..." href="<?php echo $payValid_row['file_name']; ?>" class="dropdown-item" download><i class="fa fa-download"></i> Download</a>
        
                            <a title="Reprint receipt..." href="print_receipt_books.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>&report_type=AR" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                            </div>
                            </td>
                            </tr>
                            <?php } ?>
                           
                          </tbody>
                        </table>
                        </div>
                    </div>
            
            </div>
          </div>
        </div>
      </section>
      
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('js_scripts.php'); ?>
  </body>
</html>