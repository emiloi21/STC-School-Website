<!DOCTYPE html>
<html>

  <?php
  
   include('session.php');
   
   include('header.php');
   
    
    if(isset($_POST['dateFilter'])){
    
    //2019-10-03
    $selectedMM=substr($_POST['dateFrom'], 5,2);
    $selectedDD=substr($_POST['dateFrom'], 8,2);
    $selectedYYYY=substr($_POST['dateFrom'], 0,4);
    
    $dateFrom2=$selectedYYYY.'-'.$selectedMM.'-'.$selectedDD;
    $dateFrom=$selectedMM.'/'.$selectedDD.'/'.$selectedYYYY;
    
    
    $selectedMMx=substr($_POST['dateTo'], 5,2);
    $selectedDDx=substr($_POST['dateTo'], 8,2);
    $selectedYYYYx=substr($_POST['dateTo'], 0,4);
    
    $dateTo2=$selectedYYYYx.'-'.$selectedMMx.'-'.$selectedDDx;
    $dateTo=$selectedMMx.'/'.$selectedDDx.'/'.$selectedYYYYx;
    
    
    }else{
    $dateFrom2=date('Y-m-d');
    $dateTo2=date('Y-m-d');
    
    $dateFrom=date('m/d/Y');
    $dateTo=date('m/d/Y');
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
            <li style="color: blue"><strong>S.Y. <?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Transaction List</li>
          </ul>
        </div>
      </div>
      
      
      
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
              
              <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  
                  <h2 class="h5 display">
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><strong style="font-weight: bold !important;">TRANSACTION LIST</strong></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxKinder" role="tabpanel" class="collapse show">
                
 
                
                <form method="POST"> 
                <table>
                <tr>
                <td style="border: none; background-color: white;  text-align: right;">
                <strong style="font-weight: bold;">Filter Transaction Date:</strong>
                <td style="border: none; background-color: white;">
                <small>From</small>
                <input type="date" name="dateFrom" value="<?php echo $dateFrom2; ?>" class="form-control"> 
                <small class="text-info">MM/DD/YYYY</small>
                </td>
                
                <td style="border: none; background-color: white;">
                <small>To</small>
                <input type="date" name="dateTo" value="<?php echo $dateTo2; ?>" class="form-control"> 
                <small class="text-info">MM/DD/YYYY</small>
                </td>
                
                <td style="border: none; background-color: white;">
                <button name="dateFilter" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                </td>
                
                </tr>
                </table>
                </form>  
                
                
                  
                <hr />
                
                    <div class="col-lg-12">
                    
                    <div class="tab">
                        <a class="tablinks active" onclick="openCity(event, 'elem')">Over the Counter</a>
                        <a class="tablinks" onclick="openCity(event, 'jhs')">Payment Validation</a>
                    </div>
                    
                    <div id="elem" class="tabcontent" style="display: block;">
                        <div class="table-responsive" style="margin-top: 12px;">
                        <h4>OVER THE COUNTER <a style="color: white;" target="_blank" class="btn btn-info btn-sm" href="print_transList.php?dateFrom=<?php echo $dateFrom; ?>&dateTo=<?php echo $dateTo; ?>&type=OR"><i class="fa fa-print"></i> Print</a></h4>
                        <hr />
                        <table id="" class="display" style="width:100%">
                          <thead>
                            <tr>
                            <th style="width: 10px;">#</th>
                            <th>OR #</th>
                            <th>STUDENT</th>
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
                                $transList_query = $conn->query("SELECT DISTINCT reg_id, receipt_num, payment_type, net_amt_payable, payee_cash, payee_change, trans_date, status FROM tbl_student_payment WHERE (trans_date BETWEEN '$dateFrom' AND '$dateTo') AND (payment_type='Post Billing' OR payment_type='Book Fee' OR payment_type='Student Fee' OR payment_type='Non-Student Fee') ORDER BY payment_id ASC") or die(mysql_error());
                                while($tList_row=$transList_query->fetch()){  
                                
                                $transCtr+=1;
                                
                                $studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$tList_row[reg_id]'") or die(mysql_error());
                                $sData_row = $studData_query->fetch(); ?>
     
                                    
                            
                            <?php if($tList_row['status']==='Voided'){ ?>
                            <tr style="background-color: #ff5877;">
                            
                            <td style="color: white;"><?php echo $transCtr; ?></td>
                            
                            <td style="color: white;">
                            <?php echo $tList_row['receipt_num']; ?><br />
                            <small><?php echo $tList_row['payment_type']; ?></small>
                            </td>
                            
                            <td style="color: white;">
                              <?php
                              
                              if($sData_row['suffix']=="-")
                              {
                                echo $sData_row['fname']." ".substr($sData_row['mname'], 0,1).". ".$sData_row['lname'];
                                            
                              }else{
                                echo $sData_row['fname']." ".substr($sData_row['mname'], 0,1).". ".$sData_row['lname']." ".$sData_row['suffix'];
                                            
                              } ?>
                            </td>
                            
                            <td style="color: white;"><?php echo $tList_row['net_amt_payable']; ?></td>
                            <td style="color: white;"><?php echo $tList_row['payee_cash']; ?></td>
                            <td style="color: white;"><?php echo $tList_row['payee_change']; ?></td>
                            <td style="color: white;"><?php echo $tList_row['trans_date']; ?></td>
                            
                            <td style="color: white;">Voided</td>
                            
                            </tr>
                            
                            
                            <?php }else{ ?>
                            
                            
                            <tr>
                            <td><?php echo $transCtr; ?></td>
                            
                            <td>
                            <?php echo $tList_row['receipt_num']; ?><br />
                            <small><?php echo $tList_row['payment_type']; ?></small>
                            </td>
                            
                            <td>
                              <?php
                              
                              if($sData_row['suffix']=="-")
                              {
                                echo $sData_row['fname']." ".substr($sData_row['mname'], 0,1).". ".$sData_row['lname'];
                                            
                              }else{
                                echo $sData_row['fname']." ".substr($sData_row['mname'], 0,1).". ".$sData_row['lname']." ".$sData_row['suffix'];
                                            
                              } ?>
                            </td>
                            
                            <td><?php echo $tList_row['net_amt_payable']; ?></td>
                            <td><?php echo $tList_row['payee_cash']; ?></td>
                            <td><?php echo $tList_row['payee_change']; ?></td>
                            <td><?php echo $tList_row['trans_date']; ?></td>
                            <td>
                            <button title="Click for transaction options..." data-toggle="dropdown" type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-ellipsis-v"></i>&nbsp;</button>
                            <div class="dropdown-menu">
                            
                            <a title="Reprint receipt..." href="print_receipt.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>&report_type=OR" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                            <a title="Void transaction..." data-toggle="modal" data-target="#voidTrans<?php echo $tList_row['receipt_num']; ?>" href="#" class="dropdown-item"><i class="fa fa-times"></i> Void</a>
                           
                            </div>
                            </td>
                            </tr>
                            
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
                          
                            <?php } } ?>
                           
                          </tbody>
                        </table>
                        </div>
                    </div>
                    
                    <div id="jhs" class="tabcontent">
                        <div class="table-responsive" style="margin-top: 12px;">
                        <h4>PAYMENT VALIDATION <a style="color: white;" target="_blank" class="btn btn-info btn-sm" href="print_transList.php?dateFrom=<?php echo $dateFrom; ?>&dateTo=<?php echo $dateTo; ?>&type=AR"><i class="fa fa-print"></i> Print</a></h4>
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
                                
                                $studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$tList_row[reg_id]'") or die(mysql_error());
                                $sData_row = $studData_query->fetch();
                                
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
                              
                              <td>
                              Amount: <?php echo number_format($payValid_row['transAmt'], 2); ?><br />
                              Date: <?php echo $payValid_row['transDate']; ?><br />
                              Status: <?php echo $payValid_row['status']; ?>
                              </td>
                              
                              <td style="text-align: center; background-color: white;"><img src="../system-book-inventory/<?php echo $payValid_row['file_name']; ?>" class="img" style="width: 150px; height: 100px;" /></td>
        
                     
                            <td style="color: white;"><?php echo $tList_row['trans_date']; ?></td>
                            <td style="color: white;">
                            <button title="Click for options..." data-toggle="dropdown" type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-ellipsis-v"></i>&nbsp;</button>
                            <div class="dropdown-menu">
                            <a title="Download file..." href="../system-book-inventory/<?php echo $payValid_row['file_name']; ?>" class="dropdown-item" download><i class="fa fa-download"></i> Download</a>
        
                            <a title="Reprint receipt..." href="print_receipt_books.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>&report_type=AR" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                            </div>
                            </td>
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
                            <button title="Click for options..." data-toggle="dropdown" type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-ellipsis-v"></i>&nbsp;</button>
                            
                            <div class="dropdown-menu">
                            <a title="Download file..." href="../system-book-inventory/<?php echo $payValid_row['file_name']; ?>" class="dropdown-item" download><i class="fa fa-download"></i> Download</a>
                            <a title="Reprint receipt..." href="print_receipt_books.php?receipt_num=<?php echo $tList_row['receipt_num']; ?>&report_type=AR" target="_blank" class="dropdown-item"><i class="fa fa-print"></i> Reprint</a>
                            <a title="Void transaction..." data-toggle="modal" data-target="#voidTrans<?php echo $tList_row['receipt_num']; ?>" href="#" class="dropdown-item"><i class="fa fa-times"></i> Void</a>
                            </div>
                            
                            </td>
                            </tr>
                            
                            
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
                          
                            <?php } } ?>
                           
                          </tbody>
                        </table>
                        </div>
                    </div>
                    
                    
                    </div>
                        
                </div>
              </div>
              <!-- kinder End-->
              
              
              
            </div>
            
          </div>
        </div>
      
      </section>
            
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>

  </body>
</html>