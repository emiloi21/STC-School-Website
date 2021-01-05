<!DOCTYPE html>
<html>

    <?php include('../dbcon.php'); ?>
    
    <?php include('header.php'); ?>
  
  
    <?php
    
    $query = $conn->query("SELECT fname, lname, contact_num FROM useraccount WHERE user_id='$_GET[uid]' AND access='User'");
    $row = $query->fetch();
    
    ?>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span class="text-primary">STA. TERESA COLLEGE</span> <span class="text-secondary">WEBSITE</span></div>
            <p>ONE-TIME PIN LOGIN VERIFICATION</p>
            <hr />
            <p class="text-primary" style="font-size: large;">WELCOME BACK <?php echo $row['fname'].' '.$row['lname'] ?>!</p>
             
            <form method="POST" action="final_login.php?uid=<?php echo $_GET['uid']; ?>" class="text-left form-validate">

              <div class="form-group-material">
                <input id="login-otp" type="text" name="otp" required data-msg="Please enter your 6 digit OTP" class="input-material">
                <label for="login-otp" class="label-material">One-Time PIN (OTP)</label>
              </div>
              
              <div class="form-group text-center">
               
              &nbsp;<a style="color: white;" href="../user-login-register.php" class="btn btn-secondary">Cancel</a>
              
              &nbsp;<button id="login" class="btn btn-primary">Submit</button>
              
                 
              </div>
            </form><a data-toggle="modal" data-target="#rSendOTP" href="#" class="forgot-pass">No OTP message? Click here to resend message.</a>
          </div>
          <div class="copyrights text-center">
            <p>Template by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    
    <?php include('resend_otp.php'); ?>
    
    <?php include('js_scripts.php'); ?>
    
  </body>
</html>