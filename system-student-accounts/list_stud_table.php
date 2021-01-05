                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                <thead>
                        <tr>
                        <th></th>
                        <th>ID Code</th>
                        <th>Full Name</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                            <?php
                            
                            if($_GET['class_id']=="All"){
                                $subjK_query = $conn->query("SELECT * FROM students WHERE schoolYear='$data_src_sy' ORDER BY gender, lname, fname ASC") or die(mysql_error());
                            
                            }else{
                                
                            $subjK_query = $conn->query("SELECT * FROM students WHERE class_id='$_GET[class_id]' AND schoolYear='$data_src_sy' ORDER BY gender, lname, fname ASC") or die(mysql_error());
                            
                            }
                            
                            while ($subjK_row = $subjK_query->fetch()) 
                            { 
                                $reg_id=$subjK_row['reg_id'];
                                
                                
                        if($subjK_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($subjK_row['suffix']=='-') { $suffix=''; }else{ $suffix=$subjK_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$subjK_row['mname'];
                        } ?>
           
                        <tr>
                        
                        <td style="width: 60px;"><a href="updateStudentImg.php?reg_id=<?php echo $reg_id; ?>"><img src="../studentImg/<?php echo $subjK_row['img']; ?>" width="50" height="50" class="img-fluid rounded" /></a></td>
                        
                        <td><?php echo $subjK_row['student_id']; ?></td>
                        
                        <td><?php echo $subjK_row['lname'].", ".$subjK_row['fname']." ".$finalMName; ?></td>

                        <td style="width: 80px;">
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          <a style="color: white !important;" data-toggle="modal" data-target="#editStudent<?php echo $reg_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteStudent<?php echo $reg_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                          <?php }else{ ?>
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>
                           
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
                          <?php } ?>
                        </td>
                        </tr>
    
                        
 
                            <?php } ?>
                       
                      </tbody>
                    </table>
                    </div>
                     