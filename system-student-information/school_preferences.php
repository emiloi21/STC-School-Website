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
            <li class="breadcrumb-item active">School Preferences</li>
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
                  <h4>SCHOOL SETTINGS</h4>
                </div>
                <div class="card-body">
                
                 
                  <form action="activateSY.php" method="POST" class="form-horizontal" enctype="multipart/form-data"> 
                    

                              <div class="form-group row">
                              <label class="col-sm-2 form-control-label">School Logo</label>
                              <div class="col-sm-10">
                              
                              <?php if($sfp_stat=="xEdit"){ ?>
                              <center>
                                <img width="150" height="150" class="img-fluid rounded" src="../img/<?php echo $sf_row['logo']; ?>" alt="current image image" />
                              </center>
                              <?php }else{ ?>
                                
                              
                              <div class="row">
                              
                                <div class="col-md-6">
                                <input class="form-control" type="file" name="file" id="imgInp" />
                                </div>
                                
                                <div class="col-md-3">
                                <img width="150" height="150" class="img-fluid rounded" src="../img/<?php echo $sf_row['logo']; ?>" alt="current image image" />
                                <small class="form-text">Current Image <i class="fa fa-arrow-up"></i> change to <i class="fa fa-arrow-right"></i></small>
                                </div>
                                
                                <div class="col-md-3">
                                <img width="150" height="150" class="img-fluid rounded" id="blah" src="#" alt="your image" />
                                <small class="form-text">Image preview <i class="fa fa-arrow-up"></i></small>
                                </div>
                                
                                 
                                
                              </div>
                              
                              <?php } ?>
                              
                              </div>
                            </div>
                            
                     
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">School ID</label>
                      <div class="col-sm-10">
                      <?php if($sfp_stat=="xEdit"){ ?>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $deped_id; ?>">
                      <?php }else{ ?>
                        <input name="deped_id" type="text" placeholder="Enter school ID..." class="form-control" value="<?php echo $deped_id; ?>" required="">
                      <?php } ?>
                        
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">School Name</label>
                      <div class="col-sm-10">
                      <?php if($sfp_stat=="xEdit"){ ?>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $schoolName; ?>">
                      <?php }else{ ?>
                        <input name="schoolName" type="text" placeholder="Enter school name..." class="form-control" value="<?php echo $schoolName; ?>" required="">
                      <?php } ?>
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Address</label>
                      <div class="col-sm-10">
                      <?php if($sfp_stat=="xEdit"){ ?>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $sf_row['address']; ?>">
                      <?php }else{ ?>
                        <input name="address" type="text" placeholder="Enter school address..." class="form-control" value="<?php echo $sf_row['address']; ?>" required="">
                      <?php } ?>
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Other Info</label>
                      <div class="col-sm-10">
                      
                      <?php if($sfp_stat=="xEdit"){ ?>
                      
                       <div class="row">
                               
                                <div class="col-md-6">
                                <input type="text" class="form-control" readonly="true" value="<?php echo $sf_row['emailAddress']; ?>">
                                <small class="form-text">Email Address</small>
                                </div>
                                
                                <div class="col-md-6">
                                <input type="text" class="form-control" readonly="true" value="<?php echo $sf_row['contactNumber']; ?>">
                                <small class="form-text">Contact Number</small>
                                </div>
                                
                                 
                                
                       </div>
                      
                      <?php }else{ ?>
                      <div class="row">
                               
                                <div class="col-md-6">
                                <input name="emailAddress" type="email" placeholder="Enter school email address..." class="form-control" value="<?php echo $sf_row['emailAddress']; ?>" required="">
                                <small class="form-text">Email Address</small>
                                </div>
                                
                                <div class="col-md-6">
                                <input name="contactNumber" type="text" placeholder="Enter school contact number..." class="form-control" value="<?php echo $sf_row['contactNumber']; ?>" required="">
                                <small class="form-text">Contact Number</small>
                                </div>
                                
                                 
                                
                       </div>
                      <?php } ?>
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Region</label>
                      <div class="col-sm-10">
                      <?php if($sfp_stat=="xEdit"){ ?>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $region; ?>">
                      <?php }else{ ?>
                        <input name="region" type="text" placeholder="Enter school region..." class="form-control" value="<?php echo $region; ?>" required="">
                      <?php } ?>
                        
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Division</label>
                      <div class="col-sm-10">
                      <?php if($sfp_stat=="xEdit"){ ?>
                        <input type="text" class="form-control" readonly="true" value="<?php echo $division; ?>">
                      <?php }else{ ?>
                        <input name="division" type="text" placeholder="Enter school division..." class="form-control" value="<?php echo $division; ?>" required="">
                      <?php } ?>
                        
                      </div>
                    </div>
                    
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <div class="col-sm-12 offset-sm-2">
                      <?php if($sfp_stat=="xEdit"){ ?>
                        <a href="school_preferences.php?sfp_stat=Edit" class="btn btn-secondary">Change Information</a>
                      <?php }else{ ?>
                        <a href="school_preferences.php?sfp_stat=xEdit" class="btn btn-secondary">Cancel</a>
                        <button name="update_pref" type="submit" class="btn btn-primary">Update Information</button>
                      <?php } ?>
                      
                        
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Active School Year</label>
                        <div class="col-sm-10">
                          <div class="input-group">
             
                          <select name="schoolYear" style="height: 45px;" name="account" class="form-control">
                          <option><?php echo  $activeSchoolYear; ?></option>
                          <?php   
                            $sy_query = $conn->query("select * FROM school_year ORDER BY schoolYear") or die(mysql_error());
                            while ($sy_row = $sy_query->fetch()) 
                            { ?>
                            
                          <option><?php echo $sy_row['schoolYear']; ?></option>
                          
                          <?php } ?>
                          </select>
                          
                          <div class="input-group-prepend">
                            <button data-toggle="dropdown" type="button" class="btn btn-outline-primary dropdown-toggle">Action <span class="caret"></span></button>
                            
                            <div class="dropdown-menu">
                            <a data-toggle="modal" data-target="#activateSYModal" href="#activateSYModal" class="dropdown-item">Activate</a>
                            <a data-toggle="modal" data-target="#addSYModal" href="#addSYModal" class="dropdown-item">Add</a>
                            <div class="dropdown-divider"></div>
                            <a data-toggle="modal" data-target="#removeSYModal" href="#removeSYModal" class="dropdown-item">Remove</a>
                            </div>
                          </div>
                          
                          </div>     
                        </div>
                    </div>
                    
                    <!-- activate SY -->
                  <div id="activateSYModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Activate School Year</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        <label>Select School Year:</label>
                          <select name="schoolYear" class="form-control">
                          <option><?php echo $activeSchoolYear; ?></option>
                          <?php
                          $sy_query = $conn->query("SELECT * FROM school_year ORDER BY schoolYear DESC");
                          while($sy_row = $sy_query->fetch()){ 
                            
                            if($activeSchoolYear==$sy_row['schoolYear']){}else{
                            
                            ?>
                          <option><?php echo $sy_row['schoolYear']; ?></option>
                          <?php }} ?>
                          
                          </select>
                          <small>Active School Year: <?php echo $activeSchoolYear; ?></small>
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">No</a>
                          <button name="activateSY" type="submit" class="btn btn-primary">Yes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                  <!-- add SY -->
                  <div id="addSYModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add School Year</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        <label>School Year:</label>
                          <input name="add_schoolYear" class="form-control" placeholder="Enter school year..." title="Format: YYYY-YYYY" />
                        <small>Format: YYYY-YYYY ( Sample: <?php echo (date('Y')-1).'-'.date('Y'); ?> )</small>
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addSY" type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                  <!-- remove SY -->
                  <div id="removeSYModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Remove School Year?</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        <label>Select School Year:</label>
                          <select name="schoolYear" class="form-control">
                           
                          <?php
                          $sy_query = $conn->query("SELECT * FROM school_year ORDER BY schoolYear DESC");
                          while($sy_row = $sy_query->fetch()){ 
                            
                            if($activeSchoolYear==$sy_row['schoolYear']){}else{
                            
                            ?>
                          <option><?php echo $sy_row['schoolYear']; ?></option>
                          <?php }} ?>
                          
                          </select>
                          <small>Active School Year: <?php echo $activeSchoolYear; ?></small>
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">No</a>
                          <button name="removeSY" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                    <div class="line"></div>
                    
                    
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Active Semester</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                          
                          <select name="semester" style="height: 45px;" name="account" class="form-control">
                          
                          <option><?php echo  $activeSemester; ?></option>
                          <option>1st Semester</option>
                          <option>2nd Semester</option>
                          <option>Summer</option>
                          
                          </select>
                          
                            <div class="input-group-append">
                              <a data-toggle="modal" data-target="#activateSemModal" href="#activateSemModal" class="btn btn-primary">Activate</a>
                            </div>
                          </div>
                        </div>
                    </div>
                    
                    <!-- Modal-->
                  <div id="activateSemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Semester Activation</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                          <p>Sure to activate selected semester?</p>
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">No</a>
                          <button name="activateSem" type="submit" class="btn btn-primary">Yes</button>
                        </div>
                      </div>
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
    
    <?php include('scripts_files.php'); ?>
        
        <script>
    
        $('#blah').attr('src', '../img/avatar-1.jpg');
        
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
