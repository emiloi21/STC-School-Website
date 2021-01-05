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
            <li class="breadcrumb-item active">Registration Form - <?php echo $studData_row['dept']; ?></li>
          </ul>
          
        </div>
      </div>
      
      <?php include('quick_count.php'); ?>
      
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <div class="row">
          <form action="save_userInfo.php" method="POST" class="col-lg-12">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Personal Information</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['fname']; ?>" name="fname" class="form-control form-control-sm" placeholder="Enter First Name" required="" />
                             <small>First Name</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['mname']; ?>" name="mname" class="form-control form-control-sm" placeholder="Enter Middle Name" />
                             <small>Middle Name</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['lname']; ?>" name="lname" class="form-control form-control-sm" placeholder="Enter Last Name" required="" />
                             <small>Last Name</small>
                          </div>
                          
                          <div class="col-md-2">
                              <select name="suffix" class="form-control form-control-sm">
                              <option><?php echo $studData_row['suffix']; ?></option>
                              <option>JR</option>
                              <option>SR</option>
                              <option>III</option>
                              </select>
                              <small>Suffix</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    <?php
                    
                    if($studData_row['bdMM']==='01'){ $wordMM="Jan"; }
                    elseif($studData_row['bdMM']==='02'){ $wordMM="Feb"; }
                    elseif($studData_row['bdMM']==='03'){ $wordMM="Mar"; }
                    elseif($studData_row['bdMM']==='04'){ $wordMM="Apr"; }
                    elseif($studData_row['bdMM']==='05'){ $wordMM="May"; }
                    elseif($studData_row['bdMM']==='06'){ $wordMM="Jun"; }
                    elseif($studData_row['bdMM']==='07'){ $wordMM="Jul"; }
                    elseif($studData_row['bdMM']==='08'){ $wordMM="Aug"; }
                    elseif($studData_row['bdMM']==='09'){ $wordMM="Sep"; }
                    elseif($studData_row['bdMM']==='10'){ $wordMM="Oct"; }
                    elseif($studData_row['bdMM']==='11'){ $wordMM="Nov"; }
                    elseif($studData_row['bdMM']==='12'){ $wordMM="Dec"; }
                    else{ $wordMM="-"; }
                    ?>
                    <div class="form-group row">
                      
                      <div class="col-sm-12">
                        <div class="row">
                        <div class="col-md-12">
                        <label>Date of Birth</label>
                        </div>
                          <div class="col-md-2">
                             <select name="bdMM" class="form-control form-control-sm">
                              <option value="<?php echo $studData_row['bdMM']; ?>"><?php echo $wordMM; ?></option>
                              <option value="01">Jan</option>
                              <option value="02">Feb</option>
                              <option value="03">Mar</option>
                              <option value="04">Apr</option>
                              <option value="05">May</option>
                              <option value="06">Jun</option>
                              <option value="07">Jul</option>
                              <option value="08">Aug</option>
                              <option value="09">Sep</option>
                              <option value="10">Oct</option>
                              <option value="11">Nov</option>
                              <option value="12">Dec</option>
                              </select>
                             <small>Month</small>
                          </div>
                          
                          <div class="col-md-2">
                             <select name="bdDD" class="form-control form-control-sm">
                              <option><?php echo $studData_row['bdDD']; ?></option>
                              <option>01</option>
                              <option>02</option>
                              <option>03</option>
                              <option>04</option>
                              <option>05</option>
                              <option>06</option>
                              <option>07</option>
                              <option>08</option>
                              <option>09</option>
                              <option>10</option>
                              <option>11</option>
                              <option>12</option>
                              <option>13</option>
                              <option>14</option>
                              <option>15</option>
                              <option>16</option>
                              <option>17</option>
                              <option>18</option>
                              <option>19</option>
                              <option>20</option>
                              <option>21</option>
                              <option>22</option>
                              <option>23</option>
                              <option>24</option>
                              <option>25</option>
                              <option>26</option>
                              <option>27</option>
                              <option>28</option>
                              <option>29</option>
                              <option>30</option>
                              <option>31</option>
                              </select>
                             <small>Day</small>
                          </div>
                          
                          <div class="col-md-2">
                             <input value="<?php echo $studData_row['bdYYYY']; ?>" name="bdYYYY" class="form-control form-control-sm" placeholder="Enter Birth Year" required="" />
                             <small>Year</small>
                          </div>
                          
                          <div class="col-md-6">
                             <input value="<?php echo $studData_row['birthPlace']; ?>" name="birthPlace" list="search_bplace" class="form-control form-control-sm" required="" />
                             
                             <datalist id="search_bplace">
                                    <?php
                                    
                                    $bplace_list_query = $conn->query("SELECT DISTINCT birthPlace FROM students");
                                    while($bp_list_row = $bplace_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $bp_list_row['birthPlace']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Place of Birth</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      
                      <div class="col-sm-12">
                        <div class="row">
                           
                          
                          <div class="col-md-3">
                              <select name="sex" class="form-control form-control-sm">
                              <option><?php if($studData_row['sex']!='-'){ echo $studData_row['sex']; }else{ echo "Male"; } ?></option>
                              <option>Male</option>
                              <option>Female</option>
                              </select>
                              <small>Sex</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['age']; ?>" type="number" min="5" max="50" name="age" class="form-control form-control-sm" />
                             <small>Age</small>
                          </div>
                          
                          <div class="col-md-6">
                             <input value="<?php echo $studData_row['religion']; ?>" name="religion" list="search_religion" class="form-control form-control-sm" />
                             <datalist id="search_religion">
                                    <?php
                                    
                                    $religion_list_query = $conn->query("SELECT DISTINCT religion FROM students");
                                    while($rel_list_row = $religion_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $rel_list_row['religion']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Religion</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-6">
                             <input value="<?php echo $studData_row['address']; ?>" name="address" list="search_home_add" class="form-control form-control-sm" placeholder="Enter Home Address" required="" />
                             <datalist id="search_home_add">
                                    <?php
                                    
                                    $home_add_list_query = $conn->query("SELECT DISTINCT address FROM students");
                                    while($home_add_list_row = $home_add_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $home_add_list_row['address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Home Address</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['contact_num']; ?>" name="contact_num" class="form-control form-control-sm" required="" />
                             <small>Contact Number</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['email']; ?>" name="email" class="form-control form-control-sm" readonly="" />
                             <small>Email Address</small>
                          </div>
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['last_school']; ?>" name="last_school" list="search_last_school" class="form-control form-control-sm" placeholder="Name of school" required="" />
                             
                             <datalist id="search_last_school">
                                    <?php
                                    
                                    $last_school_list_query = $conn->query("SELECT DISTINCT last_school FROM students");
                                    while($last_school_list_row = $last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $last_school_list_row['last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             
                             <small>Last School Attended</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['last_school_sy']; ?>" name="last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['last_school_address']; ?>" name="last_school_address" list="search_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_last_school_address">
                                    <?php
                                    
                                    $last_school_address_list_query = $conn->query("SELECT DISTINCT last_school_address FROM students");
                                    while($last_school_address_list_row = $last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $last_school_address_list_row['last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
      
                </div>
              </div>
            </div>
            
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Parent's Information</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                        <div class="col-md-12">
                        Father's Info
                        </div>
                          <div class="col-md-8">
                             <input value="<?php echo $studData_row['father_name']; ?>" name="father_name" class="form-control form-control-sm" placeholder="Enter father's name" required="" />
                             <small>Fullname</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['father_occupation']; ?>" name="father_occupation" class="form-control form-control-sm" placeholder="Enter occupation" required="" />
                             <small>Occupation</small>
                          </div>
                          
                          <div class="col-md-8">
                             <input value="<?php echo $studData_row['father_address']; ?>" name="father_address" list="search_father_address" class="form-control form-control-sm" placeholder="Enter address" required="" />
                             <datalist id="search_father_address">
                                    <?php
                                    
                                    $father_address_list_query = $conn->query("SELECT DISTINCT father_address FROM students");
                                    while($father_address_list_row = $father_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $father_address_list_row['father_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Address</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['father_contact']; ?>" name="father_contact" class="form-control form-control-sm" placeholder="Enter contact number" required="" />
                             <small>Contact Number</small>
                          </div>
                          
                        <div class="line"></div>
                        
                        <div class="col-md-12">
                        Mother's Info
                        </div>
                          <div class="col-md-8">
                             <input value="<?php echo $studData_row['mother_name']; ?>" name="mother_name" class="form-control form-control-sm" placeholder="Enter mother's name" required="" />
                             <small>Fullname (Maiden Name)</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['mother_occupation']; ?>" name="mother_occupation" class="form-control form-control-sm" placeholder="Enter occupation" required="" />
                             <small>Occupation</small>
                          </div>
                          
                          <div class="col-md-8">
                             <input value="<?php echo $studData_row['mother_address']; ?>" name="mother_address" list="search_mother_address" class="form-control form-control-sm" placeholder="Enter address" required="" />
                             <datalist id="search_mother_address">
                                    <?php
                                    
                                    $mother_address_list_query = $conn->query("SELECT DISTINCT mother_address FROM students");
                                    while($mother_address_list_row = $mother_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $mother_address_list_row['mother_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Address</small>
                          </div>
                          
                          <div class="col-md-4">
                             <input value="<?php echo $studData_row['mother_contact']; ?>" name="mother_contact" class="form-control form-control-sm" placeholder="Enter contact number" required="" />
                             <small>Contact Number</small>
                          </div>
                          
                        <div class="line"></div>
                        
                          <div class="col-md-12">
                             <input value="<?php echo $studData_row['parents_email']; ?>" name="parents_email" type="email" class="form-control form-control-sm" placeholder="Enter parent's email address" required="" />
                             <small>Parent's Email Address</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
  
                </div>
              </div>
            </div>
            
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Guardian's Information <small>(If living with the guardian)</small></h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-md-6">
                             <input value="<?php echo $studData_row['guardian_name']; ?>" name="guardian_name" class="form-control form-control-sm" placeholder="Enter fullname" />
                             <small>Fullname</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['guardian_contact']; ?>" name="guardian_contact" class="form-control form-control-sm" placeholder="Enter contact number" />
                             <small>Contact Number</small>
                          </div>
                          
                      
                          
                          <div class="col-md-3">
                              <select name="guardian_relation" class="form-control form-control-sm">
                              <option><?php echo $studData_row['guardian_relation']; ?></option>
                              <option>Parent</option>
                              <option>Step Father</option>
                              <option>Step Mother</option>
                              <option>Relative</option>
                              <option>Non-Relative</option>
                              </select>
                              <small>Relation</small>
                          </div>
                        </div>
 
                      </div>
                    </div>
                    <?php if($studData_row['status']==='For Payment'){ ?>
                    
                    <input name="assessment_id" value="<?php echo $studData_row['assessment_id']; ?>" type="hidden" />
                    
                    <?php if($studData_row['status']!='Enrolled'){ ?>
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <div class="col-12 text-center">
                        <button name="updateInfoElem" type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                    
                    <?php } } ?>
                </div>
              </div>
            </div>
            
            <?php if($studData_row['status']==='Setup' OR $studData_row['status']==='For Application Assessment' OR $studData_row['status']==='For Accounts Assessment'){ ?>
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Payment Plan Selection</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <div class="row">
                                
                                <?php
                                
                                
                                
                                    
                                if($studData_row['status']==='For Accounts Assessment'){
                                    $acc_assess_query = $conn->query("SELECT * FROM tbl_accounts_assessments WHERE assessment_id='$studData_row[assessment_id]'") or die(mysql_error());
                                
                                }else{
                                    $acc_assess_query = $conn->query("SELECT * FROM tbl_accounts_assessments WHERE gradeLevel='$studData_row[gradeLevel]' AND strand='$studData_row[strand]' AND major='$studData_row[major]' AND schoolYear='$activeSchoolYear'") or die(mysql_error());
                                
                                }
                                if($acc_assess_query->rowCount()>0){
                                while($acc_assess_row = $acc_assess_query->fetch()){
                                    
                                ?>
                                <?php
                                if($studData_row['status']==='For Accounts Assessment'){ ?>
                                    <div class="col-md-12">
                                <?php }else{ ?>
                                    <div class="col-md-6">
                                <?php } ?>
                                
                                <div class="table-responsive">
                                <table class="table table-bordered" style="width:100%">
                                
                                <thead>
                                <tr>
                                <th colspan="2" <?php if($acc_assess_row['assessment_id']===$studData_row['assessment_id']){ ?> style="background-color: #218838;" <?php } ?>>

                                <?php if($acc_assess_row['assessment_id']===$studData_row['assessment_id']){ ?>
                                
                                <input name="assessment_id" id="assess<?php echo $acc_assess_row['assessment_id']; ?>" type="radio" value="<?php echo $acc_assess_row['assessment_id']; ?>" required="" checked="" />
                                
                                <?php }else{ ?>
                                
                                <input name="assessment_id" id="assess<?php echo $acc_assess_row['assessment_id']; ?>" type="radio" value="<?php echo $acc_assess_row['assessment_id']; ?>" required="" />
                                
                                <?php } ?>
                                
                                <label for="assess<?php echo $acc_assess_row['assessment_id']; ?>"><?php echo $acc_assess_row['description']; ?></label>
                                
                                <?php if($acc_assess_row['assessment_id']===$studData_row['assessment_id']){ ?>
                                <div class="badge badge-warning">Selected</div>
                                <?php } ?>
                                
                                </th>
                                </tr>
                                </thead>
                                      
                                      <tbody>
                                      
                                      <?php
                                      $payCtr=0;
                                      $totalUponEnroll=0;
                                      $totalWholeYear=0;
                                      $tbl_assessPayable_query = $conn->query("SELECT DISTINCT category_id FROM tbl_assessment_payables WHERE assessment_id='$acc_assess_row[assessment_id]' ORDER BY category_id ASC") or die(mysql_error());
                                      while ($tbl_assessPayable_row = $tbl_assessPayable_query->fetch()) 
                                      {
                                        $payCtr+=1;
                                        $category_id=$tbl_assessPayable_row['category_id'];
                                      
                                        $tbl_accounts_categories_query = $conn->query("SELECT * FROM tbl_accounts_categories WHERE category_id='$category_id'") or die(mysql_error());
                                        $tbl_accounts_row = $tbl_accounts_categories_query->fetch();
                                        
                                      ?>
                                        
                                        <tr> 
                                        
                                       
                                        <?php
                                        
                                        $tbl_accounts_categories_query = $conn->query("SELECT category_id, description, totalAmount FROM tbl_accounts_categories WHERE category_id='$tbl_assessPayable_row[category_id]'") or die(mysql_error());
                                        $tbl_accounts_row = $tbl_accounts_categories_query->fetch();
                                        
                                        $totalWholeYear+=$tbl_accounts_row['totalAmount'];
                                        
                                        ?>
                                        
                                        <td colspan="2" style="padding: 0px 2px 0px 2px;">
                                        <table style="margin: 0px;">
                                        
                                        <thead>
                                        <tr>
                                        <th style="padding: 4px; background-color: #17a2b8;"><?php echo $tbl_accounts_row['description']; ?></th>
                                        <th style="padding: 4px; background-color: #17a2b8; width: 35%; text-align: right;">
                                        <?php echo number_format($tbl_accounts_row['totalAmount'], 2); ?>
                                        </th>
                                        </tr>
                                        <?php
                                        $tbl_accounts_particulars_query = $conn->query("SELECT * FROM tbl_accounts_particulars WHERE category_id='$tbl_assessPayable_row[category_id]' ORDER BY description ASC") or die(mysql_error());
                                        ?>
                                        
                                       
                                        </thead>
                                        
                                        <?php
                                        if($tbl_accounts_particulars_query->rowCount()>1){
                                        while ($tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch())
                                        {
                                        
                                        //payment_term
                                        $pay_terms_query = $conn->query("SELECT * FROM tbl_payment_terms WHERE pterm_id='$tbl_accounts_particulars_row[paymentTerm]'") or die(mysql_error());
                                        $pterms_row = $pay_terms_query->fetch();
                                        ?>
                                        
                                        <tr>
                                        <td style="background-color: white;">
                                        
                                        <?php
                                        
                                        if($pterms_row['payment_term']==='Monthly'){
                                            
                                            $totalUponEnroll+=($tbl_accounts_particulars_row['amount']/$pterms_row['month_set_up']);
                                            
                                        }else{
                                            if($pterms_row['payment_term']==='Full' OR $pterms_row['payment_term']==='1st Adjustment'){
                                                $totalUponEnroll+=$tbl_accounts_particulars_row['amount'];
                                                
                                            }elseif($pterms_row['payment_term']==='2nd Adjustment' OR $pterms_row['payment_term']==='3rd Adjustment'){
                                                $totalUponEnroll+=0;
                                                
                                            }
                                            
                                        }
                                        
                                        echo $tbl_accounts_particulars_row['description'];
                                        
                                            if($pterms_row['payment_term']==='Monthly'){
                                                
                                            echo ' ('.number_format(($tbl_accounts_particulars_row['amount']/$pterms_row['month_set_up']), 2).' * '.$pterms_row['month_set_up'].' months)';
                                            
                                            }
                                        ?>
                                        
                                        </td>
                                        
                                        <td style="background-color: white; text-align: right;">
                                        <?php echo number_format($tbl_accounts_particulars_row['amount'], 2); ?>
                                        </td>
                                        
                                        </tr>
                                        
                                        <?php } }else{
                                        
                                        $tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch();
                                        
                                        //payment_term
                                        $pay_terms_query = $conn->query("SELECT * FROM tbl_payment_terms WHERE pterm_id='$tbl_accounts_particulars_row[paymentTerm]'") or die(mysql_error());
                                        $pterms_row = $pay_terms_query->fetch();
                                        
                                        
                                        if($pterms_row['payment_term']==='Monthly'){
                                            
                                            $totalUponEnroll+=($tbl_accounts_particulars_row['amount']/$pterms_row['month_set_up']);
                                            
                                        }else{
                                            if($pterms_row['payment_term']==='Full' OR $pterms_row['payment_term']==='1st Adjustment'){
                                                $totalUponEnroll+=$tbl_accounts_particulars_row['amount'];
                                                
                                            }elseif($pterms_row['payment_term']==='2nd Adjustment' OR $pterms_row['payment_term']==='3rd Adjustment'){
                                                $totalUponEnroll+=0;
                                                
                                            }
                                            
                                        }
                                        } ?>
                                        
                                       </table>
                                        </td>
                                        
                                        </tr> 
                                        
                                        <?php } ?>
                                       
                                      </tbody>
                                      
                                 <tfoot>
                                 <tr>
                                 <th style="font-size: small;">Net Upon Enrollment</th>
                                 <th style="text-align: right; width: 35%; padding-right: 14px;"><?php echo number_format($totalUponEnroll, 2); ?></th>
                                 </tr>
                                </tfoot>
                                
                                <tfoot>
                                 <tr>
                                 <th style="font-size: small; background-color: #17a2b8;">Net Whole Year</th>
                                 <th style="text-align: right; width: 35%; padding-right: 14px; background-color: #17a2b8;"><?php echo number_format($totalWholeYear, 2); ?></th>
                                 </tr>
                                </tfoot>
                                
                                </table>
                                </div>
                                </div>
                                
                                <?php } }else{ ?>
                                <input name="assessment_id"  type="hidden" value="0" />
                                <h5 style="margin-left: 12px;" class="text-danger">No Payment Plan available to select. Please contact the registrar for inquiries.</h5>
                                <?php } ?>
                        </div>
                      </div>
                    </div>
 
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-12 text-center">
                        <button name="updateInfoElem" type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <?php } ?>
            </form>
          </div>
        </div>
      </section>
      
      <?php include('footer.php'); ?>
    </div>
    
    <?php include('js_scripts.php'); ?>
  </body>
</html>