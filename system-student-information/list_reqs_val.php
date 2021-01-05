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
  
          <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><strong style="font-weight: bold;">REQUIREMENTS FOR VALIDATION</strong>&nbsp;<div class="badge badge-info">SY <?php echo $data_src_sy; ?></div></a>
                  
                  </h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxKinder" role="tabpanel" class="collapse show">
                
                <div class="col-lg-12">
                
                <div class="table-responsive" style="margin-top: 12px;">
                        <table id="" class="display" style="width:100%">
                 
                          <thead>
                          <th>Student</th>
                          <th>Requirements</th>
                          <th>Uploaded File</th>
                          <th>Remarks</th>
                          <th>Action</th>
                          </thead>
                          
                          <tbody>
                          <?php
                          $reqStud_query = $conn->query("SELECT * FROM tbl_reqs_students WHERE status='For Validation' ORDER BY stud_reqs_id DESC");
                          while($reqStud_row=$reqStud_query->fetch()){
                          
                          $reqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE require_id='$reqStud_row[require_id]'");
                          $reqs_row=$reqs_query->fetch();
                            
                          $studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$reqStud_row[reg_id]'") or die(mysql_error());
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
                            
                          if($studData_row['dept']===$_GET['dept'])
                            
                          { ?>
                          
                          <tr>
                          
                          <td style="vertical-align: top;">
                          <?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?> <small class="badge badge-info"><?php echo $studData_row['classification']; ?></small><br />
                          <small><?php echo $classDetails; ?></small><br />
                          <small class="text-primary"><?php echo $studData_row['dept']; ?></small>
                          </td>
                          
                          <td style="width: 25%;"><?php echo $reqs_row['requirement_name']; ?><br />
                          <small><?php echo $reqs_row['description']; ?></small><br />
                          <small class="text-primary"><?php echo $reqs_row['purpose']; ?></small>
                          </td>
                          
                          <td style="text-align: center; width: 15%;">
                          
                          <img id="theImage<?php echo $reqStud_row['require_id']; ?>" src="<?php echo '../user-student/'.$reqStud_row['img']; ?>" style="width: 50%; height: 50%; display: block; cursor: pointer;" title="Click to view full screen..." class="fullscreen" onclick="makeFullScreen<?php echo $reqStud_row['require_id']; ?>()" />
                            
                            
                            <script>
                            function makeFullScreen<?php echo $reqStud_row['require_id']; ?>() {
                                var divObj = document.getElementById("theImage<?php echo $reqStud_row['require_id']; ?>");
                                //Use the specification method before using prefixed versions
                                if (divObj.requestFullscreen) {
                                divObj.requestFullscreen();
                                }
                                else if (divObj.msRequestFullscreen) {
                                divObj.msRequestFullscreen();               
                                }
                                else if (divObj.mozRequestFullScreen) {
                                divObj.mozRequestFullScreen();      
                                }
                                else if (divObj.webkitRequestFullscreen) {
                                divObj.webkitRequestFullscreen();       
                                } else {
                                console.log("Fullscreen API is not supported");
                                } 
                        
                            }
                            </script>
                            <small><?php echo $reqStud_row['student_remarks']; ?></small>
                          </td>
                          
                          
                          <td><?php echo $reqStud_row['remarks']; ?></td>
                          
                          <td>
                            <a data-toggle="modal" data-target="#viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" class="btn btn-primary btn-sm" title="Validate file..." href="#" style="margin-bottom: 4px; color: white;"><i class="fa fa-check"></i></a>
                            <a class="btn btn-success btn-sm" title="Download file..." href="<?php echo $reqStud_row['img']; ?>" style="margin-bottom: 4px; color: white;" download><i class="fa fa-download"></i></a>
                          </td>
                          
                          </tr>
                           
                          <!-- view file Modal -->
                          <div id="viewFile<?php echo $reqStud_row['stud_reqs_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                                <form action="save_requirements_validation2.php?dept=<?php echo $_GET['dept']; ?>&stud_reqs_id=<?php echo $reqStud_row['stud_reqs_id']; ?>" method="POST">
                                
                                <input name="reg_id" value="<?php echo $studData_row['reg_id']; ?>" type="hidden" />
                                <input name="gradeLevel" value="<?php echo $studData_row['gradeLevel']; ?>" type="hidden" />
                                <input name="strand" value="<?php echo $studData_row['strand']; ?>" type="hidden" />
                                <input name="major" value="<?php echo $studData_row['major']; ?>" type="hidden" />
                                <input name="classification" value="<?php echo $studData_row['classification']; ?>" type="hidden" />
                                <input name="status" value="<?php echo $studData_row['status']; ?>" type="hidden" />
                                
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">VALIDATE FILE</h5>
                                  <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="icon-close"></span></a>
                                </div>
                                
                                <div class="modal-body">
                                <div class="form-group">
                                    <p>
                                    <?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?> <small class="badge badge-info"><?php echo $studData_row['classification']; ?></small><br />
                                    <small class="text-primary"><?php echo $studData_row['dept']; ?></small> &nbsp;&middot;&nbsp;<small><?php echo $classDetails; ?></small>
                                    </p>
                                    <p><?php echo $reqs_row['requirement_name']; ?></p>
                                    <img src="<?php echo '../user-student/'.$reqStud_row['img']; ?>" style="width: 100%; height: 100%;" />
                                </div>
                                
                                <div class="form-group">
                                    <p>Uploader's Remarks: <?php echo $reqStud_row['student_remarks']; ?></p>
                                </div>
                                
                                <div class="form-group">
                                <hr />
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
                          <?php } } ?>
                                            
                          </tbody>
                          
                        </table>
                        
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