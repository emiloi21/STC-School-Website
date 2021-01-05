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
            <li class="breadcrumb-item"><a href="list_students.php">List of Students</a></li>
            
            <li class="breadcrumb-item active"> </li>
            
            <li class="breadcrumb-item active">Enrol Student - Update Existing Student</li>
          </ul>
        </div>
      </div>
      
      
      
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
              <?php
              $reg_id=$_GET['regx_id'];
              $upd_studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$reg_id' AND schoolYear='$data_src_sy'") or die(mysql_error());
              $upd_studData_row=$upd_studData_query->fetch();            
              ?>
              
              <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><strong style="font-weight: bold !important;">ENROL STUDENT - UPDATE EXISTING STUDENT</strong></a>

                  </h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxKinder" role="tabpanel" class="collapse show" style="padding: 14px;">
 
                <form action="save_add_student.php?dept=<?php echo $_GET['dept']; ?>" method="POST">
                
                <div class="row">
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $activeSchoolYear; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>School Year</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $activeSemester; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Semester</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['lrn']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>LRN</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                        <input value="<?php echo $upd_studData_row['student_id']; ?>" name="student_id" type="text" class="form-control form-control-sm" readonly>
                        <small>ID Code</small>
                        </div>
                      </div>
                        
                      
                      
                </div>
                
                <div class="line"></div>
                
                <div class="row">
                    <div class="col-sm-12">
                    <hr />
                    <h5>DOCS CHECKLIST</h5>
                    </div>
                </div>
                
                <div class="row">
                      <table>
                      <tr>
                      
                      <td style="background-color: white; width: 16%; border: none;">
                      <select name="bCertificate" class="form-control form-control-sm">
                      <option><?php echo $upd_studData_row['bCertificate']; ?></option>
                      <option>To be follow</option>
                      <option>Local Copy</option>
                      <option>NSO/PSA Copy</option>
                      </select>
                      <small>Birth Certificate</small>
                      </td>
                      
                      <td style="background-color: white; width: 16%; border: none;">
                      <select name="schoolCard" class="form-control form-control-sm">
                      <option><?php echo $upd_studData_row['schoolCard']; ?></option>
                      <option>To be follow</option>
                      <option>Submitted</option>
                      </select>
                      <small>Card</small>
                      </td>
                      
                      <td style="background-color: white; width: 16%; border: none;">
                      <select name="goodMoral" class="form-control form-control-sm">
                      <option><?php echo $upd_studData_row['goodMoral']; ?></option>
                      <option>Not Applicable</option>
                      <option>To be follow</option>
                      <option>Submitted</option>
                      </select>
                      <small>Cert. of Good Moral</small>
                      </td>
                      
                      <td style="background-color: white; width: 16%; border: none;">
                      <select name="ncae" class="form-control form-control-sm">
                      <option><?php echo $upd_studData_row['ncae']; ?></option>
                      <option>Not Applicable</option>
                      <option>To be follow</option>
                      <option>Submitted</option>
                      </select>
                      <small>NCAE</small>
                      </td>
                      
                      <td style="background-color: white; width: 16%; border: none;">
                      <select name="qvrCert" class="form-control form-control-sm">
                      <option><?php echo $upd_studData_row['qvrCert']; ?></option>
                      <option>Not Applicable</option>
                      <option>To be follow</option>
                      <option>None</option>
                      <option>ESC Certificate</option>
                      <option>OVAP Certificate</option>
                      </select>
                      <small>QVR Certificate</small>
                      </td>
                      
                      <td style="background-color: white; width: 16%; border: none;">
                      <select name="rankCert" class="form-control form-control-sm">
                      <option><?php echo $upd_studData_row['rankCert']; ?></option>
                      <option>None</option>
                      <option>To be follow</option>
                      <option>Rank 1</option>
                      <option>Rank 2</option>
                      <option>Rank 3</option>
                      </select>
                      <small>Rank Certificate</small>
                      </td>
                      
                      </tr>
                      </table>
                </div>
                
                <div class="line"></div>
                
                <div class="row">
                    <div class="col-sm-12">
                    <hr />
                    <h5>PERSONAL INFORMATION</h5>
                    </div>
                </div>
                
                <div class="row">
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['fname']; ?>" name="fname" type="text" placeholder="First Name" class="form-control form-control-sm" required="" />
                            <small>First Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['mname']; ?>" name="mname" type="text" placeholder="Middle Name" class="form-control form-control-sm" />
                            <small>Middle Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['lname']; ?>" name="lname" type="text" placeholder="Last Name" class="form-control form-control-sm" required="" />
                            <small>Last Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-1">
                        <div class="form-group">
                            <select name="suffix" class="form-control form-control-sm">
                            <option><?php echo $upd_studData_row['suffix']; ?></option>
                            <option>-</option>
                            <option>JR</option>
                            <option>SR</option>
                            <option>II</option>
                            <option>III</option>
                            </select>
                            <small>Suffix</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <select name="gender" class="form-control form-control-sm">
                            <option><?php echo $upd_studData_row['gender']; ?></option>
                            <option>Male</option>
                            <option>Female</option>
                            </select>
                            <small>Sex</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <input type="date" name="bdate" value="<?php echo $upd_studData_row['bdYYYY'].'-'.$upd_studData_row['bdMM'].'-'.$upd_studData_row['bdDD']; ?>" class="form-control form-control-sm" style="font-size: small;" required=""/>
                            <small>Birthdate</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="form-group">
                          
                          <input value="<?php echo $upd_studData_row['bdPlace']; ?>" name="bdPlace" list="search_list_bdPlace" placeholder="City/Municipality, Province" class="form-control form-control-sm" required="true" />

                          <datalist id="search_list_bdPlace">
                                    <?php
                                    $fnameList_query = $conn->query("SELECT DISTINCT bdPlace FROM students");
                                    while($fnlq_row = $fnameList_query->fetch()){ ?>
                                    <option><?php echo $fnlq_row['bdPlace']; ?></option>
                                    <?php } ?>
                          </datalist>
                          <small>Place of Birth</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-6">
                          <div class="form-group">
                          
                          <input value="<?php echo $upd_studData_row['address']; ?>" name="address" list="search_list_address" placeholder="Purok/Street, Barangay, City/Municipality, Province" class="form-control form-control-sm" required="true" />

                          <datalist id="search_list_address">
                                    <?php
                                    $fnameList_query = $conn->query("SELECT DISTINCT address FROM students");
                                    while($fnlq_row = $fnameList_query->fetch()){ ?>
                                    <option><?php echo $fnlq_row['address']; ?></option>
                                    <?php } ?>
                          </datalist>
                          <small>Complete Address</small>
                          </div>
                      </div>
                      
                      <div class="col-sm-8">
                          <div class="form-group">
                          <input value="<?php echo $upd_studData_row['lastSchool']; ?>" type="text" placeholder="Last Name" class="form-control form-control-sm" readonly>
                          <small>Last School Attended</small>
                          </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['schoolType']; ?>" type="text" placeholder="Last Name" class="form-control form-control-sm" readonly>
                            <small>School Type</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <input name="genAve" type="number" min="75" max="100" class="form-control form-control-sm" required="" />
                            <small>Gen. Average</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-12">
                      <hr />
                      <h5>GUARDIAN'S INFORMATION</h5>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['gfname']; ?>" name="gfname" type="text" placeholder="First Name" class="form-control form-control-sm" required="" />
                            <small>First Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['gmname']; ?>" name="gmname" type="text" placeholder="Middle Name" class="form-control form-control-sm" />
                            <small>Middle Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['glname']; ?>" name="glname" type="text" placeholder="Last Name" class="form-control form-control-sm" required="" />
                            <small>Last Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <select name="gRelation" class="form-control form-control-sm">
                            <option><?php echo $upd_studData_row['gRelation']; ?></option>
                            <option>Parents</option>
                            <option>Relatives</option>
                            <option>Non-Relatives</option>
                            </select>
                            <small>Relation</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-9">
                        <div class="form-group">
                          
                          <input value="<?php echo $upd_studData_row['gAddress']; ?>" name="gAddress" list="search_list_gAddress" placeholder="Purok/Street, Barangay, City/Municipality, Province" class="form-control form-control-sm" required="true" />

                          <datalist id="search_list_gAddress">
                                    <?php
                                    $fnameList_query = $conn->query("SELECT DISTINCT gAddress FROM students");
                                    while($fnlq_row = $fnameList_query->fetch()){ ?>
                                    <option><?php echo $fnlq_row['gAddress']; ?></option>
                                    <?php } ?>
                          </datalist>
                          <small>Guardian's Address</small>
                        </div> 
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['gMobileNumber']; ?>" name="gMobileNumber" type="text" placeholder="+639301234567" class="form-control form-control-sm" required="" />
                            <small>Guardian's Contact #</small>
                        </div>
                      </div>
                      
                      
                </div>
                
                <div class="line"></div>
                
                <div class="row">
                    <div class="col-sm-12">
                    <hr />
                    <h5>UPDATE COURSE INFORMATION</h5>
                    </div>
                </div>
                
                <div class="row">
                
                <div class="col-sm-6" style="margin-top: 12px;">
                <h5>S.Y. <?php echo $data_src_sy; ?> <small>(Last School Year)</small></h5>
                <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['gradeLevel']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Grade Level</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-12">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['strand']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Strand</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-12">
                        <div class="form-group">
                            <input value="<?php echo $upd_studData_row['section']; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Section</small>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <input value="<?php echo $upd_studData_row['subsidy_type']; ?>" type="text" class="form-control form-control-sm" readonly>
                        <small>Gov't. Subsidy Beneficiary Status</small>
                      </div>
                      
                      <input type="hidden" value="-" name="section" />
                      
                </div>
                </div>
                
                
                <div class="col-sm-6" style="margin-top: 12px;">
                <h5>S.Y. <?php echo $activeSchoolYear; ?> <small>(Current School Year)</small></h5>
                <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                            <select name="gradeLevel" class="form-control form-control-sm">
                            <option><?php echo $upd_studData_row['gradeLevel']; ?></option>
                            
                            <?php if($_GET['dept']==='Kinder'){ ?>
                            <option>Nursery</option>
                            <option>Kinder 1</option>
                            <option>Kinder 2</option>
                            
                            <?php }elseif($_GET['dept']==='Elementary'){ ?>
                            <option>Grade 1</option>
                            <option>Grade 2</option>
                            <option>Grade 3</option>
                            <option>Grade 4</option>
                            <option>Grade 5</option>
                            <option>Grade 6</option>
                            
                            <?php }elseif($_GET['dept']==='JHS'){ ?>
                            <option>Grade 7</option>
                            <option>Grade 8</option>
                            <option>Grade 9</option>
                            <option>Grade 10</option>
                            
                            <?php }else{ ?>
                            <option>Grade 11</option>
                            <option>Grade 12</option>
                            <?php } ?>
                            
                            </select>
                            <small>Grade Level</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-12">
                        <div class="form-group">
                            <select name="strand" class="form-control form-control-sm">
                            <?php if($_GET['dept']==='Kinder'){ ?>
                            <option>N/A</option>
                            
                            <?php }elseif($_GET['dept']==='Elementary'){ ?>
                            <option>N/A</option>
                            
                            <?php }elseif($_GET['dept']==='JHS'){ ?>
                            <option>N/A</option>
                            
                            <?php }else{ ?>
                            <option>ABM</option>
                            <option>GAS</option>
                            <option>HUMSS</option>
                            <option>STEM</option>
                            <option>TVL</option>
                            <?php } ?>
                            </select>
                            <small>Strand</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-12">
                        <div class="form-group">
                            <input value="-" name="section" type="text" class="form-control form-control-sm" readonly>
                            <small>Section</small>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <select name="subsidy_type" class="form-control form-control-sm">
                        <option value="<?php echo $upd_studData_row['subsidy_type']; ?>"><?php echo $upd_studData_row['subsidy_type']; ?></option>
                        <option>To be determined</option>
                        <option>Regular</option>
                                                            
                        <?php if($_GET['dept']==='JHS'){ ?>
                        <option>ESC</option>
                                                            
                        <?php }else{ ?>
                        <option>Public Completer</option>
                        <option>Private ESC Completer</option>
                        <option>Private Non-ESC Completer</option>
                        <option>ALS/PEPT Qualifier</option>
                        <?php } ?>
                                                            
                        </select>
                        <small class="form-text">Gov't. Subsidy Beneficiary Status</small>
                      </div>
                      
                </div>
                </div>
                
                </div>
                
                <div class="row">
                
                <div class="form-group col-sm-12">
                <hr />
                <div class="pull-right">
                      <a href="list_students.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $_GET['class_id']; ?>" class="btn btn-secondary" style="margin-right: 8px; color: white;"><i class="fa fa-times"></i> Cancel</a>
                      <button name="updateStudentStatus" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                </div>
                </div>
                
                </div>
                
                </form>
                
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