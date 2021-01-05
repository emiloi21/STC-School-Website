    <?php include('session.php'); ?>
    
    <?php 
    if(isset($_POST['savePayValReq']))
    {
        
        $dept=$_POST['dept'];
        $pm_id=$_POST['pm_id'];
        $transAmt=$_POST['transAmt'];
        
        $selectedMM=substr($_POST['transDate'], 5,2);
        $selectedDD=substr($_POST['transDate'], 8,2);
        $selectedYYYY=substr($_POST['transDate'], 0,4);
        $transDate=$selectedMM.'/'.$selectedDD.'/'.$selectedYYYY;
        
        $for_payment=$_POST['for_payment'];
        $student_remarks=addslashes($_POST['student_remarks']);
        
        $target_dir = "paymentValidReq/";
        $target_file = $target_dir.rand(1000,9999).'-'.basename($_FILES["per_file"]["name"]);
        
        
        
        $dateTimeSave = $currentDate.' | '.$currentTime;
        
        if (move_uploaded_file($_FILES["per_file"]["tmp_name"], $target_file)){
            
            $conn->query("INSERT INTO tbl_paymentvalidation(user_id, reg_id, pm_id, transAmt, transDate, file_name, date_time_uploaded, dept, schoolYear, for_payment, student_remarks, status)
            VALUES('$session_id', '$studData_row[reg_id]', '$pm_id', '$transAmt', '$transDate', '$target_file', '$dateTimeSave', '$dept', '$activeSchoolYear', '$for_payment', '$student_remarks', 'Pending')");
            
        ?>
    
        <script>
        window.alert('You request for payment validation was successfully added. Please wait for at least 24 hours to validate your request. An email and SMS will be sent once your request is validated.');
        window.location='list_paymentReqs.php';
        </script>    
        
        
        <?php
    
        }else{
            
        ?>
    
        <script>
        window.alert('Sorry, there was an error uploading your file.');
        window.location='list_paymentReqs.php';
        </script>    
        
        
        <?php } } ?>


    <?php 
    if(isset($_POST['deletePayValReq']))
    {
        
        $request_id=$_POST['request_id'];
        
        $payValid_query = $conn->query("SELECT * FROM tbl_paymentValidation WHERE request_id='$request_id'");
        $payValid_row=$payValid_query->fetch();
        
        if($payValid_row['status']==='Pending'){
        
        $conn->query("DELETE FROM tbl_paymentvalidation WHERE request_id='$request_id'");
    ?>
    
        <script>
        window.alert('Request deleted successfully...');
        window.location='list_paymentReqs.php';
        </script>    
    
    
    <?php }elseif($payValid_row['status']==='Validated'){ ?>
    
        <script>
        window.alert('Unable to delete, request has been validated');
        window.location='list_paymentReqs.php';
        </script>    


    <?php } } ?>