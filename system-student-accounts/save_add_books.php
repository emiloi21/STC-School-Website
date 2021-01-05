<?php include('session.php'); ?>


<?php

if(isset($_POST['addCategory']))
{
 
    $description=addslashes($_POST['description']);
    $classData = $_POST['classData'];
    
    
    if(count($classData)<=0){
?>

<script>
window.alert('Select class to apply category...');
window.location='list_account_categories.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php

    }else{
        
    
    for($i=0;$i<count($classData);$i++)
    {
        
    $class_id = $classData[$i];
    
    $class_query = $conn->query("SELECT gradeLevel, strand, major FROM classes WHERE class_id='$class_id'") or die(mysql_error());
    $class_row = $class_query->fetch();
    
    $save_acctAssess = "INSERT INTO tbl_accounts_categories(gradeLevel, strand, major, schoolYear, description)
    VALUES('$class_row[gradeLevel]', '$class_row[strand]', '$class_row[major]', '$data_src_sy', '$description')";
    $conn->exec($save_acctAssess);
 
    }

    if($i>1){
        $alert=$i." categories";
    }else{
        $alert=$i." category";
    }

?>

<script>
window.alert('<?php echo $alert; ?> added successfully...');
window.location='list_account_categories.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } } ?>


<?php
/*
if(isset($_POST['copyCategory']))
{
    
    $from_category_id=$_POST['category_id'];
    
    $gradeLevel=$_POST['gradeLevel'];
    $strand=$_POST['strand'];
    $description=addslashes($_POST['description']);
    
    $conn->query("INSERT INTO tbl_accounts_categories(gradeLevel, strand, schoolYear, description, )
    VALUES('$gradeLevel', '$strand', '$activeSchoolYear', '$description')");
    
    
    $tbl_accounts_categories_query = $conn->query("SELECT category_id FROM tbl_accounts_categories WHERE gradeLevel='$gradeLevel' AND strand='$strand' AND schoolYear='$activeSchoolYear' AND description='$description'") or die(mysql_error());
    $tbl_accounts_categories_row = $tbl_accounts_categories_query->fetch();
    
    $category_id=$tbl_accounts_categories_row['category_id'];
    
    $tbl_accounts_particulars_query = $conn->query("SELECT * FROM tbl_accounts_particulars WHERE category_id='$from_category_id'") or die(mysql_error());
    while ($tbl_accounts_particulars_row = $tbl_accounts_particulars_query->fetch()) 
    {
        
        $description_apq=addslashes($tbl_accounts_particulars_row['description']);
        $amount=$tbl_accounts_particulars_row['amount'];
        
        $conn->query("INSERT INTO tbl_accounts_particulars(category_id, description, amount)
        VALUES('$category_id', '$description_apq', '$amount')");
    }
    
        $totalAmount=0;
        $tbl_accounts_particulars_query2 = $conn->query("SELECT amount FROM tbl_accounts_particulars WHERE category_id='$category_id' ORDER BY description ASC") or die(mysql_error());
        while ($tbl_accounts_particulars_row2 = $tbl_accounts_particulars_query2->fetch()) 
        {
            $totalAmount+=$tbl_accounts_particulars_row2['amount'];
        }
        
        $conn->query("UPDATE tbl_accounts_categories SET totalAmount='$totalAmount' WHERE category_id='$category_id'");
    
  
?>

<script>
window.alert('Category copied successfully...');
window.location='list_account_categories.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_POST['gradeLevel']; ?>&strand=<?php echo $_POST['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } */ ?>


<?php

if(isset($_POST['updateCategory']))
{
    $category_id=$_POST['category_id'];
    $description=addslashes($_POST['description']);
    
    $conn->query("UPDATE tbl_accounts_categories SET description='$description' WHERE category_id='$category_id'");
    
?>

<script>
window.alert('Category updated successfully...');
window.location='list_account_categories.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['deleteCategory']))
{
    $category_id=$_POST['category_id'];
    
    $CHK_query=$conn->prepare("SELECT payment_id FROM tbl_student_payment WHERE category_id = :category_id AND status != :status");
    $CHK_query->execute(['category_id' => $category_id, 'status' => 'Voided']);
     
    if($CHK_query->rowCount()>0){
?>

<script>
window.alert('There is an existing transaction under this category, please void related transactions and try again...');
window.location='list_account_categories.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php }else{
    
    $conn->query("DELETE FROM tbl_accounts_categories  WHERE category_id='$category_id'");
    $conn->query("DELETE FROM tbl_accounts_particulars WHERE category_id='$category_id'");
    $conn->query("DELETE FROM tbl_assessments_discounts WHERE deduct_category_id='$category_id'");
    $conn->query("DELETE FROM tbl_assessment_payables WHERE category_id='$category_id'");
    $conn->query("DELETE FROM tbl_student_assessments WHERE category_id='$category_id'");
 
?>

<script>
window.alert('Category deleted successfully...');
window.location='list_account_categories.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } } ?>

 

 