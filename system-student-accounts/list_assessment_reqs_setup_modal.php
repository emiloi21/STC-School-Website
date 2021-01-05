                  <!-- addClassKinder Modal -->
                  <div id="assign_assess_discount<?php echo $tbl_assessPayable_row2['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_assessment_reqs_setup.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>" method="POST">
                      
                      <input name="deduct_category_id" value="<?php echo $tbl_assessPayable_row2['category_id']; ?>" type="hidden" />
                      <input name="payable_amt" value="<?php echo $tbl_accounts_row2['totalAmount']; ?>" type="hidden" />
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Assign Discount</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="form-group row">
                              <label class="col-sm-12 form-control-label"><strong>Account Deductable:</strong> <?php echo $tbl_accounts_row2['description']; ?></label>
                              <label class="col-sm-12 form-control-label"><strong>Payable Amount:</strong> <?php echo number_format($tbl_accounts_row2['totalAmount'], 2); ?></label>
                            </div>
                            
                            <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                
                                <table id="" class="display" style="width:100%">
                
                                    <thead>
                                    <tr>
                                    <th></th>
                                    <th>Description</th>
                                    <th>Amount / Rate</th>
                                    <th>Type</th>
                                    </tr>
                                    </thead>
                                  
                                  <tbody>
                                  
                                  <?php
                                  $discountCtr=0;
                                  $tbl_assessDCount_query = $conn->query("SELECT * FROM tbl_accounts_discount WHERE dept='$studData_row[dept]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                                  while ($assessDCount_row = $tbl_assessDCount_query->fetch()) 
                                  {
                                  
                                  $chk_assessDCount_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE reg_id='$_GET[regx_id]' AND acct_discount_id='$assessDCount_row[acct_discount_id]'") or die(mysql_error());
                            
                                  if($chk_assessDCount_query->rowCount()<=0){
                                  
                                  $discountCtr+=1;
                                  
                                  ?>
                       
                                    <tr>
                                    
                                    <td><input type="radio" name="acct_discount_id" value="<?php echo $assessDCount_row['acct_discount_id']; ?>" /></td>
                                    
                                    <td><?php echo $discountCtr; ?>. <?php echo $assessDCount_row['description']; ?></td>
                                    
                                    <td>
                                    
                                    
                                    <?php
                                    
                                        if($assessDCount_row['classification']==='Fixed Amount'){
                                            echo number_format($assessDCount_row['amount'], 2);
                                        }else{
                                            if($assessDCount_row['percentage']<1){
                                                echo substr($assessDCount_row['percentage'], 2).'%';
                                                
                                            }else{
                                                echo "100%";
                                            }
                                            
                                            
                                        }
                                    
                                    ?></td>
                                    
                                    <td>
                                    <?php if($assessDCount_row['type']==='Receivable'){ ?>
                                        Receivable from outside entity
                                    <?php }else{ ?>
                                        Payable by the school
                                    <?php } ?>
                                    </td>
         
                                    </tr> 
             
                                      
                                    <?php } } ?>
                                   
                                  </tbody>
                                </table>
                    
                                </div>
                            </div>
                            </div>
 
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="assignDiscount" type="submit" class="btn btn-primary">Assign</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addClassKinder Modal -->