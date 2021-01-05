    <?php include('session.php'); ?>
    
    
    <?php if(isset($_POST['checkPrintDetails'])){ ?>
    
    <?php if($_POST['report_type']==='Class List'){  
    
    $class_query = $conn->query("SELECT dept FROM classes WHERE class_id='$_POST[class_id]'") or die(mysql_error());
    $class_row = $class_query->fetch();
    
    if($class_row['dept']==='SHS'){ ?>
    
        <script>
        window.open('print_classList.php?class_id=<?php echo $_POST['class_id']; ?>&sem=<?php echo $_POST['semester']; ?>', '_blank');
        window.location='printReports.php';
        </script>
        
    <?php }else{ ?>
    
        <script>
        window.open('print_classList.php?class_id=<?php echo $_POST['class_id']; ?>', '_blank');
        window.location='printReports.php';
        </script>
        
    <?php } }
    
    if($_POST['report_type']==='Grade Sheets'){
    
    $class_query = $conn->query("SELECT dept FROM classes WHERE class_id='$_POST[class_id]'") or die(mysql_error());
    $class_row = $class_query->fetch();
    
    if($class_row['dept']==='SHS'){ ?>
    
        <script>
        window.open('print_gradeSheet_SHS.php?class_id=<?php echo $_POST['class_id']; ?>&sem=<?php echo $_POST['semester']; ?>', '_blank');
        window.location='printReports.php';
        </script>
        
    <?php }else{ ?>
    
        <script>
        window.open('print_gradeSheet.php?class_id=<?php echo $_POST['class_id']; ?>', '_blank');
        window.location='printReports.php';
        </script>
        
    <?php } } 
    
    if($_POST['report_type']==='By Grade Level'){
    
    $class_query = $conn->query("SELECT gradeLevel, strand FROM classes WHERE class_id='$_POST[class_id]'") or die(mysql_error());
    $class_row = $class_query->fetch();
    
    ?>
    
        <script>
        window.open('print_byGradeLevel.php?gradeLevel=<?php echo $class_row['gradeLevel']; ?>&strand=<?php echo $class_row['strand']; ?>&sem=<?php echo $_POST['semester']; ?>', '_blank');
        window.location='printReports.php';
        </script>
    
    <?php } ?>
    
    <?php } ?>