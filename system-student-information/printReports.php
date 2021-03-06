<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
    <?php
    
    $mm= date("m"); //month
    $dd=date("d"); //day
    $yyyy=date("Y"); //years
    $day=date("l"); //Mon-Sun
    $hr=date("h"); //hours
    $min=date("i"); //minutes
    $ampm=substr( date("sa") , 2 ,2 ); //am | pm
    
    $currentDate=date('m'."/".'d'."/".'Y');
    
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
            <li class="breadcrumb-item active">Print Reports</li>
          </ul>
        </div>
      </div>
      
      
      
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
 
              <!-- JHS -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">PRINT REPORTS &nbsp;<small>( S.Y. <?php echo $data_src_sy; ?> )</small></h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxJHS" aria-expanded="true" aria-controls="updates-boxJHS"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxJHS" role="tabpanel" class="collapse show">
         
                 
            
                    <form action="checkPrintDetails.php" method="POST">
                            
                    <div class="row col-md-12">
                    
                        <div class="col-lg-3 col-md-12">
                            <div class="col-lg-12 col-md-12">
                                <label>Semester</label>
                                <select name="semester" class="form-control">
                                <option><?php echo $activeSemester; ?></option>
                                <option>1st Semester</option>
                                <option>2nd Semester</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-12">
                            <div class="col-lg-12 col-md-12">
                                <label>Report Type</label>
                                <select name="report_type" class="form-control">
                                <option>Class List</option>
                                <option>Grade Sheets</option>
                                <option>By Grade Level</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-12">
                            <div class="col-lg-12 col-md-12">
                                <label>Class</label>
                                <select name="class_id" class="form-control">
                                
                                <?php
                                $subjK_query = $conn->query("select * FROM classes WHERE schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                                while ($subjK_row = $subjK_query->fetch()) 
                                { ?>
                                
                                <option value="<?php echo $subjK_row['class_id']; ?>">
                                <?php
                                if($subjK_row['strand']==='N/A'){
                                    echo $subjK_row['gradeLevel']." - ".$subjK_row['section'];
                                }else{
                                    echo $subjK_row['gradeLevel']." - ".$subjK_row['strand']." - ".$subjK_row['section'];
                                } ?>
                                </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button name="checkPrintDetails" class="btn btn-primary" style="margin-right: 44px;">Print Preview</button>
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
    
     
  </body>
</html>