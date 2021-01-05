    
    
    <?php

    include('dbcon.php');
    
    $fname=strtoupper($_POST['fname']);
    $lname=strtoupper($_POST['lname']);
    $username=$_POST['username'];
    
    $chk_query=$conn->prepare("SELECT * FROM useraccount WHERE username = :username AND lname = :lname AND fname = :fname");
    $chk_query->execute(['username' => $username, 'lname' => $lname, 'fname' => $fname]);

    if($chk_query->rowCount()>0){
        
    $chk_row=$chk_query->fetch();
    
    function randomcode() {
    $var = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $code = '';
    while ($i <= 9) {
    $num = rand() % 33;
    $tmp = substr($var, $num, 1);
    $code = $code . $tmp;
    $i++;
    }
    return $code;
    }
    
    $temp_pass=randomcode();
    $v_code=randomcode();
    
    $email=$_POST['email'];
    $contact_num="+63".$_POST['contact_num'];
    $safe_pass=md5($temp_pass);
    $salt="a1Bz20ydqelm8m1wql";
    $final_pass=$salt.$safe_pass;
    //save account
    $updateUser = 'UPDATE useraccount SET email = :email, contact_num = :contact_num, password = :password, user_type = :user_type, access = :access, v_code = :v_code, verification_status = :verification_status WHERE username = :username';
    $conn->prepare($updateUser)->execute(['email' => $email, 'contact_num' => $contact_num, 'password' => $final_pass, 'user_type' => 'Student', 'access' => 'User', 'v_code' => $v_code, 'verification_status' => 'Pending', 'username' => $username]);
     
    $saveNewStudent = "INSERT INTO students(student_id, fname, lname, email, contact_num, v_code)VALUES('$username', '$fname', '$lname', '$email', '$contact_num', '$v_code')";
    $conn->exec($saveNewStudent);
    
    // Subject
    $subject = 'STC WEB PORTAL ACCOUNT VERIFICATION';
    
    // Message
    $message = '
    <!DOCTYPE html>
    <html>
    <head>
    <style>
    p {
      border: 1px solid #e5eb0b;
      outline: #075907 solid 5px;
      margin: auto;  
      padding: 20px;
      background-color: #097609;
      color: white;
    }
    
    .btn {
      font-weight: 400;
      border: 1px solid transparent;
      padding: 0.55rem 0.75rem;
      font-size: 0.9rem;
      line-height: 1.5;
      border-radius: 0;
      -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
      transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
      transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    }
    
    
    .btn-success {
      color: color-yiq(#28a745);
      background-color: #28a745;
      border-color: white;
    }
    
    .btn-success:hover {
      color: color-yiq(#218838);
      background-color: #218838;
      border-color: white;
    }
    
    .btn-success:focus, .btn-success.focus {
      -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
      box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
    }
     
    .btn-success:not([disabled]):not(.disabled):active, .btn-success:not([disabled]):not(.disabled).active,
    .show > .btn-success.dropdown-toggle {
      color: color-yiq(#1e7e34);
      background-color: #1e7e34;
      border-color: #1c7430;
      -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
      box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
    }
    
    </style>
    
    <title>Sta. Teresa College – SIS</title>
    
    </head>
    <body>
    <p style="text-align: center;">
    <img src="http://stcbauan.edu.ph/stc-edu/img/stc_logo.png" style="width: 5%; height: 5%;" /><br />
    <strong style="font-size: x-large;">STA. TERESA COLLEGE</strong><br />
    Bauan, Batangas<br /><br />
    STUDENT INFORMATION SYSTEM
    </p>
    
    <br />
    
    <p style="background-color: white; color: #075907;">
    Good Day!<br /><br />
    
    Thank you for using STC Web Portal.<br /><br />
    
    The information you have shared has already been recorded and saved by the school’s Registrar’s Office under the protection of the Data Privacy Act of 2012.<br /><br />
    
    Take note of the username and password that you have entered.  This will be used in the next steps of our admissions process.<br /><br />
    
    <strong style="text-decoration: underline;">STUDENT ACCOUNT DETAILS</strong><br /><br />
    <strong>Username: '.$username.'</strong><br />
    <strong>Password: '.$temp_pass.'</strong><br /><br /><br />
    
    Click button to activate account.<br /><br />
    <a href="'.$link_uri_test.'verify_account.php?email='.$email.'&v_code='.$v_code.'" target="_blank" class="btn btn-success" style="color: white; text-decoration-line: none;"><strong>ACTIVATE ACCOUNT</strong></a><br />
 
      
    <br /><br />
    
    For inquiries, you can email us at <strong style="color: #097609;">admission@stcbauan.edu.ph</strong>.  You can also send your inquiries to our official <a href="https://www.facebook.com/OfficialStcBauan/" target="_blank" style="font-weight: bold; color: #097609;">Facebook</a> page.
      
    </p>
    
    </body>
    </html>
    ';
    
    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
    // Additional headers
    $headers[] = 'To: '.$fname.' '.$lname.'<'.$email.'>';
    $headers[] = 'From: STA. TERESA COLLEGE <online@stcbauan.edu.ph>';
    
    // Mail it
    mail($email, $subject, $message, implode("\r\n", $headers));
    
    $conn=null;
    
    ?> 
    
    <script>
    window.alert('Registration success! Please verify account through email before you login...');
    window.location='user-login-register-verify.php?email=<?php echo $email; ?>';
    </script>
 
    <?php }else{ ?>
    
    <script>
    window.alert('Student not found. Please check School ID Code matched with student Last name and First name.');
    window.location='user-login-register.php';
    </script>
    
    <?php } ?>
     