<?php
include('../dbcon.php');

if(isset($_POST['send_otp'])){
    
    $query = $conn->query("SELECT user_id, fname, lname, contact_num, otp FROM useraccount WHERE user_id='$_GET[uid]' AND access='User'");
    $row = $query->fetch();
    
    $messageText='STC Web Portal'."\r\r".'Good day '.$row['lname'].', '.$row['fname'].'!'."\r\r".'Please use this 6 digit One-Time PIN (OTP): '.$final_otp."\r\r".'Please do NOT share this OTP to others.'."\r\r".'No reply needed';
    
    //save to sms server =x=x=x=x=x=x=x=x=x=x=x
    $conn->query("INSERT INTO messageout(MessageTo, MessageText)VALUES('$row[contact_num]', '$messageText')");
    //end save to sms server =x=x=x=x=x=x=x=x=x=x=x   
        
?>

    <script>
    window.alert('OTP verification message sent!');
    window.location = 'index.php?uid=<?php echo $row['user_id']; ?>';
    </script>

<?php } ?>