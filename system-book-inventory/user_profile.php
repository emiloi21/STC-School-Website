<!DOCTYPE html>
<html>

  <?php include('session.php'); ?>

  <?php include('header.php'); ?>
  <body>
    <?php include('menu_sidebar.php'); ?>
    <div class="page">
      <?php include('top_navbar.php'); ?>
    
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Account Settings</li>
          </ul>
        </div>
      </div>
       
      <section style="margin-top: 12px;">
        <div class="container-fluid">
          <!-- Page Header-->
 
          <div class="row">
              
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4><i class="fa fa-gear"></i> ACCOUNT SETTINGS</h4>
                </div>
                <div class="card-body">
                <form method="POST" action="save_accountSettings.php">
                <div class="form-group row">
                      <div class="col-sm-12">
                      <h5><i class="fa fa-user"></i> Basic Profile</h5>
                        <div class="row">
                          
                          <div class="col-md-3">
                            <input value="<?php echo $studData_row['fname']; ?>" name="fname" type="text" placeholder="Enter first name" class="form-control" required="" />
                            <small class="form-text">First Name</small>
                          </div>
                          
                          <div class="col-md-3">
                            <input value="<?php echo $studData_row['mname']; ?>" name="mname" type="text" placeholder="Enter middle name" class="form-control" required="" />
                            <small class="form-text">Middle Name</small>
                          </div>
                          
                          <div class="col-md-4">
                            <input value="<?php echo $studData_row['lname']; ?>" name="lname" type="text" placeholder="Enter last name" class="form-control" required="" />
                            <small class="form-text">Last Name</small>
                          </div>
                          
                          <div class="col-md-2"> 
                            <select name="suffix" class="form-control">
                            <option><?php echo $studData_row['suffix']; ?></option>
                            <option>-</option>
                            <option>JR</option>
                            <option>SR</option>
                            <option>III</option>
                            </select>
                            <small class="form-text">Suffix</small>
                          </div>
                          
                        </div>
                      </div>
                </div>
                
                <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                          
                          <div class="col-md-6">
                            <input name="email" value="<?php echo $studData_row['email']; ?>" type="email" placeholder="Enter email" class="form-control" required="" />
                            <small class="form-text">Email</small>
                          </div>
                          
                          <div class="col-md-6">
                              <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                                    <input value="<?php echo substr($studData_row['contact_num'], 3); ?>" name="contact_num" type="text" maxlength="10" class="form-control" required="" />
                                    
                                </div>
                                <small class="form-text">Mobile Number</small>
                              </div>
                          </div>
                          
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                            <input name="verify_pass" type="password" placeholder="Enter password to verify changes" class="form-control" required="" />
                            <small class="form-text">Enter password to verify changes</small>
                      </div>
                          
                </div>
                
                <div class="form-group row">
                <div class="col-sm-12" style="text-align: center;">
                <p><button name="updateAccountInfo" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save Changes</button></p>
                </div>
                </div>
                </form>
                
                <form method="POST" action="save_accountSettings.php">
                <div class="form-group row">
                      <div class="col-sm-12">
                      <h5><i class="fa fa-key"></i> Account Security </h5>
                        <div class="row">
                        
                          <div class="col-md-3">
                            <input value="<?php echo $studData_row['student_id']; ?>" class="form-control" readonly="" />
                            <small class="form-text">ID Code / Username</small>
                          </div>
                          
                          <div class="col-md-3">
                            <input name="verify_pass" type="password" placeholder="Enter old password" class="form-control" required="" />
                            <small class="form-text">Old Password</small>
                          </div>
                          
                          <div class="col-md-3">
                            <input id="password" name="new_pass" type="password" placeholder="Enter new password" class="form-control" required="" />
                            <small class="form-text">New Password</small>
                          </div>
                          
                          <div class="col-md-3">
                            <input id="confirm_password" name="new_pass2" type="password" placeholder="Retype new password" class="form-control" required="" />
                            <small class="form-text">Retype New Password <span id="message"></span></small>
                          </div>
                          
                        </div>
                      </div>
                </div>
                
                <div class="form-group row">
                <div class="col-sm-12" style="text-align: center;">
                <p><button name="updateAccountSecurity" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Save Changes</button></p>
                </div>
                </div>
                </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </section>
 
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('js_scripts.php'); ?>
    
  </body>
</html>