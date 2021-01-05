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
            <li class="breadcrumb-item active">Payment Method Manager</li>
             
          </ul>
          
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <br />
 
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
              <div style="margin-top: 12px; margin-bottom: 12px;">
                  
                  <div class="tab" style="border-bottom: 1px solid #33b35a;">
                    <a class="tablinks" onclick="openCity(event, 'bankTrans')"><i class="fa fa-plus"></i> Bank Transfer</a>
                    <a class="tablinks" onclick="openCity(event, 'moneyTrans')"><i class="fa fa-plus"></i> Money Transfer</a>
                    <a class="tablinks" onclick="openCity(event, 'walletApp')"><i class="fa fa-plus"></i> Wallet App</a>
                    <a class="tablinks" onclick="openCity(event, 'paypal')"><i class="fa fa-plus"></i> Paypal</a>
                  </div>
                  
                  
                  <!-- BANK TRANS -->
                  <div id="bankTrans" class="tabcontent" style="border-left: 1px solid #33b35a; border-right: 1px solid #33b35a; border-bottom: 1px solid #33b35a;">
                  <form action="save_payMethod.php" method="POST">
                  
                  <input value="Bank Transfer" name="type" type="hidden" class="form-control" />
                  
                  <div class="form-group row" style="margin-top: 12px;">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-4">
                              <select name="nameProvider" class="form-control">
                                  <option>Banco de Oro</option>
                                  <option>Bank of the Phillipine Island</option>
                              </select>
                              <small>Bank</small>
                          </div>
                          <div class="col-md-4">
                              <input name="accountName" class="form-control" />
                              <small>Account Name</small>
                          </div>
                          
                          <div class="col-md-4">
                              <input name="accountNum_link" class="form-control" />
                              <small>Account Number</small>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-sm-12" style="text-align: right;">
                      <button name="savePayMethod" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                      </div>
                                
                              
                              
                  </div>
                  
                  </form>
  
              </div>
              <!-- END BANK TRANS -->
              
              <!-- MONEY TRANS -->
              <div id="moneyTrans" class="tabcontent" style="border-left: 1px solid #33b35a; border-right: 1px solid #33b35a; border-bottom: 1px solid #33b35a;">
                  <form action="save_payMethod.php" method="POST">
                  
                  <input value="Money Transfer" name="type" type="hidden" class="form-control" />
                  
                  <div class="form-group row" style="margin-top: 12px;">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-4">
                              <select name="nameProvider" class="form-control">
                                  <option>Palawan Express</option>
                              </select>
                              <small>Service Provider</small>
                          </div>
                          <div class="col-md-4">
                              <input name="accountName" class="form-control" />
                              <small>Account Name</small>
                          </div>
                          
                          <div class="col-md-4">
                              <input name="accountNum_link" class="form-control" />
                              <small>Account Number</small>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-sm-12" style="text-align: right;">
                      <button name="savePayMethod" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                      </div>
                                
                              
                              
                  </div>
                  
                  </form>
  
              </div>
              <!-- END MONEY TRANS -->
              
              
              <!-- WALLET APP TRANS -->
              <div id="walletApp" class="tabcontent" style="border-left: 1px solid #33b35a; border-right: 1px solid #33b35a; border-bottom: 1px solid #33b35a;">
                  <form action="save_payMethod.php" method="POST">
                  
                  <input value="Wallet App" name="type" type="hidden" class="form-control" />
                  
                  <div class="form-group row" style="margin-top: 12px;">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-4">
                              <select name="nameProvider" class="form-control">
                                  <option>GCash</option>
                                  <option>CoinsPH</option>
                              </select>
                              <small>Service Provider</small>
                          </div>
                          <div class="col-md-4">
                              <input name="accountName" class="form-control" />
                              <small>Account Name</small>
                          </div>
                          
                          <div class="col-md-4">
                              <input name="accountNum_link" class="form-control" />
                              <small>Mobile Number</small>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-sm-12" style="text-align: right;">
                      <button name="savePayMethod" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                      </div>
                                
                              
                              
                  </div>
                  
                  </form>
  
              </div>
              <!-- END WALLET APP TRANS -->
              
              
              <!-- PAYPAL TRANS -->
              <div id="paypal" class="tabcontent" style="border-left: 1px solid #33b35a; border-right: 1px solid #33b35a; border-bottom: 1px solid #33b35a;">
                  <form action="save_payMethod.php" method="POST">
                  
                  <input value="Paypal" name="type" type="hidden" class="form-control" />
                  
                  <div class="form-group row" style="margin-top: 12px;">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-2">
                              <select name="nameProvider" class="form-control">
                                  <option>Paypal</option>
                              </select>
                              <small>Service Provider</small>
                          </div>
                          <div class="col-md-4">
                              <input name="accountName" class="form-control" type="email" />
                              <small>Account Email</small>
                          </div>
                          
                          <div class="col-md-6">
                          
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">https://paypal.me/</span></div>
                            <input name="accountNum_link" type="text" class="form-control" required="" />
                          </div>
                          <small>Link</small>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-sm-12" style="text-align: right;">
                      <button name="savePayMethod" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                      </div>
                                
                              
                              
                  </div>
                  
                  </form>
  
              </div>
              <!-- END PAYPAL TRANS -->

             <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">PAYMENT METHODS <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
 
                 
                

                
                <div class="table-responsive">
                <h5 style="margin-top: 18px;">BANK TRANSFER</h5>
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th>Bank</th>
                        <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Status</th>
                        <th></th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
               
                      $paymentMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE type='Bank Transfer' ORDER BY nameProvider ASC") or die(mysql_error());
                      while ($pm_row = $paymentMethod_query->fetch()) 
                      {
                        $catCtr+=1;
                        $pm_id=$pm_row['pm_id'];
                        ?>
           
                        <tr>
                        
                        <td><?php echo $catCtr; ?>. <?php echo $pm_row['nameProvider']; ?></td>
                        
                        <td><?php echo $pm_row['accountName']; ?></td>
                        
                        <td><?php echo $pm_row['accountNum_link']; ?></td>
                        
                        <td><?php echo $pm_row['status']; ?></td>
                        
                        <td>
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_payMethod<?php echo $pm_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_payMethod<?php echo $pm_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                        </td>
                        </tr>


                  <!-- edit category Modal -->
                  <div id="edit_payMethod<?php echo $pm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_payMethod.php" method="POST">
                      
                      <input value="<?php echo $pm_row['pm_id']; ?>" name="pm_id" type="hidden" />
                      <input value="Bank Transfer" name="type" type="hidden" class="form-control" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Payment Method</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <select name="nameProvider" class="form-control">
                                <option><?php echo $pm_row['nameProvider']; ?></option>
                                <option>Banco de Oro</option>
                                <option>Bank of the Phillipine Island</option>
                              </select>
                              <small>Bank</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <input name="accountName" class="form-control" value="<?php echo $pm_row['accountName']; ?>" />
                              <small>Account Name</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <input name="accountNum_link" class="form-control" value="<?php echo $pm_row['accountNum_link']; ?>" />
                              <small>Account Number</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <select name="status" class="form-control">
                                <option><?php echo $pm_row['status']; ?></option>
                                <option>Active</option>
                                <option>Inactive</option>
                              </select>
                              <small>Status</small>
                          </div>
                        </div>
                        
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updatePayMethod" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit category Modal -->
                  
                  
                        <!-- delete student Modal -->
                          <div id="delete_payMethod<?php echo $pm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_payMethod.php" method="POST">
                      
                              <input value="<?php echo $pm_row['pm_id']; ?>" name="pm_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Payment Method</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete method <?php echo $pm_row['accountName']; ?>?<br /><br />
                                <small>Classification: <?php echo $pm_row['type']; ?></small>
                                </h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deletePayMethod" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
                          
                            <?php } ?>
                            
                      </tbody>
                    </table>
                    
                    
                    <hr />
                    
                    
                    <h5>MONEY TRANSFER</h5>
                    <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th>Service Provider</th>
                        <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Status</th>
                        <th></th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
               
                      $paymentMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE type='Money Transfer' ORDER BY nameProvider ASC") or die(mysql_error());
                      while ($pm_row = $paymentMethod_query->fetch()) 
                      {
                        $catCtr+=1;
                        $pm_id=$pm_row['pm_id'];
                        ?>
           
                        <tr>
                        
                        <td><?php echo $catCtr; ?>. <?php echo $pm_row['nameProvider']; ?></td>
                        
                        <td><?php echo $pm_row['accountName']; ?></td>
                        
                        <td><?php echo $pm_row['accountNum_link']; ?></td>
                        
                        <td><?php echo $pm_row['status']; ?></td>
                        
                        <td>
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_payMethod<?php echo $pm_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_payMethod<?php echo $pm_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                        </td>
                        </tr>


                  <!-- edit category Modal -->
                  <div id="edit_payMethod<?php echo $pm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_payMethod.php" method="POST">
                      
                      <input value="<?php echo $pm_row['pm_id']; ?>" name="pm_id" type="hidden" />
                      <input value="Money Transfer" name="type" type="hidden" class="form-control" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Payment Method</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <select name="nameProvider" class="form-control">
                                <option><?php echo $pm_row['nameProvider']; ?></option>
                                <option>Palawan Express</option>
                              </select>
                              <small>Service Provider</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <input name="accountName" class="form-control" value="<?php echo $pm_row['accountName']; ?>" />
                              <small>Account Name</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <input name="accountNum_link" class="form-control" value="<?php echo $pm_row['accountNum_link']; ?>" />
                              <small>Account Number</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <select name="status" class="form-control">
                                <option><?php echo $pm_row['status']; ?></option>
                                <option>Active</option>
                                <option>Inactive</option>
                              </select>
                              <small>Status</small>
                          </div>
                        </div>
                        
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updatePayMethod" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit category Modal -->
                  
                  
                        <!-- delete student Modal -->
                          <div id="delete_payMethod<?php echo $pm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_payMethod.php" method="POST">
                      
                              <input value="<?php echo $pm_row['pm_id']; ?>" name="pm_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Payment Method</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete method <?php echo $pm_row['accountName']; ?>?<br /><br />
                                <small>Classification: <?php echo $pm_row['type']; ?></small>
                                </h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deletePayMethod" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
                          
                            <?php } ?>
                            
                      </tbody>
                    </table>
                    
                    
                    <hr />
                    
                    
                    <h5>WALLET APP</h5>
                    <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th>Application</th>
                        <th>Account Name</th>
                        <th>Mobile Number</th>
                        <th>Status</th>
                        <th></th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
               
                      $paymentMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE type='Wallet App' ORDER BY nameProvider ASC") or die(mysql_error());
                      while ($pm_row = $paymentMethod_query->fetch()) 
                      {
                        $catCtr+=1;
                        $pm_id=$pm_row['pm_id'];
                        ?>
           
                        <tr>
                        
                        <td><?php echo $catCtr; ?>. <?php echo $pm_row['nameProvider']; ?></td>
                        
                        <td><?php echo $pm_row['accountName']; ?></td>
                        
                        <td><?php echo $pm_row['accountNum_link']; ?></td>
                        
                        <td><?php echo $pm_row['status']; ?></td>
                        
                        <td>
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_payMethod<?php echo $pm_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_payMethod<?php echo $pm_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                        </td>
                        </tr>


                  <!-- edit category Modal -->
                  <div id="edit_payMethod<?php echo $pm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_payMethod.php" method="POST">
                      
                      <input value="<?php echo $pm_row['pm_id']; ?>" name="pm_id" type="hidden" />
                      <input value="Wallet App" name="type" type="hidden" class="form-control" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Payment Method</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <select name="nameProvider" class="form-control">
                                <option><?php echo $pm_row['nameProvider']; ?></option>
                                <option>Banco de Oro</option>
                                <option>Bank of the Phillipine Island</option>
                              </select>
                              <small>Application</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <input name="accountName" class="form-control" value="<?php echo $pm_row['accountName']; ?>" />
                              <small>Account Name</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <input name="accountNum_link" class="form-control" value="<?php echo $pm_row['accountNum_link']; ?>" />
                              <small>Mobile Number</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <select name="status" class="form-control">
                                <option><?php echo $pm_row['status']; ?></option>
                                <option>Active</option>
                                <option>Inactive</option>
                              </select>
                              <small>Status</small>
                          </div>
                        </div>
                        
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updatePayMethod" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit category Modal -->
                  
                  
                        <!-- delete student Modal -->
                          <div id="delete_payMethod<?php echo $pm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_payMethod.php" method="POST">
                      
                              <input value="<?php echo $pm_row['pm_id']; ?>" name="pm_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Payment Method</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete method <?php echo $pm_row['accountName']; ?>?<br /><br />
                                <small>Classification: <?php echo $pm_row['type']; ?></small>
                                </h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deletePayMethod" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
                          
                            <?php } ?>
                            
                      </tbody>
                    </table>
                    
                    
                    <hr />
                    
                    
                    <h5>PAYPAL</h5>
                    <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th>Account Email</th>
                        <th>Payment Link</th>
                        <th>Status</th>
                        <th></th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
               
                      $paymentMethod_query = $conn->query("SELECT * FROM tbl_payment_methods WHERE type='Paypal' ORDER BY nameProvider ASC") or die(mysql_error());
                      while ($pm_row = $paymentMethod_query->fetch()) 
                      {
                        $catCtr+=1;
                        $pm_id=$pm_row['pm_id'];
                        ?>
           
                        <tr>
                        
                        <td><?php echo $pm_row['accountName']; ?></td>
                        
                        <td><a href="<?php echo $pm_row['accountNum_link']; ?>" target="_blank" style="text-decoration-line: none; cursor: pointer;" class="text-info"><i class="fa fa-external-link"></i> <?php echo $pm_row['accountNum_link']; ?></a></td>
                        
                        <td><?php echo $pm_row['status']; ?></td>
                        
                        <td>
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_payMethod<?php echo $pm_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_payMethod<?php echo $pm_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                        </td>
                        </tr>


                  <!-- edit category Modal -->
                  <div id="edit_payMethod<?php echo $pm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_payMethod.php" method="POST">
                      
                      <input value="<?php echo $pm_row['pm_id']; ?>" name="pm_id" type="hidden" />
                      <input value="Paypal" name="type" type="hidden" class="form-control" />
                      <input value="<?php echo $pm_row['nameProvider']; ?>" name="nameProvider" type="hidden" class="form-control" />
                        
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Payment Method</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <input name="accountName" class="form-control" value="<?php echo $pm_row['accountName']; ?>" />
                              <small>Account Email</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                          
                          <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text" style="font-size: medium;"><br />https://paypal.me/</span></div>
                            <input name="accountNum_link" type="text" class="form-control" required="" value="<?php echo substr($pm_row['accountNum_link'], 18); ?>" />
                          </div>
                          <small>Payment Link</small>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-bottom: 12px;">
                          <div class="col-md-12">
                              <select name="status" class="form-control">
                                <option><?php echo $pm_row['status']; ?></option>
                                <option>Active</option>
                                <option>Inactive</option>
                              </select>
                              <small>Status</small>
                          </div>
                        </div>
                        
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updatePayMethod" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit category Modal -->
                  
                  
                        <!-- delete student Modal -->
                          <div id="delete_payMethod<?php echo $pm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_payMethod.php" method="POST">
                      
                              <input value="<?php echo $pm_row['pm_id']; ?>" name="pm_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Payment Method</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>
                                Are you sure you want to delete method <?php echo $pm_row['accountName']; ?>?<br /><br />
                                <small>Classification: <?php echo $pm_row['type']; ?></small>
                                </h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deletePayMethod" type="submit" class="btn btn-danger">Yes</button>
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
