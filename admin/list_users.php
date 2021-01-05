
<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
  <?php $get_dept=$_GET['dept']; ?>
 
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
            <li class="breadcrumb-item active">System Users - Accounts</li>
             
          </ul>
          
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <br />
 
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
                <!-- ADD USER Modal -->
                  <div id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_user.php" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add User</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Access</label>
                              <div class="col-sm-9">
                                <select name="access" class="form-control">
                                  <option>-</option>
                                  <option>Registrar</option>
                                  <option>Accounting Staff</option>
                                  <option>Administrator</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Department</label>
                              <div class="col-sm-9">
                                <select name="dept" class="form-control">
                                  <option>-</option>
                                  <option>Grade School</option>
                                  <option>Junior High School</option>
                                  <option>Senior High School</option>
                                  <option>College</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">First Name</label>
                              <div class="col-sm-9">
                                <input name="fname" type="text" class="form-control" required="" />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Last Name</label>
                              <div class="col-sm-9">
                                <input name="lname" type="text" class="form-control"  required="" />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Email</label>
                              <div class="col-sm-9">
                                <input name="email" type="email" class="form-control" required="" />
                              </div>
                            </div>
                            
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Mobile #</label>
                              <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                                    <input name="contact_num" type="text" class="form-control" required="" />
                                </div>
                              </div>
                            </div>
 
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Username</label>
                              <div class="col-sm-9">
                                <input name="username" type="text" class="form-control"  required="" />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Password</label>
                              <div class="col-sm-9">
                                <input id="password" name="password" type="password" class="form-control" required="" />
                              </div>
                            </div>
                            
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Retype Password</label>
                              <div class="col-sm-9">
                                <input id="confirm_password" name="retype_pass" type="password" class="form-control" required="" />
                                <small class="form-text"><span id="message"></span></small>
                              </div>
                            </div>
                            
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Admin Password</label>
                              <div class="col-sm-9">
                                <input name="admin_pass" type="password" class="form-control" required="" />
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addUser" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end ADD USER Modal -->
                  
              <div style="margin-top: 12px; margin-bottom: 12px;">
              
             <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a style="color: white !important;" data-toggle="modal" data-target="#addUser" href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> &nbsp;
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">USER ACCOUNTS <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
 
                 
                

                
                <div class="table-responsive" style="margin-top: 12px;">
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile #</th>
                        <th>Access</th>
                        <th>Department</th>
                        <th></th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      $userCtr=0;
               
                      $users_query = $conn->query("SELECT * FROM useraccount WHERE user_type='Personnel' ORDER BY access, lname ASC") or die(mysql_error());
                      while ($user_row = $users_query->fetch()) 
                      {
                        $userCtr+=1;
                        $user_id=$user_row['user_id'];
                        ?>
           
                        <tr>
                        
                        <td><?php echo $userCtr; ?>. <?php echo $user_row['lname'].', '.$user_row['fname']; ?></td>
                        
                        <td><?php echo $user_row['email']; ?></td>
                        
                        <td><?php echo $user_row['contact_num']; ?></td>
                        
                        <td><?php echo $user_row['access']; ?></td>
                        
                        <td><?php echo $user_row['dept']; ?></td>
                        
                        <td>
                          <?php if($user_row['access']!='Administrator'){ ?>
                          <a style="color: white !important;" data-toggle="modal" data-target="#editUser<?php echo $user_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteUser<?php echo $user_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php } ?>
                        </td>
                        </tr>


                  <!-- edit category Modal -->
                  <div id="editUser<?php echo $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_user.php" method="POST">
                      
                      <input value="<?php echo $user_row['user_id']; ?>" name="user_id" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit User</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Access</label>
                              <div class="col-sm-9">
                                <select name="access" class="form-control">
                                  <option><?php echo $user_row['access']; ?></option>
                                  <option>Registrar</option>
                                  <option>Accounting Staff</option>
                                  <option>Administrator</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Department</label>
                              <div class="col-sm-9">
                                <select name="dept" class="form-control">
                                  <option><?php echo $user_row['dept']; ?></option>
                                  <option>Grade School</option>
                                  <option>Junior High School</option>
                                  <option>Senior High School</option>
                                  <option>College</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Admin Password</label>
                              <div class="col-sm-9">
                                <input name="admin_pass" type="password" class="form-control" required="" />
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateUser" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit category Modal -->
                  
                  
                        <!-- delete student Modal -->
                          <div id="deleteUser<?php echo $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_user.php" method="POST">
                      
                              <input value="<?php echo $user_row['user_id']; ?>" name="user_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete User</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                
                                
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                    <h4>
                                    Are you sure you want to delete user <?php echo $user_row['lname'].', '.$user_row['fname']; ?>?<br /><br />
                                    <small>Access: <?php echo $user_row['access']; ?> &nbsp; Department: <?php echo $user_row['dept']; ?></small>
                                    </h4>
                                    <hr />
                                  </div>
                                </div>
                                
                                <div class="form-group row">
                                  <label class="col-sm-4 form-control-label">Admin Password</label>
                                  <div class="col-sm-8">
                                    <input name="admin_pass" type="password" class="form-control" required="" />
                                  </div>
                                </div>
                            
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteUser" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
                          
                            <?php } ?>
                            
                      </tbody>
                    </table>
                    </div>
                    
               
               </div>
               </div>
                   
                </div>
                
              </div>
              <!-- kinder End-->
              
            </div>
            
          </div>
        
              
      </section>
     
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
 
  </body>
</html>


?>