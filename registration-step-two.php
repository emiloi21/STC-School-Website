<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
  <body>
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      <?php
      
        $studData_query = $conn->prepare('SELECT * FROM students WHERE v_code = :v_code');
        $studData_query->execute(['v_code' => $_GET['reg_code']]);
        $studData_row = $studData_query->fetch();
        
      ?>
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">ENROLLMENT</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" style="color: #075907;">Registration</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <div id="content">
        <div class="container">
          <div class="row">
            <div id="checkout" class="col-lg-12">
              <div class="box border-bottom-0">
              
              <div class="content">
                <div class="row">
                    
                    <div class="col-sm-6" style="margin-bottom: 18px;">
                    <h4 style="margin-bottom: 0px;">SCHOLASTIC RECORDS</h4>
                    <small>Please fill-up the form correctly</small>
                    </div>
                    
                    <div class="col-sm-6" style="margin-bottom: 18px;">
                    <h4 style="margin-bottom: 0px;">REGISTRATION CODE: <strong style="font-size: larger; background-color: #e5eb0b; padding: 0px 4px 0px 4px; border: solid 1px #097609;"><?php echo $studData_row['v_code']; ?></strong></h4>
                    <small>Take note of this 10-character code to review your profile</small>
                    </div>
                    
                    <?php if($studData_row['dept']==='College'){ ?>
                    
                    <div class="col-sm-6">
                    <strong>Applied Course:</strong> <?php echo $studData_row['gradeLevel']; ?>
                    </div>
                    
                    <div class="col-sm-6">
                    <strong>Classification:</strong> <?php echo $studData_row['classification']; ?>
                    </div>
                    
                    <?php }else{ ?>
                    
                    <div class="col-sm-4">
                    <strong>LRN:</strong> <?php echo $studData_row['lrn']; ?>
                    </div>
                    
                    <div class="col-sm-4">
                    <strong>Applied Grade Level:</strong> <?php echo $studData_row['gradeLevel']; ?>
                    </div>
                    
                    <div class="col-sm-4">
                    <strong>Classification:</strong> <?php echo $studData_row['classification']; ?>
                    </div>
                    
                    <?php } ?>
                    
                </div>
              </div>
              <hr />
              
                <form method="POST" action="save_userInfo_reg.php?reg_code=<?php echo $_GET['reg_code']; ?>">
                
                  <ul class="nav nav-pills nav-fill">
                    <li class="nav-item"><a href="registration-step-one.php?reg_code=<?php echo $_GET['reg_code']; ?>" class="nav-link"> <i class="fa fa-user"></i><br />Personal Information</a></li>
                    <li class="nav-item"><a href="#" class="nav-link active"><i class="fa fa-book"></i><br />Scholastic Records</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-users"></i><br />Parents/Guardian Information</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled"><i class="fa fa-lock"></i><br />User Account Settings/Requirements</a></li>
                  </ul>
                  
                  <div class="content">
                  
                    <!-- ### GRADE SCHOOL ### -->
                    <?php if($studData_row['dept']==='Grade School' AND ($studData_row['gradeLevel']==='Nursery' OR $studData_row['gradeLevel']==='Preparatory' OR $studData_row['gradeLevel']==='Kinder')){ ?>

                    <?php }elseif($studData_row['dept']==='Grade School' AND ($studData_row['gradeLevel']==='Grade 1' OR $studData_row['gradeLevel']==='Grade 2' OR $studData_row['gradeLevel']==='Grade 3' OR $studData_row['gradeLevel']==='Grade 4' OR $studData_row['gradeLevel']==='Grade 5' OR $studData_row['gradeLevel']==='Grade 6')){ ?>
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <p>PRE-SCHOOL</p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['last_school']; ?>" name="last_school" list="search_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             
                             <datalist id="search_last_school">
                                    <?php
                                    
                                    $last_school_list_query = $conn->query("SELECT DISTINCT last_school FROM students");
                                    while($last_school_list_row = $last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $last_school_list_row['last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['last_school_sy']; ?>" name="last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
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
                    
                    <?php if($studData_row['classification']==='Transferee'){ ?>
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <hr />
                      <p>ELEMENTARY SCHOOL <small>(If Transferee)</small></p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['elem_last_school']; ?>" name="elem_last_school" list="search_elem_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             <datalist id="search_elem_last_school">
                                    <?php
                                    
                                    $elem_last_school_list_query = $conn->query("SELECT DISTINCT elem_last_school FROM students");
                                    while($elem_last_school_list_row = $elem_last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $elem_last_school_list_row['elem_last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['elem_last_school_sy']; ?>" name="elem_last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['elem_last_school_address']; ?>" name="elem_last_school_address" list="search_elem_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_elem_last_school_address">
                                    <?php
                                    
                                    $elem_last_school_address_list_query = $conn->query("SELECT DISTINCT elem_last_school_address FROM students");
                                    while($elem_last_school_address_list_row = $elem_last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $elem_last_school_address_list_row['elem_last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="elem_last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['elem_last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    <?php } } ?>
                    <!-- ### END GRADE SCHOOL ### -->
                    
                    
                    <!-- ### JUNIOR HIGH SCHOOL ### -->
                    <?php if($studData_row['dept']==='Junior High School'){ ?>
                    <!--div class="form-group row">
                      <div class="col-sm-12">
                      <p>PRE-SCHOOL <small>(If Transferee)</small></p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php //echo $studData_row['last_school']; ?>" name="last_school" list="search_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             
                             <datalist id="search_last_school">
                                    <?php
                                    /*
                                    $last_school_list_query = $conn->query("SELECT DISTINCT last_school FROM students");
                                    while($last_school_list_row = $last_school_list_query->fetch()){ */?>
                                    
                                    <option><?php //echo $last_school_list_row['last_school']; ?></option>
                                    
                                    <?php //} ?>
                             </datalist>
                             
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php //echo $studData_row['last_school_sy']; ?>" name="last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php //echo $studData_row['last_school_address']; ?>" name="last_school_address" list="search_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_last_school_address">
                                    <?php
                                    /*
                                    $last_school_address_list_query = $conn->query("SELECT DISTINCT last_school_address FROM students");
                                    while($last_school_address_list_row = $last_school_address_list_query->fetch()){ */?>
                                    
                                    <option><?php //echo $last_school_address_list_row['last_school_address']; ?></option>
                                    
                                    <?php //} ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="last_school_type" class="form-control form-control-sm">
                              <option><?php //echo $studData_row['last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div-->
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <hr />
                      <p>ELEMENTARY SCHOOL</p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['elem_last_school']; ?>" name="elem_last_school" list="search_elem_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             <datalist id="search_elem_last_school">
                                    <?php
                                    
                                    $elem_last_school_list_query = $conn->query("SELECT DISTINCT elem_last_school FROM students");
                                    while($elem_last_school_list_row = $elem_last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $elem_last_school_list_row['elem_last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['elem_last_school_sy']; ?>" name="elem_last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['elem_last_school_address']; ?>" name="elem_last_school_address" list="search_elem_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_elem_last_school_address">
                                    <?php
                                    
                                    $elem_last_school_address_list_query = $conn->query("SELECT DISTINCT elem_last_school_address FROM students");
                                    while($elem_last_school_address_list_row = $elem_last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $elem_last_school_address_list_row['elem_last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="elem_last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['elem_last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <?php if($studData_row['classification']==='Transferee'){ ?>
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <hr />
                      <p>JUNIOR SCHOOL <small>(If Transferee)</small></p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['jhs_last_school']; ?>" name="jhs_last_school" list="search_jhs_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             <datalist id="search_jhs_last_school">
                                    <?php
                                    
                                    $jhs_last_school_list_query = $conn->query("SELECT DISTINCT jhs_last_school FROM students");
                                    while($jhs_last_school_list_row = $jhs_last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $jhs_last_school_list_row['jhs_last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['jhs_last_school_sy']; ?>" name="jhs_last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['jhs_last_school_address']; ?>" name="jhs_last_school_address" list="search_jhs_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_jhs_last_school_address">
                                    <?php
                                    
                                    $jhs_last_school_address_list_query = $conn->query("SELECT DISTINCT jhs_last_school_address FROM students");
                                    while($jhs_last_school_address_list_row = $jhs_last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $jhs_last_school_address_list_row['jhs_last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="jhs_last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['jhs_last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    <?php } } ?>
                    <!-- ### END JUNIOR HIGH SCHOOL ### -->
                    
                    
                    <!-- ### SENIOR HIGH SCHOOL ### -->
                    <?php if($studData_row['dept']==='Senior High School'){ ?>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <p>ELEMENTARY SCHOOL</p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['elem_last_school']; ?>" name="elem_last_school" list="search_elem_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             <datalist id="search_elem_last_school">
                                    <?php
                                    
                                    $elem_last_school_list_query = $conn->query("SELECT DISTINCT elem_last_school FROM students");
                                    while($elem_last_school_list_row = $elem_last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $elem_last_school_list_row['elem_last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['elem_last_school_sy']; ?>" name="elem_last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['elem_last_school_address']; ?>" name="elem_last_school_address" list="search_elem_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_elem_last_school_address">
                                    <?php
                                    
                                    $elem_last_school_address_list_query = $conn->query("SELECT DISTINCT elem_last_school_address FROM students");
                                    while($elem_last_school_address_list_row = $elem_last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $elem_last_school_address_list_row['elem_last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="elem_last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['elem_last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <hr />
                      <p>JUNIOR SCHOOL</p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['jhs_last_school']; ?>" name="jhs_last_school" list="search_jhs_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             <datalist id="search_jhs_last_school">
                                    <?php
                                    
                                    $jhs_last_school_list_query = $conn->query("SELECT DISTINCT jhs_last_school FROM students");
                                    while($jhs_last_school_list_row = $jhs_last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $jhs_last_school_list_row['jhs_last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['jhs_last_school_sy']; ?>" name="jhs_last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['jhs_last_school_address']; ?>" name="jhs_last_school_address" list="search_jhs_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_jhs_last_school_address">
                                    <?php
                                    
                                    $jhs_last_school_address_list_query = $conn->query("SELECT DISTINCT jhs_last_school_address FROM students");
                                    while($jhs_last_school_address_list_row = $jhs_last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $jhs_last_school_address_list_row['jhs_last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="jhs_last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['jhs_last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    <?php if($studData_row['classification']==='Transferee'){ ?>
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <hr />
                      <p>SENIOR HIGH SCHOOL <small>(If Transferee)</small></p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['shs_last_school']; ?>" name="shs_last_school" list="search_shs_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             <datalist id="search_shs_last_school">
                                    <?php
                                    
                                    $shs_last_school_list_query = $conn->query("SELECT DISTINCT shs_last_school FROM students");
                                    while($shs_last_school_list_row = $shs_last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $shs_last_school_list_row['shs_last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['shs_last_school_sy']; ?>" name="shs_last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['shs_last_school_address']; ?>" name="shs_last_school_address" list="search_shs_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_shs_last_school_address">
                                    <?php
                                    
                                    $shs_last_school_address_list_query = $conn->query("SELECT DISTINCT shs_last_school_address FROM students");
                                    while($shs_last_school_address_list_row = $shs_last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $shs_last_school_address_list_row['shs_last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="shs_last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['shs_last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    <?php } } ?>
                    <!-- ### END SENIOR HIGH SCHOOL ### -->
                    
                    <!-- ### COLLEGE ### -->
                    <?php if($studData_row['dept']==='College'){ ?>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <p>ELEMENTARY SCHOOL</p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['elem_last_school']; ?>" name="elem_last_school" list="search_elem_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             <datalist id="search_elem_last_school">
                                    <?php
                                    
                                    $elem_last_school_list_query = $conn->query("SELECT DISTINCT elem_last_school FROM students");
                                    while($elem_last_school_list_row = $elem_last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $elem_last_school_list_row['elem_last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['elem_last_school_sy']; ?>" name="elem_last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['elem_last_school_address']; ?>" name="elem_last_school_address" list="search_elem_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_elem_last_school_address">
                                    <?php
                                    
                                    $elem_last_school_address_list_query = $conn->query("SELECT DISTINCT elem_last_school_address FROM students");
                                    while($elem_last_school_address_list_row = $elem_last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $elem_last_school_address_list_row['elem_last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="elem_last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['elem_last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <hr />
                      <p>JUNIOR SCHOOL</p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['jhs_last_school']; ?>" name="jhs_last_school" list="search_jhs_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             <datalist id="search_jhs_last_school">
                                    <?php
                                    
                                    $jhs_last_school_list_query = $conn->query("SELECT DISTINCT jhs_last_school FROM students");
                                    while($jhs_last_school_list_row = $jhs_last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $jhs_last_school_list_row['jhs_last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['jhs_last_school_sy']; ?>" name="jhs_last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['jhs_last_school_address']; ?>" name="jhs_last_school_address" list="search_jhs_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_jhs_last_school_address">
                                    <?php
                                    
                                    $jhs_last_school_address_list_query = $conn->query("SELECT DISTINCT jhs_last_school_address FROM students");
                                    while($jhs_last_school_address_list_row = $jhs_last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $jhs_last_school_address_list_row['jhs_last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="jhs_last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['jhs_last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <hr />
                      <p>SENIOR HIGH SCHOOL</p>
                        <div class="row">
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['shs_last_school']; ?>" name="shs_last_school" list="search_shs_last_school" class="form-control form-control-sm" placeholder="Complete school name" required="" />
                             <datalist id="search_shs_last_school">
                                    <?php
                                    
                                    $shs_last_school_list_query = $conn->query("SELECT DISTINCT shs_last_school FROM students");
                                    while($shs_last_school_list_row = $shs_last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $shs_last_school_list_row['shs_last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Name of School</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['shs_last_school_sy']; ?>" name="shs_last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['shs_last_school_address']; ?>" name="shs_last_school_address" list="search_shs_last_school_address" class="form-control form-control-sm" required="" />
                             <datalist id="search_shs_last_school_address">
                                    <?php
                                    
                                    $shs_last_school_address_list_query = $conn->query("SELECT DISTINCT shs_last_school_address FROM students");
                                    while($shs_last_school_address_list_row = $shs_last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $shs_last_school_address_list_row['shs_last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="shs_last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['shs_last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    
                    <?php if($studData_row['classification']==='Transferee'){ ?>
                    <div class="form-group row">
                      <div class="col-sm-12">
                      <hr />
                      <p>COLLEGE <small>(If Transferee)</small></p>
                        <div class="row">
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['col_last_school']; ?>" name="col_last_school" list="search_col_last_school" class="form-control form-control-sm" placeholder="Name of school" required="" />
                             <datalist id="search_col_last_school">
                                    <?php
                                    
                                    $col_last_school_list_query = $conn->query("SELECT DISTINCT col_last_school FROM students");
                                    while($col_last_school_list_row = $col_last_school_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $col_last_school_list_row['col_last_school']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>Last School Attended</small>
                          </div>
                          
                          <div class="col-md-3">
                             <input value="<?php echo $studData_row['col_last_school_sy']; ?>" name="col_last_school_sy" class="form-control form-control-sm" required="" />
                             <small>School Year</small>
                          </div>
                          
                          <div class="col-md-12" style="margin-bottom: 12px;"></div>
                          
                          <div class="col-md-9">
                             <input value="<?php echo $studData_row['col_last_school_address']; ?>" name="col_last_school_address" list="search_col_last_school_address" class="form-control form-control-sm" placeholder="Complete school address" required="" />
                             <datalist id="search_col_last_school_address">
                                    <?php
                                    
                                    $col_last_school_address_list_query = $conn->query("SELECT DISTINCT col_last_school_address FROM students");
                                    while($col_last_school_address_list_row = $col_last_school_address_list_query->fetch()){ ?>
                                    
                                    <option><?php echo $col_last_school_address_list_row['col_last_school_address']; ?></option>
                                    
                                    <?php } ?>
                             </datalist>
                             <small>School Address</small>
                          </div>
                          
                          <div class="col-md-3">
                              <select name="col_last_school_type" class="form-control form-control-sm">
                              <option><?php echo $studData_row['col_last_school_type']; ?></option>
                              <option>Private</option>
                              <option>Public</option>
                              </select>
                              <small>Type</small>
                          </div>
                          
                        </div>
 
                      </div>
                    </div>
                    <?php } } ?>
                    
                    
                  </div>
                  
                  <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
                    <div class="left-col"><a href="registration-step-one.php?reg_code=<?php echo $_GET['reg_code']; ?>" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Personal Information</a></div>
                    <div class="right-col">
                      <button name="update_step_two" type="submit" class="btn btn-template-main">Save Changes &amp; Continue to Parents/Guardian Information <i class="fa fa-chevron-right"></i></button>
                    </div>
                  </div>
                  
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
 
      <?php include('footer.php'); ?>
    </div>
    <?php include('js_files.php'); ?>
  </body>
</html>