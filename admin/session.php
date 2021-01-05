<?php
include('../dbcon.php');
//Start session

session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) { ?>


<script>
window.location = '../index.php';
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

$name2 = $user_row['fname']." ".$user_row['lname'];

$activeSchoolYear = $sf_row['activeSchoolYear'];

if($user_row['selected_SY']=="")
{ 
    $data_src_sy=$activeSchoolYear; 
    $data_src_sem=$activeSemester;
    
}else{
        
    $data_src_sy=$user_row['selected_SY'];
    $data_src_sem=$user_row['selected_sem'];
} 
 

//GRADE SCHOOL
$gs_stat_setup_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND schoolYear='$data_src_sy' AND status='Setup'");
$gs_stat_reg_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND schoolYear='$data_src_sy' AND status='For Application Assessment'");
$gs_stat_acct_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND schoolYear='$data_src_sy' AND status='For Accounts Assessment'");
$gs_stat_pay_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND schoolYear='$data_src_sy' AND status='For Payment'");
$gs_stat_enrol_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND schoolYear='$data_src_sy' AND status='Enrolled'");


//JHS
$jhs_stat_setup_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND schoolYear='$data_src_sy' AND status='Setup'");
$jhs_stat_reg_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND schoolYear='$data_src_sy' AND status='For Application Assessment'");
$jhs_stat_acct_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND schoolYear='$data_src_sy' AND status='For Accounts Assessment'");
$jhs_stat_pay_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND schoolYear='$data_src_sy' AND status='For Payment'");
$jhs_stat_enrol_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND schoolYear='$data_src_sy' AND status='Enrolled'");


//SHS
$shs_stat_setup_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND schoolYear='$data_src_sy' AND status='Setup'");
$shs_stat_reg_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND schoolYear='$data_src_sy' AND status='For Application Assessment'");
$shs_stat_acct_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND schoolYear='$data_src_sy' AND status='For Accounts Assessment'");
$shs_stat_pay_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND schoolYear='$data_src_sy' AND status='For Payment'");
$shs_stat_enrol_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND schoolYear='$data_src_sy' AND status='Enrolled'");


//COLLEGE
$col_stat_setup_ctr_query = $conn->query("SELECT * FROM students WHERE dept='College' AND schoolYear='$data_src_sy' AND status='Setup'");
$col_stat_reg_ctr_query = $conn->query("SELECT * FROM students WHERE dept='College' AND schoolYear='$data_src_sy' AND status='For Application Assessment'");
$col_stat_acct_ctr_query = $conn->query("SELECT * FROM students WHERE dept='College' AND schoolYear='$data_src_sy' AND status='For Accounts Assessment'");
$col_stat_pay_ctr_query = $conn->query("SELECT * FROM students WHERE dept='College' AND schoolYear='$data_src_sy' AND status='For Payment'");
$col_stat_enrol_ctr_query = $conn->query("SELECT * FROM students WHERE dept='College' AND schoolYear='$data_src_sy' AND status='Enrolled'");





//GRADE SCHOOL //per status
$gs_stat_setup_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND schoolYear='$data_src_sy' AND status='Setup'");
$elem_gs_stat_setup_ctr=$gs_stat_setup_ctr_query->rowCount();

$gs_stat_reg_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND schoolYear='$data_src_sy' AND status='For Application Assessment'");
$elem_gs_stat_setup_ctr=$gs_stat_reg_ctr_query->rowCount();

$gs_stat_acct_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND schoolYear='$data_src_sy' AND status='For Accounts Assessment'");
$elem_gs_stat_setup_ctr=$gs_stat_acct_ctr_query->rowCount();

$gs_stat_pay_ctr_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND schoolYear='$data_src_sy' AND status='For Payment'");
$elem_gs_stat_setup_ctr=$gs_stat_pay_ctr_query->rowCount();

//JHS
$g7Stud_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND schoolYear='$data_src_sy' AND status='Setup'");
$jhsTotal=$g7Stud_query->rowCount();

//SHS
$g11Stud_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND schoolYear='$data_src_sy' AND status='Setup'");
$shsTotal=$g11Stud_query->rowCount();

//COLLEGE
$colStud_query = $conn->query("SELECT * FROM students WHERE dept='College' AND schoolYear='$data_src_sy' AND status='Setup'");
$colTotal=$colStud_query->rowCount();
// END //per status



$deped_id = $sf_row['deped_id'];
$region = $sf_row['region'];
$division = $sf_row['division'];
$schoolName = $sf_row['schoolName'];

$check_username = $user_row['username'];
$check_pass = $user_row['password'];


?>