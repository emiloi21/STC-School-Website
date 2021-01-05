<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>

  <?php
  $sfp_stat=$_GET['sfp_stat'];
  $get_dept=$_GET['dept'];
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
            <li class="breadcrumb-item active">List of Teachers</li>
          </ul>
        </div>
      </div>
      
      
      
      
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              
              
              <!-- kinder 1     -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><?php echo $get_dept; ?></a>
                  
                  &nbsp;&nbsp; <a style="color: white !important;" data-toggle="modal" data-target="#addSubjKinder" href="#addSubjKinder" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                  
                  </h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxKinder" aria-expanded="true" aria-controls="updates-boxKinder"><i class="fa fa-angle-down"></i></a>
                </div>
                
                <div id="updates-boxKinder" role="tabpanel" class="collapse show">
                  
                  <div class="table-responsive">
             
                    <table class="table table-striped table-sm" id="example" style="margin: 0px 8px 0px 8px;">
                      <thead>
                        <tr>
                          <th>ID Code</th>
                          <th>Full Name</th>
                          <th>Confirmation Code</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                            <?php
                            $subjK_ctr=0;
                            if($get_dept=="Kinder"){
                    
                              $subjK_query = $conn->query("select * FROM teachers WHERE kinder=1 ORDER BY lname, fname ASC") or die(mysql_error());
                              
                              }elseif($get_dept=="Elementary"){
                                
                              $subjK_query = $conn->query("select * FROM teachers WHERE elementary=1 ORDER BY lname, fname ASC") or die(mysql_error());
                                
                              }elseif($get_dept=="JHS"){
                                
                              $subjK_query = $conn->query("select * FROM teachers WHERE jhs=1 ORDER BY lname, fname ASC") or die(mysql_error());
                               
                              }else{
                                
                              $subjK_query = $conn->query("select * FROM teachers WHERE shs=1 ORDER BY lname, fname ASC") or die(mysql_error());
                               
                              }
                           
                            while ($subjK_row = $subjK_query->fetch()) 
                            { 
                                $teacher_id=$subjK_row['teacher_id'];
                                ?>
           
                        <tr>
                    
                          <td><?php echo $subjK_row['teacher_idCode']; ?></td>
                          <td>
                          <?php
                          
                          if($subjK_row['extension']=="")
                                {
                                    if($subjK_row['suffix']=="-")
                                    {
                                        
                                    $classAdviser=$subjK_row['fname']." ".substr($subjK_row['mname'], 0,1).". ".$subjK_row['lname'];
                                    
                                    }else{
                                        
                                    $classAdviser=$subjK_row['fname']." ".substr($subjK_row['mname'], 0,1).". ".$subjK_row['lname']." ".$subjK_row['suffix'].", ".$subjK_row['extension'];
                                    
                                    }
                                
                                
                              
                                }else{
                                    
                                    if($subjK_row['suffix']=="-")
                                    {
                                        
                                    $classAdviser=$subjK_row['fname']." ".substr($subjK_row['mname'], 0,1).". ".$subjK_row['lname'].", ".$subjK_row['extension'];
                                    
                                    }else{
                                        
                                    $classAdviser=$subjK_row['fname']." ".substr($subjK_row['mname'], 0,1).". ".$subjK_row['lname']." ".$subjK_row['suffix'].", ".$subjK_row['extension'];
                                    
                                    }
                                     
                                
                                }
                          
                           echo $classAdviser; ?>
                           </td>
                           
                           <td>
                           <a style="color: white !important;" data-toggle="modal" data-target="#confCode<?php echo $teacher_id; ?>" class="btn btn-info"><i class="fa fa-lock"></i></a>
                           </td>
                           
                          <td>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#editTeacher<?php echo $teacher_id; ?>" href="#editTeacher<?php echo $teacher_id; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteTeacher<?php echo $teacher_id; ?>" href="#deleteTeacher<?php echo $teacher_id; ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
                          
                          </td>
                        </tr>
                
                
                <!-- Teacher confirmation code Modal -->
                  <div id="confCode<?php echo $teacher_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="save_add_teacher.php?sfp_stat=xEdit&dept=<?php echo $_GET['dept']; ?>" method="POST">
                      <input name="teacher_id" value="<?php echo $teacher_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title"><?php echo $subjK_row['fname']." ".$subjK_row['mname']." ".$subjK_row['lname']; ?>'s Confirmation Code</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                           
                        <h4>
                        <?php if($subjK_row['conf_code']=="") { ?>
                          Please generate code.
                        <?php }else{ 
                            echo $subjK_row['conf_code'];
                        } ?>
                        </h4>
                          
                        </div>
                        
                        <div class="modal-footer">
                        <?php if($subjK_row['conf_code']=="") { ?>
                          <button name="genCode" type="submit" class="btn btn-primary">Generate Code</button> 
                        <?php }else{ ?>
                        <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">Ok</a>
                        <?php } ?>
                          
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end Teacher confirmation code Modal -->
                  
                  
                <!-- delete Teacher Modal -->
                  <div id="deleteTeacher<?php echo $teacher_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="save_add_teacher.php?sfp_stat=xEdit&dept=<?php echo $_GET['dept']; ?>" method="POST">
                      <input name="teacher_id" value="<?php echo $teacher_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Delete Teacher</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                           
                        <h4>Are you sure you want to delete teacher:<br /><br /><?php echo $subjK_row['fname']." ".$subjK_row['mname']." ".$subjK_row['lname']; ?>?</h4>
                          
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                          <button name="deleteTeacher" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end delete Teacher Modal -->
                  
                        
                        <!-- edit Teacher Modal -->
                  <div id="editTeacher<?php echo $teacher_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                       <form action="save_add_teacher.php?sfp_stat=xEdit&dept=<?php echo $_GET['dept']; ?>" method="POST">
                       <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>" />
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Teacher</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                      
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Teacher ID</label>
                              <div class="col-sm-10">
                              
                                <input value="<?php echo $subjK_row['teacher_idCode']; ?>" name="teacher_idCode" type="text" class="form-control">
                                 
                              </div>
                            </div>
             
                          <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Full Name</label>
                              <div class="col-sm-10">
                              
                              <div class="row">
                              
                                <div class="col-md-6">
                                <input value="<?php echo $subjK_row['fname']; ?>" name="fname" type="text" class="form-control">
                                <small class="form-text">First Name</small>
                                </div>
                                
                                <div class="col-md-6">
                                <input value="<?php echo $subjK_row['mname']; ?>" name="mname" type="text" class="form-control">
                                <small class="form-text">Middle Name</small>
                                </div>
                                
                              </div>
                                
                              </div>
                            </div>
                            
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label"></label>
                              <div class="col-sm-10">
                              
                              <div class="row">
                                <div class="col-md-8">
                                <input value="<?php echo $subjK_row['lname']; ?>" name="lname" type="text" class="form-control">
                                <small class="form-text">Last Name</small>
                                </div>
                                
                                
                                  <div class="col-md-4">
                                     
                                    <select name="suffix" class="form-control">
                                    <option><?php echo $subjK_row['suffix']; ?></option>
                                    <option>-</option>
                                    <option>Sr.</option>
                                    <option>Jr.</option>
                                    <option>III</option>
                                    </select>
                                    <small class="form-text">Suffix</small>
                                  </div>
                              </div>
                                
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Extension</label>
                              <div class="col-sm-9">
                                <input value="<?php echo $subjK_row['extension']; ?>" name="extension" type="text" class="form-control">
                              </div>
                            </div>
                            
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Date of Birth</label>
                              <div class="col-sm-10">
                                <div class="row">
                                  <div class="col-md-4">
                                     
                                    <select name="bdMM" class="form-control">
                                    <option><?php echo $subjK_row['bdMM']; ?></option>
                                    <option>-</option>
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
                                    </select>
                                    <small class="form-text">Month</small>
                                  </div>
                                  <div class="col-md-4">
                                    
                                    <select name="bdDD" class="form-control">
                                    <option><?php echo $subjK_row['bdDD']; ?></option>
                                    <option>-</option>
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
                                    <small class="form-text">Day</small>
                                  </div>
                                  <div class="col-md-4">
                                     
                                    <input value="<?php echo $subjK_row['bdYYYY']; ?>" name="bdYYYY" type="text" class="form-control">
                                    <small class="form-text">Year</small>
                                    
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Mobile Number</label>
                              <div class="col-sm-10">
                                <input value="<?php echo $subjK_row['mobileNumber']; ?>" name="mobileNumber" type="text" class="form-control" placeholder="+639123456789" >
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-2 form-control-label">Departments<br></label>
                              <div class="col-sm-10">
                                <div class="i-checks">
                                
                                <?php if($subjK_row['kinder']==1){?>
                                <input id="checkboxCustom1<?php echo $teacher_id; ?>" type="checkbox" name="kinderD" value="1" class="form-control-custom" checked="">
                                <?php }else{ ?>
                                <input id="checkboxCustom1<?php echo $teacher_id; ?>" type="checkbox" name="kinderD" value="1" class="form-control-custom">
                                <?php } ?>
                                  <label for="checkboxCustom1<?php echo $teacher_id; ?>">Kinder</label>
                                </div>
                                <div class="i-checks">
                                <?php if($subjK_row['elementary']==1){?>
                                <input id="checkboxCustom2<?php echo $teacher_id; ?>" type="checkbox" name="elemD" value="1" class="form-control-custom" checked="">
                                <?php }else{ ?>
                                <input id="checkboxCustom2<?php echo $teacher_id; ?>" type="checkbox" name="elemD" value="1" class="form-control-custom">
                                <?php } ?> 
                                  <label for="checkboxCustom2<?php echo $teacher_id; ?>">Elementary</label>
                                </div>
                                <div class="i-checks">
                                <?php if($subjK_row['jhs']==1){?>
                                <input id="checkboxCustom3<?php echo $teacher_id; ?>" type="checkbox" name="jhsD" value="1" class="form-control-custom" checked="">
                                <?php }else{ ?>
                                <input id="checkboxCustom3<?php echo $teacher_id; ?>" type="checkbox" name="jhsD" value="1" class="form-control-custom">
                                <?php } ?>
                                <label for="checkboxCustom3<?php echo $teacher_id; ?>">Junior High School</label>
                                </div>
                                <div class="i-checks">
                                <?php if($subjK_row['shs']==1){?>
                                <input id="checkboxCustom4<?php echo $teacher_id; ?>" type="checkbox" name="shsD" value="1" class="form-control-custom" checked="">
                                <?php }else{ ?>
                                <input id="checkboxCustom4<?php echo $teacher_id; ?>" type="checkbox" name="shsD" value="1" class="form-control-custom">
                                <?php } ?>
                                <label for="checkboxCustom4<?php echo $teacher_id; ?>">Senior High School</label>
                                </div>
  
                              </div>
                            </div>
                    
                            
                    
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="editTeacher" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                        </form>
                        
                      </div>
                    </div>
                  </div>
                  <!-- end edit Teacher Modal -->
                  
                      
                            <?php } ?>
                       
                      </tbody>
                    </table>
                  </div>
                   
                </div>
              </div>
              <!-- kinder End-->
             
            </div>
            
          </div>
        </div>
        
        <?php include('add_teachers_modal.php'); ?>
                  
      </section>
      
      
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>

 
    
  </body>
</html>