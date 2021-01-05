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
            <li class="breadcrumb-item active">List of Classes</li>
          </ul>
        </div>
      </div>
      
      
      
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
            <div style="margin-bottom: 12px;">
            <div class="card user-activity" style="padding: 12px;">
            <p style="margin-bottom: 0px;">
            <a title="Click to import classes..." data-toggle="modal" data-target="#importClass" href="#" style="color: white; padding: 2px 4px 2px 4px;" class="btn btn-success btn-sm"><i class="fa fa-gear" style="color: white;"></i> IMPORT CLASS</a>
            </p>
            </div>
            
            <?php include('import_class_modal.php'); ?>
            
            </div>
            
                <div class="tab">
                  <a class="tablinks" onclick="openCity(event, 'London')">Grade School</a>
                  <a class="tablinks" onclick="openCity(event, 'Paris')">JHS</a>
                  <a class="tablinks" onclick="openCity(event, 'Tokyo')">SHS</a>
                  <a class="tablinks" onclick="openCity(event, 'Manila')">College</a>
                </div>
          
          
          <hr />
          
          <div id="London" class="tabcontent">
          
          <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a style="color: white !important;" data-toggle="modal" data-target="#addClassKinder" href="#" class="btn btn-primary"><i class="fa fa-plus"></i></a> &nbsp;
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder">Grade School <small>(SY <?php echo $data_src_sy; ?>)</small></a>
                  
                  </h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxKinder" role="tabpanel" class="collapse show">
               
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                 
                      <thead>
                        <tr>
                          <th>Grade Level</th>
                          <th>Section</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                            <?php
                             
                            $subjK_query = $conn->query("select * FROM classes WHERE dept='Grade School' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                            while ($class_data_row = $subjK_query->fetch()) 
                            { 
                                $class_id=$class_data_row['class_id'];
                                
                                ?>
           
                        <tr>
                        
                          <td><?php echo $class_data_row['gradeLevel']; ?></td>
                          <td><?php echo $class_data_row['section']; ?></td>

                          <td>
                          
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          
                          <?php
                          $class_query = $conn->query("SELECT * FROM students WHERE class_id='$class_id' AND schoolYear='$data_src_sy'") or die(mysql_error());
                          if($class_query->rowCount()>0){?> 
                          <a style="color: white !important;" data-toggle="modal" data-target="#editClassKinder<?php echo $class_id; ?>" href="#editClassJHS<?php echo $class_id; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-times"></i></a>
                          
                          <?php }else{ ?>
                          <a style="color: white !important;" data-toggle="modal" data-target="#editClassKinder<?php echo $class_id; ?>" href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteClassKinder<?php echo $class_id; ?>" href="#" class="btn btn-danger"><i class="fa fa-times"></i></a>
                          
                          <?php } ?>
                          
                          <?php }else{ ?>
                          
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-times"></i></a>
                          
                          
                          <?php } ?>
                          
                          
                          
                          
                          </td>
                        </tr>
                      
                  
                  
                  
                  <!-- delete Class Modal -->
                  <div id="deleteClassKinder<?php echo $class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="save_add_class.php" method="POST">
                      <input name="class_id" value="<?php echo $class_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Delete Class [ Grade School ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                           
                        <h4>Are you sure you want to delete class:<br /><br /><?php echo $class_data_row['gradeLevel']." - ".$class_data_row['section']; ?>?</h4>
                          
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                          <button name="deleteClass" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end delete Class Modal -->
                  
                  <!-- edit Class Modal -->
                  <div id="editClassKinder<?php echo $class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="save_add_class.php" method="POST">
                      <input name="class_id" value="<?php echo $class_id; ?>" type="hidden" />
                      <input name="strand" type="hidden" value="N/A" />
                      <input name="major" type="hidden" value="N/A" />
                            
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Class [ Grade School ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Grade Level</label>
                              <div class="col-sm-10">
                                <select name="gradeLevel" name="account" class="form-control">
                                  <option><?php echo $class_data_row['gradeLevel']; ?></option>
                                  <option>Nursery</option>
                                  <option>Preparatory</option>
                                  <option>Kinder</option>
                                  <option>Grade 1</option>
                                  <option>Grade 2</option>
                                  <option>Grade 3</option>
                                  <option>Grade 4</option>
                                  <option>Grade 5</option>
                                  <option>Grade 6</option>
                                  </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Section</label>
                              <div class="col-sm-10">
                                <input value="<?php echo $class_data_row['section']; ?>" name="section" type="text" class="form-control">
                              </div>
                            </div>
                          
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateClass" type="submit" class="btn btn-primary">Update</button>
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
                  
                  <a style="color: white !important;" data-toggle="modal" data-target="#addClassJHS" href="#addClassJHS" class="btn btn-primary"><i class="fa fa-plus"></i></a>&nbsp;
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxJHS" aria-expanded="true" aria-controls="updates-boxJHS">Junior High School <small>(SY <?php echo $data_src_sy; ?>)</small></a>
                  
                  </h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxJHS" aria-expanded="true" aria-controls="updates-boxJHS"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxJHS" role="tabpanel" class="collapse show">
                
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                
                      <thead>
                        <tr>
                        
                          <th>Grade Level</th>
                          <th>Section</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                            <?php
                            
                            $subjK_query = $conn->query("select * FROM classes WHERE dept='Junior High School' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                            while ($class_data_row = $subjK_query->fetch()) 
                            { 
                                $class_id=$class_data_row['class_id'];
                                ?>
                            
                        <tr>
                        
                          <td><?php echo $class_data_row['gradeLevel']; ?></td>
                          <td><?php echo $class_data_row['section']; ?></td>
 
                          <td>
                          
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          
                          <?php
                          $class_query = $conn->query("SELECT * FROM students WHERE class_id='$class_id' AND schoolYear='$data_src_sy'") or die(mysql_error());
                          if($class_query->rowCount()>0){?> 
                          <a style="color: white !important;" data-toggle="modal" data-target="#editClassJHS<?php echo $class_id; ?>" href="#editClassJHS<?php echo $class_id; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-times"></i></a>
                          
                          <?php }else{ ?>
                          <a style="color: white !important;" data-toggle="modal" data-target="#editClassJHS<?php echo $class_id; ?>" href="#editClassJHS<?php echo $class_id; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteClassJHS<?php echo $class_id; ?>" href="#deleteClassJHS<?php echo $class_id; ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
                          
                          <?php } ?>
                          
                          <?php }else{ ?>
                          
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-times"></i></a>
                          
                          
                          <?php } ?>
                          
                          
                          
                          
                          </td>
                        </tr>
                        
                        <!-- delete Class Modal -->
                  <div id="deleteClassJHS<?php echo $class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="save_add_class.php" method="POST">
                      <input name="class_id" value="<?php echo $class_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Delete Class [ JHS ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                           
                        <h4>Are you sure you want to delete class:<br /><br /><?php echo $class_data_row['gradeLevel']." - ".$class_data_row['section']; ?>?</h4>
                          
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                          <button name="deleteClass" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end delete Class Modal -->
                  
                        <!-- edit Class Modal -->
                  <div id="editClassJHS<?php echo $class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="save_add_class.php" method="POST">
                      <input name="class_id" value="<?php echo $class_id; ?>" type="hidden" />
                      <input name="strand" type="hidden" value="N/A" />
                      <input name="major" type="hidden" value="N/A" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Class [ JHS ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Grade Level</label>
                              <div class="col-sm-10">
                                <select name="gradeLevel" name="account" class="form-control">
                                  <option><?php echo $class_data_row['gradeLevel']; ?></option>
                                  <option>Grade 7</option>
                                  <option>Grade 8</option>
                                  <option>Grade 9</option>
                                  <option>Grade 10</option>
                                  
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Section</label>
                              <div class="col-sm-10">
                                <input value="<?php echo $class_data_row['section']; ?>" name="section" type="text" class="form-control">
                              </div>
                            </div>
                            
                        </div>
                        
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateClass" type="submit" class="btn btn-primary">Update</button>
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
                  
                  <a style="color: white !important;" data-toggle="modal" data-target="#addClassSHS" href="#" class="btn btn-primary"><i class="fa fa-plus"></i></a>&nbsp;
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-box2" aria-expanded="true" aria-controls="updates-box2">Senior High School <small>(SY <?php echo $data_src_sy; ?>)</small></a>
                  
                  </h2><a data-toggle="collapse" data-parent="#new-updates2" href="#updates-box2" aria-expanded="true" aria-controls="updates-box2"><i class="fa fa-angle-down"></i></a>
                
                </div>
                <div id="updates-box2" role="tabpanel" class="collapse show">
                
                
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                      <thead>
                        <tr>
                        
                          <th>Grade Level</th>
                          <th>Strand</th>
                          <th>Section</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                            <?php
                            $subjK_ctr=0;   
                            $subjK_query = $conn->query("select * FROM classes WHERE dept='Senior High School' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, strand, section ASC") or die(mysql_error());
                            while ($class_data_row = $subjK_query->fetch()) 
                            { 
                                $class_id=$class_data_row['class_id'];
                                ?>
                            
                          <tr>
                     
                          <td><?php echo $class_data_row['gradeLevel']; ?></td>
                          <td><?php echo $class_data_row['strand']; ?></td>
                          <td><?php echo $class_data_row['section']; ?></td>
                          
                          <td>
                          
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          
                          <?php
                          $class_query = $conn->query("SELECT * FROM students WHERE class_id='$class_id' AND schoolYear='$data_src_sy'") or die(mysql_error());
                          if($class_query->rowCount()>0){?> 
                          <a style="color: white !important;" data-toggle="modal" data-target="#editClassSHS<?php echo $class_id; ?>" href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-times"></i></a>
                          
                          <?php }else{ ?>
                          <a style="color: white !important;" data-toggle="modal" data-target="#editClassSHS<?php echo $class_id; ?>" href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteClassSHS<?php echo $class_id; ?>" href="#" class="btn btn-danger"><i class="fa fa-times"></i></a>
                          
                          <?php } ?>
                          
                          <?php }else{ ?>
                          
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-times"></i></a>
                          
                          
                          <?php } ?>
 
                          </td>
                          </tr>  
                       
                       
                       <!-- delete Class Modal -->
                  <div id="deleteClassSHS<?php echo $class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="save_add_class.php" method="POST">
                      <input name="class_id" value="<?php echo $class_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Delete Class [ SHS ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                           
                        <h4>Are you sure you want to delete class:<br /><br /><?php echo $class_data_row['gradeLevel']." - ".$class_data_row['strand']." - ".$class_data_row['section']; ?>?</h4>
                          
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                          <button name="deleteClass" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end delete Class Modal -->
                       
                       <!-- edit Class Modal -->
                  <div id="editClassSHS<?php echo $class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="save_add_class.php" method="POST">
                      <input name="class_id" value="<?php echo $class_id; ?>" type="hidden" />
                      <input name="major" type="hidden" value="N/A" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Class [ SHS ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Grade Level</label>
                              <div class="col-sm-10">
                                <select name="gradeLevel" name="account" class="form-control">
                                  <option><?php echo $class_data_row['gradeLevel']; ?></option>
                                  
                                  <option>Grade 11</option>
                                  <option>Grade 12</option>
                                  </select>
                              </div>
                            </div>
 
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Strand</label>
                              <div class="col-sm-10">
                                <select name="strand" name="account" class="form-control">
                                  <option><?php echo $class_data_row['strand']; ?></option>
                                  <option>ABM</option>
                                  <option>GAS</option>
                                  <option>HUMSS</option>
                                  <option>STEM</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Section</label>
                              <div class="col-sm-10">
                                <input value="<?php echo $class_data_row['section']; ?>" name="section" type="text" class="form-control">
                              </div>
                            </div> 
                        </div>
                        
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateClass" type="submit" class="btn btn-primary">Update</button>
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
                  
                  <a style="color: white !important;" data-toggle="modal" data-target="#addClassCollege" href="#" class="btn btn-primary"><i class="fa fa-plus"></i></a>&nbsp;
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-box2" aria-expanded="true" aria-controls="updates-box2">College <small>(SY <?php echo $data_src_sy; ?>)</small></a>
                  
                  </h2><a data-toggle="collapse" data-parent="#new-updates2" href="#updates-box2" aria-expanded="true" aria-controls="updates-box2"><i class="fa fa-angle-down"></i></a>
                
                </div>
                <div id="updates-box2" role="tabpanel" class="collapse show">
                
                
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                      <thead>
                        <tr>
                        
                          <th>Year Level</th>
                          <th>Course</th>
                          <th>Major</th>
                          <th>Section</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                            <?php
                            $subjK_ctr=0;   
                            $subjK_query = $conn->query("select * FROM classes WHERE dept='College' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, strand, section ASC") or die(mysql_error());
                            while ($class_data_row = $subjK_query->fetch()) 
                            { 
                                $class_id=$class_data_row['class_id'];
                                ?>
                            
                          <tr>
                     
                          <td><?php echo $class_data_row['gradeLevel']; ?></td>
                          <td><?php echo $class_data_row['strand']; ?></td>
                          <td><?php echo $class_data_row['major']; ?></td>
                          <td><?php echo $class_data_row['section']; ?></td>
 
                          <td>
                          
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          
                          <?php
                          $class_query = $conn->query("SELECT * FROM students WHERE class_id='$class_id' AND schoolYear='$data_src_sy'") or die(mysql_error());
                          if($class_query->rowCount()>0){?> 
                          <a style="color: white !important;" data-toggle="modal" data-target="#editClassCollege<?php echo $class_id; ?>" href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-times"></i></a>
                          
                          <?php }else{ ?>
                          <a style="color: white !important;" data-toggle="modal" data-target="#editClassCollege<?php echo $class_id; ?>" href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteClassCollege<?php echo $class_id; ?>" href="#" class="btn btn-danger"><i class="fa fa-times"></i></a>
                          
                          <?php } ?>
                          
                          <?php }else{ ?>
                          
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" class="btn btn-default"><i class="fa fa-times"></i></a>
                          
                          
                          <?php } ?>
 
                          </td>
                          </tr>  
                       
                       
                       <!-- delete Class Modal -->
                  <div id="deleteClassCollege<?php echo $class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="save_add_class.php" method="POST">
                      <input name="class_id" value="<?php echo $class_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Delete Class [ College ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                           
                        <h4>Are you sure you want to delete class:<br /><br /><?php echo $class_data_row['gradeLevel']." - ".$class_data_row['strand']." ".$class_data_row['major']." - ".$class_data_row['section']; ?>?</h4>
                          
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                          <button name="deleteClass" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end delete Class Modal -->
                       
                       <!-- edit Class Modal -->
                  <div id="editClassCollege<?php echo $class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="save_add_class.php" method="POST">
                      <input name="class_id" value="<?php echo $class_id; ?>" type="hidden" />
                       
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Class [ College ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Year Level</label>
                              <div class="col-sm-10">
                                <select name="gradeLevel" class="form-control">
                                  <option><?php echo $class_data_row['gradeLevel']; ?></option>
                                  <option>1st Year</option>
                                  <option>2nd Year</option>
                                  <option>3rd Year</option>
                                  <option>4th Year</option>
                                  
                                  </select>
                              </div>
                            </div>
 
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Course</label>
                              <div class="col-sm-10">
                                <select name="strand" class="form-control">
                                  <option><?php echo $class_data_row['strand']; ?></option>
                                  <option>BSED</option>
                                  <option>BEED</option>
                                  <option>BSCS</option>
                                  <option>BSIT</option>
                                  <option>BSOA</option>
                                  <option>BSBA</option>
                                  <option>BSPSYCH</option>
                                  <option>BSTM</option>
                                  <option>BSHM</option>
                                  <option>ACT</option>
                                  <option>AOA</option>
                                </select>
                              </div>
                            </div> 
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Major</label>
                              <div class="col-sm-10">
                                <select name="major" class="form-control" style="font-size: small;">
                                  <option value="<?php echo $class_data_row['major']; ?>"><?php echo $class_data_row['major']; ?></option>
                                  <option>N/A</option>
                                  <option value="English">English (BSED)</option>
                                  <option value="Filipino">Filipino (BSED)</option>
                                  <option value="Mathematics">Mathematics (BSED)</option>
                                  <option value="Science">Science (BSED)</option>
                                  <option value="Social Studies">Social Studies (BSED)</option>
                                  <option value="Values Education">Values Education (BSED)</option>
                                  <option value="FM">Financial Management (BSBA)</option>
                                  <option value="HRDM">Human Resource Development Management (BSBA)</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Section</label>
                              <div class="col-sm-10">
                                <input value="<?php echo $class_data_row['section']; ?>" name="section" type="text" class="form-control">
                              </div>
                            </div>
 
                            
                        </div>
                        
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateClass" type="submit" class="btn btn-primary">Update</button>
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
        
        <?php include('add_classes_modal.php'); ?>
                  
      </section>
      
 
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
    
  </body>
</html>