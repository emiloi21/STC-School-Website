<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
 
 


<?php include('loaderFX.php'); ?>
 
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
            <li class="breadcrumb-item"><a href="list_students.php?dept=All&gradeLevel=All&strand=All&section=All">Student List - All</a></li>
            <li class="breadcrumb-item active">Update Student Data Success</li>
          </ul>
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
 
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12 col-md-12">
            
            <form method="POST" action="promoteStudentSearch.php?reg_id=">
                <div class="form-group row">
                        <div class="col-sm-12">
                        <strong>Search New Student:</strong> <br />
                          <div class="input-group">
                          
                          <input name="student_id" placeholder="Search for Student's ID Code" class="form-control" required="true" list="search_list"/>
                          
                          
                          
                          <datalist id="search_list">
                                    <?php
                                    
                                    $fnameList_query = $conn->query("SELECT DISTINCT student_id, lname, fname, mname FROM students WHERE schoolYear='$data_src_sy'");
                                    while($fnlq_row = $fnameList_query->fetch()){ ?>
                                    
                                    <option value="<?php echo $fnlq_row['student_id']; ?>"><?php echo $fnlq_row['student_id']; ?> | <small><?php echo $fnlq_row['lname'].', '.$fnlq_row['fname'].' '.$fnlq_row['mname']; ?></small></option>
                                    
                                    <?php } ?>
                          </datalist>
                          
                            
                            <div class="input-group-append">
                              <button name="promoteStudentSearch" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                            </div>
                          </div>
                        </div>
                    </div>
                 </form>
       
            </div>
        </div>
        <hr />
          <div class="row">
            <div class="col-lg-8 col-md-8">
              

             <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                 
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">STUDENT SUCCESSFULLY UPDATED FOR SY <?php echo $activeSchoolYear; ?></a>
                  
                  </h2>
                <table class="pull-right">
                <tr>
                 
                <td><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a></td>
                </tr>
                </table>
                  
                </div>
                
                
                <div id="updates-boxContacts" role="tabpanel" class="collapse show">
  
                 
                
                <table class="table table-bordered" style="margin: 12px; width: 97%;">
                
                <thead>
                        <tr>
                        <th></th>
                        <th>Full Name<br /><small>Class Details</small></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                            <?php
                            
                
                                
                            $subjK_query = $conn->query("SELECT * FROM students WHERE student_id='$_GET[student_id]' AND schoolYear='$activeSchoolYear'") or die(mysql_error());
                            $subjK_row = $subjK_query->fetch();
                            
                            $classDetails_query = $conn->query("SELECT gradeLevel, strand, section, dept FROM classes WHERE class_id='$subjK_row[class_id]'") or die(mysql_error());
                            $cDetails_row = $classDetails_query->fetch();
                                
                        if($subjK_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($subjK_row['suffix']=='-') { $suffix=''; }else{ $suffix=$subjK_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$subjK_row['mname'];
                        } ?>
           
                        <tr>
                        <td style="width: 100px;"><img src="studentImg/<?php echo $subjK_row['img']; ?>" width="200" height="200" class="img-fluid rounded" /></td>
                        
                        <td style="font-size: medium;">
                        <?php echo $subjK_row['lname'].", ".$subjK_row['fname']." ".$finalMName; ?><br />
                        <small><?php 
                          if($cDetails_row['dept']=="SHS")
                          {
                            echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']." - ".$cDetails_row['section'];
                          }else{
                            echo $cDetails_row['gradeLevel']." - ".$cDetails_row['section'];
                          } 
                          ?> </small>
                        </td>
                        
                        </tr>
    
                      
                      </tbody>
                    </table>
         
               
               </div>
                   
                </div>
                
              </div>
              <!-- kinder End-->
              
              
              
              
              
              
              
              <div class="col-lg-4 col-md-4">
              

             <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                 
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts2" aria-expanded="true" aria-controls="updates-boxContacts2">ENROLMENT HISTORY</a>
                  
                  </h2>
                <table class="pull-right">
                <tr>
                 
                <td><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts2" aria-expanded="true" aria-controls="updates-boxContacts2"><i class="fa fa-angle-down"></i></a></td>
                </tr>
                </table>
                  
                </div>
                
                
                <div id="updates-boxContacts2" role="tabpanel" class="collapse show">
  
                 
                
                <table class="table table-bordered" style="margin: 12px; width: 95%;">
 
                      
                      <tbody>
                      
                            <?php
                            
                            $subjK_query = $conn->query("SELECT * FROM students WHERE student_id='$_GET[student_id]' ORDER BY reg_id DESC") or die(mysql_error());
                            while($subjK_row = $subjK_query->fetch()){
                            
                            $classDetails_query = $conn->query("SELECT gradeLevel, strand, section, dept FROM classes WHERE class_id='$subjK_row[class_id]'") or die(mysql_error());
                            $cDetails_row = $classDetails_query->fetch();
                            
                            ?>
           
                        <tr>
                        <td style="font-size: medium;">
                          <small><?php 
                          if($cDetails_row['dept']=="SHS")
                          {
                            echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']." - ".$cDetails_row['section'].'<br />(S.Y. '.$subjK_row['schoolYear'].')';
                          }else{
                            echo $cDetails_row['gradeLevel']." - ".$cDetails_row['section'].'<br />(S.Y. '.$subjK_row['schoolYear'].')';
                          } 
                          ?>
                          </small>
                        </td>
                        </tr>
                        
                        <?php } ?>
                      
                      </tbody>
                    </table>
         
               
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
