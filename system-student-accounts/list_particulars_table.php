                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                <thead>
                        <tr>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Payment Terms</th>
                        <th></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
                      $tbl_accounts_particulars_query = $conn->query("SELECT * FROM tbl_accounts_particulars WHERE category_id='$_GET[category_id]' ORDER BY description ASC") or die(mysql_error());
                      while ($tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch()) 
                      {
                        $catCtr+=1;
                        $particular_id=$tbl_accounts_particulars_row['particular_id']; ?>
           
                        <tr>
                        
                        <td><?php echo $catCtr; ?>. <?php echo $tbl_accounts_particulars_row['description']; ?></td>
        
                        
                        <td><?php echo number_format($tbl_accounts_particulars_row['amount'], 2); ?></td>
                        
                        <td>
                        <?php
                        
                        $pay_terms_query = $conn->query("SELECT * FROM tbl_payment_terms WHERE pterm_id='$tbl_accounts_particulars_row[paymentTerm]'") or die(mysql_error());
                        $pterms_row = $pay_terms_query->fetch();
                        
                        if($pterms_row['payment_term']==='Full' OR $pterms_row['payment_term']==='Monthly'){
                            echo $pterms_row['payment_term'];
                        }else{
                            echo $pterms_row['payment_term'].' | '.$pterms_row['category'];
                        }
                        
                        ?>
                        </td>
                        <td>
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_account_particular<?php echo $particular_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_account_particular<?php echo $particular_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php }else{ ?>
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                           
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php } ?>
                        </td>
                        </tr>


                  <!-- edit particular Modal -->
                  <div id="edit_account_particular<?php echo $particular_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_particular.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&category_id=<?php echo $_GET['category_id']; ?>" method="POST">
                      
                      <input value="<?php echo $tbl_accounts_particulars_row['particular_id']; ?>" name="particular_id" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Particular</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
             
                        <p style="color: black; font-size: medium;">Grade Details: <?php echo $gradeDetails; ?></p>
                        <p style="color: black; font-size: medium;">Category: <?php echo $tbl_accounts_particulars_row['description']; ?></p>
                        
                        <hr />
                        
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Title</label>
                              <div class="col-sm-9">
                                <input value="<?php echo $tbl_accounts_particulars_row['description']; ?>" name="description" type="text" class="form-control" placeholder="Enter category title..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Payment Term</label>
                              <div class="col-sm-9">
                                <select name="paymentTerm" class="form-control">
                                 
                                <option value="<?php echo $tbl_accounts_particulars_row['paymentTerm']; ?>">
                                <?php
                                if($pterms_row['payment_term']==='Full' OR $pterms_row['payment_term']==='Monthly'){
                                    echo $pterms_row['payment_term'];
                                }else{
                                    echo $pterms_row['payment_term'].' | '.$pterms_row['category'];
                                } ?>
                                </option>
                                <?php
                                if($_GET['dept']==='College'){
                                    $paymentMethod_query = $conn->query("SELECT * FROM tbl_payment_terms WHERE dept='College' ORDER BY category, payment_term ASC") or die(mysql_error());
                                }else{
                                    $paymentMethod_query = $conn->query("SELECT * FROM tbl_payment_terms WHERE dept='Basic Education' ORDER BY category, payment_term ASC") or die(mysql_error());
                                }
                                
                                while ($pm_row = $paymentMethod_query->fetch()) 
                                {
                                    if($pm_row['month_set_up']==='01'){ $wordMM="January"; }
                                    elseif($pm_row['month_set_up']==='02'){ $wordMM="February"; }
                                    elseif($pm_row['month_set_up']==='03'){ $wordMM="March"; }
                                    elseif($pm_row['month_set_up']==='04'){ $wordMM="April"; }
                                    elseif($pm_row['month_set_up']==='05'){ $wordMM="May"; }
                                    elseif($pm_row['month_set_up']==='06'){ $wordMM="June"; }
                                    elseif($pm_row['month_set_up']==='07'){ $wordMM="July"; }
                                    elseif($pm_row['month_set_up']==='08'){ $wordMM="August"; }
                                    elseif($pm_row['month_set_up']==='09'){ $wordMM="September"; }
                                    elseif($pm_row['month_set_up']==='10'){ $wordMM="October"; }
                                    elseif($pm_row['month_set_up']==='11'){ $wordMM="November"; }
                                    elseif($pm_row['month_set_up']==='12'){ $wordMM="December"; }
                                    elseif($pm_row['month_set_up']==='13'){ $wordMM="Upon Enrollment"; }
                                    else{ $wordMM="-"; }
                                
                                ?>
                                
                                <option value="<?php echo $pm_row['pterm_id']; ?>">
                                <?php
                                if($pm_row['payment_term']==='Full' OR $pm_row['payment_term']==='Monthly'){
                                    echo $pm_row['payment_term'];
                                }else{
                                    echo $pm_row['payment_term'].' | '.$pm_row['category'];
                                }
                                ?>
                                </option>
                                
                                <?php } ?>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Amount</label>
                              <div class="col-sm-9">
                                <input value="<?php echo $tbl_accounts_particulars_row['amount']; ?>" name="amount" type="number" min="0.50" max="100000.00" step="0.50" class="form-control" placeholder="Enter amount..." />
                              </div>
                            </div>
           
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="#" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateParticular" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit particular Modal -->
                  
                  
                        <!-- delete student Modal -->
                          <div id="delete_account_particular<?php echo $particular_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_particular.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&category_id=<?php echo $_GET['category_id']; ?>" method="POST">
                      
                              <input value="<?php echo $tbl_accounts_particulars_row['particular_id']; ?>" name="particular_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Particular</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete particular:<br /><br /><?php echo $tbl_accounts_particulars_row['description']; ?>?
                                
                                </h4>
                                <small>Amount: <?php echo $tbl_accounts_particulars_row['amount']; ?></small>
                                
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="#" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteParticular" type="submit" class="btn btn-danger">Yes</button>
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
                     