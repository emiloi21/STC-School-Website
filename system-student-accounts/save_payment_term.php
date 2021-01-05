    <?php include('session.php'); ?>
    
    <?php
    
    if(isset($_POST['updatePaymentTerm']))
    {
        
        $pterm_id=$_POST['pterm_id'];
        $month_set_up=$_POST['month_set_up'];
        
        
        $updPayMethod = 'UPDATE tbl_payment_terms SET month_set_up = :month_set_up WHERE pterm_id = :pterm_id';
        $conn->prepare($updPayMethod)->execute(['month_set_up' => $month_set_up, 'pterm_id' => $pterm_id]);

    ?>

    <script>
    window.alert('Payment term settings updated successfully...');
    window.location='list_payment_term.php';
    </script>
    
    <?php } ?>
    