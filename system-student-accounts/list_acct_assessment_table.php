  
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                <thead>
                        <tr>
                        <th style="width: 40px;"><input type="checkbox" id="checkAll" /> All</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Type</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $discountCtr=0;
                      $tbl_assessDCount_query = $conn->query("SELECT * FROM tbl_accounts_discount WHERE gradeLevel='$studData_row[gradeLevel]' AND strand='$studData_row[strand]' AND major='$studData_row[major]' AND schoolYear='$data_src_sy' ORDER BY description ASC") or die(mysql_error());
                      while ($assessDCount_row = $tbl_assessDCount_query->fetch()) 
                      {
                        $discountCtr+=1;
                        $acct_discount_id=$assessDCount_row['acct_discount_id']; ?>
           
                        <tr>
                        
                        <td style="width: 10px;"><input type="checkbox" id="checkAll" name="arr_acct_dis_id[]" value="<?php echo $acct_discount_id; ?>" /></td>

                        <td><?php echo $discountCtr; ?>.&nbsp;<?php echo $assessDCount_row['description']; ?></td>
                        
                        <td><?php echo number_format($assessDCount_row['amount'], 2); ?></td>
                        
                        <td>
                        <?php if($assessDCount_row['type']==='Receivable'){ ?>
                            Receivable from outside entity
                        <?php }else{ ?>
                            Payable by the school
                        <?php } ?>
                        </td>
 
                        </tr> 
 
                          
                        <?php } ?>
                       
                      </tbody>
                    </table>
                    </div>
 
   