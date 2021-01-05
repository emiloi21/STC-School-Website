                <!--upload Admission File Modal -->
            
                  <div id="uploadAdmissionFile<?php echo $reqs_row['require_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                       <form action="save_requirements.php?reg_code=<?php echo $_GET['reg_code']; ?>" method="POST" enctype="multipart/form-data">
                       
                       <input name="require_id" value="<?php echo $reqs_row['require_id']; ?>" type="hidden" />
                       <input name="purpose" value="<?php echo $reqs_row['purpose']; ?>" type="hidden" />
                        
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">UPLOAD FILE</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        <p>
                        <?php echo $reqs_row['requirement_name']; ?><br />
                        <small>Requirements for Admission</small>
                        </p>
                      
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <div class="row">
                                <div class="col-md-12">
                                <input class="form-control" name="per_file" type="file" required="" />
                                <small>Upload Requirement Image File</small>
                                </div>
                              </div>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <div class="row">
                                <div class="col-md-12">
                                <textarea class="form-control" name="student_remarks" rows="2" style="resize: none;" placeholder="Enter document remarks..."></textarea>
                                <small>Remarks</small>
                                </div>
                              </div>
                              </div>
                            </div>
                            
                         
    
                        </div>
                        
                        <div class="modal-footer">
                          
                          <button name="add_admission_file" type="submit" class="btn btn-primary">Upload</button>
                    
                        </div>
                        
                        </form>
                        
                      </div>
                    </div>
                  </div>
                  <!-- end Aupload Admission File Modal -->
                  
                  
                <!--update Admission File Modal -->
            
                  <div id="uploadUpdateAF<?php echo $reqStud_row['stud_reqs_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                       <form action="save_requirements.php?reg_code=<?php echo $_GET['reg_code']; ?>" method="POST" enctype="multipart/form-data">
                       
                       <input name="stud_reqs_id" value="<?php echo $reqStud_row['stud_reqs_id']; ?>" type="hidden" />
                       
                       
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">UPDATE FILE</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        <p>
                        <?php echo $reqs_row['requirement_name']; ?><br />
                        <small>Requirements for Admission</small>
                        </p>
                      
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <div class="row">
                                <div class="col-md-12">
                                <input class="form-control" name="per_file" type="file" required="" />
                                <small>Upload Requirement Image File</small>
                                </div>
                              </div>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <div class="row">
                                <div class="col-md-12">
                                <textarea class="form-control" name="student_remarks" rows="2" style="resize: none;" placeholder="Enter document remarks..."><?php echo $reqStud_row['student_remarks']; ?></textarea>
                                <small>Remarks</small>
                                </div>
                              </div>
                              </div>
                            </div>
                         
    
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white; margin-top: 0px;" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="update_admission_file" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        
                        </form>
                        
                      </div>
                    </div>
                  </div>
                  <!-- end update Admission File Modal -->