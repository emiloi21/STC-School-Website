<?php include('session.php'); ?>
 
<?php if(isset($_POST['checkPrintDetails'])){
    
    $schoolYear=$_POST['schoolYear'];
    $semester=$_POST['semester'];
    $inc_month=$_POST['inc_month'];
    $class_id=$_POST['class_id'];
    
    ?>
    
    <script>
    window.open('print_monthly_student_assessment.php?schoolYear=<?php echo $schoolYear; ?>&semester=<?php echo $semester; ?>&inc_month=<?php echo $inc_month; ?>&class_id=<?php echo $class_id; ?>', '_blank');
    window.location='printReports.php';
    </script>
    

    <?php } ?>