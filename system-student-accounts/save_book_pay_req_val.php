<?php include('session.php'); ?>

<?php 
if(isset($_POST['invalid_file'])){
    
    $dept=$_GET['dept'];
    $reg_id=$_GET['regx_id'];
    $request_id=$_GET['request_id'];
    
    $acctg_remarks=addslashes($_POST['acctg_remarks']);
    
    $studData_query = $conn->prepare('SELECT * FROM tbl_book_students WHERE reg_id = :reg_id');
    $studData_query->execute(['reg_id' => $reg_id]);
    $studData_row = $studData_query->fetch();
    
    $conn->query("UPDATE tbl_paymentvalidation SET acctg_remarks='$acctg_remarks', status='Disapproved' WHERE request_id='$request_id'");
    
    
        $messageText='STC - Book Distribution System'."\r\r".'Good day '.$studData_row['lname'].', '.$studData_row['fname'].'!'."\r\r".'Thank you for using STC Online Book Distribution System.  Sorry your request for payment validation was rejected due to:'."\r\r".$acctg_remarks."\r\r".'Kindly make another request and do the necessary adjustment.'."\r\r".'Keep Safe, Teresian.';
    
        //save to sms server =x=x=x=x=x=x=x=x=x=x=x
        $conn->query("INSERT INTO messageout(MessageTo, MessageText)VALUES('$studData_row[contact_num]', '$messageText')");
        //end save to sms server =x=x=x=x=x=x=x=x=x=x=x   
        
        //send validation/verification mail
        // Subject
        $subject = 'BOOK DISTRIBUTION SYSTEM - PAYMENT REQUEST UPDATE';
        
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
        
        <title>STC – BDS</title>
        
        </head>
        <body>
        <p style="text-align: center;">
        <img src="http://stcbauan.edu.ph/stc-edu/img/stc_logo.png" style="width: 5%; height: 5%;" /><br />
        <strong style="font-size: x-large;">STA. TERESA COLLEGE</strong><br />
        Bauan, Batangas<br /><br />
        ONLINE BOOK DISTRIBUTION SYSTEM
        </p>
        
        <br /><br />
        
        <p style="background-color: white; color: #075907;">
        
        Thank you for using STC Online Book Distribution System. Sorry your request for payment validation was rejected due to: <br />
        
        '.$acctg_remarks.'
        
        <br /><br />
        
        Kindly make another request and do the necessary adjustment. 
        
        <br /><br />
        
        Keep Safe, Teresian.
        
        <br /><br />
        
        For inquiries, you can email us at <strong style="color: #097609;">inquiry@stcbauan.edu.ph</strong>.  You can also send your inquiries to our official <a href="https://www.facebook.com/OfficialStcBauan/" target="_blank" style="font-weight: bold; color: #097609;">Facebook</a> page.
      
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
window.alert('Request was disapproved.');
window.location='list_payment_val_books.php?dept=<?php echo $dept; ?>';
</script> 

<?php } ?>

