<?php include('session.php'); ?>

<?php

$studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$_GET[regx_id]'") or die(mysql_error());
$studData_row=$studData_query->fetch();
    
?>

<?php 
if(isset($_POST['verifyStudStatus'])){
    
    $conn->query("UPDATE useraccount SET verification_status='Verified' WHERE v_code='$studData_row[v_code]'");
    
    $user_data_query = $conn->query("SELECT user_id FROM useraccount WHERE v_code='$studData_row[v_code]'") or die(mysql_error());
    $user_data_row=$user_data_query->fetch();

    $conn->query("UPDATE students SET user_id='$user_data_row[user_id]', status='For Application Assessment' WHERE v_code='$studData_row[v_code]'");
  
?>

<script>
window.alert('Applicant verification success...');
window.location='list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=&strand=&major=&status=Setup';
</script> 


<?php } ?>

<?php 
if(isset($_POST['validateStudStatus'])){
    
    $conn->query("UPDATE students SET status='For Accounts Assessment' WHERE reg_id='$_GET[regx_id]'");
 
        //send validation/verification mail
        // Subject
        $subject = 'STC WEB PORTAL - ENROLLMENT';
        
        // Message
        $message = '
        <!DOCTYPE html>
        <html>
        <head>
        <style>
        p {
          border: 1px solid #e5eb0b;
          outline: #075907 solid 5px;
          margin: auto;  
          padding: 20px;
          background-color: #097609;
          color: white;
        }
        
        
        
        .btn {
          font-weight: 400;
          border: 1px solid transparent;
          padding: 0.55rem 0.75rem;
          font-size: 0.9rem;
          line-height: 1.5;
          border-radius: 0;
          -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
          transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
          transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
          transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        }
        
        
        .btn-success {
          color: color-yiq(#28a745);
          background-color: #28a745;
          border-color: white;
        }
        
        .btn-success:hover {
          color: color-yiq(#218838);
          background-color: #218838;
          border-color: white;
        }
        
        .btn-success:focus, .btn-success.focus {
          -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
        }
         
        .btn-success:not([disabled]):not(.disabled):active, .btn-success:not([disabled]):not(.disabled).active,
        .show > .btn-success.dropdown-toggle {
          color: color-yiq(#1e7e34);
          background-color: #1e7e34;
          border-color: #1c7430;
          -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
        }
        
        </style>
        
        <title>Sta. Teresa College – SIS</title>
        
        </head>
        <body>
        <p style="text-align: center;">
        <img src="http://stcbauan.edu.ph/stc-edu/img/stc_logo.png" style="width: 5%; height: 5%;" /><br />
        <strong style="font-size: x-large;">STA. TERESA COLLEGE</strong><br />
        Bauan, Batangas<br /><br />
        STUDENT INFORMATION SYSTEM
        </p>
        
        <br />
        
        <p style="background-color: white; color: #075907;">
        
        Congratulations!<br /><br />
        
        Your application has been approved by the Registrar&#146;s Office.<br /><br />
        
        You may now access STC Web Portal - Student&#146;s Dashboard <a href="'.$link_uri_test.'user-login-register.php" target="_blank" style="font-weight: bold; color: #097609;">here</a> using the login credentials – username and password, that you have entered in the STC Online Registration.<br /><br />
        
        Click button to activate account.<br /><br />
        <a href="'.$link_uri_test.'verify_account.php?email='.$studData_row['email'].'&v_code='.$studData_row['v_code'].'" target="_blank" class="btn btn-success" style="color: white; text-decoration-line: none;"><strong>ACTIVATE ACCOUNT</strong></a><br /><br />
 
 
        In the portal, you may review relevant student information and the schedule of school fees for your grade level.  This is also where you will upload your proof of payment for your online or through bank payment transaction.<br /><br />
        
        <br />
        
        For inquiries, you can email us at <strong style="color: #097609;">admission@stcbauan.edu.ph</strong>.  You can also send your inquiries to our official <a href="https://www.facebook.com/OfficialStcBauan/" target="_blank" style="font-weight: bold; color: #097609;">Facebook</a> page.
      
        </p>
        
        </body>
        </html>
        ';
        
        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        
        // Additional headers
        $headers[] = 'To: '.$studData_row['fname'].' '.$studData_row['lname'].'<'.$studData_row['email'].'>';
        $headers[] = 'From: STA. TERESA COLLEGE <online@stcbauan.edu.ph>';
        
        // Mail it
        mail($studData_row['email'], $subject, $message, implode("\r\n", $headers));
           
?>

<script>
window.alert('Student application for admission successfully validated...');
window.location='list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $studData_row['gradeLevel']; ?>&strand=<?php echo $studData_row['strand']; ?>&major=<?php echo $studData_row['major']; ?>';
</script> 


<?php } ?>


<?php 
if(isset($_POST['valid_file'])){
    
    $remarks=$_POST['remarks'];
    
    $conn->query("UPDATE tbl_reqs_students SET remarks='$remarks', status='Approved' WHERE stud_reqs_id='$_GET[stud_reqs_id]'");

             
?>

<script>
window.alert('File successfully approved...');
window.location='list_stud_applicants_reqs.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>';
</script> 


<?php } ?>


<?php   
if(isset($_POST['invalid_file'])){
    
    $remarks=$_POST['remarks'];
    
    $conn->query("UPDATE tbl_reqs_students SET remarks='$remarks', status='Disapproved' WHERE stud_reqs_id='$_GET[stud_reqs_id]'");

?>

<script>
window.alert('File successfully disapproved...');
window.location='list_stud_applicants_reqs.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>';
</script>  


<?php } ?>


