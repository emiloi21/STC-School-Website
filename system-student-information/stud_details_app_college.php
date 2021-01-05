          <div class="row">
          <form action="save_student_profile_applicants.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>" method="POST" class="col-lg-12">
            
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Application Details</h4>
                </div>
                <div class="card-body">
                
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-3">
                            <select name="gradeLevel" class="form-control form-control-sm">
                              <option><?php echo $studData_row['gradeLevel']; ?></option>
                              <optgroup label="Grade School"></optgroup>
                              <option>Nursery</option>
                              <option>Preparatory</option>
                              <option>Kinder</option>
                              <option>Grade 1</option>
                              <option>Grade 2</option>
                              <option>Grade 3</option>
                              <option>Grade 4</option>
                              <option>Grade 5</option>
                              <option>Grade 6</option>
                              
                              <optgroup label="Junior High School"></optgroup>
                              <option>Grade 7</option>
                              <option>Grade 8</option>
                              <option>Grade 9</option>
                              <option>Grade 10</option>
                              
                              <optgroup label="Senior High School"></optgroup>
                              <option>Grade 11</option>
                              <option>Grade 12</option>
                              
                              <optgroup label="College"></optgroup>
                              <option>1st Year</option>
                              <option>2nd Year</option>
                              <option>3rd Year</option>
                              <option>4th Year</option>
                              
                            </select>
                            <small>Grade/Year Level</small>
                          </div>
                          
                          <div class="col-md-3">
                            <select name="strand" class="form-control form-control-sm">
                              <option><?php echo $studData_row['strand']; ?></option>
                              
                              <option>N/A</option>
                              
                              <optgroup label="SHS Strands"></optgroup>
                              <option>ABM</option>
                              <option>GAS</option>
                              <option>HUMSS</option>
                              <option>STEM</option>
                              
                              <optgroup label="College Courses"></optgroup>
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
                            <small>Strand/Course</small>
                          </div>
                          
                          <div class="col-md-3">
                            <select name="major" class="form-control form-control-sm">
                              <option><?php echo $studData_row['major']; ?></option>
                              
                              <option>N/A</option>
                              
                              <optgroup label="BSED Courses"></optgroup>
                              <option value="English">English</option>
                              <option value="Filipino">Filipino</option>
                              <option value="Mathematics">Mathematics</option>
                              <option value="Science">Science</option>
                              <option value="Social Studies">Social Studies</option>
                              <option value="Values Education">Values Education</option>
                              
                              <optgroup label="BSBA Courses"></optgroup>
                              <option value="FM">Financial Management</option>
                              <option value="HRDM">Human Resource Development Management</option>
                              
                            </select>
                            <small>Major</small>
                          </div>
                          
                          <div class="col-md-3">
                            <select name="classification" class="form-control form-control-sm">
                              <option><?php echo $studData_row['classification']; ?></option>
                              <option>New</option>
                              <option>Old</option>
                              <option>Transferee</option>
                            </select>
                            <small>Classification</small>
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
                    <?php
                    
                    if($studData_row['bdMM']==='01'){ $wordMM="Jan"; }
                    elseif($studData_row['bdMM']==='02'){ $wordMM="Feb"; }
                    elseif($studData_row['bdMM']==='03'){ $wordMM="Mar"; }
                    elseif($studData_row['bdMM']==='04'){ $wordMM="Apr"; }
                    elseif($studData_row['bdMM']==='05'){ $wordMM="May"; }
                    elseif($studData_row['bdMM']==='06'){ $wordMM="Jun"; }
                    elseif($studData_row['bdMM']==='07'){ $wordMM="Jul"; }
                    elseif($studData_row['bdMM']==='08'){ $wordMM="Aug"; }
                    elseif($studData_row['bdMM']==='09'){ $wordMM="Sep"; }
                    elseif($studData_row['bdMM']==='10'){ $wordMM="Oct"; }
                    elseif($studData_row['bdMM']==='11'){ $wordMM="Nov"; }
                    elseif($studData_row['bdMM']==='12'){ $wordMM="Dec"; }
                    else{ $wordMM="-"; }
                    ?>
                    <div class="form-group row">
                      
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-2">
                             <select name="bdMM" class="form-control form-control-sm">
                              <option value="<?php echo $studData_row['bdMM']; ?>"><?php echo $wordMM; ?></option>
                              <option value="01">Jan</option>
                              <option value="02">Feb</option>
                              <option value="03">Mar</option>
                              <option value="04">Apr</option>
                              <option value="05">May</option>
                              <option value="06">Jun</option>
                              <option value="07">Jul</option>
                              <option value="08">Aug</option>
                              <option value="09">Sep</option>
                              <option value="10">Oct</option>
                              <option value="11">Nov</option>
                              <option value="12">Dec</option>
                              </select>
                             <small>Month</small>
                          </div>
                          
                          <div class="col-md-2">
                             <select name="bdDD" class="form-control form-control-sm">
                              <option><?php echo $studData_row['bdDD']; ?></option>
                              <option>01</option>
                              <option>02</option>
                              <option>03</option>
                              <option>04</option>
                              <option>05</option>
                              <option>06</option>
                              <option>07</option>
                              <option>08</option>
                              <option>09</option>
                              <option>10</option>
                              <option>11</option>
                              <option>12</option>
                              <option>13</option>
                              <option>14</option>
                              <option>15</option>
                              <option>16</option>
                              <option>17</option>
                              <option>18</option>
                              <option>19</option>
                              <option>20</option>
                              <option>21</option>
                              <option>22</option>
                              <option>23</option>
                              <option>24</option>
                              <option>25</option>
                              <option>26</option>
                              <option>27</option>
                              <option>28</option>
                              <option>29</option>
                              <option>30</option>
                              <option>31</option>
                              </select>
                             <small>Day</small>
                          </div>
                          
                          <div class="col-md-2">
                             <input value="<?php echo $studData_row['bdYYYY']; ?>" name="bdYYYY" class="form-control form-control-sm" placeholder="Enter Birth Year" />
                             <small>Year</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['birthPlace']; ?>" name="birthPlace" class="form-control form-control-sm" />
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
                             <input value="<?php echo $studData_row['nationality']; ?>"  name="nationality" class="form-control form-control-sm" />
                             <small>Nationality</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['religion']; ?>"  name="religion" class="form-control form-control-sm" />
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
                             <input value="<?php echo $studData_row['address']; ?>" name="address" class="form-control form-control-sm" placeholder="Enter Home Address" />
                             <small>Home Address</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['contact_num']; ?>" name="contact_num" class="form-control form-control-sm" required="" />
                             <small>Contact Number</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['email']; ?>" name="email" class="form-control form-control-sm" readonly="" />
                             <small>Email Address</small>
                          </div>
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <p>ELEMENTARY SCHOOL</p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['elem_last_school']; ?>" name="elem_last_school" class="form-control form-control-sm" placeholder="Name of school" />
                             <small>Last School Attended</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['elem_last_school_sy']; ?>" name="elem_last_school_sy" class="form-control form-control-sm" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['elem_last_school_address']; ?>" name="elem_last_school_address" class="form-control form-control-sm" />
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
                      <p>JUNIOR SCHOOL</p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['jhs_last_school']; ?>" name="jhs_last_school" class="form-control form-control-sm" placeholder="Name of school" />
                             <small>Last School Attended</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['jhs_last_school_sy']; ?>" name="jhs_last_school_sy" class="form-control form-control-sm" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['jhs_last_school_address']; ?>" name="jhs_last_school_address" class="form-control form-control-sm" />
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
                      <p>SENIOR HIGH SCHOOL</p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['shs_last_school']; ?>" name="shs_last_school" class="form-control form-control-sm" placeholder="Name of school" />
                             <small>Last School Attended</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['shs_last_school_sy']; ?>" name="shs_last_school_sy" class="form-control form-control-sm" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['shs_last_school_address']; ?>" name="shs_last_school_address" class="form-control form-control-sm" />
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
                      <p>COLLEGE <small>(If Transferee)</small></p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['col_last_school']; ?>" name="col_last_school" class="form-control form-control-sm" placeholder="Name of school" />
                             <small>Last School Attended</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['col_last_school_sy']; ?>" name="col_last_school_sy" class="form-control form-control-sm" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['col_last_school_address']; ?>" name="col_last_school_address" class="form-control form-control-sm" />
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
                    <?php } ?>
                    
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
                        Father's Info
                        </div>
                          <div class="col-md-8">
                             <input value="<?php echo $studData_row['father_name']; ?>" name="father_name" class="form-control form-control-sm" placeholder="Enter father's name" />
                             <small>Fullname</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['father_occupation']; ?>" name="father_occupation" class="form-control form-control-sm" placeholder="Enter occupation" />
                             <small>Occupation</small>
                          </div>
                          
                          <div class="col-md-8">
                             <input value="<?php echo $studData_row['father_address']; ?>" name="father_address" class="form-control form-control-sm" placeholder="Enter address" />
                             <small>Address</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['father_contact']; ?>" name="father_contact" class="form-control form-control-sm" placeholder="Enter contact number" />
                             <small>Contact Number</small>
                          </div>
                          
                        <div class="line"></div>
                        
                        <div class="col-md-12">
                        Mother's Info
                        </div>
                          <div class="col-md-8">
                             <input value="<?php echo $studData_row['mother_name']; ?>" name="mother_name" class="form-control form-control-sm" placeholder="Enter First Name" />
                             <small>Fullname (Maiden Name)</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['mother_occupation']; ?>" name="mother_occupation" class="form-control form-control-sm" placeholder="Enter occupation" />
                             <small>Occupation</small>
                          </div>
                          
                          <div class="col-md-8">
                             <input value="<?php echo $studData_row['mother_address']; ?>" name="mother_address" class="form-control form-control-sm" placeholder="Enter address" />
                             <small>Address</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['mother_contact']; ?>" name="mother_contact" class="form-control form-control-sm" placeholder="Enter contact number" />
                             <small>Contact Number</small>
                          </div>
                          
                        <div class="line"></div>
                        
                          <div class="col-md-12">
                             <input value="<?php echo $studData_row['parents_email']; ?>" name="parents_email" class="form-control form-control-sm" placeholder="Enter parent's email address" />
                             <small>Parent's Email Address</small>
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
                  <h4>Guardian's Information <small>(If living with the guardian)</small></h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
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
                              <select name="guardian_relation" class="form-control form-control-sm">
                              <option><?php echo $studData_row['guardian_relation']; ?></option>
                              <option>-</option>
                              <option>Step Father</option>
                              <option>Step Mother</option>
                              <option>Relative</option>
                              <option>Non-Relative</option>
                              </select>
                              <small>Relation</small>
                          </div>
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-12 text-center">

                                    <?php if($_GET['status']==='Setup'){ ?>
                                        <button name="verifyStudStatus" type="submit" class="btn btn-primary">Verify Application</button>
                             
                                    <?php }else{ ?>
                                        <button name="updateInfoElem" type="submit" class="btn btn-primary">Save changes</button>
                                    
                                    <?php } ?>
                                    
                      </div>
                    </div>
                    
                </div>
              </div>
            </div>
            
            </form>
          </div>