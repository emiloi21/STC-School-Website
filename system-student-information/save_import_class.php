
<div id="load">

 <center>
    <h3 style="border: solid 2px green; margin: 8px; padding: 8px; width: 90%;">IMPORTING CLASSES FROM S.Y. <?php echo $_POST['source_sy']; ?> TO S.Y. <?php echo $_POST['destination_sy']; ?></h3>
</center>

 </div>
<?php

include('session.php');

$dataSource_query = $conn->query("SELECT * FROM classes WHERE schoolYear='$_POST[source_sy]'") or die(mysql_error());
while($dsq_row=$dataSource_query->fetch()){

$classCHK_query = $conn->query("SELECT * FROM classes WHERE schoolYear='$_POST[destination_sy]' AND gradeLevel='$dsq_row[gradeLevel]' AND strand='$dsq_row[strand]' AND section='$dsq_row[section]'") or die(mysql_error());
 
if($classCHK_query->rowCount()>0){
    
}else{

    $conn->query("INSERT INTO classes (school_id, gradeLevel, strand, section, schoolYear, semester) 
    VALUES ('$school_id', '$dsq_row[gradeLevel]', '$dsq_row[strand]', '$dsq_row[section]', '$_POST[destination_sy]', '$activeSemester')");
    
} } ?>
 
<script>
window.location='list_classes.php';
</script>



<?php include('scripts_files.php'); ?>