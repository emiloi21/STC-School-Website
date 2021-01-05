  
                   
                  
                  <!-- Time Shift [ Kinder ] Modal -->
                  <div id="importClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_import_class.php" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">IMPORT CLASS LIST</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                          <div class="form-group row">
                              
                              <div class="col-sm-6">
                                <select name="source_sy" name="account" class="form-control">
                                <option>-</option>
                                <?php
                                $isy_query = $conn->query("SELECT * FROM school_year ORDER BY schoolYear ASC");
                                while($isy_row = $isy_query->fetch()){
                                    
                                if($activeSchoolYear!=$isy_row['schoolYear']){ ?>
                                <option><?php echo $isy_row['schoolYear']; ?></option>
                                <?php }} ?>
                                </select>
                                <small>Import from School Year (Source)</small>
                              </div>
                              
                           
                              <div class="col-sm-6">
                                <select name="destination_sy" name="account" class="form-control">
                                <option><?php echo $activeSchoolYear; ?></option>
                                </select>
                                <small>Import to School Year (Destination)</small>
                              </div>
                              
                            </div>
  
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="tsKinder" type="submit" class="btn btn-primary">Start Import</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end Time Shift [ Kinder ] Modal -->
                  
                  
                      