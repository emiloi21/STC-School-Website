<!DOCTYPE html>
<html>
  <?php include('session.php'); ?>
    
  <?php include('header.php'); ?>
  <body>
    
    <?php include('menu_sidebar.php'); ?>
    
    <div class="page">
      <?php include('top_navbar.php'); ?>

        
        
        <?php
        
        //BOOK DISCOUNTS
        $net_discount=0;
        $book_dis_query = $conn->prepare('SELECT * FROM tbl_book_discounts WHERE gradeLevel = :gradeLevel');
        $book_dis_query->execute(['gradeLevel' => $studData_row['gradeLevel']]);
        $book_dis_row = $book_dis_query->fetch();
        
        ?>
                
     
      <!-- Updates Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
          
          <div class="col-lg-12">
          
            <table style="width: 100%;">
 
            <tr>
                <td style="border: none; background-color: white;">
                <center>
                <table>
                <tr>
                <td style="border: none; text-align: center; background-color: white;">
                 <img width="50" height="50" src="../admin/img/<?php echo $sf_row['logo']; ?>" />
                </td>
                </tr>
                <tr>
                <td style="border: none; background-color: white;">
                <center>
                <p style="margin: 4px; font-size: 18px; font-weight: bolder; background-color: white;"><?php echo strtoupper($schoolName); ?></p>
                <p style="margin: 4px; font-size: 12px; background-color: white;"><?php echo $sf_row['address']; ?></p>
                </center>
                </td>
                </tr>
                </table>
                </center>
                </td>
            </tr>
            
            <tr>
                <td style="border: none; background-color: white;">
                <center>
                <p style="margin-bottom: 0px; margin-top: 0px; font-size: 20px;"><strong>STUDENT BOOK ASSESSMENT</strong></p>
                <p style="margin-top: 0px; font-size: 14px;"><strong>S.Y. <?php echo $data_src_sy; ?> <?php if($studData_row['dept']==='Senior High School' OR $studData_row['dept']==='College'){ ?>- <?php echo $data_src_sem;  } ?></strong></p>
                </center>
                </td>
            </tr>
            
            
            </table>
            
            <table>
                        <tr>
                        <td style="width: 60%; border: none; font-size: medium; background-color: white;"><strong>STUDENT:</strong>&nbsp;
                        
                        <?php
                            if($studData_row['mname']=='' OR $studData_row['mname']=='-')
                            {
                                $finalMName='';
                                
                            }else{
                                
                                if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                                
                                $finalMName=$suffix.$studData_row['mname'];
                            }
                            
                            echo $studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?>
                            
                        </td>
                        <td style="width: 40%; border: none; font-size: medium; background-color: white;"><strong>GRADE LEVEL - SECTION:</strong>&nbsp;
                        
                        
                        <?php
                        if($studData_row['dept']=="Grade School" OR $studData_row['dept']=="Junior High School"){
                            echo $studData_row['gradeLevel'].' - '.$studData_row['section'];
                        
                        }elseif($studData_row['dept']=="Senior High School"){
                            echo $studData_row['gradeLevel']." - ".$studData_row['strand'].' - '.$studData_row['section'];
                        
                        }else{
                            
                            if($studData_row['major']==='N/A' OR $studData_row['major']==='-' OR $studData_row['major']===''){
                                echo $studData_row['gradeLevel']." - ".$studData_row['strand'].' - '.$studData_row['section'];
                            }else{
                                echo $studData_row['gradeLevel']." - ".$studData_row['strand'].' '.$studData_row['major'].' - '.$studData_row['section'];
                            }
                            
                        }
                        ?>
                        </tr>
                        </table>
                        
          </div>
            <!-- SUBMITTED RESERVATION --> <!-- SUBMITTED RESERVATION --> <!-- SUBMITTED RESERVATION --> <!-- SUBMITTED RESERVATION -->
            
            <?php
            $book_ctr=0;
            $total_book_amt=0;
            $book_res_query = $conn->prepare('SELECT * FROM tbl_book_reserved WHERE reg_id = :reg_id ORDER BY type DESC');
            $book_res_query->execute(['reg_id' => $session_id]);
            
            ?>
                      
            <div class="col-lg-12 col-md-12">
              <!-- Daily Feed Widget-->
              <div id="daily-feeds" class="card updates daily-feeds">
             
                <div id="feeds-box4" role="tabpanel" class="collapse show">
                  <div class="feed-box">
                    <div class="table-responsive">
 
                            <table class="table table-bordered" style="width:100%; margin: 0px;">
                            <thead>
                            <tr>
                            <th style="padding: 6px; background-color: white; color: black;">Title</th>
                            <th style="padding: 6px; background-color: white; color: black;">Details</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                              <?php
                              
                              while($book_res_row = $book_res_query->fetch()){
                              $book_ctr+=1;
                              $book_query = $conn->prepare('SELECT * FROM tbl_book_booklist WHERE book_id = :book_id');
                              $book_query->execute(['book_id' => $book_res_row['book_id']]);
                              $book_row = $book_query->fetch();
                              
                              
                              $total_book_amt+=$book_row['book_amt'];
                              ?>
                              
                              
                                    <tr>
                                    <td style="background-color: white; padding: 6px; vertical-align: middle; color: black;"><strong><?php echo $book_ctr; ?>.</strong> <?php echo $book_row['title']; ?></td>
                                    <td style="background-color: white; padding: 6px; vertical-align: middle; color: black;"><?php echo $book_row['description']; ?></td>
                                    </tr>
                                   
         
                              <?php } ?>
                      
                            </table>
                            
                            <table class="table table-bordered" style="width:100%; margin: 12px 0px 0px 0px;">
                      
                      
                      
                            <tr>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black; text-align: right; font-weight: bold;">
                            <?php if($book_ctr>1){ echo $book_ctr.' Books'; }else{ echo $book_ctr.' Book'; } ?>
                            </td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black; text-align: right; font-weight: bold;">
                            <?php echo 'Php '.number_format($total_book_amt, 2); ?>
                            </td>
                            </tr>
                            
                            <tr>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black; text-align: right; font-weight: bold;">
                            <?php
                            
                            if($book_dis_row['type']==='Amount'){
                                $net_discount=$book_dis_row['discount_value'];
                                $dis_details=$book_dis_row['title'];
                            }else{
                                $net_discount=$total_book_amt*$book_dis_row['discount_value'];
                                
                                if($book_dis_row['discount_value']<1){
                                    $dis_details=substr($book_dis_row['discount_value'], 2).'% Discount'.' ( '.$book_dis_row['title'].' )';
                                }else{
                                    $dis_details=number_format($net_discount, 2).' ( 100% )';
                                }
                                
                            }
                            echo $dis_details;
                             
                            ?>
                            </td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black; text-align: right; font-weight: bold;">
                            <?php echo 'Php '.number_format($net_discount, 2); ?>
                            </td>
                            </tr>
                            
                            <tr>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black; text-align: right; font-weight: bold;">Total Amount</td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black; text-align: right; font-weight: bold;">
                            <?php echo 'Php '.number_format($total_book_amt-$net_discount, 2); ?>
                            </td>
                            </tr>
                            
                     </tbody>
                            
                            </table>
                        </div>
                        
                    
                  </div>
                </div>
              </div>
              <!-- Daily Feed Widget End-->
            </div>
            
            <!-- PAYMENT PLAN --><!-- PAYMENT PLAN --><!-- PAYMENT PLAN --><!-- PAYMENT PLAN -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Payment Plan: <?php echo $chk_pay_row['payment_plan']; ?></h4>
                </div>
                
                <div class="card-body">
                <div class="form-group row">
                    
                    <?php if($chk_pay_row['payment_plan']==='Cash'){ ?>
                    <!-- CASH -->
                    <div class="col-sm-12" style="margin-bottom: 18px;">
                      <div class="row">
                        <div class="table-responsive">
 
                            <table class="table table-bordered" style="width:100%; margin: 0px;">
                            <thead>
                            <tr>
                            <th style="padding: 6px; width: 25%; background-color: white; color: black;">No. of Books</th>
                            <th style="padding: 6px; width: 15%; background-color: white; color: black;">Total Amount</th>
                            <th style="padding: 6px; width: 15%; background-color: white; color: black;">Discount</th>
                            <th style="padding: 6px; width: 45%; background-color: white; color: black;" colspan="2">Payable Amount/s</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black;"><?php if($book_res_query->rowCount()>1){ echo $book_res_query->rowCount().' Books'; }else{ echo $book_res_query->rowCount().' Book'; } ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black;"><?php echo 'Php '.number_format($total_book_amt, 2); ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black;">
                            <?php
                            
                            if($book_dis_row['type']==='Amount'){
                                $net_discount=$book_dis_row['discount_value'];
                                $dis_details=number_format($net_discount, 2);
                            }else{
                                $net_discount=$total_book_amt*$book_dis_row['discount_value'];
                                
                                if($book_dis_row['discount_value']<1){
                                    $dis_details=number_format($net_discount, 2).' ( '.substr($book_dis_row['discount_value'], 2).'% )';
                                }else{
                                    $dis_details=number_format($net_discount, 2).' ( 100% )';
                                }
                                
                            }
                            echo 'Php '.$dis_details;
                             
                            ?>
                            </td>
                            
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black"><?php echo 'Php '.number_format($total_book_amt-$net_discount, 2); ?></td>
                            
                            <td style="background-color: white; padding: 6px; color: black;"><strong>Php <?php echo number_format($total_book_amt-$net_discount, 2); ?></strong><br />100% Upon distribution of books - <?php echo $date_1st_payment; ?></td>
                            </tr>
                            </tbody>
                            
                            </table>
                        </div>
                        
                      </div>
                    </div>
                    <!-- END CASH -->
                    <?php }elseif($chk_pay_row['payment_plan']==='Installment 1'){ ?>
                    <!-- INSTALLMENT 1 -->
                    <div class="col-sm-12" style="margin-bottom: 18px;">
                      <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width:100%; margin: 0px;">
                            <thead>
                            <tr>
                            <th style="padding: 6px; width: 25%; background-color: white; color: black;">No. of Books</th>
                            <th style="padding: 6px; width: 15%; background-color: white; color: black;">Total Amount</th>
                            <th style="padding: 6px; width: 15%; background-color: white; color: black;">Discount</th>
                            <th style="padding: 6px; width: 45%; background-color: white; color: black;" colspan="2">Payable Amount/s</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black;" rowspan="2"><?php if($book_res_query->rowCount()>1){ echo $book_res_query->rowCount().' Books'; }else{ echo $book_res_query->rowCount().' Book'; } ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black;" rowspan="2"><?php echo 'Php '.number_format($total_book_amt, 2); ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black;" rowspan="2">
                            <?php
                            
                            if($book_dis_row['type']==='Amount'){
                                $net_discount=$book_dis_row['discount_value'];
                                $dis_details=number_format($net_discount, 2);
                            }else{
                                $net_discount=$total_book_amt*$book_dis_row['discount_value'];
                                
                                if($book_dis_row['discount_value']<1){
                                    $dis_details=number_format($net_discount, 2).' ( '.substr($book_dis_row['discount_value'], 2).'% )';
                                }else{
                                    $dis_details=number_format($net_discount, 2).' ( 100% )';
                                }
                                
                            }
                            echo 'Php '.$dis_details;
                             
                            ?>
                            </td>
                            
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black" rowspan="2"><?php echo 'Php '.number_format($total_book_amt-$net_discount, 2); ?></td>
                            
                            <td style="background-color: white; padding: 6px; color: black"><strong>Php <?php echo number_format(($total_book_amt-$net_discount)/2, 2); ?></strong><br />50% Upon distribution of books - <?php echo $date_1st_payment; ?></td>
                            </tr>
                            
                            <tr>
                            <td style="background-color: white; padding: 6px; color: black"><strong>Php <?php echo number_format(($total_book_amt-$net_discount)/2, 2); ?></strong><br />50% 2nd payment date - <?php echo $date_2nd_payment; ?></td>
                            </tr>
                            
                            
                            </tbody>
                            
                            </table>
                        </div>
                        
                      </div>
                    </div>
                    <!-- END INSTALLMENT 1 -->
                    
                    <?php }elseif($chk_pay_row['payment_plan']==='Installment 2'){ ?>
                    <!-- INSTALLMENT 2 -->
                    <div class="col-sm-12" style="margin-bottom: 0px;">
                      <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width:100%; margin: 0px;">
                            <thead>
                            <tr>
                            <th style="padding: 6px; width: 25%; background-color: white; color: black;">No. of Books</th>
                            <th style="padding: 6px; width: 15%; background-color: white; color: black;">Total Amount</th>
                            <th style="padding: 6px; width: 15%; background-color: white; color: black;">Discount</th>
                            <th style="padding: 6px; width: 45%; background-color: white; color: black;" colspan="2">Payable Amount/s</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black;" rowspan="3"><?php if($book_res_query->rowCount()>1){ echo $book_res_query->rowCount().' Books'; }else{ echo $book_res_query->rowCount().' Book'; } ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black" rowspan="3"><?php echo 'Php '.number_format($total_book_amt, 2); ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black" rowspan="3">
                            <?php
                            
                            if($book_dis_row['type']==='Amount'){
                                $net_discount=$book_dis_row['discount_value'];
                                $dis_details=number_format($net_discount, 2);
                            }else{
                                $net_discount=$total_book_amt*$book_dis_row['discount_value'];
                                
                                if($book_dis_row['discount_value']<1){
                                    $dis_details=number_format($net_discount, 2).' ( '.substr($book_dis_row['discount_value'], 2).'% )';
                                }else{
                                    $dis_details=number_format($net_discount, 2).' ( 100% )';
                                }
                                
                            }
                            echo 'Php '.$dis_details;
                             
                            ?>
                            </td>
                            
                            <td style="background-color: white; padding: 6px; vertical-align: middle; color: black" rowspan="3"><?php echo 'Php '.number_format($total_book_amt-$net_discount, 2); ?></td>
                            
                            <td style="background-color: white; padding: 6px; color: black;"><strong>Php <?php echo number_format(($total_book_amt-$net_discount)/2, 2); ?></strong><br />50% Upon distribution of books - <?php echo $date_1st_payment; ?></td>
                            </tr>
                            
                            <tr>
                            <td style="background-color: white; padding: 6px; color: black;"><strong>Php <?php echo number_format(($total_book_amt-$net_discount)/4, 2); ?></strong><br />25% 2nd payment date - <?php echo $date_2nd_payment; ?></td>
                            </tr>
                            
                            <tr>
                            <td style="background-color: white; padding: 6px; color: black;"><strong>Php <?php echo number_format(($total_book_amt-$net_discount)/4, 2); ?></strong><br />25% 3rd payment date - <?php echo $date_3rd_payment; ?></td>
                            </tr>
                            
                            </tbody>
                            
                            </table>
                        </div>
                        
                      </div>
                    </div>
                    <!-- END INSTALLMENT 2 -->
                    <?php } ?>
                    
                    
                </div>
             
                <!--div class="row">
                
                    <div class="col-12" style="text-align: left;">
                    <?php //echo nl2br(); ?>
                    </div>
                    
                    <div class="col-12" style="text-align: center;">
                    <br /><br />
                    <p style="text-decoration-line: overline;">Parent's/Guardian Signature over Printer Name - Date</p>
                    </div>
                    
                </div-->
                    
                </div>
              
            </div>
          </div>
      
          </div>
        </div>
      </section>
      
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p><?php echo $schoolName; ?> &copy; 2020-2021</p>
            </div>
            <div class="col-sm-6 text-right">
              <p></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
      
      <?php $conn=null; ?>
    </div>
    
    <?php include('js_scripts.php'); ?>
  </body>
</html>