            
            <!-- addSubjKinder Modal -->
                  <div id="rSendOTP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Account Helper</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        <form action="save_resend_otp.php?uid=<?php echo $_GET['uid']; ?>" method="POST">
                        <div class="modal-body">
                 
                        <div class="form-group row">
                              <label class="col-sm-4 form-control-label">Registered Mobile Number</label>
                              <div class="col-sm-8">
                              <input value="<?php echo $row['contact_num']; ?>" name="contact_num" type="text" class="form-control" readonly="" />
                              <small class="form-text">Registered Mobile Number</small>
                              </div>
                                 
                        </div>
                        
                        </div>
                     
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="send_otp" class="btn btn-primary">Resend</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addSubjKinder Modal -->
                  
                  