<!DOCTYPE html>
<html>
  <?php
  
  include('session.php');
  
  include('csvFile_functions.php');
  
  include('header.php');
  
  
  
  ?>
 
    
    
  <body>
  
  <?php include('menu_sidebar.php'); ?>
  

    <div class="page">
    
    <?php
    
    include('navbar_header.php');
    
    //include('quick_count.php');
 
    ?>
 
    
  
        
            
        <section class="statistics" style="margin-top: 18px;">
         <div class="container-fluid">
          <div class="row d-flex">
            
            <div class="col-lg-12" style="margin-bottom: 12px;">
            <div class="card user-activity">
            <h5>IMPORT/EXPORT OLD STUDENT</h5>
            
            <form method="POST" action="csvFile_functions.php" enctype="multipart/form-data">
            
            <table>
            <tr>
            <td style="background-color: white; border: none;">
            <input type="file" name="file" id="file" class="input-large" required="" />
            </td>
         
            </tr>
            
            <tr>
            <td style="background-color: white;  border: none;">
            <a href="csv_template/import_student_template2.csv" class="btn btn-primary" style="color: white;" download><i class="fa fa-download"></i> Download CSV Template</a>
            <button name="import" class="btn btn-primary" style="color: white;"><i class="fa fa-upload"></i> Upload CSV Template</button>
            </td>
            </tr>
            </table>
            
            </form>
            </div>
            </div>
            
            <div class="col-lg-3">
              <!-- User Actibity-->
              <div class="card user-activity">
              <h2 class="display h4"> 
              
              <a title="Go to Grade School classes..." href="list_students.php?dept=Grade School&class_id=" style="text-decoration-line: none;">Grade School &raquo;</a></h2>
 
                <div class="number"><?php echo $elemTotal; ?></div>
                <h3 class="h4 display">Total</h3>
                
                <div class="page-statistics d-flex justify-content-between">
                  <div class="page-statistics-left"><span>Male</span><strong><?php echo $elemMaleCtr; ?></strong></div>
                  <div class="page-statistics-right"><span>Female</span><strong><?php echo $elemFemaleCtr; ?></strong></div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3">
              <!-- User Actibity-->
              <div class="card user-activity">
              <h2 class="display h4">
              <a title="Go to JHS classes..." href="list_students.php?dept=Junior High School&class_id=" style="text-decoration-line: none;">Junior High &raquo;</a></h2>
                
                <div class="number"><?php echo $jhsTotal; ?></div>
                <h3 class="h4 display">Total</h3>
                
                <div class="page-statistics d-flex justify-content-between">
                  <div class="page-statistics-left"><span>Male</span><strong><?php echo $jhsMaleCtr; ?></strong></div>
                  <div class="page-statistics-right"><span>Female</span><strong><?php echo $jhsFemaleCtr; ?></strong></div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3">
              <!-- User Actibity-->
              <div class="card user-activity">
              <h2 class="display h4">
              <a title="Go to SHS classes..." href="list_students.php?dept=Senior High School&class_id=" style="text-decoration-line: none;">Senior High &raquo;</a></h2>
               
                <div class="number"><?php echo $shsTotal; ?></div>
                <h3 class="h4 display">Total</h3>
                
                <div class="page-statistics d-flex justify-content-between">
                  <div class="page-statistics-left"><span>Male</span><strong><?php echo $shsMaleCtr; ?></strong></div>
                  <div class="page-statistics-right"><span>Female</span><strong><?php echo $shsFemaleCtr; ?></strong></div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3">
              <!-- User Actibity-->
              <div class="card user-activity">
              <h2 class="display h4"> 
              <a title="Go to College classes..." href="list_students.php?dept=College&class_id=" style="text-decoration-line: none;">College &raquo;</a></h2>
 
                <div class="number"><?php echo $colTotal; ?></div>
                <h3 class="h4 display">Total</h3>
                
                <div class="page-statistics d-flex justify-content-between">
                  <div class="page-statistics-left"><span>Male</span><strong><?php echo $colMaleCtr; ?></strong></div>
                  <div class="page-statistics-right"><span>Female</span><strong><?php echo $colFemaleCtr; ?></strong></div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </section>


      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
 

<?php

$classData_query=null;
$CD_row=null;

$act_ST_query=null;
$actST_row=null;
                      
$class_query=null;
$class_row=null;
                      
$homeShift_query=null;
$homeShift_row=null;
                      
?>
    
  </body>
</html>