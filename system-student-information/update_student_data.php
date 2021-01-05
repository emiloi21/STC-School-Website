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
            
            <li class="breadcrumb-item active">Enrol Student</li>
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
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><strong style="font-weight: bold !important;">ENROL STUDENT</strong></a>

                  </h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxKinder" role="tabpanel" class="collapse show" style="padding: 14px;">
 
                <form action="save_add_student.php?dept=<?php echo $_GET['dept']; ?>" method="POST">
                
                <div class="row">
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <input value="<?php echo $activeSchoolYear; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>School Year</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <input value="<?php echo $activeSemester; ?>" type="text" class="form-control form-control-sm" readonly>
                            <small>Semester</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="form-group">
                            <input name="lrn" type="text" placeholder="Learners Reference Number" class="form-control form-control-sm">
                            <small>LRN</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="form-group">
                        <?php
                        
                        $idcode_gen_query = $conn->query("SELECT prefix, last_idNum FROM idcode_gen WHERE dept='$_GET[dept]'") or die(mysql_error());
                        $idcode_gen_row=$idcode_gen_query->fetch();
                             
                        $new_id_num=$idcode_gen_row['last_idNum']+1;
                                          
                        if($new_id_num>=0 AND $new_id_num<=9)
                        {
                            $final_idcode=$idcode_gen_row['prefix']."-".substr(date('Y'), 2, 2)."000".$new_id_num;             
                        }
                        elseif($new_id_num>9 AND $new_id_num<=99)
                        {
                            $final_idcode=$idcode_gen_row['prefix']."-".substr(date('Y'), 3, 2)."00".$new_id_num;
                        }
                        elseif($new_id_num>99 AND $new_id_num<=999)
                        {
                            $final_idcode=$idcode_gen_row['prefix']."-".substr(date('Y'), 3, 2)."0".$new_id_num;
                        }
                        elseif($new_id_num>999 AND $new_id_num<=9999)
                        {
                            $final_idcode=$idcode_gen_row['prefix']."-".substr(date('Y'), 3, 2).$new_id_num;
                        }
                
                        
                        ?>
                            <input value="<?php echo $final_idcode; ?>" name="student_id" type="text" placeholder="School ID Code" class="form-control form-control-sm">
                            <small>ID Code</small>
                        <input name="new_id_num" value="<?php echo $new_id_num; ?>" type="hidden" />
                        </div>
                      </div>
                      
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
                            <input name="fname" type="text" placeholder="First Name" class="form-control form-control-sm">
                            <small>First Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input name="mname" type="text" placeholder="Middle Name" class="form-control form-control-sm">
                            <small>Middle Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input name="lname" type="text" placeholder="Last Name" class="form-control form-control-sm">
                            <small>Last Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-1">
                        <div class="form-group">
                            <select name="suffix" class="form-control form-control-sm">
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
                            <option value="Male">-</option>
                            <option>Male</option>
                            <option>Female</option>
                            </select>
                            <small>Gender</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-2">
                        <div class="form-group">
                            <input type="date" name="bdate" class="form-control form-control-sm" style="font-size: small;" />
                            <small>Birthdate</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="form-group">
                          
                          <input name="bdPlace" list="search_list_bdPlace" placeholder="City/Municipality, Province" class="form-control form-control-sm" required="true" />

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
                          
                          <input name="lastSchool" list="search_list_address" placeholder="Purok/Street, Barangay, City/Municipality, Province" class="form-control form-control-sm" required="true" />

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
                      
                      <div class="col-sm-9">
                          <div class="form-group">
                          
                          <input name="lastSchool" list="search_list" placeholder="Complete School Name" class="form-control form-control-sm" required="true" />

                          <datalist id="search_list">
                                    <?php
                                    $fnameList_query = $conn->query("SELECT DISTINCT lastSchool FROM students");
                                    while($fnlq_row = $fnameList_query->fetch()){ ?>
                                    <option><?php echo $fnlq_row['lastSchool']; ?></option>
                                    <?php } ?>
                          </datalist>
                          
                          <small>
                          <?php if($_GET['dept']==='Kinder'){
                            echo "Last Nursery School Attended";
                          }elseif($_GET['dept']==='Elementary'){
                            echo "Last Kinder School Attended";
                          }elseif($_GET['dept']==='JHS'){
                            echo "Last Elementary School Attended";
                          }else{
                            echo "Last Junior High School Attended";
                          } ?>
                          </small>
                          </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <select name="schoolType" class="form-control form-control-sm">
                            <option value="Private">-</option>
                            <option>Private</option>
                            <option>Public</option>
                            <option>SUC</option>
                            </select>
                            <small>School Type</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-12"><h5>GUARDIAN'S INFORMATION</h5></div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input name="gfname" type="text" placeholder="First Name" class="form-control form-control-sm">
                            <small>First Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input name="gmname" type="text" placeholder="Middle Name" class="form-control form-control-sm">
                            <small>Middle Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input name="glname" type="text" placeholder="Last Name" class="form-control form-control-sm">
                            <small>Last Name</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <select name="g_relation" class="form-control form-control-sm">
                            <option value="Private">-</option>
                            <option>Parents</option>
                            <option>Relatives</option>
                            <option>Non-Relatives</option>
                            </select>
                            <small>Relation</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-9">
                        <div class="form-group">
                            <input name="lname" type="text" placeholder="Purok/Street, Barangay, City/Municipality, Province" class="form-control form-control-sm">
                            <small>Guardian's Address</small>
                        </div>
                      </div>
                      
                      <div class="col-sm-3">
                        <div class="form-group">
                            <input name="lname" type="text" placeholder="+639301234567" class="form-control form-control-sm">
                            <small>Guardian's Contact #</small>
                        </div>
                      </div>
                      
                </div>
                
                <div class="line"></div>
                
                <div class="row">
                    <div class="col-sm-12">
                    <hr />
                    <h5>COURSE INFORMATION</h5>
                    </div>
                </div>
                
                <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                            <select name="gradeLevel" class="form-control form-control-sm">
                            <option>-</option>
                            
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
                      
                      <div class="col-sm-4">
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
                      
                      <div class="col-md-4">
                        <select name="subsidy_type" class="form-control form-control-sm">
                        <option value="Regular">--Select Beneficiary Type--</option>
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
                      
                      <input type="hidden" value="-" name="section" />
                      
                </div>
                
                <div class="row">
                               
             
 
                
                
                <div class="line"></div>
                
                <div class="form-group col-sm-12">
                <div class="pull-right">
                      <a href="#" class="btn btn-secondary" style="margin-right: 8px; color: white;">Cancel</a>
                      <button name="addStudent" type="submit" class="btn btn-primary">Save</button>
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