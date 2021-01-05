            
            <!-- addSubjKinder Modal -->
                  <div id="rSendOTP2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                    
                      <form action="save_userInfo.php" method="POST">
                      
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Registration Form</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                        <div class="form-group row">
                        <div class="col-sm-12">
                        <h6 style="margin-bottom: 0px;">Basic Information</h6>
                        <small>All fields are *required</small>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                              <div class="col-sm-12">
                              <input name="student_id" type="text" class="form-control" required="" />
                              <small class="form-text">Student's School ID Code</small>
                              </div>
                        </div>
                        
                        <div class="form-group row">
                              <div class="col-sm-12">
                              <input name="fname" type="text" class="form-control" required="" />
                              <small class="form-text">First Name</small>
                              </div>
                        </div>
                        
                        <div class="form-group row">
                              <div class="col-sm-12">
                              <input name="lname" type="text" class="form-control" required="" />
                              <small class="form-text">Last Name</small>
                              </div>
                        </div>
                        
                        <div class="form-group row">
                              <div class="col-sm-12">
                              <input name="email" type="email" class="form-control" required="" />
                              <small class="form-text">Email Address</small>
                              </div>
                        </div>
                        
                        <div class="form-group row">
                              <div class="col-sm-12">
                              
                              <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                                    <input name="contact_num" id="contact_num-login" type="text" maxlength="10" class="form-control" required="" />
                                </div>
                              </div>
                              <small class="form-text">Mobile Number</small>
                              </div>
                        </div>
                        
                        </div>
                     
                        
                        <div class="modal-footer">
                           <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                           <button type="submit" name="reg_book_account" class="btn btn-primary">Register Account</button>
                        </div>
                      
                      </div>
                      
                      </form>
                      
                    </div>
                  </div>
                  <!-- end addSubjKinder Modal -->
                  
                  <!-- addSubjKinder Modal -->
                  <div id="rSendOTP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Account Helper</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        <form action="save_resend_otp.php" method="POST">
                        <div class="modal-body">
                 
                        <div class="form-group row">
                        
                              <div class="col-sm-12">
                              <input value="<?php echo $row['contact_num']; ?>" name="student_id" type="text" class="form-control" placeholder="Enter Student School ID Code / Username"/>
                              <small>Student School ID Code / Username</small>
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
                  
                  