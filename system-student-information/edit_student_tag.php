
<?php
include('session.php');

function get_client_ip2() {
    $ipaddress2 = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress2 = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress2 = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress2 = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress2 = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress2 = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress2 = getenv('REMOTE_ADDR');
    else
        $ipaddress2 = 'UNKNOWN';
    return $ipaddress2;
} ?>
                                       
    <?php 
    
    if(get_client_ip2()=="::1")
    {
      $machine_ip=gethostbyname(trim(`hostname`));  
    }else{
      $machine_ip=get_client_ip2();
    }
     
    $rfid_query = $conn->query("SELECT RFID_tag FROM client_computer WHERE flowAccess='One' AND ipAddress='$machine_ip'") or die(mysql_error());
     
    $rfid_row = $rfid_query->fetch(); 
    ?>
                                    
    <input required="true" name="RFTag_id" type="text" class="form-control" value="<?php echo $rfid_row['RFID_tag']; ?>" required=""/>
                                          
 


 