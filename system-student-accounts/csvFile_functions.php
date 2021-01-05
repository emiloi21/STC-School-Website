<?php

 include('../system-student-information/dbcon3.php');
 
 if(isset($_POST["import"])){
    
    $updateCtr=0;
    $insertCtr=0;
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
          {

            $SqlCheckRecord = "SELECT book_id FROM tbl_book_booklist WHERE gradeLevel='".$getData[0]."' AND strand='".$getData[1]."' AND major='".$getData[2]."' AND section='".$getData[3]."' AND schoolYear='".$getData[4]."' AND title='".$getData[5]."'";
            $chkRec_result = mysqli_query($conn3, $SqlCheckRecord); 
             
            if (mysqli_num_rows($chkRec_result)>0){
             
             $row = mysqli_fetch_assoc($chkRec_result);
             
             $sql = "UPDATE tbl_book_booklist SET 
             
             gradeLevel='".$getData[0]."', 
             strand='".$getData[1]."', 
             major='".$getData[2]."', 
             section='".$getData[3]."', 
             schoolYear='".$getData[4]."', 
             
             title='".addslashes($getData[5])."', 
             description='".addslashes($getData[6])."', 
             book_amt='".$getData[7]."', 
             type='".$getData[8]."' 
             
             WHERE book_id='".$row['book_id']."'";
              
             mysqli_query($conn3, $sql);
             $updateCtr=$updateCtr+1;
             
            }else{
                
             $sql = "INSERT INTO tbl_book_booklist 
             (
             
             gradeLevel, 
             strand, 
             major, 
             section, 
             schoolYear, 
             
             title, 
             description, 
             book_amt, 
             type
             
             )VALUES(
             
             '".$getData[0]."', 
             '".$getData[1]."', 
             '".$getData[2]."', 
             '".$getData[3]."', 
             '".$getData[4]."', 
             
             '".addslashes($getData[5])."', 
             '".addslashes($getData[6])."', 
             '".$getData[7]."', 
             '".$getData[8]."'
             
             )";
             $result = mysqli_query($conn3, $sql);
             $insertCtr=$insertCtr+1;
                        
                          
            }
          }
          
          $insertCtr=$insertCtr-1;
          
          if(!isset($result)){ ?>
          
          <script>
          alert("Invalid File: Please Upload CSV File...");
          window.location = 'list_book_bundle.php?dept=&gradeLevel=&strand=&major=&section=';
           </script>
          
          <?php }else{ ?>
          
           <script>
           alert("CSV File has been successfully Imported... \n Inserted Rows: <?php echo $insertCtr; ?> \n Updated Rows: <?php echo $updateCtr; ?>");
           window.location = 'list_book_bundle.php?dept=&gradeLevel=&strand=&major=&section=';
           </script>
                          
           <?php  }
                         
          $sql_del = "DELETE FROM tbl_book_booklist WHERE gradeLevel='gradeLevel' OR gradeLevel='' OR strand='' OR major='' OR section='' OR schoolYear='' OR title=''";
          $conn3->query($sql_del);
                          
          $conn3->close();
          fclose($file);
     }
  } ?>
  
  
  
<?php
  
 if(isset($_POST["import_discounts"])){
    
    $updateCtr=0;
    $insertCtr=0;
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
          {

            $SqlCheckRecord = "SELECT book_discount_id FROM tbl_book_discounts WHERE gradeLevel='".$getData[0]."' AND title='".$getData[2]."' AND type='".$getData[5]."'";
            $chkRec_result = mysqli_query($conn3, $SqlCheckRecord); 
             
            if (mysqli_num_rows($chkRec_result)>0){
             
             $row = mysqli_fetch_assoc($chkRec_result);
             
             $sql = "UPDATE tbl_book_discounts SET 
             
             gradeLevel='".$getData[0]."', 
             schoolYear='".$getData[1]."', 
             
             title='".addslashes($getData[2])."', 
             description='".addslashes($getData[3])."', 
             discount_value='".$getData[4]."', 
             type='".$getData[5]."' 
             
             WHERE book_discount_id='".$row['book_discount_id']."'";
              
             mysqli_query($conn3, $sql);
             $updateCtr=$updateCtr+1;
             
            }else{
                
             $sql = "INSERT INTO tbl_book_discounts 
             (
             
             gradeLevel, 
             schoolYear, 
             
             title, 
             description, 
             discount_value, 
             type
             
             )VALUES(
             
             '".$getData[0]."', 
             '".$getData[1]."', 
             
             '".addslashes($getData[2])."', 
             '".addslashes($getData[3])."', 
             '".$getData[4]."', 
             '".$getData[5]."'
             
             )";
             $result = mysqli_query($conn3, $sql);
             $insertCtr=$insertCtr+1;
                        
                          
            }
          }
          
          $insertCtr=$insertCtr-1;
          
          if(!isset($result)){ ?>
          
          <script>
          alert("Invalid File: Please Upload CSV File...");
          window.location = 'list_book_discounts.php?dept=&gradeLevel=&strand=&major=&section=';
           </script>
          
          <?php }else{ ?>
          
           <script>
           alert("CSV File has been successfully Imported... \n Inserted Rows: <?php echo $insertCtr; ?> \n Updated Rows: <?php echo $updateCtr; ?>");
           window.location = 'list_book_discounts.php?dept=&gradeLevel=&strand=&major=&section=';
           </script>
                          
           <?php  }
                          
          $sql_del = "DELETE FROM tbl_book_discounts WHERE gradeLevel='gradeLevel'";
          $conn3->query($sql_del);
                          
          $conn3->close();
          fclose($file);
     }
  } ?>