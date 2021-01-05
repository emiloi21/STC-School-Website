    
    <?php
    include('session.php');
    error_reporting(0);
    ?>

    <?php

    if(isset($_POST['assignSection']))
    {
        
        $class_id=$_POST['class_id'];
        
        $classList_query = $conn->prepare('SELECT gradeLevel, strand, section, dept FROM classes WHERE class_id = :class_id');
        $classList_query->execute(['class_id' => $class_id]);
        $cList_row = $classList_query->fetch();
        
                        
        $gradeLevel=$cList_row['gradeLevel'];
        $strand=$cList_row['strand'];
        $section=$cList_row['section'];
     
        
        $studRegId = $_POST['studRegId'];
    
        for($i=0;$i<count($studRegId);$i++)
        {
            
        $reg_id = $studRegId[$i];
     
        $assignClass='UPDATE students SET class_id = :class_id, section = :section WHERE reg_id = :reg_id';
        $conn->prepare($assignClass)->execute(['class_id' => $class_id, 'section' => $section, 'reg_id' => $reg_id]);
     
        }
        
        if($strand==='N/A'){
            $class=$gradeLevel.' - '.$section;
        }else{
            $class=$gradeLevel.' - '.$strand.' - '.$section;
        }
        
        
     ?>
     
    <script>
    window.alert('<?php echo $i; ?> student(s) successfully assigned to <?php echo $class; ?>...');
    window.location='list_students.php?dept=<?php echo $cList_row['dept']; ?>&class_id=<?php echo $class_id; ?>';
    </script>    
    
    <?php } ?>
    