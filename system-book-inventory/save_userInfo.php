    
    <?php include('../dbcon.php'); ?>
 
    <?php
    
    if(isset($_POST['reg_book_account'])){
        
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
        
        $student_id=$_POST['student_id'];
        $fname=addslashes(strtoupper($_POST['fname']));
        $lname=addslashes(strtoupper($_POST['lname']));
        $contact_num="+63".$_POST['contact_num'];
        $email=$_POST['email'];
        
        $temp_pass=randomcode();
        
        $safe_pass=md5($temp_pass);
        $salt="a1Bz20ydqelm8m1wql";
        $final_pass=$salt.$safe_pass;
        
        $appDate=$currentDate;
        $appTime=$currentTime;
        
        $studData_query = $conn->prepare('SELECT * FROM tbl_book_students WHERE student_id = :student_id AND fname = :fname AND lname = :lname');
        $studData_query->execute(['student_id' => $student_id, 'fname' => $fname, 'lname' => $lname]);
        
        if($studData_query->rowCount()>0){
            
        $studData_row = $studData_query->fetch();
        
        if($studData_row['status']==='Verified'){
        ?>
 
        <script>
        window.alert('Student profile was already verified.');
        window.location='index.php';
        </script>
        
        <?php
        }else{
        
        $updateStudent = 'UPDATE tbl_book_students SET password = :password, contact_num = :contact_num, email = :email, appDate = :appDate, appTime = :appTime, status = :status WHERE reg_id = :reg_id';
        $conn->prepare($updateStudent)->execute(['password' => $final_pass, 'contact_num' => $contact_num, 'email' => $email, 'appDate' => $appDate, 'appTime' => $appTime, 'status' => 'Verified', 'reg_id' => $studData_row['reg_id']]);

        $messageText='STC - Book Distribution System'."\r\r".'Good day '.$lname.', '.$fname.'!'."\r\r".'Please use this system generated password: '.$temp_pass."\r\r".'Please do NOT share this password to others. You can also change password anytime in your dashboard.'."\r\r".'No reply needed';
    
        //save to sms server =x=x=x=x=x=x=x=x=x=x=x
        $conn->query("INSERT INTO messageout(MessageTo, MessageText)VALUES('$contact_num', '$messageText')");
        //end save to sms server =x=x=x=x=x=x=x=x=x=x=x   
    
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
        
        <title>STC – BDS</title>
        
        </head>
        <body>
        <p style="text-align: center;">
        <img src="http://stcbauan.edu.ph/stc-edu/img/stc_logo.png" style="width: 5%; height: 5%;" /><br />
        <strong style="font-size: x-large;">STA. TERESA COLLEGE</strong><br />
        Bauan, Batangas<br /><br />
        ONLINE BOOK DISTRIBUTION SYSTEM
        </p>
        
        <br />
        
        <p style="background-color: white; color: #075907;">
        Good Day!<br /><br />
        
        Thank you for using STC – Online Book Distribution System.<br /><br />
        
        The information you have shared has already been recorded and saved by the school’s Registrar’s Office under the protection of the Data Privacy Act of 2012.<br /><br />
        
        Take note of the generated password assigned in your account.  This will be used in the next steps of our book distribution process.<br /><br />
        
        <strong style="text-decoration: underline;">ACCOUNT DETAILS</strong><br /><br />
        <strong>Username: '.$student_id.'</strong><br />
        <strong>Password: '.$temp_pass.'</strong><br /><br /><br />
        
        For inquiries, you can email us at <strong style="color: #097609;">inquiry@stcbauan.edu.ph</strong>.  You can also send your inquiries to our official <a href="https://www.facebook.com/OfficialStcBauan/" target="_blank" style="font-weight: bold; color: #097609;">Facebook</a> page.
          
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
    window.alert('Student profile verified.');
    window.location='index.php';
    </script>
    
    <?php } }else{ ?>
 
    <script>
    window.alert('Student details not found.');
    window.location='index.php';
    </script>
    
    <?php } }  ?>
 