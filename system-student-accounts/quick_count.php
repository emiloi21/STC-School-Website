 <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
          
            <!-- Count item widget-->
            <div class="col-xl-6 col-md-6 col-12">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-bill"></i></div>
                <div class="name"><strong class="text-uppercase"><a href="#" style="text-decoration-line: none;">ACCOUNTS</a></strong>
                
              
                <span>Student's Schedule of Account Management and Settings</span>
                    
                    <div class="row">
                    <div class="col-6">
                    <a href="list_account_categories.php?dept=&gradeLevel=&strand=" style="text-decoration-line: none;" title="Click to view Account Categories..."><small><i class="fa fa-info-circle" style="font-size: small;"></i> 
                    CATEGORIES</small></a>
                    </div>
                   
                    <div class="col-6">
                    <small><?php echo $tblAccCateg; ?></small>
                    </div>
                    
                    <div class="col-6">
                    <a href="list_account_discounts.php?dept=&gradeLevel=&strand=" style="text-decoration-line: none;" title="Click to view list of Discounts..."><small><i class="fa fa-info-circle" style="font-size: small;"></i> 
                    DISCOUNTS</small></a>
                    </div>
                   
                    <div class="col-6">
                    <small><?php echo $tblAccDCount; ?></small>
                    </div>
                    
                    <div class="col-6">
                    <a href="list_account_assessments.php?dept=&gradeLevel=&strand=" style="text-decoration-line: none;" title="Click to view Assessments Groups..."><small><i class="fa fa-info-circle" style="font-size: small;"></i> 
                    ASSESSMENTS</small></a>
                    </div>
                   
                    <div class="col-6">
                    <small><?php echo $tblAccAssess; ?></small>
                    </div>
                    
                    <div class="col-6">
                    <a href="list_account_receivable.php?dept=&gradeLevel=&strand=" style="text-decoration-line: none;" title="Click to view Account Receivables..."><small><i class="fa fa-info-circle" style="font-size: small;"></i> 
                    RECEIVABLES</small></a>
                    </div>
                   
                    <div class="col-6">
                    <small><?php echo $acctReceivableCtr; ?></small>
                    </div>
                    
                    <div class="col-6">
                    <a href="list_account_payable.php?dept=&gradeLevel=&strand=" style="text-decoration-line: none;" title="Click to view Account Payables..."><small><i class="fa fa-info-circle" style="font-size: small;"></i> 
                    PAYABLES</small></a>
                    </div>
                   
                    <div class="col-6">
                    <small><?php echo $acctPayableCtr; ?></small>
                    </div>
                    </div>
                    
                </div>
              </div>
            </div>
 
            
            
          </div>
        </div>
      </section>