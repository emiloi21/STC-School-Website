                            <?php
 
                            $editStud_query = $conn->query("SELECT * FROM students WHERE class_id='$_GET[class_id]' ORDER BY sex, lname, fname ASC") or die(mysql_error());
                            
                            while ($editStud_row = $editStud_query->fetch()) 
                            { 
                                $reg_id=$editStud_row['reg_id'];
                                
                             $classDetails_query = $conn->query("SELECT gradeLevel, strand, section, dept FROM classes WHERE class_id='$_GET[class_id]'") or die(mysql_error());
                             $cDetails_row = $classDetails_query->fetch();
                             
                        if($editStud_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($editStud_row['suffix']=='-') { $suffix=''; }else{ $suffix=$editStud_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$editStud_row['mname'];
                        } ?>
                        
                        <!-- delete student Modal -->
                          <div id="deleteStudent<?php echo $reg_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_student.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $_GET['class_id']; ?>" method="POST">
                              <input name="reg_id" value="<?php echo $reg_id; ?>" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Student</h5>
                                  <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="icon-close"></span></a>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>Are you sure you want to delete student:<br /><br /><?php echo $editStud_row['fname']." ".$finalMName." ".$editStud_row['lname']; ?>?
                                <br />
                                <small class="form-text">
                                <?php 
                                  if($cDetails_row['dept']=="SHS")
                                  {
                                    echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']." - ".$cDetails_row['section'];
                                  }else{
                                    echo $cDetails_row['gradeLevel']." - ".$cDetails_row['section'];
                                  }
                                ?> 
                                
                         </small>
                                </h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteStudent" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
                          
                          
                          
                   
                    
                  
                  <!-- edit student Modal -->
            
                  <div id="editStudent<?php echo $reg_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                       <form action="save_add_student.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $_GET['class_id']; ?>" method="POST" enctype="multipart/form-data">
                       
                       
                       <input value="<?php echo $reg_id; ?>" name="reg_id" type="hidden" />
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Student</h5>
                          <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="icon-close"></span></a>
                        </div>
                        
                        <div class="modal-body">
            
                        <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Student ID</label>
                              <div class="col-sm-10">
                              
                              <div class="row">
                                <div class="col-md-12">
                                <input value="<?php echo $editStud_row['student_id']; ?>" name="old_student_id" type="hidden" />
                                <input value="<?php echo $editStud_row['student_id']; ?>" name="student_id" type="text" class="form-control" />
                                
                                </div>
             
                              </div>
                                
                              </div>
                            </div>
                            
                            
                        
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Fullname</label>
                              <div class="col-sm-10">
                              
                              <div class="row">
                              
                                <div class="col-md-6">
                                <input value="<?php echo $editStud_row['fname']; ?>" name="fname" type="text" class="form-control">
                                <small class="form-text">First Name</small>
                                </div>
                                
                                <div class="col-md-6">
                                <input value="<?php echo $editStud_row['mname']; ?>" name="mname" type="text" class="form-control">
                                <small class="form-text">Middle Name</small>
                                </div>
                                
                              </div>
                                
                              </div>
                            </div>
                            
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label"></label>
                              <div class="col-sm-10">
                              
                              <div class="row">
                                <div class="col-md-8">
                                <input value="<?php echo $editStud_row['lname']; ?>" name="lname" type="text" class="form-control">
                                <small class="form-text">Last Name</small>
                                </div>
                                
                                
                                  <div class="col-md-4">
                                     
                                    <select name="suffix" class="form-control">
                                    <option><?php echo $editStud_row['suffix']; ?></option>
                                    <option>-</option>
                                    <option>Jr.</option>
                                    <option>III</option>
                                    <option>IV</option>
                                    </select>
                                    <small class="form-text">Suffix</small>
                                  </div>
                              </div>
                                
                              </div>
                            </div>
                            
                         
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Date of Birth</label>
                              <div class="col-sm-10">
                                <div class="row">
                                  <div class="col-md-4">
                                     
                                    <select name="bdMM" class="form-control">
                                    <option><?php echo $editStud_row['bdMM']; ?></option>
                                    <option>-</option>
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
                                    </select>
                                    <small class="form-text">Month</small>
                                  </div>
                                  <div class="col-md-4">
                                    
                                    <select name="bdDD" class="form-control">
                                    <option><?php echo $editStud_row['bdDD']; ?></option>
                                    <option>-</option>
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
                                    <small class="form-text">Day</small>
                                  </div>
                                  <div class="col-md-4">
                                     
                                    <input value="<?php echo $editStud_row['bdYYYY']; ?>" name="bdYYYY" type="text" class="form-control">
                                    <small class="form-text">Year</small>
                                    
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Mobile Number</label>
                              <div class="col-sm-10">
                              
                              <div class="row">
                                <div class="col-md-8">
                                <input value="<?php echo $editStud_row['gMobileNumber']; ?>" name="gMobileNumber" type="text" class="form-control">
                                <small class="form-text">+639123456789 (this format is a MUST)</small>
                                </div>
                                
                                
                                  <div class="col-md-4">
                                     
                                    <select name="sex" class="form-control">
                                    <option><?php echo $editStud_row['sex']; ?></option>
                                    <option>-</option>
                                    <option>Male</option>
                                    <option>Female</option> 
                                    </select>
                                    <small class="form-text">Sex</small>
                                  </div>
                              </div>
                                
                              </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Address</label>
                              <div class="col-sm-10">

                                <input name="address" type="text" value="<?php echo $editStud_row['address']; ?>" class="form-control">
                                <small class="form-text">Street, Barangay, City/Municipality</small>

                              </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                               
                              <div class="col-sm-12">
                                <div class="row">
                                
                                
               
                                 <div class="col-md-4">
                                    <select style="font-size: medium;" name="gradeLevel" class="form-control">
                                    <option value="<?php echo $cDetails_row['gradeLevel']; ?>"><?php echo $cDetails_row['gradeLevel']; ?></option>
                                    <option value="Nursery">Nursery</option>
                                    <option value="Kinder 1">Kinder 1</option>
                                    <option value="Kinder 2">Kinder 2</option>
                                    <option value="Grade 1">Grade 1</option>
                                    <option value="Grade 2">Grade 2</option>
                                    <option value="Grade 3">Grade 3</option>
                                    <option value="Grade 4">Grade 4</option>
                                    <option value="Grade 5">Grade 5</option>
                                    <option value="Grade 6">Grade 6</option>
                                    <option value="Grade 7">Grade 7</option>
                                    <option value="Grade 8">Grade 8</option>
                                    <option value="Grade 9">Grade 9</option>
                                    <option value="Grade 10">Grade 10</option>
                                    <option value="Grade 11">Grade 11</option>
                                    <option value="Grade 12">Grade 12</option>
                                    </select>
                                    
                                    <small class="form-text">Grade Level</small>
                                </div>
                                  
                                  <div class="col-md-3">
                                    <select style="font-size: smaller;" name="strand" class="form-control">
                                    <option><?php echo $cDetails_row['strand']; ?></option>
                                     <option>N/A</option>
                                      <option>ABM</option>
                                      <option>GAS</option>
                                      <option>HUMSS</option>
                                      <option>STEM</option>
                                    </select>
                                    <small class="form-text">Strand</small>
                                  </div>
                                  
                                  <div class="col-md-5">
                                     
                                    <select name="section" style="font-size: smaller;" class="form-control">
                                    <option><?php echo $cDetails_row['section']; ?></option>
                                    <option>-</option>
                                    <?php
                                    
                                    $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='$editStud_row[gradeLevel]' AND schoolYear='$data_src_sy' ORDER BY  section ASC") or die(mysql_error());
                                    while ($section_row = $section_query->fetch()) 
                                    { ?>
                                    <option><?php echo $section_row['section']; ?></option>
                                    <?php } ?>
                                    </select>
                                    
                                    <small class="form-text">Section</small>
                                    
                                  </div>
                                
                                 
                                  
                                </div>
                              </div>
                            </div>
                    
                            
                    
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateStudent" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                        </form>
                        
                      </div>
                    </div>
                  </div>
                  <!-- end edit Modal -->
                  
   <?php } ?> 
   
   
   
<script>

let sections = {"Nursery":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Nursery' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                "Kinder 1":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Kinder 1' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                "Kinder 2":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Kinder 2' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                "Grade 1":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 1' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                "Grade 2":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 2' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                "Grade 3":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 3' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                "Grade 4":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 4' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                
                "Grade 5":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 5' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                
                "Grade 6":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 6' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                
                "Grade 7":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 7' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                
                "Grade 8":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 8' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                
                "Grade 9":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 9' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                
                "Grade 10":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 10' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                
                "Grade 11":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 11' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ],
                
                
                "Grade 12":[
                <?php
                $section_query = $conn->query("SELECT section FROM classes WHERE gradeLevel='Grade 12' AND schoolYear='$data_src_sy' ORDER BY section ASC") or die(mysql_error());
                $x1ctr=0;
                while ($section_row = $section_query->fetch())
                { $x1ctr=$x1ctr+1; if($x1ctr==1){ ?>
                {desc:"<?php echo $section_row['section']; ?>"}
                <?php }elseif($x1ctr>1){ ?> 
                ,{desc:"<?php echo $section_row['section']; ?>"}
                <?php } } ?>
                ]}
                
                
                
                
document.getElementsByName('gradeLevel')[0].addEventListener('change', function(e) {
  document.getElementsByName('section')[0].innerHTML = sections[this.value].reduce((acc, elem) => `${acc}<option>${elem.desc}</option>`, "");
});

</script>          