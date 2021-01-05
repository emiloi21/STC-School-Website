<?php
include('../dbcon.php');

if(isset($_POST['send_otp'])){
    
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
    
    
    $temp_pass=randomcode();
        
    $safe_pass=md5($temp_pass);
    $salt="a1Bz20ydqelm8m1wql";
    $final_pass=$salt.$safe_pass;
        
    $query = $conn->query("SELECT * FROM tbl_book_students WHERE student_id='$_POST[student_id]' AND status='Verified'");
    $row = $query->fetch();
    
    if($query->rowCount()>0){

    $updateStudent = 'UPDATE tbl_book_students SET password = :password WHERE student_id = :student_id';
    $conn->prepare($updateStudent)->execute(['password' => $final_pass, 'student_id' => $_POST['student_id']]);

        $messageText='STC - Book Distribution System'."\r\r".'Good day '.$row['lname'].', '.$row['fname'].'!'."\r\r".'Please use this new system generated password: '.$temp_pass."\r\r".'Please do NOT share this password to others. You can also change password anytime in your dashboard.'."\r\r".'No reply needed';

        //save to sms server =x=x=x=x=x=x=x=x=x=x=x
        $conn->query("INSERT INTO messageout(MessageTo, MessageText)VALUES('$row[contact_num]', '$messageText')");
        //end save to sms server =x=x=x=x=x=x=x=x=x=x=x   
            
    ?>
    
        <script>
        window.alert('New system generated password sent to <?php echo $row['contact_num']; ?>!');
        window.location = 'index.php';
        </script>
    
    <?php }else{ ?>
    
        <script>
        window.alert('Username / Student School ID Code not found.');
        window.location = 'index.php';
        </script>
    
    <?php } } ?>