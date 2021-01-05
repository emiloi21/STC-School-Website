        
        <?php
        
		include('../dbcon.php');
        
		$username = $_POST['username'];
		$password = $_POST['password'];
        
        $safe_pass=md5($password);
        $salt="a1Bz20ydqelm8m1wql";
        $final_pass=$salt.$safe_pass;
        
		/* student */
        //JJ6EUZ0GCB
			$query = $conn->query("SELECT * FROM tbl_book_students WHERE student_id='$username' AND password='$final_pass'");
			$row = $query->fetch();
	 
		if($query->rowcount()>0){ 
  
        if($row['status']==='Verified'){
        
        session_start();
        
        $_SESSION['id']=$row['reg_id'];
                        
        ?>
         
        <script>window.location = 'home.php';</script>
           
        <?php  }else{ ?>
            
        <script>window.alert('Account not yet registered, please register by clicking the link below');</script>
        <script>window.location = 'index.php';</script>
        
        <?php } }else{ ?>
           
        <script>window.alert('Login credentials was invalid. Please try again.');</script>
        <script>window.location = 'index.php';</script>
           
        <?php } ?>
        