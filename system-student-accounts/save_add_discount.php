<?php

include('session.php');

?>


<?php
if(isset($_POST['addDiscounts']))
{

    $dept = $_GET['dept'];
    
    $account_code=$_POST['account_code'];
    $description=addslashes($_POST['description']);
    $amount=$_POST['amount'];
    $classification=$_GET['classification'];
    $type=$_POST['type'];
 
    
    $save_acctDCount = "INSERT INTO tbl_accounts_discount(dept, schoolYear, account_code, description, amount, classification, type)
    VALUES('$dept', '$data_src_sy', '$account_code', '$description', '$amount', '$classification', '$type')";
    $conn->exec($save_acctDCount);
 

    
?>

<script>
window.alert('Fixed Amount discount item added successfully...');
window.location='list_account_discounts.php?dept=<?php echo $_GET['dept']; ?>';
</script>

<?php } ?>

<?php
if(isset($_POST['addDiscounts2']))
{

    $dept = $_GET['dept'];
    
    $account_code=$_POST['account_code'];
    $description=addslashes($_POST['description']);
    $percentage=$_POST['percentage'];
    $classification=$_GET['classification'];
    $type=$_POST['type'];
 
    
    $save_acctDCount = "INSERT INTO tbl_accounts_discount(dept, schoolYear, account_code, description, percentage, classification, type)
    VALUES('$dept', '$data_src_sy', '$account_code', '$description', '$percentage', '$classification', '$type')";
    $conn->exec($save_acctDCount);
 

    
?>

<script>
window.alert('Percentage discount item added successfully...');
window.location='list_account_discounts.php?dept=<?php echo $_GET['dept']; ?>';
</script>

<?php } ?>






<?php
if(isset($_POST['editDiscounts']))
{
    $acct_discount_id=$_POST['acct_discount_id'];
    $dept = $_GET['dept'];
    $classification=$_GET['classification'];
    
    $account_code=$_POST['account_code'];
    $description=addslashes($_POST['description']);
    $type=$_POST['type'];
    
    if($classification==='Fixed Amount'){
        
        $amount=$_POST['amount'];
        $updDCount = 'UPDATE tbl_accounts_discount SET account_code = :account_code, description = :description, amount = :amount, type = :type WHERE acct_discount_id = :acct_discount_id';
        $conn->prepare($updDCount)->execute(['account_code' => $account_code, 'description' => $description, 'amount' => $amount, 'type' => $type, 'acct_discount_id' => $acct_discount_id]);

    }else{
        
        $percentage=$_POST['percentage'];
        $updDCount = 'UPDATE tbl_accounts_discount SET account_code = :account_code, description = :description, percentage = :percentage, type = :type WHERE acct_discount_id = :acct_discount_id';
        $conn->prepare($updDCount)->execute(['account_code' => $account_code, 'description' => $description, 'percentage' => $percentage, 'type' => $type, 'acct_discount_id' => $acct_discount_id]);

    }
    
?>

<script>
window.alert('Discount updated successfully...');
window.location='list_account_discounts.php?dept=<?php echo $_GET['dept']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['assignDiscountBulk']))
{
    
    $studReg_id = $_POST['studReg_id'];
    $acct_discount_id=$_GET['acct_discount_id'];
    $deduct_category_id=$_POST['deduct_category_id'];
    
    
    if($deduct_category_id==='0'){ ?>
    
<script>
window.alert("Please select account to be deducted...");
window.location='list_account_discount_bulkAssign.php?acct_discount_id=<?php echo $acct_discount_id; ?>&dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

    <?php }else{
        
    for($i=0;$i<count($studReg_id);$i++)
    {
        
    $reg_id = $studReg_id[$i];
    
    $listDcount_query = $conn->prepare('SELECT account_code, description, amount FROM tbl_accounts_discount WHERE acct_discount_id = :acct_discount_id');
    $listDcount_query->execute(['acct_discount_id' => $acct_discount_id]);
    $dCount_row = $listDcount_query->fetch();
    
    $account_code=$dCount_row['account_code'];
    $description=addslashes($dCount_row['description']);
    $amount=$dCount_row['amount'];
    
    $type=$_POST['type'];
    
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
    
               
                          
    }

if($i===0){
?>

<script>
window.alert("Please select student to assign discount...");
window.location='list_account_discount_bulkAssign.php?acct_discount_id=<?php echo $acct_discount_id; ?>&dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php
}else{
?>

<script>
window.alert("Discount assigned to <?php echo $i; ?> student(s) successfully...");
window.location='list_account_discounts.php?dept=<?php echo $_GET['dept']; ?>';
</script>

<?php } } } ?>


<?php

if(isset($_POST['deleteDiscounts']))
{
 
    $conn->query("DELETE FROM tbl_accounts_discount WHERE acct_discount_id='$_POST[acct_discount_id]'");
    
?>

<script>
window.alert('Discount deleted successfully...');
window.location='list_account_discounts.php?dept=<?php echo $_GET['dept']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['deleteReceivable']))
{

    $conn->query("DELETE FROM tbl_assessments_discounts WHERE discount_id='$_POST[discount_id]'");
    
if($_GET['transType']==='Payable'){ ?>

<script>
window.alert('Discount profile deleted successfully...');
window.location='list_account_payable.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>
    
<?php }else{ ?>

<script>
window.alert('Discount profile deleted successfully...');
window.location='list_account_receivable.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } } ?>
 