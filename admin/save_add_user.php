<?php include('session.php'); ?>
 

<?php

if(isset($_POST['addUser']))
{
    $access=$_POST['access'];
    
    if($access==='Administrator'){
        $dept="All";
        
    }else{
        $dept=$_POST['dept'];
        
    }
    
    
    $fname=strtoupper($_POST['fname']);
    $lname=strtoupper($_POST['lname']);
    $email=$_POST['email'];
    $contact_num="+63".$_POST['contact_num'];
    
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $safe_pass=md5($password);
    $salt="a1Bz20ydqelm8m1wql";
    $final_pass=$salt.$safe_pass;
    
    $retype_pass=$_POST['retype_pass'];
    $admin_pass=$_POST['admin_pass'];
    
    $safe_admin_pass=md5($admin_pass);
    $final_admin_pass=$salt.$safe_admin_pass;
 
    $CHK_user_query = $conn->query("SELECT * FROM useraccount WHERE username='$username' OR email='$email'") or die(mysql_error());
    if($CHK_user_query->rowCount()>0){ ?>
            
            <script>
            window.alert('Username/Email <?php echo $gradeLevel.' - '.$strand.' - '.$section; ?> already taken...');
            window.location='list_users.php';
            </script>
            
    <?php }else{ if($password===$retype_pass){ if($final_admin_pass===$check_pass){

            //save account
            $saveNewUser = "INSERT INTO useraccount(fname, lname, email, contact_num, username, password, user_type, access, dept, verification_status)
            VALUES ('$fname', '$lname', '$email', '$contact_num', '$username', '$final_pass', 'Personnel', '$access', '$dept', 'Verified')";
            $conn->exec($saveNewUser);
            
            // Subject
            $subject = 'STC WEB PORTAL USER ACCOUNT DETAILS';
            
            // Message
            $message = '
            <html>
            <head>
              <title>STC WEB PORTAL USER ACCOUNT DETAILS</title>
            </head>
            <body>
            <p>Welcome to STC WEB PORTAL Community!</p>
            
            <h5>Account Details</h5>
              <table>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Access</th>
                  <th>Department</th>
                </tr>
                <tr>
                  <td>'.$username.'</td>
                  <td>'.$password.'</td>
                  <td>'.$access.'</td>
                  <td>'.$dept.'</td>
                </tr>
              </table>
              
            <p>Please never share your account details to anyone. STC WEB PORTAL <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
            
            </body>
            </html>
            ';
            
            // To send HTML mail, the Content-type header must be set
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            
            // Additional headers
            $headers[] = 'To: '.$fname.' '.$lname.'<'.$email.'>';
            $headers[] = 'From: STA. TERESA COLLEGE <inquiry@stcbauan.edu.ph>';
            
            // Mail it
            mail($email, $subject, $message, implode("\r\n", $headers));
            
            $conn=null;
            
            ?>  

            <script>
            window.alert('User <?php echo $lname.', '.$fname; ?> added successfully as <?php echo $access; ?>...');
            window.location='list_users.php';
            </script>
            
    <?php }else{ ?>

            <script>
            window.alert('Invalid Administrator password.');
            window.location='list_users.php';
            </script>
            
    <?php } }else{ ?>

            <script>
            window.alert('Retyped password did not match...');
            window.location='list_users.php';
            </script>
            
    <?php } } } ?>



    <?php
    
    if(isset($_POST['updateUser']))
    {   
        $user_id=$_POST['user_id'];
        $access=$_POST['access'];
        $dept=$_POST['dept'];
        
        $user_query = $conn->query("SELECT * FROM useraccount WHERE user_id='$user_id'") or die(mysql_error());
        $cq_row=$user_query->fetch();
        
        $admin_pass=$_POST['admin_pass'];
        $safe_pass=md5($admin_pass);
        $salt="a1Bz20ydqelm8m1wql";
        $final_admin_pass=$salt.$safe_pass;
        
        if($final_admin_pass===$check_pass){
            
            $conn->query("UPDATE useraccount SET access='$access', dept='$dept' WHERE user_id='$user_id'");
            
    ?>
    
    <script>
    window.alert('User <?php echo $cq_row['lname'].', '. $cq_row['fname']; ?> - <?php echo $cq_row['access']; ?> updated successfully...');
    window.location='list_users.php';
    </script>
    
    <?php }else{ ?>
    
    <script>
    window.alert('Invalid Administrator password.');
    window.location='list_users.php';
    </script>
    
    <?php } } ?>
 

    <?php
    
    if(isset($_POST['deleteUser']))
    {   
        $user_id=$_POST['user_id'];
        
        $user_query = $conn->query("SELECT * FROM useraccount WHERE user_id='$user_id'") or die(mysql_error());
        $cq_row=$user_query->fetch();
        
        $admin_pass=$_POST['admin_pass'];
        $safe_pass=md5($admin_pass);
        $salt="a1Bz20ydqelm8m1wql";
        $final_admin_pass=$salt.$safe_pass;
        
        if($final_admin_pass===$check_pass){
            
            $conn->query("DELETE FROM useraccount WHERE user_id='$user_id'");
            
    ?>
    
    <script>
    window.alert('User <?php echo $cq_row['lname'].', '. $cq_row['fname']; ?> - <?php echo $cq_row['access']; ?> deleted successfully...');
    window.location='list_users.php';
    </script>
    
    <?php }else{ ?>
    
    <script>
    window.alert('Invalid Administrator password.');
    window.location='list_users.php';
    </script>
    
    <?php } } ?>
 


