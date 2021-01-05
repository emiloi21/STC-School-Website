<?php include('session.php'); ?>


<?php

if(isset($_POST['updatePayment']))
{
    $conn->query("UPDATE tbl_student_payment_dummy SET amt_paid='$_POST[amt_paid]' WHERE payment_id='$_GET[payment_id]'");
    
    $conn=null;
?>

<script>
window.location='cashiering_system_billing.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $_GET['receipt_num']; ?>';
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
    
    $remarks=$_POST['remarks'];
    
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
        trans_time,
        status
        
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
        '$currentTime',
        'Billing'
        
        )");
        
        
        $conn->query("INSERT INTO tbl_billing(category_id, amt_payable, amt_paid, receipt_num, amt_billed, remarks, schoolYear)
        VALUES('$tbl_student_payment_dummy_row[category_id]', '$tbl_student_payment_dummy_row[amt_payable]', '$tbl_student_payment_dummy_row[amt_paid]', '$tbl_student_payment_dummy_row[receipt_num]', '$payee_cash', '$remarks', '$_GET[schoolYear]')");

        }
    }
    
    $current_or=substr($_GET['receipt_num'], -4, 4);
    
    $conn->query("UPDATE receipt_gen SET current_or='$current_or' WHERE id=1") or die(mysql_error());
    
    $conn->query("DELETE FROM tbl_student_payment_dummy WHERE receipt_num='$_GET[receipt_num]'") or die(mysql_error());
    
    $tbl_student_payment_dummy_query=null;
    $tbl_student_payment_dummy_row=null;
    $tbl_student_assessments_query=null;
    $tbl_student_assessments_row=null;
    $conn=null;
    
?>

<script>
window.alert("Billing Transaction Summary:\nTotal Billing: <?php echo $net_amt_payable; ?>\nTotal Billed: <?php echo $payee_cash; ?>");
window.location('print_receipt_billing.php?receipt_num=<?php echo $_GET['receipt_num']; ?>');
</script>

<?php } ?>
 
<?php

if(isset($_POST['voidTrans']))
{
    
    $conn->query("UPDATE tbl_student_payment SET status='Voided', void_remarks='$_POST[void_remarks]' WHERE receipt_num='$_GET[receipt_num]'") or die(mysql_error());
    $conn=null;


if($_GET['type']==='AR'){
?>

<script>
window.alert("AR <?php echo $_GET['receipt_num']; ?> voided...");
window.location='student_ledger.php?searched=<?php echo $_GET['reg_id']; ?>';
</script>

<?php }else{ ?>

<script>
window.alert("OR <?php echo $_GET['receipt_num']; ?> voided...");
window.location='student_ledger.php?searched=<?php echo $_GET['reg_id']; ?>';
</script>

<?php } } ?>


 