<?php

include('../dbcon.php');

//Start session

session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) { ?>


<script>
window.location = 'index.php';
</script>

<?php
    exit();
}

$session_id=$_SESSION['id'];

$studData_query = $conn->prepare('SELECT * FROM tbl_book_students WHERE reg_id = :reg_id');
$studData_query->execute(['reg_id' => $session_id]);
$studData_row = $studData_query->fetch();

$chk_payables_query = $conn->prepare('SELECT DISTINCT reg_id, payment_plan, status FROM tbl_book_payables WHERE reg_id = :reg_id');
$chk_payables_query->execute(['reg_id' => $session_id]);
$chk_pay_row = $chk_payables_query->fetch();

$name=substr($studData_row['fname'], 0, 1).'. '.$studData_row['lname'];


$deped_id = $sf_row['deped_id'];
$region = $sf_row['region'];
$division = $sf_row['division'];
$schoolName = $sf_row['schoolName'];

$data_src_sy=$activeSchoolYear; 
$data_src_sem=$activeSemester;
$check_pass = $studData_row['password'];

$date_1st_payment="07/27/2020";
$date_2nd_payment="08/24/2020";
$date_3rd_payment="09/28/2020";
?>