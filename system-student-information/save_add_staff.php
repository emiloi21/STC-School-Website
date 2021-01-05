<?php include('session.php'); ?>

<?php if(isset($_POST['update_data_src_sy'])) {
    
    $conn->query("UPDATE useraccount SET selected_SY='$_POST[data_src_sy]' WHERE user_id='$session_id'");
 ?>

    <script>
    window.alert('School Year <?php echo $_POST['data_src_sy']; ?> has been activated as datasource...');
    window.location='home.php';
    </script>
            
<?php } ?>

<?php if(isset($_POST['update_user'])) {
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    
    $conn->query("UPDATE useraccount SET fname='$fname', lname='$lname', email='$email' WHERE user_id='$session_id'");
 ?>

    <script>
    window.alert('Profile data updated successfully...');
    window.location='user_profile.php';
    </script>
            
<?php } ?>

<?php

if(isset($_POST['updateLoginAccount']))
{
      
    $username=$_POST['username'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
  
    $safe_pass=md5($_POST['passwordChecker']);
    $salt="a1Bz20ydqelm8m1wql";
    $passwordChecker=$salt.$safe_pass;
        
    if($passwordChecker===$check_pass){
        
        if($password1===$password2){
        
        $safe_pass1=md5($password1);
        $final_password1=$salt.$safe_pass1;
    
        $conn->query("UPDATE useraccount SET username='$username', password='$final_password1' WHERE user_id='$session_id'");

        ?>
        
        
        <script>
        window.alert('Account updated...The system will logout your account...');
        window.location='../logout.php?sfp_stat=xEdit';
        </script>
        
        <?php
    
        }else{
        ?>
    
        <script> 
        window.alert('Retyped password not matched...');
        window.location='user_profile.php?sfp_stat=xEdit';
        </script>
        
        <?php
        }
    
    }else{
        
    ?>
    
    
    <script>
    window.alert('Current password not matched...');
    window.location='user_profile.php?sfp_stat=xEdit';
    </script>
    
    <?php } } ?>

 