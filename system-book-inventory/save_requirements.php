<?php include('session.php'); ?>

<?php 
if(isset($_POST['add_admission_file'])){
    
    $require_id=$_POST['require_id'];
    $purpose=$_POST['purpose'];
    
    $target_dir = "requirements/admission/";
    $target_file = $target_dir.rand(1000,9999).'-'.basename($_FILES["per_file"]["name"]);
   
    $date_uploaded=$currentDate;
    $time_uploaded=$currentTime;
    $student_remarks=$_POST['student_remarks'];
    
    if (move_uploaded_file($_FILES["per_file"]["tmp_name"], $target_file)){
        
        $conn->query("INSERT INTO tbl_reqs_students(require_id, reg_id, student_id, img, date_uploaded, time_uploaded, student_remarks, purpose, dept)
        VALUES('$require_id', '$studData_row[reg_id]', '$studData_row[student_id]', '$target_file', '$date_uploaded', '$time_uploaded', '$student_remarks', '$purpose', '$studData_row[dept]')");
        
    }else{
        
        echo "Sorry, there was an error uploading your file.";
    }
    
 
?>

<script>
window.alert('File uploaded for validation of Admission Committee...');
window.location='requirements.php';
</script>    


<?php } ?>


<?php 
if(isset($_POST['update_admission_file'])){
    
    $stud_reqs_id=$_POST['stud_reqs_id'];
     
    $target_dir = "requirements/admission/";
    $target_file = $target_dir.rand(1000,9999).'-'.basename($_FILES["per_file"]["name"]);
   
    $date_uploaded=$currentDate;
    $time_uploaded=$currentTime;
    $student_remarks=$_POST['student_remarks'];
    
    if (move_uploaded_file($_FILES["per_file"]["tmp_name"], $target_file)){
        
        $conn->query("UPDATE tbl_reqs_students SET img='$target_file', date_uploaded='$date_uploaded', time_uploaded='$time_uploaded', remarks='New uploaded file', student_remarks='$student_remarks', status='For Validation' WHERE stud_reqs_id='$stud_reqs_id'");
        
    }else{
        
        echo "Sorry, there was an error uploading your file.";
    }
    
 
?>

<script>
window.alert('File uploaded for validation of Admission Committee...');
window.location='requirements.php';
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
window.location='requirements.php';
</script>    


<?php } ?>