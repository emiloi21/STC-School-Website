
                <?php if($_GET['reportType']==='Monthly'){
                
                if(isset($_POST['search'])){
                $searched=$_POST['searchStudent'];
                }else{
                $searched='';
                }
                ?>
                
            <div class="col-lg-12 col-md-12">
  
            <hr />
            
                <form method="POST">
                <div class="form-group row">
                        <div class="col-sm-12">
                          <div class="input-group">
                          
                          <input value="<?php echo $searched; ?>" name="searchStudent" placeholder="Search for Student's ID Code / Lastname" class="form-control" required="true" />
                            
                            <div class="input-group-append">
                              <button name="search" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                            </div>
                          </div>
                        </div>
                    </div>
                 </form>   
 
                <div class="col-lg-12">
                <div class="table-responsive" style="margin-top: 12px;">
                <table id="" class="display" style="width:100%">
                
                <thead>
                        <tr>
                        <th></th>
                        <th>Full Name</th>
                        <th>RFID Tag</th>
                        <th>ID Code</th>
                        <th>Class Details</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                            <?php
                            
                            if($searched==='')
                            {
                                
                            }else{    
                                
                            $subjK_query = $conn->query("select * FROM students WHERE (student_id LIKE '%$searched%' OR lname LIKE '%$searched%') AND schoolYear='$data_src_sy' ORDER BY gender, lname, fname ASC") or die(mysql_error());
                            
                      while ($subjK_row = $subjK_query->fetch()) 
                      {
                        
                        $reg_id_search=$subjK_row['reg_id'];
                                
                                
                        if($subjK_row['mname']=='')
                        {
                            $finalMName='';
                            
                        }else{
                            
                            if($subjK_row['suffix']=='-') { $suffix=''; }else{ $suffix=$subjK_row['suffix'].' '; }
                            
                            $finalMName=$suffix.$subjK_row['mname'];
                        }
                        
                        $set_class_query = $conn->query("select * FROM classes WHERE class_id='$subjK_row[class_id]'") or die(mysql_error());
                        $setClass_row = $set_class_query->fetch();
                        
                        ?>
           
                        <tr>
                        <td style="width: 60px;"><img src="studentImg/<?php echo $subjK_row['img']; ?>" width="50" height="50" class="img-fluid rounded" /></td>
                        
                        <td><?php echo $subjK_row['lname'].", ".$subjK_row['fname']." ".$finalMName; ?></td>
                        
                        <td><?php echo $subjK_row['RFTag_id']; ?></td>
                        <td><?php echo $subjK_row['student_id']; ?></td>
                       
                        
                        
                        <td> <?php
                        if($setClass_row['dept']==='SHS'){
                            echo $setClass_row['gradeLevel']." - ".$setClass_row['strand']." - ".$setClass_row['section'];
                        }else{
                            echo $setClass_row['gradeLevel']." - ".$setClass_row['section'];
                        } ?>  </td>
                          
                        <td style="width: 100px;">
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#print_monthly_attendance<?php echo $subjK_row['RFTag_id']; ?>" href="#" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Monthly Summary</a>
                        
                        </td>
                        </tr>
    
                        
                        <!-- edit Class Modal -->
                          <div id="print_monthly_attendance<?php echo $subjK_row['RFTag_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="checkPrintDetails.php" method="POST">
                   

                              <input name="class_id" value="<?php echo $subjK_row['class_id']; ?>" type="hidden" />
                              <input name="RFTag_id" value="<?php echo $subjK_row['RFTag_id']; ?>" type="hidden" />
                              <input name="searched" value="<?php echo $searched; ?>" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Monthly Attendance - <?php echo $subjK_row['fname']." ".$subjK_row['mname']." ".$subjK_row['lname']; ?></h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                
                                <div style="margin: 10px 10px 10px 12px;" class="form-group row">
                                       
                                      <div class="col-lg-12">
                                        <div class="row">
                                          <div class="col-md-12">
                                             <label>Select Date</label>
                                            <input type="month" name="dateFrom" class="form-control" />
                            
                                          </div>
                                           
                        
                                        </div>
                                      </div> 
                                      
                                    </div>
                            
                     
                                 
                                  <div class="modal-footer">
                                  <button name="checkPrintDetailsMonthly" type="submit" class="btn btn-primary">Print Preview</button>
                                  </div>  
                                 
         
                                    
                        </form>     
                              </div>
                            </div>
                          </div>
        <!-- end edit Class Modal -->

                        <?php } } ?>
                       
                      </tbody>
                    </table>    
                    </div>
                    </div>
                    
                </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                <?php }else{ ?> 
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
        <form action="checkPrintDetails.php" method="POST">
                    

            <div class="col-lg-12 col-md-12">
            <br />
            <label>Select Date</label>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <input type="date" name="dateFrom" class="form-control" />
                   
                </div>
 
            </div>
            
            <hr />
            
            
            
            
            
            
                <div class="tab">
                  <a class="tablinks" onclick="openCity(event, 'London')">Kinder</a>
                  <a class="tablinks" onclick="openCity(event, 'Paris')">Elementary</a>
                  <a class="tablinks" onclick="openCity(event, 'Tokyo')">JHS</a>
                  <a class="tablinks" onclick="openCity(event, 'Manila')">SHS</a>
                </div>
          
          
          <hr />
          
          <div id="London" class="tabcontent">
 
               
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                    
                      <thead>
                        <tr>
                         <th><input name="classcheckbox[]" type="checkbox" value="ALL Kinder" /></th>
                          <th>Grade Level - Section</th>
                          <th>Adviser</th> 
                        </tr>
                      </thead>
                      <tbody>
                      
                            <?php
                             
                            $subjK_query = $conn->query("select * FROM classes WHERE (gradeLevel='Nursery' OR gradeLevel='Kinder 1' OR gradeLevel='Kinder 2') AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                            while ($subjK_row = $subjK_query->fetch()) 
                            {  ?>
           
                            <tr>
                            <td><input name="classcheckbox[]" type="checkbox" value="<?php echo $subjK_row['class_id']; ?>" /></td>
                            <td><?php echo $subjK_row['gradeLevel']." - ".$subjK_row['section']; ?></td>
                            <td><?php echo $subjK_row['adviser']; ?></td>
                            </tr>
 
                  
                            <?php } ?>
                       
                      </tbody>
                    </table>
                    </div>
                    </div>
                    
          </div>
          
          
          <div id="Paris" class="tabcontent">
          
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">      
                      <thead>
                        <tr>
                       <th><input name="classcheckbox[]" type="checkbox" value="ALL Elem" /></th>
                          <th>Grade Level - Section</th>
                          <th>Adviser</th> 
                        </tr>
                      </thead>
                      <tbody>
                      
                            <?php
                         
                            $subjK_query = $conn->query("select * FROM classes WHERE (gradeLevel='Grade 1' OR gradeLevel='Grade 2' OR gradeLevel='Grade 3' OR gradeLevel='Grade 4' OR gradeLevel='Grade 5' OR gradeLevel='Grade 6') AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                            while ($subjK_row = $subjK_query->fetch()) 
                            {  ?>
           
                            <tr>
                            <td><input name="classcheckbox[]" type="checkbox" value="<?php echo $subjK_row['class_id']; ?>" /></td>
                            <td><?php echo $subjK_row['gradeLevel']." - ".$subjK_row['section']; ?></td>
                            <td><?php echo $subjK_row['adviser']; ?></td>
                            </tr>
 
                  
                      
                            <?php } ?>
                       
                      </tbody>
                    </table>
                    </div>
                    </div>
                    
          </div>
          
          
          <div id="Tokyo" class="tabcontent">
          
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                      <thead>
                        <tr>
                        <th><input name="classcheckbox[]" type="checkbox" value="ALL JHS" /></th>
                          <th>Grade Level - Section</th>
                          <th>Adviser</th> 
                        </tr>
                      </thead>
                      <tbody>
                       
                            <?php
                            
                            $subjK_query = $conn->query("select * FROM classes WHERE (gradeLevel='Grade 7' OR gradeLevel='Grade 8' OR gradeLevel='Grade 9' OR gradeLevel='Grade 10') AND schoolYear='$data_src_sy' ORDER BY gradeLevel, section ASC") or die(mysql_error());
                            while ($subjK_row = $subjK_query->fetch()) 
                            {  ?>
           
                            <tr>
                            <td><input name="classcheckbox[]" type="checkbox" value="<?php echo $subjK_row['class_id']; ?>" /></td>
                            <td><?php echo $subjK_row['gradeLevel']." - ".$subjK_row['section']; ?></td>
                            <td><?php echo $subjK_row['adviser']; ?></td>
                            </tr>
 
                  
                  
                        <?php } ?>
                       
                      </tbody>
                    </table>
                    </div>
                    </div>
                    
          </div>
          
          
          <div id="Manila" class="tabcontent">
          
                    <div class="col-lg-12">
                    <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                      <thead>
                        <tr>
                        <th><input name="classcheckbox[]" type="checkbox" value="ALL SHS" /></th>
                          <th>Grade Level - Strand - Section</th>
                          <th>Adviser</th> 
                        </tr>
                      </thead>
                      <tbody>
                      
                            <?php
                            $subjK_ctr=0;   
                            $subjK_query = $conn->query("select * FROM classes WHERE (gradeLevel='Grade 11' OR gradeLevel='Grade 12') AND schoolYear='$data_src_sy' ORDER BY gradeLevel, strand, section ASC") or die(mysql_error());
                            while ($subjK_row = $subjK_query->fetch()) 
                            {  ?>
           
                            <tr>
                            <td><input name="classcheckbox[]" type="checkbox" value="<?php echo $subjK_row['class_id']; ?>" /></td>
                          <td><?php echo $subjK_row['gradeLevel']." - ".$subjK_row['strand']." - ".$subjK_row['section']; ?></td>
                          <td><?php echo $subjK_row['adviser']; ?></td>
                          </tr>  
                        
                       <?php } ?>
                       
                      </tbody>
                    </table>
                    </div>
                    </div>
                    
          </div>
          
 </div>
 
                 <div class="modal-footer">
                <button name="checkPrintDetails" type="submit" class="btn btn-primary">Print Preview</button>
                </div>
                    
                    
                </form>
                
 <?php } ?>

