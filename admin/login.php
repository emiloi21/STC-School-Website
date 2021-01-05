        
        <?php
        
		include('../dbcon.php');
        
		$username = $_POST['username'];
		$password = $_POST['password'];
        
        $safe_pass=md5($password);
        $salt="a1Bz20ydqelm8m1wql";
        $final_pass=$salt.$safe_pass;
        
		/* student */
			$query = $conn->query("SELECT * FROM useraccount WHERE username='$username' AND password='$final_pass' AND access='Administrator'");
			$row = $query->fetch();
			$num_row = $query->rowcount();
		if( $num_row > 0 ) { 
		  
        session_start();
        
        $_SESSION['id']=$row['user_id'];
        
        $_SESSION['useraccess']=$row['access'];
        
        $conn->query("UPDATE useraccount SET selected_SY='' WHERE user_id='$row[user_id]'"); ?>
        
        <script>window.location = 'home.php';</script>
           
        <?php }else{ ?>
           
        <script>window.alert('User not found... Check username and password');</script>
        <script>window.location = 'index.php';</script>
           
        <?php } ?>
        