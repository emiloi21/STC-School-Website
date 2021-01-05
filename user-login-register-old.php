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
              <h1 class="h2">New Account / Login</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">New Account / Login</li>
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
              
              <ul id="pills-tab" role="tablist" class="nav nav-pills nav-justified">
                <li class="nav-item"><a id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" class="nav-link active">New / Transferee Students</a></li>
                <li class="nav-item"><a id="pills-marketing-tab" data-toggle="pill" href="#pills-marketing" role="tab" aria-controls="pills-contact" aria-selected="false" class="nav-link">Old Students</a></li>
              </ul>
              
              <div id="pills-tabContent" class="tab-content">
              
              <!-- NEW STUDENTS REGISTRATION FORM-->
              <div id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" class="tab-pane fade show active">

                <p class="lead">Registration for new / transferee students</p>
                <p>Register to portal to access online enrolment and view profiles</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="school-contact.php" target="_blank">contact us</a></p>
                <hr />
                <form method="POST" action="save_new_account.php">
                
                  <div class="form-group">
                    <label for="fname-login">First Name</label>
                    <input name="fname" id="fname-login" type="text" class="form-control" required="" />
                  </div>
                  
                  <div class="form-group">
                    <label for="lname-login">Last Name</label>
                    <input name="lname" id="lname-login" type="text" class="form-control" required="" />
                  </div>
                  
                  <div class="form-group">
                    <label for="email-login">Working Email</label>
                    <input name="email" id="email-login" type="email" class="form-control" required="" />
                  </div>
                  
                  <div class="form-group">
                  
                    <label for="contact_num-login">Mobile Number</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                            <input name="contact_num" id="contact_num-login" type="text" class="form-control" required="" />
                        </div>
                    </div>
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="uname-login">Username</label>
                    <input name="username" id="uname-login" type="text" class="form-control" required="" />
                  </div>
                  
                  <div class="form-group">
                    <label for="passwordz">Password</label>
                    <input id="passwordz" type="password" name="password" class="form-control" required="" />
                  </div>
                  
                  <div class="form-group">
                    <label for="confirm_passwordx">Retype Password</label>
                    <input id="confirm_passwordx" type="password" name="password2" class="form-control" required="" />
                    <small class="form-text"><span id="message"></span></small>
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-user-plus"></i> Register</button>
                  </div>
                </form>
                
              </div>
              <!-- END NEW STUDENTS REGISTRATION FORM-->
              
              <!-- OLD STUDENTS REGISTRATION FORM-->
              <div id="pills-marketing" role="tabpanel" aria-labelledby="pills-marketing-tab" class="tab-pane fade">
                <p class="lead">Registration for old students</p>
                <p>Register to portal to access online enrolment and view profiles</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="school-contact.php" target="_blank">contact us</a></p>
                <hr />
                <form method="POST" action="save_old_stud_account.php">
                
                  <div class="form-group">
                    <label for="uname2-login">School ID Code</label>
                    <input name="username" id="uname2-login" type="text" class="form-control" required="" />
                  </div>
                  
                  <div class="form-group">
                    <label for="fname2-login">First Name</label>
                    <input name="fname" id="fname2-login" type="text" class="form-control" required="" />
                  </div>
                  
                  <div class="form-group">
                    <label for="lname2-login">Last Name</label>
                    <input name="lname" id="lname2-login" type="text" class="form-control" required="" />
                  </div>
                  
                  <div class="form-group">
                    <label for="email2-login">Email</label>
                    <input name="email" id="email2-login" type="email" class="form-control" required="" />
                  </div>
                  
                  <div class="form-group">
                  
                    <label for="contact_num-login">Mobile Number</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">+63</span></div>
                            <input name="contact_num" id="contact_num-login" type="text" class="form-control" required="" />
                        </div>
                    </div>
                    
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-user-plus"></i> Register</button>
                  </div>
                </form>
                
              </div>
              <!-- END OLD STUDENTS REGISTRATION FORM-->
              
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
          </div>
        </div>
      </div>
 
      <?php include('footer.php'); ?>
    </div>
    <?php include('js_files.php'); ?>
  </body>
</html>