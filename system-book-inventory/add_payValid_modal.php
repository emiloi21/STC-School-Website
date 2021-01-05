                <!--Add 201 Files Modal -->
            
                  <div id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                       <form action="save_payValid.php" method="POST" enctype="multipart/form-data">
                       
                       <input name="dept" value="<?php echo $studData_row['dept']; ?>" type="hidden" />
                       
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">PAYMENT VALIDATION REQUEST</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
           
                      
                            <div class="form-group row">
                               
                              <div class="col-sm-12">
                              
                              <div class="row">
                                <div class="col-md-12">
                                <p><strong>SELECT PAYMENT METHOD</strong></p>
                                
                                <div class="table-responsive">
                                <table id="" class="display" style="width:100%">
                
                                <thead>
                                <tr>
                                <th></th>
                                <th>Method Details</th>
                                </tr>
                                </thead>
                              
                              <tbody>
                              
                              <?php
                             
                              $paymentMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE status='Active' ORDER BY type, nameProvider ASC") or die(mysql_error());
                              while ($pm_row = $paymentMethod_query->fetch()) 
                              {
                                
                                $pm_id=$pm_row['pm_id'];
                                
                                ?>
                   
                                <tr>
                                <td style="width: 10px;"><input type="radio" name="pm_id" value="<?php echo $pm_id; ?>" required="" /></td>
                                
                                <td>
                                <?php echo $pm_row['nameProvider']; ?><br />
                                <?php echo $pm_row['accountName']; ?><br />
                                <?php echo $pm_row['accountNum_link']; ?><br />
                                </td>
                                
                                </tr>
                                
                                <?php } ?>
                                
                                </tbody>
                                </table>
                                </div>
                                </div>
                               
                                <div class="col-md-12">
                                <hr />
                                <p><strong>PAYMENT TO</strong></p>
                                
                                <small>Payment Transaction Type</small>
                                <select name="for_payment" class="form-control">
                                <!--option value="Main">Student Accounts</option-->
                                <option value="Books">Student Books</option>
                                </select>
                                </div>
                                
                              
                                
                                <div class="col-md-12">
                                <hr />
                                <p><strong>PROOF DETAILS</strong></p>
                                
                                <small>Transaction Amount</small>
                                <input name="transAmt" class="form-control" type="number" min="1" max="99999" step="0.01" required="" />
                                </div>
                                
                                <div class="col-md-12">
                                <small>Transaction Date</small>
                                <input name="transDate" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" required="" />
                                </div>
                                
                                <div class="col-md-12">
                                <input class="form-control" name="per_file" type="file" required="" />
                                <small>Upload proof of transaction</small>
                                </div>
                                
                                <div class="col-md-12">
                                <textarea name="student_remarks" class="form-control" placeholder="Enter remarks..."></textarea>
                                <small>Remarks</small>
                                </div>
                                
                              </div>
                                
                              </div>
                            </div>
                         
    
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="savePayValReq" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        
                        </form>
                        
                      </div>
                    </div>
                  </div>
                  <!-- end Add 201 Files Modal -->
 