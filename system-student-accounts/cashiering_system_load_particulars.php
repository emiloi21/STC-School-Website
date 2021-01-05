<?php include('session.php'); ?>


<?php $conn->query("DELETE FROM tbl_student_payment_dummy WHERE personnel_user_id='$session_id'"); ?>


<?php if($_GET['payment_type']==='Post Billing'){

$tbl_student_assessments_query = $conn->query("SELECT category_id, total_amt_bal FROM tbl_student_assessments WHERE reg_id='$_GET[reg_id]' AND assessment_id='$_GET[assessment_id]' AND total_amt_bal<0") or die(mysql_error());
while($tbl_student_assessments_row = $tbl_student_assessments_query->fetch()){

    $receipt_num=$_GET['receipt_num'];
    
    $conn->query("INSERT INTO tbl_student_payment_dummy(reg_id, receipt_num, schoolYear, semester, payment_type, category_id, amt_payable, personnel_user_id)
    VALUES('$_GET[reg_id]', '$receipt_num', '$_GET[schoolYear]', '$_GET[semester]', '$_GET[payment_type]', '$tbl_student_assessments_row[category_id]', '$tbl_student_assessments_row[total_amt_bal]', '$session_id')");

}
$tbl_student_assessments_query=null;
$tbl_student_assessments_row=null;
$conn=null;

?>

<script>
window.location='cashiering_system_billing.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $receipt_num; ?>';
</script>

<?php }elseif($_GET['payment_type']==='Payment Validation'){
    
$tbl_student_assessments_query = $conn->query("SELECT category_id, total_amt_payable FROM tbl_student_assessments WHERE reg_id='$_GET[reg_id]' AND assessment_id='$_GET[assessment_id]' AND schoolYear='$_GET[schoolYear]' ORDER BY total_amt_payable DESC") or die(mysql_error());
while ($tbl_student_assessments_row = $tbl_student_assessments_query->fetch()) 
{
    $receipt_num=$_GET['receipt_num'];
    
    $conn->query("INSERT INTO tbl_student_payment_dummy(reg_id, receipt_num, schoolYear, semester, payment_type, method_id, category_id, amt_payable, personnel_user_id)
    VALUES('$_GET[reg_id]', '$receipt_num', '$_GET[schoolYear]', '$_GET[semester]', '$_GET[payment_type]', '$_GET[request_id]', '$tbl_student_assessments_row[category_id]', '$tbl_student_assessments_row[total_amt_payable]', '$session_id')");
}
$tbl_student_assessments_query=null;
$tbl_student_assessments_row=null;
$conn=null;

?>

<script>
window.location='cashiering_system_payment_validation.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $receipt_num; ?>&request_id=<?php echo $_GET['request_id']; ?>';
</script>

<?php }elseif($_GET['payment_type']==='Book Payment Validation'){

    $payable_books_query = $conn->query("SELECT * FROM tbl_book_payables WHERE reg_id='$_GET[reg_id]' ORDER BY payable_id DESC") or die(mysql_error());
    while ($pay_books_row = $payable_books_query->fetch()) 
    {
        $receipt_num=$_GET['receipt_num'];
        
        $bal_book_pay=$pay_books_row['total_amt']-$pay_books_row['total_amt_paid'];
        
        $conn->query("INSERT INTO tbl_student_payment_dummy(reg_id, receipt_num, schoolYear, semester, payment_type, method_id, category_id, amt_payable, personnel_user_id)
        VALUES('$_GET[reg_id]', '$receipt_num', '$_GET[schoolYear]', '$_GET[semester]', '$_GET[payment_type]', '$_GET[request_id]', '$pay_books_row[payable_id]', '$bal_book_pay', '$session_id')");
    }
 
?>

<script>
window.location='cashiering_system_payment_val_books.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $receipt_num; ?>&request_id=<?php echo $_GET['request_id']; ?>';
</script>

<?php

}elseif($_GET['payment_type']==='Book Fee'){

    $payable_books_query = $conn->query("SELECT * FROM tbl_book_payables WHERE reg_id='$_GET[reg_id]' ORDER BY payable_id DESC") or die(mysql_error());
    while ($pay_books_row = $payable_books_query->fetch()) 
    {
        $receipt_num=$_GET['receipt_num'];
        
        $bal_book_pay=$pay_books_row['total_amt']-$pay_books_row['total_amt_paid'];
        
        $conn->query("INSERT INTO tbl_student_payment_dummy(reg_id, receipt_num, schoolYear, semester, payment_type, method_id, category_id, amt_payable, personnel_user_id)
        VALUES('$_GET[reg_id]', '$receipt_num', '$_GET[schoolYear]', '$_GET[semester]', '$_GET[payment_type]', '$_GET[request_id]', '$pay_books_row[payable_id]', '$bal_book_pay', '$session_id')");
    }

 
?>

<script>
window.location='cashiering_system_payment_val_books.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $receipt_num; ?>&request_id=<?php echo $_GET['request_id']; ?>';
</script>

<?php }elseif($_GET['payment_type']==='Student Fee'){
    
$tbl_student_assessments_query = $conn->query("SELECT category_id, total_amt_payable FROM tbl_student_assessments WHERE reg_id='$_GET[reg_id]' AND assessment_id='$_GET[assessment_id]' AND schoolYear='$_GET[schoolYear]' ORDER BY total_amt_payable DESC") or die(mysql_error());
while ($tbl_student_assessments_row = $tbl_student_assessments_query->fetch()) 
{
    $receipt_num=$_GET['receipt_num'];
    
    $conn->query("INSERT INTO tbl_student_payment_dummy(reg_id, receipt_num, schoolYear, semester, payment_type, category_id, amt_payable, personnel_user_id)
    VALUES('$_GET[reg_id]', '$receipt_num', '$_GET[schoolYear]', '$_GET[semester]', '$_GET[payment_type]', '$tbl_student_assessments_row[category_id]', '$tbl_student_assessments_row[total_amt_payable]', '$session_id')");
}


$tbl_student_assessments_query=null;
$tbl_student_assessments_row=null;
$conn=null;

?>

<script>
window.location='cashiering_system.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $receipt_num; ?>';
</script>

<?php }else{

//NON-STUDENT FEE

} ?>