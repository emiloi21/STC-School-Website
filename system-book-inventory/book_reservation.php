<!DOCTYPE html>
<html>
  <?php include('session.php'); ?>
    
  <?php include('header.php'); ?>
  <body>
    
    <?php include('menu_sidebar.php'); ?>
    
    <div class="page">
      <?php include('top_navbar.php'); ?>

      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li style="color: blue"><strong>SY <?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Requirements - <?php echo $studData_row['dept']; ?></li>
          </ul>
          
        </div>
      </div>
     
      <!-- Updates Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
          
          <?php
          $book_ctr=0;
          $total_book_amt=0;
          $book_query = $conn->prepare('SELECT * FROM tbl_book_booklist WHERE gradeLevel = :gradeLevel AND strand = :strand AND major = :major AND section = :section AND type = :type');
          $book_query->execute(['gradeLevel' => $studData_row['gradeLevel'], 'strand' => $studData_row['strand'], 'major' => $studData_row['major'], 'section' => $studData_row['section'], 'type' => 'Required']);

          $book_res_query = $conn->prepare('SELECT * FROM tbl_book_reserved WHERE reg_id = :reg_id ORDER BY type DESC');
          $book_res_query->execute(['reg_id' => $session_id]);
          
          //BOOK DISCOUNTS
          $net_discount=0;
          $book_dis_query = $conn->prepare('SELECT * FROM tbl_book_discounts WHERE gradeLevel = :gradeLevel');
          $book_dis_query->execute(['gradeLevel' => $studData_row['gradeLevel']]);
          $book_dis_row = $book_dis_query->fetch();
  
                
          ?>
            
          <?php
          
          if($chk_payables_query->rowCount()<=0){
            
          //AUTO ADD OPTIONAL BOOKS
          /*$auto_add_book_opt_query = $conn->prepare('SELECT * FROM tbl_book_booklist WHERE gradeLevel = :gradeLevel AND strand = :strand AND major = :major AND section = :section AND type = :type');
          $auto_add_book_opt_query->execute(['gradeLevel' => $studData_row['gradeLevel'], 'strand' => $studData_row['strand'], 'major' => $studData_row['major'], 'section' => $studData_row['section'], 'type' => 'Optional']);
          
          while($aa_book_opt_row = $auto_add_book_opt_query->fetch()){
            
            $conn->query("INSERT INTO tbl_book_res_dummy(reg_id, book_id, book_amt, type)
            VALUES('$session_id', '$aa_book_opt_row[book_id]', '$aa_book_opt_row[book_amt]', '$aa_book_opt_row[type]')");
            
          } */
          
          ?>
            
            <div class="col-lg-6 col-md-12">
              <!-- Daily Feed Widget-->
              <div id="daily-feeds" class="card updates daily-feeds">
                <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box">Required Books</a></h2>
                  <div class="right-column">
                    <div class="badge badge-primary"><?php if($book_query->rowCount()>1){ echo $book_query->rowCount().' Books'; }else{ echo $book_query->rowCount().' Book'; } ?></div><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
                <div id="feeds-box" role="tabpanel" class="collapse show">
                  <div class="feed-box">
                    <ul class="feed-elements list-unstyled">
                    
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content"><strong>Book Details</strong>
                            </div>
                          </div>
                          <div class="date"></div>
                        </div>
                      </li>
                      <?php while($book_row = $book_query->fetch()){ ?>
                      <!-- List-->
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content"><strong><?php echo $book_row['title']; ?></strong>
                            <small><?php echo $book_row['description']; ?></small>
                            </div>
                          </div>
                          <div class="date">
                          <?php
                          
                          $total_book_amt+=$book_row['book_amt'];
                          //echo $book_row['book_amt'];
                          
                          ?>
                          </div>
                        </div>
                      </li>
                      <?php } ?>
                    
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong>Total Amount</strong>
                            </div>
                          </div>
                          <div class="date"><?php echo number_format($total_book_amt, 2); ?></div>
                        </div>
                      </li>
                      
                      
                    </ul>
                    
                  </div>
                </div>
              </div>
              <!-- Daily Feed Widget End-->
            </div>
            




            <?php
            $total_num_reserved=0;
            $total_num_reserved_amt=0;
            
            $total_num_reserved_deduct=0;
            $total_num_reserved_amt_decuct=0;
            
            $book_opt_query = $conn->prepare('SELECT * FROM tbl_book_booklist WHERE gradeLevel = :gradeLevel AND strand = :strand AND major = :major AND section = :section AND type = :type');
            $book_opt_query->execute(['gradeLevel' => $studData_row['gradeLevel'], 'strand' => $studData_row['strand'], 'major' => $studData_row['major'], 'section' => $studData_row['section'], 'type' => 'Optional']);
            
            $book_res_dummy_query = $conn->prepare('SELECT * FROM tbl_book_res_dummy WHERE reg_id = :reg_id');
            $book_res_dummy_query->execute(['reg_id' => $studData_row['reg_id']]);
                              
            ?>
           
            
            <div class="col-lg-6 col-md-12">
              <!-- Daily Feed Widget-->
              <div id="daily-feeds" class="card updates daily-feeds">
                <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds2" href="#feeds-box2" aria-expanded="true" aria-controls="feeds-box2">Optional Books</a></h2>
                  <div class="right-column">
                    <div class="badge badge-primary"><?php if($book_opt_query->rowCount()>1){ echo $book_opt_query->rowCount().' Books'; }else{ echo $book_opt_query->rowCount().' Book'; } ?></div><a data-toggle="collapse" data-parent="#daily-feeds2" href="#feeds-box2" aria-expanded="true" aria-controls="feeds-box2"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
                <div id="feeds-box2" role="tabpanel" class="collapse show">
                  <div class="feed-box">
                    <ul class="feed-elements list-unstyled">
                    
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content"><strong>Book Details</strong>
                            </div>
                          </div>
                          <div class="date">Price</div>
                        </div>
                      </li>
                      <?php while($book_opt_row = $book_opt_query->fetch()){ ?>
                      <!-- List-->
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content"><strong><?php echo $book_opt_row['title']; ?></strong>
                            <small><?php echo $book_opt_row['description']; ?></small>
                            
                              <div class="CTAs">
                              <?php
                              $chk_book_res_dum_query = $conn->prepare('SELECT * FROM tbl_book_res_dummy WHERE reg_id = :reg_id AND book_id = :book_id');
                              $chk_book_res_dum_query->execute(['reg_id' => $studData_row['reg_id'], 'book_id' => $book_opt_row['book_id']]);
                              
                              if($chk_book_res_dum_query->rowCount()>0){ ?>
                                <a href="update_optional_book.php?book_id=<?php echo $book_opt_row['book_id']; ?>&action=Remove" class="btn btn-xs btn-primary"><i class="fa fa-check"> </i>Add Book</a>
                              <?php }else{ ?>
                                <a href="update_optional_book.php?book_id=<?php echo $book_opt_row['book_id']; ?>&action=Add" class="btn btn-xs btn-danger"><i class="fa fa-times"> </i>Remove Book</a>
                              <?php } ?>
                              </div>
                               
                            </div>
                          </div>
                          <div class="date">
                          <?php
                          $total_num_reserved+=1;
                          $total_num_reserved_amt+=$book_opt_row['book_amt'];
                          echo $book_opt_row['book_amt'];
                          ?>
                          </div>
                        </div>
                      </li>
                      
                      <?php } ?>
             
                      <?php
                      
                      if($book_res_dummy_query->rowCount()>0){
                        
                          while($book_res_dummy_row = $book_res_dummy_query->fetch())
                          {
                            
                          $total_num_reserved_deduct+=1;
                          $total_num_reserved_amt_decuct+=$book_res_dummy_row['book_amt'];
                
                          }
                          
                      }else{
                        
                        $total_num_reserved_deduct=0;
                        $total_num_reserved_amt_decuct=0;
                        
                      }
                      
                      ?>
                      
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong>No. of Ordered Optional Books</strong>
                            </div>
                          </div>
                          <div class="date">Total Amount</div>
                        </div>
                      </li>
                      
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong>
                            <?php
                            
                            $final_opt_ctr=$total_num_reserved-$total_num_reserved_deduct;
                            echo $final_opt_ctr;
                            
                            ?>
                            </strong>
                            </div>
                          </div>
                          <div class="date">
                          <?php 
                          $final_opt_amt=$total_num_reserved_amt-$total_num_reserved_amt_decuct;
                          echo number_format($final_opt_amt, 2);
                          ?>
                          </div>
                        </div>
                      </li>
                      
                    </ul>
                    
                  </div>
                </div>
              </div>
              <!-- Daily Feed Widget End-->
            </div>
            
            
            <div class="col-lg-12 col-md-12">
              <!-- Daily Feed Widget-->
              <div id="daily-feeds" class="card updates daily-feeds">
                <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds3" href="#feeds-box3" aria-expanded="true" aria-controls="feeds-box3">Summary</a></h2>
                  <div class="right-column">
                    <div class="badge badge-primary"><?php $total_final_books=$book_query->rowCount()+$final_opt_ctr; if($total_final_books>1){ echo $total_final_books.' Books'; }else{ echo $total_final_books.' Book'; } ?></div><a data-toggle="collapse" data-parent="#daily-feeds3" href="#feeds-box3" aria-expanded="true" aria-controls="feeds-box3"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
                <div id="feeds-box3" role="tabpanel" class="collapse show">
                  <div class="feed-box">
                  
                  <form action="save_book_reservation.php" method="POST">
                   
                    <ul class="feed-elements list-unstyled">
                        
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content"><strong>No. of Ordered Books</strong>
                            </div>
                          </div>
                          <div class="date">Total Amount</div>
                        </div>
                      </li>
                      
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong><?php echo $book_query->rowCount(); ?> (Required)</strong>
                            </div>
                          </div>
                          <div class="date"><?php echo number_format($total_book_amt, 2); ?></div>
                        </div>
                      </li>
                      
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong><?php echo $final_opt_ctr; ?> (Optional)</strong>
                            </div>
                          </div>
                          <div class="date"><?php echo number_format($final_opt_amt, 2); ?></div>
                        </div>
                      </li>
                      
                    
                    <?php
                    //total no. of books
                    $total_num_books=$book_query->rowCount()+$final_opt_ctr;
                    $final_total_amt=$final_opt_amt+$total_book_amt;
                    ?>
                    <hr />
                      <li class="clearfix" style="background-color: gray; color: white;">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong style="color: white;"><?php if($total_num_books>1){ echo $total_num_books.' Books'; }else{ echo $total_num_books.' Book'; } ?></strong>
                            </div>
                          </div>
                          <div class="date"><?php echo 'Php '.number_format($final_total_amt, 2); ?></div>
                        </div>
                      </li>
                      
                      <!-- DISCOUNT -->
                      <li class="clearfix" style="background-color: gray; color: white;">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong style="color: white;">
                            <?php
                            
                            if($book_dis_row['type']==='Amount'){
                                $net_discount=$book_dis_row['discount_value'];
                                $dis_details=number_format($net_discount, 2).' ( '.$book_dis_row['title'].' )';
                            }else{
                                $net_discount=$final_total_amt*$book_dis_row['discount_value'];
                                
                                if($book_dis_row['discount_value']<1){
                                    $dis_details=substr($book_dis_row['discount_value'], 2).'% Discount'.' ( '.$book_dis_row['title'].' )';
                                }else{
                                    $dis_details=number_format($net_discount, 2).' ( 100% )';
                                }
                                
                            }
                            echo $dis_details;
                             
                            ?>
                            </strong>
                            </div>
                          </div>
                          <div class="date"><?php echo 'Php '.number_format($net_discount, 2); ?></div>
                        </div>
                      </li>
                      <!-- DISCOUNTED AMOUNT PAYABLE -->
                      <li class="clearfix" style="background-color: gray; color: white;">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong style="color: white;">Total Amount</strong>
                            </div>
                          </div>
                          <div class="date"><?php echo 'Php '.number_format($final_total_amt-$net_discount, 2); ?></div>
                        </div>
                      </li>
                      
                    <hr />
                    
                    </ul>
                    <div style="text-align: right; margin: 12px;">
                    <a href="book_reservation_mop.php" class="btn btn-primary"><i class="fa fa-check"></i> Save Ordered Books &amp; Proceed to Payment Plan Selection <i class="fa fa-chevron-right"></i></a>
                    </div>
                    
                    </form>
                  </div>
                </div>
              </div>
              <!-- Daily Feed Widget End-->
            </div>
            
            <?php }else{ ?>
            
            <!-- SUBMITTED RESERVATION --> <!-- SUBMITTED RESERVATION --> <!-- SUBMITTED RESERVATION --> <!-- SUBMITTED RESERVATION -->
   
            <div class="col-lg-12 col-md-12">
              <!-- Daily Feed Widget-->
              <div id="daily-feeds" class="card updates daily-feeds">
                <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds4" href="#feeds-box4" aria-expanded="true" aria-controls="feeds-box4">Ordered Books</a></h2>
                  <div class="right-column">
                    <div class="badge badge-primary"><?php if($book_res_query->rowCount()>1){ echo $book_res_query->rowCount().' Books'; }else{ echo $book_res_query->rowCount().' Book'; } ?></div><a data-toggle="collapse" data-parent="#daily-feeds4" href="#feeds-box4" aria-expanded="true" aria-controls="feeds-box4"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
                <div id="feeds-box4" role="tabpanel" class="collapse show">
                  <div class="feed-box">
                    <ul class="feed-elements list-unstyled">
                    
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content"><strong>Details</strong>
                            </div>
                          </div>
                          <div class="date"></div>
                        </div>
                      </li>
                      <?php
                      
                      while($book_res_row = $book_res_query->fetch()){
                      $book_ctr+=1;
                      $book_query = $conn->prepare('SELECT * FROM tbl_book_booklist WHERE book_id = :book_id');
                      $book_query->execute(['book_id' => $book_res_row['book_id']]);
                      $book_row = $book_query->fetch();
            
                      ?>
                      <!-- List-->
                      <li class="clearfix">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong style="font-weight: bold;"><strong><?php echo $book_ctr; ?>. </strong><?php echo $book_row['title']; ?></strong>
                            <small>
                            <?php echo $book_row['description']; ?>
                             &middot; 
                            <?php
                            
                            echo $book_row['type'];
                            
                            if($book_row['type']==='Optional'){
                            
                            echo ' - Php '.$book_row['book_amt']; 
                            
                            }
                          
                            ?>
                            </small>
                            </div>
                          </div>
                          <div class="date">
                          
                          <?php $total_book_amt+=$book_row['book_amt']; ?>
                          
                          </div>
                        </div>
                      </li>
                      <?php } ?>
                      
                      <li class="clearfix" style="background-color: gray; color: white;">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong style="color: white;"><?php if($book_ctr>1){ echo $book_ctr.' Books'; }else{ echo $book_ctr.' Book'; } ?></strong>
                            </div>
                          </div>
                          <div class="date"><?php echo 'Php '.number_format($total_book_amt, 2); ?></div>
                        </div>
                      </li>
                      
                      <!-- DISCOUNT -->
                      <li class="clearfix" style="background-color: gray; color: white;">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong style="color: white;">
                            <?php
                            
                            if($book_dis_row['type']==='Amount'){
                                $net_discount=$book_dis_row['discount_value'];
                                $dis_details=number_format($net_discount, 2).' ( '.$book_dis_row['title'].' )';
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
                            </strong>
                            </div>
                          </div>
                          <div class="date"><?php echo 'Php '.number_format($net_discount, 2); ?></div>
                        </div>
                      </li>
                      <!-- DISCOUNTED AMOUNT PAYABLE -->
                      <li class="clearfix" style="background-color: gray; color: white;">
                        <div class="feed d-flex justify-content-between">
                          <div class="feed-body d-flex justify-content-between">
                            <div class="content">
                            <strong style="color: white;">Total Amount</strong>
                            </div>
                          </div>
                          <div class="date"><?php echo 'Php '.number_format($total_book_amt-$net_discount, 2); ?></div>
                        </div>
                      </li>
                      
                      
                    </ul>
                  </div>
                </div>
              </div>
              <!-- Daily Feed Widget End-->
            </div>
            
            <!-- PAYMENT PLAN --><!-- PAYMENT PLAN --><!-- PAYMENT PLAN --><!-- PAYMENT PLAN -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Selected Payment Plan</h4>
                </div>
                
                <?php
                //BOOK DISCOUNTS
                $net_discount=0;
                $book_dis_query = $conn->prepare('SELECT * FROM tbl_book_discounts WHERE gradeLevel = :gradeLevel');
                $book_dis_query->execute(['gradeLevel' => $studData_row['gradeLevel']]);
                $book_dis_row = $book_dis_query->fetch();
                ?>
     
                
                <div class="card-body">
                <div class="form-group row">
                    
                    <?php if($chk_pay_row['payment_plan']==='Cash'){ ?>
                    <!-- CASH -->
                    <div class="col-sm-12" style="margin-bottom: 18px;">
                      <div class="row">
                        <div class="table-responsive">
                        <table class="table table-bordered" style="width:100%;">
                            <thead>
                            <tr>
                            <th>
                            
                            <label for="cash">CASH</label>
                            <!--div class="badge badge-warning">Selected</div-->
                            
                            </th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="background-color: white; padding: 6px;">
                            <table class="table table-bordered" style="width:100%; margin: 0px;">
                            <thead>
                            <tr>
                            <th style="padding: 6px; width: 25%;">No. of Books</th>
                            <th style="padding: 6px; width: 15%;">Total Amount</th>
                            <th style="padding: 6px; width: 15%;">Discount</th>
                            <th style="padding: 6px; width: 45%;" colspan="2">Total Payable</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="background-color: white; padding: 6px; vertical-align: middle;"><?php if($book_res_query->rowCount()>1){ echo $book_res_query->rowCount().' Books'; }else{ echo $book_res_query->rowCount().' Book'; } ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle;"><?php echo 'Php '.number_format($total_book_amt, 2); ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle;">
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
                            
                            <td style="background-color: white; padding: 6px; vertical-align: middle;"><?php echo 'Php '.number_format($total_book_amt-$net_discount, 2); ?></td>

                            <td style="background-color: white; padding: 6px;"><strong>Php <?php echo number_format($total_book_amt-$net_discount, 2); ?></strong><br />100% Upon distribution of books - <?php echo $date_1st_payment; ?></td>
                            </tr>
                            </tbody>
                            
                            </table>
                            </td>
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
                        <table class="table table-bordered" style="width:100%;">
                            <thead>
                            <tr>
                            <th>
                            
                            <label for="ins1">INSTALLMENT</label>
                            <!--div class="badge badge-warning">Selected</div-->
                            
                            </th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="background-color: white; padding: 6px;">
                            <table class="table table-bordered" style="width:100%; margin: 0px;">
                            <thead>
                            <tr>
                            <th style="padding: 6px; width: 25%;">No. of Books</th>
                            <th style="padding: 6px; width: 15%;">Total Amount</th>
                            <th style="padding: 6px; width: 15%;">Discount</th>
                            <th style="padding: 6px; width: 45%;" colspan="2">Total Payable</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="background-color: white; padding: 6px; vertical-align: middle;" rowspan="2"><?php if($book_res_query->rowCount()>1){ echo $book_res_query->rowCount().' Books'; }else{ echo $book_res_query->rowCount().' Book'; } ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle;" rowspan="2"><?php echo 'Php '.number_format($total_book_amt, 2); ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle;" rowspan="2">
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
                            
                            <td style="background-color: white; padding: 6px; vertical-align: middle;" rowspan="2"><?php echo 'Php '.number_format($total_book_amt-$net_discount, 2); ?></td>

                            <td style="background-color: white; padding: 6px;"><strong>Php <?php echo number_format(($total_book_amt-$net_discount)/2, 2); ?></strong><br />50% Upon distribution of books - <?php echo $date_1st_payment; ?></td>
                            </tr>
                            
                            <tr>
                            <td style="background-color: white; padding: 6px;"><strong>Php <?php echo number_format(($total_book_amt-$net_discount)/2, 2); ?></strong><br />50% 2nd payment date - <?php echo $date_2nd_payment; ?></td>
                            </tr>
                            
                            
                            </tbody>
                            
                            </table>
                            </td>
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
                        <table class="table table-bordered" style="width:100%;">
                            <thead>
                            <tr>
                            <th>
                            <label for="ins2">INSTALLMENT 2</label>
                            <!--div class="badge badge-warning">Selected</div-->
                            
                            </th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="background-color: white; padding: 6px;">
                            <table class="table table-bordered" style="width:100%; margin: 0px;">
                            <thead>
                            <tr>
                            <th style="padding: 6px; width: 25%;">No. of Books</th>
                            <th style="padding: 6px; width: 15%;">Total Amount</th>
                            <th style="padding: 6px; width: 15%;">Discount</th>
                            <th style="padding: 6px; width: 45%;" colspan="2">Total Payable</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <tr>
                            <td style="background-color: white; padding: 6px; vertical-align: middle;" rowspan="3"><?php if($book_res_query->rowCount()>1){ echo $book_res_query->rowCount().' Books'; }else{ echo $book_res_query->rowCount().' Book'; } ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle;" rowspan="3"><?php echo 'Php '.number_format($total_book_amt, 2); ?></td>
                            <td style="background-color: white; padding: 6px; vertical-align: middle;" rowspan="3">
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
                            
                            <td style="background-color: white; padding: 6px; vertical-align: middle;" rowspan="3"><?php echo 'Php '.number_format($total_book_amt-$net_discount, 2); ?></td>

                            <td style="background-color: white; padding: 6px;"><strong>Php <?php echo number_format(($total_book_amt-$net_discount)/2, 2); ?></strong><br />50% Upon distribution of books - <?php echo $date_1st_payment; ?></td>
                            </tr>
                            
                            <tr>
                            <td style="background-color: white; padding: 6px;"><strong>Php <?php echo number_format(($total_book_amt-$net_discount)/4, 2); ?></strong><br />25% 2nd payment date - <?php echo $date_2nd_payment; ?></td>
                            </tr>
                            
                            <tr>
                            <td style="background-color: white; padding: 6px;"><strong>Php <?php echo number_format(($total_book_amt-$net_discount)/4, 2); ?></strong><br />25% 3rd payment date - <?php echo $date_3rd_payment; ?></td>
                            </tr>
                            
                            </tbody>
                            
                            </table>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                        
                      </div>
                    </div>
                    <!-- END INSTALLMENT 2 -->
                    <?php } ?>
                    
                    
                </div>
             
                <div class="row">
                
                    <div class="col-12" style="text-align: center;">
                        <a href="print_book_assessment.php" class="btn btn-info" title="Click to print assessment."><i class="fa fa-print"></i> Print Assessment</a>
                    </div>
                    
                </div>
                    
                </div>
              
            </div>
          </div>
          
            <?php } ?>
            
          </div>
        </div>
      </section>
      
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('js_scripts.php'); ?>
  </body>
</html>