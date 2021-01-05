<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  <?php
  $getReg_id=$_GET['reg_id'];
  
  $updRFIDTag_query = $conn->query("select * FROM students WHERE reg_id='$getReg_id'") or die(mysql_error());
  $urt_row=$updRFIDTag_query->fetch();
  
                        if($urt_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($urt_row['suffix']=='-') { $suffix=''; }else{ $suffix=$urt_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$urt_row['mname'];
                            
                        }
                        
  $classDetails_query = $conn->query("SELECT gradeLevel, strand, section, dept FROM classes WHERE class_id='$urt_row[class_id]'") or die(mysql_error());
  $cDetails_row = $classDetails_query->fetch();
  
  $getDept=$cDetails_row['dept'];
  $getGradelvl=$cDetails_row['gradeLevel'];
  $getStrand=$cDetails_row['strand'];
  $getSection=$cDetails_row['section'];
  
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
            <li class="breadcrumb-item"><a href="list_students.php?dept=<?php echo $getDept; ?>&class_id=<?php echo $urt_row['class_id']; ?>">List of Students - <?php if($getDept=="SHS"){ echo $getGradelvl.' - '.$getStrand.' - '.$getSection; }else{ echo $getGradelvl.' - '.$getSection; } ?></a></li>
            <li class="breadcrumb-item active">Update Student Image</li>
            
          </ul>
        </div>
      </div>
      
      
      
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
 
              <!-- JHS           -->
              
      
                   
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"> Update Student Image - <?php echo $urt_row['lname'].", ".$urt_row['fname']." ".$finalMName; ?></h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxJHS" aria-expanded="true" aria-controls="updates-boxJHS"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxJHS" role="tabpanel" class="collapse show">
                  <ul>
                    <!-- Item-->
                    <li class="d-flex justify-content-between"> 
                     
                    
                    
                            <form action="save_add_student.php?dept=<?php echo $getDept; ?>&class_id=<?php echo $urt_row['class_id']; ?>" method="POST" enctype="multipart/form-data">
                                
                            <input value="<?php echo $getReg_id; ?>" type="hidden" name="reg_id" />
                                
                              <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Student Image</label>
                              <div class="col-sm-10">
                              
                              
                              <div class="row">
                              
                                <div class="col-md-6">
                                <input class="form-control" type="file" name="file" id="imgInp" />
                                
                                <br />
                                <img width="100%" height="100%" class="img-fluid rounded" src="studentImg/<?php echo $urt_row['img']; ?>" alt="current image image" />
                                <small class="form-text pull-right">Current Image <i class="fa fa-arrow-up"></i> change to <i class="fa fa-arrow-right"></i></small>
                                </div>
                                
                                <div class="col-md-6">
                                <br /><br /><br />
                                <img width="100%" height="100%" class="img-fluid rounded" id="blah" src="#" alt="your image" />
                                <small class="form-text pull-right">Image preview <i class="fa fa-arrow-up"></i></small>
                                </div>
                                
                                 
                                
                              </div>
                              
                         
  
  
                                
                                
                              </div>
                            </div>
                            
                            <div class="modal-footer">
                          <a href="list_students.php?dept=<?php echo $getDept; ?>&class_id=<?php echo $urt_row['class_id']; ?>" style="color: white;"  class="btn btn-secondary">Cancel</a>
                          <button name="updateStudentImg" type="submit" class="btn btn-primary">Update Image</button>
                            </div>
                        
                            </form>
                    
                    
                    
                    
                     
                    </li>

                  </ul>
                </div>
              </div>
              <!-- JHS End-->
 
               
            </div>
            
          </div>
        </div>
         
                  
      </section>
      
      
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
    
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