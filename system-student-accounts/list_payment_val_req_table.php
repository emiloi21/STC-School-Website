                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                 
                      <thead>
                      <tr>
                      <th>Student Details</th>
                      <th>Payment Method</th>
                      <th>Trans Details</th>
                      <th>Proof of Payment</th>
                      <th>Status</th>
                      <th>Action</th>
                      </tr>
                      </thead>
                      
                      <tbody>
                      
                    <?php
                    
                    function randomcode(){
                    $var = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    srand((double)microtime()*1000000);
                    $i = 0;
                    $code = '';
                    while ($i <= 9) {
                    $num = rand() % 33;
                    $tmp = substr($var, $num, 1);
                    $code = $code . $tmp;
                    $i++;
                    }
                    return $code;
                    }

                    $receipt_num=randomcode();
                    
                    if($_GET['dept']==='All' OR $_GET['dept']===''){
                        $payValid_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE status='Pending' AND for_payment='Main' ORDER BY request_id DESC");   
                    }else{
                        $payValid_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE dept='$_GET[dept]' AND status='Pending' AND for_payment='Main' ORDER BY request_id DESC");    
                    }
                      
                      while($payValid_row=$payValid_query->fetch()){
                      
                      $payMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE pm_id='$payValid_row[pm_id]'") or die(mysql_error());
                      $payMethod_row = $payMethod_query->fetch();
                      
                      $studDataReq_query = $conn->query("SELECT * FROM students WHERE reg_id='$payValid_row[reg_id]'") or die(mysql_error());
                      $studDataReq_row = $studDataReq_query->fetch();
                      
                      
                      if($studDataReq_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($studDataReq_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studDataReq_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$studDataReq_row['mname'];
                        }
                        
                      ?>
                      
                      <tr>
                      
                      <td>
                      <?php echo $studDataReq_row['lname'].", ".$studDataReq_row['fname']." ".$finalMName; ?><br />
                      <small><?php
                      if($studDataReq_row['dept']==='College'){
                        if($studDataReq_row['major']==='N/A'){
                            echo $studDataReq_row['gradeLevel']." - ".$studDataReq_row['strand']." - ".$studDataReq_row['section'];
                        }else{
                            echo $studDataReq_row['gradeLevel']." - ".$studDataReq_row['strand']." ".$studDataReq_row['major']." - ".$studDataReq_row['section'];
                        }
                      }elseif($studDataReq_row['dept']==='Senior High School'){
                        echo $studDataReq_row['gradeLevel']." - ".$studDataReq_row['strand']." - ".$studDataReq_row['section'];
                      }else{
                        echo $studDataReq_row['gradeLevel']." - ".$studDataReq_row['section'];
                      }
                      
                      ?><br />
                      <?php echo $studDataReq_row['dept']; ?> <div class="badge badge-info"><?php echo $studDataReq_row['classification']; ?></div>
                      </small>
                      </td>
                      
                      <td>
                      <?php echo $payMethod_row['nameProvider']; ?><br />
                      <?php echo $payMethod_row['accountName']; ?><br />
                      <?php echo $payMethod_row['accountNum_link']; ?>
                      </td>
                      
                      <td>
                      Amount: <?php echo number_format($payValid_row['transAmt'], 2); ?><br />
                      Date: <?php echo $payValid_row['transDate']; ?></td>
                      
                      <td style="text-align: center;"><img src="../user-student/<?php echo $payValid_row['file_name']; ?>" class="img" style="width: 150px; height: 100px;" /></td>
                      
                      <td><?php echo $payValid_row['status']; ?></td>
                      
                      <td>
                      <a href="cashiering_system_load_particulars.php?reg_id=<?php echo $studDataReq_row['reg_id']; ?>&assessment_id=<?php echo $studDataReq_row['assessment_id']; ?>&schoolYear=<?php echo $studDataReq_row['schoolYear']; ?>&semester=<?php echo $studDataReq_row['sem']; ?>&payment_type=Payment Validation&receipt_num=<?php echo $receipt_num; ?>&request_id=<?php echo $payValid_row['request_id']; ?>" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-calculator"></i> Cashiering</a>
                      <a class="btn btn-primary btn-sm" title="Download file..." href="../user-student/<?php echo $payValid_row['file_name']; ?>" style="margin-bottom: 4px; color: white;" download><i class="fa fa-download"></i></a>
                      <a class="btn btn-danger btn-sm" title="Remove file..." href="save_payValid.php?<?php echo $payValid_row['request_id']; ?>" style="margin-bottom: 4px; color: white;"><i class="fa fa-trash"></i></a>
                      </td>
                      
                      </tr>
                      
                      <?php } ?>
                      
                      </tbody>
                      
                    </table>
                    </div>
                     