        
        <?php
        
		include('../dbcon.php');
        
		$username = $_POST['username'];
		$password = $_POST['password'];
        
        $safe_pass=md5($password);
        $salt="a1Bz20ydqelm8m1wql";
        $final_pass=$salt.$safe_pass;
        
		/* student */
			$query = $conn->query("SELECT * FROM useraccount WHERE (username='$username' OR email='$username') AND password='$final_pass' AND access='User'");
			$row = $query->fetch();
			$num_row = $query->rowcount();
		if( $num_row > 0 ) { 
  
        if($row['verification_status']==='Verified'){
        
        $conn->query("UPDATE useraccount SET otp='' WHERE user_id='$row[user_id]'");
        
        $otp1=mt_rand(0, 9);
        $otp2=mt_rand(0, 9);
        $otp3=mt_rand(0, 9);
        $otp4=mt_rand(0, 9);
        $otp5=mt_rand(0, 9);
        $otp6=mt_rand(0, 9);
        
        $final_otp=$otp1.$otp2.$otp3.$otp4.$otp5.$otp6;
        
        $messageText='STC Web Portal'."\r\r".'Good day '.$row['lname'].', '.$row['fname'].'!'."\r\r".'Please use this 6 digit One-Time PIN (OTP): '.$final_otp."\r\r".'Please do NOT share this OTP to others.'."\r\r".'No reply needed';
        $conn->query("UPDATE useraccount SET otp='$final_otp' WHERE user_id='$row[user_id]'");


        //save to sms server =x=x=x=x=x=x=x=x=x=x=x
        $conn->query("INSERT INTO messageout(MessageTo, MessageText)VALUES('$row[contact_num]', '$messageText')");
        //end save to sms server =x=x=x=x=x=x=x=x=x=x=x   
                        
        ?>
         
        <script>window.location = 'index.php?uid=<?php echo $row['user_id']; ?>';</script>
           
        <?php  }else{ ?>
            
        <script>window.alert('Account not verified, please verify account by clicking the link sent in your email');</script>
        <script>window.location = '../user-login-register.php';</script>
        
        <?php } }else{ ?>
           
        <script>window.alert('User not found... Check username and password.');</script>
        <script>window.location = '../user-login-register.php';</script>
           
        <?php } ?>
        