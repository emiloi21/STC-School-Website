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
            <li class="breadcrumb-item"><a href="list_students.php">List of Students</a></li>
            
            <li class="breadcrumb-item active"> </li>
            
            <li class="breadcrumb-item active">Enrol Student - Update Existing Student</li>
          </ul>
        </div>
      </div>
      
      
      
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
              
              <!-- kinder 1 -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><strong style="font-weight: bold !important;">ENROL STUDENT - UPDATE EXISTING STUDENT</strong></a>

                  </h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxKinder" role="tabpanel" class="collapse show" style="padding: 14px;">
                
                <?php
                
                $studInfo_query = $conn->query("SELECT * FROM students WHERE student_id='$_GET[student_id]' AND schoolYear='$activeSchoolYear'") or die(mysql_error());
                $studInfo_row=$studInfo_query->fetch();
                
                ?>
                <form action="save_add_student.php" method="POST">
                
                <div class="row">
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <input value="<?php echo $activeSchoolYear; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>School Year</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <input value="<?php echo $activeSemester; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Semester</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="form-group">
                            <input value="<?php echo $studInfo_row['lrn']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>LRN</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="form-group">
                            <input name="student_id" value="<?php echo $studInfo_row['student_id']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>ID Code</small>
                        </div>
                      </div>
                      
                </div>
                
                <div class="line"></div>
                
                <div class="row">
                    <div class="col-sm-12">
                    <hr />
                    <h5>PERSONAL INFORMATION</h5>
                    </div>
                </div>
                
                <div class="row">
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $studInfo_row['fname']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>First Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $studInfo_row['mname']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Middle Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $studInfo_row['lname']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Last Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-1">
                        <div class="form-group">
                            <input value="<?php echo $studInfo_row['suffix']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Suffix</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <input value="<?php echo $studInfo_row['gender']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Sex</small>
                        </div>
                      </div>
                      
                </div>
                 
                <div class="line"></div>
                
                <div class="row">
                    <div class="col-sm-12">
                    <hr />
                    <h5>COURSE INFORMATION</h5>
                    </div>
                </div>
                
                <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                            <input value="<?php echo $studInfo_row['gradeLevel']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Grade Level</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <input value="<?php echo $studInfo_row['strand']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Strand</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-6">
                        <div class="form-group">
                            <input value="<?php echo $studInfo_row['section']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Section</small>
                        </div>
                      </div>
                      
                </div>
                
                <div class="row">
                
                                  <?php if($_GET['dept']!='SHS'){ ?>
                                  
                                  <div class="col-md-6">
                                    <input value="<?php echo $studInfo_row['subsidy_type']; ?>" type="text" class="form-control form-control-sm" readonly="true" />
                                    <small class="form-text">Beneficiary Type</small>
                                  </div>
                                  <input value="N/A" type="hidden" name="esc_ovap_id"/>
                                  <?php }else{ ?>
                                  
                                  <div class="col-md-4">
                                    <input value="<?php echo $studInfo_row['subsidy_type']; ?>" type="text" class="form-control form-control-sm" readonly="true" />
                                    <small class="form-text">Beneficiary Type</small>
                                  </div>
                                  <div class="col-md-4">
                                  <?php if($studInfo_row['subsidy_type']==='Private ESC Completer'){ ?>
                                  <input type="text" name="esc_ovap_id" class="form-control form-control-sm" required="" />
                                  <small>ESC ID Required</small>
                                  <?php }elseif($studInfo_row['subsidy_type']==='Private Non-ESC Completer' OR $studInfo_row['subsidy_type']==='ALS/PEPT Qualifier'){ ?>
                                  <input type="text" name="esc_ovap_id" class="form-control form-control-sm" required="" />
                                  <small>QVR Certificate Code Required</small>
                                  <?php }else{ ?>
                                  <input value="N/A" type="text" name="esc_ovap_id" class="form-control form-control-sm" readonly="true"/>
                                  <?php } ?>
                                  </div>
                                  
                                  <?php } ?>
                                  
                                  <?php if($_GET['dept']!='SHS'){ ?>
                                  <div class="col-md-6">
                                  <?php }else{ ?>
                                  <div class="col-md-4">
                                  <?php } ?>
                                    <select name="assessment_id" class="form-control form-control-sm">
                                    <option>--Select Assessment Group--</option>
                                    <?php
                                    $tbl_accounts_assessments_query = $conn->query("SELECT assessment_id, description FROM tbl_accounts_assessments WHERE gradeLevel='$studInfo_row[gradeLevel]' AND strand='$studInfo_row[strand]' AND schoolYear='$activeSchoolYear' ORDER BY description ASC") or die(mysql_error());
                                    while ($tbl_accounts_assessments_row = $tbl_accounts_assessments_query->fetch()) 
                                    { ?>
                                    <option value="<?php echo $tbl_accounts_assessments_row['assessment_id']; ?>"><?php echo $tbl_accounts_assessments_row['description']; ?></option>
                                    <?php } ?>
                                    </select>
                                    <small class="form-text">Assessment Group</small>
                                  </div>
                                  
                                  
                <div class="col-md-12">
                <hr />        
                </div>
                
                
                <div class="line"></div>
                
                <div class="form-group col-sm-12">
                <div class="pull-right">
                      <a href="#" class="btn btn-secondary" style="margin-right: 8px; color: white;">Cancel</a>
                      <button name="oldStudent_addAccPayable" type="submit" class="btn btn-primary">Save</button>
                </div>
                </div>
                    
                </form>
                
 

                </div>
              </div>
              <!-- kinder End-->
              
              
              
            </div>
            
          </div>
        </div>
              
      </section>
      
      
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
  </body>
</html>