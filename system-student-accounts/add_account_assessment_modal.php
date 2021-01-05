                  <!-- addClassKinder Modal -->
                  <div id="add_account_assessment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_assessment.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add assessment</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Title</label>
                              <div class="col-sm-9">
                                <input name="description" type="text" class="form-control" placeholder="Enter assessment title..." />
                              </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                            
                                <table id="" class="display" style="width:100%">
                            
                                <thead>
                                    <tr>
                                    <th style="width: 40px;"><input type="checkbox" id="checkAll" /> All</th>
                                    <th>Course Details</th>
                                    </tr>
                                </thead>
                                  
                                <tbody>
                                <?php
                                $class_query = $conn->query("SELECT DISTINCT gradeLevel, strand, major, dept FROM classes WHERE dept='$_GET[dept]' AND schoolYear='$data_src_sy' ORDER BY gradeLevel, strand ASC") or die(mysql_error());
                                while ($class_row = $class_query->fetch()) 
                                {
                                    $class_query2 = $conn->query("SELECT class_id FROM classes WHERE gradeLevel='$class_row[gradeLevel]' AND strand='$class_row[strand]' AND major='$class_row[major]'") or die(mysql_error());
                                    $class_row2 = $class_query2->fetch();
                                    
                                    ?>
                                    <tr>
                                    <td style="width: 10px;"><input type="checkbox" id="checkAll" name="classData[]" value="<?php echo $class_row2['class_id']; ?>" /></td>
                                    <td>
                                    <?php
                                    if($class_row['dept']==='College'){
                                        if($class_row['major']==='N/A'){
                                            echo $class_row['gradeLevel']." - ".$class_row['strand'];
                                        }else{
                                            echo $class_row['gradeLevel']." - ".$class_row['strand']." ".$class_row['major'];
                                        }
                                    }elseif($class_row['dept']==='Senior High School'){
                                        echo $class_row['gradeLevel']." - ".$class_row['strand'];
                                    }else{
                                        echo $class_row['gradeLevel'];
                                    }
                                      ?>
                                    </td>
                                    
                                    
                                    </tr>
                                <?php } ?>
                                </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
 
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addAssessment" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addClassKinder Modal -->