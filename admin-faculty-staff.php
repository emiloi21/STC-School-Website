<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
  <body>
  
  
  
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">ADMINISTRATION</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" style="color: #075907;">FACULTY &amp; STAFF</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <section class="bar">
        <div class="container">
          <div class="row">

                    <?php
                    $all_personnel_query = $conn->query("SELECT * FROM tbl_faculty_staff WHERE classification='$_GET[classification]' ORDER BY personnel_id ASC") or die(mysql_error());
                    while ($all_row = $all_personnel_query->fetch()){
                    
                    $modal_id=$all_row['personnel_id'];
                    ?>
                    
                      <!-- Facility Modal-->
                      <div id="facility-modal<?php echo $modal_id; ?>" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <p id="login-modalLabel" class="modal-title"><?php echo strtoupper($all_row['classification']); ?></p>
                              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
                            </div>
                            
                            <div class="modal-body" style="text-align: center;">
                            
                               <img src="admin/<?php echo $all_row['img']; ?>" class="img-fluid" alt="<?php echo $all_row['fullname']; ?> image" style="width: 100%; height: 100%; border: solid 1px #097609;" />
                               <div id="text-page" style="margin-top: 8px;">
                                <h4><?php echo $all_row['fullname']; ?></h4>
                                  <p class="lead" style="font-size: large;">
                                  <?php echo nl2br($all_row['description']); ?>
                                  </p>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <a href="#" data-dismiss="modal" aria-label="Close" class="btn btn-template-outlined">Close</a>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      <!-- Facility modal end-->
                      <?php } ?>
                        
            <div class="col-lg-3">
              <!-- MENUS AND WIDGETS -->
              <div class="panel panel-default sidebar-menu with-icons">
                <div class="panel-heading">
                  <h4 class="h4 panel-title" style="color: #075907;">RELATED LINKS</h4>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a href="admin-offices-services.php" class="nav-link">OFFICES &amp; SERVICES</a></li>
                    <li class="nav-item"><a style="color: #e5eb0b; background-color: #097609;" href="#" class="nav-link active">FACULTY &amp; STAFF</a></li>
                  </ul>
                </div>
              </div>
            </div>
            
            <div class="col-lg-9">
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="heading">
                      <h2>FACULTY &amp; STAFF</h2>
                    </div>
                  </div>
                  
                      <div class="col-md-12">
                      <div id="accordion" role="tablist" class="mb-5" style="width: 100%; text-align: center;">
                        <?php if($_GET['classification']==='ADMIN'){ ?>
                        <div class="card">
                          <div id="headingAdmin" role="tab" class="card-header">
                            <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapseAdmin" aria-expanded="false" aria-controls="collapseAdmin" class="collapsed">ADMIN</a></h5>
                          </div>
                          <div id="collapseAdmin" role="tabpanel" aria-labelledby="headingAdmin" data-parent="#accordion" class="collapse show">
                            <div class="card-body">
                              <div class="row">
                              
                               <?php
                               $p_gs_query = $conn->query("SELECT * FROM tbl_faculty_staff WHERE classification='ADMIN' ORDER BY personnel_id ASC") or die(mysql_error());
                               while ($p_gs_row = $p_gs_query->fetch()){
                                
                               $personnel_id=$p_gs_row['personnel_id'];
                               ?>
                               
                                  <div class="col-md-3">
                                    <div class="box-image">
                                      <div class="image"><img src="admin/<?php echo $p_gs_row['img']; ?>" alt="" class="img-fluid" style="width: 100%; height: 100%; border: solid 1px #097609;" />
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                          <div class="content">
                                            <div class="name">
                                              <p><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="color-white"><?php echo $p_gs_row['fullname'];; ?></a></p>
                                            </div>
                                            <div class="text">
                                              <!--p class="d-none d-sm-block">some text...</p-->
                                              <p class="buttons"><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="btn btn-template-outlined-white">Read more</a></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                               <?php } ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }else{?>
                        <div class="card">
                          <div id="headingAdmin" role="tab" class="card-header">
                            <h5 class="mb-0">
                            <a href="admin-faculty-staff.php?classification=ADMIN" class="collapsed">ADMIN</a></h5>
                          </div>
                        </div>
                        <?php } ?>
                        
                        
                        
                        <?php if($_GET['classification']==='GRADE SCHOOL'){ ?>
                        <div class="card">
                          <div id="headingGS" role="tab" class="card-header">
                            <h5 class="mb-0"><a data-toggle="collapse" href="#collapseGS" aria-expanded="true" aria-controls="collapseGS">GRADE SCHOOL</a></h5>
                          </div>
                          <div id="collapseGS" role="tabpanel" aria-labelledby="headingGS" data-parent="#accordion" class="collapse show">
                            <div class="card-body">
                              <div class="row">
                              
                               <?php
                               $p_gs_query = $conn->query("SELECT * FROM tbl_faculty_staff WHERE classification='GRADE SCHOOL' ORDER BY personnel_id ASC") or die(mysql_error());
                               while ($p_gs_row = $p_gs_query->fetch()){
                                
                               $personnel_id=$p_gs_row['personnel_id'];
                               ?>
                               
                                  <div class="col-md-3">
                                    <div class="box-image">
                                      <div class="image"><img src="admin/<?php echo $p_gs_row['img']; ?>" alt="" class="img-fluid" style="width: 100%; height: 100%; border: solid 1px #097609;" />
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                          <div class="content">
                                            <div class="name">
                                              <p><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="color-white"><?php echo $p_gs_row['fullname'];; ?></a></p>
                                            </div>
                                            <div class="text">
                                              <!--p class="d-none d-sm-block">some text...</p-->
                                              <p class="buttons"><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="btn btn-template-outlined-white">Read more</a></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                               <?php } ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }else{?>
                        <div class="card">
                          <div id="headingGS" role="tab" class="card-header">
                            <h5 class="mb-0"><a href="admin-faculty-staff.php?classification=GRADE SCHOOL" class="collapsed">GRADE SCHOOL</a></h5>
                          </div>
                        </div>
                        <?php } ?>
                        
                        <?php if($_GET['classification']==='JUNIOR HIGH SCHOOL'){ ?>
                        <div class="card">
                          <div id="headingJHS" role="tab" class="card-header">
                            <h5 class="mb-0"><a data-toggle="collapse" href="#collapseJHS" aria-expanded="false" aria-controls="collapseJHS" class="collapsed">JUNIOR HIGH SCHOOL</a></h5>
                          </div>
                          <div id="collapseJHS" role="tabpanel" aria-labelledby="headingJHS" data-parent="#accordion" class="collapse show">
                            <div class="card-body">
                              <div class="row">
                              
                               <?php
                               $p_gs_query = $conn->query("SELECT * FROM tbl_faculty_staff WHERE classification='JUNIOR HIGH SCHOOL' ORDER BY personnel_id ASC") or die(mysql_error());
                               while ($p_gs_row = $p_gs_query->fetch()){
                                
                               $personnel_id=$p_gs_row['personnel_id'];
                               ?>
                               
                                  <div class="col-md-3">
                                    <div class="box-image">
                                      <div class="image"><img src="admin/<?php echo $p_gs_row['img']; ?>" alt="" class="img-fluid" style="width: 100%; height: 100%; border: solid 1px #097609;" />
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                          <div class="content">
                                            <div class="name">
                                              <p><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="color-white"><?php echo $p_gs_row['fullname'];; ?></a></p>
                                            </div>
                                            <div class="text">
                                              <!--p class="d-none d-sm-block">some text...</p-->
                                              <p class="buttons"><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="btn btn-template-outlined-white">Read more</a></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                               <?php } ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }else{?>
                        <div class="card">
                          <div id="headingGS" role="tab" class="card-header">
                            <h5 class="mb-0"><a href="admin-faculty-staff.php?classification=JUNIOR HIGH SCHOOL" class="collapsed">JUNIOR HIGH SCHOOL</a></h5>
                          </div>
                        </div>
                        <?php } ?>
                        
                        
                        <?php if($_GET['classification']==='SENIOR HIGH SCHOOL'){ ?>
                        <div class="card">
                          <div id="headingSHS" role="tab" class="card-header">
                            <h5 class="mb-0"><a data-toggle="collapse" href="#collapseSHS" aria-expanded="false" aria-controls="collapseSHS" class="collapsed">SENIOR HIGH SCHOOL</a></h5>
                          </div>
                          <div id="collapseSHS" role="tabpanel" aria-labelledby="headingSHS" data-parent="#accordion" class="collapse show">
                            <div class="card-body">
                              <div class="row">
                              
                               <?php
                               $p_gs_query = $conn->query("SELECT * FROM tbl_faculty_staff WHERE classification='SENIOR HIGH SCHOOL' ORDER BY personnel_id ASC") or die(mysql_error());
                               while ($p_gs_row = $p_gs_query->fetch()){
                                
                               $personnel_id=$p_gs_row['personnel_id'];
                               ?>
                               
                                  <div class="col-md-3">
                                    <div class="box-image">
                                      <div class="image"><img src="admin/<?php echo $p_gs_row['img']; ?>" alt="" class="img-fluid" style="width: 100%; height: 100%; border: solid 1px #097609;" />
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                          <div class="content">
                                            <div class="name">
                                              <p><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="color-white"><?php echo $p_gs_row['fullname'];; ?></a></p>
                                            </div>
                                            <div class="text">
                                              <!--p class="d-none d-sm-block">some text...</p-->
                                              <p class="buttons"><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="btn btn-template-outlined-white">Read more</a></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                               <?php } ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }else{?>
                        <div class="card">
                          <div id="headingGS" role="tab" class="card-header">
                            <h5 class="mb-0"><a href="admin-faculty-staff.php?classification=SENIOR HIGH SCHOOL" class="collapsed">SENIOR HIGH SCHOOL</a></h5>
                          </div>
                        </div>
                        <?php } ?>
                        
                        
                        
                        <?php if($_GET['classification']==='COLLEGE'){ ?>
                        <div class="card">
                          <div id="headingCollege" role="tab" class="card-header">
                            <h5 class="mb-0"><a data-toggle="collapse" href="#collapseCollege" aria-expanded="false" aria-controls="collapseCollege" class="collapsed">COLLEGE</a></h5>
                          </div>
                          <div id="collapseCollege" role="tabpanel" aria-labelledby="headingCollege" data-parent="#accordion" class="collapse show">
                            <div class="card-body">
                              <div class="row">
                              
                               <?php
                               $p_gs_query = $conn->query("SELECT * FROM tbl_faculty_staff WHERE classification='COLLEGE' ORDER BY personnel_id ASC") or die(mysql_error());
                               while ($p_gs_row = $p_gs_query->fetch()){
                                
                               $personnel_id=$p_gs_row['personnel_id'];
                               ?>
                               
                                  <div class="col-md-3">
                                    <div class="box-image">
                                      <div class="image"><img src="admin/<?php echo $p_gs_row['img']; ?>" alt="" class="img-fluid" style="width: 100%; height: 100%; border: solid 1px #097609;" />
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                          <div class="content">
                                            <div class="name">
                                              <p><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="color-white"><?php echo $p_gs_row['fullname'];; ?></a></p>
                                            </div>
                                            <div class="text">
                                              <!--p class="d-none d-sm-block">some text...</p-->
                                              <p class="buttons"><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="btn btn-template-outlined-white">Read more</a></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                               <?php } ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }else{?>
                        <div class="card">
                          <div id="headingGS" role="tab" class="card-header">
                            <h5 class="mb-0"><a href="admin-faculty-staff.php?classification=COLLEGE" class="collapsed">COLLEGE</a></h5>
                          </div>
                        </div>
                        <?php } ?>
                        
                        
                        <?php if($_GET['classification']==='OFFICE STAFF'){ ?>
                        <div class="card">
                          <div id="headingOffStaff" role="tab" class="card-header">
                            <h5 class="mb-0"><a data-toggle="collapse" href="#collapseOffStaff" aria-expanded="false" aria-controls="collapseOffStaff" class="collapsed">OFFICE STAFF</a></h5>
                          </div>
                          <div id="collapseOffStaff" role="tabpanel" aria-labelledby="headingOffStaff" data-parent="#accordion" class="collapse show">
                            <div class="card-body">
                              <div class="row">
                              
                               <?php
                               $p_gs_query = $conn->query("SELECT * FROM tbl_faculty_staff WHERE classification='OFFICE STAFF' ORDER BY personnel_id ASC") or die(mysql_error());
                               while ($p_gs_row = $p_gs_query->fetch()){
                                
                               $personnel_id=$p_gs_row['personnel_id'];
                               ?>
                               
                                  <div class="col-md-3">
                                    <div class="box-image">
                                      <div class="image"><img src="admin/<?php echo $p_gs_row['img']; ?>" alt="" class="img-fluid" style="width: 100%; height: 100%; border: solid 1px #097609;" />
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                          <div class="content">
                                            <div class="name">
                                              <p><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="color-white"><?php echo $p_gs_row['fullname'];; ?></a></p>
                                            </div>
                                            <div class="text">
                                              <!--p class="d-none d-sm-block">some text...</p-->
                                              <p class="buttons"><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="btn btn-template-outlined-white">Read more</a></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                               <?php } ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }else{?>
                        <div class="card">
                          <div id="headingGS" role="tab" class="card-header">
                            <h5 class="mb-0"><a href="admin-faculty-staff.php?classification=OFFICE STAFF" class="collapsed">OFFICE STAFF</a></h5>
                          </div>
                        </div>
                        <?php } ?>
                        
                        
                        <?php if($_GET['classification']==='CANTEEN STAFF'){ ?>
                        <div class="card">
                          <div id="headingCanStaff" role="tab" class="card-header">
                            <h5 class="mb-0"><a data-toggle="collapse" href="#collapseCanStaff" aria-expanded="false" aria-controls="collapseCanStaff" class="collapsed">CANTEEN STAFF</a></h5>
                          </div>
                          <div id="collapseCanStaff" role="tabpanel" aria-labelledby="headingCanStaff" data-parent="#accordion" class="collapse show">
                            <div class="card-body">
                              <div class="row">
                              
                               <?php
                               $p_gs_query = $conn->query("SELECT * FROM tbl_faculty_staff WHERE classification='CANTEEN STAFF' ORDER BY personnel_id ASC") or die(mysql_error());
                               while ($p_gs_row = $p_gs_query->fetch()){
                                
                               $personnel_id=$p_gs_row['personnel_id'];
                               ?>
                               
                                  <div class="col-md-3">
                                    <div class="box-image">
                                      <div class="image"><img src="admin/<?php echo $p_gs_row['img']; ?>" alt="" class="img-fluid" style="width: 100%; height: 100%; border: solid 1px #097609;" />
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                          <div class="content">
                                            <div class="name">
                                              <p><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="color-white"><?php echo $p_gs_row['fullname'];; ?></a></p>
                                            </div>
                                            <div class="text">
                                              <!--p class="d-none d-sm-block">some text...</p-->
                                              <p class="buttons"><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="btn btn-template-outlined-white">Read more</a></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                               <?php } ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }else{?>
                        <div class="card">
                          <div id="headingGS" role="tab" class="card-header">
                            <h5 class="mb-0"><a href="admin-faculty-staff.php?classification=CANTEEN STAFF" class="collapsed">CANTEEN STAFF</a></h5>
                          </div>
                        </div>
                        <?php } ?>
                        
                        
                        <?php if($_GET['classification']==='MAINTENANCE'){ ?>
                        <div class="card">
                          <div id="headingMainten" role="tab" class="card-header">
                            <h5 class="mb-0"><a data-toggle="collapse" href="#collapseMainten" aria-expanded="false" aria-controls="collapseMainten" class="collapsed">MAINTENANCE</a></h5>
                          </div>
                          <div id="collapseMainten" role="tabpanel" aria-labelledby="headingMainten" data-parent="#accordion" class="collapse show">
                            <div class="card-body">
                              <div class="row">
                              
                               <?php
                               $p_gs_query = $conn->query("SELECT * FROM tbl_faculty_staff WHERE classification='MAINTENANCE' ORDER BY personnel_id ASC") or die(mysql_error());
                               while ($p_gs_row = $p_gs_query->fetch()){
                                
                               $personnel_id=$p_gs_row['personnel_id'];
                               ?>
                               
                                  <div class="col-md-3">
                                    <div class="box-image">
                                      <div class="image"><img src="admin/<?php echo $p_gs_row['img']; ?>" alt="" class="img-fluid" style="width: 100%; height: 100%; border: solid 1px #097609;" />
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                          <div class="content">
                                            <div class="name">
                                              <p><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="color-white"><?php echo $p_gs_row['fullname'];; ?></a></p>
                                            </div>
                                            <div class="text">
                                              <!--p class="d-none d-sm-block">some text...</p-->
                                              <p class="buttons"><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="btn btn-template-outlined-white">Read more</a></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                               <?php } ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }else{?>
                        <div class="card">
                          <div id="headingGS" role="tab" class="card-header">
                            <h5 class="mb-0"><a href="admin-faculty-staff.php?classification=MAINTENANCE" class="collapsed">MAINTENANCE</a></h5>
                          </div>
                        </div>
                        <?php } ?>
                        
                        
                         
                        <?php if($_GET['classification']==='COACH/TRAINER/PART-TIME'){ ?>
                        <div class="card">
                          <div id="headingPartTime" role="tab" class="card-header">
                            <h5 class="mb-0"><a data-toggle="collapse" href="#collapsePartTime" aria-expanded="false" aria-controls="collapsePartTime" class="collapsed">COACH/TRAINER/PART-TIME</a></h5>
                          </div>
                          <div id="collapsePartTime" role="tabpanel" aria-labelledby="headingPartTime" data-parent="#accordion" class="collapse show">
                            <div class="card-body">
                              <div class="row">
                              
                               <?php
                               $p_gs_query = $conn->query("SELECT * FROM tbl_faculty_staff WHERE classification='COACH/TRAINER/PART-TIME' ORDER BY personnel_id ASC") or die(mysql_error());
                               while ($p_gs_row = $p_gs_query->fetch()){
                                
                               $personnel_id=$p_gs_row['personnel_id'];
                               ?>
                               
                                  <div class="col-md-3">
                                    <div class="box-image">
                                      <div class="image"><img src="admin/<?php echo $p_gs_row['img']; ?>" alt="" class="img-fluid" style="width: 100%; height: 100%; border: solid 1px #097609;" />
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                          <div class="content">
                                            <div class="name">
                                              <p><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="color-white"><?php echo $p_gs_row['fullname'];; ?></a></p>
                                            </div>
                                            <div class="text">
                                              <!--p class="d-none d-sm-block">some text...</p-->
                                              <p class="buttons"><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $personnel_id; ?>" class="btn btn-template-outlined-white">Read more</a></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                
                               <?php } ?>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }else{?>
                        <div class="card">
                          <div id="headingGS" role="tab" class="card-header">
                            <h5 class="mb-0"><a href="admin-faculty-staff.php?classification=COACH/TRAINER/PART-TIME" class="collapsed">COACH/TRAINER/PART-TIME</a></h5>
                          </div>
                        </div>
                        <?php } ?>
                        
                        
                      </div>
                      </div>
                      
                </div>
            </div>
            
          </div>
        </div>
      </section>
 
      <?php include('footer.php'); ?>
    </div>
    <?php include('js_files.php'); ?>
    
  </body>
</html>