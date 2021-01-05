<!DOCTYPE html>
<html>

  <?php
  
  include('session.php');
  include('header.php');
  
  ?>
  
  
  <?php $sfp_stat=$_GET['sfp_stat']; ?>
  
  
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
            <li class="breadcrumb-item active">User Profile</li>
          </ul>
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <br />
      <div class="col-lg-12">
      <div class="row">
      
      <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>MY PROFILE</h4>
                </div>
                <div class="card-body">
    
                    <?php
                    
                    $staff_query = $conn->query("SELECT * FROM useraccount WHERE user_id='$session_id'") or die(mysql_error());
                    $staff_row = $staff_query->fetch(); 
                    
                    ?>
                    <h5><a data-toggle="modal" data-target="#editTeacher<?php echo $user_row['user_id']; ?>" href="#"><i class="fa fa-pencil"></i></span></a> Personal Information</h5>
                    <div class="line"></div>
                    <p><strong>Access:</strong> <?php echo $staff_row['access']; ?></p>
                    <p><strong>Name:</strong> <?php echo $staff_row['fname'].' '.$staff_row['lname']; ?></p>
                    <p><strong>Email:</strong> <?php echo $staff_row['email']; ?></p>
                    <div class="line"></div>
                    
                    
                    
                    <!-- edit staff Modal -->
                  <div id="editTeacher<?php echo $user_row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                       <form action="save_add_staff.php?sfp_stat=xEdi" method="POST">
                       <input type="hidden" name="user_id" value="<?php echo $user_row['user_id']; ?>" />
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Personal Info</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                          <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Name</label>
                              <div class="col-sm-10">
                              
                              <div class="row">
                              
                                <div class="col-md-6">
                                <input value="<?php echo $staff_row['fname']; ?>" name="fname" type="text" class="form-control">
                                <small class="form-text">First Name</small>
                                </div>
                                
                                <div class="col-md-6">
                                <input value="<?php echo $staff_row['lname']; ?>" name="lname" type="text" class="form-control">
                                <small class="form-text">Middle Name</small>
                                </div>
                                
                              </div>
                                
                              </div>
                            </div>
 
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Email</label>
                              <div class="col-sm-10">
                                <input value="<?php echo $staff_row['email']; ?>" name="email" type="email" class="form-control">
                              </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="update_user" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                        </form>
                        
                      </div>
                    </div>
                  </div>
                  <!-- end edit staff Modal -->
                    <br />
                    
                    <h5><a data-toggle="modal" data-target="#editLoginAccount<?php echo $user_row['user_id']; ?>" href="#"><i class="fa fa-pencil"></i></span></a> Account Information</h5>
                    <div class="line"></div>
                    
                    <div class="row">
                    <div class="col-md-6">
                    <p><strong>Username:</strong> <input class="form-control" type="text" value="<?php echo $check_username; ?>" readonly="true" /></p>
                    </div>
                    <div class="col-md-6">
                    <p><strong>Password:</strong> <input class="form-control" type="password" value="------" readonly="true" /></p>
                    </div>
                    </div>
                  
                  <!-- edit login account Modal -->
                  <div id="editLoginAccount<?php echo $user_row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                       <form action="save_add_staff.php?sfp_stat=xEdi" method="POST">
                        
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Account Data</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body"> 
                            
                          <div class="form-group row">
                             
                              <div class="col-sm-12">
                              
                              <div class="row">
                                <div class="col-md-12">
                                <input value="<?php echo $check_username; ?>" name="username" type="text" class="form-control" required="true">
                                <small class="form-text">Username</small>
                                </div> 
                              </div>
                              
                              
                              <div class="row">
                              
                                <div class="col-md-6">
                                <input id="password" placeholder="Enter new password..." name="password1" type="password" class="form-control" required="true">
                                <small class="form-text">New Password</small>
                                </div>
                                
                                <div class="col-md-6">
                                <input id="confirm_password" placeholder="Retype password..." name="password2" type="password" class="form-control" required="true">
                                <small class="form-text">Retype Password &nbsp; &nbsp; <span id="message"></span></small>
                                </div>
                                
                              </div>
                              
                              <div class="row">
                                <div class="col-md-12">
                                <input placeholder="Enter current password to confirm process..." name="passwordChecker" type="password" class="form-control" required="true">
                                <small class="form-text">Current Password</small>
                                </div> 
                              </div>
                              
                              </div>
                            </div>
                            
              
                   
                            
      
              
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateLoginAccount" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                        </form>
                        
                      </div>
                    </div>
                  </div>
                  <!-- end edit login account Modal -->
                  
                </div>
              </div>
            </div>
            </div>
            </div>
 

      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
        
  </body>
</html>
