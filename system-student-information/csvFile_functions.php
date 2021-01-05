<?php
 
include('dbcon3.php');

 if(isset($_POST["import"])){
    
    $updateCtr=0;
    $insertCtr=0;
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
          {

            $SqlCheckRecord = "SELECT reg_id FROM students WHERE student_id='".$getData[1]."' AND lname='".$getData[2]."' AND fname='".$getData[3]."' AND mname='".$getData[4]."'";
            $chkRec_result = mysqli_query($conn3, $SqlCheckRecord); 
            
            $class_query = "SELECT * FROM classes WHERE gradeLevel='".$getData[52]."' AND strand='".$getData[53]."' AND major='".$getData[54]."' AND section='".$getData[55]."' AND schoolYear='".$getData[57]."'";
            $class_result = mysqli_query($conn3, $class_query);
            
            
            if (mysqli_num_rows($class_result)>0){
                
                $class_row = mysqli_fetch_assoc($class_result);
                
                $class_id=$class_row['class_id'];
                
             }else{
                
                $class_id=$getData[50];
             }
             
             
            if (mysqli_num_rows($chkRec_result)>0){
             
             $row = mysqli_fetch_assoc($chkRec_result);
             
             $sql = "UPDATE students SET 
             
             lrn='".$getData[0]."', 
             student_id='".$getData[1]."', 
            
             lname='".$getData[2]."',
             fname='".$getData[3]."', 
             mname='".$getData[4]."', 
             suffix='".$getData[5]."',
             
             bdMM='".$getData[6]."', 
             bdDD='".$getData[7]."', 
             bdYYYY='".$getData[8]."',
             birthPlace='".$getData[9]."', 
             
             religion='".$getData[10]."', 
             nationality='".$getData[11]."',
             civil_status='".$getData[12]."', 
             sex='".$getData[13]."', 
             age='".$getData[14]."',
             
             address='".$getData[15]."', 
             contact_num='".$getData[16]."', 
             email='".$getData[17]."',
             
             father_name='".$getData[18]."', 
             father_occupation='".$getData[19]."', 
             father_address='".$getData[20]."',
             father_contact='".$getData[21]."', 
             
             mother_name='".$getData[22]."', 
             mother_occupation='".$getData[23]."',
             mother_address='".$getData[24]."', 
             mother_contact='".$getData[25]."', 
             
             parents_email='".$getData[26]."',
             
             guardian_name='".$getData[27]."', 
             guardian_contact='".$getData[28]."', 
             guardian_relation='".$getData[29]."',
             
             last_school='".$getData[30]."', 
             last_school_sy='".$getData[31]."', 
             last_school_address='".$getData[32]."',
             last_school_type='".$getData[33]."', 
             
             elem_last_school='".$getData[34]."', 
             elem_last_school_sy='".$getData[35]."',
             elem_last_school_address='".$getData[36]."', 
             elem_last_school_type='".$getData[37]."', 
             
             jhs_last_school='".$getData[38]."',
             jhs_last_school_sy='".$getData[39]."', 
             jhs_last_school_address='".$getData[40]."', 
             jhs_last_school_type='".$getData[41]."',
             
             shs_last_school='".$getData[42]."', 
             shs_last_school_sy='".$getData[43]."', 
             shs_last_school_address='".$getData[44]."',
             shs_last_school_type='".$getData[45]."', 
             
             col_last_school='".$getData[46]."', 
             col_last_school_sy='".$getData[47]."', 
             col_last_school_address='".$getData[48]."',
             col_last_school_type='".$getData[49]."', 
             
             class_id='".$class_id."', 
             dept='".$getData[51]."',
             gradeLevel='".$getData[52]."', 
             strand='".$getData[53]."',
             
             major='".$getData[54]."',
             section='".$getData[55]."', 
             classification='".$getData[56]."', 
             schoolYear='".$getData[57]."',
             
             sem='".$getData[58]."', 
             appDate='".$getData[59]."', 
             appTime='".$getData[60]."',
             assessment_id='".$getData[61]."', 
             
             total_units='".$getData[62]."', 
             user_id='".$getData[63]."',
             v_code='".$getData[64]."', 
             status='".$getData[65]."' 
             
             WHERE reg_id='".$row['reg_id']."'";
              
             mysqli_query($conn3, $sql);
             $updateCtr=$updateCtr+1;
             
            }else{
                
             $sql = "INSERT INTO students 
             (
             
             lrn,
             student_id,
            
             lname,
             fname,
             mname,
             suffix,
             
             bdMM,
             bdDD,
             bdYYYY,
             birthPlace,
             
             religion,
             nationality,
             civil_status,
             sex,
             age,
             
             address,
             contact_num,
             email,
             
             father_name,
             father_occupation,
             father_address,
             father_contact,
             
             mother_name, 
             mother_occupation,
             mother_address, 
             mother_contact, 
             
             parents_email,
             
             guardian_name, 
             guardian_contact, 
             guardian_relation,
             
             last_school, 
             last_school_sy, 
             last_school_address,
             last_school_type, 
             
             elem_last_school, 
             elem_last_school_sy,
             elem_last_school_address, 
             elem_last_school_type, 
             
             jhs_last_school,
             jhs_last_school_sy, 
             jhs_last_school_address, 
             jhs_last_school_type,
             
             shs_last_school, 
             shs_last_school_sy, 
             shs_last_school_address,
             shs_last_school_type, 
             
             col_last_school, 
             col_last_school_sy, 
             col_last_school_address,
             col_last_school_type, 
             
             class_id, 
             dept,
             gradeLevel, 
             strand,
             
             major,
             section, 
             classification, 
             schoolYear,
             
             sem, 
             appDate, 
             appTime,
             assessment_id, 
             
             total_units, 
             user_id,
             v_code, 
             status
             
             )VALUES(
             
             '".$getData[0]."',
             '".$getData[1]."',
             '".$getData[2]."',
             '".$getData[3]."',
             '".$getData[4]."',
             '".$getData[5]."',
             '".$getData[6]."',
             '".$getData[7]."',
             '".$getData[8]."',
             '".$getData[9]."',
             '".$getData[10]."',
             '".$getData[11]."',
             '".$getData[12]."',
             '".$getData[13]."',
             '".$getData[14]."',
             '".$getData[15]."',
             '".$getData[16]."',
             '".$getData[17]."',
             '".$getData[18]."',
             '".$getData[19]."',
             '".$getData[20]."',
             '".$getData[21]."',
             '".$getData[22]."',
             '".$getData[23]."',
             '".$getData[24]."',
             '".$getData[25]."',
             '".$getData[26]."',
             '".$getData[27]."',
             '".$getData[28]."',
             '".$getData[29]."',
             '".$getData[30]."',
             '".$getData[31]."',
             '".$getData[32]."',
             '".$getData[33]."',
             '".$getData[34]."',
             '".$getData[35]."',
             '".$getData[36]."',
             '".$getData[37]."',
             '".$getData[38]."',
             '".$getData[39]."',
             '".$getData[40]."',
             '".$getData[41]."',
             '".$getData[42]."',
             '".$getData[43]."',
             '".$getData[44]."',
             '".$getData[45]."',
             '".$getData[46]."',
             '".$getData[47]."',
             '".$getData[48]."',
             '".$getData[49]."',
             '".$class_id."',
             '".$getData[51]."',
             '".$getData[52]."',
             '".$getData[53]."',
             '".$getData[54]."',
             '".$getData[55]."',
             '".$getData[56]."',
             '".$getData[57]."',
             '".$getData[58]."',
             '".$getData[59]."',
             '".$getData[60]."',
             '".$getData[61]."',
             '".$getData[62]."',
             '".$getData[63]."',
             '".$getData[64]."',
             '".$getData[65]."'
             
             )";
             $result = mysqli_query($conn3, $sql);
             $insertCtr=$insertCtr+1;
                        
                          
            }
          }
          
          
          //INSERT STUDENT PROFILES FROM STUDENT - BOOK STUDENT TABLE
          
                  include('../dbcon.php');
                  
                  $studData_query = $conn->prepare('SELECT * FROM students ORDER BY reg_id ASC');
                  $studData_query->execute();
                  while($studData_row = $studData_query->fetch()){
                    
                  $chk_stud_query = $conn->prepare('SELECT reg_id FROM tbl_book_students WHERE reg_id = :reg_id');
                  $chk_stud_query->execute(['reg_id' => $studData_row['reg_id']]);
          
                  if($chk_stud_query->rowCount()>0){
                  
                      $book_stud_row = $chk_stud_query->fetch();
                      
                      $conn->query("UPDATE tbl_book_students SET 
                      
                      student_id='$studData_row[student_id]', 
                      lname='$studData_row[lname]', 
                      fname='$studData_row[fname]', 
                      mname='$studData_row[mname]', 
                      suffix='$studData_row[suffix]', 
                      contact_num='$studData_row[contact_num]', 
                      email='$studData_row[email]', 
                      dept='$studData_row[dept]', 
                      gradeLevel='$studData_row[gradeLevel]', 
                      strand='$studData_row[strand]', 
                      major='$studData_row[major]', 
                      section='$studData_row[section]', 
                      schoolYear='$studData_row[schoolYear]', 
                      sem='$studData_row[sem]'
                      
                      WHERE reg_id='$studData_row[reg_id]'");
        
                  }else{
                    
                      $conn->query("INSERT INTO tbl_book_students(
                      
                      reg_id, 
                      student_id, 
                      lname, 
                      fname, 
                      mname, 
                      suffix, 
                      contact_num, 
                      email, 
                      dept, 
                      gradeLevel, 
                      strand, 
                      major, 
                      section, 
                      schoolYear, 
                      sem
                      
                      )VALUES(
                      
                      '$studData_row[reg_id]', 
                      '$studData_row[student_id]', 
                      '$studData_row[lname]', 
                      '$studData_row[fname]', 
                      '$studData_row[mname]', 
                      '$studData_row[suffix]', 
                      '$studData_row[contact_num]', 
                      '$studData_row[email]', 
                      '$studData_row[dept]', 
                      '$studData_row[gradeLevel]', 
                      '$studData_row[strand]', 
                      '$studData_row[major]', 
                      '$studData_row[section]', 
                      '$studData_row[schoolYear]', 
                      '$studData_row[sem]'
                      
                      )");
                  
                  }
          
          }
          
          $insertCtr=$insertCtr-1;
          
          if(!isset($result)){ ?>
          
          <script>
          alert("Invalid File: Please Upload CSV File...");
          window.location = 'home.php';
          </script>
          
          <?php }else{ ?>
          
           <script>
           alert("CSV File has been successfully Imported... \n Inserted Rows: <?php echo $insertCtr; ?> \n Updated Rows: <?php echo $updateCtr; ?>");
           window.location = 'home.php';
           </script>
                          
           <?php  }
                          
          $sql_del = "DELETE FROM students WHERE fname='fname' AND lname='lname'";
          $conn3->query($sql_del);
          
          $sql_del2 = "DELETE FROM tbl_book_students WHERE fname='fname' AND lname='lname'";
          $conn3->query($sql_del2);
          
          $conn3->close();
          fclose($file);
     }
  } ?>