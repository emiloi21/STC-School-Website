<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
  <?php $get_dept=$_GET['dept']; ?>
 
  <body>
  
  <?php
  
  include('menu_sidebar.php');
  
  $book_order_ctr1_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE dept='Grade School' AND order_status='Submitted'");
  $book_order_ctr2_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE dept='Junior High School' AND order_status='Submitted'");
  $book_order_ctr3_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE dept='Senior High School' AND order_status='Submitted'");
  $book_order_ctr4_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE dept='College' AND order_status='Submitted'");
  ?>
  

    <div class="page">

    <?php include('navbar_header.php'); ?>
    
    <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li style="color: blue"><strong><?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Book Inventory - List of Book Bundles - <?php echo $get_dept; ?></li>
             
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
                  <?php if($activeSchoolYear===$data_src_sy){ ?>
                  <a data-toggle="modal" data-target="#add_book" href="#" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                  <?php }else{ ?>
                  <a href="#" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-default"><i class="fa fa-plus"></i></a>
                  <?php } ?>&nbsp;
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">LIST OF BOOK ORDERS <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
              
              <div style="margin-top: 12px;"></div>
              
              
                <div class="tab" style="margin-top: 8px;">
              
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_book_orders.php?dept=Grade School&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">Grade School
                <div class="badge badge-warning"><?php echo $book_order_ctr1_query->rowCount(); ?></div></a>
                <?php }else{?>
                <a title="Grade School student list" href="list_book_orders.php?dept=Grade School&gradeLevel=&strand=&major=&section=" class="tablinks">Grade School
                <div class="badge badge-warning"><?php echo $book_order_ctr1_query->rowCount(); ?></div></a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Junior High School"){ ?>
                <a title="Junior High School student list" href="list_book_orders.php?dept=Junior High School&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">JHS
                <div class="badge badge-warning"><?php echo $book_order_ctr2_query->rowCount(); ?></div></a>
                <?php }else{?>
                <a title="Junior High School student list" href="list_book_orders.php?dept=Junior High School&gradeLevel=&strand=&major=&section=" class="tablinks">JHS
                <div class="badge badge-warning"><?php echo $book_order_ctr2_query->rowCount(); ?></div></a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Senior High School"){ ?>
                <a title="Senior High School student list" href="list_book_orders.php?dept=Senior High School&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">SHS
                <div class="badge badge-warning"><?php echo $book_order_ctr3_query->rowCount(); ?></div></a>
                <?php }else{?>
                <a title="Senior High School student list" href="list_book_orders.php?dept=Senior High School&gradeLevel=&strand=&major=&section=" class="tablinks">SHS
                <div class="badge badge-warning"><?php echo $book_order_ctr3_query->rowCount(); ?></div></a>
                <?php } ?>
           
                <?php if($_GET['dept']=="College"){ ?>
                <a title="College student list" href="list_book_orders.php?dept=College&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">College
                <div class="badge badge-warning"><?php echo $book_order_ctr4_query->rowCount(); ?></div></a>
                <?php }else{?>
                <a title="College student list" href="list_book_orders.php?dept=College&gradeLevel=&strand=&major=&section=" class="tablinks">College
                <div class="badge badge-warning"><?php echo $book_order_ctr4_query->rowCount(); ?></div></a>
                <?php } ?>
                
                </div>
                
                
                <?php if($_GET['dept']==='Grade School'){ ?>
                <div class="dropdown">
                  
                  <button class="dropbtn">Nursery</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classKN_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Nursery' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ckn_row = $classKN_query->fetch()) {
                  
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$ckn_row[gradeLevel]' AND strand='$ckn_row[strand]' AND major='$ckn_row[major]' AND section='$ckn_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $ckn_row['gradeLevel']; ?>&strand=<?php echo $ckn_row['strand']; ?>&major=<?php echo $ckn_row['major']; ?>&section=<?php echo $ckn_row['section']; ?>"><small><?php echo $ckn_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>

                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Preparatory</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classK1_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Preparatory' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ck1_row = $classK1_query->fetch()) {
                  
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$ck1_row[gradeLevel]' AND strand='$ck1_row[strand]' AND major='$ck1_row[major]' AND section='$ck1_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $ck1_row['gradeLevel']; ?>&strand=<?php echo $ck1_row['strand']; ?>&major=<?php echo $ck1_row['major']; ?>&section=<?php echo $ck1_row['section']; ?>"><small><?php echo $ck1_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>

             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Kinder</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classK2_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Kinder' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ck2_row = $classK2_query->fetch()) {
                  
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$ck2_row[gradeLevel]' AND strand='$ck2_row[strand]' AND major='$ck2_row[major]' AND section='$ck2_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $ck2_row['gradeLevel']; ?>&strand=<?php echo $ck2_row['strand']; ?>&major=<?php echo $ck2_row['major']; ?>&section=<?php echo $ck2_row['section']; ?>"><small><?php echo $ck2_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
   
             
                  <?php } ?>
                  </div>
                </div>
 
                <div class="dropdown">
                  <button class="dropbtn">Grade 1</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG1_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 1' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg1_row = $classG1_query->fetch()) {
                  
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg1_row[gradeLevel]' AND strand='$cg1_row[strand]' AND major='$cg1_row[major]' AND section='$cg1_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg1_row['gradeLevel']; ?>&strand=<?php echo $cg1_row['strand']; ?>&major=<?php echo $cg1_row['major']; ?>&section=<?php echo $cg1_row['section']; ?>"><small><?php echo $cg1_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 2</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG2_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 2' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg2_row = $classG2_query->fetch()) {
                    
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg2_row[gradeLevel]' AND strand='$cg2_row[strand]' AND major='$cg2_row[major]' AND section='$cg2_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg2_row['gradeLevel']; ?>&strand=<?php echo $cg2_row['strand']; ?>&major=<?php echo $cg2_row['major']; ?>&section=<?php echo $cg2_row['section']; ?>"><small><?php echo $cg2_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
     
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 3</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG3_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 3' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg3_row = $classG3_query->fetch()) {
                    
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg3_row[gradeLevel]' AND strand='$cg3_row[strand]' AND major='$cg3_row[major]' AND section='$cg3_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg3_row['gradeLevel']; ?>&strand=<?php echo $cg3_row['strand']; ?>&major=<?php echo $cg3_row['major']; ?>&section=<?php echo $cg3_row['section']; ?>"><small><?php echo $cg3_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
     
               
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 4</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG4_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 4' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg4_row = $classG4_query->fetch()) {
                    
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg4_row[gradeLevel]' AND strand='$cg4_row[strand]' AND major='$cg4_row[major]' AND section='$cg4_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg4_row['gradeLevel']; ?>&strand=<?php echo $cg4_row['strand']; ?>&major=<?php echo $cg4_row['major']; ?>&section=<?php echo $cg4_row['section']; ?>"><small><?php echo $cg4_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
     
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 5</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG5_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 5' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg5_row = $classG5_query->fetch()) {
                  
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg5_row[gradeLevel]' AND strand='$cg5_row[strand]' AND major='$cg5_row[major]' AND section='$cg5_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg5_row['gradeLevel']; ?>&strand=<?php echo $cg5_row['strand']; ?>&major=<?php echo $cg5_row['major']; ?>&section=<?php echo $cg5_row['section']; ?>"><small><?php echo $cg5_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
     
             
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 6</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG6_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 6' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg6_row = $classG6_query->fetch()){
                    
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg6_row[gradeLevel]' AND strand='$cg6_row[strand]' AND major='$cg6_row[major]' AND section='$cg6_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg6_row['gradeLevel']; ?>&strand=<?php echo $cg6_row['strand']; ?>&major=<?php echo $cg6_row['major']; ?>&section=<?php echo $cg6_row['section']; ?>"><small><?php echo $cg6_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
     
              
             
                  <?php } ?>
                  </div>
                </div>
                <?php } ?>
                
                
                <?php if($_GET['dept']==='Junior High School'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 7</button>
                  
                  <div class="dropdown-content">
 
                  <?php
                  $classG7_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 7' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg7_row = $classG7_query->fetch()){
                    
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg7_row[gradeLevel]' AND strand='$cg7_row[strand]' AND major='$cg7_row[major]' AND section='$cg7_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg7_row['gradeLevel']; ?>&strand=<?php echo $cg7_row['strand']; ?>&major=<?php echo $cg7_row['major']; ?>&section=<?php echo $cg7_row['section']; ?>"><small><?php echo $cg7_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
     
              
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 8</button>
                  
                  <div class="dropdown-content">
               
                  <?php
                  $classG8_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 8' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg8_row = $classG8_query->fetch()) {
                    
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg8_row[gradeLevel]' AND strand='$cg8_row[strand]' AND major='$cg8_row[major]' AND section='$cg8_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg8_row['gradeLevel']; ?>&strand=<?php echo $cg8_row['strand']; ?>&major=<?php echo $cg8_row['major']; ?>&section=<?php echo $cg8_row['section']; ?>"><small><?php echo $cg8_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
     
              
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 9</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG9_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 9' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg9_row = $classG9_query->fetch()) {
                    
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg9_row[gradeLevel]' AND strand='$cg9_row[strand]' AND major='$cg9_row[major]' AND section='$cg9_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg9_row['gradeLevel']; ?>&strand=<?php echo $cg9_row['strand']; ?>&major=<?php echo $cg9_row['major']; ?>&section=<?php echo $cg9_row['section']; ?>"><small><?php echo $cg9_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
     
             
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 10</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG10_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 10' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg10_row = $classG10_query->fetch()) {

                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg10_row[gradeLevel]' AND strand='$cg10_row[strand]' AND major='$cg10_row[major]' AND section='$cg10_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg10_row['gradeLevel']; ?>&strand=<?php echo $cg10_row['strand']; ?>&major=<?php echo $cg10_row['major']; ?>&section=<?php echo $cg10_row['section']; ?>"><small><?php echo $cg10_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
     
             
             
                  <?php } ?>
                  </div>
                </div>
                <?php } ?>
                
                
                <?php if($_GET['dept']==='Senior High School'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 11</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG11_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 11' AND schoolYear='$data_src_sy' ORDER BY strand, section ASC") or die(mysql_error());
                  while ($cg11_row = $classG11_query->fetch()) {
   
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg11_row[gradeLevel]' AND strand='$cg11_row[strand]' AND major='$cg11_row[major]' AND section='$cg11_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg11_row['gradeLevel']; ?>&strand=<?php echo $cg11_row['strand']; ?>&major=<?php echo $cg11_row['major']; ?>&section=<?php echo $cg11_row['section']; ?>"><small><?php echo $cg11_row['strand']; ?> - <?php echo $cg11_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>

                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 12</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG12_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='Grade 12' AND schoolYear='$data_src_sy' ORDER BY strand, section ASC") or die(mysql_error());
                  while ($cg12_row = $classG12_query->fetch()) {
                
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$cg12_row[gradeLevel]' AND strand='$cg12_row[strand]' AND major='$cg12_row[major]' AND section='$cg12_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg12_row['gradeLevel']; ?>&strand=<?php echo $cg12_row['strand']; ?>&major=<?php echo $cg12_row['major']; ?>&section=<?php echo $cg12_row['section']; ?>"><small><?php echo $cg12_row['strand']; ?> - <?php echo $cg12_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
  
                  <?php } ?>
                  </div>
                </div>
 
                <?php } ?>
                
                
                <?php if($_GET['dept']==='College'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">1st Year</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class1stYr_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='1st Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c1stYr_row = $class1stYr_query->fetch()) {
                
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$c1stYr_row[gradeLevel]' AND strand='$c1stYr_row[strand]' AND major='$c1stYr_row[major]' AND section='$c1stYr_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $c1stYr_row['gradeLevel']; ?>&strand=<?php echo $c1stYr_row['strand']; ?>&major=<?php echo $c1stYr_row['major']; ?>&section=<?php echo $c1stYr_row['section']; ?>"><small><?php echo $c1stYr_row['strand']; ?> - <?php echo $c1stYr_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
                  
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">2nd Year</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class2ndYr_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='2nd Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c2ndYr_row = $class2ndYr_query->fetch()) {
                  
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$c2ndYr_row[gradeLevel]' AND strand='$c2ndYr_row[strand]' AND major='$c2ndYr_row[major]' AND section='$c2ndYr_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $c2ndYr_row['gradeLevel']; ?>&strand=<?php echo $c2ndYr_row['strand']; ?>&major=<?php echo $c2ndYr_row['major']; ?>&section=<?php echo $c2ndYr_row['section']; ?>"><small><?php echo $c2ndYr_row['strand']; ?> - <?php echo $c2ndYr_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
     
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">3rd Year</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class3rdYr_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='3rd Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c3rdYr_row = $class3rdYr_query->fetch()) {
                 
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$c3rdYr_row[gradeLevel]' AND strand='$c3rdYr_row[strand]' AND major='$c3rdYr_row[major]' AND section='$c3rdYr_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $c3rdYr_row['gradeLevel']; ?>&strand=<?php echo $c3rdYr_row['strand']; ?>&major=<?php echo $c3rdYr_row['major']; ?>&section=<?php echo $c3rdYr_row['section']; ?>"><small><?php echo $c3rdYr_row['strand']; ?> - <?php echo $c3rdYr_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
                  
     
             
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">4th Year</button>
                  
                  <div class="dropdown-content">
                  <?php
                  
                  $class4thYr_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_students WHERE gradeLevel='4th Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c4thYr_row = $class4thYr_query->fetch()) {
                   
                  $book_order_ctr_query = $conn->query("SELECT reg_id FROM tbl_book_students WHERE gradeLevel='$c4thYr_row[gradeLevel]' AND strand='$c4thYr_row[strand]' AND major='$c4thYr_row[major]' AND section='$c4thYr_row[section]' AND order_status='Submitted'");
                  
                  ?>
                  <a href="list_book_orders.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $c4thYr_row['gradeLevel']; ?>&strand=<?php echo $c4thYr_row['strand']; ?>&major=<?php echo $c4thYr_row['major']; ?>&section=<?php echo $c4thYr_row['section']; ?>"><small><?php echo $c4thYr_row['strand']; ?> - <?php echo $c4thYr_row['section']; ?>
                  <div class="badge badge-warning"><?php echo $book_order_ctr_query->rowCount(); ?></div></small></a>
                  
     
             
             
                  <?php } ?>
                  </div>
                </div>
 
                <?php } ?>
 
     
                
                
                <h3 style="margin: 16px 16px 16px 16px;">
                <strong>
                <?php
 
                if($_GET['gradeLevel']===''){
                    echo "Select class";
                }else{ 
                    
                    if($_GET['dept']=="Grade School" OR $_GET['dept']=="Junior High School")
                    {
                        echo $_GET['gradeLevel'].' - '.$_GET['section'];
                        
                    }elseif($_GET['dept']=="Senior High School"){
                        echo $_GET['gradeLevel']." - ".$_GET['strand'].' - '.$_GET['section'];
                    }else{
                        echo $_GET['gradeLevel']." - ".$_GET['strand'].' '.$_GET['major'].' - '.$_GET['section'];
                    }
                    
                }
                
                
                ?>
                </strong>
                </h3>
                 
                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th style="width: 4%;">#</th>
                        <th style="width: 36%;">Student</th>
                        <th style="width: 10%;">Payable</th>
                        <th style="width: 10%;">Paid</th>
                        <th style="width: 10%;">Balance</th>
                        <th style="width: 15%;">Order Status</th>
                        <th style="width: 15%;">Action</th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      
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
                    
                        $studCtr=0;
               
                        $stud_query = $conn->query("SELECT * FROM tbl_book_students WHERE gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]' AND major='$_GET[major]' AND schoolYear='$data_src_sy' ORDER BY lname, fname ASC") or die(mysql_error());
                        while ($studData_row = $stud_query->fetch()) 
                        {
                        $studCtr+=1;
                        $reg_id=$studData_row['reg_id'];
                        
                        if($studData_row['mname']=='' OR $studData_row['mname']=='-')
                        {
                            $finalMName='';
                                
                        }else{
                                
                            if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                                
                            $finalMName=$suffix.$studData_row['mname'];
                        }
                        
                        
                        $chk_order_query = $conn->query("SELECT * FROM tbl_book_payables WHERE reg_id='$reg_id'") or die(mysql_error());
                        $chl_order_row = $chk_order_query->fetch();
                      
                        ?>
           
                        <tr>
                        
                        <td style="vertical-align: top;"><?php echo $studCtr; ?></td>
                        
                        <td style="vertical-align: top;">
                        <?php echo $studData_row['student_id']; ?> &middot; <?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?> 
                        <?php if($studData_row['status']==='Verified'){ ?>
                            <small class="badge badge-info"><?php echo $studData_row['status']; ?></small>
                            
                        <?php }else{ ?>
                            <small class="badge badge-warning"><?php echo $studData_row['status']; ?></small>
                            
                        <?php } ?>
                        
                        </td>
                        
                        <td style="vertical-align: top;">
                        <?php echo number_format($chl_order_row['total_amt'], 2); ?>
                        </td>
                        
                        <td style="vertical-align: top;">
                        <?php echo number_format($chl_order_row['total_amt_paid'], 2); ?>
                        </td>
                      
                        <td style="vertical-align: top;">
                        <?php echo number_format($chl_order_row['total_amt']-$chl_order_row['total_amt_paid'], 2); ?>
                        </td>
                        
                        <td style="vertical-align: top;">
                        <?php
                        
                        if($chk_order_query->rowCount()>0){
                            echo "Submitted";
                        }else{
                            echo "Not Submitted";
                        }
                        
                        ?>
                        </td>
                        
                        <td style="vertical-align: top;">
                        
                        <?php
                        
                        if($chk_order_query->rowCount()>0){ ?>
                            <a href="cashiering_system_load_particulars.php?reg_id=<?php echo $studData_row['reg_id']; ?>&assessment_id=Books&schoolYear=<?php echo $studData_row['schoolYear']; ?>&semester=<?php echo $studData_row['sem']; ?>&payment_type=Book Fee&receipt_num=<?php echo $receipt_num; ?>&request_id=0" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-calculator"></i> Cashiering</a>
                         
                        <?php }else{ ?>
                            <a href="#" class="btn btn-secondary btn-sm" style="color: white;"><i class="fa fa-calculator"></i> Cashiering</a>
                         
                        <?php } ?>
                        
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
     
            <!-- add Student Modal -->
            <?php include('add_book_bundle_modal.php'); ?>
            <!-- end add Student Modal -->
 
            </div>
            
          </div>
        
              
      </section>
     
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
 
  </body>
</html>
