    <?php

    include('session.php');
    
    
    if(isset($_POST['updateAccountInfo'])){
    
    $fname=strtoupper($_POST['fname']);
    $lname=strtoupper($_POST['lname']);
    $mname=strtoupper($_POST['mname']);
    $suffix=$_POST['suffix'];
    
    $email=$_POST['email'];
    $contact_num='+63'.$_POST['contact_num'];
 
    $safe_vPass=md5($_POST['verify_pass']);
    $saltV="a1Bz20ydqelm8m1wql";
    $final_verify_pass=$saltV.$safe_vPass;
        
    if($check_pass===$final_verify_pass){
        
        $updateUser = 'UPDATE tbl_book_students SET fname = :fname, lname = :lname, mname = :mname, suffix = :suffix, email = :email, contact_num = :contact_num WHERE reg_id = :reg_id';
        $conn->prepare($updateUser)->execute(['fname' => $fname, 'lname' => $lname, 'mname' => $mname, 'suffix' => $suffix, 'email' => $email, 'contact_num' => $contact_num, 'reg_id' => $session_id]);
        
        $conn=null;
    ?>
    
    <script>
    window.alert('Student profie updated successfully.');
    window.location='user_profile.php';
    </script>
    
    <?php }else{ ?>
    
    <script>
    window.alert('Verification password did not match.');
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
        
        $updateUser = 'UPDATE tbl_book_students SET password = :password WHERE reg_id = :reg_id';
        $conn->prepare($updateUser)->execute(['password' => $final_newPass, 'reg_id' => $session_id]);
        
            // Subject
            $subject = 'STC – Online Book Distribution System - CHANGE PASSWORD';
            
            // Message
            $message = '
            <html>
            <head>
              <title>STC – BDS</title>
            </head>
            <body>
             
            <h5>Account Details</h5>
              <table>
                <tr>
                  <th>Username</th>
                  <th>New Password</th>
                </tr>
                <tr>
                  <td>'.$studData_row['student_id'].'</td>
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
            $headers[] = 'To: '.$studData_row['fname'].' '.$studData_row['lname'].'<'.$studData_row['email'].'>';
            $headers[] = 'From: STC WEB PORTAL <online@stcbauan.edu.ph>';
            
            // Mail it
            mail($studData_row['email'], $subject, $message, implode("\r\n", $headers));
            
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
    
    
 