<?php

include('../dbcon.php');

//Start session

session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) { ?>


<script>
window.location = '../user-login-register.php';
</script>

<?php
    exit();
}

$session_id=$_SESSION['id'];

$session_access=$_SESSION['useraccess'];

$user_query = $conn->prepare('SELECT * FROM useraccount WHERE user_id = :user_id');
$user_query->execute(['user_id' => $session_id]);
$user_row = $user_query->fetch();

$name = substr($user_row['fname'], 0,1).". ".$user_row['lname'];


if($user_row['selected_SY']=="")
{ 
    $data_src_sy=$activeSchoolYear; 
    $data_src_sem=$activeSemester;
}else{
        
    $data_src_sy=$user_row['selected_SY'];
    $data_src_sem=$user_row['selected_sem'];
} 
 

$deped_id = $sf_row['deped_id'];
$region = $sf_row['region'];
$division = $sf_row['division'];
$schoolName = $sf_row['schoolName'];

$check_username = $user_row['username'];
$check_pass = $user_row['password'];


$studData_query = $conn->prepare('SELECT * FROM students WHERE user_id = :user_id');
$studData_query->execute(['user_id' => $session_id]);
$studData_row = $studData_query->fetch();

?>