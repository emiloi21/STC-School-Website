
<?php include('session.php'); ?>


                        
                        <?php
                        
                        $idcode_gen_query = $conn->query("SELECT prefix, last_idNum FROM idcode_gen WHERE dept='$_GET[dept]'") or die(mysql_error());
                        $idcode_gen_row=$idcode_gen_query->fetch();
                             
                        $new_id_num=$idcode_gen_row['last_idNum']+1;
                                          
                        if($new_id_num>=0 AND $new_id_num<=9)
                        {
                            $final_idcode=$idcode_gen_row['prefix']."-".substr(date('Y'), 2, 2)."000".$new_id_num;             
                        }
                        elseif($new_id_num>9 AND $new_id_num<=99)
                        {
                            $final_idcode=$idcode_gen_row['prefix']."-".substr(date('Y'), 3, 2)."00".$new_id_num;
                        }
                        elseif($new_id_num>99 AND $new_id_num<=999)
                        {
                            $final_idcode=$idcode_gen_row['prefix']."-".substr(date('Y'), 3, 2)."0".$new_id_num;
                        }
                        elseif($new_id_num>999 AND $new_id_num<=9999)
                        {
                            $final_idcode=$idcode_gen_row['prefix']."-".substr(date('Y'), 3, 2).$new_id_num;
                        }
                
                        
                        ?>
                            <input value="<?php echo $final_idcode; ?>" name="student_id" type="text" class="form-control form-control-sm" readonly="" />
                            <small>ID Code</small>
                        <input name="new_id_num" value="<?php echo $new_id_num; ?>" type="hidden" />
                        