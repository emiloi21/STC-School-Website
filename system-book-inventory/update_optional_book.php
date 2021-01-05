    <?php include('session.php'); ?>
        
    <?php
    if($_GET['action']==='Add'){
        
        $book_query = $conn->prepare('SELECT * FROM tbl_book_booklist WHERE book_id = :book_id');
        $book_query->execute(['book_id' => $_GET['book_id']]);
        $book_row = $book_query->fetch();

        $conn->query("INSERT INTO tbl_book_res_dummy(reg_id, book_id, book_amt, type)
        VALUES('$session_id', '$_GET[book_id]', '$book_row[book_amt]', '$book_row[type]')");


    ?>
    
    <script>
    window.alert('Book deleted from selection successfully...');
    window.location='book_reservation.php';
    </script>
    
    <?php }else{
        
        $conn->query("DELETE FROM tbl_book_res_dummy WHERE reg_id='$session_id' AND book_id='$_GET[book_id]'");
    ?>
    
    <script>
    window.alert('Book added from selection successfully...');
    window.location='book_reservation.php';
    </script>
    
    <?php } ?>
 