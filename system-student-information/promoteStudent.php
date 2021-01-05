<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
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
            <li class="breadcrumb-item active">Update Student Data</li>
          </ul>
        </div>
      </div>
      
      
      
      
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
            <div class="col-lg-12 col-md-12">
            
            <?php
            $subjK_query = $conn->query("SELECT * FROM students WHERE reg_id='$_GET[reg_id]' AND schoolYear='$data_src_sy'") or die(mysql_error());
            $subjK_row = $subjK_query->fetch();
            
            $classDetails_query = $conn->query("SELECT gradeLevel, strand, section, dept FROM classes WHERE class_id='$subjK_row[class_id]'") or die(mysql_error());
            $cDetails_row = $classDetails_query->fetch();
            
            
            if($subjK_row['mname']=='')
            {
            $finalMName='';
                            
            }else{
                            
            if($subjK_row['suffix']=='-') { $suffix=''; }else{ $suffix=$subjK_row['suffix'].' '; }
                            
            $finalMName=$suffix.$subjK_row['mname'];
                            
            }
            ?>
                      
            <div class="row">
 
             
            <!-- OLD STUDENT DETAILS (LAST SCHOOL YEAR) --><!-- OLD STUDENT DETAILS (LAST SCHOOL YEAR)-->
            <div class="col-lg-6">
              <!-- User Actibity-->
              <div class="card user-activity">
                 
                <h2 class="display h4" style="margin: 12px 0px 0px 12px;">STUDENT DETAILS ( <strong>Data Source: S.Y. <?php echo $data_src_sy; ?></strong> ) </h2>
                
                <hr />
                
                <table style="width: 95%; padding-left: 8px;">
                <tr>
                <td style="width: 50%;">
                <p style="padding-left: 8px;">
                <?php echo $subjK_row['student_id']; ?>
                <br /><small>Student ID</small>
                </p>
                </td>
                <td style="width: 50%;">
                <p style="padding-left: 8px;">
                <?php echo $subjK_row['RFTag_id']; ?>
                <br /><small>RFID Tag</small>
                </p>
                </td>
                </tr>
                </table>
                
                <p style="padding-left: 8px;">
                <?php echo $subjK_row['lname'].", ".$subjK_row['fname']." ".$finalMName; ?>
                <br /><small>Fullname</small>
                </p>
                
                
                <table style="width: 95%; padding-left: 8px;">
                <tr>
                <td style="width: 50%;">
                <p style="padding-left: 8px;">
                <?php echo $subjK_row['bdMM'].'/'.$subjK_row['bdDD'].'/'.$subjK_row['bdYYYY']; ?>
                <br /><small>Birthdate</small>
                </p>
                </td>
                <td style="width: 50%;">
                <p style="padding-left: 8px;">
                <?php echo $subjK_row['gender']; ?>
                <br /><small>Gender</small>
                </p>
                </td>
                </tr>
                </table>
     
                <p style="padding-left: 8px;">
                <?php echo $subjK_row['mobileNumber']; ?>
                <br /><small>Mobile Number</small>
                </p>
                
                <p style="padding-left: 8px;">
                <?php echo $subjK_row['address']; ?>
                <br /><small>Complete Address</small>
                </p>
                
                <p style="padding-left: 8px;">
                <?php if($cDetails_row=="SHS"){ echo $cDetails_row['gradeLevel'].' - '.$cDetails_row['strand'].' - '.$cDetails_row['section']; }else{ echo $cDetails_row['gradeLevel'].' - '.$cDetails_row['section']; } ?>
                <br /><small>Course Details</small>
               
               </p>
                
               
                 
                
              </div>
            </div>
            <!-- END OLD STUDENT DETAILS (LAST SCHOOL YEAR) --><!-- END OLD STUDENT DETAILS (LAST SCHOOL YEAR)-->
            
            <!-- TO BE UPDATED STUDENT DETAILS (CURRENT SCHOOL YEAR)--><!-- TO BE UPDATED STUDENT DETAILS (CURRENT SCHOOL YEAR)-->
            
            <div class="col-lg-6">
              <!-- User Actibity-->
              <div class="card user-activity">
                 
                <h2 class="display h4" style="margin: 12px 0px 0px 12px;"><strong>UPDATE STUDENT for S.Y. <?php echo $activeSchoolYear; ?></strong> </h2>
                
                <hr />
                
                <form action="save_add_student.php?reg_id=<?php echo $_GET['reg_id']; ?>" method="POST">
                
                <table style="padding: 4px; margin: 4px; width: 100%;">
  
                
                <tr>
                <td>
                <div class="tab" style="margin-left: 8px; width:95%">
                  <a class="tablinks" onclick="openCity(event, 'London')">Promoted</a>
                  <a class="tablinks" onclick="openCity(event, 'Paris')">Retained</a>
                </div>
                </td>
                </tr>
                
                <tr>
                <td>
                
                <!-- PROMOTED -->
                     
                <div id="London" class="tabcontent">
                
                <table style="padding-left: 8px; width: 100%;">
                <tr>
                 
                <td>
                <input name="gradeLevel_promoted" value="<?php
                
                if($cDetails_row['gradeLevel']=="Nursery"){ echo $newGradeLevel="Kinder 1"; }
                if($cDetails_row['gradeLevel']=="Kinder 1"){ echo $newGradeLevel="Kinder 2"; }
                if($cDetails_row['gradeLevel']=="Kinder 2"){ echo $newGradeLevel="Grade 1"; }
                if($cDetails_row['gradeLevel']=="Grade 1"){ echo $newGradeLevel="Grade 2"; }
                if($cDetails_row['gradeLevel']=="Grade 2"){ echo $newGradeLevel="Grade 3"; }
                if($cDetails_row['gradeLevel']=="Grade 3"){ echo $newGradeLevel="Grade 4"; }
                if($cDetails_row['gradeLevel']=="Grade 4"){ echo $newGradeLevel="Grade 5"; }
                if($cDetails_row['gradeLevel']=="Grade 5"){ echo $newGradeLevel="Grade 6"; }
                if($cDetails_row['gradeLevel']=="Grade 6"){ echo $newGradeLevel="Grade 7"; }
                if($cDetails_row['gradeLevel']=="Grade 7"){ echo $newGradeLevel="Grade 8"; }
                if($cDetails_row['gradeLevel']=="Grade 8"){ echo $newGradeLevel="Grade 9"; }
                if($cDetails_row['gradeLevel']=="Grade 9"){ echo $newGradeLevel="Grade 10"; }
                if($cDetails_row['gradeLevel']=="Grade 10"){ echo $newGradeLevel="Grade 11"; }
                if($cDetails_row['gradeLevel']=="Grade 11"){ echo $newGradeLevel="Grade 12"; }
                
                
                ?>" class="form-control" style="margin: 8px; background-color: white; width:90%" readonly="" />
                <small style="margin: 8px; font-size: small;">Grade Level</small>
                </td>
                </tr>
                
                <?php if($newGradeLevel=="Grade 11" OR $newGradeLevel=="Grade 12"){ ?>
                <tr>
               
                <td>
                <select name="strand_promoted" class="form-control" style="margin: 8px; width:90%">
                <option><?php echo $cDetails_row['strand']; ?></option>
                <option>N/A</option>
                <option>ABM</option>
                <option>GAS</option>
                <option>HUMSS</option>
                <option>STEM</option>
                </select>
                <small style="margin: 8px; font-size: small;">Strand</small>
                </td>
                </tr>
                <?php } ?>
                
                <tr>
                 
                <td>
                <select name="section_promoted" class="form-control" style="margin: 8px; width:90%">
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='$newGradeLevel' AND schoolYear='$activeSchoolYear'  ORDER BY section ASC") or die(mysql_error());
                while ($section_row = $section_query->fetch())
                { ?>
                <option><?php echo $section_row['section']; ?></option>
                <?php } ?>
                </select>
                <small style="margin: 8px; font-size: small;">Section</small>
                </td>
                </tr>
                
                <tr>
                <td><button name="newSY_addStudent_promoted" class="btn btn-primary" style="margin: 8px;">Promote Learner</button></td>
                </tr>
                
                </table>
                </div>
                
                <!-- END PROMOTED -->
                
                <!-- RETAINED -->
                     
                <div id="Paris" class="tabcontent">
                
                <table style="padding-left: 8px; width: 100%;">
                <tr>
                 
                <td>
                <input name="gradeLevel_retained" value="<?php echo $cDetails_row['gradeLevel']; ?>" class="form-control" style="margin: 8px; background-color: white; width:90%" readonly="" />
                <small style="margin: 8px; font-size: small;">Grade Level</small>
                </td>
                </tr>
                
                <?php if($cDetails_row['dept']=="SHS"){ ?>
                <tr>
                <td> </td>
                <td>
                <select name="strand_retained" class="form-control" style="margin: 8px; width:90%">
                <option><?php echo $cDetails_row['strand']; ?></option>
                <option>N/A</option>
                <option>ABM</option>
                <option>GAS</option>
                <option>HUMSS</option>
                <option>STEM</option>
                </select>
                <small style="margin: 8px; font-size: small;">Strand</small>
                </td>
                </tr>
                <?php } ?>
                
                <tr>
              
                <td>
                <select name="section_retained" class="form-control" style="margin: 8px; width:90%">
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='$cDetails_row[gradeLevel]' AND schoolYear='$activeSchoolYear' ORDER BY section ASC") or die(mysql_error());
                while ($section_row = $section_query->fetch())
                { ?>
                <option><?php echo $section_row['section']; ?></option>
                <?php } ?>
                </select>
                <small style="margin: 8px; font-size: small;">Section</small>
                </td>
                </tr>
                
                <tr>
                <td><button name="newSY_addStudent_retained" class="btn btn-primary" style="margin: 8px;">Retain Learner</button></td>
                </tr>
                
                </table>
                </div>
                
                
                <!-- END RETAINED <button name="newSY_addStudent_retained" class="btn btn-primary pull-right">Retain Learner</button>-->
                
                </td>
                </tr>
                
                
                </table>
                </form>
                
              </div>
            </div>
            <!-- TO BE UPDATED STUDENT DETAILS (CURRENT SCHOOL YEAR)--><!-- TO BE UPDATED STUDENT DETAILS (CURRENT SCHOOL YEAR)-->
            
            </div>
     
            </div>
            
          </div>
        </div>
              
      </section>
      
      
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>

     
    
  </body>
</html>