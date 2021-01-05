                <form action="save_add_student.php" method="POST">
                <div class="table-responsive">
                
                <label>Assign Class</label>
                <select name="class_id" class="form-control">
                <option value="0"> -- select class -- </option>
                <?php
                
                $classList_query = $conn->prepare('SELECT * FROM classes WHERE gradeLevel = :gradeLevel AND strand = :strand AND major = :major AND schoolYear = :schoolYear ORDER BY section ASC');
                $classList_query->execute(['gradeLevel' => $_GET['gradeLevel'], 'strand' => $_GET['strand'], 'major' => $_GET['major'], 'schoolYear' => $data_src_sy]);
                while ($cList_row = $classList_query->fetch()){
                
                if($_GET['dept']==='SHS'){
                    $class_desc=$_GET['gradeLevel'].' - '.$cList_row['strand'].' - '.$cList_row['section'];
                }else{
                    $class_desc=$_GET['gradeLevel'].' - '.$cList_row['section'];
                }
                ?>
                
                <option value="<?php echo $cList_row['class_id']; ?>"> <?php echo $class_desc; ?> </option>
                
                <?php } ?>
                </select>
                <hr />
                <table id="" class="display" style="width:100%">
                
                <thead>
                        <tr>
                        <th>#</th>
                        <th><input type="checkbox" id="checkAll" /></th>
                        <th>ID Code</th>
                        <th>Full Name</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                            <?php
                            $studCtr=0;
                            
                            $studList_query = $conn->prepare('SELECT * FROM students WHERE class_id = :class_id AND gradeLevel = :gradeLevel AND sex = :sex AND schoolYear = :schoolYear AND status != :status ORDER BY lname, fname ASC');
                            $studList_query->execute(['class_id' => 0, 'gradeLevel' => $_GET['gradeLevel'], 'sex' => $_GET['sex'], 'schoolYear' => $data_src_sy, 'status' => 'Setup']);
                            while ($sList_row = $studList_query->fetch()) 
                            {
                                $studCtr+=1;
                                
                                $reg_id=$sList_row['reg_id'];
                                
                        if($sList_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($sList_row['suffix']=='-') { $suffix=''; }else{ $suffix=$sList_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$sList_row['mname'];
                        } ?>
           
                        <tr>
                        <td style="width: 10px;"><?php echo $studCtr; ?></td>
                        
                        <td style="width: 10px;"><input type="checkbox" id="checkAll" name="studRegId[]" value="<?php echo $reg_id; ?>" /></td>

                        <td><?php echo $sList_row['student_id']; ?></td>
                        
                        <td><?php echo $sList_row['lname'].", ".$sList_row['fname']." ".$finalMName; ?></td>
   
                        </tr>
    
                        
 
                            <?php } ?>
                       
                      </tbody>
                    </table>
               
                    <div class="form-group col-sm-12">
                    <hr />
                    <div class="pull-right">
                    <button name="assignSection" class="btn btn-primary"><i class="fa fa-check"></i> MASS ASSIGN CLASS</button>
                    </div>
                    </div>
                    <br /><br />
                    </div>
                    </form>