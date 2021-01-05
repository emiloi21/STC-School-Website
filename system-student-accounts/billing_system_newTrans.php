<?php
  
include('session.php'); 
include('header.php');
 
 
            
            $payee_query = $conn->query("SELECT reg_id, lname, fname, assessment_id FROM students WHERE student_id='$_GET[student_id]' AND schoolYear='$data_src_sy'") or die(mysql_error());
            $payee_row = $payee_query->fetch();
                
 
                    
                
                $receipt_gen_query = $conn->query("SELECT current_or FROM receipt_gen") or die(mysql_error());
                $receipt_gen_row=$receipt_gen_query->fetch();
                
                $tbl_student_assessments_query = $conn->query("SELECT assessment_id FROM tbl_student_assessments WHERE reg_id='$payee_row[reg_id]'") or die(mysql_error());
                $tbl_student_assessments_row = $tbl_student_assessments_query->fetch();
                        
                $new_or_num=$receipt_gen_row['current_or']+1;
                                  
                if($new_or_num>=0 AND $new_or_num<=9)
                {
                    $receipt_num="000000".$new_or_num;             
                }
                elseif($new_or_num>9 AND $new_or_num<=99)
                {
                    $receipt_num="00000".$new_or_num;
                }
                elseif($new_or_num>99 AND $new_or_num<=999)
                {
                    $receipt_num="0000".$new_or_num;
                }
                elseif($new_or_num>999 AND $new_or_num<=9999)
                {
                    $receipt_num="000".$new_or_num;
                }
                elseif($new_or_num>9999 AND $new_or_num<=99999)
                {
                    $receipt_num="00".$new_or_num;
                }
                elseif($new_or_num>99999 AND $new_or_num<=999999)
                {
                    $receipt_num="0".$new_or_num;
                }
                elseif($new_or_num>999999 AND $new_or_num<=9999999)
                {
                    $receipt_num=$new_or_num;
                }
                
?>

<script>
window.location='cashiering_system_load_particulars.php?reg_id=<?php echo $payee_row['reg_id']; ?>&assessment_id=<?php echo $tbl_student_assessments_row['assessment_id']; ?>&schoolYear=<?php echo $data_src_sy; ?>&semester=<?php echo $activeSemester; ?>&payment_type=Post Billing&receipt_num=<?php echo $receipt_num; ?>';
</script>
            

     
    