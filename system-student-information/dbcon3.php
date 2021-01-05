<?php

date_default_timezone_set('Asia/Manila');

$servername = "localhost";
$username = "root";
$password = "Emiloi21";
$db = "test_stc_edu";
 
//#=================================================================================
       
    try {
   
    $conn3 = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
    catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
    return $conn3;
    
//#=================================================================================    



//error_reporting(0);
?>
