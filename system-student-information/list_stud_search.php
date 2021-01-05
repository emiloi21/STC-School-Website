<?php
if(isset($_POST['search'])){
$searched=$_POST['searchStudent'];
}else{
$searched='';
} ?>
       
       <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
            <!-- kinder 1  -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">All Students</h2>
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a>
                </div>
                
                <div id="updates-boxContacts" role="tabpanel" class="collapse show">
                
                <div class="tab" style="margin-top: 8px;">
 
                <?php if($_GET['dept']=="All"){ ?>
                <a title="All student list" href="list_students.php?dept=All&class_id=" class="tablinks active" style="font-weight: bolder;">All</a>
                <?php }else{?>
                <a title="All student list" href="list_students.php?dept=All&class_id=" class="tablinks">All</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_students.php?dept=Grade School&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">Grade School</a>
                <?php }else{?>
                <a title="Grade School student list" href="list_students.php?dept=Grade School&class_id=" class="tablinks">Grade School</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Junior High School"){ ?>
                <a title="Junior High School student list" href="list_students.php?dept=Junior High School&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">JHS</a>
                <?php }else{?>
                <a title="Junior High School student list" href="list_students.php?dept=Junior High School&class_id=" class="tablinks">JHS</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Senior High School"){ ?>
                <a title="Senior High School student list" href="list_students.php?dept=Senior High School&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">SHS</a>
                <?php }else{?>
                <a title="Senior High School student list" href="list_students.php?dept=Senior High School&class_id=" class="tablinks">SHS</a>
                <?php } ?>
           
                <?php if($_GET['dept']=="College"){ ?>
                <a title="College student list" href="list_students.php?dept=College&class_id=<?php echo $_GET['class_id']; ?>" class="tablinks active" style="font-weight: bolder;">College</a>
                <?php }else{?>
                <a title="College student list" href="list_students.php?dept=College&class_id=" class="tablinks">College</a>
                <?php } ?>
                
                </div>
                
                <div id="London" class="tabcontent" style = "display: block;">
                
                <form method="POST">
                <div class="form-group row">
                        <div class="col-sm-12">
                          <div class="input-group">
                          
                          <input value="<?php echo $searched; ?>" name="searchStudent" list="search_list" placeholder="Search for Student's ID Code / Lastname..." class="form-control" required="true" />
                          
                          
                          
                          <datalist id="search_list">
                                    <?php
                                    
                                    $fnameList_query = $conn->query("SELECT DISTINCT student_id, lname, fname, mname FROM students WHERE schoolYear='$data_src_sy'");
                                    while($fnlq_row = $fnameList_query->fetch()){ ?>
                                    
                                    <option value="<?php echo $fnlq_row['student_id']; ?>"><?php echo $fnlq_row['student_id']; ?> | <small><?php echo $fnlq_row['lname'].', '.$fnlq_row['fname'].' '.$fnlq_row['mname']; ?></small></option>
                                    
                                    <?php } ?>
                          </datalist>
                          
                            
                            <div class="input-group-append">
                              <button name="search" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                            </div>
                          </div>
                        </div>
                    </div>
                 </form>   
 
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                    
                    <thead>
                    <tr>
                    <th style="width: 4%;">#</th>
                    <th style="width: 48%;">Full Name</th>
                    <th style="width: 48%;">Requirements</th>
                    </tr>
                    </thead>
                    
                      
                      <tbody>
                      
                            <?php
                            
                            if($searched==='')
                            {
                                
                            }else{    
                            
                            $studCtr=0;
                            $subjK_query = $conn->query("SELECT * FROM students WHERE (student_id LIKE '%$searched%' OR lname LIKE '%$searched%') AND schoolYear='$data_src_sy' AND status='Enrolled' ORDER BY sex, lname, fname ASC") or die(mysql_error());
                            while ($studData_row = $subjK_query->fetch()){
                                
                            $studCtr+=1;
                            $reg_id_search=$studData_row['reg_id'];
                        
                        $classDetails_query = $conn->query("SELECT gradeLevel, strand, major, section, dept FROM classes WHERE class_id='$studData_row[class_id]'") or die(mysql_error());
                        $cDetails_row = $classDetails_query->fetch();
                                
                        if($studData_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$studData_row['mname'];
                            
                        } ?>
           
                        <tr>
                        
                        <td style="width: 10px; vertical-align: top;"><strong><?php echo $studCtr; ?>. </strong></td>
                        
                        <td style="vertical-align: top;">
                        <?php echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?> <small class="badge badge-info"><?php echo $studData_row['classification']; ?></small><br />
                        <small>
                        <?php
                        
                        if($cDetails_row['dept']==='College'){
                            $classDetails=$cDetails_row['gradeLevel'].' - '.$cDetails_row['strand'].' '.$cDetails_row['major'].' - '.$cDetails_row['section'];
                        }elseif($cDetails_row['dept']==='Senior High School'){
                            $classDetails=$cDetails_row['gradeLevel'].' - '.$cDetails_row['strand'].' - '.$cDetails_row['section'];
                        }else{
                            $classDetails=$cDetails_row['gradeLevel'].' - '.$cDetails_row['section'];
                        }
                        
                        echo $classDetails;
                            
                        ?>
                        </small>
                        
                        <p style="margin-top: 12px; margin-bottom: 12px; font-size: medium;"><strong>ID Code: </strong><?php echo $studData_row['student_id']; ?></p>
                        
                        <p>
                        <?php if($activeSchoolYear===$data_src_sy){ ?>
                          
                        <a href="edit_old_student.php?dept=<?php echo $studData_row['dept']; ?>&regx_id=<?php echo $reg_id_search; ?>&class_id=<?php echo $studData_row['class_id']; ?>" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-pencil"></i> Edit</a>
                        
                        <?php if($studData_row['status']!='Enrolled'){ ?>
                        <a style="color: white !important;" data-toggle="modal" data-target="#deleteStudentSearch<?php echo $reg_id_search; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                        <?php } ?>
                        
                        <?php }else{ ?>
                                                  
                        <a href="update_old_student.php?dept=<?php echo $cDetails_row['dept']; ?>&class_id=<?php echo $studData_row['class_id']; ?>&regx_id=<?php echo $reg_id_search; ?>" style="color: white !important;" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Update Status</a>
                                                  
                        <?php } ?>
                        </p>
                        
                        <p style="margin-top: 12px;"><strong>Admission Status: </strong><?php echo $studData_row['status']; ?></p>
                        </td>
                        
                         
                        
                        <td>
                        
                        <?php
                        
                        $studReqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE gradeLevel='$cDetails_row[gradeLevel]' AND strand='$cDetails_row[strand]' AND major='$cDetails_row[major]' AND classification='$studData_row[classification]' ORDER BY requirement_name ASC") or die(mysql_error());
                        while($studReqs_row = $studReqs_query->fetch()){
                        
                        $studReqs2_query = $conn->query("SELECT * FROM tbl_student_reqs WHERE reg_id='$studData_row[reg_id]' AND require_id='$studReqs_row[require_id]' AND schoolYear='$data_src_sy' AND semester='$data_src_sem'") or die(mysql_error());
                        $studReqs2_row = $studReqs2_query->fetch();
                            
                        ?>
                        
                        <p><strong><?php echo $studReqs_row['requirement_name']; ?>: </strong><?php if($studReqs2_query->rowCount()>0){ echo $studReqs2_row['status']; }else{ echo "No submission"; } ?></p>
                        
                        <?php } ?>
                        
                        </td>
                        
                        </tr>
                        
                        
                        <!-- delete student Modal -->
                          <div id="deleteStudentSearch<?php echo $reg_id_search; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_student.php?dept=<?php echo $cDetails_row['dept']; ?>&class_id=<?php echo $cDetails_row['class_id']; ?>" method="POST">
                              <input name="reg_id" value="<?php echo $reg_id_search; ?>" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Student</h5>
                                  <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="icon-close"></span></a>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>Are you sure you want to delete student <?php echo $studData_row['fname']." ".$finalMName." ".$studData_row['lname']; ?>?
                                <br />
                                <small class="form-text"> <?php echo $classDetails; ?> </small>
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