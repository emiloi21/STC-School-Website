    <?php include('session.php'); ?>
    
    <?php
    
    $del_massTrans = "DELETE FROM tbl_mass_trans WHERE mt_id='$_GET[mt_id]'";
    $conn->exec($del_massTrans);
    
    if($_GET['transType']==='Payable'){ ?>
    
    <script>
    window.alert('Mass transaction profile deleted...');
    window.location='mass_trans_review.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&transType=<?php echo $_GET['transType']; ?>&massTransCode=<?php echo $_GET['massTransCode']; ?>';
    </script>
    
    <?php }else{ ?>
    
    <script>
    window.alert('Mass transaction profile deleted...');
    window.location='mass_trans_review.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>&strand=<?php echo $_GET['strand']; ?>&major=<?php echo $_GET['major']; ?>&transType=<?php echo $_GET['transType']; ?>&massTransCode=<?php echo $_GET['massTransCode']; ?>';
    </script>
    
    <?php } ?>


 
