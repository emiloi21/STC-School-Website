<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');

  ?>
  
<body>
  
  <!--div id="load"></div-->

  <?php include('menu_sidebar.php'); ?>
  

    <div class="page">

    <?php include('navbar_header.php'); ?>
    
    <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li style="color: blue"><strong><?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Student List - <?php echo $_GET['dept']; ?></li>
             
          </ul>
          
        </div>
      </div>
      
      <!-- Header Section-->
      
      <br />
      
      <?php 
      if($_GET['dept']==='All'){ ?>
      <div class="col-lg-12">
      <?php include('list_stud_search.php'); ?>
      </div>
      <?php }else{ ?>
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              

             <!-- Preparatory     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">STUDENT LIST&nbsp;<div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                    
                    <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
                
                </div>
                
                
                <div id="updates-boxContacts" role="tabpanel" class="collapse show">
                <div class="col-lg-12">
                
                <div class="tab" style="margin-top: 8px;">
 
                <?php if($_GET['dept']=="All"){ ?>
                <a title="All student list" href="list_students.php?dept=All&class_id=" class="tablinks active" style="font-weight: bolder;">All</a>
                <?php }else{?>
                <a title="All student list" href="list_students.php?dept=All&class_id=" class="tablinks">All</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_students.php?dept=Grade School&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">Grade School</a>
                <?php }else{?>
                <a title="Grade School student list" href="list_students.php?dept=Grade School&class_id=" class="tablinks">Grade School</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Junior High School"){ ?>
                <a title="Junior High School student list" href="list_students.php?dept=Junior High School&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">JHS</a>
                <?php }else{?>
                <a title="Junior High School student list" href="list_students.php?dept=Junior High School&class_id=" class="tablinks">JHS</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Senior High School"){ ?>
                <a title="Senior High School student list" href="list_students.php?dept=Senior High School&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">SHS</a>
                <?php }else{?>
                <a title="Senior High School student list" href="list_students.php?dept=Senior High School&class_id=" class="tablinks">SHS</a>
                <?php } ?>
           
                <?php if($_GET['dept']=="College"){ ?>
                <a title="College student list" href="list_students.php?dept=College&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">College</a>
                <?php }else{?>
                <a title="College student list" href="list_students.php?dept=College&class_id=" class="tablinks">College</a>
                <?php } ?>
                
                </div>
                
                
                
                
                
                <?php if($_GET['dept']==='Grade School'){ ?>
                <div class="dropdown">
                  
                  <button class="dropbtn">Nursery&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $nurseryCtr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classKN_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Nursery' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ckn_row = $classKN_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ckn_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ckn_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $ckn_row['class_id']; ?>"><small><?php echo $ckn_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Preparatory&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $prepCtr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classK1_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Preparatory' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ck1_row = $classK1_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ck1_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ck1_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $ck1_row['class_id']; ?>"><small><?php echo $ck1_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Kinder&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $kinderCtr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classK2_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Kinder' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ck2_row = $classK2_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ck2_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ck2_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $ck2_row['class_id']; ?>"><small><?php echo $ck2_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
 
                <div class="dropdown">
                  <button class="dropbtn">Grade 1&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g1Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG1_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 1' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg1_row = $classG1_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg1_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg1_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg1_row['class_id']; ?>"><small><?php echo $cg1_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 2&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g2Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG2_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 2' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg2_row = $classG2_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg2_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg2_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg2_row['class_id']; ?>"><small><?php echo $cg2_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 3&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g3Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG3_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 3' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg3_row = $classG3_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg3_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg3_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg3_row['class_id']; ?>"><small><?php echo $cg3_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 4&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g4Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG4_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 4' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg4_row = $classG4_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg4_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg4_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg4_row['class_id']; ?>"><small><?php echo $cg4_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 5&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g5Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG5_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 5' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg5_row = $classG5_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg5_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg5_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg5_row['class_id']; ?>"><small><?php echo $cg5_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 6&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g6Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG6_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 6' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg6_row = $classG6_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg6_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg6_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg6_row['class_id']; ?>"><small><?php echo $cg6_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                <?php } ?>
                
                
                <?php if($_GET['dept']==='Junior High School'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 7&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g7Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
 
                  <?php
                  $classG7_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 7' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg7_row = $classG7_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg7_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg7_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg7_row['class_id']; ?>"><small><?php echo $cg7_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 8&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g8Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
               
                  <?php
                  $classG8_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 8' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg8_row = $classG8_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg8_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg8_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg8_row['class_id']; ?>"><small><?php echo $cg8_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 9&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g9Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG9_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 9' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg9_row = $classG9_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg9_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg9_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg9_row['class_id']; ?>"><small><?php echo $cg9_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 10&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g10Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG10_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 10' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg10_row = $classG10_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg10_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg10_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg10_row['class_id']; ?>"><small><?php echo $cg10_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                <?php } ?>
                
                
                <?php if($_GET['dept']==='Senior High School'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 11&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g11Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG11_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 11' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg11_row = $classG11_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg11_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg11_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg11_row['class_id']; ?>"><small><?php echo $cg11_row['strand'].' - '.$cg11_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 12&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $g12Ctr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG12_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 12' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg12_row = $classG12_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg12_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg12_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $cg12_row['class_id']; ?>"><small><?php echo $cg12_row['strand'].' - '.$cg12_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
 
                <?php } ?>
                
                
                <?php if($_GET['dept']==='College'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">1st Year&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $yr1stCtr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class1stYr_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='1st Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c1stYr_row = $class1stYr_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$c1stYr_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$c1stYr_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $c1stYr_row['class_id']; ?>"><small><?php echo $c1stYr_row['strand'].' '.$c1stYr_row['major'].' - '.$c1stYr_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">2nd Year&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $yr2ndCtr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class2ndYr_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='2nd Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c2ndYr_row = $class2ndYr_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$c2ndYr_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$c2ndYr_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $c2ndYr_row['class_id']; ?>"><small><?php echo $c2ndYr_row['strand'].' '.$c2ndYr_row['major'].' - '.$c2ndYr_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">3rd Year&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $yr3rdCtr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class3rdYr_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='3rd Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c3rdYr_row = $class3rdYr_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$c3rdYr_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$c3rdYr_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $c3rdYr_row['class_id']; ?>"><small><?php echo $c3rdYr_row['strand'].' '.$c3rdYr_row['major'].' - '.$c3rdYr_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">4th Year&nbsp;&nbsp;
                  <div class="badge badge-warning"><?php echo $yr4thCtr; ?></div>
                  </button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class4thYr_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='4th Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c4thYr_row = $class4thYr_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$c4thYr_row[class_id]' AND sex='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$c4thYr_row[class_id]' AND sex='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $c4thYr_row['class_id']; ?>"><small><?php echo $c4thYr_row['strand'].' '.$c4thYr_row['major'].' - '.$c4thYr_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
 
                <?php } ?>
     
     
                 
                <h3 style="margin: 16px 16px 16px 16px;">
                <strong>
                
                <?php
                
                $classDetails_query = $conn->query("SELECT dept, gradeLevel, strand, major, section FROM classes WHERE class_id='$_GET[class_id]'") or die(mysql_error());
                $cDetails_row = $classDetails_query->fetch();
                    
                if($_GET['class_id']===''){
                    echo "Select Class";
                    
                }elseif($_GET['class_id']==='0'){ 
                    
                    if($_GET['dept']==='College'){
                            $classDetails=$cDetails_row['gradeLevel'].' - '.$cDetails_row['strand'].' '.$cDetails_row['major'].' - '.$cDetails_row['section'];
                        }elseif($cDetails_row==='Senior High School'){
                            $classDetails=$cDetails_row['gradeLevel'].' - '.$cDetails_row['strand'].' - '.$cDetails_row['section'];
                        }else{
                            $classDetails=$cDetails_row['gradeLevel'].' - '.$cDetails_row['section'];
                        }
                        
                        echo $classDetails;
                    
                }else{
                    
                    if($_GET['dept']==='College'){
                            $classDetails=$cDetails_row['gradeLevel'].' - '.$cDetails_row['strand'].' '.$cDetails_row['major'].' - '.$cDetails_row['section'];
                        }elseif($cDetails_row==='Senior High School'){
                            $classDetails=$cDetails_row['gradeLevel'].' - '.$cDetails_row['strand'].' - '.$cDetails_row['section'];
                        }else{
                            $classDetails=$cDetails_row['gradeLevel'].' - '.$cDetails_row['section'];
                        }
                        
                        echo $classDetails;
                    
                }
                
                
                ?>
                </strong>
                
                <?php if($_GET['class_id']==""){}else{ ?>
                <?php if($activeSchoolYear===$data_src_sy){ ?>
                <a data-toggle="modal" data-target="#addStudent" href="#" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-primary"><i class="fa fa-plus"></i> Student</a>
                <?php }else{ ?>
                <a href="#" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-default"><i class="fa fa-plus"></i></a>
                <?php } } ?> 
                
                <?php if($_GET['class_id']!=''){ ?> <a href="print_classList.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $_GET['class_id']; ?>" class="btn btn-info btn-sm" style="color: white;" title="Click to print class list..." target="_blank"> <i class="fa fa-print"></i> List</a> <?php } ?>
                </h3>
                 
                
                <?php include('list_stud_table.php'); ?>
               
               </div>
               </div>
                   
                </div>
                
              </div>
              <!-- kinder End-->
    
            <!-- EDIT Student Modal -->
            <?php include('edit_student_modal.php'); ?>
            <!-- end EDIT Student Modal -->
            
            <!-- add Student Modal -->
            <?php include('add_student_modal.php'); ?>
            <!-- end add Student Modal -->
 
            </div>
            
          </div>
        
              
      </section>
      <?php } ?>
      <?php include('footer.php'); ?>
      
    </div>
    
        <?php include('scripts_files.php'); ?>
 
  </body>
</html>
