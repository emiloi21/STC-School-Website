                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th>Student</th>
                        <th>Account Details</th>
                        <th>Receivable</th>
                        <th>Received</th>
                        <th>Balance</th>
                        <th></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
                      
                      $massTrans_query = $conn->query("SELECT * FROM tbl_mass_trans WHERE massTransCode='$_GET[massTransCode]' ORDER BY mt_id ASC") or die(mysql_error());
                      while ($mt_row = $massTrans_query->fetch()) 
                      {
                        
                      $AR_discounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE discount_id='$mt_row[discount_id]'") or die(mysql_error());
                      $ar_row = $AR_discounts_query->fetch();
                      
                      $discount_id=$ar_row['discount_id'];
                      
                      $studData_query = $conn->query("SELECT lname, fname, gradeLevel, strand, section FROM students WHERE reg_id='$ar_row[reg_id]'") or die(mysql_error());
                      $studData_row = $studData_query->fetch();
                      
                      
                      
                      if($AR_discounts_query->rowCount()>0){
                        
                      $catCtr+=1; 
                        ?>
           
                        <tr>
                        
                        <td>
                        <?php echo $catCtr.'. '.$studData_row['lname'].', '.$studData_row['fname']; ?><br />
                        <small>
                        <?php
                        if($_GET['dept']==='SHS'){
                            echo $studData_row['gradeLevel'].' - '.$studData_row['strand'].' - '.$studData_row['section'];
                        }else{
                            echo $studData_row['gradeLevel'].' - '.$studData_row['section'];
                        }
                        ?>
                        </small>
                        </td>
                        
                        <td><?php echo '[ '.$ar_row['account_code'].' ] '.$ar_row['description']; ?></td>
                        
                        <td><?php echo $ar_row['amount']; ?></td>
                        <td><?php echo $ar_row['amt_rcv']; ?></td>
                        <td><?php echo $ar_row['amt_bal']; ?></td>
                        
                        
                        <td>
                        <a href="del_mass_trans.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&transType=<?php echo $_GET['transType']; ?>&massTransCode=<?php echo $_GET['massTransCode']; ?>&mt_id=<?php echo $mt_row['mt_id']; ?>&goto_mtr=goto_mtr" class="btn btn-danger btn-sm" style="color: white;" title="Click to remove <?php echo $catCtr.'. '.$studData_row['lname'].', '.$studData_row['fname']; ?>'s profile..."><i class="fa fa-times"></i></a>
                        </td>
                        </tr>
                        
                        <?php } } ?>
                            
                      </tbody>
                    </table>
                    
                    </div>
                    