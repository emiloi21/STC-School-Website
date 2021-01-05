                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th></th>
                        <th>Description</th>
                        <th>Course Details</th>
                        <th>School Year</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
                      
                      $tbl_accounts_assessments_query = $conn->query("SELECT * FROM tbl_accounts_assessments WHERE gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                      while ($tbl_accounts_row = $tbl_accounts_assessments_query->fetch()) 
                      {
                        $catCtr+=1;
                        $assessment_id=$tbl_accounts_row['assessment_id'];
                        ?>
           
                        <tr>
                        
                        <td><?php echo $catCtr; ?></td>
                        
                        <td><?php echo $tbl_accounts_row['description']; ?></td>
                        
                        <td>
                        <?php
                        
                        if($_GET['dept']=="Grade School" OR $_GET['dept']=="Junior High School"){
                            echo $_GET['gradeLevel'];
                        
                        }elseif($_GET['dept']=="Senior High School"){
                            echo $_GET['gradeLevel']." - ".$_GET['strand'];
                        
                        }elseif($_GET['dept']=="College"){
                            
                            if($_GET['major']==='N/A' OR $_GET['major']==='-' OR $_GET['major']===''){
                                echo $_GET['gradeLevel']." - ".$_GET['strand'];
                            }else{
                                echo $_GET['gradeLevel']." - ".$_GET['strand'].' '.$_GET['major'];
                            }
                            
                        }
                        
     
                        ?>
                        </td>
                        
                        <td><?php echo $tbl_accounts_row['schoolYear']; ?></td>
                        
                        <td>
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          <a style="color: white !important;" href="list_assessment_account_settings.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&assessment_id=<?php echo $assessment_id; ?>&purpose=View" class="btn btn-info btn-sm"><i class="fa fa-list"></i> Payables</a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_account_category<?php echo $assessment_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_account_category<?php echo $assessment_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php }else{ ?>
                          <a style="color: white !important;" href="list_assessment_account_settings.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&assessment_id=<?php echo $assessment_id; ?>" class="btn btn-info btn-sm"><i class="fa fa-list"></i> Payables</a>
                          
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                           
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php } ?>
                        </td>
                        </tr>


                  <!-- edit Assess Modal -->
                  <div id="edit_account_category<?php echo $assessment_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_assessment.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>" method="POST">
                      
                      <input value="<?php echo $tbl_accounts_row['assessment_id']; ?>" name="assessment_id" type="hidden" />
                      
                      <?php if($_GET['dept']!='College'){ ?>
                      <input value="N/A" name="major" type="hidden" />
                      <?php } ?>
                      
                      <?php if($_GET['dept']==='Grade School' OR $_GET['dept']==='Junior High School'){ ?>
                      <input value="N/A" name="strand" type="hidden" />
                      <?php } ?>
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Assessment</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Title</label>
                              <div class="col-sm-9">
                                <input value="<?php echo $tbl_accounts_row['description']; ?>" name="description" type="text" class="form-control" placeholder="Enter category title..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Grade Level</label>
                              <div class="col-sm-9">
                                <select name="gradeLevel" class="form-control">
                                
                                <option><?php echo $tbl_accounts_row['gradeLevel']; ?></option>
                                
                                <?php if($_GET['dept']==='Grade School'){ ?>
                                <option>Nursery</option>
                                <option>Kinder 1</option>
                                <option>Kinder 2</option>
                                <option>Grade 1</option>
                                <option>Grade 2</option>
                                <option>Grade 3</option>
                                <option>Grade 4</option>
                                <option>Grade 5</option>
                                <option>Grade 6</option>
                                <?php } ?>  
                                
                                <?php if($_GET['dept']==='Junior High School'){ ?>
                                <option>Grade 7</option>
                                <option>Grade 8</option>
                                <option>Grade 9</option>
                                <option>Grade 10</option>
                                <?php } ?>  
                                
                                <?php if($_GET['dept']==='Senior High School'){ ?>
                                <option>Grade 11</option>
                                <option>Grade 12</option>
                                <?php } ?>  
                                
                                <?php if($_GET['dept']==='College'){ ?>
                                <option>1st Year</option>
                                <option>2nd Year</option>
                                <option>3rd Year</option>
                                <option>4th Year</option>
                                <?php } ?>
                                
                                </select>
                              </div>
                            </div>
                            
                            <?php if($_GET['dept']==='Senior High School'){ ?>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Strand</label>
                              <div class="col-sm-9">
                                <select name="strand" class="form-control">
                                <option><?php echo $tbl_accounts_row['strand']; ?></option>
                                <option>ABM</option>
                                <option>GAS</option>
                                <option>HUMSS</option>
                                <option>STEM</option>
                                </select>
                              </div>
                            </div>
                            <?php } ?>
                            
                            
                            <?php if($_GET['dept']==='College'){ ?>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Course</label>
                              <div class="col-sm-9">
                                <select name="strand" class="form-control">
                                <option><?php echo $tbl_accounts_row['strand']; ?></option>
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
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Major</label>
                              <div class="col-sm-9">
                                <select name="major" class="form-control">
                                <option value="<?php echo $tbl_accounts_row['major']; ?>"><?php echo $tbl_accounts_row['major']; ?></option>
                                <option>N/A</option>
                                <option value="English">English (BSED)</option>
                                <option value="Filipino">Filipino (BSED)</option>
                                <option value="Mathematics">Mathematics (BSED)</option>
                                <option value="Science">Science (BSED)</option>
                                <option value="Social Studies">Social Studies (BSED)</option>
                                <option value="Values Education">Values Education (BSED)</option>
                                <option value="FM">Financial Management (BSBA)</option>
                                <option value="HRDM">Human Resource Development Management (BSBA)</option>
                                </select>
                              </div>
                            </div>
                            
                            <?php } ?>
 
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="#" data-dismiss="modal" class="btn btn-secondary" style="color: white;">Cancel</a>
                          <button name="updateAssessment" type="submit" class="btn btn-primary">Update</button>
                          <button name="copyAssessment" type="submit" class="btn btn-info">Add as New Record</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit Assess Modal -->
                  
                  
                        <!-- delete student Modal -->
                          <div id="delete_account_category<?php echo $assessment_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_assessment.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>" method="POST">
                      
                              <input value="<?php echo $tbl_accounts_row['assessment_id']; ?>" name="assessment_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Assessment</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete assessment:<br /><br /><?php echo $tbl_accounts_row['description']; ?>?
                                </h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteAssessment" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
                          
                            <?php } ?>
 
                       
                      </tbody>
                    </table>
                    </div>
                     