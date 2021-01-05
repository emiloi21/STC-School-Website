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
            <li class="breadcrumb-item active">List of Requirements</li>
          </ul>
        </div>
      </div>
      
      
      
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
                <div class="tab">
                  <a class="tablinks active" onclick="openCity(event, 'London')">Grade School</a>
                  <a class="tablinks" onclick="openCity(event, 'Paris')">JHS</a>
                  <a class="tablinks" onclick="openCity(event, 'Tokyo')">SHS</a>
                  <a class="tablinks" onclick="openCity(event, 'Manila')">College</a>
                </div>
          
          
          <hr />
          <h5 style="margin-left: 12px;">LIST OF REQUIREMENTS</h5>
          <div id="London" class="tabcontent" style="display: block;">
          
          <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a style="color: white !important;" data-toggle="modal" data-target="#addRequirementsKinder" href="#" class="btn btn-primary"><i class="fa fa-plus"></i></a> &nbsp;
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder">Grade School&nbsp;<div class="badge badge-info">SY <?php echo $data_src_sy; ?></div></a>
                  
                  </h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxKinder" role="tabpanel" class="collapse show">
               
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                 
                      <thead>
                        <tr>
                          <th>Course Details</th>
                          <th>Classification</th>
                          <th>Requirement</th>
                          <th>Description</th>
                          <th>Purpose</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php
                      
                      $reqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='Grade School' ORDER BY gradeLevel, classification ASC") or die(mysql_error());
                      while ($reqs_row = $reqs_query->fetch()){
                        
                      $require_id=$reqs_row['require_id']; 
                      
                      ?>
           
                        <tr>
                        
                          <td><?php echo $reqs_row['gradeLevel']; ?></td>
                          <td><?php echo $reqs_row['classification']; ?></td>
                          <td><?php echo $reqs_row['requirement_name']; ?></td>
                          <td><?php echo $reqs_row['description']; ?></td>
                          <td><?php echo $reqs_row['purpose']; ?></td>

                          <td>
 
                          <a style="color: white !important;" data-toggle="modal" data-target="#editReqs<?php echo $require_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#delReqs<?php echo $require_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                           
                          </td>
                        </tr>
                        
                          <!-- delete Class Modal -->
                          <div id="delReqs<?php echo $require_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_requirements.php" method="POST">
                              <input name="require_id" value="<?php echo $reqs_row['require_id']; ?>" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Requirement</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>Are you sure you want to delete requirement <?php echo $reqs_row['requirement_name']; ?>?</h4>
                                <small>Purpose: <?php echo $reqs_row['purpose']; ?></small>
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteReqs" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete Class Modal -->
                          
                          <!-- edit Class Modal -->
                          <div id="editReqs<?php echo $require_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_requirements.php" method="POST">
                              
                              <input name="require_id" value="<?php echo $reqs_row['require_id']; ?>" type="hidden" />
                                    
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Edit Requirement</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Requirement Name</label>
                                      <div class="col-sm-9">
                                        <input value="<?php echo $reqs_row['requirement_name']; ?>" name="requirement_name" class="form-control" type="text" />
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Description</label>
                                      <div class="col-sm-9">
                                        <textarea name="description" class="form-control" rows="3" style="resize: none;" placeholder="Requirement description"><?php echo $reqs_row['description']; ?></textarea>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Purpose</label>
                                      <div class="col-sm-9">
                                        <select name="purpose" class="form-control">
                                          <option><?php echo $reqs_row['purpose']; ?></option>
                                          <option>for Admission</option>
                                          <option>for Scholarship</option>
                                          <option>for Government Subsidy</option>
                                        </select>
                                      </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                                  <button name="updateReqs" type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end edit Class Modal -->
                  
                        <?php } ?>
                       
                      </tbody>
                    </table>
                 </div>
                 </div>
                </div>
              </div>
              <!-- kinder End-->
              
          </div>
          
          <div id="Paris" class="tabcontent">
          <!-- JHS   -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a style="color: white !important;" data-toggle="modal" data-target="#addRequirementsJHS" href="#addClassJHS" class="btn btn-primary"><i class="fa fa-plus"></i></a>&nbsp;
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxJHS" aria-expanded="true" aria-controls="updates-boxJHS">Junior High School&nbsp;<div class="badge badge-info">SY <?php echo $data_src_sy; ?></div></a>
                  
                  </h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxJHS" aria-expanded="true" aria-controls="updates-boxJHS"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxJHS" role="tabpanel" class="collapse show">
                
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                
                      <thead>
                        <tr>
                          <th>Course Details</th>
                          <th>Classification</th>
                          <th>Requirement</th>
                          <th>Description</th>
                          <th>Purpose</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php
                      
                      $reqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='Junior High School' ORDER BY gradeLevel, classification ASC") or die(mysql_error());
                      while ($reqs_row = $reqs_query->fetch()){
                        
                      $require_id=$reqs_row['require_id']; 
                      
                      ?>
           
                        <tr>
                        
                          <td><?php echo $reqs_row['gradeLevel']; ?></td>
                          <td><?php echo $reqs_row['classification']; ?></td>
                          <td><?php echo $reqs_row['requirement_name']; ?></td>
                          <td><?php echo $reqs_row['description']; ?></td>
                          <td><?php echo $reqs_row['purpose']; ?></td>
 
                          <td>
 
                          <a style="color: white !important;" data-toggle="modal" data-target="#editReqs<?php echo $require_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#delReqs<?php echo $require_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                           
                          </td>
                        </tr>
                        
                          <!-- delete Class Modal -->
                          <div id="delReqs<?php echo $require_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_requirements.php" method="POST">
                              <input name="require_id" value="<?php echo $reqs_row['require_id']; ?>" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Requirement</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>Are you sure you want to delete requirement <?php echo $reqs_row['requirement_name']; ?>?</h4>
                                <small>Purpose: <?php echo $reqs_row['purpose']; ?></small>
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteReqs" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete Class Modal -->
                          
                          <!-- edit Class Modal -->
                          <div id="editReqs<?php echo $require_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_requirements.php" method="POST">
                              
                              <input name="require_id" value="<?php echo $reqs_row['require_id']; ?>" type="hidden" />
                                    
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Edit Requirement</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Requirement Name</label>
                                      <div class="col-sm-9">
                                        <input value="<?php echo $reqs_row['requirement_name']; ?>" name="requirement_name" class="form-control" type="text" />
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Description</label>
                                      <div class="col-sm-9">
                                        <textarea name="description" class="form-control" rows="3" style="resize: none;" placeholder="Requirement description"><?php echo $reqs_row['description']; ?></textarea>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Purpose</label>
                                      <div class="col-sm-9">
                                        <select name="purpose" class="form-control">
                                          <option><?php echo $reqs_row['purpose']; ?></option>
                                          <option>for Admission</option>
                                          <option>for Scholarship</option>
                                          <option>for Government Subsidy</option>
                                        </select>
                                      </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                                  <button name="updateReqs" type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end edit Class Modal -->
                  
                  
                        <?php } ?>
                       
                      </tbody>
                    </table>
                    </div>
                    </div>
                    
                </div>
              </div>
              <!-- JHS End-->
          </div>
          
          
          <div id="Tokyo" class="tabcontent">
          <!-- SHS -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a style="color: white !important;" data-toggle="modal" data-target="#addRequirementsSHS" href="#" class="btn btn-primary"><i class="fa fa-plus"></i></a>&nbsp;
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-box2" aria-expanded="true" aria-controls="updates-box2">Senior High School&nbsp;<div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  
                  </h2><a data-toggle="collapse" data-parent="#new-updates2" href="#updates-box2" aria-expanded="true" aria-controls="updates-box2"><i class="fa fa-angle-down"></i></a>
                
                </div>
                <div id="updates-box2" role="tabpanel" class="collapse show">
                
                
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>Course Details</th>
                          <th>Classification</th>
                          <th>Requirement</th>
                          <th>Description</th>
                          <th>Purpose</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php
                      
                      $reqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='Senior High School' ORDER BY gradeLevel, classification ASC") or die(mysql_error());
                      while ($reqs_row = $reqs_query->fetch()){
                        
                      $require_id=$reqs_row['require_id']; 
                      
                      ?>
           
                        <tr>
                        
                          <td><?php echo $reqs_row['gradeLevel'].' - '.$reqs_row['strand']; ?></td>
                          <td><?php echo $reqs_row['classification']; ?></td>
                          <td><?php echo $reqs_row['requirement_name']; ?></td>
                          <td><?php echo $reqs_row['description']; ?></td>
                          <td><?php echo $reqs_row['purpose']; ?></td>
                          
                          <td>
 
                          <a style="color: white !important;" data-toggle="modal" data-target="#editReqs<?php echo $require_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#delReqs<?php echo $require_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                           
                          </td>
                        </tr>
                        
                          <!-- delete Class Modal -->
                          <div id="delReqs<?php echo $require_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_requirements.php" method="POST">
                              <input name="require_id" value="<?php echo $reqs_row['require_id']; ?>" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Requirement</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>Are you sure you want to delete requirement <?php echo $reqs_row['requirement_name']; ?>?</h4>
                                <small>Purpose: <?php echo $reqs_row['purpose']; ?></small>
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteReqs" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete Class Modal -->
                          
                          <!-- edit Class Modal -->
                          <div id="editReqs<?php echo $require_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_requirements.php" method="POST">
                              
                              <input name="require_id" value="<?php echo $reqs_row['require_id']; ?>" type="hidden" />
                                    
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Edit Requirement</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Requirement Name</label>
                                      <div class="col-sm-9">
                                        <input value="<?php echo $reqs_row['requirement_name']; ?>" name="requirement_name" class="form-control" type="text" />
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Description</label>
                                      <div class="col-sm-9">
                                        <textarea name="description" class="form-control" rows="3" style="resize: none;" placeholder="Requirement description"><?php echo $reqs_row['description']; ?></textarea>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Purpose</label>
                                      <div class="col-sm-9">
                                        <select name="purpose" class="form-control">
                                          <option><?php echo $reqs_row['purpose']; ?></option>
                                          <option>for Admission</option>
                                          <option>for Scholarship</option>
                                          <option>for Government Subsidy</option>
                                        </select>
                                      </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                                  <button name="updateReqs" type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end edit Class Modal -->
                  
                  
                       <?php } ?>
                       
                      </tbody>
                    </table>
                    </div>
                    </div>
                    
                </div>
              </div>
              <!-- SHS End-->
          </div>
          
          
          <div id="Manila" class="tabcontent">
          <!-- College -->
            <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a style="color: white !important;" data-toggle="modal" data-target="#addRequirementsCollege" href="#" class="btn btn-primary"><i class="fa fa-plus"></i></a>&nbsp;
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-box2" aria-expanded="true" aria-controls="updates-box2">College&nbsp;<div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  
                  </h2><a data-toggle="collapse" data-parent="#new-updates2" href="#updates-box2" aria-expanded="true" aria-controls="updates-box2"><i class="fa fa-angle-down"></i></a>
                
                </div>
                <div id="updates-box2" role="tabpanel" class="collapse show">
                
                
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>Course Details</th>
                          <th>Classification</th>
                          <th>Requirement</th>
                          <th>Description</th>
                          <th>Purpose</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      <?php
                      
                      $reqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='College' ORDER BY gradeLevel, classification ASC") or die(mysql_error());
                      while ($reqs_row = $reqs_query->fetch()){
                        
                      $require_id=$reqs_row['require_id']; 
                      
                      ?>
           
                        <tr>
                        
                          <td><?php echo $reqs_row['gradeLevel'].' - '.$reqs_row['strand'].' '.$reqs_row['major']; ?></td>
                          <td><?php echo $reqs_row['classification']; ?></td>
                          <td><?php echo $reqs_row['requirement_name']; ?></td>
                          <td><?php echo $reqs_row['description']; ?></td>
                          <td><?php echo $reqs_row['purpose']; ?></td>
 
                          <td>
 
                          <a style="color: white !important;" data-toggle="modal" data-target="#editReqs<?php echo $require_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#delReqs<?php echo $require_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                           
                          </td>
                        </tr>
                        
                          <!-- delete Class Modal -->
                          <div id="delReqs<?php echo $require_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_requirements.php" method="POST">
                              <input name="require_id" value="<?php echo $reqs_row['require_id']; ?>" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Requirement</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>Are you sure you want to delete requirement <?php echo $reqs_row['requirement_name']; ?>?</h4>
                                <small>Purpose: <?php echo $reqs_row['purpose']; ?></small>
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteReqs" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete Class Modal -->
                          
                          <!-- edit Class Modal -->
                          <div id="editReqs<?php echo $require_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_requirements.php" method="POST">
                              
                              <input name="require_id" value="<?php echo $reqs_row['require_id']; ?>" type="hidden" />
                                    
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Edit Requirement</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Requirement Name</label>
                                      <div class="col-sm-9">
                                        <input value="<?php echo $reqs_row['requirement_name']; ?>" name="requirement_name" class="form-control" type="text" />
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Description</label>
                                      <div class="col-sm-9">
                                        <textarea name="description" class="form-control" rows="3" style="resize: none;" placeholder="Requirement description"><?php echo $reqs_row['description']; ?></textarea>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <label class="col-sm-3 form-control-label">Purpose</label>
                                      <div class="col-sm-9">
                                        <select name="purpose" class="form-control">
                                          <option><?php echo $reqs_row['purpose']; ?></option>
                                          <option>for Admission</option>
                                          <option>for Scholarship</option>
                                          <option>for Government Subsidy</option>
                                        </select>
                                      </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                                  <button name="updateReqs" type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end edit Class Modal -->
                  
                  
                       <?php } ?>
                       
                      </tbody>
                    </table>
                    </div>
                    </div>
                    
                </div>
              </div>
              
          <!-- College End-->
          </div>
              
 
            </div>
            
          </div>
        </div>
        
        <?php include('add_requirements_modal.php'); ?>
                  
      </section>
      
 
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
    
  </body>
</html>