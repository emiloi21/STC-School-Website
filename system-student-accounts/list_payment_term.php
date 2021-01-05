<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
  <?php $get_dept=$_GET['dept']; ?>
 
  <body>
  
  <?php include('menu_sidebar.php'); ?>
  

    <div class="page">

    <?php include('navbar_header.php'); ?>
    
    <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li style="color: blue"><strong><?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Payment Terms Settings</li>
             
          </ul>
          
        </div>
      </div>
      
      <!-- Header Section-->
  
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
              <div style="margin-top: 12px; margin-bottom: 12px;">
               
              <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">PAYMENT TERMS <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
 
                 
                

                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th>Payment Term</th>
                        <th>Mode of Payment</th>
                        <th>Month Payable</th>
                        <th>Department</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
               
                      $paymentMethod_query = $conn->query("SELECT * FROM tbl_payment_terms ORDER BY category, payment_term ASC") or die(mysql_error());
                      while ($pm_row = $paymentMethod_query->fetch()) 
                      {
                        $catCtr+=1;
                        $pterm_id=$pm_row['pterm_id'];
                        
                        if($pm_row['month_set_up']==='01'){ $wordMM="January"; }
                        elseif($pm_row['month_set_up']==='02'){ $wordMM="February"; }
                        elseif($pm_row['month_set_up']==='03'){ $wordMM="March"; }
                        elseif($pm_row['month_set_up']==='04'){ $wordMM="April"; }
                        elseif($pm_row['month_set_up']==='05'){ $wordMM="May"; }
                        elseif($pm_row['month_set_up']==='06'){ $wordMM="June"; }
                        elseif($pm_row['month_set_up']==='07'){ $wordMM="July"; }
                        elseif($pm_row['month_set_up']==='08'){ $wordMM="August"; }
                        elseif($pm_row['month_set_up']==='09'){ $wordMM="September"; }
                        elseif($pm_row['month_set_up']==='10'){ $wordMM="October"; }
                        elseif($pm_row['month_set_up']==='11'){ $wordMM="November"; }
                        elseif($pm_row['month_set_up']==='12'){ $wordMM="December"; }
                        elseif($pm_row['month_set_up']==='13'){ $wordMM="Upon Enrollment"; }
                        else{ $wordMM="-"; }
                        
                        ?>
                        
                        <tr>
                        
                        <td><?php echo $pm_row['payment_term']; ?></td>
                        <td><?php echo $pm_row['category']; ?></td>
                        <td>
                        <?php
                        
                        if($pm_row['payment_term']==='Monthly'){
                            echo $pm_row['month_set_up'].' months payable';
                        }else{
                            echo $wordMM;
                        }
                        
                        ?>
                        
                        </td>
                        <td><?php echo $pm_row['dept']; ?></td>
                        <td>
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_payMethod<?php echo $pterm_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-gear"></i> Settings</a>
                        </td>
                        </tr>


                          <!-- edit category Modal -->
                          <div id="edit_payMethod<?php echo $pterm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              
                              <form action="save_payment_term.php" method="POST">
                              
                              <input value="<?php echo $pm_row['pterm_id']; ?>" name="pterm_id" type="hidden" />
                              <input value="Bank Transfer" name="type" type="hidden" class="form-control" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Payment Term Settings</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                
                                <div class="row" style="margin-bottom: 12px;">
                                  <div class="col-md-12">
                                  
                                  <?php if($pm_row['payment_term']==='Monthly'){ ?>
                                  
                                    <input name="month_set_up" class="form-control" value="<?php echo $pm_row['month_set_up']; ?>" type="number" min="1" max="12" step="1" />
                                    <small>No. of months payable</small>
                                  
                                  <?php }else{ ?>
                                  
                                    <select name="month_set_up" class="form-control">
                                    <option value="<?php echo $pm_row['month_set_up']; ?>"><?php echo $wordMM; ?></option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                    <option value="13">Upon Enrollment</option>
                                    </select>
                                    <small>Select Month Payable</small>
                                  <?php } ?>
                                      
                                  </div>
                                </div>
                                 
                                
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                                  <button name="updatePaymentTerm" type="submit" class="btn btn-primary">Update</button>
                                </div>
                                
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end edit category Modal -->
                  
                        <?php } ?>
                            
                      </tbody>
                    </table>
                    
                    </div>
                    
               
               </div>
               </div>
                   
                </div>
                
              </div>
              <!-- kinder End-->
              
            </div>
            
          </div>
        
              
      </section>
     
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
 
  </body>
</html>
