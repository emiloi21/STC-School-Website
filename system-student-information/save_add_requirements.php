<?php include('session.php'); ?>
 

<?php

if(isset($_POST['addRequirements']))
{   
    $dept=$_POST['dept'];
    $gradeLevel=$_POST['gradeLevel'];
    $strand=$_POST['strand'];
    $major=$_POST['major'];
    $classification=$_POST['classification'];
    $requirement_name=$_POST['requirement_name'];
    $description=$_POST['description'];
    $purpose=$_POST['purpose'];
 
    if($dept==='College'){
        $classDetails=$gradeLevel.' - '.$strand.' '.$major;
    }elseif($dept==='Senior High School'){
        $classDetails=$gradeLevel.' - '.$strand;
    }else{
        $classDetails=$gradeLevel;
    }
    
    $conn->query("INSERT INTO tbl_requirements(dept, gradeLevel, strand, major, classification, requirement_name, description, purpose)
    VALUES('$dept', '$gradeLevel', '$strand', '$major', '$classification', '$requirement_name', '$description', '$purpose')");
 
?>

<script>
window.alert('<?php echo $requirement_name.' requirement '.$purpose.' added to '.$classDetails; ?> successfully...');
window.location='list_requirements.php';
</script>

<?php } ?>


<?php

if(isset($_POST['updateReqs']))
{   
    $require_id=$_POST['require_id'];
    
    $requirement_name=$_POST['requirement_name'];
    $description=$_POST['description'];
    $purpose=$_POST['purpose'];
    
    $conn->query("UPDATE tbl_requirements SET requirement_name='$requirement_name', description='$description', purpose='$purpose' WHERE require_id='$require_id'");
 
?>

<script>
window.alert('<?php echo $requirement_name.' requirement '.$purpose; ?> updated successfully...');
window.location='list_requirements.php';
</script>

<?php } ?>

<?php

if(isset($_POST['deleteReqs']))
{   
    $require_id=$_POST['require_id'];
    
    $conn->query("DELETE FROM tbl_requirements WHERE require_id='$require_id'");
    $conn->query("DELETE FROM tbl_reqs_students WHERE require_id='$require_id'");
    
?>

<script>
window.alert('Requirement deleted successfully...');
window.location='list_requirements.php';
</script>

<?php } ?>