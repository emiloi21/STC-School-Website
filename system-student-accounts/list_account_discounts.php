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
            <li class="breadcrumb-item active">Accounts - List of Discounts - <?php echo $get_dept; ?></li>
             
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
              

             <!-- Preparatory     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <?php
                  if($_GET['dept']!=''){
                  if($activeSchoolYear===$data_src_sy){ ?>
                  <a data-toggle="modal" data-target="#add_discount" href="#" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                  <?php }else{ ?>
                  <a href="#" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-default"><i class="fa fa-plus"></i></a>
                  <?php } } ?>&nbsp;
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">LIST OF DISCOUNT <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
              
              <div style="margin-top: 12px;"></div>
              
                <div class="tab" style="margin-top: 8px; margin-bottom: 12px;">
              
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_account_discounts.php?dept=Grade School" class="tablinks active" style="font-weight: bolder;">Grade School</a>
                <?php }else{?>
                <a title="Grade School student list" href="list_account_discounts.php?dept=Grade School" class="tablinks">Grade School</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Junior High School"){ ?>
                <a title="Junior High School student list" href="list_account_discounts.php?dept=Junior High School" class="tablinks active" style="font-weight: bolder;">JHS</a>
                <?php }else{?>
                <a title="Junior High School student list" href="list_account_discounts.php?dept=Junior High School" class="tablinks">JHS</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Senior High School"){ ?>
                <a title="Senior High School student list" href="list_account_discounts.php?dept=Senior High School" class="tablinks active" style="font-weight: bolder;">SHS</a>
                <?php }else{?>
                <a title="Senior High School student list" href="list_account_discounts.php?dept=Senior High School" class="tablinks">SHS</a>
                <?php } ?>
           
                <?php if($_GET['dept']=="College"){ ?>
                <a title="College student list" href="list_account_discounts.php?dept=College" class="tablinks active" style="font-weight: bolder;">College</a>
                <?php }else{?>
                <a title="College student list" href="list_account_discounts.php?dept=College" class="tablinks">College</a>
                <?php } ?>
                
                </div>
 
                
                <h3 style="margin: 16px 16px 16px 16px;">
                <strong>
                <?php
 
                if($_GET['dept']===''){
                    echo "Select Department";
                }else{
                    echo $_GET['dept'];
                }
                
                
                ?>
                </strong>
                </h3>
                 
                
                <?php include('list_discount_table.php'); ?>
               
               </div>
               </div>
                   
                </div>
                
              </div>
              <!-- kinder End-->
     
                  <!-- add DISCOUNTS Modal -->
                  <div id="add_discount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Add Discount</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="tab2">
                              <a class="tablinks2 active" onclick="openCity2(event, 'fix_amt')">Fixed Amount</a>
                              <a class="tablinks2" onclick="openCity2(event, 'percentage')">Percentage</a>
                            </div>
                            
                            <div id="fix_amt" class="tabcontent" style="display: block;">
                            <form action="save_add_discount.php?dept=<?php echo $_GET['dept']; ?>&classification=Fixed Amount" method="POST">
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Account Code</label>
                              <div class="col-sm-9">
                                <input name="account_code" type="text" class="form-control" placeholder="Enter account code..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Title</label>
                              <div class="col-sm-9">
                                <input name="description" type="text" class="form-control" placeholder="Enter discount title..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Amount</label>
                              <div class="col-sm-9">
                                <input name="amount" type="number" min="0.50" max="100000.00" step="0.50" class="form-control" placeholder="Enter amount..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Type</label>
                              <div class="col-sm-9">
                                <select name="type" class="form-control">
                                <option value="Receivable">-- Select type --</option>
                                <option value="Payable">Payable by the school</option>
                                <option value="Receivable">Receivable from outside entity</option>
                                </select>
                              </div>
                            </div>
                            
                            <hr />
                            <div class="form-group row">
                              <div class="col-sm-12" style="text-align: center;">
                                <button name="addDiscounts" type="submit" class="btn btn-primary">Add</button>
                              </div>
                            </div>
                            
                            
                            </form>
                            </div>
                            
                            <div id="percentage" class="tabcontent">
                            <form action="save_add_discount.php?dept=<?php echo $_GET['dept']; ?>&classification=Percentage" method="POST">
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Account Code</label>
                              <div class="col-sm-9">
                                <input name="account_code" type="text" class="form-control" placeholder="Enter account code..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Title</label>
                              <div class="col-sm-9">
                                <input name="description" type="text" class="form-control" placeholder="Enter discount title..." />
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Percentage</label>
                              <div class="col-sm-9">
                                  <input name="percentage" type="number" min="0.01" max="1.00" step="0.01" class="form-control" placeholder="Enter percentage..." />
                                  <small>Decimal Format</small>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Type</label>
                              <div class="col-sm-9">
                                <select name="type" class="form-control">
                                <option value="Receivable">-- Select type --</option>
                                <option value="Payable">Payable by the school</option>
                                <option value="Receivable">Receivable from outside entity</option>
                                </select>
                              </div>
                            </div>
                            
                            <hr />
                            <div class="form-group row">
                              <div class="col-sm-12" style="text-align: center;">
                                <button name="addDiscounts2" type="submit" class="btn btn-primary">Add</button>
                              </div>
                            </div>
                            
                            
                            </form>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                        </div>
                        
                        
                      </div>
                    </div>
                  </div>
                  <!-- end add discount Modal -->
 
            </div>
            
          </div>
        
              
      </section>
     
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
 
  </body>
</html>
