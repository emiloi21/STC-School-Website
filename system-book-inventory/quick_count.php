<!-- Counts Section -->
      <section class="dashboard-counts section-padding" style="margin-bottom: 0px;">
        <div class="container-fluid">
          <div class="row">
            
            <!-- Count item widget-->
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-paper-airplane"></i></div>
                <div class="name">
                <strong class="text-uppercase">SY <?php echo $studData_row['schoolYear']; ?>
                
                <?php if($studData_row['dept']==='College' OR $studData_row['dept']==='Senior High School'){ ?>
                &nbsp;&nbsp;<div class="badge badge-info"><?php echo $studData_row['sem']; ?></div>
                <?php } ?>
                
                </strong>
                
                <span style="font-weight: bold;" class="text-primary">
                <?php
                if($studData_row['dept']==='College'){
                
                if($studData_row['major']==='N/A' OR $studData_row['major']==='-'){ ?>
                Class:<br />
                <strong style="font-size: medium;"><?php echo $studData_row['gradeLevel'].' - '.$studData_row['strand'].' - '.$studData_row['section']; ?></strong>
                 
                <?php }else{ ?>
                Class:<br />
                <strong style="font-size: medium;"><?php echo $studData_row['gradeLevel'].' - '.$studData_row['strand'].' '.$studData_row['major'].' - '.$studData_row['section']; ?></strong>
                 
                <?php } }else{ ?>
                
                Class:<br />
                
                <?php if($studData_row['dept']==='Senior High School'){ ?>
                    <strong style="font-size: small;"><?php echo $studData_row['gradeLevel'].' - '.$studData_row['strand'].' - '.$studData_row['section']; ?></strong>
                    
                <?php }else{ ?>
                    <strong style="font-size: small;"><?php echo $studData_row['gradeLevel'].' - '.$studData_row['section']; ?></strong>
                    
                <?php } ?>
                
                
                <?php } ?>
                </span>
                
                
                  <div class="count-number">
                  <?php if($chk_pay_row['status']!='For Validation'){ ?>
                  <a href="list_paymentReqs.php" class="btn btn-primary btn-sm">Request Payment Validation</a>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            
                
                   
                  
            <!-- Count item widget-->
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">MY INFO</strong>
                  <div class="count-number">
                    <a href="user_profile.php" class="btn btn-primary btn-sm">Update Info</a>
                  </div>
                </div>
              </div>
            </div>
 
            <!-- Count item widget-->
            <div class="col-lg-4 col-md-12 col-sm-12">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-bill"></i></div>
                <div class="name"><strong class="text-uppercase">FORM</strong>
                
                    <a href="print_book_assessment.php" style="cursor: pointer;"><span class="fa fa-print"> Print Assessment</span></a>
                  
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </section>