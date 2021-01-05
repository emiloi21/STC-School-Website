  
                
                <div class="table-responsive">
                
                <table id="" class="display" style="width:100%">
                
                <thead>
                <tr>
                <th style="width: 20%;">Category</th>
                <th style="width: 20%;">Total Amount</th>
                <th style="width: 50%;">Particulars</th>
                <th style="width: 10%;"></th>
                </tr>
                </thead>
                      
                      <tbody>
                      
                      <?php
                      $payCtr=0;
                      $totalWholeYear=0;
                      $tbl_assessPayable_query = $conn->query("SELECT DISTINCT category_id FROM tbl_assessment_payables WHERE assessment_id='$_GET[assessment_id]' ORDER BY category_id ASC") or die(mysql_error());
                      while ($tbl_assessPayable_row = $tbl_assessPayable_query->fetch()) 
                      {
                        $payCtr+=1;
                        $category_id=$tbl_assessPayable_row['category_id']; ?>
                        
                        <tr> 
                        <td>
                        <?php echo $payCtr; ?>. 
                        <?php
                        
                        $tbl_accounts_categories_query = $conn->query("SELECT category_id, description, totalAmount FROM tbl_accounts_categories WHERE category_id='$tbl_assessPayable_row[category_id]'") or die(mysql_error());
                        $tbl_accounts_row = $tbl_accounts_categories_query->fetch();
                        
                        
                        $totalWholeYear+=$tbl_accounts_row['totalAmount'];
                        echo $tbl_accounts_row['description'];
                        
                        ?> 
                        
                        </td>
                        
                        <td><?php echo number_format($tbl_accounts_row['totalAmount'], 2); ?></td>
                        
                        <td>
                        <table>
                        <tr>
                        <th>Description</th>
                        <th>Amount</th>
                        </tr>
                        
                        <?php
                        $tbl_accounts_particulars_query = $conn->query("SELECT * FROM tbl_accounts_particulars WHERE category_id='$tbl_assessPayable_row[category_id]' ORDER BY description ASC") or die(mysql_error());
                        while ($tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch()) 
                        { ?>
                        
                        <tr>
                        <td style="background-color: white;"><?php echo $tbl_accounts_particulars_row['description']; ?></td>
                        <td style="background-color: white;"><?php echo number_format($tbl_accounts_particulars_row['amount'], 2); ?></td>
                        </tr>
                        
                        <?php } ?>
 
                       </table>
                        </td>
                        
                        <td style="width: 80px;">
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_account_payables<?php echo $category_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php }else{ ?>
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
                          <?php } ?>
                        </td>
                        </tr> 
                            
                        <!-- delete student Modal -->
                          <div id="delete_account_payables<?php echo $category_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_assessment.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>" method="POST">
                      
                              <input value="<?php echo $category_id; ?>" name="category_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Payable</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete payable:<br /><br /><?php echo $tbl_accounts_row['description']; ?>?
                                </h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteAssessmentPayables" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
 
                        <?php } ?>
                       
                      </tbody>
                    <tfoot>
                    <tr>
                    <th>Total Whole Year:</th>
                    <th><?php echo number_format($totalWholeYear, 2); ?></th>
                    <th></th>
                    <th></th>
                    </tr>
                    </tfoot>
                    </table>
                    </div>
                   