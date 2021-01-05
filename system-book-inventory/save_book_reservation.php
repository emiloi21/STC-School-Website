    <?php include('session.php'); ?>

    <?php if(isset($_POST['save_book_selection'])){ ?>
    
    <script>
    window.location='book_reservation_mop.php';
    </script>
    
    <?php } ?>
    
    
    
    <?php 
    if(isset($_POST['save_payment_selection'])){
    
    $total_amt=$_POST['total_amt'];
    $payment_plan=$_POST['payment_plan'];
    
    $str_pay_method='';
    
    $pay_methods_query = $conn->prepare('SELECT * FROM tbl_payment_methods WHERE status = :status ORDER BY type, accountName');
    $pay_methods_query->execute(['status' => 'Active']);
    while($pay_methods_row = $pay_methods_query->fetch()){
        
        
        //Bank Transfer
        //Money Transfer
        //Wallet App
        //Paypal
        $str_pay_method='Provider: '.$pay_methods_row['nameProvider'].'<br />'.'Account Name: '.$pay_methods_row['accountName'].'<br />'.'Account Number: '.$pay_methods_row['accountNum_link'].'<br /><br />';
        $str_pay_method_sms='Provider: '.$pay_methods_row['nameProvider']."\r".'Account Name: '.$pay_methods_row['accountName']."\r".'Account Number: '.$pay_methods_row['accountNum_link']."\r\r";
    }
    
    
    
    
    
    
    //BOOK LIST QUERY - REQUIRED
    $books_query = $conn->prepare('SELECT * FROM tbl_book_booklist WHERE gradeLevel = :gradeLevel AND strand = :strand AND major = :major AND section = :section');
    $books_query->execute(['gradeLevel' => $studData_row['gradeLevel'], 'strand' => $studData_row['strand'], 'major' => $studData_row['major'], 'section' => $studData_row['section']]);
    while($books_row = $books_query->fetch()){
        
        $conn->query("INSERT INTO tbl_book_reserved(reg_id, book_id, book_amt, type)VALUES('$session_id', '$books_row[book_id]', '$books_row[book_amt]', '$books_row[type]')");
    
    }
    
    $conn->query("UPDATE tbl_book_students SET order_status='Submitted' WHERE reg_id='$session_id'");
    
    
    //BOOK LIST QUERY - OPTIONAL
    $book_opt_query = $conn->prepare('SELECT * FROM tbl_book_res_dummy WHERE reg_id = :reg_id');
    $book_opt_query->execute(['reg_id' => $session_id]);
    while($book_opt_row = $book_opt_query->fetch()){
        
        $conn->query("DELETE FROM tbl_book_reserved WHERE reg_id='$session_id' AND book_id='$book_opt_row[book_id]'");

    }
    
    $conn->query("DELETE FROM tbl_book_res_dummy WHERE reg_id='$session_id'");
    
    if($payment_plan==='Cash'){
      
        $save_payables = "INSERT INTO tbl_book_payables(reg_id, total_amt, payment_term, payment_plan)
        VALUES ('$session_id', '$total_amt', 'Book Fee - 1st Payment', '$payment_plan')";
        $conn->exec($save_payables);
       
       
    }elseif($payment_plan==='Installment 1'){
        
        $i2_a_amt=$total_amt/2;
        
        // begin the transaction
        $conn->beginTransaction();
                            
        // our SQL statements
        $conn->exec("INSERT INTO tbl_book_payables(reg_id, total_amt, payment_term, payment_plan)
        VALUES ('$session_id', '$i2_a_amt', 'Book Fee - 1st Payment', '$payment_plan')");
                            
        $conn->exec("INSERT INTO tbl_book_payables(reg_id, total_amt, payment_term, payment_plan)
        VALUES ('$session_id', '$i2_a_amt', 'Book Fee - 2nd Payment', '$payment_plan')");
        
        // commit the transaction
        $conn->commit();
        
        
    }elseif($payment_plan==='Installment 2'){
        
        $i2_a_amt=$total_amt/2;
        $i2_b_amt=$total_amt/4;
        
        // begin the transaction
        $conn->beginTransaction();
                            
        // our SQL statements
        $conn->exec("INSERT INTO tbl_book_payables(reg_id, total_amt, payment_term, payment_plan)
        VALUES ('$session_id', '$i2_a_amt', 'Book Fee - 1st Payment', '$payment_plan')");
                            
        $conn->exec("INSERT INTO tbl_book_payables(reg_id, total_amt, payment_term, payment_plan)
        VALUES ('$session_id', '$i2_b_amt', 'Book Fee - 2nd Payment', '$payment_plan')");
                          
        $conn->exec("INSERT INTO tbl_book_payables(reg_id, total_amt, payment_term, payment_plan)
        VALUES ('$session_id', '$i2_b_amt', 'Book Fee - 3rd Payment', '$payment_plan')");
        
        // commit the transaction
        $conn->commit();
    }
    

        $messageText='STC - Book Distribution System'."\r\r".'Good day '.$studData_row['lname'].', '.$studData_row['fname'].'!'."\r\r".'Thank you for using STC Online Book Distribution System.  For ease of payment transaction, you may use bank fund transfer to'."\r\r".$str_pay_method_sms.'Please upload your proof of payment in your STC Online Book Distribution System account for crediting purposes.'."\r\r".'Keep Safe, Teresian.';
    
        //save to sms server =x=x=x=x=x=x=x=x=x=x=x
        $conn->query("INSERT INTO messageout(MessageTo, MessageText)VALUES('$studData_row[contact_num]', '$messageText')");
        //end save to sms server =x=x=x=x=x=x=x=x=x=x=x   
    
        // Subject
        $subject = 'STC Online Book Distribution System';
        
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
        
        <title>Sta. Teresa College – Book Reservation System</title>
        
        </head>
        <body>
        <p style="text-align: center;">
        <img src="http://stcbauan.edu.ph/stc-edu/img/stc_logo.png" style="width: 5%; height: 5%;" /><br />
        <strong style="font-size: x-large;">STA. TERESA COLLEGE</strong><br />
        Bauan, Batangas<br /><br />
        ONLINE BOOK DISTRIBUTION SYSTEM
        </p>
        
        <br />
        
        <p style="background-color: white; color: #075907;">
        Good Day!<br /><br />
        
        Thank you for using STC Online Book Distribution System.  For ease of payment transaction, you may use bank fund transfer to:<br /><br />
        
        '.$str_pay_method.'
        
        Please upload your proof of payment in your STC Online Book Distribution System account for crediting purposes.<br /><br />
        
        Keep Safe, Teresian.<br /><br />

        
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
    window.alert('Book Assessment was successfully submitted. Kindly check your registered email account for the next procedure. Thank you.');
    window.location='home.php';
    </script>
    
    <?php } ?>
    