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
                
                <div class="tab" style="margin: 8px;">
 
                <?php if($_GET['dept']=="All"){ ?>
                <a title="All student list" href="list_students.php?dept=All&class_id=All" class="tablinks active" style="font-weight: bolder;">All</a>
                <?php }else{?>
                <a title="All student list" href="list_students.php?dept=All&class_id=All" class="tablinks">All</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_students.php?dept=Grade School&class_id=" class="tablinks active" style="font-weight: bolder;">Grade School</a>
                <?php }else{?>
                <a title="Grade School student list" href="list_students.php?dept=Grade School&class_id=" class="tablinks">Grade School</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="JHS"){ ?>
                <a title="JHS student list" href="list_students.php?dept=JHS&class_id=" class="tablinks active" style="font-weight: bolder;">JHS</a>
                <?php }else{?>
                <a title="JHS student list" href="list_students.php?dept=JHS&class_id=" class="tablinks">JHS</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="SHS"){ ?>
                <a title="SHS student list" href="list_students.php?dept=SHS&class_id=" class="tablinks active" style="font-weight: bolder;">SHS</a>
                <?php }else{?>
                <a title="SHS student list" href="list_students.php?dept=SHS&class_id=" class="tablinks">SHS</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="College"){ ?>
                <a title="Elementary student list" href="list_students.php?dept=College&class_id=" class="tablinks active" style="font-weight: bolder;">College</a>
                <?php }else{?>
                <a title="Elementary student list" href="list_students.php?dept=College&class_id=" class="tablinks">College</a>
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
                        <th></th>
                        <th>ID Code</th>
                        <th>Full Name</th>
                        <th>Class Details</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                            <?php
                            
                            if($searched==='')
                            {
                                
                            }else{    
                                
                            $subjK_query = $conn->query("SELECT * FROM students WHERE (student_id LIKE '%$searched%' OR lname LIKE '%$searched%') AND schoolYear='$data_src_sy' ORDER BY gender, lname, fname ASC") or die(mysql_error());
                            
                      while ($subjK_row = $subjK_query->fetch()) 
                      {
                        
                        $reg_id_search=$subjK_row['reg_id'];
                        
                        $classDetails_query = $conn->query("SELECT gradeLevel, strand, section, dept FROM classes WHERE class_id='$subjK_row[class_id]'") or die(mysql_error());
                        $cDetails_row = $classDetails_query->fetch();
                                
                        if($subjK_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($subjK_row['suffix']=='-') { $suffix=''; }else{ $suffix=$subjK_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$subjK_row['mname'];
                            
                        } ?>
           
                        <tr>
                        
                        <td style="width: 60px;"><a href="updateStudentImg.php?reg_id=<?php echo $reg_id_search; ?>"><img src="../studentImg/<?php echo $subjK_row['img']; ?>" width="50" height="50" class="img-fluid rounded" /></a></td>
                        
                        <td><?php echo $subjK_row['student_id']; ?></td>
                        
                        <td>
                        <?php
                        echo $subjK_row['lname'].", ".$subjK_row['fname']." ".$finalMName;
                        $updStud_CHK_query = $conn->query("SELECT * FROM students WHERE student_id='$subjK_row[student_id]' AND fname='$subjK_row[fname]' AND lname='$subjK_row[lname]' AND schoolYear='$activeSchoolYear'") or die(mysql_error());
                        
                        if($updStud_CHK_query->rowCount()==1){ echo "<br /><small style='font-weight: bold !important;'>Updated for SY ".$activeSchoolYear."</small>"; }
                        ?>
                        </td>
                        
                      
                        
                        <td>
                        <?php 
                          if($cDetails_row['dept']=="SHS")
                          {
                            echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']." - ".$cDetails_row['section'];
                          }else{
                            echo $cDetails_row['gradeLevel']." - ".$cDetails_row['section'];
                          }
                        ?> 
                        </td>
                          
                        <td style="width: 80px;">
                          <?php  if($updStud_CHK_query->rowCount()==1){ }else{ ?> <a style="color: white !important;" href="promoteStudent.php?reg_id=<?php echo $reg_id_search; ?>" class="btn btn-info btn-sm"><i class="fa fa-history"></i></a> <?php } ?>
                          
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          <a style="color: white !important;" data-toggle="modal" data-target="#editStudentSearch<?php echo $reg_id_search; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                           
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteStudentSearch<?php echo $reg_id_search; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                          <?php }else{ ?>
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>
                          
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
                          <?php } ?>
                          
                        </td>
                        </tr>
    
                        
 
                            <?php include('edit_student_modal_search.php'); } } ?>
                       
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