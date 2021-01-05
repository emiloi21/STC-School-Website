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
              <h1 class="h2">New Account</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Verify Account</li>
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
                <h2 class="text-uppercase">Verify account</h2>
                
                <p class="text-muted">If you have any questions, please feel free to <a href="school-contact.php" target="_blank">contact us</a></p>
                
                <hr />
                
                <h5>You're almost done! We sent an activation mail to <strong style="text-decoration-line: underline;"><?php echo $_GET['email']; ?></strong>. Please follow the instructions in the mail to activate your account.</h5>
                <p>If it doesn't arrive, check your spam folder.</p>
                
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