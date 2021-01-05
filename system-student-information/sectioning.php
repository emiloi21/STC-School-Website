<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
  <?php
 
  $get_dept=$_GET['dept'];
  
  ?>
 


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
            <li class="breadcrumb-item active">Student List - <?php echo $get_dept; ?></li>
             
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
  
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">STUDENT LIST &nbsp;<small>(SY <?php echo $data_src_sy; ?>)</small></a>
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
                
                <?php if($_GET['dept']=="Kinder"){ ?>
                <a title="Nursery/Kinder student list" href="list_students.php?dept=Kinder&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">Kinder</a>
                <?php }else{?>
                <a title="Nursery/Kinder student list" href="list_students.php?dept=Kinder&class_id=" class="tablinks">Kinder</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Elementary"){ ?>
                <a title="Elementary student list" href="list_students.php?dept=Elementary&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">Elementary</a>
                <?php }else{?>
                <a title="Elementary student list" href="list_students.php?dept=Elementary&class_id=" class="tablinks">Elementary</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="JHS"){ ?>
                <a title="JHS student list" href="list_students.php?dept=JHS&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">JHS</a>
                <?php }else{?>
                <a title="JHS student list" href="list_students.php?dept=JHS&class_id=" class="tablinks">JHS</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="SHS"){ ?>
                <a title="SHS student list" href="list_students.php?dept=SHS&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">SHS</a>
                <?php }else{?>
                <a title="SHS student list" href="list_students.php?dept=SHS&class_id=" class="tablinks">SHS</a>
                <?php } ?>
           
                
                </div>
                
                
                
                
                
                <?php if($get_dept==='Kinder'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Nursery</button>
                  <div class="dropdown-content">
                  <?php
                  $classKN_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Nursery' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ckn_row = $classKN_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ckn_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ckn_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $ckn_row['class_id']; ?>"><small><?php echo $ckn_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Kinder 1</button>
                  <div class="dropdown-content">
                  <?php
                  $classK1_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Kinder 1' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ck1_row = $classK1_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ck1_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ck1_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $ck1_row['class_id']; ?>"><small><?php echo $ck1_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Kinder 2</button>
                  <div class="dropdown-content">
                  <?php
                  $classK2_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Kinder 2' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ck2_row = $classK2_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ck2_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$ck2_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $ck2_row['class_id']; ?>"><small><?php echo $ck2_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
 
                <?php } ?>
                
                
                <?php if($get_dept==='Elementary'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 1</button>
                  <div class="dropdown-content">
                  <?php
                  $classG1_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 1' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg1_row = $classG1_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg1_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg1_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg1_row['class_id']; ?>"><small><?php echo $cg1_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 2</button>
                  <div class="dropdown-content">
                  <?php
                  $classG2_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 2' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg2_row = $classG2_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg2_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg2_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg2_row['class_id']; ?>"><small><?php echo $cg2_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 3</button>
                  <div class="dropdown-content">
                  <?php
                  $classG3_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 3' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg3_row = $classG3_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg3_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg3_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg3_row['class_id']; ?>"><small><?php echo $cg3_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 4</button>
                  <div class="dropdown-content">
                  <?php
                  $classG4_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 4' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg4_row = $classG4_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg4_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg4_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg4_row['class_id']; ?>"><small><?php echo $cg4_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 5</button>
                  <div class="dropdown-content">
                  <?php
                  $classG5_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 5' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg5_row = $classG5_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg5_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg5_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg5_row['class_id']; ?>"><small><?php echo $cg5_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 6</button>
                  <div class="dropdown-content">
                  <?php
                  $classG6_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 6' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg6_row = $classG6_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg6_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg6_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg6_row['class_id']; ?>"><small><?php echo $cg6_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                <?php } ?>
                
                
                <?php if($get_dept==='JHS'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 7</button>
                  <div class="dropdown-content">
                  
                  <?php
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE gradeLevel='Grade 7' AND section='-' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE gradeLevel='Grade 7' AND section='-' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=0&gradeLevel=Grade 7&strand=N/A"><small>Unassigned<br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>


                  <?php
                  $classG7_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 7' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg7_row = $classG7_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg7_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg7_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg7_row['class_id']; ?>"><small><?php echo $cg7_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 8</button>
                  <div class="dropdown-content">
                  <?php
                  
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE gradeLevel='Grade 8' AND section='-' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE gradeLevel='Grade 8' AND section='-' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=0&gradeLevel=Grade 8&strand=N/A"><small>Unassigned<br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>

                  
                  <?php
                  $classG8_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 8' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg8_row = $classG8_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg8_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg8_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg8_row['class_id']; ?>"><small><?php echo $cg8_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 9</button>
                  <div class="dropdown-content">
                  <?php
                  $classG9_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 9' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg9_row = $classG9_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg9_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg9_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg9_row['class_id']; ?>"><small><?php echo $cg9_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 10</button>
                  <div class="dropdown-content">
                  <?php
                  $classG10_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 10' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg10_row = $classG10_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg10_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg10_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg10_row['class_id']; ?>"><small><?php echo $cg10_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                <?php } ?>
                
                
                <?php if($get_dept==='SHS'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 11</button>
                  <div class="dropdown-content">
                  <?php
                  $classG11_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 11' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg11_row = $classG11_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg11_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg11_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg11_row['class_id']; ?>"><small><?php echo $cg11_row['strand'].' - '.$cg11_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 12</button>
                  <div class="dropdown-content">
                  <?php
                  $classG12_query = $conn->query("SELECT * FROM classes WHERE gradeLevel='Grade 12' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg12_row = $classG12_query->fetch()) {
                    
                  $studMaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg12_row[class_id]' AND gender='Male' AND schoolYear='$data_src_sy'") or die(mysql_error());
                  $studFemaleCtr_query = $conn->query("SELECT * FROM students WHERE class_id='$cg12_row[class_id]' AND gender='Female' AND schoolYear='$data_src_sy'") or die(mysql_error());
                     
                  ?>
                    
                    <a href="list_students.php?dept=<?php echo $get_dept; ?>&class_id=<?php echo $cg12_row['class_id']; ?>"><small><?php echo $cg12_row['strand'].' - '.$cg12_row['section']; ?><br />
                    
                    <small> [ Male: <?php echo $studMaleCtr_query->rowCount(); ?> | Female: <?php echo $studFemaleCtr_query->rowCount(); ?> | Total: <?php echo $studMaleCtr_query->rowCount()+$studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
             
                  <?php } ?>
                  </div>
                </div>
 
                <?php } ?>
     
     
                 
                <h3 style="margin: 16px 16px 16px 16px;">
                <strong>
                <?php
                
                $classDetails_query = $conn->query("SELECT gradeLevel, strand, section, dept FROM classes WHERE class_id='$_GET[class_id]'") or die(mysql_error());
                $cDetails_row = $classDetails_query->fetch();
                    
                if($_GET['class_id']===''){
                    echo "Select Class";
                    
                }elseif($_GET['class_id']==='0'){ 
                    
                    if($_GET['gradeLevel']==='Grade 11' OR $_GET['gradeLevel']==='Grade 12')
                    {
                        echo $_GET['gradeLevel']." - ".$_GET['strand'];
                    }else{
                        echo $_GET['gradeLevel'];
                    }
                    
                }else{
                    
                    if($cDetails_row['strand']=="N/A")
                    {
                    echo $cDetails_row['gradeLevel']." - ".$cDetails_row['section'];
                    }else{
                    echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']." - ".$cDetails_row['section'];
                    }
                    
                }
                
                
                ?>
                </strong>
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
            <?php //include('add_student_modal.php'); ?>
            <!-- end add Student Modal -->
 
            </div>
            
          </div>
        
              
      </section>
 
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
    
    
    <script>
    $(document).ready(function(){
    	setInterval(function(){
    		$("#screen").load('add_student_tag.php')
        }, 250);
    });
    </script>
    
    <script>
    
    $('#blah').attr('src', 'img/avatar-1.jpg');
    
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();
    
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }
    
        reader.readAsDataURL(input.files[0]);
      }
    }
    
    $("#imgInp").change(function() {
      readURL(this);
    });
    </script>
    
 
  </body>
</html>
