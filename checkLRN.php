<?php
    include('dbcon.php');
    
    $chk_lrn_query = $conn->prepare('SELECT reg_id FROM students WHERE lrn = :lrn');
    $chk_lrn_query->execute(['lrn' => $_POST['lrn']]);
    //$chk_lrn_row = $chk_lrn_query->fetch();


    if($chk_lrn_query->rowCount()>0)
    {
        
        echo "LRN already exist";
        
    }else{
        
        echo "";
       
    }
    
?>