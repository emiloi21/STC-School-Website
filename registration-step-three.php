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
                    <h4 style="margin-bottom: 0px;">PARENTS/GUARDIAN INFORMATION</h4>
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
              
                <form method="POST" action="save_userInfo_reg.php?reg_code=<?php echo $_GET['reg_code']; ?>">
                
                  <ul class="nav nav-pills nav-fill">
                    <li class="nav-item"><a href="registration-step-one.php?reg_code=<?php echo $_GET['reg_code']; ?>" class="nav-link"> <i class="fa fa-user"></i><br />Personal Information</a></li>
                    <li class="nav-item"><a href="registration-step-two.php?reg_code=<?php echo $_GET['reg_code']; ?>" class="nav-link"><i class="fa fa-book"></i><br />Scholastic Records</a></li>
                    <li class="nav-item"><a href="#" class="nav-link active"><i class="fa fa-users"></i><br />Parents/Guardian Information</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-lock"></i><br />User Account Settings/Requirements</a></li>
                  </ul>
                  
                  <div class="content">
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                        <div class="col-md-12">
                        Father's Information
                        </div>
                        <div class="col-md-8">
                             <input value="<?php echo $studData_row['father_name']; ?>" name="father_name" class="form-control form-control-sm" placeholder="Enter father's name" required="" />
                             <small>Fullname</small>
                        </div>
                          
                        <div class="col-md-4">
                             <input value="<?php echo $studData_row['father_occupation']; ?>" name="father_occupation" class="form-control form-control-sm" placeholder="Enter occupation" required="" />
                             <small>Occupation</small>
                        </div>
                          
                        <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                        <div class="col-md-8">
                             <input value="<?php echo $studData_row['father_address']; ?>" name="father_address" list="search_father_address" class="form-control form-control-sm" placeholder="Enter address" required="" />
                             <datalist id="search_father_address">
                                    <?php
                                    
                                    $father_address_list_query = $conn->query("SELECT DISTINCT address FROM students");
                                    while($father_address_list_row = $father_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $father_address_list_row['address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Address</small>
                        </div>
                          
                        <div class="col-md-4">
                          <input value="<?php echo $studData_row['father_contact']; ?>" name="father_contact" class="form-control form-control-sm" placeholder="Enter contact number" required="" />
                          <small>Contact Number</small>
                        </div>
                         
                        <div class="col-md-12" style="margin-bottom: 12px;"></div>
                        
                        <div class="col-md-12">
                        Mother's Information
                        </div>
                          <div class="col-md-8">
                             <input value="<?php echo $studData_row['mother_name']; ?>" name="mother_name" class="form-control form-control-sm" placeholder="Enter mother's Name" required="" />
                             <small>Fullname (Maiden Name)</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['mother_occupation']; ?>" name="mother_occupation" class="form-control form-control-sm" placeholder="Enter occupation" required="" />
                             <small>Occupation</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-8">
                             <input value="<?php echo $studData_row['mother_address']; ?>" name="mother_address" list="search_mother_address" class="form-control form-control-sm" placeholder="Enter address" required="" />
                             <datalist id="search_mother_address">
                                    <?php
                                    
                                    $mother_address_list_query = $conn->query("SELECT DISTINCT address FROM students");
                                    while($mother_address_list_row = $mother_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $mother_address_list_row['address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Address</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['mother_contact']; ?>" name="mother_contact" class="form-control form-control-sm" placeholder="Enter contact number" />
                             <small>Contact Number</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-12">
                             <input value="<?php echo $studData_row['parents_email']; ?>" name="parents_email" type="email" class="form-control form-control-sm" placeholder="Enter parent's email address" required="" />
                             <small>Parent's Email Address</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="form-group row">
                    <div class="col-md-12">
                        Guardian's Information <small>(If living with the guardian)</small>
                    </div>
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-6">
                             <input value="<?php echo $studData_row['guardian_name']; ?>" name="guardian_name" class="form-control form-control-sm" placeholder="Enter fullname" />
                             <small>Fullname</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['guardian_contact']; ?>" name="guardian_contact" class="form-control form-control-sm" placeholder="Enter contact number" />
                             <small>Contact Number</small>
                          </div>
                          
                      
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['guardian_relation']; ?>" name="guardian_relation" list="search_guardian_relation" class="form-control form-control-sm" placeholder="Enter relation to guardian" />
                             <datalist id="search_guardian_relation">
                                    <?php
                                    
                                    $guardian_relation_list_query = $conn->query("SELECT DISTINCT guardian_relation FROM students");
                                    while($guardian_relation_list_row = $guardian_relation_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $guardian_relation_list_row['guardian_relation']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Relation</small>
                          </div>
                        </div>
 
                      </div>
                    </div>
                    
                  </div>
                  
                  <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
                    <div class="left-col"><a href="registration-step-two.php?reg_code=<?php echo $_GET['reg_code']; ?>" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Scholastic Records</a></div>
                    <div class="right-col">
                      <button name="update_step_three" type="submit" class="btn btn-template-main">Save Changes &amp; Continue to User Account Settings / Requirements<i class="fa fa-chevron-right"></i></button>
                    </div>
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