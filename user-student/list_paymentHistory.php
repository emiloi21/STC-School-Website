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
            
            <?php include('add_payValid_modal.php'); ?>
            
                <div class="table-responsive" style="margin-top: 12px;">
                
                    <table id="" class="display" style="width:100%">
                 
                      <thead>
                      <tr>
                      <th>Payment Method</th>
                      <th>Amount</th>
                      <th>Transaction Date</th>
                      <th>Request Date</th>
                      <th>Validation Date</th>
                      <th>Proof of Payment</th>
                      </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      
                      $payValid_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE reg_id='$studData_row[reg_id]' AND status='Validated' ORDER BY request_id DESC");
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
                      <td><?php echo $payValid_row['date_time_uploaded']; ?></td>
                      <td><?php echo $payValid_row['date_time_validated']; ?></td>
                      
                      <td style="text-align: center;"><img src="<?php echo $payValid_row['file_name']; ?>" class="img" style="width: 150px; height: 100px;" /></td>
 
                      
                      </tr>
                      
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