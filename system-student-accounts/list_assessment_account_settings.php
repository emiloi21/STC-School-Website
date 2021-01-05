<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  
  include('header.php');
  
  
  $tbl_accounts_assessments_query = $conn->query("SELECT * FROM tbl_accounts_assessments WHERE assessment_id='$_GET[assessment_id]'") or die(mysql_error());
  $tbl_accounts_assessments_row = $tbl_accounts_assessments_query->fetch();
  
  
                if($_GET['gradeLevel']===''){
                    $gradeDetails="Select Grade Level";
                }else{ 
                    
                    if($_GET['dept']=="Grade School" OR $_GET['dept']=="Junior High School")
                    {
                        $gradeDetails=$_GET['gradeLevel'];
                    }elseif($_GET['dept']=="Senior High School"){
                        $gradeDetails=$_GET['gradeLevel']." - ".$_GET['strand'];
                    }else{
                        $gradeDetails=$_GET['gradeLevel']." - ".$_GET['strand'].' '.$_GET['major'] ;
                    }
                    
                }
                           
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
            <li class="breadcrumb-item"><a href="list_account_assessments.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>">Assessments</a></li>
            <li class="breadcrumb-item active">Accounts - 

                <?php
 
                if($_GET['gradeLevel']===''){
                    echo "Select Class";
                }else{ 
                    
                    if($_GET['dept']=="Grade School" OR $_GET['dept']=="Junior High School")
                    {
                        echo $gradeDetails=$_GET['gradeLevel'];
                    }elseif($_GET['dept']=="Senior High School"){
                        echo $gradeDetails=$_GET['gradeLevel']." - ".$_GET['strand'];
                    }else{
                        echo $gradeDetails=$_GET['gradeLevel']." - ".$_GET['strand'].' '.$_GET['major'] ;
                    }
                    
                }
                
                echo " | ".$tbl_accounts_assessments_row['description']; ?>
                  
             - Assessment Settings</li>
             
          </ul>
          
        </div>
      </div>
      
    
     <!-- add Student Modal -->
     <?php include('add_assessment_settings_modal.php'); ?>
     <!-- end add Student Modal -->
      
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
                  <?php if($activeSchoolYear===$data_src_sy){ ?>
                  <a data-toggle="modal" data-target="#add_payables_assessment" href="#" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                  <?php }else{ ?>
                  <a href="#" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-default"><i class="fa fa-plus"></i></a>
                  <?php } ?>
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">
                    LIST OF PAYABLES &nbsp;<small>(SY <?php echo $data_src_sy; ?>)</small></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
                
                
                <div id="updates-boxContacts" role="tabpanel" class="collapse show">
                
                
                
                <div class="col-lg-12">
                 
                <div class="row" style="margin: 8px;">
                <div class="col-lg-6">
                <h5>Class: <?php echo $gradeDetails; ?></h5>
                </div>
                
                <div class="col-lg-6">
                <h5>Assessment: <?php echo $tbl_accounts_assessments_row['description']; ?></h5>
                </div>
                </div>
                
                <?php include('list_assessment_account_table.php'); ?>
               
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
