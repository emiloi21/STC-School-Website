                <!--Add 201 Files Modal -->
            
                  <div id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                       <form action="save_payValid.php" method="POST" enctype="multipart/form-data">

                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">PAYMENT VALIDATION REQUEST</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
           
                      
                            <div class="form-group row">
                               
                              <div class="col-sm-12">
                              
                              <div class="row">
                                <div class="col-md-12">
                                <p><strong>PAYEE DETAILS</strong></p>
                                
                                <small>Bank Name</small>
                                <select name="payee_bankName" class="form-control">
                                <option>-</option>
                                <option>BDO</option>
                                </select>
                                </div>
                                
                                <div class="col-md-12">
                                <small>Account Name</small>
                                <input name="payee_acctName" class="form-control" type="text" />
                                
                                </div>
                                
                                <div class="col-md-12">
                                <small>Account Number</small>
                                <input name="payee_acctNum" class="form-control" />
                                </div>
                                
                                <div class="col-md-12">
                                <small>Amount Deposited</small>
                                <input name="payee_AmtDeposit" class="form-control" type="number" min="1" max="10000000" step="1" />
                                </div>
                                
                                <div class="col-md-12">
                                <hr />
                                <p><strong>DEPOSITOR DETAILS</strong></p>
                                
                                <small>Bank Name</small>
                                <select name="depo_bankName" class="form-control">
                                <option>-</option>
                                <option>BDO</option>
                                </select>
                                </div>
                                
                                <div class="col-md-12">
                                <small>Account Name</small>
                                <input name="depo_acctName" class="form-control" type="text" />
                                </div>
                                
                                <div class="col-md-12">
                                <small>Account Number</small>
                                <input name="depo_acctNum" class="form-control" />
                                </div>
                                
                                <div class="col-md-12">
                                <input class="form-control" name="per_file" type="file" />
                                <small>Upload proof of transaction</small>
                                </div>
                              </div>
                                
                              </div>
                            </div>
                         
    
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="save_uploadFile" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        
                        </form>
                        
                      </div>
                    </div>
                  </div>
                  <!-- end Add 201 Files Modal -->
 