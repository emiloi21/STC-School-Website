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
            <li class="breadcrumb-item active">Accounts - List of Payable - <?php echo $get_dept; ?></li>
             
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
              

             <!-- Preparatory     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">LIST OF ACCOUNT PAYABLE &nbsp;<small>(SY <?php echo $data_src_sy; ?>)</small></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
              
              <div style="margin-top: 12px;"></div>
               
               <div class="dropdown">
                  <?php if($get_dept==='Grade School'){ ?>
                  <button class="dropbtn" style="border: solid 2px yellow;">
                  <strong style="font-weight: bold; color: white;">Grade School</strong>
                  </button>
                  <?php }else{ ?>
                  <button class="dropbtn">
                  <strong style="color: white;">Grade School</strong>
                  </button>
                  <?php } ?>
                  
                  <div class="dropdown-content">
                    <a href="list_account_payable.php?dept=Grade School&gradeLevel=Nursery&strand=N/A&major=N/A">Nursery</a>
                    <a href="list_account_payable.php?dept=Grade School&gradeLevel=Preparatory&strand=N/A&major=N/A">Preparatory</a>
                    <a href="list_account_payable.php?dept=Grade School&gradeLevel=Kinder&strand=N/A&major=N/A">Kinder</a>
                    <a href="list_account_payable.php?dept=Grade School&gradeLevel=Grade 1&strand=N/A&major=N/A">Grade 1</a>
                    <a href="list_account_payable.php?dept=Grade School&gradeLevel=Grade 2&strand=N/A&major=N/A">Grade 2</a>
                    <a href="list_account_payable.php?dept=Grade School&gradeLevel=Grade 3&strand=N/A&major=N/A">Grade 3</a>
                    <a href="list_account_payable.php?dept=Grade School&gradeLevel=Grade 4&strand=N/A&major=N/A">Grade 4</a>
                    <a href="list_account_payable.php?dept=Grade School&gradeLevel=Grade 5&strand=N/A&major=N/A">Grade 5</a>
                    <a href="list_account_payable.php?dept=Grade School&gradeLevel=Grade 6&strand=N/A&major=N/A">Grade 6</a>
                  </div>
                </div>
 
                
                <div class="dropdown">
                  <?php if($get_dept==='Junior High School'){ ?>
                  <button class="dropbtn" style="border: solid 2px yellow;">
                  <strong style="font-weight: bold; color: white;">JHS</strong>
                  </button>
                  <?php }else{ ?>
                  <button class="dropbtn">
                  <strong style="color: white;">JHS</strong>
                  </button>
                  <?php } ?>
                  <div class="dropdown-content">
                    <a href="list_account_payable.php?dept=Junior High School&gradeLevel=Grade 7&strand=N/A&major=N/A">Grade 7</a>
                    <a href="list_account_payable.php?dept=Junior High School&gradeLevel=Grade 8&strand=N/A&major=N/A">Grade 8</a>
                    <a href="list_account_payable.php?dept=Junior High School&gradeLevel=Grade 9&strand=N/A&major=N/A">Grade 9</a>
                    <a href="list_account_payable.php?dept=Junior High School&gradeLevel=Grade 10&strand=N/A&major=N/A">Grade 10</a>
                  </div>
                </div>
                
                <div class="dropdown">
                  <?php if($get_dept==='Senior High School'){ ?>
                  <button class="dropbtn" style="border: solid 2px yellow;">
                  <strong style="font-weight: bold; color: white;">SHS</strong>
                  </button>
                  <?php }else{ ?>
                  <button class="dropbtn">
                  <strong style="color: white;">SHS</strong>
                  </button>
                  <?php } ?>
                  <div class="dropdown-content">
                  
                  <?php
                  $classG11_query = $conn->query("SELECT DISTINCT strand FROM classes WHERE gradeLevel='Grade 11' AND schoolYear='$data_src_sy' ORDER BY strand ASC") or die(mysql_error());
                  while ($cg11_row = $classG11_query->fetch()) { ?>
                    <a href="list_account_payable.php?dept=Senior High School&gradeLevel=Grade 11&strand=<?php echo $cg11_row['strand']; ?>&major=N/A">Grade 11 - <?php echo $cg11_row['strand']; ?></a>
                  <?php } ?>
                  
                  <?php
                  $classG12_query = $conn->query("SELECT DISTINCT strand FROM classes WHERE gradeLevel='Grade 12' AND schoolYear='$data_src_sy' ORDER BY strand ASC") or die(mysql_error());
                  while ($cg12_row = $classG12_query->fetch()) { ?>
                    <a href="list_account_payable.php?dept=Senior High School&gradeLevel=Grade 12&strand=<?php echo $cg12_row['strand']; ?>&major=N/A">Grade 12 - <?php echo $cg12_row['strand']; ?></a>
                  <?php } ?>
                  
                  </div>
                </div>
                
                
                
                <div class="dropdown">
                  <?php if($get_dept==='College'){ ?>
                  <button class="dropbtn" style="border: solid 2px yellow;">
                  <strong style="font-weight: bold; color: white;">College</strong>
                  </button>
                  <?php }else{ ?>
                  <button class="dropbtn">
                  <strong style="color: white;">College</strong>
                  </button>
                  <?php } ?>
                  <div class="dropdown-content">
                  
                  <?php
                  $classc1_query = $conn->query("SELECT DISTINCT strand, major FROM classes WHERE gradeLevel='1st Year' AND schoolYear='$data_src_sy' ORDER BY strand ASC") or die(mysql_error());
                  while ($c1_row = $classc1_query->fetch()) { ?>
                    <a href="list_account_payable.php?dept=College&gradeLevel=1st Year&strand=<?php echo $c1_row['strand']; ?>&major=<?php echo $c1_row['major']; ?>">1st Year - <?php echo $c1_row['strand']; ?> <?php echo $c1_row['major']; ?></a>
                  <?php } ?>
                  
                  <?php
                  $classc2_query = $conn->query("SELECT DISTINCT strand, major FROM classes WHERE gradeLevel='2nd Year' AND schoolYear='$data_src_sy' ORDER BY strand ASC") or die(mysql_error());
                  while ($c2_row = $classc2_query->fetch()) { ?>
                    <a href="list_account_payable.php?dept=College&gradeLevel=2nd Year&strand=<?php echo $c2_row['strand']; ?>&major=<?php echo $c2_row['major']; ?>">2nd Year - <?php echo $c2_row['strand']; ?> <?php echo $c2_row['major']; ?></a>
                  <?php } ?>
                  
                  <?php
                  $classc3_query = $conn->query("SELECT DISTINCT strand, major FROM classes WHERE gradeLevel='3rd Year' AND schoolYear='$data_src_sy' ORDER BY strand ASC") or die(mysql_error());
                  while ($c3_row = $classc3_query->fetch()) { ?>
                    <a href="list_account_payable.php?dept=College&gradeLevel=3rd Year&strand=<?php echo $c3_row['strand']; ?>&major=<?php echo $c3_row['major']; ?>">3rd Year - <?php echo $c3_row['strand']; ?> <?php echo $c3_row['major']; ?></a>
                  <?php } ?>
                  
                  <?php
                  $classc4_query = $conn->query("SELECT DISTINCT strand, major FROM classes WHERE gradeLevel='4th Year' AND schoolYear='$data_src_sy' ORDER BY strand ASC") or die(mysql_error());
                  while ($c4_row = $classc4_query->fetch()) { ?>
                    <a href="list_account_payable.php?dept=College&gradeLevel=4th Year&strand=<?php echo $c4_row['strand']; ?>&major=<?php echo $c4_row['major']; ?>">4th Year - <?php echo $c4_row['strand']; ?> <?php echo $c4_row['major']; ?></a>
                  <?php } ?>
                  
                  </div>
                </div>
                
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
                 
                
                
                <form method="POST" action="save_mass_trans.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&transType=Payable">
                
                <?php include('list_payable_table.php'); ?>
                
                <button name="massTrans" class="btn btn-primary btn-sm pull-right" style="margin: 12px;">MASS TRANSACTION</button>
                
                </form>
                
                    <?php
                    
                    $AR_discounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE type='Payable'") or die(mysql_error());
                    while ($ar_row = $AR_discounts_query->fetch()){
                    
                    $studData_query = $conn->query("SELECT reg_id, lname, fname, gradeLevel, strand, section FROM students WHERE reg_id='$ar_row[reg_id]' ORDER BY lname, fname ASC") or die(mysql_error());
                    $studData_row = $studData_query->fetch();
                      
                    $discount_id=$ar_row['discount_id'];
                    
                    ?>
                    
                          <!-- delete student Modal -->
                          <div id="delete_payable<?php echo $discount_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_discount.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&transType=Payable" method="POST">
                      
                              <input value="<?php echo $discount_id; ?>" name="discount_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Payable</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete <?php echo $studData_row['lname'].', '.$studData_row['fname']; ?> discount profile?
                                </h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteReceivable" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
                    <?php } ?>
                
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
