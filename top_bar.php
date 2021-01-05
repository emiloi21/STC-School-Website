    <div id="loader" class="center"></div> 
    <button onclick="topFunction()" id="myBtn" class="btn btn-primary btn-sm" title="Go to top" style="color: #e5eb0b; border: 1px solid #e5eb0b;;"><i class="fa fa-angle-double-up"></i></button>
  

    <!-- Top bar-->
      <div class="top-bar">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-6 d-md-block d-none">
              <p><i class="fa fa-phone"></i> 043 727 1174 &nbsp;&nbsp; <i class="fa fa-envelope"></i> inquiry@stcbauan.edu.ph &middot; admission@stcbauan.edu.ph</p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-between">
                <ul class="list-inline contact-info d-block d-md-none">
                  <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#contact-modal" class="login-btn"><i class="fa fa-phone"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#contact-modal" class="login-btn"><i class="fa fa-envelope"></i></a></li>
                </ul>
                <div class="login">
                <a href="#" data-toggle="modal" data-target="#login-modal" class="login-btn"><i class="fa fa-users"></i><span class="d-none d-md-inline-block">Login</span></a>
                <a href="user-login-register.php" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">ENROLMENT</span></a>
                </div>
                <ul class="social-custom list-inline">
                  <li class="list-inline-item"><a href="https://facebook.com/OfficialStcbauan" target="_blank"><i class="fa fa-facebook"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Top bar end-->
      
      <!-- Login Modal-->
      <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">User Login</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
            
                <form action="user-student/login.php" method="POST">
 
                  <div class="form-group">
                    <label for="username">Username / Email</label>
                    <input name="username" id="username" type="text" class="form-control" required="" />
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" id="password" type="password" class="form-control" required="" />
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                  </div>
                </form>
                
              <p class="text-center text-muted" style="margin-top: 12px;">
              Not registered yet? <a href="user-login-register.php"><strong>Register now</strong></a>! To access more information.
              <br />
              Personnel login? Click <a href="admin/index.php"><strong>here</strong></a>.
              </p>
            
            </div>
          </div>
        </div>
      </div>
      <!-- Login modal end-->
      
      <!-- Login Modal-->
      <div id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="login-modalLabel" class="modal-title">Contact Us</h4>
              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
            </div>
            <div class="modal-body">
            
              <p><i class="fa fa-phone"></i>&nbsp;&nbsp;043 727 1174</p>
              <p><i class="fa fa-envelope"></i>&nbsp;&nbsp;inquiry@stcbauan.edu.ph</p>
              <p><i class="fa fa-envelope"></i>&nbsp;&nbsp;admission@stcbauan.edu.ph</p>
              
            </div>
          </div>
        </div>
      </div>
      <!-- Login modal end-->