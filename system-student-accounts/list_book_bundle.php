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
            <li class="breadcrumb-item active">Book Inventory - List of Book Bundles - <?php echo $get_dept; ?></li>
             
          </ul>
          
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <br />
      
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
          
            <div class="col-lg-12" style="margin-bottom: 12px;">
            <div class="card user-activity">
            <h5 style="padding: 12px;">IMPORT/EXPORT BOOK BUNDLES</h5>
            
            <form method="POST" action="csvFile_functions.php" enctype="multipart/form-data" style="padding: 12px;">
            
            <table>
            <tr>
            <td style="background-color: white; border: none;">
            <input type="file" name="file" id="file" class="input-large" required="" />
            </td>
         
            </tr>
            
            <tr>
            <td style="background-color: white;  border: none;">
            <a href="csv_template/import_book_bundle_template.csv" class="btn btn-primary" style="color: white;" download><i class="fa fa-download"></i> Download CSV Template</a>
            <button name="import" class="btn btn-primary" style="color: white;"><i class="fa fa-upload"></i> Upload CSV Template</button>
            </td>
            </tr>
            </table>
            
            </form>
            
            </div>
            </div>
            
         </div>
        </div>
      </section>
            
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
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">LIST OF BOOK BUNDLES <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
              
              <div style="margin-top: 12px;"></div>
              
              
                <div class="tab" style="margin-top: 8px;">
              
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_book_bundle.php?dept=Grade School&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">Grade School</a>
                <?php }else{?>
                <a title="Grade School student list" href="list_book_bundle.php?dept=Grade School&gradeLevel=&strand=&major=&section=" class="tablinks">Grade School</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Junior High School"){ ?>
                <a title="Junior High School student list" href="list_book_bundle.php?dept=Junior High School&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">JHS</a>
                <?php }else{?>
                <a title="Junior High School student list" href="list_book_bundle.php?dept=Junior High School&gradeLevel=&strand=&major=&section=" class="tablinks">JHS</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Senior High School"){ ?>
                <a title="Senior High School student list" href="list_book_bundle.php?dept=Senior High School&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">SHS</a>
                <?php }else{?>
                <a title="Senior High School student list" href="list_book_bundle.php?dept=Senior High School&gradeLevel=&strand=&major=&section=" class="tablinks">SHS</a>
                <?php } ?>
           
                <?php if($_GET['dept']=="College"){ ?>
                <a title="College student list" href="list_book_bundle.php?dept=College&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">College</a>
                <?php }else{?>
                <a title="College student list" href="list_book_bundle.php?dept=College&gradeLevel=&strand=&major=&section=" class="tablinks">College</a>
                <?php } ?>
                
                </div>
                
                
                <?php if($_GET['dept']==='Grade School'){ ?>
                <div class="dropdown">
                  
                  <button class="dropbtn">Nursery</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classKN_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Nursery' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ckn_row = $classKN_query->fetch()) {
                    
                  ?>
                  
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $ckn_row['gradeLevel']; ?>&strand=<?php echo $ckn_row['strand']; ?>&major=<?php echo $ckn_row['major']; ?>&section=<?php echo $ckn_row['section']; ?>"><small><?php echo $ckn_row['section']; ?></small></a>

                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Preparatory</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classK1_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Preparatory' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ck1_row = $classK1_query->fetch()) {
                    
                  ?>
                  
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $ck1_row['gradeLevel']; ?>&strand=<?php echo $ck1_row['strand']; ?>&major=<?php echo $ck1_row['major']; ?>&section=<?php echo $ck1_row['section']; ?>"><small><?php echo $ck1_row['section']; ?></small></a>

             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Kinder</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classK2_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Kinder' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($ck2_row = $classK2_query->fetch()) {
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $ck2_row['gradeLevel']; ?>&strand=<?php echo $ck2_row['strand']; ?>&major=<?php echo $ck2_row['major']; ?>&section=<?php echo $ck2_row['section']; ?>"><small><?php echo $ck2_row['section']; ?></small></a>
   
             
                  <?php } ?>
                  </div>
                </div>
 
                <div class="dropdown">
                  <button class="dropbtn">Grade 1</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG1_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 1' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg1_row = $classG1_query->fetch()) {
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg1_row['gradeLevel']; ?>&strand=<?php echo $cg1_row['strand']; ?>&major=<?php echo $cg1_row['major']; ?>&section=<?php echo $cg1_row['section']; ?>"><small><?php echo $cg1_row['section']; ?></small></a>
    
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 2</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG2_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 2' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                  while ($cg2_row = $classG2_query->fetch()) {
                    
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg2_row['gradeLevel']; ?>&strand=<?php echo $cg2_row['strand']; ?>&major=<?php echo $cg2_row['major']; ?>&section=<?php echo $cg2_row['section']; ?>"><small><?php echo $cg2_row['section']; ?></small></a>
     
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 3</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG3_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 3' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg3_row = $classG3_query->fetch()) {
                    
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg3_row['gradeLevel']; ?>&strand=<?php echo $cg3_row['strand']; ?>&major=<?php echo $cg3_row['major']; ?>&section=<?php echo $cg3_row['section']; ?>"><small><?php echo $cg3_row['section']; ?></small></a>
     
               
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 4</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG4_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 4' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg4_row = $classG4_query->fetch()) {
                    
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg4_row['gradeLevel']; ?>&strand=<?php echo $cg4_row['strand']; ?>&major=<?php echo $cg4_row['major']; ?>&section=<?php echo $cg4_row['section']; ?>"><small><?php echo $cg4_row['section']; ?></small></a>
     
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 5</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG5_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 5' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg5_row = $classG5_query->fetch()) {
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg5_row['gradeLevel']; ?>&strand=<?php echo $cg5_row['strand']; ?>&major=<?php echo $cg5_row['major']; ?>&section=<?php echo $cg5_row['section']; ?>"><small><?php echo $cg5_row['section']; ?></small></a>
     
             
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 6</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG6_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 6' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg6_row = $classG6_query->fetch()){
                    
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg6_row['gradeLevel']; ?>&strand=<?php echo $cg6_row['strand']; ?>&major=<?php echo $cg6_row['major']; ?>&section=<?php echo $cg6_row['section']; ?>"><small><?php echo $cg6_row['section']; ?></small></a>
     
              
             
                  <?php } ?>
                  </div>
                </div>
                <?php } ?>
                
                
                <?php if($_GET['dept']==='Junior High School'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 7</button>
                  
                  <div class="dropdown-content">
 
                  <?php
                  $classG7_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 7' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg7_row = $classG7_query->fetch()){
                    
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg7_row['gradeLevel']; ?>&strand=<?php echo $cg7_row['strand']; ?>&major=<?php echo $cg7_row['major']; ?>&section=<?php echo $cg7_row['section']; ?>"><small><?php echo $cg7_row['section']; ?></small></a>
     
              
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 8</button>
                  
                  <div class="dropdown-content">
               
                  <?php
                  $classG8_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 8' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg8_row = $classG8_query->fetch()) {
                    
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg8_row['gradeLevel']; ?>&strand=<?php echo $cg8_row['strand']; ?>&major=<?php echo $cg8_row['major']; ?>&section=<?php echo $cg8_row['section']; ?>"><small><?php echo $cg8_row['section']; ?></small></a>
     
              
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 9</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG9_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 9' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg9_row = $classG9_query->fetch()) {
                    
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg9_row['gradeLevel']; ?>&strand=<?php echo $cg9_row['strand']; ?>&major=<?php echo $cg9_row['major']; ?>&section=<?php echo $cg9_row['section']; ?>"><small><?php echo $cg9_row['section']; ?></small></a>
     
             
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 10</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG10_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 10' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg10_row = $classG10_query->fetch()) {

                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg10_row['gradeLevel']; ?>&strand=<?php echo $cg10_row['strand']; ?>&major=<?php echo $cg10_row['major']; ?>&section=<?php echo $cg10_row['section']; ?>"><small><?php echo $cg10_row['section']; ?></small></a>
     
             
             
                  <?php } ?>
                  </div>
                </div>
                <?php } ?>
                
                
                <?php if($_GET['dept']==='Senior High School'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">Grade 11</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG11_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 11' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg11_row = $classG11_query->fetch()) {
   
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg11_row['gradeLevel']; ?>&strand=<?php echo $cg11_row['strand']; ?>&major=<?php echo $cg11_row['major']; ?>&section=<?php echo $cg11_row['section']; ?>"><small><?php echo $cg11_row['section']; ?></small></a>
     
             
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">Grade 12</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $classG12_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='Grade 12' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                  while ($cg12_row = $classG12_query->fetch()) {
                
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $cg12_row['gradeLevel']; ?>&strand=<?php echo $cg12_row['strand']; ?>&major=<?php echo $cg12_row['major']; ?>&section=<?php echo $cg12_row['section']; ?>"><small><?php echo $cg12_row['section']; ?></small></a>
     
              
                  <?php } ?>
                  </div>
                </div>
 
                <?php } ?>
                
                
                <?php if($_GET['dept']==='College'){ ?>
                <div class="dropdown">
                  <button class="dropbtn">1st Year</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class1stYr_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='1st Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c1stYr_row = $class1stYr_query->fetch()) {
                
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $c1stYr_row['gradeLevel']; ?>&strand=<?php echo $c1stYr_row['strand']; ?>&major=<?php echo $c1stYr_row['major']; ?>&section=<?php echo $c1stYr_row['section']; ?>"><small><?php echo $c1stYr_row['section']; ?></small></a>
     
             
             
                  <?php } ?>
                  </div>
                </div>
                
                <div class="dropdown">
                  <button class="dropbtn">2nd Year</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class2ndYr_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='2nd Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c2ndYr_row = $class2ndYr_query->fetch()) {
                
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $c2ndYr_row['gradeLevel']; ?>&strand=<?php echo $c2ndYr_row['strand']; ?>&major=<?php echo $c2ndYr_row['major']; ?>&section=<?php echo $c2ndYr_row['section']; ?>"><small><?php echo $c2ndYr_row['section']; ?></small></a>
     
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">3rd Year</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class3rdYr_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='3rd Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c3rdYr_row = $class3rdYr_query->fetch()) {
                 
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $c3rdYr_row['gradeLevel']; ?>&strand=<?php echo $c3rdYr_row['strand']; ?>&major=<?php echo $c3rdYr_row['major']; ?>&section=<?php echo $c3rdYr_row['section']; ?>"><small><?php echo $c3rdYr_row['section']; ?></small></a>
     
             
             
                  <?php } ?>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  <button class="dropbtn">4th Year</button>
                  
                  <div class="dropdown-content">
                  <?php
                  $class4thYr_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, section FROM tbl_book_booklist WHERE gradeLevel='4th Year' AND schoolYear='$data_src_sy' ORDER BY strand, major, section ASC") or die(mysql_error());
                  while ($c4thYr_row = $class4thYr_query->fetch()) {
      
                  ?>
                  <a href="list_book_bundle.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $c4thYr_row['gradeLevel']; ?>&strand=<?php echo $c4thYr_row['strand']; ?>&major=<?php echo $c4thYr_row['major']; ?>&section=<?php echo $c4thYr_row['section']; ?>"><small><?php echo $c4thYr_row['section']; ?></small></a>
     
             
             
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
                        <th></th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Total Amount</th>
                        <th>Type</th>
                        <th></th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
               
                      $book_query = $conn->query("SELECT * FROM tbl_book_booklist WHERE gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]' AND major='$_GET[major]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                      while ($book_row = $book_query->fetch()) 
                      {
                        $catCtr+=1;
                        $book_id=$book_row['book_id'];
                        ?>
           
                        <tr>
                        
                        <td><?php echo $catCtr; ?></td>
                        
                        <td><?php echo $book_row['title']; ?></td>
                        
                        <td><?php echo $book_row['description']; ?></td>
                        
                        <td><?php echo $book_row['book_amt']; ?></td>
                        
                        <td><?php echo $book_row['type']; ?></td>
                        
                        <td>
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                         
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_book<?php echo $book_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_book<?php echo $book_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php }else{ ?>
                         
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_book<?php echo $book_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                           
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php } ?>
                        </td>
                        </tr>


                  <!-- edit category Modal -->
                  <div id="edit_book<?php echo $book_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_books.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>" method="POST">
                      
                      <input value="<?php echo $book_row['book_id']; ?>" name="book_id" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Book</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Title</label>
                              <div class="col-sm-9">
                                <input value="<?php echo $book_row['description']; ?>" name="description" type="text" class="form-control" placeholder="Enter category title..." />
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateBook" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit category Modal -->
                  
                  
                        <!-- delete student Modal -->
                          <div id="delete_book<?php echo $book_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_books.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>" method="POST">
                      
                              <input value="<?php echo $book_row['book_id']; ?>" name="book_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Book</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>Are you sure you want to delete book <?php echo $book_row['title']; ?>?</h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteBook" type="submit" class="btn btn-danger">Yes</button>
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
