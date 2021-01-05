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
 

$class_query = $conn->query("SELECT * FROM classes WHERE schoolYear='$data_src_sy'");
$classTotalCtr=$class_query->rowCount();
 
//GRADE SCHOOL
$g1Stud_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$elemTotal=$g1Stud_query->rowCount();
$elemMale_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND sex='Male' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$elemMaleCtr=$elemMale_query->rowCount();
$elemFemale_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND sex='Female' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$elemFemaleCtr=$elemFemale_query->rowCount();

//JHS
$g7Stud_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$jhsTotal=$g7Stud_query->rowCount();
$jhsMale_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND sex='Male' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$jhsMaleCtr=$jhsMale_query->rowCount();
$jhsFemale_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND sex='Female' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$jhsFemaleCtr=$jhsFemale_query->rowCount();

//SHS
$g11Stud_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$shsTotal=$g11Stud_query->rowCount();
$shsMale_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND sex='Male' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$shsMaleCtr=$shsMale_query->rowCount();
$shsFemale_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND sex='Female' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$shsFemaleCtr=$shsFemale_query->rowCount();

//COLLEGE
$colStud_query = $conn->query("SELECT * FROM students WHERE dept='College' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$colTotal=$colStud_query->rowCount();
$colMale_query = $conn->query("SELECT * FROM students WHERE dept='College' AND sex='Male' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$colMaleCtr=$colMale_query->rowCount();
$colFemale_query = $conn->query("SELECT * FROM students WHERE dept='College' AND sex='Female' AND schoolYear='$data_src_sy' AND status='Enrolled'");
$colFemaleCtr=$colFemale_query->rowCount();


$nurseryCtr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Nursery' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$prepCtr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Preparatory' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$kinderCtr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Kinder' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();

$g1Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 1' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$g2Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 2' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$g3Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 3' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$g4Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 4' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$g5Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 5' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$g6Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 6' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();

$g7Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 7' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$g8Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 8' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$g9Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 9' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$g10Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 10' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();

$g11Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 11' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$g12Ctr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='Grade 12' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();

$yr1stCtr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='1st Year' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$yr2ndCtr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='2nd Year' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$yr3rdCtr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='3rd Year' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();
$yr4thCtr = $conn->query("SELECT COUNT(*) FROM students WHERE gradeLevel='4th Year' AND schoolYear='$data_src_sy' AND status='Enrolled'")->fetchColumn();



//requirements ctr for Validation
$req_ctr1_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND status='Setup'");
$req_ctr2_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND status='Setup'");
$req_ctr3_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND status='Setup'");
$req_ctr4_query = $conn->query("SELECT * FROM students WHERE dept='College' AND status='Setup'");

//requirements ctr for Validation
$req_ctr11_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND status='For Application Assessment'");
$req_ctr22_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND status='For Application Assessment'");
$req_ctr33_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND status='For Application Assessment'");
$req_ctr44_query = $conn->query("SELECT * FROM students WHERE dept='College' AND status='For Application Assessment'");

//requirements ctr for Validation
$req_ctr111_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND status='For Accounts Assessment'");
$req_ctr222_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND status='For Accounts Assessment'");
$req_ctr333_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND status='For Accounts Assessment'");
$req_ctr444_query = $conn->query("SELECT * FROM students WHERE dept='College' AND status='For Accounts Assessment'");

//requirements ctr for Validation
$req_ctr1111_query = $conn->query("SELECT * FROM students WHERE dept='Grade School' AND status='For Payment'");
$req_ctr2222_query = $conn->query("SELECT * FROM students WHERE dept='Junior High School' AND status='For Payment'");
$req_ctr3333_query = $conn->query("SELECT * FROM students WHERE dept='Senior High School' AND status='For Payment'");
$req_ctr4444_query = $conn->query("SELECT * FROM students WHERE dept='College' AND status='For Payment'");

$ctr_stat_gs=$req_ctr1_query->rowCount()+$req_ctr11_query->rowCount()+$req_ctr111_query->rowCount()+$req_ctr1111_query->rowCount();
$ctr_stat_jhs=$req_ctr2_query->rowCount()+$req_ctr22_query->rowCount()+$req_ctr222_query->rowCount()+$req_ctr2222_query->rowCount();
$ctr_stat_shs=$req_ctr3_query->rowCount()+$req_ctr33_query->rowCount()+$req_ctr333_query->rowCount()+$req_ctr3333_query->rowCount();
$ctr_stat_col=$req_ctr4_query->rowCount()+$req_ctr44_query->rowCount()+$req_ctr444_query->rowCount()+$req_ctr4444_query->rowCount();

$deped_id = $sf_row['deped_id'];
$region = $sf_row['region'];
$division = $sf_row['division'];
$schoolName = $sf_row['schoolName'];

$check_username = $user_row['username'];
$check_pass = $user_row['password'];


?>