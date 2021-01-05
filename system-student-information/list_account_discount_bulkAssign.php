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
            <li class="breadcrumb-item active">Accounts - List of Receivable - <?php echo $get_dept; ?></li>
             
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
              

             <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">BULK DISCOUNT ASSIGNING <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
              
              <div style="margin-top: 12px;"></div>
                
                <?php
                $acct_discount_id=$_GET['acct_discount_id'];
                
                $dCountData_query = $conn->query("SELECT * FROM tbl_accounts_discount WHERE acct_discount_id='$acct_discount_id'") or die(mysql_error());
                $dCountData_row = $dCountData_query->fetch();
                
                ?>
                
                <div class="row">
                
                <div class="col-lg-3">
                <h5><?php
 
                if($_GET['gradeLevel']===''){
                    echo "Select Grade Level";
                }else{ 
                    
                    if($_GET['dept']=="Grade School" OR $_GET['dept']=="Junior High School")
                    {
                        echo $_GET['gradeLevel'];
                    }elseif($_GET['dept']=="Senior High School"){
                        echo $_GET['gradeLevel']." - ".$_GET['strand'];
                    }else{
                        echo $_GET['gradeLevel']." - ".$_GET['strand'].' '.$_GET['major'] ;
                    }
                    
                }
                
                
                ?></h5><small>Class</small>
                </div>
                
                <div class="col-lg-3">
                <h5><?php echo $dCountData_row['description']; ?></h5><small>Discount Details</small>
                </div>
                
                <div class="col-lg-3">
                <h5><?php echo $dCountData_row['amount']; ?></h5><small>Amount</small>
                </div>
                
                <div class="col-lg-3">
                <h5><?php echo $dCountData_row['type']; ?></h5><small>Type</small>
                </div>
                
                </div>
                
                <hr />
                
                <form method="POST" action="save_add_discount.php?acct_discount_id=<?php echo $acct_discount_id; ?>&dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>">
                
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Account Deduction</label>
                    <div class="col-sm-9">
                        <select name="deduct_category_id" class="form-control">
                        <option value="0">-- Select payable --</option>
                                        
                        <?php
                        
                        $listCateg_query = $conn->prepare("SELECT * FROM tbl_accounts_categories WHERE gradeLevel = :gradeLevel AND strand = :strand");
                        $listCateg_query->execute(['gradeLevel' => $_GET['gradeLevel'], 'strand' => $_GET['strand']]);
                        while($listCateg_row = $listCateg_query->fetch()){ ?>
                                        
                        <option value="<?php echo $listCateg_row['category_id']; ?>"><?php echo $listCateg_row['description'].' ( '.$listCateg_row['totalAmount'].' )'; ?></option>
                                        
                        <?php } ?>
                                        
                        </select> 
                    </div>
                </div>
                            
                <input type="hidden" name="type" value="<?php echo $dCountData_row['type']; ?>" />
                
                <div class="table-responsive">
                
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th style="width: 40px;"><input type="checkbox" id="checkAll" /> All</th>
                        <th># Student</th>
                        <th>Course Details</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
                      
                      $studData_query = $conn->query("SELECT * FROM students WHERE gradeLevel='$_GET[gradeLevel]' AND strand='$_GET[strand]' AND major='$_GET[major]' AND status='For Assessment'") or die(mysql_error());
                      while ($studData_row = $studData_query->fetch()) 
                      {
                        
                        $reg_id=$studData_row['reg_id'];
                        $catCtr+=1;
                      
                      if($studData_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($studData_row['suffix']=='-') { $suffix=''; }else{ $suffix=$studData_row['suffix'].' '; }
                            
                            $finalMName=$suffix.substr($studData_row['mname'], 0, 1).'.';
                        } ?>
                        
                        
                        <tr>
                        
                        <td style="width: 10px;"><input type="checkbox" id="checkAll" name="studReg_id[]" value="<?php echo $reg_id; ?>" /></td>
                        
                        <td>
                        <?php echo $catCtr.'. '.$studData_row['lname'].", ".$studData_row['fname']." ".$finalMName; ?><br />
                       
                        </td>
                        
                        <td>
                        <?php
                        
                            if($_GET['dept']=="Grade School" OR $_GET['dept']=="Junior High School")
                            {
                                echo $_GET['gradeLevel'];
                            }elseif($_GET['dept']=="Senior High School"){
                                echo $_GET['gradeLevel']." - ".$_GET['strand'];
                            }else{
                                echo $_GET['gradeLevel']." - ".$_GET['strand'].' '.$_GET['major'] ;
                            }
                            
                        ?>
                        </td>
                        
                        </tr>
                        
                        <?php } ?>
                            
                      </tbody>
                    </table>
                    </div>
                    
                    <hr />
                    
                    <button name="assignDiscountBulk" class="btn btn-primary btn-sm pull-right" style="margin: 12px 4px 16px 12px;"><i class="fa fa-save"></i> ASSIGN DISCOUNT</button>
                    
                    </form>
                    
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
