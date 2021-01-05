<!-- Counts Section -->
      <section class="dashboard-counts section-padding" style="margin-bottom: 0px;">
        <div class="container-fluid">
          <div class="row">
            
            <!-- Count item widget-->
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-paper-airplane"></i></div>
                <div class="name">
                <strong class="text-uppercase">SY <?php echo $data_src_sy; ?>
                <?php if($studData_row['dept']==='College' OR $studData_row['dept']==='Senior High School'){ ?>
                &nbsp;&nbsp;<div class="badge badge-info"><?php echo $data_src_sem; ?></div>
                <?php } ?>
                </strong>
                
                <span style="font-weight: bold;" class="text-primary">
                <?php
                if($studData_row['dept']==='College'){
                
                if($studData_row['major']==='N/A' OR $studData_row['major']==='-'){ ?>
                Course:<br />
                <strong style="font-size: medium;"><?php echo $studData_row['gradeLevel'].' - '.$studData_row['strand']; ?></strong>
                 
                <?php }else{ ?>
                Course:<br />
                <strong style="font-size: medium;"><?php echo $studData_row['gradeLevel'].' - '.$studData_row['strand'].' '.$studData_row['major']; ?></strong>
                 
                <?php } }else{ ?>
                
                Grade Level:<br />
                
                <?php if($studData_row['dept']==='Senior High School'){ ?>
                    <strong style="font-size: small;"><?php echo $studData_row['gradeLevel'].' - '.$studData_row['strand']; ?></strong>
                    
                <?php }else{ ?>
                    <strong style="font-size: small;"><?php echo $studData_row['gradeLevel']; ?></strong>
                    
                <?php } ?>
                
                
                <?php } ?>
                </span>
             
                <span style="font-weight: bold; margin-top: 8px;" class="text-success">
                Status:&nbsp;
                
                <u>
                <?php
                
                    $fileCHK=0;
                          
                    $CHKreqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='$studData_row[dept]' AND gradeLevel='$studData_row[gradeLevel]' AND strand='$studData_row[strand]' AND major='$studData_row[major]' AND classification='$studData_row[classification]' AND purpose='for Admission'");
                    while($CHKreqs_row=$CHKreqs_query->fetch()){
                          
                    $CHKreqStud_query = $conn->query("SELECT * FROM tbl_reqs_students WHERE require_id='$CHKreqs_row[require_id]' AND reg_id='$studData_row[reg_id]'");
                    $CHKreqStud_row=$CHKreqStud_query->fetch();
                    
                    if($CHKreqStud_row['status']==='Disapproved' OR $CHKreqStud_row['status']==='For Validation'){ $fileCHK+=1; }
                    if($CHKreqStud_query->rowCount()<=0){ $fileCHK+=1; }
                          
                    }
                    
                    if($fileCHK>0){
                        
                            if($studData_row['status']==='Setup'){
                                $status_msg="Setup";
                                
                            }elseif($studData_row['status']==="For Application Assessment" OR $studData_row['status']==="For Accounts Assessment" OR $studData_row['status']==='For Payment'){
                                $status_msg="Incomplete Admission Requirements";
                            
                            }elseif($studData_row['status']==='Enrolled'){
                                $status_msg="Temporarily Enrolled";
                                
                            }
                        
                        //$updateStudent = 'UPDATE students SET status = :status WHERE user_id = :user_id';
                        //$conn->prepare($updateStudent)->execute(['status' => 'For Application Assessment', 'user_id' => $session_id]);
                        
                        echo $status_msg;
                        
                    }else{
                        
                        echo $studData_row['status'];
                        
                    }
                    
                ?>
                </u>
                </span>
                
               
                  <div class="count-number">
                  <?php if($studData_row['status']==='Setup'){ ?>
                    <button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm">Set Course</button>
                    
                    <?php if($studData_row['assessment_id']>0){ ?>
                    
                    <?php
          
                    $CHK_enrol_sched_query = $conn->query("SELECT * FROM tbl_enrol_sched WHERE dept='$studData_row[dept]'");
                    $enrol_sched_row=$CHK_enrol_sched_query->fetch();
                    
                    $start_date_enrol_sched = new DateTime($enrol_sched_row['start_date_mm'].'/'.$enrol_sched_row['start_date_dd'].'/'.$enrol_sched_row['start_date_yyyy']);
                    $end_date_enrol_sched = new DateTime($enrol_sched_row['end_date_mm'].'/'.$enrol_sched_row['end_date_dd'].'/'.$enrol_sched_row['end_date_yyyy']);
                    $current_date_enrol_sched = new DateTime();
                    
                    ?>
                    
                    <button data-toggle="modal" data-target="#myModalSubmitApp" class="btn btn-primary btn-sm">Submit Application</button>
                    
                    <?php } ?>
                    
                  <?php }elseif($studData_row['status']==='For Payment' OR $studData_row['status']==='Enrolled'){ ?>
                    <a href="list_paymentReqs.php" class="btn btn-primary btn-sm">Request Payment Validation</a>
                  <?php } ?>
                  
                  </div>
                </div>
              </div>
            </div>
            
                  <!-- SUBMIT COURSE APPLICATION MODAL -->
                  <div id="myModalSubmitApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">SUBMIT COURSE APPLICATION</h5>
                          <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
                        </div>
                        
                        <?php
                        if ($start_date_enrol_sched <= $current_date_enrol_sched AND $end_date_enrol_sched>=$current_date_enrol_sched){ ?>
                        
                        <form action="save_userInfo.php" method="POST">
                        
                        <input name="assessment_id" type="hidden" value="<?php echo $studData_row['assessment_id']; ?>" />
                      
                        <div class="modal-body">
                          <h5>
                          Course: 
                          <?php
                            if($studData_row['dept']==='Senior High School' OR $studData_row['dept']==='College'){
                                if($studData_row['major']==='-'){
                                    echo $studData_row['gradeLevel'].' - '.$studData_row['strand'];
                                }else{
                                    echo $studData_row['gradeLevel'].' - '.$studData_row['strand'].' - '.$studData_row['major'];
                                }
                                
                            }else{
                                echo "Submit application for ".$studData_row['gradeLevel'];
                            }
                            
                          ?><br /><br />
                          School Year: <?php echo $data_src_sy; ?><br /><br />
                          Semester: <?php echo $data_src_sem; ?></h5>
                          <small>Note: After submitting your application, setting of course will be disabled. Please be guided accordingly.</small>
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                          <button name="submit_app" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                        
                        <?php }else{ ?>
                        
                        <div class="modal-body">
                          <h5 class="text-danger">ENROLMENT IS CURRENTLY CLOSE</h5>
                          <hr />
                          <label><strong class="text-info">Start of Enrollment: <?php echo date($enrol_sched_row['start_date_mm'].'/'.$enrol_sched_row['start_date_dd'].'/'.$enrol_sched_row['start_date_yyyy']); ?></strong></label><br />
                          <label><strong class="text-info">End of Enrollment: <?php echo date($enrol_sched_row['end_date_mm'].'/'.$enrol_sched_row['end_date_dd'].'/'.$enrol_sched_row['end_date_yyyy']); ?></strong></label>
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                        </div>
                       
                        <?php } ?>
                        
                        
                      </div>
                    </div>
                  </div>
                  <!-- END SUBMIT COURSE APPLICATION MODAL -->
                  
                  <!-- SET COURSE MODAL -->
                  <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">SET COURSE</h5>
                          <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
                        </div>
                        <div class="modal-body">
                          <p>Set course for School Year <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></p>
                          
                          
                            <div class="tab">
                              <a class="tablinks" onclick="openCity(event, 'elem')">Grade School</a>
                              <a class="tablinks" onclick="openCity(event, 'jhs')">JHS</a>
                              <a class="tablinks" onclick="openCity(event, 'shs')">SHS</a>
                              <a class="tablinks" onclick="openCity(event, 'col')">College</a>
                            </div>
                            
                            <div id="elem" class="tabcontent">
                              <form action="save_userInfo.php" method="POST">
                              
                                <input name="dept" value="Grade School" type="hidden" />
                                
                                <div class="form-group">       
                                  <label>LRN <small>(12 Digit)</small></label>
                                  <input name="lrn" class="form-control form-control-sm" placeholder="Enter 12 Digit LRN" required="" />
                                </div>
                                
                                <div class="form-group">       
                                  <label>Classification</label>
                                  <select name="classification" class="form-control">
                                  <option>New</option>
                                  <option>Old</option>
                                  <option>Returnee</option>
                                  <option>Transferee</option>
                                  </select>
                                </div>
                                
                                <div class="form-group">       
                                  <label>Grade Level</label>
                                  <select name="gradeLevel" class="form-control">
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
                                
                                <input name="strand" type="hidden" value="N/A" />
                                <input name="major" type="hidden" value="N/A" />
                                
                                <div class="form-group">       
                                  <button name="setCourseElem" class="btn btn-primary">Set Course</button>
                                </div>
                                
                              </form>
                            </div>
                            
                            <div id="jhs" class="tabcontent">
                              <form action="save_userInfo.php" method="POST">
                              
                                <input name="dept" value="Junior High School" type="hidden" />
                                
                                <div class="form-group">       
                                  <label>LRN <small>(12 Digit)</small></label>
                                  <input name="lrn" class="form-control form-control-sm" placeholder="Enter 12 Digit LRN" required="" />
                                </div>
                                
                                <div class="form-group">       
                                  <label>Classification</label>
                                  <select name="classification" class="form-control">
                                  <option>New</option>
                                  <option>Old</option>
                                  <option>Returnee</option>
                                  <option>Transferee</option>
                                  </select>
                                </div>
                                
                                <div class="form-group">       
                                  <label>Grade Level</label>
                                  <select name="gradeLevel" class="form-control">
                                  <option>Grade 7</option>
                                  <option>Grade 8</option>
                                  <option>Grade 9</option>
                                  <option>Grade 10</option>
                                  </select>
                                </div>
                                
                                <input name="strand" type="hidden" value="N/A" />
                                <input name="major" type="hidden" value="N/A" />
                                
                                <div class="form-group">       
                                  <button name="setCourseJHS" class="btn btn-primary">Set Course</button>
                                </div>
                                
                              </form>
                            </div>
                            
                            <div id="shs" class="tabcontent">
                              <form action="save_userInfo.php" method="POST">
                              
                                <input name="dept" value="Senior High School" type="hidden" />
                                
                                <div class="form-group">       
                                  <label>LRN <small>(12 Digit)</small></label>
                                  <input name="lrn" class="form-control form-control-sm" placeholder="Enter 12 Digit LRN" required="" />
                                </div>
                                
                                <div class="form-group">       
                                  <label>Classification</label>
                                  <select name="classification" class="form-control">
                                  <option>New</option>
                                  <option>Old</option>
                                  <option>Returnee</option>
                                  <option>Transferee</option>
                                  </select>
                                </div>
                                
                                <div class="form-group">       
                                  <label>ESC Status</label>
                                  <select name="escGrantee" class="form-control">
                                  <option>ESC Grantee</option>
                                  <option>Non ESC Grantee</option>
                                  <option>N/A</option>
                                  </select>
                                </div>
                                
                                <div class="form-group">       
                                  <label>Grade Level</label>
                                  <select name="gradeLevel" class="form-control">
                                  <option>Grade 11</option>
                                  <option>Grade 12</option>
                                  </select>
                                </div>
                                
                                <div class="form-group">  
                                  <label>Strand</label>
                                  <select name="strand" class="form-control">
                                  <option>ABM</option>
                                  <option>GAS</option>
                                  <option>HUMSS</option>
                                  <option>STEM</option>
                                  </select>
                                </div>
                                
                                <input name="major" type="hidden" value="N/A" />
                                
                                <div class="form-group">       
                                  <button name="setCourseSHS" class="btn btn-primary">Set Course</button>
                                </div>
                                
                              </form>
                            </div>
                            
                            <div id="col" class="tabcontent">
                              <form action="save_userInfo.php" method="POST">
                              
                                <input name="dept" value="College" type="hidden" />
                                
                                <div class="form-group">       
                                  <label>Classification</label>
                                  <select name="classification" class="form-control">
                                  <option>New</option>
                                  <option>Old</option>
                                  <option>Returnee</option>
                                  <option>Transferee</option>
                                  </select>
                                </div>
                                
                                <div class="form-group">       
                                  <label>Year Level</label>
                                  <select name="gradeLevel" class="form-control">
                                  <option>1st Year</option>
                                  <option>2nd Year</option>
                                  <option>3rd Year</option>
                                  </select>
                                </div>
                                
                                <div class="form-group"> 
                                  <label>Course</label>
                                  <select name="strand" class="form-control">
                                  <option>BEED</option>
                                  <option>BSA</option>
                                  <option>BSAIS</option>
                                  <option>BSBA</option>
                                  <option>BSED</option>
                                  <option>BSIT</option>
                                  </select>
                                </div>
                                
                                <div class="form-group"> 
                                  <label>Major</label>
                                  <select name="major" class="form-control">
                                  <option>N/A</option>
                                  <option value="English">English (BSED)</option>
                                  <option value="Science">Science (BSED)</option>
                                  <option value="FM">Financial Management (BSBA)</option>
                                  <option value="HR">Human Resource (BSBA)</option>
                                  </select>
                                </div>
                                
                                <div class="form-group">       
                                  <button name="setCourseCol" class="btn btn-primary">Set Course</button>
                                </div>
                                
                              </form>
                            </div>


                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- END SET COURSE MODAL -->
                  
            <!-- Count item widget-->
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">MY INFO&nbsp;&nbsp;<div class="badge badge-info"><?php echo $studData_row['classification']; ?></div></strong><span>LRN: <?php echo $studData_row['lrn']; ?></span>
                  <div class="count-number">
                  <?php if($studData_row['dept']==='Grade School'){ ?>
                    <a href="registration_form_elem.php" class="btn btn-primary btn-sm">Update Info</a>
                  <?php }elseif($studData_row['dept']==='Junior High School'){ ?>
                    <a href="registration_form_jhs.php" class="btn btn-primary btn-sm">Update Info</a>
                  <?php }elseif($studData_row['dept']==='Senior High School'){ ?>
                    <a href="registration_form_shs.php" class="btn btn-primary btn-sm">Update Info</a>
                  <?php }elseif($studData_row['dept']==='College'){ ?>
                    <a href="registration_form_col.php" class="btn btn-primary btn-sm">Update Info</a>
                  <?php } ?>
                  
                  <?php if($studData_row['gradeLevel']!='-'){ ?>
                  
                    <?php if($studData_row['status']==="For Application Assessment" OR $studData_row['status']==="For Accounts Assessment" OR $studData_row['status']==='For Payment' OR $studData_row['status']==='Enrolled'){ ?>
                    
                    <?php if($fileCHK>0){ ?>
                        <a href="requirements.php" class="btn btn-warning btn-sm"><i style="color: black; font-size: medium;" class="fa fa-exclamation-triangle"></i> My Requirements</a>
                
                    <?php }else{  ?>
                    <a href="requirements.php" class="btn btn-primary btn-sm"><i style="color: white; font-size: small;" class="fa fa-check"></i> My Requirements</a>
                    
                    <?php } } } ?>
                  
                  </div>
                </div>
              </div>
            </div>
 
            <!-- Count item widget-->
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-bill"></i></div>
                <div class="name"><strong class="text-uppercase">FORM</strong>
                
                  <?php if($studData_row['dept']==='Grade School'){ ?>
                    <a href="print_reg_form_elem.php" target="_blank" style="cursor: pointer;"><span class="fa fa-arrow-circle-right"> Registration Form</span></a>
                  <?php }elseif($studData_row['dept']==='Junior High School'){ ?>
                    <a href="print_reg_form_jhs.php" target="_blank" style="cursor: pointer;"><span class="fa fa-arrow-circle-right"> Registration Form</span></a>
                  <?php }elseif($studData_row['dept']==='Senior High School'){ ?>
                    <a href="print_reg_form_shs.php" target="_blank" style="cursor: pointer;"><span class="fa fa-arrow-circle-right"> Registration Form</span></a>
                  <?php }else{ ?>
                    <a href="print_reg_form_col.php" target="_blank" style="cursor: pointer;"><span class="fa fa-arrow-circle-right"> Registration Form</span></a>
                  <?php } ?>
                    <br />
                  <?php if($studData_row['status']==='For Payment' OR $studData_row['status']==='Enrolled'){ ?>
                    <a href="student_ledger.php" style="cursor: pointer;"><span class="fa fa-arrow-circle-right"> Assessments &amp; Accounts Ledger</span></a>
                  <?php } ?>
                </div>
              </div>
            </div>
            
            <?php if($studData_row['status']==="For Application Assessment" OR $studData_row['status']==="For Accounts Assessment" OR $studData_row['status']==='For Payment' OR $studData_row['status']==='Enrolled'){ ?>
            
            <?php if($fileCHK>0){ ?>
                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 12px;">
                    <div class="alert alert-warning" style="padding: 4px 4px 4px 8px;">
                        Please comply all required documents for admission.
                    </div>
                </div>
            <?php } } ?>
   
            
          </div>
        </div>
      </section>