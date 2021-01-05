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
 
$user_dept=$user_row['dept'];

$tblAccAssess = $conn->query("SELECT COUNT(*) FROM tbl_accounts_assessments WHERE schoolYear='$data_src_sy'")->fetchColumn();
$tblAccCateg = $conn->query("SELECT COUNT(*) FROM tbl_accounts_categories WHERE schoolYear='$data_src_sy'")->fetchColumn();
$tblAccDCount = $conn->query("SELECT COUNT(*) FROM tbl_accounts_discount WHERE schoolYear='$data_src_sy'")->fetchColumn(); 

$acctReceivableCtr_query = $conn->query("SELECT discount_id FROM tbl_assessments_discounts WHERE type='Receivable' AND schoolYear='$data_src_sy'");
$acctReceivableCtr=$acctReceivableCtr_query->rowCount();

$acctPayableCtr_query = $conn->query("SELECT discount_id FROM tbl_assessments_discounts WHERE type='Payable' AND schoolYear='$data_src_sy'");
$acctPayableCtr=$acctPayableCtr_query->rowCount();

$transCtr_query = $conn->query("SELECT DISTINCT receipt_num FROM tbl_student_payment WHERE status='' AND trans_date='".date('m/d/Y')."'");
$transCtr=$transCtr_query->rowCount();



//requirements ctr for Validation
$req_ctr1_query = $conn->query("SELECT reg_id FROM students WHERE dept='Grade School' AND status='For Accounts Assessment'");
$req_ctr2_query = $conn->query("SELECT reg_id FROM students WHERE dept='Junior High School' AND status='For Accounts Assessment'");
$req_ctr3_query = $conn->query("SELECT reg_id FROM students WHERE dept='Senior High School' AND status='For Accounts Assessment'");
$req_ctr4_query = $conn->query("SELECT reg_id FROM students WHERE dept='College' AND status='For Accounts Assessment'");


//PAYMENT VALIDATION REQUESTS
$pay_req_pending_ctr_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE status='Pending' AND for_payment='Main'");
$pay_req_valid_ctr_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE status='Validated' AND for_payment='Main'");


//PAYMENT VALIDATION REQUESTS - BOOKS
$book_pay_req_pending_ctr_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE status='Pending' AND for_payment='Books'");
$book_pay_req_valid_ctr_query = $conn->query("SELECT * FROM tbl_paymentvalidation WHERE status='Validated' AND for_payment='Books'");


$submitted_bo_ctr_query = $conn->query("SELECT * FROM tbl_book_students WHERE order_status='Submitted'");

$deped_id = $sf_row['deped_id'];
$region = $sf_row['region'];
$division = $sf_row['division'];
$schoolName = $sf_row['schoolName'];

$check_username = $user_row['username'];
$check_pass = $user_row['password'];

$date_1st_payment="07/27/2020";
$date_2nd_payment="08/24/2020";
$date_3rd_payment="09/28/2020";
?>