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
            <li class="breadcrumb-item active">Payments - Payment Validation Requests</li>
          </ul>
          
        </div>
      </div>
      
      <?php include('quick_count.php'); ?>
      
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Payment Validation Requests <div class="badge badge-info">SY <?php echo $data_src_sy; ?> <?php if($studData_row['dept']==='Senior High School' OR $studData_row['dept']==='College'){ ?>- <?php echo $data_src_sem;  } ?></div></h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
            
            <?php include('add_payValid_modal.php'); ?>
            
                <div class="table-responsive" style="margin-top: 12px;">
                <h5>
                
                <?php if($fileCHK>0){ ?>
                    <div class="alert alert-warning" style="font-weight: lighter; padding: 8px;">Please upload Admission Requirements files before proceeding to payment.</div>
                
                <?php }else{ ?>
                    <button data-toggle="modal" data-target="#uploadFile" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Payment Validation Request</button>
                
                <?php } ?>
                      
                </h5>
                <hr />
                    <table id="" class="display" style="width:100%">
                 
                      <thead>
                      <tr>
                      <th>Payment Method</th>
                      <th>Trans Amt</th>
                      <th>Trans Date</th>
                      <th>Proof of Payment</th>
                      <th>Status</th>
                      <th>Action</th>
                      </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      
                      $payValid_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE reg_id='$studData_row[reg_id]' ORDER BY request_id DESC");
                      while($payValid_row=$payValid_query->fetch()){
                      
                      $payMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE pm_id='$payValid_row[pm_id]'") or die(mysql_error());
                      $payMethod_row = $payMethod_query->fetch();
                       
                      ?>
                      
                      <tr>
                      
                      <td>
                      <?php echo $payMethod_row['nameProvider']; ?><br />
                      <?php echo $payMethod_row['accountName']; ?><br />
                      <?php echo $payMethod_row['accountNum_link']; ?>
                      </td>
                      
                      <td style="text-align: right;"><?php echo number_format($payValid_row['transAmt'], 2); ?></td>
                      
                      <td><?php echo $payValid_row['transDate']; ?></td>
                      
                      <td style="text-align: center;"><img src="<?php echo $payValid_row['file_name']; ?>" class="img" style="width: 150px; height: 100px;" /></td>
                      
                      <td><?php echo $payValid_row['status']; ?></td>
                      
                      <td>
                      
                      <a class="btn btn-primary btn-sm" title="Download file..." href="<?php echo $payValid_row['file_name']; ?>" style="margin-bottom: 4px;" download><i class="fa fa-download"></i></a>

                      <?php if($payValid_row['status']==='Pending'){ ?>
                      <a data-toggle="modal" data-target="#delPayReqs<?php echo $payValid_row['request_id']; ?>" href="#" class="btn btn-danger btn-sm" title="Remove file..." style="margin-bottom: 4px;"><i class="fa fa-trash"></i></a>
                      <?php }elseif($payValid_row['status']==='Validated'){
                        
                        $trans_query = $conn->query("SELECT receipt_num FROM tbl_student_payment WHERE method_id='$payValid_row[request_id]'") or die(mysql_error());
                        $trans_row = $trans_query->fetch();

                      ?>
                      <a class="btn btn-info btn-sm" title="Print receipt..." href="print_receipt.php?receipt_num=<?php echo $trans_row['receipt_num']; ?>" target="_blank" style="margin-bottom: 4px;"><i class="fa fa-print"></i></a>

                      <?php } ?>
                      
                      </td>
                      
                      </tr>
                      
                      
                          <!-- delete student Modal -->
                          <div id="delPayReqs<?php echo $payValid_row['request_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_payValid.php" method="POST">
                              
                              <input name="request_id" value="<?php echo $payValid_row['request_id']; ?>" type="hidden" />
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">CONFIRM</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Delete payment request amounting <?php echo number_format($payValid_row['transAmt'], 2); ?> pesos?<br />
                                <br />
                                <small>
                                <strong>Method:</strong><br />
                                Service Provider: <?php echo $payMethod_row['nameProvider']; ?><br />
                                Account Name: <?php echo $payMethod_row['accountName']; ?><br />
                                Account # / Link: <?php echo $payMethod_row['accountNum_link']; ?>
                                </small>
                                
                                </h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deletePayValReq" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
                          
                          
                      <?php } ?>
                      
                      </tbody>
                      
                    </table>
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