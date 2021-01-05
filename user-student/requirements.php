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
            <li style="color: blue"><strong>SY <?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Requirements - <?php echo $studData_row['dept']; ?></li>
          </ul>
          
        </div>
      </div>
      
      <?php include('quick_count.php'); ?>
      
      <section class="forms">
        <div class="container-fluid">
         
          <div class="row">
            <div class="col-lg-12">
            
            <h4>LIST OF REQUIREMENTS</h4>
            <hr />
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
                      
                      <tr <?php if($reqStud_row['status']==='Disapproved'){ ?>style="color: #dc3545;"<?php }elseif($reqStud_row['status']==='Approved'){ ?>style="color: #28a745;"<?php } ?>>

                      <td style="width: 25%;"><?php echo $reqs_row['requirement_name']; ?><br />
                      <small><?php echo $reqs_row['description']; ?></small>
                      </td>
                      
                      <td style="text-align: center; width: 25%;">
                      <?php
                      if($reqStud_query->rowCount()<=0){
                        echo "No uploaded file...";
                      }else{ ?>
                        <a data-toggle="modal" data-target="#uploadUpdateAF<?php echo $reqStud_row['stud_reqs_id']; ?>" title="Click to re-upload file..." style="cursor: pointer;">
                        <img src="<?php echo $reqStud_row['img']; ?>" style="width: 50%; height: 50%; display: block;" />
                        </a>
                      <?php } ?>
                      </td>
                      
                      
                      <td><?php echo $reqStud_row['student_remarks']; ?></td>
                      
                      <td>
                      <?php echo $reqStud_row['status']; ?><br />
                      <small><?php echo $reqStud_row['remarks']; ?></small>
                      </td>
                      
                      <td>
                      <?php
                      if($reqStud_query->rowCount()<=0){ ?>
                        <a data-toggle="modal" data-target="#uploadAdmissionFile<?php echo $reqs_row['require_id']; ?>" class="btn btn-primary btn-sm" title="Upload file..." href="#" style="margin-bottom: 4px;"><i class="fa fa-upload"></i> File</a>
                      <?php }else{ ?>
                        <a data-toggle="modal" data-target="#uploadUpdateAF<?php echo $reqStud_row['stud_reqs_id']; ?>" class="btn btn-primary btn-sm" title="Upload file..." href="#" style="margin-bottom: 4px;"><i class="fa fa-upload"></i></a>
                        <a class="btn btn-success btn-sm" title="Download file..." href="<?php echo $reqStud_row['img']; ?>" style="margin-bottom: 4px;" download><i class="fa fa-download"></i></a>
                      <?php } ?>
                      
                      
                      </td>
                      
                      </tr>
                      
                      <?php include('requirements_add_modal.php'); ?>
                      
                      
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
                        <a data-toggle="modal" data-target="#uploadUpdateAF<?php echo $reqs_row['require_id']; ?>" title="Click to re-upload file..." style="cursor: pointer;">
                        <img src="<?php echo $reqStud_row['img']; ?>" style="width: 50%; height: 50%; display: block;" />
                        </a>
                      <?php } ?>
                      </td>
                      
                      
                      <td><?php echo $reqStud_row['student_remarks']; ?></td>
                      
                      <td>
                      <?php echo $reqStud_row['status']; ?><br />
                      <small><?php echo $reqStud_row['remarks']; ?></small>
                      </td>
                      
                      <td>
                      <?php
                      if($reqStud_query->rowCount()<=0){ ?>
                        <a data-toggle="modal" data-target="#uploadAdmissionFile<?php echo $reqs_row['require_id']; ?>" class="btn btn-primary btn-sm" title="Upload file..." href="#" style="margin-bottom: 4px;"><i class="fa fa-upload"></i> File</a>
                      <?php }else{ ?>
                        <a data-toggle="modal" data-target="#uploadUpdateAF<?php echo $reqs_row['require_id']; ?>" class="btn btn-primary btn-sm" title="Upload file..." href="#" style="margin-bottom: 4px;"><i class="fa fa-upload"></i></a>
                        <a class="btn btn-success btn-sm" title="Download file..." href="<?php echo $reqStud_row['img']; ?>" style="margin-bottom: 4px;" download><i class="fa fa-download"></i></a>
                      <?php } ?>
                      
                      
                      </td>
                      
                      </tr>
                      
                      <?php include('requirements_add_modal.php'); ?>
                      
                      
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
                        <a data-toggle="modal" data-target="#uploadUpdateAF<?php echo $reqs_row['require_id']; ?>" title="Click to re-upload file..." style="cursor: pointer;">
                        <img src="<?php echo $reqStud_row['img']; ?>" style="width: 50%; height: 50%; display: block;" />
                        </a>
                      <?php } ?>
                      </td>
                      
                      
                      <td><?php echo $reqStud_row['student_remarks']; ?></td>
                      
                      <td>
                      <?php echo $reqStud_row['status']; ?><br />
                      <small><?php echo $reqStud_row['remarks']; ?></small>
                      </td>
                      
                      <td>
                      <?php
                      if($reqStud_query->rowCount()<=0){ ?>
                        <a data-toggle="modal" data-target="#uploadAdmissionFile<?php echo $reqs_row['require_id']; ?>" class="btn btn-primary btn-sm" title="Upload file..." href="#" style="margin-bottom: 4px;"><i class="fa fa-upload"></i> File</a>
                      <?php }else{ ?>
                        <a data-toggle="modal" data-target="#uploadUpdateAF<?php echo $reqs_row['require_id']; ?>" class="btn btn-primary btn-sm" title="Upload file..." href="#" style="margin-bottom: 4px;"><i class="fa fa-upload"></i></a>
                        <a class="btn btn-success btn-sm" title="Download file..." href="<?php echo $reqStud_row['img']; ?>" style="margin-bottom: 4px;" download><i class="fa fa-download"></i></a>
                      <?php } ?>
                      
                      
                      </td>
                      
                      </tr>
                      
                      <?php include('requirements_add_modal.php'); ?>
                      
                      
                      <?php } ?>
                                        
                      </tbody>
                      
                    </table>
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