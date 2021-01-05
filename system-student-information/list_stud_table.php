                
                <div class="table-responsive">
                <hr />
                <?php
                $studCtr=0;
                $studData_query = $conn->query("SELECT * FROM students WHERE sex='Male' AND class_id='$_GET[class_id]' AND schoolYear='$data_src_sy' AND status='Enrolled' ORDER BY sex, lname, fname ASC") or die(mysql_error());
                ?>
                <h4>MALE&nbsp;<div class="badge badge-warning"><?php echo $studData_query->rowCount(); ?></div></h4>
                
                <table id="" class="display" style="width:100%">
                
                    <thead>
                    <tr>
                    <th style="width: 4%;">#</th>
                    <th style="width: 10%;">ID Code</th>
                    <th style="width: 36%;">Student</th>
                    <th style="width: 15%;">Admission Status</th>
                    <th style="width: 20%;">Requirements Status</th>
                    <th style="width: 15%;">Action</th>
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
                  
                        </td>
                        
                        <td style="vertical-align: top;"><?php echo $studData_row['status']; ?></td>
                        
                        <td style="vertical-align: top;"><?php echo $studData_row['status']; ?></td>
                        
                        <td style="vertical-align: top;">
                        <?php if($activeSchoolYear===$data_src_sy){ ?>

                        <a href="list_stud_details.php?dept=<?php echo $studData_row['dept']; ?>&regx_id=<?php echo $reg_id; ?>&class_id=<?php echo $_GET['class_id']; ?>" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-info"></i> Details</a>
                        
                        <?php if($studData_row['status']!='Enrolled'){ ?>
                        <a style="color: white !important;" data-toggle="modal" data-target="#deleteStudent<?php echo $reg_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                        <?php } ?>
                        
                        <?php }else{ ?>
                                                  
                        <a href="edit_old_student.php?dept=<?php echo $studData_row['dept']; ?>&regx_id=<?php echo $reg_id; ?>&class_id=<?php echo $_GET['class_id']; ?>" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-info"></i> Details</a>
                                                  
                        <?php } ?>
                        </td>
                        </tr>
                        
                        <?php } ?>
                       
                      </tbody>
                    </table>
                    
                    <hr />
                    <?php
                    $studCtr=0;
                    $studData_query = $conn->query("SELECT * FROM students WHERE sex='Female' AND class_id='$_GET[class_id]' AND schoolYear='$data_src_sy' AND status='Enrolled' ORDER BY sex, lname, fname ASC") or die(mysql_error());
                    ?>
                    <h4>FEMALE&nbsp;<div class="badge badge-warning"><?php echo $studData_query->rowCount(); ?></div></h4>
                    <table id="" class="display" style="width:100%">
                
                    <thead>
                    <tr>
                    <th style="width: 4%;">#</th>
                    <th style="width: 10%;">ID Code</th>
                    <th style="width: 36%;">Student</th>
                    <th style="width: 15%;">Admission Status</th>
                    <th style="width: 20%;">Requirements Status</th>
                    <th style="width: 15%;">Action</th>
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
                            if($studData_row['mname']=='')
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
                  
                        </td>
                        
                        <td style="vertical-align: top;"><?php echo $studData_row['status']; ?></td>
                        
                        <td style="vertical-align: top;"><?php echo $studData_row['status']; ?></td>
                        
                        <td style="vertical-align: top;">
                        <?php if($activeSchoolYear===$data_src_sy){ ?>

                        <a href="list_stud_details.php?dept=<?php echo $studData_row['dept']; ?>&regx_id=<?php echo $reg_id; ?>&class_id=<?php echo $_GET['class_id']; ?>" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-info"></i> Details</a>
                        
                        <?php if($studData_row['status']!='Enrolled'){ ?>
                        <a style="color: white !important;" data-toggle="modal" data-target="#deleteStudent<?php echo $reg_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                        <?php } ?>
                        
                        <?php }else{ ?>
                                                  
                        <a href="edit_old_student.php?dept=<?php echo $studData_row['dept']; ?>&regx_id=<?php echo $reg_id; ?>&class_id=<?php echo $_GET['class_id']; ?>" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-info"></i> Details</a>
                                                  
                        <?php } ?>
                        </td>
                        </tr>
                        
                        <?php } ?>
                       
                      </tbody>
                    </table>
                    
                    </div>
                     