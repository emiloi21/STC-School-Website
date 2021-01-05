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
  
                
        function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
     
    if(get_client_ip()=="::1")
    {
      $machine_ip=gethostbyname(trim(`hostname`));  
    }else{
      $machine_ip=get_client_ip();
    }
 
    $conn->query("UPDATE client_computer SET RFID_tag='' WHERE flowAccess='One' AND ipAddress='$machine_ip'") or die(mysql_error());
    
    
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
            <li class="breadcrumb-item active">Update RFID Tag</li>
          </ul>
        </div>
      </div>
      
      
                
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
 
              <!-- JHS  -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">Update Student RFID Tag - <strong><?php echo $urt_row['lname'].", ".$urt_row['fname']." ".$finalMName; ?></strong>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxJHS" aria-expanded="true" aria-controls="updates-boxJHS"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxJHS" role="tabpanel" class="collapse show">
                
 
                <form action="save_add_student.php?dept=<?php echo $getDept; ?>&class_id=<?php echo $urt_row['class_id']; ?>" method="POST">
                       
                       
                       <input value="<?php echo $getReg_id; ?>" name="reg_id" type="hidden" />
                         
                        
                        <div class="modal-body">
                     
                     
                     
                     <div class="form-group row">
                     <label class="col-sm-2 form-control-label">Current RFID Tag</label>
                     <div class="col-sm-4">
                     <h3><?php echo $urt_row['RFTag_id']; ?></h3>
                     </div>
                     
                     
                     <label class="col-sm-2 form-control-label">Tapped RFID Tag</label>
                     <div class="col-sm-4">
                     <div id="screen2"></div>
                     <small class="form-text"> </small>
                     </div>
                     
                     </div>
  
                    
                        </div>
                        
                        <input name="currentRFIDTag" type="hidden" value="<?php echo $urt_row['RFTag_id']; ?>" />
                        
                        <div class="modal-footer">
                          <a href="list_students.php?dept=<?php echo $getDept; ?>&class_id=<?php echo $urt_row['class_id']; ?>" style="color: white;"  class="btn btn-secondary">Cancel</a>
                          <button name="updateStudentRFIDTag" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                    </form>
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
    $(document).ready(function(){
    setInterval(function(){
    $("#screen2").load('edit_student_tag.php')
                               
                         
    }, 250);
    });
    </script>  
  </body>
</html>   
 
                  
  