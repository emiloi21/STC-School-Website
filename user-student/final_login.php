        
        <?php
        
		include('../dbcon.php');
        
		$otp = $_POST['otp'];
        $user_id = $_GET['uid'];
	 
		/* student */
		$query = $conn->query("SELECT * FROM useraccount WHERE otp='$otp' AND user_id='$user_id'");
		$row = $query->fetch();
		$num_row = $query->rowcount();
        
		if( $num_row > 0 ) { 
  
        if($row['verification_status']==='Verified'){
        session_start();
        
        $_SESSION['id']=$user_id;
        $_SESSION['useraccess']='User';
        
        $conn->query("UPDATE useraccount SET selected_SY='$activeSchoolYear', selected_sem='$activeSemester', otp='' WHERE user_id='$row[user_id]'");
       
        ?>
        
        <script>window.location = 'home.php';</script>
           
        <?php  }else{ ?>
            
        <script>window.alert('Account not verified, please verify account by clicking the link sent in your email');</script>
        <script>window.location = '../user-login-register.php';</script>
        
        <?php } }else{ ?>
           
        <script>window.alert('Entered OTP is invalid. Please try again.');</script>
        <script>window.location = 'index.php?uid=<?php echo $_GET['uid']; ?>';</script>
           
        <?php } ?>
        