<!DOCTYPE html>
<html>
  <?php
  
  include('session.php');
  
  include('header.php');
  
  ?>
 
  <body>
  
  <?php include('menu_sidebar.php'); ?>
  

    <div class="page">
    
    <?php
    include('navbar_header.php');
    include('quick_count.php');
    ?>
 
    <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
 

<?php

$classData_query=null;
$CD_row=null;

$act_ST_query=null;
$actST_row=null;
                      
$class_query=null;
$class_row=null;
                      
$homeShift_query=null;
$homeShift_row=null;
                      
?>
    
  </body>
</html>