  
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                <thead>
                        <tr>
                        <th></th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $discountCtr=0;
                      $tbl_assessDCount_query = $conn->query("SELECT * FROM tbl_accounts_discount WHERE gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                      while ($assessDCount_row = $tbl_assessDCount_query->fetch()) 
                      {
                        $discountCtr+=1;
                        $acct_discount_id=$assessDCount_row['acct_discount_id']; ?>
           
                        <tr>
                        
                        <td><?php echo $discountCtr; ?></td>
                        
                        <td><?php echo $assessDCount_row['description']; ?></td>
                        
                        <td><?php echo number_format($assessDCount_row['amount'], 2); ?></td>
                        
                        <td>
                        <?php if($assessDCount_row['type']==='Receivable'){ ?>
                            Receivable from outside entity
                        <?php }else{ ?>
                            Payable by the school
                        <?php } ?>
                        </td>
                        
                        <td>
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          <a style="color: white !important;" href="list_account_discount_bulkAssign.php?acct_discount_id=<?php echo $assessDCount_row['acct_discount_id']; ?>&dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>" class="btn btn-info btn-sm"><i class="fa fa-users"></i> Assign</a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_discount<?php echo $acct_discount_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_account_discount<?php echo $acct_discount_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php }else{ ?>
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>
                           
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
                          <?php } ?>
                        </td>
                        </tr> 
                        
                        
                  <!-- edit DISCOUNTS Modal -->
                  <div id="edit_discount<?php echo $acct_discount_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_discount.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>" method="POST">
                      
                      <input value="<?php echo $acct_discount_id; ?>" name="acct_discount_id" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Discount</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Account Code</label>
                              <div class="col-sm-9">
                                <input name="account_code" value="<?php echo $assessDCount_row['account_code']; ?>" type="text" class="form-control" placeholder="Enter account code..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Title</label>
                              <div class="col-sm-9">
                                <input name="description" value="<?php echo $assessDCount_row['description']; ?>" type="text" class="form-control" placeholder="Enter discount title..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Amount</label>
                              <div class="col-sm-9">
                                <input name="amount" type="number" value="<?php echo $assessDCount_row['amount']; ?>" min="0.50" max="100000.00" step="0.50" class="form-control" placeholder="Enter amount..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Type</label>
                              <div class="col-sm-9">
                                <select name="type" class="form-control">
                                <?php if($assessDCount_row['type']==='Receivable'){ ?>
                                    <option value="Receivable">Receivable from outside entity</option>
                                <?php }else{ ?>
                                    <option value="Payable">Payable by the school</option>
                                <?php } ?>
                                
                                <option value="Payable">Payable by the school</option>
                                <option value="Receivable">Receivable from outside entity</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Grade Level</label>
                              <div class="col-sm-9">
                                <select name="gradeLevel" class="form-control">
                                
                                <option><?php echo $assessDCount_row['gradeLevel']; ?></option>
                                
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
                                <option><?php echo $assessDCount_row['strand']; ?></option>
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
                                <option><?php echo $assessDCount_row['strand']; ?></option>
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
                                <option value="<?php echo $assessDCount_row['major']; ?>"><?php echo $assessDCount_row['major']; ?></option>
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
                          <a href="" data-dismiss="modal" class="btn btn-secondary" style="color: white;">Cancel</a>
                          <button name="editDiscounts" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit discount Modal -->
                  
                        <!-- delete student Modal -->
                          <div id="delete_account_discount<?php echo $acct_discount_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_discount.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>" method="POST">
                      
                              <input value="<?php echo $acct_discount_id; ?>" name="acct_discount_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Discount</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete discount <?php echo $assessDCount_row['description']; ?> amounting <?php echo number_format($assessDCount_row['amount'], 2); ?>?</h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteDiscounts" type="submit" class="btn btn-danger">Yes</button>
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
 
   