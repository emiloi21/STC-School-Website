<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
  <body>
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      <?php
      
        $studData_query = $conn->prepare('SELECT * FROM students WHERE v_code = :v_code');
        $studData_query->execute(['v_code' => $_GET['reg_code']]);
        $studData_row = $studData_query->fetch();
        
      ?>
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">ENROLLMENT</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" style="color: #075907;">Registration</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <div id="content">
        <div class="container">
          <div class="row">
            <div id="checkout" class="col-lg-12">
              <div class="box border-bottom-0">
              
              <div class="content">
                <div class="row">
                    
                    <div class="col-sm-6" style="margin-bottom: 18px;">
                    <h4 style="margin-bottom: 0px;">ACCOUNT SETTINGS &amp; REQUIREMENTS</h4>
                    <small>Please fill-up the form correctly</small>
                    </div>
                    
                    <div class="col-sm-6" style="margin-bottom: 18px;">
                    <h4 style="margin-bottom: 0px;">REGISTRATION CODE: <strong style="font-size: larger; background-color: #e5eb0b; padding: 0px 4px 0px 4px; border: solid 1px #097609;"><?php echo $studData_row['v_code']; ?></strong></h4>
                    <small>Take note of this 10-character code to review your profile</small>
                    </div>
                    
                    <?php if($studData_row['dept']==='College'){ ?>
                    
                    <div class="col-sm-6">
                    <strong>Applied Course:</strong> <?php echo $studData_row['gradeLevel']; ?>
                    </div>
                    
                    <div class="col-sm-6">
                    <strong>Classification:</strong> <?php echo $studData_row['classification']; ?>
                    </div>
                    
                    <?php }else{ ?>
                    
                    <div class="col-sm-4">
                    <strong>LRN:</strong> <?php echo $studData_row['lrn']; ?>
                    </div>
                    
                    <div class="col-sm-4">
                    <strong>Applied Grade Level:</strong> <?php echo $studData_row['gradeLevel']; ?>
                    </div>
                    
                    <div class="col-sm-4">
                    <strong>Classification:</strong> <?php echo $studData_row['classification']; ?>
                    </div>
                    
                    <?php } ?>
                    
                </div>
              </div>
              <hr />
              
                  <ul class="nav nav-pills nav-fill">
                    <li class="nav-item"><a href="registration-step-one.php?reg_code=<?php echo $_GET['reg_code']; ?>" class="nav-link"> <i class="fa fa-user"></i><br />Personal Information</a></li>
                    <li class="nav-item"><a href="registration-step-two.php?reg_code=<?php echo $_GET['reg_code']; ?>" class="nav-link"><i class="fa fa-book"></i><br />Scholastic Records</a></li>
                    <li class="nav-item"><a href="registration-step-three.php?reg_code=<?php echo $_GET['reg_code']; ?>" class="nav-link"><i class="fa fa-users"></i><br />Parents/Guardian Information</a></li>
                    <li class="nav-item"><a href="#" class="nav-link active"><i class="fa fa-lock"></i><br />User Account Settings/Requirements</a></li>
                  </ul>
                  
                  <div class="content">
                  
                  
                  
                    <?php
                    $reqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='$studData_row[dept]' AND gradeLevel='$studData_row[gradeLevel]' AND strand='$studData_row[strand]' AND major='$studData_row[major]' AND classification='$studData_row[classification]' AND purpose='for Admission'");
                    
                    if($reqs_query->rowCount()>0){
                        
                    ?>
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <h5>REQUIREMENTS</h5>
                        <div class="row">
                          <div class="col-md-12" style="margin-bottom: 12px;">
                             <div class="table-responsive">
                             <table class="table">
                              <thead>
                              <th>Requirements</th>
                              <th>Uploaded File</th>
                              <th>Remarks</th>
                              <th>Status</th>
                              <th>Action</th>
                              </thead>
                              
                              <tbody>
                              <?php
                              
                              while($reqs_row=$reqs_query->fetch()){
                              
                              $reqStud_query = $conn->query("SELECT * FROM tbl_reqs_students WHERE require_id='$reqs_row[require_id]' AND reg_id='$studData_row[reg_id]'");
                              $reqStud_row=$reqStud_query->fetch();
                                
                              ?>
                              
                              <tr <?php if($reqStud_row['status']==='Disapproved'){ ?>style="color: #dc3545;"<?php }elseif($reqStud_row['status']==='Approved'){ ?>style="color: #28a745;"<?php } ?>>
        
                              <td style="width: 25%;"><?php echo $reqs_row['requirement_name']; ?><br />
                              <small><?php echo $reqs_row['description']; ?></small>
                              </td>
                              
                              <td style="text-align: center;">
                              <?php
                              if($reqStud_query->rowCount()<=0){
                                echo "No uploaded file...";
                              }else{ ?>
                                <a data-toggle="modal" data-target="#uploadUpdateAF<?php echo $reqStud_row['stud_reqs_id']; ?>" title="Click to re-upload file..." style="cursor: pointer;">
                                <img src="user-student/<?php echo $reqStud_row['img']; ?>" style="width: 50%; height: 50%; display: block;" />
                                </a>
                              <?php } ?>
                              </td>
                              
                              
                              <td><?php echo $reqStud_row['student_remarks']; ?></td>
                              
                              <td>
                              <?php echo $reqStud_row['status'];
                               
                              if($reqStud_row['remarks']==='-' OR $reqStud_row['remarks']=''){ ?>
                                
                              <?php }else{ ?>
                                  <br />
                                  <small><?php echo $reqStud_row['remarks']; ?></small>
                              <?php } ?>
                              
                              </td>
                              
                              <td>
                              <?php
                              if($reqStud_query->rowCount()<=0){ ?>
                                <a data-toggle="modal" data-target="#uploadAdmissionFile<?php echo $reqs_row['require_id']; ?>" class="btn btn-primary btn-sm" title="Upload file..." href="#" style="margin-bottom: 4px; text-decoration-line: none;"><i class="fa fa-upload"></i> Upload File</a>
                              <?php }else{ ?>
                                <a data-toggle="modal" data-target="#uploadUpdateAF<?php echo $reqStud_row['stud_reqs_id']; ?>" class="btn btn-primary btn-sm" title="Upload file..." href="#" style="margin-bottom: 4px; text-decoration-line: none;"><i class="fa fa-upload"></i> Upload File</a>
                                <a class="btn btn-success btn-sm" title="Download file..." href="user-student/<?php echo $reqStud_row['img']; ?>" style="margin-bottom: 4px; text-decoration-line: none;" download><i class="fa fa-download"></i> Download File</a>
                              <?php } ?>
                              
                              
                              </td>
                              
                              </tr>
                              
                              <?php include('requirements_add_modal.php'); ?>
                              
                              
                              <?php } ?>
                                                
                              </tbody>
                              
                            </table>
                            </div>
                            <hr />
                          </div>
 
                        </div>
 
                      </div>
                    </div>

      <?php
                    }
                    
        $acctData_query = $conn->prepare('SELECT * FROM useraccount WHERE v_code = :v_code');
        $acctData_query->execute(['v_code' => $_GET['reg_code']]);
        $acctData_row = $acctData_query->fetch();
        if($acctData_query->rowCount()<=0){
            
      ?>
                    <form method="POST" action="save_userInfo_reg.php?reg_code=<?php echo $_GET['reg_code']; ?>">
                    
                    <?php if($studData_row['classification']==='Old'){ ?>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <h5>
                      SAVE PROFILE &amp; SUBMIT REGISTRATION<br />
                      <small>Click <strong>SAVE PROFILE &amp; SUBMIT REGISTRATION</strong> button then email will be sent if your application was validated together with your Login Credentials.</small>
                      </h5>
                      </div>
                    </div>
                    
                    <?php }else{ ?>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <h5>ACCOUNT SETTINGS</h5>
                        <div class="row">
                          <div class="col-md-12" style="margin-bottom: 12px;">
                             <input name="username" id="uname-login" type="text" class="form-control form-control-sm" placeholder="Enter username" required="" />
                             <small>Username</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;">
                             <input id="passwordz" type="password" name="password" class="form-control form-control-sm" placeholder="Enter password" required="" />
                             <small>Password</small>
                          </div>
                          
                          <div class="col-md-12">
                             <input id="confirm_passwordx" type="password" name="password2" class="form-control form-control-sm" placeholder="Retype password" required="" />
                             <small>Retype Password <span id="message"></span></small>
                          </div>
                        </div>
 
                      </div>
                    </div>
                    
                    <?php } ?>
                    
        <?php }else{ ?>
        
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <h5>
                      WAITING FOR VALIDATION<br />
                      <small>A verification link will be sent to your email <strong style="text-decoration-line: underline;"><?php echo $studData_row['email']; ?></strong> if your application was validated together with your Login Credentials.</small>
                      </h5>
                      </div>
                    </div>
                    
        <?php } ?>
        
                  </div>
                  
                  <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
                    <div class="left-col"><a href="registration-step-three.php?reg_code=<?php echo $_GET['reg_code']; ?>" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Parents/Guardian Information</a></div>
                    <?php
                
                    $fileCHK=0;
                          
                    $CHKreqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='$studData_row[dept]' AND gradeLevel='$studData_row[gradeLevel]' AND strand='$studData_row[strand]' AND major='$studData_row[major]' AND classification='$studData_row[classification]' AND purpose='for Admission'");
                    while($CHKreqs_row=$CHKreqs_query->fetch()){
                          
                    $CHKreqStud_query = $conn->query("SELECT * FROM tbl_reqs_students WHERE require_id='$CHKreqs_row[require_id]' AND reg_id='$studData_row[reg_id]'");
                    $CHKreqStud_row=$CHKreqStud_query->fetch();
                    if($CHKreqStud_query->rowCount()<=0){ $fileCHK+=1; }
                    
                    //if($CHKreqStud_row['status']==='Disapproved' OR $CHKreqStud_row['status']==='For Validation'){ $fileCHK+=1; }
                    
                          
                    }
                    
                    if($fileCHK>0){
                    
                    ?>
                    
                    <div class="right-col">
                      <a href="#" class="btn btn-secondary disabled"> Please upload all admission requirements</a>
                    </div>
                    
                    <?php
                    
                    }else{
                    
                    if($acctData_query->rowCount()<=0){ ?>
                    
                    <div class="right-col">
                      <button name="update_step_four" type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Save Profile &amp; Submit Registration</button>
                    </div>
                    
                    <?php } } ?>
 
                  </div>
                  
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
 
      <?php include('footer.php'); ?>
    </div>
    <?php include('js_files.php'); ?>
  </body>
</html>