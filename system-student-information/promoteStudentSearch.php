  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
    
    <?php
    if(isset($_POST['promoteStudentSearch'])){
        
    $subjK_query = $conn->query("SELECT * FROM students WHERE student_id='$_POST[student_id]' AND schoolYear='$data_src_sy'") or die(mysql_error());
    
    if($subjK_query->rowCount()>0){
        
    $subjK_row = $subjK_query->fetch(); ?>
    
    <script>
    window.location='promoteStudent.php?reg_id=<?php echo $subjK_row['reg_id']; ?>';
    </script>
    
    <?php }else{ ?>
    
    <script>
    window.alert('No data found for ID Code: <?php echo $_POST['student_id']; ?> in the Data Source from SY <?php echo $data_src_sy; ?>');
    window.location='promoteStudent.php?reg_id=<?php echo $_GET['reg_id']; ?>';
    </script>
    
    <?php } } ?>