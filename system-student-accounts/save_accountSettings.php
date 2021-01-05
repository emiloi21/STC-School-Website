    <?php

    include('session.php');
    
    
    if(isset($_POST['updateAccountInfo'])){
    
    $fname=strtoupper($_POST['fname']);
    $lname=strtoupper($_POST['lname']);
    $email=$_POST['email'];
    $contact_num=$_POST['contact_num'];
 
    $safe_vPass=md5($_POST['verify_pass']);
    $saltV="a1Bz20ydqelm8m1wql";
    $final_verify_pass=$saltV.$safe_vPass;
        
    if($check_pass===$final_verify_pass){
        
        $updateUser = 'UPDATE useraccount SET fname = :fname, lname = :lname, email = :email, contact_num = :contact_num WHERE user_id = :user_id';
        $conn->prepare($updateUser)->execute(['fname' => $fname, 'lname' => $lname, 'email' => $email, 'contact_num' => $contact_num, 'user_id' => $session_id]);
        
        $conn=null;
    ?>
    
    <script>
    window.alert('Data successfully updated...');
    window.location='user_profile.php';
    </script>
    
    <?php }else{ ?>
    
    <script>
    window.alert('Verification password did not match...');
    window.location='user_profile.php';
    </script>
    
    <?php } } ?>
    
    
    
    <?php 
    
    if(isset($_POST['updateAccountUname'])){
    $username=$_POST['username'];
    
    $safe_vPass=md5($_POST['verify_pass']);
    $saltV="a1Bz20ydqelm8m1wql";
    $final_verify_pass=$saltV.$safe_vPass;
        
    if($check_pass===$final_verify_pass){
        
        $updateUser = 'UPDATE useraccount SET username = :username WHERE user_id = :user_id';
        $conn->prepare($updateUser)->execute(['username' => $username, 'user_id' => $session_id]);
        
        $conn=null;
    ?>
    
    <script>
    window.alert('Username successfully updated...');
    window.location='user_profile.php';
    </script>
    
    <?php }else{ ?>
    
    <script>
    window.alert('Verification password did not match...');
    window.location='user_profile.php';
    </script>
    
    <?php } } ?>
    
    
    <?php 
    
    if(isset($_POST['updateAccountSecurity'])){
   
    $new_pass=$_POST['new_pass'];
    $new_pass2=$_POST['new_pass2'];
    
    $safe_vPass=md5($_POST['verify_pass']);
    $saltV="a1Bz20ydqelm8m1wql";
    $final_verify_pass=$saltV.$safe_vPass;
    
    
    $safe_newPass=md5($new_pass);
    $saltNew="a1Bz20ydqelm8m1wql";
    $final_newPass=$saltNew.$safe_newPass;
    
    
    if($check_pass===$final_verify_pass){
    
    if($new_pass===$new_pass2){
        
        $updateUser = 'UPDATE useraccount SET password = :password WHERE user_id = :user_id';
        $conn->prepare($updateUser)->execute(['password' => $final_newPass, 'user_id' => $session_id]);
        
            // Subject
            $subject = 'STC WEB PORTAL - CHANGE PASSWORD';
            
            // Message
            $message = '
            <html>
            <head>
              <title>STC WEB PORTAL - CHANGE PASSWORD</title>
            </head>
            <body>
             
            <h5>STC WEB PORTAL Account Details</h5>
              <table>
                <tr>
                  <th>Username</th>
                  <th>New Password</th>
                </tr>
                <tr>
                  <td>'.$user_row['username'].'</td>
                  <td>'.$new_pass.'</td>
                </tr>
              </table>
            </body>
            </html>
            ';
            
            // To send HTML mail, the Content-type header must be set
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            
            // Additional headers
            $headers[] = 'To: '.$user_row['fname'].' '.$user_row['lname'].'<'.$user_row['email'].'>';
            $headers[] = 'From: STC WEB PORTAL <idlebingo@gmail.com>';
            
            // Mail it
            mail($user_row['email'], $subject, $message, implode("\r\n", $headers));
            
            $conn=null;
    ?>
    
    <script>
    window.alert('Password successfully updated...');
    window.location='user_profile.php';
    </script>
    
    <?php }else{ ?>
    
    <script>
    window.alert('New password and retyped password did not match...');
    window.location='user_profile.php';
    </script>
    
    <?php } }else{ ?>
    
    <script>
    window.alert('Verification password did not match...');
    window.location='user_profile.php';
    </script>
    
    <?php } } ?>
    
    
 