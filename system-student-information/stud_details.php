                      <div class="row">
                      <form action="save_student_profile.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>&class_id=<?php echo $_GET['class_id']; ?>" method="POST" class="col-lg-12">
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-header d-flex align-items-center">
                              <h4>Personal Information</h4>
                            </div>
                            <div class="card-body">
                            
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                    <div class="row">
                                      <div class="col-md-4">
                                         <input value="<?php echo $studData_row['fname']; ?>" name="fname" class="form-control form-control-sm" placeholder="Enter First Name" required="" />
                                         <small>First Name</small>
                                      </div>
                                      
                                      <div class="col-md-3">
                                         <input value="<?php echo $studData_row['mname']; ?>" name="mname" class="form-control form-control-sm" placeholder="Enter Middle Name" />
                                         <small>Middle Name</small>
                                      </div>
                                      
                                      <div class="col-md-3">
                                         <input value="<?php echo $studData_row['lname']; ?>" name="lname" class="form-control form-control-sm" placeholder="Enter Last Name" required="" />
                                         <small>Last Name</small>
                                      </div>
                                      
                                      <div class="col-md-2">
                                          <select name="suffix" class="form-control form-control-sm">
                                          <option><?php echo $studData_row['suffix']; ?></option>
                                          <option>JR</option>
                                          <option>SR</option>
                                          <option>III</option>
                                          </select>
                                          <small>Suffix</small>
                                      </div>
                                      
                                    </div>
             
                                  </div>
                                </div>
                                
                                <div class="line"></div>
                    
                                <div class="form-group row">
                                  
                                  <div class="col-sm-12">
                                    <div class="row">
                                        
                                      <div class="col-md-4">
                                          <input value="<?php echo $studData_row['bdYYYY'].'-'.$studData_row['bdMM'].'-'.$studData_row['bdDD']; ?>" name="birthdate" type="date" class="form-control form-control-sm" />
                                          <small class="form-text">Date of Birth</small>
                                      </div>
                                      
                                      <div class="col-md-6">
                                         <input value="<?php echo $studData_row['birthPlace']; ?>" name="birthPlace" list="search_bplace" class="form-control form-control-sm" required="" />
                                         
                                         <datalist id="search_bplace">
                                                <?php
                                                
                                                $bplace_list_query = $conn->query("SELECT DISTINCT birthPlace FROM students");
                                                while($bp_list_row = $bplace_list_query->fetch()){ ?>
                                                
                                                <option><?php echo $bp_list_row['birthPlace']; ?></option>
                                                
                                                <?php } ?>
                                         </datalist>
                                      
                                         <small>Place of Birth</small>
                                      </div>
                                      
                                      <div class="col-md-2">
                                          <select name="sex" class="form-control form-control-sm">
                                          <option value="Male"><?php echo $studData_row['sex']; ?></option>
                                          <option>Male</option>
                                          <option>Female</option>
                                          </select>
                                          <small>Sex</small>
                                      </div>
                                      
                                    </div>
             
                                  </div>
                                </div>
                                
                                <div class="line"></div>
                    
                                <div class="form-group row">
                                  
                                  <div class="col-sm-12">
                                    <div class="row">
                                       
                                      <div class="col-md-3">
                                          <select name="civil_status" class="form-control form-control-sm">
                                          <option><?php echo $studData_row['civil_status']; ?></option>
                                          <option>Single</option>
                                          <option>Married</option>
                                          <option>Widow</option>
                                          </select>
                                          <small>Civil Status</small>
                                      </div>
                                      
                                      <div class="col-md-3">
                                         <input value="<?php echo $studData_row['age']; ?>" name="age" class="form-control form-control-sm" readonly="" />
                                         <small>Age</small>
                                      </div>
                                      
                                      <div class="col-md-3">
                                         <input value="<?php echo $studData_row['nationality']; ?>"  name="nationality" class="form-control form-control-sm" required="" />
                                         <small>Nationality</small>
                                      </div>
                                      
                                      <div class="col-md-3">
                                         <input value="<?php echo $studData_row['religion']; ?>" name="religion" list="search_religion" class="form-control form-control-sm" />
                                         <datalist id="search_religion">
                                                <?php
                                                
                                                $religion_list_query = $conn->query("SELECT DISTINCT religion FROM students");
                                                while($rel_list_row = $religion_list_query->fetch()){ ?>
                                                
                                                <option><?php echo $rel_list_row['religion']; ?></option>
                                                
                                                <?php } ?>
                                         </datalist>
                                         <small>Religion</small>
                                      </div>
                                      
                                    </div>
             
                                  </div>
                                </div>
                                
                                <div class="line"></div>
                    
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                    <div class="row">
                                      <div class="col-md-6">
                                         <input value="<?php echo $studData_row['address']; ?>" name="address" list="search_home_add" class="form-control form-control-sm" placeholder="Enter Home Address" required="" />
                                         <datalist id="search_home_add">
                                                <?php
                                                
                                                $home_add_list_query = $conn->query("SELECT DISTINCT address FROM students");
                                                while($home_add_list_row = $home_add_list_query->fetch()){ ?>
                                                
                                                <option><?php echo $home_add_list_row['address']; ?></option>
                                                
                                                <?php } ?>
                                         </datalist>
                                         <small>Home Address</small>
                                      </div>
                                      
                                      <div class="col-md-3">
                                         <input value="<?php echo $studData_row['contact_num']; ?>" name="contact_num" class="form-control form-control-sm" required="" />
                                         <small>Contact Number</small>
                                      </div>
                                      
                                      <div class="col-md-3">
                                         <input value="<?php echo $studData_row['email']; ?>" name="email" class="form-control form-control-sm" required="" />
                                         <small>Email Address</small>
                                      </div>
                                    </div>
             
                                  </div>
                                </div>
                                
                                <div class="line"></div>
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                    <div class="row">
                                      <div class="col-md-9">
                                         <input value="<?php echo $studData_row['last_school']; ?>" name="last_school" class="form-control form-control-sm" placeholder="Name of school" />
                                         <small>Last School Attended</small>
                                      </div>
                                      
                                      <div class="col-md-3">
                                         <input value="<?php echo $studData_row['last_school_sy']; ?>" name="last_school_sy" class="form-control form-control-sm" />
                                         <small>School Year</small>
                                      </div>
                                      
                                      <div class="col-md-9">
                                         <input value="<?php echo $studData_row['last_school_address']; ?>" name="last_school_address" class="form-control form-control-sm" />
                                         <small>School Address</small>
                                      </div>
                                      
                                      <div class="col-md-3">
                                          <select name="last_school_type" class="form-control form-control-sm">
                                          <option><?php echo $studData_row['last_school_type']; ?></option>
                                          <option>Private</option>
                                          <option>Public</option>
                                          </select>
                                          <small>Type</small>
                                      </div>
                                      
                                    </div>
             
                                  </div>
                                </div>
                  
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-header d-flex align-items-center">
                              <h4>Scholastic Records</h4>
                            </div>
                            <div class="card-body">
                            
                            <!-- ### GRADE SCHOOL ### -->
                            <?php if($studData_row['dept']==='Grade School' AND ($studData_row['gradeLevel']==='Nursery' OR $studData_row['gradeLevel']==='Preparatory' OR $studData_row['gradeLevel']==='Kinder')){ ?>
        
                            <?php }elseif($studData_row['dept']==='Grade School' AND ($studData_row['gradeLevel']==='Grade 1' OR $studData_row['gradeLevel']==='Grade 2' OR $studData_row['gradeLevel']==='Grade 3' OR $studData_row['gradeLevel']==='Grade 4' OR $studData_row['gradeLevel']==='Grade 5' OR $studData_row['gradeLevel']==='Grade 6')){ ?>
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <p>PRE-SCHOOL</p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['last_school']; ?>" name="last_school" list="search_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     
                                     <datalist id="search_last_school">
                                            <?php
                                            
                                            $last_school_list_query = $conn->query("SELECT DISTINCT last_school FROM students");
                                            while($last_school_list_row = $last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $last_school_list_row['last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['last_school_sy']; ?>" name="last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['last_school_address']; ?>" name="last_school_address" list="search_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_last_school_address">
                                            <?php
                                            
                                            $last_school_address_list_query = $conn->query("SELECT DISTINCT last_school_address FROM students");
                                            while($last_school_address_list_row = $last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $last_school_address_list_row['last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            
                            <?php if($studData_row['classification']==='Transferee'){ ?>
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <hr />
                              <p>ELEMENTARY SCHOOL <small>(If Transferee)</small></p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['elem_last_school']; ?>" name="elem_last_school" list="search_elem_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     <datalist id="search_elem_last_school">
                                            <?php
                                            
                                            $elem_last_school_list_query = $conn->query("SELECT DISTINCT elem_last_school FROM students");
                                            while($elem_last_school_list_row = $elem_last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $elem_last_school_list_row['elem_last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['elem_last_school_sy']; ?>" name="elem_last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['elem_last_school_address']; ?>" name="elem_last_school_address" list="search_elem_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_elem_last_school_address">
                                            <?php
                                            
                                            $elem_last_school_address_list_query = $conn->query("SELECT DISTINCT elem_last_school_address FROM students");
                                            while($elem_last_school_address_list_row = $elem_last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $elem_last_school_address_list_row['elem_last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="elem_last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['elem_last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            <?php } } ?>
                            <!-- ### END GRADE SCHOOL ### -->
                            
                            
                            <!-- ### JUNIOR HIGH SCHOOL ### -->
                            <?php if($studData_row['dept']==='Junior High School'){ ?>
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <p>PRE-SCHOOL <small>(If Transferee)</small></p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['last_school']; ?>" name="last_school" list="search_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     
                                     <datalist id="search_last_school">
                                            <?php
                                            
                                            $last_school_list_query = $conn->query("SELECT DISTINCT last_school FROM students");
                                            while($last_school_list_row = $last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $last_school_list_row['last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['last_school_sy']; ?>" name="last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['last_school_address']; ?>" name="last_school_address" list="search_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_last_school_address">
                                            <?php
                                            
                                            $last_school_address_list_query = $conn->query("SELECT DISTINCT last_school_address FROM students");
                                            while($last_school_address_list_row = $last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $last_school_address_list_row['last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <hr />
                              <p>ELEMENTARY SCHOOL</p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['elem_last_school']; ?>" name="elem_last_school" list="search_elem_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     <datalist id="search_elem_last_school">
                                            <?php
                                            
                                            $elem_last_school_list_query = $conn->query("SELECT DISTINCT elem_last_school FROM students");
                                            while($elem_last_school_list_row = $elem_last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $elem_last_school_list_row['elem_last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['elem_last_school_sy']; ?>" name="elem_last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['elem_last_school_address']; ?>" name="elem_last_school_address" list="search_elem_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_elem_last_school_address">
                                            <?php
                                            
                                            $elem_last_school_address_list_query = $conn->query("SELECT DISTINCT elem_last_school_address FROM students");
                                            while($elem_last_school_address_list_row = $elem_last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $elem_last_school_address_list_row['elem_last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="elem_last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['elem_last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            
                            <?php if($studData_row['classification']==='Transferee'){ ?>
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <hr />
                              <p>JUNIOR HIGH SCHOOL <small>(If Transferee)</small></p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['jhs_last_school']; ?>" name="jhs_last_school" list="search_jhs_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     <datalist id="search_jhs_last_school">
                                            <?php
                                            
                                            $jhs_last_school_list_query = $conn->query("SELECT DISTINCT jhs_last_school FROM students");
                                            while($jhs_last_school_list_row = $jhs_last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $jhs_last_school_list_row['jhs_last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['jhs_last_school_sy']; ?>" name="jhs_last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['jhs_last_school_address']; ?>" name="jhs_last_school_address" list="search_jhs_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_jhs_last_school_address">
                                            <?php
                                            
                                            $jhs_last_school_address_list_query = $conn->query("SELECT DISTINCT jhs_last_school_address FROM students");
                                            while($jhs_last_school_address_list_row = $jhs_last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $jhs_last_school_address_list_row['jhs_last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="jhs_last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['jhs_last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            <?php } } ?>
                            <!-- ### END JUNIOR HIGH SCHOOL ### -->
                            
                            
                            <!-- ### SENIOR HIGH SCHOOL ### -->
                            <?php if($studData_row['dept']==='Senior High School'){ ?>
                            
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <p>ELEMENTARY SCHOOL</p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['elem_last_school']; ?>" name="elem_last_school" list="search_elem_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     <datalist id="search_elem_last_school">
                                            <?php
                                            
                                            $elem_last_school_list_query = $conn->query("SELECT DISTINCT elem_last_school FROM students");
                                            while($elem_last_school_list_row = $elem_last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $elem_last_school_list_row['elem_last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['elem_last_school_sy']; ?>" name="elem_last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['elem_last_school_address']; ?>" name="elem_last_school_address" list="search_elem_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_elem_last_school_address">
                                            <?php
                                            
                                            $elem_last_school_address_list_query = $conn->query("SELECT DISTINCT elem_last_school_address FROM students");
                                            while($elem_last_school_address_list_row = $elem_last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $elem_last_school_address_list_row['elem_last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="elem_last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['elem_last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <hr />
                              <p>JUNIOR HIGH SCHOOL</p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['jhs_last_school']; ?>" name="jhs_last_school" list="search_jhs_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     <datalist id="search_jhs_last_school">
                                            <?php
                                            
                                            $jhs_last_school_list_query = $conn->query("SELECT DISTINCT jhs_last_school FROM students");
                                            while($jhs_last_school_list_row = $jhs_last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $jhs_last_school_list_row['jhs_last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['jhs_last_school_sy']; ?>" name="jhs_last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['jhs_last_school_address']; ?>" name="jhs_last_school_address" list="search_jhs_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_jhs_last_school_address">
                                            <?php
                                            
                                            $jhs_last_school_address_list_query = $conn->query("SELECT DISTINCT jhs_last_school_address FROM students");
                                            while($jhs_last_school_address_list_row = $jhs_last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $jhs_last_school_address_list_row['jhs_last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="jhs_last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['jhs_last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            <?php if($studData_row['classification']==='Transferee'){ ?>
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <hr />
                              <p>SENIOR HIGH SCHOOL <small>(If Transferee)</small></p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['shs_last_school']; ?>" name="shs_last_school" list="search_shs_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     <datalist id="search_shs_last_school">
                                            <?php
                                            
                                            $shs_last_school_list_query = $conn->query("SELECT DISTINCT shs_last_school FROM students");
                                            while($shs_last_school_list_row = $shs_last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $shs_last_school_list_row['shs_last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['shs_last_school_sy']; ?>" name="shs_last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['shs_last_school_address']; ?>" name="shs_last_school_address" list="search_shs_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_shs_last_school_address">
                                            <?php
                                            
                                            $shs_last_school_address_list_query = $conn->query("SELECT DISTINCT shs_last_school_address FROM students");
                                            while($shs_last_school_address_list_row = $shs_last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $shs_last_school_address_list_row['shs_last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="shs_last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['shs_last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            <?php } } ?>
                            <!-- ### END SENIOR HIGH SCHOOL ### -->
                            
                            <!-- ### COLLEGE ### -->
                            <?php if($studData_row['dept']==='College'){ ?>
                            
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <p>ELEMENTARY SCHOOL</p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['elem_last_school']; ?>" name="elem_last_school" list="search_elem_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     <datalist id="search_elem_last_school">
                                            <?php
                                            
                                            $elem_last_school_list_query = $conn->query("SELECT DISTINCT elem_last_school FROM students");
                                            while($elem_last_school_list_row = $elem_last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $elem_last_school_list_row['elem_last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['elem_last_school_sy']; ?>" name="elem_last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['elem_last_school_address']; ?>" name="elem_last_school_address" list="search_elem_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_elem_last_school_address">
                                            <?php
                                            
                                            $elem_last_school_address_list_query = $conn->query("SELECT DISTINCT elem_last_school_address FROM students");
                                            while($elem_last_school_address_list_row = $elem_last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $elem_last_school_address_list_row['elem_last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="elem_last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['elem_last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <hr />
                              <p>JUNIOR HIGH SCHOOL</p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['jhs_last_school']; ?>" name="jhs_last_school" list="search_jhs_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     <datalist id="search_jhs_last_school">
                                            <?php
                                            
                                            $jhs_last_school_list_query = $conn->query("SELECT DISTINCT jhs_last_school FROM students");
                                            while($jhs_last_school_list_row = $jhs_last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $jhs_last_school_list_row['jhs_last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['jhs_last_school_sy']; ?>" name="jhs_last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['jhs_last_school_address']; ?>" name="jhs_last_school_address" list="search_jhs_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_jhs_last_school_address">
                                            <?php
                                            
                                            $jhs_last_school_address_list_query = $conn->query("SELECT DISTINCT jhs_last_school_address FROM students");
                                            while($jhs_last_school_address_list_row = $jhs_last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $jhs_last_school_address_list_row['jhs_last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="jhs_last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['jhs_last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <hr />
                              <p>SENIOR HIGH SCHOOL</p>
                                <div class="row">
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['shs_last_school']; ?>" name="shs_last_school" list="search_shs_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                                     <datalist id="search_shs_last_school">
                                            <?php
                                            
                                            $shs_last_school_list_query = $conn->query("SELECT DISTINCT shs_last_school FROM students");
                                            while($shs_last_school_list_row = $shs_last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $shs_last_school_list_row['shs_last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>Name of School</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['shs_last_school_sy']; ?>" name="shs_last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['shs_last_school_address']; ?>" name="shs_last_school_address" list="search_shs_last_school_address" class="form-control form-control-sm" required="" />
                                     <datalist id="search_shs_last_school_address">
                                            <?php
                                            
                                            $shs_last_school_address_list_query = $conn->query("SELECT DISTINCT shs_last_school_address FROM students");
                                            while($shs_last_school_address_list_row = $shs_last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $shs_last_school_address_list_row['shs_last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="shs_last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['shs_last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            
                            <?php if($studData_row['classification']==='Transferee'){ ?>
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <hr />
                              <p>COLLEGE <small>(If Transferee)</small></p>
                                <div class="row">
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['col_last_school']; ?>" name="col_last_school" list="search_col_last_school" class="form-control form-control-sm" placeholder="Name of school" required="" />
                                     <datalist id="search_col_last_school">
                                            <?php
                                            
                                            $col_last_school_list_query = $conn->query("SELECT DISTINCT col_last_school FROM students");
                                            while($col_last_school_list_row = $col_last_school_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $col_last_school_list_row['col_last_school']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>Last School Attended</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                     <input value="<?php echo $studData_row['col_last_school_sy']; ?>" name="col_last_school_sy" class="form-control form-control-sm" required="" />
                                     <small>School Year</small>
                                  </div>
                                  
                                  <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                  
                                  <div class="col-md-9">
                                     <input value="<?php echo $studData_row['col_last_school_address']; ?>" name="col_last_school_address" list="search_col_last_school_address" class="form-control form-control-sm" placeholder="Complete school address" required="" />
                                     <datalist id="search_col_last_school_address">
                                            <?php
                                            
                                            $col_last_school_address_list_query = $conn->query("SELECT DISTINCT col_last_school_address FROM students");
                                            while($col_last_school_address_list_row = $col_last_school_address_list_query->fetch()){ ?>
                                            
                                            <option><?php echo $col_last_school_address_list_row['col_last_school_address']; ?></option>
                                            
                                            <?php } ?>
                                     </datalist>
                                     <small>School Address</small>
                                  </div>
                                  
                                  <div class="col-md-3">
                                      <select name="col_last_school_type" class="form-control form-control-sm">
                                      <option><?php echo $studData_row['col_last_school_type']; ?></option>
                                      <option>Private</option>
                                      <option>Public</option>
                                      </select>
                                      <small>Type</small>
                                  </div>
                                  
                                </div>
         
                              </div>
                            </div>
                            <?php } } ?>
                    
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-lg-12">
                          <div class="card">
                            <div class="card-header d-flex align-items-center">
                              <h4>Parent's Information</h4>
                            </div>
                            <div class="card-body">
                            
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                    <div class="row">
                                    <div class="col-md-12">
                                    Father's Information
                                    </div>
                                    <div class="col-md-8">
                                         <input value="<?php echo $studData_row['father_name']; ?>" name="father_name" class="form-control form-control-sm" placeholder="Enter father's name" required="" />
                                         <small>Fullname</small>
                                    </div>
                                      
                                    <div class="col-md-4">
                                         <input value="<?php echo $studData_row['father_occupation']; ?>" name="father_occupation" class="form-control form-control-sm" placeholder="Enter occupation" required="" />
                                         <small>Occupation</small>
                                    </div>
                                      
                                    <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                      
                                    <div class="col-md-8">
                                         <input value="<?php echo $studData_row['father_address']; ?>" name="father_address" list="search_father_address" class="form-control form-control-sm" placeholder="Enter address" required="" />
                                         <datalist id="search_father_address">
                                                <?php
                                                
                                                $father_address_list_query = $conn->query("SELECT DISTINCT father_address FROM students");
                                                while($father_address_list_row = $father_address_list_query->fetch()){ ?>
                                                
                                                <option><?php echo $father_address_list_row['father_address']; ?></option>
                                                
                                                <?php } ?>
                                         </datalist>
                                         <small>Address</small>
                                    </div>
                                      
                                    <div class="col-md-4">
                                      <input value="<?php echo $studData_row['father_contact']; ?>" name="father_contact" class="form-control form-control-sm" placeholder="Enter contact number" required="" />
                                      <small>Contact Number</small>
                                    </div>
                                     
                                    <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                    
                                    <div class="col-md-12">
                                    Mother's Information
                                    </div>
                                      <div class="col-md-8">
                                         <input value="<?php echo $studData_row['mother_name']; ?>" name="mother_name" class="form-control form-control-sm" placeholder="Enter mother's Name" required="" />
                                         <small>Fullname (Maiden Name)</small>
                                      </div>
                                      
                                      <div class="col-md-4">
                                         <input value="<?php echo $studData_row['mother_occupation']; ?>" name="mother_occupation" class="form-control form-control-sm" placeholder="Enter occupation" required="" />
                                         <small>Occupation</small>
                                      </div>
                                      
                                      <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                      
                                      <div class="col-md-8">
                                         <input value="<?php echo $studData_row['mother_address']; ?>" name="mother_address" list="search_mother_address" class="form-control form-control-sm" placeholder="Enter address" required="" />
                                         <datalist id="search_mother_address">
                                                <?php
                                                
                                                $mother_address_list_query = $conn->query("SELECT DISTINCT mother_address FROM students");
                                                while($mother_address_list_row = $mother_address_list_query->fetch()){ ?>
                                                
                                                <option><?php echo $mother_address_list_row['mother_address']; ?></option>
                                                
                                                <?php } ?>
                                         </datalist>
                                         <small>Address</small>
                                      </div>
                                      
                                      <div class="col-md-4">
                                         <input value="<?php echo $studData_row['mother_contact']; ?>" name="mother_contact" class="form-control form-control-sm" placeholder="Enter contact number" />
                                         <small>Contact Number</small>
                                      </div>
                                      
                                      <div class="col-md-12" style="margin-bottom: 12px;"></div>
                                      
                                      <div class="col-md-12">
                                         <input value="<?php echo $studData_row['parents_email']; ?>" name="parents_email" type="email" class="form-control form-control-sm" placeholder="Enter parent's email address" required="" />
                                         <small>Parent's Email Address</small>
                                      </div>
                                      
                                    </div>
             
                                  </div>
                                </div>
                                
                                <div class="form-group row">
                                
                                <div class="col-md-12">
                                    Guardian's Information <small>(If living with the guardian)</small>
                                </div>
                                  <div class="col-sm-12">
                                    <div class="row">
                                      <div class="col-md-6">
                                         <input value="<?php echo $studData_row['guardian_name']; ?>" name="guardian_name" class="form-control form-control-sm" placeholder="Enter fullname" />
                                         <small>Fullname</small>
                                      </div>
                                      
                                      <div class="col-md-3">
                                         <input value="<?php echo $studData_row['guardian_contact']; ?>" name="guardian_contact" class="form-control form-control-sm" placeholder="Enter contact number" />
                                         <small>Contact Number</small>
                                      </div>
                                      
                                  
                                      
                                      <div class="col-md-3">
                                         <input value="<?php echo $studData_row['guardian_relation']; ?>" name="guardian_relation" list="search_guardian_relation" class="form-control form-control-sm" placeholder="Enter relation to guardian" />
                                         <datalist id="search_guardian_relation">
                                                <?php
                                                
                                                $guardian_relation_list_query = $conn->query("SELECT DISTINCT guardian_relation FROM students");
                                                while($guardian_relation_list_row = $guardian_relation_list_query->fetch()){ ?>
                                                
                                                <option><?php echo $guardian_relation_list_row['guardian_relation']; ?></option>
                                                
                                                <?php } ?>
                                         </datalist>
                                         <small>Relation</small>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <div class="col-12 text-center">
                                        <br />
                                      </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                      <div class="col-12 text-center">
                                        <button name="updateStudInfo" type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                
                                  </div>
                                </div>
              
                            </div>
                          </div>
                        </div>
                         
                      </form>
                      </div>