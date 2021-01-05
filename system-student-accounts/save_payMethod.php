    <?php include('session.php'); ?>


    <?php
    
    if(isset($_POST['savePayMethod']))
    {
        
        $type=$_POST['type'];
        $nameProvider=$_POST['nameProvider'];
        $accountName = $_POST['accountName'];
        $accountNum_link = $_POST['accountNum_link'];
        
        if($type==='Paypal'){
            $accountNum_link="https://paypal.me/".$accountNum_link;
        }
        
        
        
        $save_payMethod = "INSERT INTO tbl_payment_methods(nameProvider, accountName, accountNum_link, type)
        VALUES('$nameProvider', '$accountName', '$accountNum_link', '$type')";
        $conn->exec($save_payMethod);
    
    ?>

    <script>
    window.alert('Payment method profile added successfully...');
    window.location='list_payment_method.php';
    </script>
    
    <?php } ?>
    
    
    <?php
    
    if(isset($_POST['updatePayMethod']))
    {
        
        $pm_id=$_POST['pm_id'];
        
        $type=$_POST['type'];
        $nameProvider=$_POST['nameProvider'];
        $accountName=$_POST['accountName'];
        $accountNum_link=$_POST['accountNum_link'];
        $status=$_POST['status'];
        
        if($type==='Paypal'){
            $accountNum_link="https://paypal.me/".$accountNum_link;
        }
 
        
        $updPayMethod = 'UPDATE tbl_payment_methods SET nameProvider = :nameProvider, accountName = :accountName, accountNum_link = :accountNum_link, status = :status WHERE pm_id = :pm_id';
        $conn->prepare($updPayMethod)->execute(['nameProvider' => $nameProvider, 'accountName' => $accountName, 'accountNum_link' => $accountNum_link, 'status' => $status, 'pm_id' => $pm_id]);

    ?>

    <script>
    window.alert('Payment method profile updated successfully...');
    window.location='list_payment_method.php';
    </script>
    
    <?php } ?>

    
    <?php
    
    if(isset($_POST['deletePayMethod']))
    {
        
        $pm_id=$_POST['pm_id'];
        
        $delPayMethod = 'DELETE FROM tbl_payment_methods WHERE pm_id = :pm_id';
        $conn->prepare($delPayMethod)->execute(['pm_id' => $pm_id]);

    ?>

    <script>
    window.alert('Payment method deleted successfully...');
    window.location='list_payment_method.php';
    </script>
    
    <?php } ?>
    