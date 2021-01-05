<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
  <?php $get_dept=$_GET['dept']; ?>
 
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
            <li class="breadcrumb-item active">Payments - Validated Requests - <?php echo $get_dept; ?></li>
             
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
              

             <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">PAYMENT VALIDATION REQUESTS <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
              
              <div class="tab" style="margin-top: 8px; margin-bottom: 12px;">
 
                <?php if($_GET['dept']=="All"){ ?>
                <a title="All student list" href="list_payment_valid.php?dept=All" class="tablinks active" style="font-weight: bolder;">All</a>
                <?php }else{?>
                <a title="All student list" href="list_payment_valid.php?dept=All" class="tablinks">All</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_payment_valid.php?dept=Grade School" class="tablinks active" style="font-weight: bolder;">Grade School</a>
                <?php }else{?>
                <a title="Grade School student list" href="list_payment_valid.php?dept=Grade School" class="tablinks">Grade School</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Junior High School"){ ?>
                <a title="Junior High School student list" href="list_payment_valid.php?dept=Junior High School" class="tablinks active" style="font-weight: bolder;">JHS</a>
                <?php }else{?>
                <a title="Junior High School student list" href="list_payment_valid.php?dept=Junior High School" class="tablinks">JHS</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Senior High School"){ ?>
                <a title="Senior High School student list" href="list_payment_valid.php?dept=Senior High School" class="tablinks active" style="font-weight: bolder;">SHS</a>
                <?php }else{?>
                <a title="Senior High School student list" href="list_payment_valid.php?dept=Senior High School" class="tablinks">SHS</a>
                <?php } ?>
           
                <?php if($_GET['dept']=="College"){ ?>
                <a title="College student list" href="list_payment_valid.php?dept=College" class="tablinks active" style="font-weight: bolder;">College</a>
                <?php }else{?>
                <a title="College student list" href="list_payment_valid.php?dept=College" class="tablinks">College</a>
                <?php } ?>
                
                </div>
                
                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                 
                      <thead>
                      <tr>
                      <th>Student Details</th>
                      <th>Payment Method</th>
                      <th>Trans Details</th>
                      <th>Proof of Payment</th>
                      <th>Status</th>
                      <th>Action</th>
                      </tr>
                      </thead>
                      
                      <tbody>
                      
                    <?php
                    
                    if($_GET['dept']==='All' OR $_GET['dept']===''){
                        $payValid_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE status='Validated' AND for_payment='Books' ORDER BY request_id DESC");   
                    }else{
                        $payValid_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE dept='$_GET[dept]' AND status='Validated' AND for_payment='Books' ORDER BY request_id DESC");    
                    }
                      
                      while($payValid_row=$payValid_query->fetch()){
                      
                      $payMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE pm_id='$payValid_row[pm_id]'") or die(mysql_error());
                      $payMethod_row = $payMethod_query->fetch();
                      
                      $studDataReq_query = $conn->query("SELECT * FROM tbl_book_students WHERE reg_id='$payValid_row[reg_id]'") or die(mysql_error());
                      $studDataReq_row = $studDataReq_query->fetch();
                      
                      
                      if($studDataReq_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($studDataReq_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studDataReq_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$studDataReq_row['mname'];
                        }
                        
                      ?>
                      
                      <tr>
                      
                      <td>
                      <?php echo $studDataReq_row['lname'].", ".$studDataReq_row['fname']." ".$finalMName; ?><br />
                      <small><?php
                      if($studDataReq_row['dept']==='College'){
                        if($studDataReq_row['major']==='N/A'){
                            echo $studDataReq_row['gradeLevel']." - ".$studDataReq_row['strand']." - ".$studDataReq_row['section'];
                        }else{
                            echo $studDataReq_row['gradeLevel']." - ".$studDataReq_row['strand']." ".$studDataReq_row['major']." - ".$studDataReq_row['section'];
                        }
                      }elseif($studDataReq_row['dept']==='Senior High School'){
                        echo $studDataReq_row['gradeLevel']." - ".$studDataReq_row['strand']." - ".$studDataReq_row['section'];
                      }else{
                        echo $studDataReq_row['gradeLevel']." - ".$studDataReq_row['section'];
                      }
                      
                      ?><br />
                      <?php echo $studDataReq_row['dept']; ?></div>
                      </small>
                      </td>
                      
                      <td>
                      <?php echo $payMethod_row['nameProvider']; ?><br />
                      <?php echo $payMethod_row['accountName']; ?><br />
                      <?php echo $payMethod_row['accountNum_link']; ?>
                      </td>
                      
                      <td>
                      Amount: <?php echo number_format($payValid_row['transAmt'], 2); ?><br />
                      Date: <?php echo $payValid_row['transDate']; ?></td>
                      
                      <td style="text-align: center;"><img src="../system-book-inventory/<?php echo $payValid_row['file_name']; ?>" class="img" style="width: 150px; height: 100px;" /></td>
                      
                      <td><?php echo $payValid_row['status']; ?></td>
                      
                      <td>
                      <a class="btn btn-primary btn-sm" title="Download file..." href="../system-book-inventory/<?php echo $payValid_row['file_name']; ?>" style="margin-bottom: 4px; color: white;" download><i class="fa fa-download"></i></a>
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
              <!-- kinder End-->
              
            </div>
            
          </div>
        
              
      </section>
     
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
 
  </body>
</html>
