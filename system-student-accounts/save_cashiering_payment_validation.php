<?php include('session.php'); ?>


<?php

if(isset($_POST['updatePayment']))
{
    $conn->query("UPDATE tbl_student_payment_dummy SET amt_paid='$_POST[amt_paid]' WHERE payment_id='$_POST[payment_id]'");
    
    $conn=null;
?>

<script>
window.location='cashiering_system_payment_validation.php?reg_id=<?php echo $_GET['reg_id']; ?>&assessment_id=<?php echo $_GET['assessment_id']; ?>&schoolYear=<?php echo $_GET['schoolYear']; ?>&semester=<?php echo $_GET['semester']; ?>&payment_type=<?php echo $_GET['payment_type']; ?>&receipt_num=<?php echo $_GET['receipt_num']; ?>&request_id=<?php echo $_GET['request_id']; ?>';
</script>

<?php } ?>


<?php

if(isset($_POST['updatePayeeCash']))
{
    
    if($_POST['entryDate']===''){
        $currentDate=date('m/d/Y');
    }else{
        $currentDate=substr($_POST['entryDate'], 5, 2).'/'.substr($_POST['entryDate'], 8, 2).'/'.substr($_POST['entryDate'], 0, 4);
    }
    
    $currentTime=date('h:i:s A');

    $net_amt_payable=$_POST['net_amt_payable'];
    $payee_cash=$_POST['payee_cash'];
    $payee_change=$payee_cash-$net_amt_payable;
    
    //GENERATE FINAL OR
    $receipt_gen_query = $conn->query("SELECT current_or FROM receipt_gen") or die(mysql_error());
    $receipt_gen_row=$receipt_gen_query->fetch();
                
    $new_or_num=$receipt_gen_row['current_or']+1;
                                  
    if($new_or_num>=0 AND $new_or_num<=9)
    {
        $receipt_num="00000".$new_or_num;             
    }
    elseif($new_or_num>9 AND $new_or_num<=99)
    {
        $receipt_num="0000".$new_or_num;
    }
    elseif($new_or_num>99 AND $new_or_num<=999)
    {
        $receipt_num="000".$new_or_num;
    }
    elseif($new_or_num>999 AND $new_or_num<=9999)
    {
        $receipt_num="00".$new_or_num;
    }
    elseif($new_or_num>9999 AND $new_or_num<=99999)
    {
        $receipt_num="0".$new_or_num;
    }
    elseif($new_or_num>99999 AND $new_or_num<=999999)
    {
        $receipt_num=$new_or_num;
    }
    
    
    $final_or='20-'.$receipt_num;
    
    //END OR GENERATION
    
    $tbl_student_payment_dummy_query = $conn->query("SELECT * FROM tbl_student_payment_dummy WHERE reg_id='$_GET[reg_id]' AND receipt_num='$_GET[receipt_num]' AND schoolYear='$_GET[schoolYear]'") or die(mysql_error());
    while($tbl_student_payment_dummy_row=$tbl_student_payment_dummy_query->fetch())
    {
    
        if($tbl_student_payment_dummy_row['amt_paid']>0){
       
        $conn->query("INSERT INTO tbl_student_payment(
        
        reg_id,
        receipt_num,
        schoolYear,
        semester,
        payment_type,
        method_id,
        category_id,
        amt_payable,
        amt_paid,
        net_amt_payable,
        payee_cash,
        payee_change,
        trans_date,
        trans_time,
        personnel_user_id
        
        )VALUES(
        
        '$_GET[reg_id]',
        '$final_or',
        '$_GET[schoolYear]',
        '$_GET[semester]',
        '$_GET[payment_type]',
        '$_GET[request_id]',
        '$tbl_student_payment_dummy_row[category_id]',
        '$tbl_student_payment_dummy_row[amt_payable]',
        '$tbl_student_payment_dummy_row[amt_paid]',
        '$net_amt_payable',
        '$payee_cash',
        '$payee_change',
        '$currentDate',
        '$currentTime',
        '$session_id'
        )");
        
        $tbl_student_assessments_query = $conn->query("SELECT total_amt_payable, total_amt_paid FROM tbl_student_assessments WHERE reg_id='$_GET[reg_id]' AND assessment_id='$_GET[assessment_id]' AND category_id='$tbl_student_payment_dummy_row[category_id]'") or die(mysql_error());
        $tbl_student_assessments_row=$tbl_student_assessments_query->fetch();
        
        $total_amt_paid=$tbl_student_assessments_row['total_amt_paid']+$tbl_student_payment_dummy_row['amt_paid'];
        
        $total_amt_bal=$tbl_student_assessments_row['total_amt_payable']-$total_amt_paid;
        
        $conn->query("UPDATE tbl_student_assessments SET total_amt_paid='$total_amt_paid', total_amt_bal='$total_amt_bal' WHERE reg_id='$_GET[reg_id]' AND assessment_id='$_GET[assessment_id]' AND category_id='$tbl_student_payment_dummy_row[category_id]'");
        
        }
    }
    
    $current_or=(int)$receipt_num;
    $date_time_validated=$currentDate.' | '.$currentTime;
    
    $conn->query("UPDATE receipt_gen SET current_or='$current_or' WHERE id=1") or die(mysql_error());
    
    $conn->query("UPDATE tbl_paymentvalidation SET date_time_validated='$date_time_validated', status='Validated' WHERE request_id='$_GET[request_id]'") or die(mysql_error());
    
    $stuDataquery = $conn->query("SELECT * FROM students WHERE reg_id='$_GET[reg_id]'") or die(mysql_error());
    $stuData_row=$stuDataquery->fetch();
    
    if($stuData_row['status']==='For Payment'){
    
    if($stuData_row['classification']==='New' OR $stuData_row['classification']==='Transferee'){
      
        $idcode_gen_query = $conn->query("SELECT prefix, last_idNum FROM idcode_gen WHERE dept='$stuData_row[dept]'") or die(mysql_error());
        $idcode_gen_row=$idcode_gen_query->fetch();
                                 
        $new_id_num=$idcode_gen_row['last_idNum']+1;
                                  
        if($new_id_num>=0 AND $new_id_num<=9)
        {
            $final_idcode=$idcode_gen_row['prefix']."00".$new_id_num;             
        }
        elseif($new_id_num>9 AND $new_id_num<=99)
        {
            $final_idcode=$idcode_gen_row['prefix']."0".$new_id_num;
        }
        elseif($new_id_num>99 AND $new_id_num<=999)
        {
            $final_idcode=$idcode_gen_row['prefix'].$new_id_num;
        }
        
        //ID GENERATOR FOR COLLEGE STUDENTS
        if($stuData_row['dept']==='College'){ $final_idcode=$final_idcode.'-C'; }
        //ID GENERATOR FOR COLLEGE STUDENTS
        
        $conn->query("UPDATE students SET student_id='$final_idcode', status='Enrolled' WHERE reg_id='$_GET[reg_id]'") or die(mysql_error());
        $conn->query("UPDATE useraccount SET username='$final_idcode' WHERE user_id='$stuData_row[user_id]'") or die(mysql_error());
        
        $updIDCodeGen = 'UPDATE idcode_gen SET last_idNum = :last_idNum WHERE dept = :dept';
        $conn->prepare($updIDCodeGen)->execute(['last_idNum' => $new_id_num, 'dept' => $stuData_row['dept']]);

    //SEND VALIDATION EMAIL FOR NEW/TRANSFEREE STUDENTS
    
    // Subject
    $subject = 'STC WEB PORTAL - ACCOUNTS & ASSESSMENTS';
    
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
    
    <title>Sta. Teresa College – SAAS</title>
    
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
    Good Day!<br /><br />
    
    
    



    Your proof of payment has already been received and verified by the Accounting Office.  Thank you for your trust in Sta. Teresa College.<br /><br />
    
    Congratulations! You are officially enrolled for this School Year '.$data_src_sy.'.<br /><br />
    
    Take note of your NEW USERNAME (Official School ID Code).  This will be used for your future system logins.<br /><br />
    
    <strong style="text-decoration: underline;">STUDENT ACCOUNT DETAILS</strong><br /><br />
    <strong>New Username: '.$final_idcode.'</strong><br /><br /><br />
    
    
    For inquiries, you can email us at <strong style="color: #097609;">admission@stcbauan.edu.ph</strong>.  You can also send your inquiries to our official <a href="https://www.facebook.com/OfficialStcBauan/" target="_blank" style="font-weight: bold; color: #097609;">Facebook</a> page.
      
    </p>
    
    </body>
    </html>
    ';
    
    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
    // Additional headers
    $headers[] = 'To: '.$stuData_row['fname'].' '.$stuData_row['lname'].'<'.$stuData_row['email'].'>';
    $headers[] = 'From: STA. TERESA COLLEGE <online@stcbauan.edu.ph>';
    
    // Mail it
    mail($stuData_row['email'], $subject, $message, implode("\r\n", $headers));
    
    
    $messageText='STC Web Portal'."\r\r".'Good day '.$stuData_row['lname'].', '.$stuData_row['fname'].'!'."\r\r".'Your payment validation request amounting '.$net_amt_payable.' was already verified by the Accounting Office.'."\r\r".'Please take note:'."\r".'ID CODE/NEW USERNAME: '.$final_idcode."\r".'This will be used for your next logins. Please check email for more details'."\r\r".'No reply needed';
     
    //save to sms server =x=x=x=x=x=x=x=x=x=x=x
    $conn->query("INSERT INTO messageout(MessageTo, MessageText)VALUES('$stuData_row[contact_num]', '$messageText')");
    //end save to sms server =x=x=x=x=x=x=x=x=x=x=x   
        
        
    }else{
        
        $conn->query("UPDATE students SET status='Enrolled' WHERE reg_id='$_GET[reg_id]'") or die(mysql_error());

    //SEND VALIDATION EMAIL FOR NEW/TRANSFEREE STUDENTS
    
    // Subject
    $subject = 'STC WEB PORTAL - ACCOUNTS & ASSESSMENTS';
    
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
    
    <title>Sta. Teresa College – SAAS</title>
    
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
    Good Day!<br /><br />
    
    Your proof of payment has already been received and verified by the Accounting Office.  Thank you for your trust in Sta. Teresa College.<br /><br />
    
    Congratulations! You are officially enrolled for this School Year '.$data_src_sy.'.<br /><br /><br />

    For inquiries, you can email us at <strong style="color: #097609;">admission@stcbauan.edu.ph</strong>.  You can also send your inquiries to our official <a href="https://www.facebook.com/OfficialStcBauan/" target="_blank" style="font-weight: bold; color: #097609;">Facebook</a> page.
      
    </p>
    
    </body>
    </html>
    ';
    
    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
    // Additional headers
    $headers[] = 'To: '.$stuData_row['fname'].' '.$stuData_row['lname'].'<'.$stuData_row['email'].'>';
    $headers[] = 'From: STA. TERESA COLLEGE <online@stcbauan.edu.ph>';
    
    // Mail it
    mail($stuData_row['email'], $subject, $message, implode("\r\n", $headers));
    
    
    $messageText='STC Web Portal'."\r\r".'Good day '.$stuData_row['lname'].', '.$stuData_row['fname'].'!'."\r\r".'Your payment validation request amounting '.$net_amt_payable.' was already verified by the Accounting Office. Please check email for more details'."\r\r".'No reply needed';
     
    //save to sms server =x=x=x=x=x=x=x=x=x=x=x
    $conn->query("INSERT INTO messageout(MessageTo, MessageText)VALUES('$stuData_row[contact_num]', '$messageText')");
    //end save to sms server =x=x=x=x=x=x=x=x=x=x=x 
    
    }
    
        
    }
    
    $conn->query("DELETE FROM tbl_student_payment_dummy WHERE receipt_num='$_GET[receipt_num]'") or die(mysql_error());
    
    $tbl_student_payment_dummy_query=null;
    $tbl_student_payment_dummy_row=null;
    $tbl_student_assessments_query=null;
    $tbl_student_assessments_row=null;
    $conn=null;
    
?>

<script>
window.alert("Transaction Summary: \n Total Payable: <?php echo $net_amt_payable; ?> \n Cash Tendered: <?php echo $payee_cash; ?> \n Change: <?php echo $payee_change; ?>");
window.open('print_receipt.php?receipt_num=<?php echo $final_or; ?>', '_blank');
window.location='list_payment_val_req.php?dept=All';
</script>

<?php } ?>

 


<?php

if(isset($_POST['load_newTrans']))
{ 
    $conn->query("DELETE FROM tbl_student_payment_dummy WHERE personnel_user_id='$session_id'") or die(mysql_error());
    $conn=null;
?>

<script>
window.location='list_payment_val_req.php?dept=All';
</script>

<?php } ?>
 
 