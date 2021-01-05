
<?php

include('session.php');

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
} ?>


<div class="form-group row">
                            <label class="col-sm-2 form-control-label">RFID Tag</label>
                                <div class="col-sm-10">
                                      
                                    <div class="row">
                                        <div class="col-md-6">

                                        <?php 
                                        
                                        if(get_client_ip()=="::1")
                                        {
                                            $machine_ip=gethostbyname(trim(`hostname`));  
                                        }else{
                                            $machine_ip=get_client_ip();
                                        }
                                        
                                        $rfid_query = $conn->query("SELECT RFID_tag FROM client_computer WHERE flowAccess='One' AND ipAddress='$machine_ip'") or die(mysql_error());
                                        $rfid_row = $rfid_query->fetch(); 
                                        
                                        ?>
                                    
                                        <input required="true" name="RFTag_id" type="text" class="form-control" value="<?php echo $rfid_row['RFID_tag']; ?>" required=""/>
                                          
                              
                                        </div>
                                            
                                        <div class="col-md-6">
                                                     
                                        <div class="i-checks">
                                                  
                                        <label for="checkboxCustom2">Tap RFID Tag</label>
                                        </div>
                                                  
                                        </div>
                                    </div>
                                        
                                </div>
                        </div>
                        
                            
                         