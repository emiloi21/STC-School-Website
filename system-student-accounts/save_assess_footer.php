<?php include('session.php'); ?>

<?php

if(isset($_POST['updateAssessFooter']))
{
    
    $foot_id = $_POST['foot_id'];
    $contents = addslashes($_POST['contents']);
    
    $updAssessDCount = 'UPDATE tbl_footer_assessment SET contents = :contents WHERE foot_id = :foot_id';
    $conn->prepare($updAssessDCount)->execute(['contents' => $contents, 'foot_id' => $foot_id]);
  
?>



<script>
window.alert("Assessment footer updfated successfully...");
window.location='list_assess_footer.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>';
</script>

<?php } ?>

 
 
 
 