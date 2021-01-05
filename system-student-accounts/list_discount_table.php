  
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                <thead>
                        <tr>
                        <th></th>
                        <th>Description</th>
                        <th>Classification</th>
                        <th>Amount / Rate</th>
                        <th>Type</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $discountCtr=0;
                      $tbl_assessDCount_query = $conn->query("SELECT * FROM tbl_accounts_discount WHERE dept='$_GET[dept]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                      while ($assessDCount_row = $tbl_assessDCount_query->fetch()) 
                      {
                        $discountCtr+=1;
                        $acct_discount_id=$assessDCount_row['acct_discount_id']; ?>
           
                        <tr>
                        
                        <td><?php echo $discountCtr; ?></td>
                        
                        <td><?php echo $assessDCount_row['description']; ?></td>
                        
                        <td><?php echo $assessDCount_row['classification']; ?></td>
                        
                        <td>
                        <?php 
                        if($assessDCount_row['classification']==='Fixed Amount'){
                            echo number_format($assessDCount_row['amount'], 2);
                        }else{
                            echo $assessDCount_row['percentage'];
                        }
                        ?>
                        </td>
                        
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
                     
                      <form action="save_add_discount.php?dept=<?php echo $_GET['dept']; ?>&classification=<?php echo $assessDCount_row['classification']; ?>" method="POST">
                            
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
                            
                            <?php if($assessDCount_row['classification']==='Fixed Amount'){ ?>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Amount</label>
                              <div class="col-sm-9">
                                <input name="amount" type="number" value="<?php echo $assessDCount_row['amount']; ?>" min="0.50" max="100000.00" step="0.50" class="form-control" placeholder="Enter amount..." />
                              </div>
                            </div>
                            
                            <?php }else{ ?>
                             
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Percentage</label>
                              <div class="col-sm-9">
                                <input name="percentage" type="number" value="<?php echo substr($assessDCount_row['percentage'], 0, -1); ?>" min="0.01" max="1.00" step="0.01" class="form-control" placeholder="Enter percentage..." />
                                <small>Decimal Format</small>
                              </div>
                            </div>
                            
                            <?php } ?>
                            
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
                              <form action="save_add_discount.php?dept=<?php echo $_GET['dept']; ?>&classification=<?php echo $assessDCount_row['classification']; ?>" method="POST">
                        
                              <input value="<?php echo $acct_discount_id; ?>" name="acct_discount_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Discount</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete discount <?php echo $assessDCount_row['description']; ?>
                                <?php 
                                    if($assessDCount_row['classification']==='Fixed Amount'){
                                        echo " amounting ".number_format($assessDCount_row['amount'], 2);
                                    }else{
                                        echo " with ".substr($assessDCount_row['amount'], 0, -3).'%'." value";
                                    }
                                ?>?
                                </h4>
                                  
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
 
   