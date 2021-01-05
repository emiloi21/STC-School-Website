                  <!-- addRequirementsKinder Modal -->
                  <div id="addRequirementsKinder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_requirements.php" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Requirements</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <input name="dept" type="hidden" value="Grade School" />
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Grade Level</label>
                              <div class="col-sm-9">
                                <select name="gradeLevel" class="form-control">
                                  <option>-</option>
                                  <option>Nursery</option>
                                  <option>Kinder 1</option>
                                  <option>Kinder 2</option>
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
                              <label class="col-sm-3 form-control-label">Classification</label>
                              <div class="col-sm-9">
                                <select name="classification" class="form-control">
                                  <option>New</option>
                                  <option>Old</option>
                                  <option>Returnee</option>
                                  <option>Transferee</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Requirement Name</label>
                              <div class="col-sm-9">
                                <input name="requirement_name" class="form-control" type="text" />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Description</label>
                              <div class="col-sm-9">
                                <textarea name="description" class="form-control" rows="3" style="resize: none;" placeholder="Requirement description"></textarea>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Purpose</label>
                              <div class="col-sm-9">
                                <select name="purpose" class="form-control">
                                  <option>for Admission</option>
                                  <option>for Scholarship</option>
                                  <option>for Government Subsidy</option>
                                </select>
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addRequirements" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addRequirementsKinder Modal -->
                  
                  <!-- addSubjJHS Modal -->
                  <div id="addRequirementsJHS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_requirements.php" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Requirements</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <input name="dept" type="hidden" value="Junior High School" />
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Grade Level</label>
                              <div class="col-sm-9">
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
                              <label class="col-sm-3 form-control-label">Classification</label>
                              <div class="col-sm-9">
                                <select name="classification" class="form-control">
                                  <option>New</option>
                                  <option>Old</option>
                                  <option>Returnee</option>
                                  <option>Transferee</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Requirement Name</label>
                              <div class="col-sm-9">
                                <input name="requirement_name" class="form-control" type="text" />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Description</label>
                              <div class="col-sm-9">
                                <textarea name="description" class="form-control" rows="3" style="resize: none;" placeholder="Requirement description"></textarea>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Purpose</label>
                              <div class="col-sm-9">
                                <select name="purpose" class="form-control">
                                  <option>for Admission</option>
                                  <option>for Scholarship</option>
                                  <option>for Government Subsidy</option>
                                </select>
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addRequirements" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addSubjJHS Modal -->
                  
                  
                  
                  
                  <!-- addSubjSHS Modal -->
                  <div id="addRequirementsSHS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_requirements.php" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Requirements</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <input name="dept" type="hidden" value="Senior High School" />
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Grade Level</label>
                              <div class="col-sm-9">
                                <select name="gradeLevel" class="form-control">
                                  <option>-</option>
                                  
                                  
                                  <option>Grade 11</option>
                                  <option>Grade 12</option>
                                  
                                  </select>
                              </div>
                            </div>
 
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Strand</label>
                              <div class="col-sm-9">
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
                              <label class="col-sm-3 form-control-label">Classification</label>
                              <div class="col-sm-9">
                                <select name="classification" class="form-control">
                                  <option>New</option>
                                  <option>Old</option>
                                  <option>Returnee</option>
                                  <option>Transferee</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Requirement Name</label>
                              <div class="col-sm-9">
                                <input name="requirement_name" class="form-control" type="text" />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Description</label>
                              <div class="col-sm-9">
                                <textarea name="description" class="form-control" rows="3" style="resize: none;" placeholder="Requirement description"></textarea>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Purpose</label>
                              <div class="col-sm-9">
                                <select name="purpose" class="form-control">
                                  <option>for Admission</option>
                                  <option>for Scholarship</option>
                                  <option>for Government Subsidy</option>
                                </select>
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addRequirements" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addSubjSHS Modal -->
                  
                  
                  
                  <!-- addSubjCollge Modal -->
                  <div id="addRequirementsCollege" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_requirements.php" method="POST">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Requirements</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <input name="dept" type="hidden" value="College" />
                        
                        <div class="modal-body">
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Year Level</label>
                              <div class="col-sm-9">
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
                              <label class="col-sm-3 form-control-label">Course</label>
                              <div class="col-sm-9">
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
                              <label class="col-sm-3 form-control-label">Major</label>
                              <div class="col-sm-9">
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
                              <label class="col-sm-3 form-control-label">Classification</label>
                              <div class="col-sm-9">
                                <select name="classification" class="form-control">
                                  <option>New</option>
                                  <option>Old</option>
                                  <option>Returnee</option>
                                  <option>Transferee</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Requirement Name</label>
                              <div class="col-sm-9">
                                <input name="requirement_name" class="form-control" type="text" />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Description</label>
                              <div class="col-sm-9">
                                <textarea name="description" class="form-control" rows="3" style="resize: none;" placeholder="Requirement description"></textarea>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Purpose</label>
                              <div class="col-sm-9">
                                <select name="purpose" class="form-control">
                                  <option>for Admission</option>
                                  <option>for Scholarship</option>
                                  <option>for Government Subsidy</option>
                                </select>
                              </div>
                            </div>
 
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="addRequirements" type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end addSubjCollge Modal -->
                  
             
                  