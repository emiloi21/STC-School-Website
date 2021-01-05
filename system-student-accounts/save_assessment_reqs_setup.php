<?php include('session.php'); ?>



<?php

if(isset($_POST['updateStatus']))
{
    
    $reg_id = $_GET['regx_id'];
     
    $updAssessDCount = 'UPDATE students SET status = :status WHERE reg_id = :reg_id';
    $conn->prepare($updAssessDCount)->execute(['status' => 'For Payment', 'reg_id' => $reg_id]);
    
    
    /* $studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$reg_id'") or die(mysql_error());
    $studData_row = $studData_query->fetch();
    
    $dept=$studData_row['dept'];
    $gradeLevel=$studData_row['gradeLevel'];
    $strand=$studData_row['strand'];
    $major=$studData_row['major'];
    $classification=$studData_row['classification'];
    $requirement_name="Assessment of Accounts";
    $description="Printed Assessment of Accounts duly signed of parent/guardian";
    $purpose="for Admission";
    
    $conn->query("INSERT INTO tbl_requirements(dept, gradeLevel, strand, major, classification, requirement_name, description, purpose)
    VALUES('$dept', '$gradeLevel', '$strand', '$major', '$classification', '$requirement_name', '$description', '$purpose')"); */
    
?>



<script>
window.alert("Account successfully assessed and ready for payments...");
window.location='list_assessment_reqs.php?dept=<?php echo $_GET['dept']; ?>';
</script>

<?php } ?>

<?php

if(isset($_POST['assignDiscount']))
{
    
    $reg_id = $_GET['regx_id'];
    $acct_discount_id=$_POST['acct_discount_id'];
    $deduct_category_id=$_POST['deduct_category_id'];
 
    $listDcount_query = $conn->prepare('SELECT * FROM tbl_accounts_discount WHERE acct_discount_id = :acct_discount_id');
    $listDcount_query->execute(['acct_discount_id' => $acct_discount_id]);
    $dCount_row = $listDcount_query->fetch();
    
    $account_code=$dCount_row['account_code'];
    $description=addslashes($dCount_row['description']);
    
    $type=$dCount_row['type'];
    
    
    if($dCount_row['classification']==='Fixed Amount'){
        $amount=$dCount_row['amount'];
    }else{
        
        $payable_amt=$_POST['payable_amt'];
        
        $amount=$payable_amt*$dCount_row['percentage'];
    }
    
    
    $checkAssignedDCount_query = $conn->prepare('SELECT discount_id, reg_id, amount, amt_rcv FROM tbl_assessments_discounts WHERE reg_id = :reg_id AND acct_discount_id = :acct_discount_id');
    $checkAssignedDCount_query->execute(['reg_id' =>$reg_id, 'acct_discount_id' => $acct_discount_id]);
    
    if($checkAssignedDCount_query->rowCount()>0){
    
    $checkAssignedDCount_row=$checkAssignedDCount_query->fetch();
    
    $amt_bal=$amount-$checkAssignedDCount_row['amt_rcv'];
    
    $updAssessDCount = 'UPDATE tbl_assessments_discounts SET amount = :amount, amt_bal = :amt_bal WHERE discount_id = :discount_id';
    $conn->prepare($updAssessDCount)->execute(['amount' => $amount, 'amt_bal' => $amt_bal, 'discount_id' => $checkAssignedDCount_row['discount_id']]);

    }else{
    
    $save_assessDCount = "INSERT INTO tbl_assessments_discounts(acct_discount_id, reg_id, account_code, description, amount, amt_bal, deduct_category_id, schoolYear, type, status)
    VALUES('$acct_discount_id', '$reg_id', '$account_code', '$description', '$amount', '$amount', '$deduct_category_id', '$data_src_sy', '$type', 'Pending')";
    $conn->exec($save_assessDCount);
    
    }
    
?>



<script>
window.alert("Discount assigned successfully...");
window.location='list_assessment_reqs_setup.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['removeAssDis']))
{
    
    $conn->query("DELETE FROM tbl_assessments_discounts WHERE discount_id='$_GET[discount_id]'");
    
?>

<script>
window.alert('Assigned discount removed successfully...');
window.location='list_assessment_reqs_setup.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['add_adv_pay']))
{
    
    $reg_id = $_GET['regx_id'];
    $description=$_POST['description'];
    $adv_pay_amt=$_POST['adv_pay_amt'];
    
    $save_adv_pay = "INSERT INTO tbl_adv_payment(reg_id, description, adv_pay_amt)VALUES('$reg_id', '$description', '$adv_pay_amt')";
    $conn->exec($save_adv_pay);

?>



<script>
window.alert("Advanced payment saved successfully...");
window.location='list_assessment_reqs_setup.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['remove_adv_pay']))
{
    
    $conn->query("DELETE FROM tbl_adv_payment WHERE adv_pay_id='$_GET[adv_pay_id]'");
    
?>

<script>
window.alert('Advanced payment removed successfully...');
window.location='list_assessment_reqs_setup.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>';
</script>

<?php } ?>