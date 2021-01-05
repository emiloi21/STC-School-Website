    
    <?php

    include('dbcon.php');
 
    $email=$_GET['email'];
    $v_code=$_GET['v_code'];
    
    $user_query = $conn->prepare('SELECT user_id, verification_status FROM useraccount WHERE v_code = :v_code');
    $user_query->execute(['v_code' => $v_code]);
 
    if($user_query->rowCount()>0){
    
    $user_row=$user_query->fetch();
    
    if($user_row['verification_status']!='Verified'){
        
    $verifyUser = 'UPDATE useraccount SET verification_status = :status  WHERE v_code = :v_code';
    $conn->prepare($verifyUser)->execute(['status' => 'Verified', 'v_code' => $v_code]);
    
    
   $updateStudent = 'UPDATE students SET user_id = :user_id  WHERE v_code = :v_code';
   $conn->prepare($updateStudent)->execute(['user_id' => $user_row['user_id'], 'v_code' => $v_code]);
  
    ?>
    
    <script>
    window.alert('Account verification success! You can now login to your STC WEB Portal account...');
    window.location='user-login-register.php';
    </script>
    
    <?php }else{ ?>
    
    <script>
    window.alert('Account already verified. Please login your account with email: <?php echo $email; ?>');
    window.location='user-login-register.php';
    </script>
    
    <?php } }else{ ?>
    
    <script>
    window.alert('No account found. Please register to access STC WEB Portal');
    window.location='user-login-register.php';
    </script>
    
    <?php }  ?>
    
    
 