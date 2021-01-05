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
            
            <li class="breadcrumb-item active">Assessment Requests - <?php echo $_GET['dept']; ?></li>
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
              

             <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">ASSESSMENT REQUESTS <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
              
                <div class="tab" style="margin-top: 8px; margin-bottom: 12px;">
              
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_assessment_reqs.php?dept=Grade School" class="tablinks active" style="font-weight: bolder;">Grade School&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr1_query->rowCount(); ?></div></a>
                <?php }else{?>
                <a title="Grade School student list" href="list_assessment_reqs.php?dept=Grade School" class="tablinks">Grade School&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr1_query->rowCount(); ?></div></a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Junior High School"){ ?>
                <a title="Junior High School student list" href="list_assessment_reqs.php?dept=Junior High School" class="tablinks active" style="font-weight: bolder;">JHS&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr2_query->rowCount(); ?></div></a>
                <?php }else{?>
                <a title="Junior High School student list" href="list_assessment_reqs.php?dept=Junior High School" class="tablinks">JHS&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr2_query->rowCount(); ?></div></a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Senior High School"){ ?>
                <a title="Senior High School student list" href="list_assessment_reqs.php?dept=Senior High School" class="tablinks active" style="font-weight: bolder;">SHS&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr3_query->rowCount(); ?></div></a>
                <?php }else{?>
                <a title="Senior High School student list" href="list_assessment_reqs.php?dept=Senior High School" class="tablinks">SHS&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr3_query->rowCount(); ?></div></a>
                <?php } ?>
           
                <?php if($_GET['dept']=="College"){ ?>
                <a title="College student list" href="list_assessment_reqs.php?dept=College" class="tablinks active" style="font-weight: bolder;">College&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr4_query->rowCount(); ?></div></a>
                <?php }else{?>
                <a title="College student list" href="list_assessment_reqs.php?dept=College" class="tablinks">College&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr4_query->rowCount(); ?></div></a>
                <?php } ?>
                
                </div>
                
                <div class="table-responsive" style="margin-top: 18px;">
                
                <table id="" class="display" style="width:100%;">
                
                        <thead>
                        <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Class Details</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
                      
                      $studData_query = $conn->query("SELECT * FROM students WHERE dept='$_GET[dept]' AND status='For Accounts Assessment' ORDER BY lname, fname") or die(mysql_error());
                      while ($studData_row = $studData_query->fetch()) 
                      {
                        
                        $reg_id=$studData_row['reg_id'];
                        $catCtr+=1;
                      
                      if($studData_row['mname']=='')
                      {
                        $finalMName='';
                      
                      }else{
                        
                        if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                        
                        $finalMName=$suffix.substr($studData_row['mname'], 0, 1).'.';
                      }
                        
                        ?>
                        
                        
                        <tr>
                        
                        <td>
                        <?php echo $catCtr; ?>
                        </td>
                        
                        <td>
                        <?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?>
                        </td>
                        
                        <td>
                        <?php
                        
                            if($_GET['dept']=="Grade School" OR $_GET['dept']=="Junior High School")
                            {
                                echo $studData_row['gradeLevel'];
                            }elseif($_GET['dept']=="Senior High School"){
                                echo $studData_row['gradeLevel']." - ".$studData_row['strand'];
                            }else{
                                echo $studData_row['gradeLevel']." - ".$studData_row['strand'].' '.$studData_row['major'] ;
                            }
                            
                        ?>
                        </td>
                        
                        
                        <td>
                        <a href="list_assessment_reqs_setup.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $reg_id; ?>" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-primary"><i class="fa fa-gear"></i> Setup Assessment</a>
                        </td>
                        </tr>
                        
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
