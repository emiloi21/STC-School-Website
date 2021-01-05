<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
  <?php
  
  $studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$_GET[regx_id]'") or die(mysql_error());
  $studData_row = $studData_query->fetch();
  
      if($studData_row['mname']=='')
      {
        $finalMName='';
                                    
      }else{
        
        if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
        
        $finalMName=$suffix.$studData_row['mname'];
      }
      
      if($studData_row['dept']==='College'){
        
        $classDetails=$studData_row['gradeLevel'].' - '.$studData_row['strand'].' '.$studData_row['major'].' - '.$studData_row['section'];
      
      }elseif($studData_row['dept']==='Senior High School'){
        
        $classDetails=$studData_row['gradeLevel'].' - '.$studData_row['strand'].' - '.$studData_row['section'];
      
      }else{
        
        $classDetails=$studData_row['gradeLevel'].' - '.$studData_row['section'];
      
      }
      
        echo $classDetails;
                        
  ?>
 
 
<body>
  
  <!--div id="load"></div-->

  <?php include('menu_sidebar.php'); ?>
  

    <div class="page">

    <?php include('navbar_header.php'); ?>
    
    <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li style="color: blue"><strong><?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $_GET['class_id']; ?>">Class: <?php echo $classDetails; ?></a></li>
            <li class="breadcrumb-item active">Student Details</li>
             
          </ul>
          
        </div>
      </div>
      
      <!-- Header Section-->
 
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
             <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                 
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?>&nbsp;<div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                    
                    <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
                
                </div>
                
                
                <div id="updates-boxContacts" role="tabpanel" class="collapse show">
                <div class="col-lg-12">
                
                <div class="tab" style="margin-top: 8px;">
                  <a class="tablinks active" onclick="openCity(event, 'London')">Student Profile</a>
                  <a class="tablinks" onclick="openCity(event, 'Paris')">Requirements</a>
                </div>
                 
                 
                <div id="London" class="tabcontent" style="display: block;">
                    
                    <?php include('stud_details.php'); ?>
                      
                </div>
                
                <div id="Paris" class="tabcontent">
                <div class="table-responsive" style="margin-top: 12px;">
                        
                        <h5>FOR ADMISSION</h5>
                        <table id="" class="display" style="width:100%">
                 
                          <thead>
                          <th>Requirements</th>
                          <th>Uploaded File</th>
                          <th>Remarks</th>
                          <th>Status</th>
                          <th>Action</th>
                          </thead>
                          
                          <tbody>
                          <?php
                          $reqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='$studData_row[dept]' AND gradeLevel='$studData_row[gradeLevel]' AND strand='$studData_row[strand]' AND major='$studData_row[major]' AND classification='$studData_row[classification]' AND purpose='for Admission'");
                          while($reqs_row=$reqs_query->fetch()){
                          
                          $reqStud_query = $conn->query("SELECT * FROM tbl_reqs_students WHERE require_id='$reqs_row[require_id]' AND reg_id='$studData_row[reg_id]'");
                          $reqStud_row=$reqStud_query->fetch();
                            
                          ?>
                          
                          <tr>
                          <td style="width: 25%;"><?php echo $reqs_row['requirement_name']; ?><br />
                          <small><?php echo $reqs_row['description']; ?></small>
                          </td>
                          
                          <td style="text-align: center; width: 25%;">
                          <?php
                          if($reqStud_query->rowCount()<=0){
                            echo "No uploaded file...";
                          }else{ ?>
                            <a data-toggle="modal" data-target="#viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" title="Click to re-upload file..." style="cursor: pointer;">
                            <img src="<?php echo '../user-student/'.$reqStud_row['img']; ?>" style="width: 50%; height: 50%; display: block;" />
                            </a>
                          <?php } ?>
                          </td>
                          
                          
                          <td><?php echo $reqStud_row['remarks']; ?></td>
                          
                          <td><?php echo $reqStud_row['status']; ?></td>
                          
                          <td>
                            <a data-toggle="modal" data-target="#viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" class="btn btn-primary btn-sm" title="Validate file..." href="#" style="margin-bottom: 4px; color: white;"><i class="fa fa-check"></i></a>
                            <a class="btn btn-success btn-sm" title="Download file..." href="<?php echo $reqStud_row['img']; ?>" style="margin-bottom: 4px; color: white;" download><i class="fa fa-download"></i></a>
                          </td>
                          
                          </tr>
                           
                          <!-- view file Modal -->
                          <div id="viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                                <form action="save_requirements_validation.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>&class_id=<?php echo $_GET['class_id']; ?>&stud_reqs_id=<?php echo $reqStud_row['stud_reqs_id']; ?>" method="POST">
                                
                                <input name="reg_id" value="<?php echo $studData_row['reg_id']; ?>" type="hidden" />
                                <input name="gradeLevel" value="<?php echo $studData_row['gradeLevel']; ?>" type="hidden" />
                                <input name="strand" value="<?php echo $studData_row['strand']; ?>" type="hidden" />
                                <input name="major" value="<?php echo $studData_row['major']; ?>" type="hidden" />
                                <input name="classification" value="<?php echo $studData_row['classification']; ?>" type="hidden" />
                                
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">VALIDATE FILE</h5>
                                  <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="icon-close"></span></a>
                                </div>
                                
                                <div class="modal-body">
                                <div class="form-group"> 
                                  <label><?php echo $reqs_row['requirement_name']; ?></label>
                                  <img src="<?php echo '../user-student/'.$reqStud_row['img']; ?>" style="width: 100%; height: 100%;" />
                                </div>
                                <div class="form-group"> 
                                  <label>Remarks</label>
                                  <textarea name="remarks" class="form-control" rows="2" style="resize: none;" placeholder="Remarks..."></textarea>
                                </div>
                                
                                </div>
                                
                                <div class="modal-footer">
                                  
                                  <button name="invalid_file" class="btn btn-danger"> Invalid File</button>
                                  <button name="valid_file" class="btn btn-primary"> Valid File</button>
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Close</a>
                                  
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end view file Modal -->
                          
                          <?php } ?>
                                            
                          </tbody>
                          
                        </table>
                        
                        
                        
                        <hr />
                        <h5>FOR SCHOLARSHIP</h5>
                        <table id="" class="display" style="width:100%">
                 
                          <thead>
                          <th>Requirements</th>
                          <th>Uploaded File</th>
                          <th>Remarks</th>
                          <th>Status</th>
                          <th>Action</th>
                          </thead>
                          
                          <tbody>
                          <?php
                          $reqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='$studData_row[dept]' AND gradeLevel='$studData_row[gradeLevel]' AND strand='$studData_row[strand]' AND major='$studData_row[major]' AND classification='$studData_row[classification]' AND purpose='for Scholarship'");
                          while($reqs_row=$reqs_query->fetch()){
                          
                          $reqStud_query = $conn->query("SELECT * FROM tbl_reqs_students WHERE require_id='$reqs_row[require_id]' AND reg_id='$studData_row[reg_id]'");
                          $reqStud_row=$reqStud_query->fetch();
                            
                          ?>
                          
                          <tr>
                          <td style="width: 25%;"><?php echo $reqs_row['requirement_name']; ?><br />
                          <small><?php echo $reqs_row['description']; ?></small>
                          </td>
                          
                          <td style="text-align: center; width: 25%;">
                          <?php
                          if($reqStud_query->rowCount()<=0){
                            echo "No uploaded file...";
                          }else{ ?>
                            <a data-toggle="modal" data-target="#viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" title="Click to re-upload file..." style="cursor: pointer;">
                            <img src="<?php echo '../user-student/'.$reqStud_row['img']; ?>" style="width: 50%; height: 50%; display: block;" />
                            </a>
                          <?php } ?>
                          </td>
                          
                          
                          <td><?php echo $reqStud_row['remarks']; ?></td>
                          
                          <td><?php echo $reqStud_row['status']; ?></td>
                          
                          <td>
                            <a data-toggle="modal" data-target="#viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" class="btn btn-primary btn-sm" title="Validate file..." href="#" style="margin-bottom: 4px; color: white;"><i class="fa fa-check"></i></a>
                            <a class="btn btn-success btn-sm" title="Download file..." href="<?php echo $reqStud_row['img']; ?>" style="margin-bottom: 4px; color: white;" download><i class="fa fa-download"></i></a>
                          </td>
                          
                          </tr>
                           
                          <!-- view file Modal -->
                          <div id="viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                                <form action="save_requirements_validation.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>&class_id=<?php echo $_GET['class_id']; ?>&stud_reqs_id=<?php echo $reqStud_row['stud_reqs_id']; ?>" method="POST">
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">VALIDATE FILE</h5>
                                  <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="icon-close"></span></a>
                                </div>
                                
                                <div class="modal-body">
                                <div class="form-group"> 
                                  <label><?php echo $reqs_row['requirement_name']; ?></label>
                                  <img src="<?php echo '../user-student/'.$reqStud_row['img']; ?>" style="width: 100%; height: 100%;" />
                                </div>
                                <div class="form-group"> 
                                  <label>Remarks</label>
                                  <textarea name="remarks" class="form-control" rows="2" style="resize: none;" placeholder="Remarks..."></textarea>
                                </div>
                                
                                </div>
                                
                                <div class="modal-footer">
                                  
                                  <button name="invalid_file" class="btn btn-danger"> Invalid File</button>
                                  <button name="valid_file" class="btn btn-primary"> Valid File</button>
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Close</a>
                                  
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end view file Modal -->
                          
                          <?php } ?>
                                            
                          </tbody>
                          
                        </table>
                        
                        
                        <hr />
                        <h5>FOR GOVERNMENT SUBSIDY</h5>
                        <table id="" class="display" style="width:100%">
                 
                          <thead>
                          <th>Requirements</th>
                          <th>Uploaded File</th>
                          <th>Remarks</th>
                          <th>Status</th>
                          <th>Action</th>
                          </thead>
                          
                          <tbody>
                          <?php
                          $reqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='$studData_row[dept]' AND gradeLevel='$studData_row[gradeLevel]' AND strand='$studData_row[strand]' AND major='$studData_row[major]' AND classification='$studData_row[classification]' AND purpose='for Government Subsidy'");
                          while($reqs_row=$reqs_query->fetch()){
                          
                          $reqStud_query = $conn->query("SELECT * FROM tbl_reqs_students WHERE require_id='$reqs_row[require_id]' AND reg_id='$studData_row[reg_id]'");
                          $reqStud_row=$reqStud_query->fetch();
                            
                          ?>
                          
                          <tr>
                          <td style="width: 25%;"><?php echo $reqs_row['requirement_name']; ?><br />
                          <small><?php echo $reqs_row['description']; ?></small>
                          </td>
                          
                          <td style="text-align: center; width: 25%;">
                          <?php
                          if($reqStud_query->rowCount()<=0){
                            echo "No uploaded file...";
                          }else{ ?>
                            <a data-toggle="modal" data-target="#viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" title="Click to re-upload file..." style="cursor: pointer;">
                            <img src="<?php echo '../user-student/'.$reqStud_row['img']; ?>" style="width: 50%; height: 50%; display: block;" />
                            </a>
                          <?php } ?>
                          </td>
                          
                          
                          <td><?php echo $reqStud_row['remarks']; ?></td>
                          
                          <td><?php echo $reqStud_row['status']; ?></td>
                          
                          <td>
                            <a data-toggle="modal" data-target="#viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" class="btn btn-primary btn-sm" title="Validate file..." href="#" style="margin-bottom: 4px; color: white;"><i class="fa fa-check"></i></a>
                            <a class="btn btn-success btn-sm" title="Download file..." href="<?php echo $reqStud_row['img']; ?>" style="margin-bottom: 4px; color: white;" download><i class="fa fa-download"></i></a>
                          </td>
                          
                          </tr>
                           
                          <!-- view file Modal -->
                          <div id="viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                                <form action="save_requirements_validation.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>&class_id=<?php echo $_GET['class_id']; ?>&stud_reqs_id=<?php echo $reqStud_row['stud_reqs_id']; ?>" method="POST">
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">VALIDATE FILE</h5>
                                  <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="icon-close"></span></a>
                                </div>
                                
                                <div class="modal-body">
                                <div class="form-group"> 
                                  <label><?php echo $reqs_row['requirement_name']; ?></label>
                                  <img src="<?php echo '../user-student/'.$reqStud_row['img']; ?>" style="width: 100%; height: 100%;" />
                                </div>
                                <div class="form-group"> 
                                  <label>Remarks</label>
                                  <textarea name="remarks" class="form-control" rows="2" style="resize: none;" placeholder="Remarks..."></textarea>
                                </div>
                                
                                </div>
                                
                                <div class="modal-footer">
                                  
                                  <button name="invalid_file" class="btn btn-danger"> Invalid File</button>
                                  <button name="valid_file" class="btn btn-primary"> Valid File</button>
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Close</a>
                                  
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end view file Modal -->
                          
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
          </div>
      </section>
      
      <?php include('footer.php'); ?>
      
    </div>
    
        <?php include('scripts_files.php'); ?>
 
  </body>
</html>
