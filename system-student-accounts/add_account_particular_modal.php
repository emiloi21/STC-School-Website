                  <!-- addClassKinder Modal -->
                  <div id="add_account_particular" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_particular.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&category_id=<?php echo $_GET['category_id']; ?>" method="POST">
                      
                      <input value="<?php echo $_GET['category_id']; ?>" name="category_id" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Particulars</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        <p>Grade Details: <?php echo $gradeDetails; ?></p>
                        <p>Category: <?php echo $tbl_accounts_categories_row['description']; ?></p>
                        
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Title</label>
                              <div class="col-sm-9">
                                <input name="description" type="text" class="form-control" placeholder="Enter category title..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Payment Term</label>
                              <div class="col-sm-9">
                                <select name="paymentTerm" class="form-control">
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
                                <input name="amount" type="number" min="0.50" max="100000.00" step="0.50" class="form-control" placeholder="Enter amount..." />
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addParticular" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addClassKinder Modal -->