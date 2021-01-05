<?php include('session.php'); ?>
 

<?php

if(isset($_POST['addClass']))
{   
    $dept=$_POST['dept'];
    $gradeLevel=$_POST['gradeLevel'];
    $strand=$_POST['strand'];
    $major=$_POST['major'];
    $section=$_POST['section'];
 
    if($dept==='College'){
        $classDetails=$gradeLevel.' - '.$strand.' '.$major.' - '.$section;
    }elseif($dept==='Senior High School'){
        $classDetails=$gradeLevel.' - '.$strand.' - '.$section;
    }else{
        $classDetails=$gradeLevel.' - '.$section;
    }
    
    $CHK_class_query = $conn->query("select * FROM classes WHERE (gradeLevel='$gradeLevel' AND strand='$strand' AND major='$major' AND section='$section') AND schoolYear='$data_src_sy'") or die(mysql_error());
    if($CHK_class_query->rowCount()>0){ ?>
            
            <script>
            window.alert('Class <?php echo $classDetails; ?> already exist...');
            window.location='list_classes.php';
            </script>
            
    <?php }else{
 
 
    
    $conn->query("INSERT INTO classes(gradeLevel, strand, major, section, dept, schoolYear, semester)
    VALUES('$gradeLevel', '$strand', '$major', '$section', '$dept', '$data_src_sy', '$activeSemester')");
 
?>

<script>
window.alert('Class <?php echo $classDetails; ?> added successfully...');
window.location='list_classes.php';
</script>

<?php } } ?>



<?php

if(isset($_POST['updateClass']))
{   
    $class_id=$_POST['class_id'];
    
    $class_query = $conn->query("SELECT * FROM classes WHERE class_id='$class_id'") or die(mysql_error());
    $cq_row=$class_query->fetch();
    
    $dept=$cq_row['dept'];
 
    $old_gradeLevel=$cq_row['gradeLevel'];
    $old_strand=$cq_row['strand'];
    $old_major=$cq_row['major'];
    $old_section=$cq_row['section'];
    
    $gradeLevel=$_POST['gradeLevel'];
    $strand=$_POST['strand'];
    $major=$_POST['major'];
    $section=$_POST['section'];
    
    if($dept==='College'){
        $old_classDetails=$old_gradeLevel.' - '.$old_strand.' '.$old_major.' - '.$old_section;
        $classDetails=$gradeLevel.' - '.$strand.' '.$major.' - '.$section;
    }elseif($dept==='Senior High School'){
        $old_classDetails=$old_gradeLevel.' - '.$old_strand.' - '.$old_section;
        $classDetails=$gradeLevel.' - '.$strand.' - '.$section;
    }else{
        $old_classDetails=$old_gradeLevel.' - '.$old_section;
        $classDetails=$gradeLevel.' - '.$section;
    }
    
    $conn->query("UPDATE classes SET gradeLevel='$gradeLevel', strand='$strand', major='$major', section='$section' WHERE class_id='$class_id' AND schoolYear='$data_src_sy'");

    ?>

<script>
window.alert('Class <?php echo $old_classDetails; ?> updated to <?php echo $classDetails; ?> successfully...');
window.location='list_classes.php';
</script>

<?php } ?>




<?php

if(isset($_POST['updateClassAdviser']))
{   
    $old_class_id=$_POST['old_class_id'];
    $new_class_id=$_POST['new_class_id'];
    $adviser_id=$_POST['adviser_id'];
    
    $conn->query("UPDATE classes SET adviser_id='', adviser='' WHERE class_id='$old_class_id' AND adviser_id='$adviser_id' AND schoolYear='$data_src_sy'");
    
    
    
    
    
    $staff_query = $conn->query("select * FROM staff WHERE staff_id='$adviser_id'") or die(mysql_error());
    $staff_row=$staff_query->fetch();
    
                                if($staff_row['extension']=="")
                                {
                                    if($staff_row['suffix']=="-")
                                    {
                                        
                                    $classAdviser=$staff_row['fname']." ".substr($staff_row['mname'], 0,1).". ".$staff_row['lname'];
                                    
                                    }else{
                                        
                                    $classAdviser=$staff_row['fname']." ".substr($staff_row['mname'], 0,1).". ".$staff_row['lname']." ".$staff_row['suffix'].", ".$staff_row['extension'];
                                    
                                    }
                                
                                
                              
                                }else{
                                    
                                    if($staff_row['suffix']=="-")
                                    {
                                        
                                    $classAdviser=$staff_row['fname']." ".substr($staff_row['mname'], 0,1).". ".$staff_row['lname'].", ".$staff_row['extension'];
                                    
                                    }else{
                                        
                                    $classAdviser=$staff_row['fname']." ".substr($staff_row['mname'], 0,1).". ".$staff_row['lname']." ".$staff_row['suffix'].", ".$staff_row['extension'];
                                    
                                    }
                                     
                                
                                }
                           
                           
    $conn->query("UPDATE classes SET adviser_id='$adviser_id', adviser='$classAdviser' WHERE class_id='$new_class_id' AND schoolYear='$data_src_sy'");
    
    
    ?>

<script>
window.alert('<?php echo $classAdviser; ?> advisory status updated successfully...');
window.location='list_staff.php?sfp_stat=xEdit&dept=<?php echo $_GET['dept']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['updateStatus']))
{
    
$conn->query("UPDATE staff SET status='$_POST[status]' WHERE staff_id='$_POST[adviser_id]'");
    
    ?>

<script>
window.alert('Status updated successfully...');
window.location='list_staff.php?sfp_stat=xEdit&dept=<?php echo $_GET['dept']; ?>';
</script>

<?php } ?>

<?php

if(isset($_POST['deleteClass']))
{   
    $class_id=$_POST['class_id'];
    
    $class_query = $conn->query("select * FROM classes WHERE class_id='$class_id'") or die(mysql_error());
    $cq_row=$class_query->fetch();
    
    $dept=$cq_row['dept'];
    $gradeLevel=$cq_row['gradeLevel'];
    $strand=$cq_row['strand'];
    $major=$cq_row['major'];
    $section=$cq_row['section'];
 
    if($dept==='College'){
        $classDetails=$gradeLevel.' - '.$strand.' '.$major.' - '.$section;
    }elseif($dept==='Senior High School'){
        $classDetails=$gradeLevel.' - '.$strand.' - '.$section;
    }else{
        $classDetails=$gradeLevel.' - '.$section;
    }
    
    $conn->query("DELETE FROM classes WHERE class_id='$class_id'");
    
?>

<script>
window.alert('Class <?php echo $dept.' - '.$classDetails; ?> removed successfully...');
window.location='list_classes.php';
</script>

<?php

} ?>
 


