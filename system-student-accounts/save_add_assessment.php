<?php
include('session.php');
?>


<?php

if(isset($_POST['addAssessment']))
{
   
   
    $description=addslashes($_POST['description']);
    $classData = $_POST['classData'];
    
    for($i=0;$i<count($classData);$i++)
    {
        
    $class_id = $classData[$i];
    
    $class_query = $conn->query("SELECT gradeLevel, strand, major FROM classes WHERE class_id='$class_id'") or die(mysql_error());
    $class_row = $class_query->fetch();
    
    $save_acctAssess = "INSERT INTO tbl_accounts_assessments(gradeLevel, strand, major, schoolYear, description)
    VALUES('$class_row[gradeLevel]', '$class_row[strand]', '$class_row[major]', '$data_src_sy', '$description')";
    $conn->exec($save_acctAssess);
 
    }
?>

<script>
window.alert('Assessment added successfully...');
window.location='list_account_assessments.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['copyAssessment']))
{
    $assessment_id=$_POST['assessment_id'];
    $gradeLevel=$_POST['gradeLevel'];
    $strand=$_POST['strand'];
    $major=$_POST['major'];
    $description=addslashes($_POST['description']);
    
    $tbl_newAAChk_query = $conn->query("SELECT assessment_id FROM tbl_accounts_assessments WHERE gradeLevel='$gradeLevel' AND strand='$strand' AND major='$major' AND schoolYear='$activeSchoolYear' AND description='$description'") or die(mysql_error());
    if($tbl_newAAChk_query->rowCount()>0){
?>

<script>
window.alert('Assessment exist...');
window.location='list_account_assessments.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php

    }else{
        
        $conn->query("INSERT INTO tbl_accounts_assessments(gradeLevel, strand, major, schoolYear, description)
        VALUES('$gradeLevel', '$strand', '$major', '$activeSchoolYear', '$description')");
        
        /*$tbl_aa_query = $conn->query("SELECT * FROM tbl_accounts_assessments WHERE assessment_id='$assessment_id'") or die(mysql_error());
        $tbl_aa_row = $tbl_aa_query->fetch();
        
        
        $tbl_newAA_query = $conn->query("SELECT assessment_id FROM tbl_accounts_assessments WHERE gradeLevel='$gradeLevel' AND strand='$strand' AND major='$major' AND schoolYear='$activeSchoolYear' AND description='$description'") or die(mysql_error());
        $tbl_newAA_row = $tbl_newAA_query->fetch();
        
        //INSERT TO ASSESSMENT PAYABLES
        /*$tbl_aPayables_query = $conn->query("SELECT * FROM tbl_assessment_payables WHERE assessment_id='$assessment_id'") or die(mysql_error());
        while($tbl_aPayables_row = $tbl_aPayables_query->fetch()){
            
            $conn->query("INSERT INTO tbl_assessment_payables(assessment_id, category_id)
            VALUES('$tbl_newAA_row[assessment_id]', '$tbl_aPayables_row[category_id]')");
            
        }*/
 
 
?>

<script>
window.alert('Assessment added successfully...');
window.location='list_account_assessments.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } } ?>


<?php

if(isset($_POST['updateAssessment']))
{
    $assessment_id=$_POST['assessment_id'];
    $gradeLevel=$_POST['gradeLevel'];
    $strand=$_POST['strand'];
    $major=$_POST['major'];
    $description=addslashes($_POST['description']);
    
    
    
    $conn->query("UPDATE tbl_accounts_assessments SET gradeLevel='$gradeLevel', strand='$strand', major='$major', schoolYear='$activeSchoolYear', description='$description' WHERE assessment_id='$assessment_id'");
    
?>

<script>
window.alert('Assessment updated successfully...');
window.location='list_account_assessments.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['deleteAssessment']))
{
    $assessment_id=$_POST['assessment_id'];
    
    $conn->query("DELETE FROM tbl_accounts_assessments  WHERE assessment_id='$assessment_id'");
    
?>

<script>
window.alert('Assessment deleted successfully...');
window.location='list_account_assessments.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } ?>

<?php

if(isset($_POST['addAssessmentPayables']))
{
   
    $category_id=$_POST['category_id'];
    
    $tbl_accounts_categories_query = $conn->query("SELECT * FROM tbl_accounts_categories WHERE category_id='$category_id'") or die(mysql_error());
    $tbl_accounts_categories_row=$tbl_accounts_categories_query->fetch();
 
    
    $checkAssPay_query = $conn->query("SELECT assess_payable_id FROM tbl_assessment_payables WHERE assessment_id='$_GET[assessment_id]' AND category_id='$category_id'") or die(mysql_error());
    if($checkAssPay_query->rowCount()>0){
        
    $assPayID_row=$checkAssPay_query->fetch();
    
        $updAssessPayables = 'UPDATE tbl_assessment_payables SET total_amt_payable = :total_amt_payable WHERE category_id = :category_id';
        $conn->prepare($updAssessPayables)->execute(['total_amt_payable' => $tbl_accounts_categories_row['totalAmount'], 'category_id' => $category_id]);


        $stud_regID_query = $conn->query("SELECT reg_id, schoolYear FROM students WHERE assessment_id='$_GET[assessment_id]'") or die(mysql_error());
        while($regID_row=$stud_regID_query->fetch()){
            
                $assessCHK_query = $conn->query("SELECT stud_assess_id, total_amt_payable, total_amt_paid FROM tbl_student_assessments WHERE reg_id='$regID_row[reg_id]' AND assessment_id='$_GET[assessment_id]' AND category_id='$category_id'") or die(mysql_error());
                if($assessCHK_query->rowCount()>0){
                    
                    $assessCHK_row=$assessCHK_query->fetch();
                    
                    $total_amt_bal=$tbl_accounts_categories_row['totalAmount']-$assessCHK_row['total_amt_paid'];
                    
                    $conn->query("UPDATE tbl_student_assessments SET total_amt_payable='$tbl_accounts_categories_row[totalAmount]', total_amt_bal='$total_amt_bal' WHERE stud_assess_id='$assessCHK_row[stud_assess_id]' AND category_id='$category_id'");
                
                }else{
                    
                    $conn->query("INSERT INTO tbl_student_assessments(reg_id, assessment_id, assess_payable_id, category_id, total_amt_payable, total_amt_bal, schoolYear)
                    VALUES('$regID_row[reg_id]', '$_GET[assessment_id]', '$assPayID_row[assess_payable_id]', '$category_id', '$tbl_accounts_categories_row[totalAmount]', '$tbl_accounts_categories_row[totalAmount]', '$regID_row[schoolYear]')");
                
                }
        }
        
    }else{

        $save_assessPayables = "INSERT INTO tbl_assessment_payables(assessment_id, category_id, total_amt_payable, schoolYear)
        VALUES('$_GET[assessment_id]', '$category_id', '$tbl_accounts_categories_row[totalAmount]', '$activeSchoolYear')";
        $conn->exec($save_assessPayables);
            
        $last_id = $conn->lastInsertId();
          
        $stud_regID_query = $conn->query("SELECT reg_id, schoolYear FROM students WHERE assessment_id='$_GET[assessment_id]'") or die(mysql_error());
        while($regID_row=$stud_regID_query->fetch()){
            
                $assessCHK_query = $conn->query("SELECT stud_assess_id, total_amt_payable, total_amt_paid FROM tbl_student_assessments WHERE reg_id='$regID_row[reg_id]' AND assessment_id='$_GET[assessment_id]' AND category_id='$category_id'") or die(mysql_error());
                if($assessCHK_query->rowCount()>0){
                    
                    $assessCHK_row=$assessCHK_query->fetch();
                    
                    $total_amt_bal=$tbl_accounts_categories_row['totalAmount']-$assessCHK_row['total_amt_paid'];
                    
                    $conn->query("UPDATE tbl_student_assessments SET total_amt_payable='$tbl_accounts_categories_row[totalAmount]', total_amt_bal='$total_amt_bal' WHERE stud_assess_id='$assessCHK_row[stud_assess_id]' AND category_id='$category_id'");
                
                }else{
                    
                    $conn->query("INSERT INTO tbl_student_assessments(reg_id, assessment_id, assess_payable_id, category_id, total_amt_payable, total_amt_bal, schoolYear)
                    VALUES('$regID_row[reg_id]', '$_GET[assessment_id]', '$last_id', '$category_id', '$tbl_accounts_categories_row[totalAmount]', '$tbl_accounts_categories_row[totalAmount]', '$regID_row[schoolYear]')");
                
                }
            
        }
        
        
    }
    
        
        

?>

<script>
window.alert('Assessment payables updated successfully...');
window.location='list_assessment_account_settings.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&major=<?php echo $_GET['major']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['deleteAssessmentPayables']))
{
   
    $category_id=$_POST['category_id'];
 
    $paymentCHK_query = $conn->query("SELECT * FROM tbl_student_assessments WHERE category_id='$category_id' AND total_amt_paid!=0.00");
    if($paymentCHK_query->rowCount()>0){
    ?>

        <script>
        window.alert('There is an exisiting payment in this account - payable, cannot be deleted.');
        window.location='list_assessment_account_settings.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&purpose=Updates';
        </script>
    
    <?php
    
    }else{
        
        $conn->query("DELETE FROM tbl_assessment_payables WHERE category_id='$category_id'");
        $conn->query("DELETE FROM tbl_student_assessments WHERE category_id='$category_id'");

    ?>

    <script>
    window.alert('Payable removed successfully...');
    window.location='list_assessment_account_settings.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&purpose=Updates';
    </script>
    
    <?php

    }
    
} ?>
