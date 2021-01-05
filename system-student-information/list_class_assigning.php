<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
  <?php $get_dept=$_GET['dept']; ?>
 
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
            <li class="breadcrumb-item active">Student List - <?php echo $get_dept; ?></li>
             
          </ul>
          
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              

             <!-- Preparatory     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">CLASS ASSIGNING &nbsp;<small>(SY <?php echo $data_src_sy; ?>)</small></a>
                  </h2>
                    
                    <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
                
                </div>
                
                
                <div id="updates-boxContacts" role="tabpanel" class="collapse show">
                <div class="col-lg-12">
                
                <div class="tab" style="margin-top: 8px;">
                
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_class_assigning.php?dept=Grade School&gradeLevel=&strand=&major=&sex=" class="tablinks active" style="font-weight: bolder;">Grade School</a>
                <?php }else{?>
                <a title="Grade School student list" href="list_class_assigning.php?dept=Grade School&gradeLevel=&strand=&major=&sex=" class="tablinks">Grade School</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Junior High School"){ ?>
                <a title="Junior High School student list" href="list_class_assigning.php?dept=Junior High School&gradeLevel=&strand=&major=&sex=" class="tablinks active" style="font-weight: bolder;">JHS</a>
                <?php }else{?>
                <a title="Junior High School student list" href="list_class_assigning.php?dept=Junior High School&gradeLevel=&strand=&major=&sex=" class="tablinks">JHS</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Senior High School"){ ?>
                <a title="Senior High School student list" href="list_class_assigning.php?dept=Senior High School&gradeLevel=&strand=&major=&sex=" class="tablinks active" style="font-weight: bolder;">SHS</a>
                <?php }else{?>
                <a title="Senior High School student list" href="list_class_assigning.php?dept=Senior High School&gradeLevel=&strand=&major=&sex=" class="tablinks">SHS</a>
                <?php } ?>
           
                <?php if($_GET['dept']=="College"){ ?>
                <a title="College student list" href="list_class_assigning.php?dept=College&gradeLevel=&strand=&major=&sex=" class="tablinks active" style="font-weight: bolder;">College</a>
                <?php }else{?>
                <a title="College student list" href="list_class_assigning.php?dept=College&gradeLevel=&strand=&major=&sex=" class="tablinks">College</a>
                <?php } ?>
                
                </div>
                
                
                
                
                
                <?php if($get_dept==='Grade School'){ ?>
                
                <div class="dropdown">
                  <button class="dropbtn">Nursery</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Nursery', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Nursery', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Nursery&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Nursery&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Preparatory</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Preparatory', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Preparatory', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Preparatory&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Preparatory&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Kinder</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Kinder', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Kinder', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Kinder&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Kinder&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
 
                <div class="dropdown">
                  <button class="dropbtn">Grade 1</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 1', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 1', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 1&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 1&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 2</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 2', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 2', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 2&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 2&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 3</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 3', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 3', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 3&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 3&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 4</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 4', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 4', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 4&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 4&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 5</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 5', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 5', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 5&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 5&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 6</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 6', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 6', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 6&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 6&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                <?php } ?>
                
                
                <?php if($get_dept==='Junior High School'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 7</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 7', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 7', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 7&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 7&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 8</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 8', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 8', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 8&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 8&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 9</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 9', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 9', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 9&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 9&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 10</button>
                  <div class="dropdown-content">
 
                  <?php
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 10', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 10', 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 10&strand=N/A&major=N/A&sex=Male"><small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 10&strand=N/A&major=N/A&sex=Female"><small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
                
                  </div>
                </div>
                
                
                 
 
                <?php } ?>
                
                
                <?php if($get_dept==='Senior High School'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 11</button>
                  <div class="dropdown-content">
                  <?php
                  
                  $classG11_query = $conn->prepare('SELECT DISTINCT strand FROM classes WHERE gradeLevel = :gradeLevel AND schoolYear = :schoolYear ORDER BY strand ASC') or die(mysql_error());
                  $classG11_query->execute(['gradeLevel' => 'Grade 11', 'schoolYear' => $data_src_sy]);
                  while ($cg11_row = $classG11_query->fetch()){
                  
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 11', 'strand' => $cg11_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 11', 'strand' => $cg11_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 11&strand=<?php echo $cg11_row['strand']; ?>&major=N/A&sex=Male"><?php echo $cg11_row['strand']; ?> <small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 11&strand=<?php echo $cg11_row['strand']; ?>&major=N/A&sex=Female"><?php echo $cg11_row['strand']; ?> <small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 12</button>
                  <div class="dropdown-content">
                  <?php
                  
                  $classG12_query = $conn->prepare('SELECT DISTINCT strand FROM classes WHERE gradeLevel = :gradeLevel AND schoolYear = :schoolYear ORDER BY strand ASC') or die(mysql_error());
                  $classG12_query->execute(['gradeLevel' => 'Grade 12', 'schoolYear' => $data_src_sy]);
                  while ($cg12_row = $classG12_query->fetch()){
                  
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => 'Grade 12', 'strand' => $cg12_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => 'Grade 12', 'strand' => $cg12_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 12&strand=<?php echo $cg12_row['strand']; ?>&major=N/A&sex=Male"><?php echo $cg12_row['strand']; ?> <small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=Grade 12&strand=<?php echo $cg12_row['strand']; ?>&major=N/A&sex=Female"><?php echo $cg12_row['strand']; ?> <small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
             
                  <?php } ?>
                  </div>
                </div>
 
                <?php } ?>
                
                
                <?php if($get_dept==='College'){ ?>
                
                <!-- 1st year college -->
                
                <div class="dropdown">
                  <button class="dropbtn">1st Year</button>
                  <div class="dropdown-content">
                  <?php
                  
                  $classG11_query = $conn->prepare('SELECT DISTINCT strand, major FROM classes WHERE gradeLevel = :gradeLevel AND schoolYear = :schoolYear ORDER BY strand ASC') or die(mysql_error());
                  $classG11_query->execute(['gradeLevel' => '1st Year', 'schoolYear' => $data_src_sy]);
                  while ($cg1stYr_row = $classG11_query->fetch()){
                  
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => '1st Year', 'strand' => $cg1stYr_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => '1st Year', 'strand' => $cg1stYr_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=1st Year&strand=<?php echo $cg1stYr_row['strand']; ?>&major=<?php echo $cg1stYr_row['major']; ?>&sex=Male"><?php echo $cg1stYr_row['strand'].' '.$cg1stYr_row['major']; ?> <small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=1st Year&strand=<?php echo $cg1stYr_row['strand']; ?>&major=<?php echo $cg1stYr_row['major']; ?>&sex=Female"><?php echo $cg1stYr_row['strand'].' '.$cg1stYr_row['major']; ?> <small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
             
                  <?php } ?>
                  </div>
                </div>
                
                <!--2nd year college -->
                
                <div class="dropdown">
                  <button class="dropbtn">2nd Year</button>
                  <div class="dropdown-content">
                  <?php
                  
                  $classG11_query = $conn->prepare('SELECT DISTINCT strand, major FROM classes WHERE gradeLevel = :gradeLevel AND schoolYear = :schoolYear ORDER BY strand ASC') or die(mysql_error());
                  $classG11_query->execute(['gradeLevel' => '2nd Year', 'schoolYear' => $data_src_sy]);
                  while ($cg1stYr_row = $classG11_query->fetch()){
                  
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => '2nd Year', 'strand' => $cg1stYr_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => '2nd Year', 'strand' => $cg1stYr_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=2nd Year&strand=<?php echo $cg1stYr_row['strand']; ?>&major=<?php echo $cg1stYr_row['major']; ?>&sex=Male"><?php echo $cg1stYr_row['strand'].' '.$cg1stYr_row['major']; ?> <small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=2nd Year&strand=<?php echo $cg1stYr_row['strand']; ?>&major=<?php echo $cg1stYr_row['major']; ?>&sex=Female"><?php echo $cg1stYr_row['strand'].' '.$cg1stYr_row['major']; ?> <small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
             
                  <?php } ?>
                  </div>
                </div>
                
                <!-- 3rd year college -->
                <div class="dropdown">
                  <button class="dropbtn">3rd Year</button>
                  <div class="dropdown-content">
                  <?php
                  
                  $classG11_query = $conn->prepare('SELECT DISTINCT strand, major FROM classes WHERE gradeLevel = :gradeLevel AND schoolYear = :schoolYear ORDER BY strand ASC') or die(mysql_error());
                  $classG11_query->execute(['gradeLevel' => '3rd Year', 'schoolYear' => $data_src_sy]);
                  while ($cg1stYr_row = $classG11_query->fetch()){
                  
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => '3rd Year', 'strand' => $cg1stYr_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => '3rd Year', 'strand' => $cg1stYr_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=3rd Year&strand=<?php echo $cg1stYr_row['strand']; ?>&major=<?php echo $cg1stYr_row['major']; ?>&sex=Male"><?php echo $cg1stYr_row['strand'].' '.$cg1stYr_row['major']; ?> <small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=3rd Year&strand=<?php echo $cg1stYr_row['strand']; ?>&major=<?php echo $cg1stYr_row['major']; ?>&sex=Female"><?php echo $cg1stYr_row['strand'].' '.$cg1stYr_row['major']; ?> <small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <!-- 4th year college -->
                
                <div class="dropdown">
                  <button class="dropbtn">4th Year</button>
                  <div class="dropdown-content">
                  <?php
                  
                  $classG11_query = $conn->prepare('SELECT DISTINCT strand, major FROM classes WHERE gradeLevel = :gradeLevel AND schoolYear = :schoolYear ORDER BY strand ASC') or die(mysql_error());
                  $classG11_query->execute(['gradeLevel' => '4th Year', 'schoolYear' => $data_src_sy]);
                  while ($cg1stYr_row = $classG11_query->fetch()){
                  
                  $studMaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studMaleCtr_query->execute(['class_id' => 0, 'sex' => 'Male', 'gradeLevel' => '4th Year', 'strand' => $cg1stYr_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);
                  
                  $studFemaleCtr_query = $conn->prepare('SELECT reg_id FROM students WHERE class_id = :class_id AND sex = :sex AND gradeLevel = :gradeLevel AND strand = :strand AND schoolYear = :schoolYear AND status = :status');
                  $studFemaleCtr_query->execute(['class_id' => 0, 'sex' => 'Female', 'gradeLevel' => '4th Year', 'strand' => $cg1stYr_row['strand'], 'schoolYear' => $data_src_sy, 'status' => 'Enrolled']);

                  ?>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=4th Year&strand=<?php echo $cg1stYr_row['strand']; ?>&major=<?php echo $cg1stYr_row['major']; ?>&sex=Male"><?php echo $cg1stYr_row['strand'].' '.$cg1stYr_row['major']; ?> <small>Male 
                    <small> [ Total: <?php echo $studMaleCtr_query->rowCount(); ?> ]</small></small></a>
                    
                    <a href="list_class_assigning.php?dept=<?php echo $get_dept; ?>&gradeLevel=4th Year&strand=<?php echo $cg1stYr_row['strand']; ?>&major=<?php echo $cg1stYr_row['major']; ?>&sex=Female"><?php echo $cg1stYr_row['strand'].' '.$cg1stYr_row['major']; ?> <small>Female 
                    <small> [ Total: <?php echo $studFemaleCtr_query->rowCount(); ?> ]</small></small></a>
             
                  <?php } ?>
                  </div>
                </div>
                <?php } ?>
                
     
     
                 
                <h3 style="margin: 16px 16px 16px 16px;">
                <strong>
                <?php
 
                if($_GET['gradeLevel']===''){
                    echo "Select Class";
                }else{ 
                    
                    if($_GET['dept']=="Grade School" OR $_GET['dept']=="Junior High School")
                    {
                        echo $_GET['gradeLevel'];
                    }elseif($_GET['dept']=="Senior High School"){
                        echo $_GET['gradeLevel']." - ".$_GET['strand'];
                    }else{
                        echo $_GET['gradeLevel']." - ".$_GET['strand'].' '.$_GET['major'] ;
                    }
                    
                }
                
                
                ?>
                </strong>
                </h3>
                 
                
                <?php include('list_stud_section.php'); ?>
               
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
