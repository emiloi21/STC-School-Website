                  <!-- addClassKinder Modal -->
                  <div id="addClassKinder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_class.php" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Class [ Grade School ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <input name="dept" type="hidden" value="Grade School" />
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Grade Level</label>
                              <div class="col-sm-10">
                                <select name="gradeLevel" class="form-control">
                                  <option>-</option>
                                  <option>Nursery</option>
                                  <option>Preparatory</option>
                                  <option>Kinder</option>
                                  <option>Grade 1</option>
                                  <option>Grade 2</option>
                                  <option>Grade 3</option>
                                  <option>Grade 4</option>
                                  <option>Grade 5</option>
                                  <option>Grade 6</option>
                                  </select>
                              </div>
                            </div>
                            
                            <input name="strand" type="hidden" value="N/A" />
                            <input name="major" type="hidden" value="N/A" />
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Section</label>
                              <div class="col-sm-10">
                                <input name="section" type="text" class="form-control">
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addClass" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addClassKinder Modal -->
                  
                  <!-- addSubjJHS Modal -->
                  <div id="addClassJHS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_class.php" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Class [ JHS ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <input name="dept" type="hidden" value="Junior High School" />
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Grade Level</label>
                              <div class="col-sm-10">
                                <select name="gradeLevel" class="form-control">
                                  <option>-</option>
                                  
                                  <option>Grade 7</option>
                                  <option>Grade 8</option>
                                  <option>Grade 9</option>
                                  <option>Grade 10</option>
                                  
                                  </select>
                              </div>
                            </div>
 
                            <input name="strand" type="hidden" value="N/A" />
                            <input name="major" type="hidden" value="N/A" />
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Section</label>
                              <div class="col-sm-10">
                                <input name="section" type="text" class="form-control">
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addClass" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addSubjJHS Modal -->
                  
                  
                  
                  
                  <!-- addSubjSHS Modal -->
                  <div id="addClassSHS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_class.php" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Class [ SHS ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <input name="dept" type="hidden" value="Senior High School" />
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Grade Level</label>
                              <div class="col-sm-10">
                                <select name="gradeLevel" class="form-control">
                                  <option>-</option>
                                  
                                  
                                  <option>Grade 11</option>
                                  <option>Grade 12</option>
                                  
                                  </select>
                              </div>
                            </div>
 
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Strand</label>
                              <div class="col-sm-10">
                                <select name="strand" class="form-control">
                                  <option>ABM</option>
                                  <option>GAS</option>
                                  <option>HUMSS</option>
                                  <option>STEM</option>
                                  </select>
                              </div>
                            </div>
                            
                            <input name="major" type="hidden" value="N/A" />
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Section</label>
                              <div class="col-sm-10">
                                <input name="section" type="text" class="form-control">
                              </div>
                            </div> 
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addClass" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addSubjSHS Modal -->
                  
                  
                  
                  <!-- addSubjCollge Modal -->
                  <div id="addClassCollege" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_class.php" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Class [ College ]</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <input name="dept" type="hidden" value="College" />
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Year Level</label>
                              <div class="col-sm-10">
                                <select name="gradeLevel" class="form-control">
                                  <option>-</option>
                                  <option>1st Year</option>
                                  <option>2nd Year</option>
                                  <option>3rd Year</option>
                                  <option>4th Year</option>
                                  
                                  </select>
                              </div>
                            </div>
 
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Course</label>
                              <div class="col-sm-10">
                                <select name="strand" class="form-control">
                                  <option>BSED</option>
                                  <option>BEED</option>
                                  <option>BSCS</option>
                                  <option>BSIT</option>
                                  <option>BSOA</option>
                                  <option>BSBA</option>
                                  <option>BSPSYCH</option>
                                  <option>BSTM</option>
                                  <option>BSHM</option>
                                  <option>ACT</option>
                                  <option>AOA</option>
                                </select>
                              </div>
                            </div> 
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Major</label>
                              <div class="col-sm-10">
                                <select name="major" class="form-control" style="font-size: small;">
                                  <option>N/A</option>
                                  <option value="English">English (BSED)</option>
                                  <option value="Filipino">Filipino (BSED)</option>
                                  <option value="Mathematics">Mathematics (BSED)</option>
                                  <option value="Science">Science (BSED)</option>
                                  <option value="Social Studies">Social Studies (BSED)</option>
                                  <option value="Values Education">Values Education (BSED)</option>
                                  <option value="FM">Financial Management (BSBA)</option>
                                  <option value="HRDM">Human Resource Development Management (BSBA)</option>
                                </select>
                              </div>
                            </div> 
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Section</label>
                              <div class="col-sm-10">
                                <input name="section" type="text" class="form-control">
                              </div>
                            </div> 
 
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addClass" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addSubjCollge Modal -->
                  
             
                  