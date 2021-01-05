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
            <li class="breadcrumb-item">
            <?php
            if($_GET['transType']==='Payable'){ ?>
            <a href="list_account_payable.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>">Accounts - List of Payable - <?php echo $get_dept; ?></a>
            <?php }else{ ?>
            <a href="list_account_receivable.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>">Accounts - List of Receivable - <?php echo $get_dept; ?></a>
            <?php } ?>
            
            
            </li>
            <li class="breadcrumb-item active">Review Mass Transaction</li>
             
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
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">REVIEW MASS TRANSACTION &nbsp;<small>(SY <?php echo $data_src_sy; ?>)</small></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
              
              <div style="margin-top: 12px;"></div>
 
                
                <h3 style="margin: 16px 16px 16px 16px;">
                  
                <strong>
                <?php
 
                if($_GET['gradeLevel']===''){
                    echo "Select Grade Level";
                }else{ 
                    
                    if($_GET['strand']=="N/A")
                    {
                    echo $_GET['gradeLevel'];
                    }else{
                    echo $_GET['gradeLevel']." - ".$_GET['strand'];
                    }
                    
                }
                
                
                ?>
                </strong>
                </h3>
                 
                <form method="POST" action="save_mass_trans.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&transType=<?php echo $_GET['transType']; ?>&massTransCode=<?php echo $_GET['massTransCode']; ?>">
                
                <?php include('list_massTrans_table.php'); ?>
                
                <div class="row">
                
                <div class="col-lg-4">
                <small style="color: black;">Entry Date (mm/dd/yyyy)</small>
                <input type="date" value="<?php echo date('Y-m-d'); ?>" name="entryDate" class="form-control block" />
                
                </div>
                
                
                
                <div class="col-lg-4">
                <small>Payment Term</small>
                <select name="payment_term" class="form-control block">
                <option>-</option>
                <option>Full Payment</option>
                <option>Partial Payment</option>
                </select>
                </div>
                
                <div class="col-lg-4">
                <small>Payment Amount per Student</small>
                <input name="payment_amt" type="number" max="<?php echo $ar_row['amount']; ?>" step="0.50" class="form-control block" placeholder="Enter amount..." />
                </div>
                
                </div>
                
                <button name="confirmMassTrans" class="btn btn-primary btn-sm pull-right" style="margin: 12px;"><i class="fa fa-check"></i> CONFIRM MASS TRANSACTION</button>
                
                </form>
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
