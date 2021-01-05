<?php

include('session.php');
error_reporting(0);
 
if(isset($_POST['massTrans']))
{

    $empty_massTrans = "TRUNCATE tbl_mass_trans";
    $conn->exec($empty_massTrans);
    
    function randomcode() {
    $var = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $code = '';
    while ($i <= 9) {
    $num = rand() % 33;
    $tmp = substr($var, $num, 1);
    $code = $code . $tmp;
    $i++;
    }
    return $code;
    }
                                    
    $massTransCode=randomcode();
    
    $arr_discount_id = $_POST['discount_id'];
 
    
if(count($arr_discount_id)<=0){
    

if($_GET['transType']==='Payable'){ ?>
<script>
window.alert('Please select account payable profile...');
window.location='list_account_payable.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>
<?php }else{ ?>
<script>
window.alert('Please select account receivable profile...');
window.location='list_account_receivable.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>
<?php } ?>



<?php }else{ 
    
    for($i=0;$i<count($arr_discount_id);$i++)
    {
        
    $discount_id = $arr_discount_id[$i];
    
    $save_massTrans = "INSERT INTO tbl_mass_trans(massTransCode, discount_id)VALUES('$massTransCode', '$discount_id')";
    $conn->exec($save_massTrans);
 
    }
    
 ?>

<script>
window.location='mass_trans_review.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&transType=<?php echo $_GET['transType']; ?>&massTransCode=<?php echo $massTransCode; ?>';
</script>

<?php } } ?>



<?php
if(isset($_POST['confirmMassTrans']))
{

    $payment_term=$_POST['payment_term'];
    $payment_amt=$_POST['payment_amt'];
 
    
if($payment_term==='-'){ ?>

<script>
window.alert('Please select appropriate payment term...');
window.location='mass_trans_review.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&transType=<?php echo $_GET['transType']; ?>&massTransCode=<?php echo $_GET['massTransCode']; ?>';
</script>

<?php }else{
    
    
    $massTrans_query = $conn->query("SELECT * FROM tbl_mass_trans WHERE massTransCode='$_GET[massTransCode]' ORDER BY mt_id ASC") or die(mysql_error());
    while ($mt_row = $massTrans_query->fetch()) 
    {
        
    $new_amt_rcv=0;
    $new_amt_bal=0;
    
    $AR_discounts_query = $conn->query("SELECT * FROM tbl_assessments_discounts WHERE discount_id='$mt_row[discount_id]'") or die(mysql_error());
    $ar_row = $AR_discounts_query->fetch();
                      
    $ar_discount_id=$ar_row['discount_id'];
    $ar_reg_id=$ar_row['reg_id'];
    $ar_acct_discount_id=$ar_row['acct_discount_id'];
    $ar_amount=$ar_row['amount'];
    $ar_amt_rcv=$ar_row['amt_rcv'];
    $ar_amt_bal=$ar_row['amt_bal'];
    $ar_deduct_category_id=$ar_row['deduct_category_id'];
    
    //GENERATE OR//
    $receipt_gen_query = $conn->query("SELECT current_or FROM receipt_gen") or die(mysql_error());
    $receipt_gen_row=$receipt_gen_query->fetch();
                
    $tbl_student_assessments_query = $conn->query("SELECT * FROM tbl_student_assessments WHERE reg_id='$ar_reg_id' AND category_id='$ar_deduct_category_id'") or die(mysql_error());
    $tbl_student_assessments_row = $tbl_student_assessments_query->fetch();
                        
    $new_or_num=$receipt_gen_row['current_or']+1;
                                  
    if($new_or_num>=0 AND $new_or_num<=9)
    {
        $receipt_num="000000".$new_or_num;             
    }
    elseif($new_or_num>9 AND $new_or_num<=99)
    {
        $receipt_num="00000".$new_or_num;
    }
    elseif($new_or_num>99 AND $new_or_num<=999)
    {
        $receipt_num="0000".$new_or_num;
    }
    elseif($new_or_num>999 AND $new_or_num<=9999)
    {
        $receipt_num="000".$new_or_num;
    }
    elseif($new_or_num>9999 AND $new_or_num<=99999)
    {
        $receipt_num="00".$new_or_num;
    }
    elseif($new_or_num>99999 AND $new_or_num<=999999)
    {
        $receipt_num="0".$new_or_num;
    }
    elseif($new_or_num>999999 AND $new_or_num<=9999999)
    {
        $receipt_num=$new_or_num;
    }
    //END GENERATE OR//
    
    
    
    //PER STUDENT TRANSACTION//
    if($_POST['entryDate']===''){
        $currentDate=date('m/d/Y');
    }else{
        $currentDate=substr($_POST['entryDate'], 5, 2).'/'.substr($_POST['entryDate'], 8, 2).'/'.substr($_POST['entryDate'], 0, 4);
    }
    
    $currentTime=date('m/d/Y').' | '.date('h:i:s A');

    $net_amt_payable=$_POST['payment_amt'];
    $payee_cash=$_POST['payment_amt']; //amt per student
    $payee_change=0;
 
    $new_amt_rcv=$ar_amt_rcv+$payee_cash;
    $new_amt_bal=$ar_amount-$new_amt_rcv;
    
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
        
        '$tbl_student_assessments_row[reg_id]',
        '$receipt_num',
        '$tbl_student_assessments_row[schoolYear]',
        '$activeSemester',
        'Student Fees',
        '$ar_deduct_category_id',
        '$ar_amt_bal',
        '$payee_cash',
        '$net_amt_payable',
        '$payee_cash',
        '$payee_change',
        '$currentDate',
        '$currentTime'
        
        )");
 
        
        $total_amt_paid=$tbl_student_assessments_row['total_amt_paid']+$net_amt_payable;
        $total_amt_bal=$tbl_student_assessments_row['total_amt_payable']-$total_amt_paid;
        
        $conn->query("UPDATE tbl_student_assessments SET total_amt_paid='$total_amt_paid', total_amt_bal='$total_amt_bal' WHERE reg_id='$ar_reg_id' AND category_id='$ar_deduct_category_id'");

        $conn->query("UPDATE tbl_assessments_discounts SET amt_rcv='$new_amt_rcv', amt_bal='$new_amt_bal', status='$_POST[payment_term]' WHERE discount_id='$ar_discount_id'");
 
        $current_or=(int)$receipt_num;
        $conn->query("UPDATE receipt_gen SET current_or='$current_or' WHERE id=1") or die(mysql_error());
    
    
    //END GENERATE OR//
        }


if($_GET['transType']==='Payable'){ ?>

<script>
window.location='list_account_payable.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php }else{ ?>

<script>
window.location='list_account_receivable.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } } } ?>
