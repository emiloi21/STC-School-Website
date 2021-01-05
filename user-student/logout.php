<?php
include('session.php');

$conn->query("UPDATE useraccount SET otp='' WHERE user_id='$session_id'"); 
     
@session_destroy();
?>


<script>
window.location='../user-login-register.php';
</script>