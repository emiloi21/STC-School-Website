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
              <h1 class="h2">ENROLMENT</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" style="color: #075907;">Enrolment</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row">
    
            <div class="col-lg-6">
            
            
              <div class="box">
              
                    <h2 class="text-uppercase">ENROLMENT PROCEDURE</h2>
              
                    <div id="text-page">
                    
                      <p>
                      1. Present the report card to the Registrar's Office for Evaluation. <br />
                      
                      2. Proceed to the Accounting Office for assessment and payment.<br />
                      
                      3. For final enrolment, present the receipt and the assessment form at the Registrar's Office.
                      </p>
                      
                      <p style="margin-top: 12px;">
                        <strong>Notes:</strong><br />
                        <ul style="font-weight: lighter;">
                        <li style="font-style: italic; font-weight: lighter;">Scheduled date of Enrolment shall be strictly observed</li>
                        <li style="font-style: italic; font-weight: lighter;">Parent/Official guardian must sign the assessment form/s</li>
                        </ul>
                      </p>
                            
                    </div>
                    <hr />
                
              <form action="save_userInfo_reg.php" method="POST">
              <div class="form-group">
                  <label><a data-toggle="modal" data-target="#reg-code-help-modal" href="#" title="Click for help." style="text-decoration: none;">Load Registration Code <i class="fa fa-question-circle"></i></a></label>
                  <div class="form-group">
                      <div class="input-group">
                          <input name="v_code" type="text" class="form-control" maxlength="10" required="" placeholder="Enter 10-character registration code" />
                          <div class="input-group-prepend"><button name="load_reg_code" class="btn btn-primary"><i class="fa fa-check"></i> LOAD PROFILE</button></div>        
                      </div>
                  </div>
              </div>
              </form>
              
              <ul id="pills-tab" role="tablist" class="nav nav-pills nav-justified">
                <li class="nav-item"><a id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" class="nav-link active">New Student</a></li>
                <li class="nav-item"><a id="pills-marketing-tab" data-toggle="pill" href="#pills-marketing" role="tab" aria-controls="pills-contact" aria-selected="false" class="nav-link">Old Student</a></li>
                <li class="nav-item"><a id="pills-home2-tab" data-toggle="pill" href="#pills-home2" role="tab" aria-controls="pills-home2" aria-selected="true" class="nav-link">Transferee</a></li>
              </ul>
              
              <div id="pills-tabContent" class="tab-content">
              
              <!-- NEW STUDENTS REGISTRATION FORM-->
              <div id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" class="tab-pane fade show active">

                <p class="lead" style="margin-bottom: 6px;">Registration for new students</p>
                <p>Please select grade level/course to apply.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="school-contact.php" target="_blank">contact us</a></p>
                <hr />
                
                <div class="text-center">
                    
                    <a data-toggle="modal" data-target="#new-gradeschool-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $gs_sched_row['start_date_mm'].'/'.$gs_sched_row['start_date_dd'].'/'.$gs_sched_row['start_date_yyyy'].' - '.$gs_sched_row['end_date_mm'].'/'.$gs_sched_row['end_date_dd'].'/'.$gs_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> Grade School
                    <br /><small>Pre-School</small>
                    </a>
                    
                    <a data-toggle="modal" data-target="#new-jhs-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $jhs_sched_row['start_date_mm'].'/'.$jhs_sched_row['start_date_dd'].'/'.$jhs_sched_row['start_date_yyyy'].' - '.$jhs_sched_row['end_date_mm'].'/'.$jhs_sched_row['end_date_dd'].'/'.$jhs_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> Junior High School<br /><small>Incoming Grade 7</small>
                    </a>
                    
                    <a data-toggle="modal" data-target="#new-shs-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $shs_sched_row['start_date_mm'].'/'.$shs_sched_row['start_date_dd'].'/'.$shs_sched_row['start_date_yyyy'].' - '.$shs_sched_row['end_date_mm'].'/'.$shs_sched_row['end_date_dd'].'/'.$shs_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> Senior High School<br /><small>Incoming Grade 11</small>
                    </a>
                    
                    <a data-toggle="modal" data-target="#new-college-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $col_sched_row['start_date_mm'].'/'.$col_sched_row['start_date_dd'].'/'.$col_sched_row['start_date_yyyy'].' - '.$col_sched_row['end_date_mm'].'/'.$col_sched_row['end_date_dd'].'/'.$col_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> College<br /><small>Incoming 1st Year</small>
                    </a>
                    
                </div>
                
              </div>
              <!-- END NEW STUDENTS REGISTRATION FORM-->
              
              <!-- OLD STUDENTS REGISTRATION FORM-->
              <div id="pills-marketing" role="tabpanel" aria-labelledby="pills-marketing-tab" class="tab-pane fade">
                <p class="lead" style="margin-bottom: 6px;">Registration for old students</p>
                <p>Please select grade level/course to apply.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="school-contact.php" target="_blank">contact us</a></p>
                <hr />
                
                <div class="text-center">
                    
                    <a data-toggle="modal" data-target="#old-student-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $gs_sched_row['start_date_mm'].'/'.$gs_sched_row['start_date_dd'].'/'.$gs_sched_row['start_date_yyyy'].' - '.$gs_sched_row['end_date_mm'].'/'.$gs_sched_row['end_date_dd'].'/'.$gs_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> Grade School
                    <br /><small>Pre-School &amp; Grade 1 - Grade 6</small>
                    </a>
                    
                    <a data-toggle="modal" data-target="#old-student-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $jhs_sched_row['start_date_mm'].'/'.$jhs_sched_row['start_date_dd'].'/'.$jhs_sched_row['start_date_yyyy'].' - '.$jhs_sched_row['end_date_mm'].'/'.$jhs_sched_row['end_date_dd'].'/'.$jhs_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> Junior High School<br /><small>Grade 8 - Grade 10</small>
                    </a>
                    
                    <a data-toggle="modal" data-target="#old-student-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $shs_sched_row['start_date_mm'].'/'.$shs_sched_row['start_date_dd'].'/'.$shs_sched_row['start_date_yyyy'].' - '.$shs_sched_row['end_date_mm'].'/'.$shs_sched_row['end_date_dd'].'/'.$shs_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> Senior High School<br /><small>Grade 12</small>
                    </a>
                    
                    <a data-toggle="modal" data-target="#old-student-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $col_sched_row['start_date_mm'].'/'.$col_sched_row['start_date_dd'].'/'.$col_sched_row['start_date_yyyy'].' - '.$col_sched_row['end_date_mm'].'/'.$col_sched_row['end_date_dd'].'/'.$col_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> College<br /><small>2nd Year - 4th Year</small>
                    </a>
                    
                </div>
                
              </div>
              <!-- END OLD STUDENTS REGISTRATION FORM-->
              
              
              <!-- TRANSFEREE STUDENTS REGISTRATION FORM-->
              <div id="pills-home2" role="tabpanel" aria-labelledby="pills-home2-tab" class="tab-pane fade">
                <p class="lead" style="margin-bottom: 6px;">Registration for transferee students</p>
                <p>Please select grade level/course to apply.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="school-contact.php" target="_blank">contact us</a></p>
                <hr />
                
                <div class="text-center">
                    
                    <a data-toggle="modal" data-target="#trans-gradeschool-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $gs_sched_row['start_date_mm'].'/'.$gs_sched_row['start_date_dd'].'/'.$gs_sched_row['start_date_yyyy'].' - '.$gs_sched_row['end_date_mm'].'/'.$gs_sched_row['end_date_dd'].'/'.$gs_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> Grade School
                    <br /><small>Grade 1 - Grade 6</small>
                    </a>
                    
                    <a data-toggle="modal" data-target="#trans-jhs-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $jhs_sched_row['start_date_mm'].'/'.$jhs_sched_row['start_date_dd'].'/'.$jhs_sched_row['start_date_yyyy'].' - '.$jhs_sched_row['end_date_mm'].'/'.$jhs_sched_row['end_date_dd'].'/'.$jhs_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> Junior High School<br /><small>Grade 8 - Grade 10</small>
                    </a>
                    
                    <a data-toggle="modal" data-target="#trans-shs-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $shs_sched_row['start_date_mm'].'/'.$shs_sched_row['start_date_dd'].'/'.$shs_sched_row['start_date_yyyy'].' - '.$shs_sched_row['end_date_mm'].'/'.$shs_sched_row['end_date_dd'].'/'.$shs_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> Senior High School<br /><small>Grade 12</small>
                    </a>
                    
                    <a data-toggle="modal" data-target="#trans-college-modal" class="btn btn-template-outlined btn-block" style="text-align: left;">
                    <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $col_sched_row['start_date_mm'].'/'.$col_sched_row['start_date_dd'].'/'.$col_sched_row['start_date_yyyy'].' - '.$col_sched_row['end_date_mm'].'/'.$col_sched_row['end_date_dd'].'/'.$col_sched_row['end_date_yyyy']; ?></small>
                    <br />
                    <i class="fa fa-user"></i> College<br /><small>2nd Year - 4th Year</small>
                    </a>
                    
                </div>
                
              </div>
              <!-- END TRANSFEREE STUDENTS REGISTRATION FORM-->
              
              </div>
              
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box">
                <h2 class="text-uppercase">Login</h2>
                <p class="lead">Login your account here!</p>
                <p class="text-muted">Make sure account is already verified before login</p>
                <hr />
                <form action="user-student/login.php" method="POST">
  
                  <div class="form-group">
                    <label for="username">Username / School ID Code / Email</label>
                    <input name="username" id="username" type="text" class="form-control" required="" />
                  </div>
                  <div class="form-group">
                    <label for="passwordx">Password</label>
                    <input name="password" id="passwordx" type="password" class="form-control" required="" />
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                  </div>
                </form>
              </div>
              
            </div>
            
            
            
            <?php include('reg_set_course_modal.php'); ?>
            
            
            
          </div>
        </div>
      </div>
 
      <?php include('footer.php'); ?>
    </div>
    <?php include('js_files.php'); ?>
    
    <script type="text/javascript">
    
    function checkLRNStatus(){
        //alert("came");
    var lrn=$("#lrn").val();// value in field lrn
    $.ajax({
        type:'POST',
            url:'checkLRN.php',// put your real file name 
            data:{lrn: lrn},
            success:function(msg){
            $('#lrn_message').html(msg).css('color', 'red');
            }
     });
    }
    
    
    function checkLRNStatus_jhs(){
        //alert("came");
    var lrn=$("#lrn_jhs").val();// value in field lrn
    $.ajax({
        type:'POST',
            url:'checkLRN.php',// put your real file name 
            data:{lrn: lrn},
            success:function(msg){
            $('#lrn_message_jhs').html(msg).css('color', 'red');
            }
     });
    }
    
    
    function checkLRNStatus_shs(){
        //alert("came");
    var lrn=$("#lrn_shs").val();// value in field lrn
    $.ajax({
        type:'POST',
            url:'checkLRN.php',// put your real file name 
            data:{lrn: lrn},
            success:function(msg){
            $('#lrn_message_shs').html(msg).css('color', 'red');
            }
     });
    }
    
    
    
    </script>
  </body>
</html>