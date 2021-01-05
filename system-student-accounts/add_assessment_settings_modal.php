                  <!-- add PAYABLES Modal -->
                  <div id="add_payables_assessment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_assessment.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Payables</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Account Category</label>
                              <div class="col-sm-9">
                                <select name="category_id" class="form-control">
                                <option value="Receivable">-- Select Payables --</option>
                                <?php
                                $tbl_accounts_categories_query = $conn->query("SELECT * FROM tbl_accounts_categories WHERE gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                                while ($tbl_accounts_row = $tbl_accounts_categories_query->fetch()) 
                                { ?>
                                <option value="<?php echo $tbl_accounts_row['category_id']; ?>"><?php echo $tbl_accounts_row['description']; ?></option>
                                <?php } ?>
                                
                                </select>
                              </div>
                            </div> 
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addAssessmentPayables" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addClassKinder Modal --> 