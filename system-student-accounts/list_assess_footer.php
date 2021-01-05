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
            <li class="breadcrumb-item active">Accounts - List of Categories - <?php echo $get_dept; ?></li>
             
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
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">ASSESSMENT FOOTER <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
              
              <div style="margin-top: 12px;"></div>
              
                <div class="dropdown">
                  <?php if($get_dept==='Grade School'){ ?>
                  <button class="dropbtn" style="border: solid 2px yellow;">
                  <strong style="font-weight: bold; color: white;">Grade School</strong>
                  </button>
                  <?php }else{ ?>
                  <button class="dropbtn">
                  <strong style="color: white;">Grade School</strong>
                  </button>
                  <?php } ?>
                  
                  <div class="dropdown-content">
                    <a href="list_assess_footer.php?dept=Grade School&gradeLevel=Nursery">Nursery</a>
                    <a href="list_assess_footer.php?dept=Grade School&gradeLevel=Preparatory">Preparatory</a>
                    <a href="list_assess_footer.php?dept=Grade School&gradeLevel=Kinder">Kinder</a>
                    <a href="list_assess_footer.php?dept=Grade School&gradeLevel=Grade 1">Grade 1</a>
                    <a href="list_assess_footer.php?dept=Grade School&gradeLevel=Grade 2">Grade 2</a>
                    <a href="list_assess_footer.php?dept=Grade School&gradeLevel=Grade 3">Grade 3</a>
                    <a href="list_assess_footer.php?dept=Grade School&gradeLevel=Grade 4">Grade 4</a>
                    <a href="list_assess_footer.php?dept=Grade School&gradeLevel=Grade 5">Grade 5</a>
                    <a href="list_assess_footer.php?dept=Grade School&gradeLevel=Grade 6">Grade 6</a>
                  </div>
                </div>
                 
                
                <div class="dropdown">
                  
                  <?php if($get_dept==='JHS'){ ?>
                  <button class="dropbtn" style="border: solid 2px yellow;">
                  <strong style="font-weight: bold; color: white;">JHS</strong>
                  </button>
                  <?php }else{ ?>
                  <button class="dropbtn">
                  <strong style="color: white;">JHS</strong>
                  </button>
                  <?php } ?>
                  <div class="dropdown-content">
                    <a href="list_assess_footer.php?dept=Junior High School&gradeLevel=Grade 7">Grade 7</a>
                    <a href="list_assess_footer.php?dept=Junior High School&gradeLevel=Grade 8">Grade 8</a>
                    <a href="list_assess_footer.php?dept=Junior High School&gradeLevel=Grade 9">Grade 9</a>
                    <a href="list_assess_footer.php?dept=Junior High School&gradeLevel=Grade 10">Grade 10</a>
                  </div>
                </div>
                
                
                <div class="dropdown">
                  
                  <?php if($get_dept==='SHS'){ ?>
                  <button class="dropbtn" style="border: solid 2px yellow;">
                  <strong style="font-weight: bold; color: white;">SHS</strong>
                  </button>
                  <?php }else{ ?>
                  <button class="dropbtn">
                  <strong style="color: white;">SHS</strong>
                  </button>
                  <?php } ?>
                  <div class="dropdown-content">
                  
                  <a href="list_assess_footer.php?dept=College&gradeLevel=Grade 11">Grade 11</a>
                  <a href="list_assess_footer.php?dept=College&gradeLevel=Grade 12">Grade 12</a>
                  
                  </div>
                </div>
                
                
                
                <div class="dropdown">
                  
                  <?php if($get_dept==='College'){ ?>
                  <button class="dropbtn" style="border: solid 2px yellow;">
                  <strong style="font-weight: bold; color: white;">College</strong>
                  </button>
                  <?php }else{ ?>
                  <button class="dropbtn">
                  <strong style="color: white;">College</strong>
                  </button>
                  <?php } ?>
                  <div class="dropdown-content">
                  
                  <a href="list_assess_footer.php?dept=College&gradeLevel=1st Year">1st Year</a>
                  <a href="list_assess_footer.php?dept=College&gradeLevel=2nd Year">2nd Year</a>
                  <a href="list_assess_footer.php?dept=College&gradeLevel=3rd Year">3rd Year</a>
                  <a href="list_assess_footer.php?dept=College&gradeLevel=4th Year">4th Year</a>
                  
                  </div>
                </div>
                
                
                <h3 style="margin: 16px 16px 16px 16px;">
                <strong>
                <?php
 
                if($_GET['gradeLevel']===''){
                    echo "Select Grade Level";
                    
                }else{
                    echo $_GET['dept'].' - '.$_GET['gradeLevel'];
                    
                }
                
                
                ?>
                </strong>
                </h3>
                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th>Contents</th>
                        <th style="width: 5%;"></th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      
                      $assess_footer_query = $conn->query("SELECT * FROM tbl_footer_assessment WHERE gradeLevel='$_GET[gradeLevel]'") or die(mysql_error());
                      while ($af_row = $assess_footer_query->fetch()) 
                      {
                        $foot_id=$af_row['foot_id'];
                      
                      ?>
           
                        <tr>
                        
                        <td>
                        <textarea class="form-control" rows="7" style="resize: none;" spellcheck="" readonly=""><?php echo $af_row['contents']; ?></textarea>
                        </td>
          
                        <td>
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_assess_footer<?php echo $foot_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                        </td>
                        
                        </tr>


                  <!-- edit category Modal -->
                  <div id="edit_assess_footer<?php echo $foot_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_assess_footer.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>" method="POST">
                      
                      <input value="<?php echo $af_row['foot_id']; ?>" name="foot_id" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Assessment Footer</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="form-group row">
                              <div class="col-sm-12">
                                <p>Assessment Footer</p>
                                <textarea name="contents" class="form-control" rows="7" style="resize: none;" spellcheck="" required=""><?php echo $af_row['contents']; ?></textarea>
                              </div>
                            </div>
                          
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateAssessFooter" type="submit" class="btn btn-primary">Update</button>
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
