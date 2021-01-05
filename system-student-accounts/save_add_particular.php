<?php include('session.php'); ?>


<?php

if(isset($_POST['addParticular']))
{
   
    $category_id=$_POST['category_id'];
    $description=addslashes($_POST['description']);
    $paymentTerm=$_POST['paymentTerm'];
    $amount=$_POST['amount'];
    

    $conn->query("INSERT INTO tbl_accounts_particulars(category_id, description, paymentTerm, amount)
    VALUES('$category_id', '$description', '$paymentTerm', '$amount')");
    
    
    $totalAmount=0;
    $tbl_accounts_particulars_query = $conn->query("SELECT amount FROM tbl_accounts_particulars WHERE category_id='$_GET[category_id]' ORDER BY description ASC") or die(mysql_error());
    while ($tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch()) 
    {
        $totalAmount+=$tbl_accounts_particulars_row['amount'];
    }
    
    $conn->query("UPDATE tbl_accounts_categories SET totalAmount='$totalAmount' WHERE category_id='$_GET[category_id]'");
    
    $conn->query("UPDATE tbl_assessment_payables SET total_amt_payable='$totalAmount' WHERE category_id='$_GET[category_id]'");
    
    //UPDATE STUDENTS ASSESSMENT AMOUNT PAYABLES
    $upd_tsa_query = $conn->query("SELECT total_amt_payable, total_amt_paid FROM tbl_student_assessments WHERE category_id='$_GET[category_id]'") or die(mysql_error());
    
    if($upd_tsa_query->rowCount()>0){
    
    $upd_tsa_query_row=$upd_tsa_query->fetch();
    
    $total_amt_bal=$totalAmount-$upd_tsa_query_row['total_amt_paid'];
    
    $conn->query("UPDATE tbl_student_assessments SET total_amt_payable='$totalAmount', total_amt_bal='$total_amt_bal' WHERE category_id='$_GET[category_id]'");

    }
    
    
    
?>

<script>
window.alert('Particular added successfully...');
window.location='list_account_particulars.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&category_id=<?php echo $_GET['category_id']; ?>';
</script>

<?php } ?>



<?php

if(isset($_POST['updateParticular']))
{
    $particular_id=$_POST['particular_id'];
    $description=addslashes($_POST['description']);
    $paymentTerm=$_POST['paymentTerm'];
    $amount=$_POST['amount'];
    
    $conn->query("UPDATE tbl_accounts_particulars SET category_id='$_GET[category_id]', description='$description', paymentTerm='$paymentTerm', amount='$amount' WHERE particular_id='$particular_id'");
    
    $totalAmount=0;
    $tbl_accounts_particulars_query = $conn->query("SELECT amount FROM tbl_accounts_particulars WHERE category_id='$_GET[category_id]' ORDER BY description ASC") or die(mysql_error());
    while ($tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch()) 
    {
        $totalAmount+=$tbl_accounts_particulars_row['amount'];
    }
    
    $conn->query("UPDATE tbl_accounts_categories SET totalAmount='$totalAmount' WHERE category_id='$_GET[category_id]'");
    $conn->query("UPDATE tbl_assessment_payables SET total_amt_payable='$totalAmount' WHERE category_id='$_GET[category_id]'");


    //UPDATE STUDENTS ASSESSMENT AMOUNT PAYABLES
    $upd_tsa_query = $conn->query("SELECT total_amt_payable, total_amt_paid FROM tbl_student_assessments WHERE category_id='$_GET[category_id]'") or die(mysql_error());
    
    if($upd_tsa_query->rowCount()>0){
    
    $upd_tsa_query_row=$upd_tsa_query->fetch();
    
    $total_amt_bal=$totalAmount-$upd_tsa_query_row['total_amt_paid'];
    
    $conn->query("UPDATE tbl_student_assessments SET total_amt_payable='$totalAmount', total_amt_bal='$total_amt_bal' WHERE category_id='$_GET[category_id]'");

    }
    
?>

<script>
window.alert('Particular updated successfully...');
window.location='list_account_particulars.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&category_id=<?php echo $_GET['category_id']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['deleteParticular']))
{
    $particular_id=$_POST['particular_id'];
    
    $conn->query("DELETE FROM tbl_accounts_particulars  WHERE particular_id='$particular_id'");
    
    $totalAmount=0;
    $tbl_accounts_particulars_query = $conn->query("SELECT amount FROM tbl_accounts_particulars WHERE category_id='$_GET[category_id]' ORDER BY description ASC") or die(mysql_error());
    while ($tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch()) 
    {
        $totalAmount+=$tbl_accounts_particulars_row['amount'];
    }
    
    $conn->query("UPDATE tbl_accounts_categories SET totalAmount='$totalAmount' WHERE category_id='$_GET[category_id]'");
    $conn->query("UPDATE tbl_assessment_payables SET total_amt_payable='$totalAmount' WHERE category_id='$_GET[category_id]'");


    //UPDATE STUDENTS ASSESSMENT AMOUNT PAYABLES
    $upd_tsa_query = $conn->query("SELECT total_amt_payable, total_amt_paid FROM tbl_student_assessments WHERE category_id='$_GET[category_id]'") or die(mysql_error());
    
    if($upd_tsa_query->rowCount()>0){
    
    $upd_tsa_query_row=$upd_tsa_query->fetch();
    
    $total_amt_bal=$totalAmount-$upd_tsa_query_row['total_amt_paid'];
    
    $conn->query("UPDATE tbl_student_assessments SET total_amt_payable='$totalAmount', total_amt_bal='$total_amt_bal' WHERE category_id='$_GET[category_id]'");

    }
    
?>

<script>
window.alert('Particular deleted successfully...');
window.location='list_account_particulars.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&category_id=<?php echo $_GET['category_id']; ?>';
</script>

<?php } ?>

 

 