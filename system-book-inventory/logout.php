<?php
include('session.php');

//$conn->query("UPDATE useraccount SET otp='' WHERE user_id='$session_id'"); 
     
@session_destroy();
?>


<script>
window.location='index.php';
</script>