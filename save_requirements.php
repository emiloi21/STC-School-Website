<?php include('dbcon.php'); ?>

<?php 
if(isset($_POST['add_admission_file'])){
    
    $v_code=$_GET['reg_code'];
        
    $studData_query = $conn->prepare('SELECT * FROM students WHERE v_code = :v_code');
    $studData_query->execute(['v_code' => $_GET['reg_code']]);
    $studData_row = $studData_query->fetch();
        
    $require_id=$_POST['require_id'];
    $purpose=$_POST['purpose'];
    
    $target_dir = "user-student/requirements/admission/";
    $target_file = $target_dir.rand(1000,9999).'-'.basename($_FILES["per_file"]["name"]);
    
    $student_remarks=$_POST['student_remarks'];
    
    if (move_uploaded_file($_FILES["per_file"]["tmp_name"], $target_file)){
        
        $target_file = substr($target_file, 13);
        
        $conn->query("INSERT INTO tbl_reqs_students(require_id, reg_id, img, date_uploaded, time_uploaded, student_remarks, purpose, dept)
        VALUES('$require_id', '$studData_row[reg_id]', '$target_file', '$currentDate', '$currentTime', '$student_remarks', '$purpose', '$studData_row[dept]')");
        
    }else{
        
        echo "Sorry, there was an error uploading your file.";
    }
    
 
?>

<script>
window.alert('File uploaded for validation of Admission Committee...');
window.location='registration-step-four.php?reg_code=<?php echo $_GET['reg_code']; ?>';
</script>    


<?php } ?>


<?php 
if(isset($_POST['update_admission_file'])){
    
    $stud_reqs_id=$_POST['stud_reqs_id'];
     
    $target_dir = "user-student/requirements/admission/";
    $target_file = $target_dir.rand(1000,9999).'-'.basename($_FILES["per_file"]["name"]);
   
    $date_uploaded=$currentDate;
    $time_uploaded=$currentTime;
    $student_remarks=$_POST['student_remarks'];
    
    if (move_uploaded_file($_FILES["per_file"]["tmp_name"], $target_file)){
        
        $target_file = substr($target_file, 13);
        
        $conn->query("UPDATE tbl_reqs_students SET img='$target_file', date_uploaded='$date_uploaded', time_uploaded='$time_uploaded', remarks='New uploaded file', student_remarks='$student_remarks', status='For Validation' WHERE stud_reqs_id='$stud_reqs_id'");
        
    }else{
        
        echo "Sorry, there was an error uploading your file.";
    }
    
 
?>

<script>
window.alert('File uploaded for validation of Admission Committee...');
window.location='registration-step-four.php?reg_code=<?php echo $_GET['reg_code']; ?>';
</script>    


<?php } ?>


<?php 
if(isset($_POST['del_admission_file']))
{
    
    $stud_reqs_id=$_POST['stud_reqs_id'];
    
    $conn->query("DELETE FROM tbl_reqs_students WHERE stud_reqs_id='$stud_reqs_id'");
?>

<script>
window.alert('Request deleted successfully...');
window.location='registration-step-four.php?reg_code=<?php echo $_GET['reg_code']; ?>';
</script>    


<?php } ?>