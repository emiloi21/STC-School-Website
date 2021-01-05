<?php include('session.php'); ?>

<?php 
if(isset($_POST['invalid_file'])){
    
    $remarks=$_POST['remarks'];
    
    $conn->query("UPDATE tbl_reqs_students SET remarks='$remarks', status='Disapproved' WHERE stud_reqs_id='$_GET[stud_reqs_id]'");

?>

<script>
window.alert('File successfully disapproved...');
window.location='list_reqs_val.php?dept=<?php echo $_GET['dept']; ?>';
</script>   


<?php } ?>


<?php 
if(isset($_POST['valid_file'])){
    
    $reg_id=$_POST['reg_id'];
    $gradeLevel=$_POST['gradeLevel'];
    $strand=$_POST['strand'];
    $major=$_POST['major'];
    $classification=$_POST['classification'];
    $status=$_POST['status'];
    
    $remarks=$_POST['remarks'];
    
    $conn->query("UPDATE tbl_reqs_students SET remarks='$remarks', status='Approved' WHERE stud_reqs_id='$_GET[stud_reqs_id]'");


                    $fileCHK=0;
                          
                    $CHKreqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='$_GET[dept]' AND gradeLevel='$gradeLevel' AND strand='$strand' AND major='$major' AND classification='$classification' AND purpose='for Admission'");
                    while($CHKreqs_row=$CHKreqs_query->fetch()){
                          
                    $CHKreqStud_query = $conn->query("SELECT * FROM tbl_reqs_students WHERE require_id='$CHKreqs_row[require_id]' AND reg_id='$reg_id'");
                    $CHKreqStud_row=$CHKreqStud_query->fetch();
                    
                    if($CHKreqStud_row['status']==='Disapproved' OR $CHKreqStud_row['status']==='For Validation'){ $fileCHK+=1; }
                    if($CHKreqStud_query->rowCount()<=0){ $fileCHK+=1; }
                          
                    }
                    
                    if($fileCHK>0){
                        
                        if($status==='For Application Assessment' OR $status==='For Accounts Assessment'){
                            $updateStudent = 'UPDATE students SET status = :status WHERE reg_id = :reg_id';
                            $conn->prepare($updateStudent)->execute(['status' => 'For Application Assessment', 'reg_id' => $reg_id]);
                        }
                        
                    }else{
                        
                        if($status==='For Application Assessment' OR $status==='For Accounts Assessment'){
                            $updateStudent = 'UPDATE students SET status = :status WHERE reg_id = :reg_id';
                            $conn->prepare($updateStudent)->execute(['status' => 'For Accounts Assessment', 'reg_id' => $reg_id]);
                        }
                        
                    }
                    
                    
?>

<script>
window.alert('File successfully approved...');
window.location='list_reqs_val.php?dept=<?php echo $_GET['dept']; ?>';
</script>   


<?php } ?>