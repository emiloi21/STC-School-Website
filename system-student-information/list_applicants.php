<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
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
            
            <li class="breadcrumb-item active">Enrollment List</li>
            <li class="breadcrumb-item active"><?php echo $_GET['status']; ?> - <?php echo $_GET['dept']; ?></li>
             
          </ul>
          
        </div>
      </div>
      
      <!-- Header Section-->
 
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              

             <!-- Preparatory     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">ENROLLMENT&nbsp;<div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                    
                    <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
                
                </div>
                
                
                <div id="updates-boxContacts" role="tabpanel" class="collapse show">
                <div class="col-lg-12">
                
                <div class="tab" style="margin-top: 8px;">
                
                
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_applicants.php?dept=Grade School&gradeLevel=&strand=N/A&major=N/A&status=" class="tablinks active" style="font-weight: bolder;">Grade School&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $ctr_stat_gs; ?></div></a>
                <?php }else{?>
                <a title="Grade School student list" href="list_applicants.php?dept=Grade School&gradeLevel=&strand=N/A&major=N/A&status=" class="tablinks">Grade School&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $ctr_stat_gs; ?></div></a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Junior High School"){ ?>
                <a title="Junior High School student list" href="list_applicants.php?dept=Junior High School&gradeLevel=&strand=N/A&major=N/A&status=" class="tablinks active" style="font-weight: bolder;">JHS&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $ctr_stat_jhs; ?></div></a>
                <?php }else{?>
                <a title="Junior High School student list" href="list_applicants.php?dept=Junior High School&gradeLevel=&strand=N/A&major=N/A&status=" class="tablinks">JHS&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $ctr_stat_jhs; ?></div></a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Senior High School"){ ?>
                <a title="Senior High School student list" href="list_applicants.php?dept=Senior High School&gradeLevel=&strand=N/A&major=N/A&status=" class="tablinks active" style="font-weight: bolder;">SHS&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $ctr_stat_shs; ?></div></a>
                <?php }else{?>
                <a title="Senior High School student list" href="list_applicants.php?dept=Senior High School&gradeLevel=&strand=N/A&major=N/A&status=" class="tablinks">SHS&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $ctr_stat_shs; ?></div></a>
                <?php } ?>
           
                <?php if($_GET['dept']=="College"){ ?>
                <a title="College student list" href="list_applicants.php?dept=College&gradeLevel=&strand=N/A&major=N/A&status=" class="tablinks active" style="font-weight: bolder;">College&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $ctr_stat_col; ?></div></a>
                <?php }else{?>
                <a title="College student list" href="list_applicants.php?dept=College&gradeLevel=&strand=N/A&major=N/A&status=" class="tablinks">College&nbsp;&nbsp;
                <div class="badge badge-warning"><?php echo $ctr_stat_col; ?></div></a>
                <?php } ?>
                
                </div>
                
                <div class="tab" style="margin-top: 12px;">
                
                <?php if($_GET['status']=="Setup"){ ?>
                <a title="Setup accounts status list" href="list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&status=Setup" class="tablinks active" style="font-weight: bolder;"><small style="font-weight: bold;">Account Setup&nbsp;
                <div class="badge badge-warning"><?php if($_GET['dept']=="Grade School"){ echo $req_ctr1_query->rowCount(); }elseif($_GET['dept']=="Junior High School"){ echo $req_ctr2_query->rowCount(); }elseif($_GET['dept']=="Senior High School"){ echo $req_ctr3_query->rowCount(); }elseif($_GET['dept']=="College"){ echo $req_ctr4_query->rowCount(); } ?></div></small></a>
                <?php }else{?>
                <a title="Setup accounts status list" href="list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&status=Setup" class="tablinks"><small>Account Setup&nbsp;
                <div class="badge badge-warning"><?php if($_GET['dept']=="Grade School"){ echo $req_ctr1_query->rowCount(); }elseif($_GET['dept']=="Junior High School"){ echo $req_ctr2_query->rowCount(); }elseif($_GET['dept']=="Senior High School"){ echo $req_ctr3_query->rowCount(); }elseif($_GET['dept']=="College"){ echo $req_ctr4_query->rowCount(); } ?></div></small></a>
                <?php } ?>
                
                
                <?php if($_GET['status']=="For Application Assessment"){ ?>
                <a title="Setup accounts status list" href="list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&status=For Application Assessment" class="tablinks active" style="font-weight: bolder;"><small style="font-weight: bold;">For Application Assessment&nbsp;
                <div class="badge badge-warning"><?php if($_GET['dept']=="Grade School"){ echo $req_ctr11_query->rowCount(); }elseif($_GET['dept']=="Junior High School"){ echo $req_ctr22_query->rowCount(); }elseif($_GET['dept']=="Senior High School"){ echo $req_ctr33_query->rowCount(); }elseif($_GET['dept']=="College"){ echo $req_ctr44_query->rowCount(); } ?></div></small></a>
                <?php }else{?>
                <a title="Setup accounts status list" href="list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&status=For Application Assessment" class="tablinks"><small>For Application Assessment&nbsp;
                <div class="badge badge-warning"><?php if($_GET['dept']=="Grade School"){ echo $req_ctr11_query->rowCount(); }elseif($_GET['dept']=="Junior High School"){ echo $req_ctr22_query->rowCount(); }elseif($_GET['dept']=="Senior High School"){ echo $req_ctr33_query->rowCount(); }elseif($_GET['dept']=="College"){ echo $req_ctr44_query->rowCount(); } ?></div></small></a>
                <?php } ?>
                
                
                <?php if($_GET['status']=="For Accounts Assessment"){ ?>
                <a title="Setup accounts status list" href="list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&status=For Accounts Assessment" class="tablinks active" style="font-weight: bolder;"><small style="font-weight: bold;">For Accounts Assessment&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr111_query->rowCount(); ?></div></small></a>
                <?php }else{?>
                <a title="Setup accounts status list" href="list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&status=For Accounts Assessment" class="tablinks"><small>For Accounts Assessment&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr111_query->rowCount(); ?></div></small></a>
                <?php } ?>
                
                <?php if($_GET['status']=="For Payment"){ ?>
                <a title="Setup accounts status list" href="list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&status=For Payment" class="tablinks active" style="font-weight: bolder;"><small style="font-weight: bold;">For Payment&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr1111_query->rowCount(); ?></div></small></a>
                <?php }else{?>
                <a title="Setup accounts status list" href="list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&status=For Payment" class="tablinks"><small>For Payment&nbsp;
                <div class="badge badge-warning"><?php echo $req_ctr1111_query->rowCount(); ?></div></small></a>
                <?php } ?>
 
                </div>
                
                <div style="margin-top: 18px;">
                
                <strong>
                <?php
                if($_GET['dept']===''){
                    echo "Select Department";
                }else{
                    echo $_GET['dept'];
                } ?>
                
                <?php
                if($_GET['status']===''){
                    echo " - Select Status";
                }else{
                    echo ' - '.$_GET['status'];
                } ?>
                </strong>
                
                </div>
                <div class="table-responsive">
                <hr />
                <?php
                $studCtr=0;
                $studData_query = $conn->query("SELECT * FROM students WHERE dept='$_GET[dept]' AND schoolYear='$data_src_sy' AND status='$_GET[status]' ORDER BY lname, fname ASC") or die(mysql_error());
                
                ?>
                
                    <table id="" class="display" style="width:100%">
                
                    <thead>
                    <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 10%;">ID Code</th>
                    <th style="width: 30%;">Student</th>
                    <th style="width: 20%;">Application</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                      
                      <tbody>
                      
                            <?php
                            
                            while ($studData_row = $studData_query->fetch()){
                            
                            $reg_id=$studData_row['reg_id'];
                            
                            $studPayment_query = $conn->query("SELECT payment_id FROM tbl_student_payment WHERE reg_id='$reg_id' AND schoolYear='$data_src_sy' AND status!='Voided'") or die(mysql_error());

                            $studCtr+=1;
                            
                            
                            if($studCtr<10){
                                $studCtr='0'.$studCtr;
                            }else{
                                $studCtr=$studCtr;
                            }
                            
                            if($studData_row['mname']=='' OR $studData_row['mname']=='-')
                            {
                                $finalMName='';
                                
                            }else{
                                
                                if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                                
                                $finalMName=$suffix.$studData_row['mname'];
                            } ?>
           
                        <tr>
                        
                        <td style="vertical-align: top;"><?php echo $studCtr; ?></td>
                        
                        <td style="vertical-align: top;"><?php echo $studData_row['student_id']; ?></td>
                        
                        <td style="vertical-align: top;">
                        <?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?> <small class="badge badge-info"><?php echo $studData_row['classification']; ?></small><br />
                        </td>
                        
                        <td style="vertical-align: top;">
                        <?php
                        
                        if($_GET['dept']==='College' OR $_GET['dept']==='Senior High School'){
                            $classDetails=$studData_row['gradeLevel'].' - '.$studData_row['strand'];
                        }else{
                            $classDetails=$studData_row['gradeLevel'];
                        }
                        
                        echo $classDetails;
                            
                        ?>
                        </td>
                        
                        
                        
                        <td style="vertical-align: top;">
                        <?php if($activeSchoolYear===$data_src_sy){ ?>
                        
                        <?php if($_GET['status']!='Setup'){ ?>
                        
                        <a href="list_stud_applicants_details.php?dept=<?php echo $studData_row['dept']; ?>&status=<?php echo $_GET['status']; ?>&regx_id=<?php echo $reg_id; ?>" class="btn btn-info btn-sm" style="color: white;"><i class="fa fa-info"></i> Profile &amp; Requirements</a>
                        
                        <?php
                        $fileCHK=0;
                          
                        $CHKreqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='$studData_row[dept]' AND gradeLevel='$studData_row[gradeLevel]' AND strand='$studData_row[strand]' AND major='$studData_row[major]' AND classification='$studData_row[classification]' AND purpose='for Admission'");
                        while($CHKreqs_row=$CHKreqs_query->fetch()){
                              
                        $CHKreqStud_query = $conn->query("SELECT * FROM tbl_reqs_students WHERE require_id='$CHKreqs_row[require_id]' AND reg_id='$reg_id'");
                        $CHKreqStud_row=$CHKreqStud_query->fetch();
                        
                        if($CHKreqStud_row['status']==='Disapproved' OR $CHKreqStud_row['status']==='For Validation'){ $fileCHK+=1; }
                        if($CHKreqStud_query->rowCount()<=0){ $fileCHK+=1; }
                              
                        }
                        
                        if($fileCHK>0){ ?>
                            <a href="#" class="btn btn-secondary btn-sm" style="color: white;"><i class="fa fa-check-circle"></i> Validate</a>
                          
                            
                        <?php }else{ ?>
                            <a data-toggle="modal" data-target="#validateStudStat<?php echo $reg_id; ?>" href="#" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-check-circle"></i> Validate</a>

                        <?php } ?>
                        
                        <a style="color: white !important;" data-toggle="modal" data-target="#deleteStudent<?php echo $reg_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>

                        <?php }else{ //SETUP STATUS ?>
                            
                            <a href="list_stud_applicants_details.php?dept=<?php echo $studData_row['dept']; ?>&status=<?php echo $_GET['status']; ?>&regx_id=<?php echo $reg_id; ?>" class="btn btn-info btn-sm" style="color: white;"><i class="fa fa-info"></i> Profile &amp; Requirements</a>
                        
                            <a data-toggle="modal" data-target="#verifyStudStat<?php echo $reg_id; ?>" href="#" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-check-circle"></i> Verify</a>
                            
                            <a style="color: white !important;" data-toggle="modal" data-target="#deleteStudent<?php echo $reg_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>

                        <?php } }else{ ?>
                                                  
                        <a href="list_stud_applicants_details.php?dept=<?php echo $studData_row['dept']; ?>&status=<?php echo $_GET['status']; ?>&regx_id=<?php echo $reg_id; ?>" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-info"></i> Details</a>
                                                  
                        <?php } ?>
                        </td>
                        
                        </tr>
                        
                        
                        <!-- view file Modal -->
                          <div id="verifyStudStat<?php echo $reg_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                                <form action="save_requirements_validation_app.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $reg_id; ?>" method="POST">
                                
                                
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">VERIFY ACCOUNT</h5>
                                  <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="icon-close"></span></a>
                                </div>
                                
                                <div class="modal-body">
                                <h4>Verify <?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?> account?</h4>
                                </div>
                                
                                <div class="modal-footer">
                                  <button name="verifyStudStatus" class="btn btn-primary"> Verify</button>
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Close</a>
                                  
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end view file Modal -->
                          
                          
                          <!-- view file Modal -->
                          <div id="validateStudStat<?php echo $reg_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                                <form action="save_requirements_validation_app.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $reg_id; ?>" method="POST">
                                
                                
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">VALIDATE APPLICATION</h5>
                                  <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="icon-close"></span></a>
                                </div>
                                
                                <div class="modal-body">
                                <h4>Validate <?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?> application?</h4>
                                </div>
                                
                                <div class="modal-footer">
                                  <button name="validateStudStatus" class="btn btn-primary"> Validate</button>
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
              
            </div>
            
          </div>
        
              
      </section>
     
      <?php include('footer.php'); ?>
      
    </div>
    
        <?php include('scripts_files.php'); ?>
 
  </body>
</html>
