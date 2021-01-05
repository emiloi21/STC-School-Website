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
                    <h4 style="margin-bottom: 0px;">PERSONAL INFORMATION</h4>
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
                    <li class="nav-item"><a href="shop-checkout1.html" class="nav-link active"> <i class="fa fa-user"></i><br />Personal Information</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-book"></i><br />Scholastic Records</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-users"></i><br />Parents/Guardian Information</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-lock"></i><br />User Account Settings/Requirements</a></li>
                  </ul>
                  
                  <div class="content">
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['fname']; ?>" name="fname" class="form-control form-control-sm" placeholder="Enter First Name" required="" />
                             <small>First Name</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['mname']; ?>" name="mname" class="form-control form-control-sm" placeholder="Enter Middle Name" />
                             <small>Middle Name</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['lname']; ?>" name="lname" class="form-control form-control-sm" placeholder="Enter Last Name" required="" />
                             <small>Last Name</small>
                          </div>
                          
                          <div class="col-md-2">
                              <select name="suffix" class="form-control form-control-sm">
                              <option><?php echo $studData_row['suffix']; ?></option>
                              <option>JR</option>
                              <option>SR</option>
                              <option>III</option>
                              </select>
                              <small>Suffix</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      
                      <div class="col-sm-12">
                        <div class="row">
                            
                          <div class="col-md-4">
                              <input value="<?php echo $studData_row['bdYYYY'].'-'.$studData_row['bdMM'].'-'.$studData_row['bdDD']; ?>" name="birthdate" type="date" class="form-control form-control-sm" />
                              <small class="form-text">Date of Birth</small>
                          </div>
                          
                          <div class="col-md-6">
                             <input value="<?php echo $studData_row['birthPlace']; ?>" name="birthPlace" list="search_bplace" class="form-control form-control-sm" required="" />
                             
                             <datalist id="search_bplace">
                                    <?php
                                    
                                    $bplace_list_query = $conn->query("SELECT DISTINCT birthPlace FROM students");
                                    while($bp_list_row = $bplace_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $bp_list_row['birthPlace']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                          
                             <small>Place of Birth</small>
                          </div>
                          
                          <div class="col-md-2">
                              <select name="sex" class="form-control form-control-sm">
                              <option value="Male"><?php echo $studData_row['sex']; ?></option>
                              <option>Male</option>
                              <option>Female</option>
                              </select>
                              <small>Sex</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      
                      <div class="col-sm-12">
                        <div class="row">
                           
                          <div class="col-md-3">
                              <select name="civil_status" class="form-control form-control-sm">
                              <option><?php echo $studData_row['civil_status']; ?></option>
                              <option>Single</option>
                              <option>Married</option>
                              <option>Widow</option>
                              </select>
                              <small>Civil Status</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['age']; ?>" name="age" class="form-control form-control-sm" readonly="" />
                             <small>Age</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['nationality']; ?>"  name="nationality" class="form-control form-control-sm" required="" />
                             <small>Nationality</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['religion']; ?>" name="religion" list="search_religion" class="form-control form-control-sm" />
                             <datalist id="search_religion">
                                    <?php
                                    
                                    $religion_list_query = $conn->query("SELECT DISTINCT religion FROM students");
                                    while($rel_list_row = $religion_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $rel_list_row['religion']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Religion</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-6">
                             <input value="<?php echo $studData_row['address']; ?>" name="address" list="search_home_add" class="form-control form-control-sm" placeholder="Enter Home Address" required="" />
                             <datalist id="search_home_add">
                                    <?php
                                    
                                    $home_add_list_query = $conn->query("SELECT DISTINCT address FROM students");
                                    while($home_add_list_row = $home_add_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $home_add_list_row['address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Home Address</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['contact_num']; ?>" name="contact_num" class="form-control form-control-sm" required="" />
                             <small>Contact Number</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['email']; ?>" name="email" class="form-control form-control-sm" required="" />
                             <small>Email Address</small>
                          </div>
                        </div>
 
                      </div>
                    </div>
                   
                  </div>
                  
                  <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
                    <div class="left-col"><a href="user-login-register.php" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Cancel</a></div>
                    <div class="right-col">
                      <button name="update_step_one" type="submit" class="btn btn-template-main">Save Changes &amp; Continue to Schoolastic Records <i class="fa fa-chevron-right"></i></button>
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