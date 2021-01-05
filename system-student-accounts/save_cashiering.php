<?php include('session.php'); ?>


<?php

if(isset($_POST['updatePayment']))
{
    $conn->query("UPDATE tbl_student_payment_dummy SET amt_paid='$_POST[amt_paid]' WHERE payment_id='$_POST[payment_id]'");
    
    $conn=null;
?>

<script>
window.location='cashiering_system.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $_GET['receipt_num']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['updatePayeeCash']))
{
    
    if($_POST['entryDate']===''){
        $currentDate=date('m/d/Y');
    }else{
        $currentDate=substr($_POST['entryDate'], 5, 2).'/'.substr($_POST['entryDate'], 8, 2).'/'.substr($_POST['entryDate'], 0, 4);
    }
    
    $currentTime=date('m/d/Y').' | '.date('h:i:s A');

    $net_amt_payable=$_POST['net_amt_payable'];
    $payee_cash=$_POST['payee_cash'];
    $payee_change=$payee_cash-$net_amt_payable;
    
    $tbl_student_payment_dummy_query = $conn->query("SELECT * FROM tbl_student_payment_dummy WHERE reg_id='$_GET[reg_id]' AND receipt_num='$_GET[receipt_num]' AND schoolYear='$_GET[schoolYear]'") or die(mysql_error());
    while($tbl_student_payment_dummy_row=$tbl_student_payment_dummy_query->fetch())
    {
    
        if($tbl_student_payment_dummy_row['amt_paid']>0){
       
        $conn->query("INSERT INTO tbl_student_payment(
        
        reg_id,
        receipt_num,
        schoolYear,
        semester,
        payment_type,
        category_id,
        amt_payable,
        amt_paid,
        net_amt_payable,
        payee_cash,
        payee_change,
        trans_date,
        trans_time
        
        )VALUES(
        
        '$_GET[reg_id]',
        '$tbl_student_payment_dummy_row[receipt_num]',
        '$_GET[schoolYear]',
        '$_GET[semester]',
        '$_GET[payment_type]',
        '$tbl_student_payment_dummy_row[category_id]',
        '$tbl_student_payment_dummy_row[amt_payable]',
        '$tbl_student_payment_dummy_row[amt_paid]',
        '$net_amt_payable',
        '$payee_cash',
        '$payee_change',
        '$currentDate',
        '$currentTime'
        
        )");
        
        $tbl_student_assessments_query = $conn->query("SELECT total_amt_payable, total_amt_paid FROM tbl_student_assessments WHERE reg_id='$_GET[reg_id]' AND assessment_id='$_GET[assessment_id]' AND category_id='$tbl_student_payment_dummy_row[category_id]'") or die(mysql_error());
        $tbl_student_assessments_row=$tbl_student_assessments_query->fetch();
        
        $total_amt_paid=$tbl_student_assessments_row['total_amt_paid']+$tbl_student_payment_dummy_row['amt_paid'];
        $total_amt_bal=$tbl_student_assessments_row['total_amt_payable']-$total_amt_paid;
        
        $conn->query("UPDATE tbl_student_assessments SET total_amt_paid='$total_amt_paid', total_amt_bal='$total_amt_bal' WHERE reg_id='$_GET[reg_id]' AND assessment_id='$_GET[assessment_id]' AND category_id='$tbl_student_payment_dummy_row[category_id]'");
        
        }
    }
    
    $current_or=(int)$_GET['receipt_num'];
 
    $conn->query("UPDATE receipt_gen SET current_or='$current_or' WHERE id=1") or die(mysql_error());
    
    $conn->query("DELETE FROM tbl_student_payment_dummy WHERE receipt_num='$_GET[receipt_num]'") or die(mysql_error());
    
    $tbl_student_payment_dummy_query=null;
    $tbl_student_payment_dummy_row=null;
    $tbl_student_assessments_query=null;
    $tbl_student_assessments_row=null;
    $conn=null;
    
?>

<script>
window.alert("Transaction Summary: \n Total Payable: <?php echo $net_amt_payable; ?> \n Cash Tendered: <?php echo $payee_cash; ?> \n Change: <?php echo $payee_change; ?>");
window.open('print_receipt.php?receipt_num=<?php echo $_GET['receipt_num']; ?>', '_blank');
window.location='cashiering_system_newTrans.php';
</script>

<?php } ?>

 


<?php

if(isset($_POST['load_newTrans']))
{ 
    $conn->query("DELETE FROM tbl_student_payment_dummy WHERE receipt_num='$_GET[receipt_num]'") or die(mysql_error());
    $conn=null;
?>

<script>
window.location='cashiering_system_newTrans.php';
</script>

<?php } ?>


<?php

if(isset($_POST['voidTrans']))
{
    
    $void_remarks=$_POST['void_remarks'];
    
    $tbl_studPayment_query = $conn->query("SELECT payment_type, method_id, category_id, amt_paid FROM tbl_student_payment WHERE reg_id='$_GET[reg_id]' AND receipt_num='$_GET[receipt_num]'") or die(mysql_error());
    while($studPay_row=$tbl_studPayment_query->fetch())
    {
        
        if($studPay_row['payment_type']==='Payment Validation'){
            
            $conn->query("UPDATE tbl_paymentvalidation SET date_time_validated='$date_time_validated', status='Validated' WHERE request_id='$_GET[request_id]'") or die(mysql_error());
    
            $tbl_studAssess_query = $conn->query("SELECT stud_assess_id, total_amt_paid, total_amt_bal FROM tbl_student_assessments WHERE reg_id='$_GET[reg_id]' AND category_id='$studPay_row[category_id]'") or die(mysql_error());
            $studAssess_row=$tbl_studAssess_query->fetch();

            $total_amt_paid=$studAssess_row['total_amt_paid']-$studPay_row['amt_paid'];
            $total_amt_bal=$studAssess_row['total_amt_bal']+$studPay_row['amt_paid'];

            $conn->query("UPDATE tbl_student_assessments SET total_amt_paid='$total_amt_paid', total_amt_bal='$total_amt_bal' WHERE stud_assess_id='$studAssess_row[stud_assess_id]'") or die(mysql_error());


        }elseif($studPay_row['payment_type']==='Book Payment Validation'){
             
            $conn->query("UPDATE tbl_paymentvalidation SET status='Pending' WHERE request_id='$studPay_row[method_id]'");

            $book_payables_query = $conn->query("SELECT total_amt, total_amt_paid FROM tbl_book_payables WHERE payable_id='$studPay_row[category_id]'") or die(mysql_error());
            $book_payables_row=$book_payables_query->fetch();
            
            $new_total_amt_paid=$book_payables_row['total_amt_paid']-$studPay_row['amt_paid'];
            
            $conn->query("UPDATE tbl_book_payables SET total_amt_paid='$new_total_amt_paid' WHERE payable_id='$studPay_row[category_id]'");

        }elseif($studPay_row['payment_type']==='Book Fee'){
            
            $book_payables_query = $conn->query("SELECT total_amt, total_amt_paid FROM tbl_book_payables WHERE payable_id='$studPay_row[category_id]'") or die(mysql_error());
            $book_payables_row=$book_payables_query->fetch();
            
            $new_total_amt_paid=$book_payables_row['total_amt_paid']-$studPay_row['amt_paid'];
            
            $conn->query("UPDATE tbl_book_payables SET total_amt_paid='$new_total_amt_paid' WHERE payable_id='$studPay_row[category_id]'");
            
        
        }elseif($studPay_row['payment_type']==='Student Fee'){
            
            $tbl_studAssess_query = $conn->query("SELECT stud_assess_id, total_amt_paid, total_amt_bal FROM tbl_student_assessments WHERE reg_id='$_GET[reg_id]' AND category_id='$studPay_row[category_id]'") or die(mysql_error());
            $studAssess_row=$tbl_studAssess_query->fetch();

            $total_amt_paid=$studAssess_row['total_amt_paid']-$studPay_row['amt_paid'];
            $total_amt_bal=$studAssess_row['total_amt_bal']+$studPay_row['amt_paid'];

            $conn->query("UPDATE tbl_student_assessments SET total_amt_paid='$total_amt_paid', total_amt_bal='$total_amt_bal' WHERE stud_assess_id='$studAssess_row[stud_assess_id]'") or die(mysql_error());

        }elseif($studPay_row['payment_type']==='Non-Student Fee'){
            
        }
        
    }
    
    $conn->query("UPDATE tbl_student_payment SET status='Voided', void_remarks='$void_remarks' WHERE receipt_num='$_GET[receipt_num]'") or die(mysql_error());
    
    $conn=null;
    
if($_GET['type']==='AR'){
?>

<script>
window.alert("AR <?php echo $_GET['receipt_num']; ?> voided...");
window.location='student_ledger.php?searched=<?php echo $_GET['searched']; ?>';
</script>

<?php }else{ ?>

<script>
window.alert("OR <?php echo $_GET['receipt_num']; ?> voided...");
window.location='student_ledger.php?searched=<?php echo $_GET['searched']; ?>';
</script>

<?php } } ?>
 