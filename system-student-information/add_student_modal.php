          
            <!-- addstudDatainder Modal -->
                  <div id="addStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_student.php?dept=<?php echo $_GET['dept']; ?>&class_id=<?php echo $_GET['class_id']; ?>" method="POST" enctype="multipart/form-data">
                      
                      <input name="class_id" value="<?php echo $_GET['class_id']; ?>" type="hidden" />
                      <input name="gradeLevel" value="<?php echo $cDetails_row['gradeLevel']; ?>" type="hidden" />
                      <input name="strand" value="<?php echo $cDetails_row['strand']; ?>" type="hidden" />
                      <input name="major" value="<?php echo $cDetails_row['major']; ?>" type="hidden" />
                      <input name="section" value="<?php echo $cDetails_row['section']; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Assign Student - 
                          <?php
                            if($cDetails_row['strand']=="N/A")
                            {
                            echo $cDetails_row['gradeLevel']." - ".$cDetails_row['section'];
                            }else{
                            echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']." - ".$cDetails_row['section'];
                            }
                          ?></h5>
                          <a data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></a>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="table-responsive">
                            <table id="" class="display" style="width:100%">
                        
                            <thead>
                                <tr>
                                <th style="width: 10px;"><input type="checkbox" id="checkAll" name="checkAll" /></th>
                                <th>STUDENT NAME</th>
                                </tr>
                            </thead>
                              
                              <tbody>
                              
                                    <?php
                                    $studCtr=0;
                           
                                    $studData_query = $conn->query("SELECT * FROM students WHERE gradeLevel='$cDetails_row[gradeLevel]' AND section='-' AND schoolYear='$data_src_sy' ORDER BY sex, lname, fname ASC") or die(mysql_error());
                                    while ($studData_row = $studData_query->fetch()) 
                                    {
                                        $studCtr+=1;
                                        
                                        $reg_id=$studData_row['reg_id'];
                                        
                                        
                                    if($studData_row['mname']=='')
                                    {
                                        $finalMName='';
                                        
                                    }else{
                                        
                                        if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                                        
                                        $finalMName=$suffix.$studData_row['mname'];
                                    } ?>
                   
                                <tr>
                                
                                <td>
                                <input name="studRegId[]" type="checkbox" id="checkAll" value="<?php echo $studData_row['reg_id']; ?>" />
                                </td>
                                
                                <td><?php echo '[ '.substr($studData_row['sex'], 0, 1).' ] '.$studCtr.'. '.$studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?></td>
                                
                                </tr>
            
                                
         
                                <?php } ?>
                               
                              </tbody>
                            </table>
                            </div>
                    
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="assignSection" class="btn btn-primary">Assign to 
                          <?php
                            if($cDetails_row['strand']=="N/A")
                            {
                            echo $cDetails_row['gradeLevel']." - ".$cDetails_row['section'];
                            }else{
                            echo $cDetails_row['gradeLevel']." - ".$cDetails_row['strand']." - ".$cDetails_row['section'];
                            }
                          ?>
                          </button>
                        </div>
                        
                        </form>
                        
                      </div>
                    </div>
                  </div>
                  <!-- end addstudDatainder Modal -->
                  
 
            