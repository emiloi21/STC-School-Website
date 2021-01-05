                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th><input type="checkbox" id="checkAll" /></th>
                        <th>Student</th>
                        <th>Account Details</th>
                        <th>Payable</th>
                        <th>Received</th>
                        <th>Balance</th>
                        <th></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
                      
                      $studData_query = $conn->query("SELECT reg_id, lname, fname, gradeLevel, strand, section FROM students WHERE gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]' ORDER BY lname, fname ASC") or die(mysql_error());
                      while ($studData_row = $studData_query->fetch()) 
                      {
                      
                      $AR_discounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE type='Payable' AND reg_id='$studData_row[reg_id]'") or die(mysql_error());
                      $ar_row = $AR_discounts_query->fetch();
                        
                      $discount_id=$ar_row['discount_id'];
                      
                      if($AR_discounts_query->rowCount()>0){
                        
                      $catCtr+=1; 
                        ?>
           
                        <tr>
                        
                        <td style="width: 10px;">
                        <?php if($ar_row['amt_bal']>0){ ?>
                            <input type="checkbox" id="checkAll" name="discount_id[]" value="<?php echo $discount_id; ?>" />
                        <?php } ?>
                        </td>
                        
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
                        <?php if($ar_row['amt_rcv']==='0.00'){ ?>
                        <a href="#" data-toggle="modal" data-target="#delete_payable<?php echo $discount_id; ?>" class="btn btn-danger btn-sm" style="color: white;" title="Click to remove <?php echo $catCtr.'. '.$studData_row['lname'].', '.$studData_row['fname']; ?>'s profile..."><i class="fa fa-times"></i></a>
                        <?php } ?>
                        </td>
               
                        
                        </tr>
                        
                        <?php } } ?>
                            
                      </tbody>
                    </table>
                    
                    </div>
                    