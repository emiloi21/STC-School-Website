<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
    <?php

    if(isset($_POST['search'])){
    
        $payment_type=$_POST['payment_type'];
        
        if($payment_type==="Non-Student Fee"){
            
        }elseif($payment_type==="Book Fee"){
            
            $searched=$_POST['searchStudent'];
            $schoolYear=$_POST['schoolYear'];
            $semester=$_POST['semester'];
 
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
                
                        $stud_query = $conn->query("SELECT * FROM tbl_book_students WHERE student_id='$searched'") or die(mysql_error());
                        $payee_row = $stud_query->fetch();
                 
                        $reg_id=$payee_row['reg_id'];
                        
                        if($payee_row['mname']=='' OR $payee_row['mname']=='-')
                        {
                            $finalMName='';
                                
                        }else{
                                
                            if($payee_row['suffix']=='-') { $suffix=''; }else{ $suffix=$payee_row['suffix'].' '; }
                                
                            $finalMName=$suffix.$payee_row['mname'];
                        }
                        
                        
                        $chk_order_query = $conn->query("SELECT reg_id FROM tbl_book_payables WHERE reg_id='$reg_id'") or die(mysql_error());
                        $chl_order_row = $chk_order_query->fetch();
                        
                        if($payee_row['status']==='Verified'){
                            
                            if($chk_order_query->rowCount()>0){
                            
                            ?>
                            <script>
                            window.location='cashiering_system_load_particulars.php?reg_id=<?php echo $payee_row['reg_id']; ?>&assessment_id=Books&schoolYear=<?php echo $schoolYear; ?>&semester=<?php echo $semester; ?>&payment_type=Book Fee&receipt_num=<?php echo $receipt_num; ?>&request_id=0';
                            </script>
                            <?php
            
                            }else{ $alert="Book Assessment not yet submitted for student: ".$payee_row['lname'].", ".$payee_row['fname']." with ID Code: ".$searched; }
                            
                            
                        //check account verification
                        }else{ $alert="Online Book Distribution System account not yet verified for student: ".$payee_row['lname'].", ".$payee_row['fname']." with ID Code: ".$searched; } ?>
         
                        
            <?php }else{
            
            $searched=$_POST['searchStudent'];
            $schoolYear=$_POST['schoolYear'];
            $semester=$_POST['semester'];
            
            $payee_query = $conn->query("SELECT reg_id, lname, fname, assessment_id FROM students WHERE student_id='$searched' AND schoolYear='$schoolYear'") or die(mysql_error());
            
            //cashiering_system_load_particulars      
                       
            if($payee_query->rowCount()>0){
                
                $payee_row = $payee_query->fetch();
                
                if($payee_row['assessment_id']>0){
                    
                
                $receipt_gen_query = $conn->query("SELECT current_or FROM receipt_gen") or die(mysql_error());
                $receipt_gen_row=$receipt_gen_query->fetch();
                
                $tbl_student_assessments_query = $conn->query("SELECT assessment_id FROM tbl_student_assessments WHERE reg_id='$payee_row[reg_id]'") or die(mysql_error());
                $tbl_student_assessments_row = $tbl_student_assessments_query->fetch();
                        
                $new_or_num=$receipt_gen_row['current_or']+1;
                                  
                if($new_or_num>=0 AND $new_or_num<=9)
                {
                    $receipt_num="000000".$new_or_num;             
                }
                elseif($new_or_num>9 AND $new_or_num<=99)
                {
                    $receipt_num="00000".$new_or_num;
                }
                elseif($new_or_num>99 AND $new_or_num<=999)
                {
                    $receipt_num="0000".$new_or_num;
                }
                elseif($new_or_num>999 AND $new_or_num<=9999)
                {
                    $receipt_num="000".$new_or_num;
                }
                elseif($new_or_num>9999 AND $new_or_num<=99999)
                {
                    $receipt_num="00".$new_or_num;
                }
                elseif($new_or_num>99999 AND $new_or_num<=999999)
                {
                    $receipt_num="0".$new_or_num;
                }
                elseif($new_or_num>999999 AND $new_or_num<=9999999)
                {
                    $receipt_num=$new_or_num;
                }
                ?>
                <script>
                window.location='cashiering_system_load_particulars.php?reg_id=<?php echo $payee_row['reg_id']; ?>&assessment_id=<?php echo $tbl_student_assessments_row['assessment_id']; ?>&schoolYear=<?php echo $schoolYear; ?>&semester=<?php echo $semester; ?>&payment_type=<?php echo $payment_type; ?>&receipt_num=<?php echo $receipt_num; ?>';
                </script>
            
            <?php
            
                }else{
                
                    $alert="No assessment found for student: ".$payee_row['lname'].", ".$payee_row['fname']." with ID Code: ".$searched."<br /><small><a href='#' style='color: green;'>Set Assessment? Click here...</a></small>";
                    
                }
            
            }else{
                
                
                $alert="Student data not found with ID Code: ".$searched;
            
            }
        }
        
    }else{
        
    $searched='';
    $payment_type='';
    $alert='Search student to start...';
    $payee_query = $conn->query("SELECT reg_id FROM students WHERE student_id='$searched'") or die(mysql_error());
    
    }

    $mm= date("m"); //month
    $dd=date("d"); //day
    $yyyy=date("Y"); //years
    $day=date("l"); //Mon-Sun
    $hr=date("h"); //hours
    $min=date("i"); //minutes
    $ampm=substr( date("sa") , 2 ,2 ); //am | pm
    
    $currentDate=date('m'."/".'d'."/".'Y');
    
    ?>
   
  
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
            <li class="breadcrumb-item active">Print Reports</li>
          </ul>
        </div>
      </div>
      
      
      
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
 
              <!-- JHS -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><strong style="font-weight: bolder;">CASHIERING SYSTEM</strong></h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxJHS" aria-expanded="true" aria-controls="updates-boxJHS"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-boxJHS" role="tabpanel" class="collapse show">
 
                    <div class="row col-md-12">
                        <form method="POST" class="row col-md-12">
                        <div class="col-lg-4 col-md-12">
                                <label>School Year</label>
                                <select name="schoolYear" class="form-control form-control-sm">
                                <option><?php echo $activeSchoolYear; ?></option>
                                <option>2019-2020</option>
                                <option>2018-2019</option>
                                </select>
                        </div>
                        
                        <div class="col-lg-4 col-md-12">
                                <label>Semester</label>
                                <select name="semester" class="form-control form-control-sm">
                                <option><?php echo $activeSemester; ?></option>
                                <option>1st Semester</option>
                                <option>2nd Semester</option>
                                </select>
                        </div>
                        
                        <div class="col-lg-4 col-md-12">
                                <label>Payment Type</label>
                                <select name="payment_type" class="form-control form-control-sm" id='subsidy'>
                                <?php if($payment_type!=''){ ?>
                                <option><?php echo $payment_type; ?></option>
                                <?php } ?>
                                <option>Student Fee</option>
                                <option>Book Fee</option>
                                <option>Non-Student Fee</option>
                                </select>
                        </div>
                        
                        <div class="col-lg-12 col-md-12">
                        <br />
                        </div>
                        
                        <div class="col-lg-12 col-md-12">
                        
                        <div class="input-group">
                          
                          <input value="<?php echo $searched; ?>" name="searchStudent" list="search_list1" placeholder="Search or Enter payee's id code or name..." class="form-control" required="true" />
  
                          
                          
                          <datalist id="search_list1">
                                    <?php
                                    
                                    $fnameList_query = $conn->query("SELECT DISTINCT student_id, lname, fname, mname, suffix FROM students WHERE schoolYear='$data_src_sy'");
                                    while($fnlq_row = $fnameList_query->fetch()){
                                        
                                  
                                    if($fnlq_row['suffix']=="-")
                                    {
                                    $listName=$fnlq_row['fname']." ".substr($fnlq_row['mname'], 0,1).". ".$fnlq_row['lname'];
                                                                
                                    }else{
                                        
                                    $listName=$fnlq_row['fname']." ".substr($fnlq_row['mname'], 0,1).". ".$fnlq_row['lname']." ".$fnlq_row['suffix'];
                                                                
                                    } ?>
                                    
                                    
                                    <option value="<?php echo $fnlq_row['student_id']; ?>"><small><?php echo $listName; ?></small></option>
                                    
                                    <?php } ?>
                          </datalist>
                          
                            
                            <div class="input-group-append">
                              <button name="search" class="btn btn-primary"><i class="fa fa-check"></i> NEW TRANSACTION</button>
                            </div>
                          </div>
                        
                        </div>
                        
                        
                        </form>
                    
                    <br />
                    
                    <div class="modal-footer">
                    <h4>
                    <?php echo $alert; ?>
                    </h4>
                    </div>

                    
                </div>
              </div>
              <!-- JHS End-->
 
               
            </div>
            
          </div>
        </div>
        
                  
      </section>
      
      <?php
      $fnameList_query=null;
      $fnlq_row=null;
      $payee_query=null;
      $payee_row=null;
      $receipt_gen_query=null;
      $receipt_gen_row=null;
      $tbl_student_assessments_query=null;
      $tbl_student_assessments_row=null;
      $tbl_student_payment_dummy_query=null;
      $tbl_student_payment_dummy_row=null;
      $conn=null;
      ?>
      
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
    
 
  </body>
</html>