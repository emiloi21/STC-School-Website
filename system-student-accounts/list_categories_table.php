                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th></th>
                        <th>Description</th>
                        <th>Total Amount</th>
                        <th></th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
               
                      $tbl_accounts_categories_query = $conn->query("SELECT * FROM tbl_accounts_categories WHERE gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]' AND major='$_GET[major]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                      while ($tbl_accounts_row = $tbl_accounts_categories_query->fetch()) 
                      {
                        $catCtr+=1;
                        $category_id=$tbl_accounts_row['category_id'];
                        ?>
           
                        <tr>
                        
                        <td><?php echo $catCtr; ?></td>
                        
                        <td><?php echo $tbl_accounts_row['description']; ?></td>
                        
                        <td><?php echo $tbl_accounts_row['totalAmount']; ?></td>
                        
                        <td>
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          <a style="color: white !important;" href="list_account_particulars.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&category_id=<?php echo $category_id; ?>" class="btn btn-info btn-sm"><i class="fa fa-list"></i> Particulars</a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_account_category<?php echo $category_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_account_category<?php echo $category_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php }else{ ?>
                          <a style="color: white !important;" href="list_account_particulars.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&category_id=<?php echo $category_id; ?>" class="btn btn-info btn-sm"><i class="fa fa-list"></i> Particulars</a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_account_category<?php echo $category_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                           
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php } ?>
                        </td>
                        </tr>


                  <!-- edit category Modal -->
                  <div id="edit_account_category<?php echo $category_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_category.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>" method="POST">
                      
                      <input value="<?php echo $tbl_accounts_row['category_id']; ?>" name="category_id" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Category</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Title</label>
                              <div class="col-sm-9">
                                <input value="<?php echo $tbl_accounts_row['description']; ?>" name="description" type="text" class="form-control" placeholder="Enter category title..." />
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateCategory" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit category Modal -->
                  
                  
                        <!-- delete student Modal -->
                          <div id="delete_account_category<?php echo $category_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_category.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>" method="POST">
                      
                              <input value="<?php echo $tbl_accounts_row['category_id']; ?>" name="category_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Category</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete category:<br /><br /><?php echo $tbl_accounts_row['description']; ?>?
                                </h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteCategory" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
                          
                            <?php } ?>
                            
                      </tbody>
                    </table>
                    </div>
                     