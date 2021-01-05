    


    <!-- &#39; Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="../admin/img/<?php echo $sf_row['logo']; ?>" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?php echo $name; ?></h2><span><?php echo $session_access; ?></span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="home.php" class="brand-small text-center"><strong>STC</strong></a></div>
        </div>
       
        <!-- 1 Sidebar Navigation Menus-->
        
        <div class="main-menu">
          <h5 class="sidenav-heading">MENU</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">  
                          
            <li><a href="home.php"> <i class="icon-home"></i>Home</a></li>
            
            <li><a href="#exampledropdownDropdownCash" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Cashiering System </a>
              <ul id="exampledropdownDropdownCash" class="collapse list-unstyled ">
                <li><a href="cashiering_system_newTrans.php"> <i class="fa fa-calculator"></i>New Transaction</a></li>

                <li><a href="list_transaction.php"> <i class="icon-bill"></i>Transaction List
                <div class="badge badge-warning"><?php echo $transCtr; ?></div></a></li>
                
              </ul>
            </li>
            
            <li><a href="student_ledger.php?searched="> <i class="icon-padnote"></i>Ledger</a></li>
            
            <li><a href="#exampledropdownDropdownCashRep" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-print"></i>Reports </a>
              <ul id="exampledropdownDropdownCashRep" class="collapse list-unstyled ">
                <li>
                <a href="printReports.php"> <i class="icon-page"></i>Exam Assessment</a>
                <!--a data-toggle="modal" data-target="#examAssessment" href="#"> <i class="icon-page"></i>Exam Assessment</a-->
                </li>
              </ul>
            </li>
            
            <li><a href="#exampledropdownDropdownRequirementsReqs" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book"></i> <small>Account Assessment Request</small> 
            <div class="badge badge-warning"><?php echo $req_ctr1_query->rowCount()+$req_ctr2_query->rowCount()+$req_ctr3_query->rowCount()+$req_ctr4_query->rowCount(); ?></div></a>
              <ul id="exampledropdownDropdownRequirementsReqs" class="collapse list-unstyled ">
                
                <li><a href="list_assessment_reqs.php?dept=Grade School"> <i class="icon-list"></i> Grade School 
                <div class="badge badge-warning"><?php echo $req_ctr1_query->rowCount(); ?></div></a></li>
                <li><a href="list_assessment_reqs.php?dept=Junior High School"> <i class="icon-list"></i> JHS 
                <div class="badge badge-warning"><?php echo $req_ctr2_query->rowCount(); ?></div></a></li>
                <li><a href="list_assessment_reqs.php?dept=Senior High School"> <i class="icon-list"></i> SHS 
                <div class="badge badge-warning"><?php echo $req_ctr3_query->rowCount(); ?></div></a></li>
                <li><a href="list_assessment_reqs.php?dept=College"> <i class="icon-list"></i> College 
                <div class="badge badge-warning"><?php echo $req_ctr4_query->rowCount(); ?></div></a></li>
                
              </ul>
            </li>
            
            <li><a href="#exampledropdownDropdownPayments" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-money"></i>Payments 
            <div class="badge badge-warning"><?php echo $pay_req_pending_ctr_query->rowCount(); ?></div></a>
              <ul id="exampledropdownDropdownPayments" class="collapse list-unstyled ">
                <li><a href="list_payment_val_req.php?dept=<?php echo $user_dept; ?>&gradeLevel=&strand=&major="> <i class="fa fa-reply"></i>Pending Request
                <div class="badge badge-warning"><?php echo $pay_req_pending_ctr_query->rowCount(); ?></div></a></li>
                <li><a href="list_payment_valid.php?dept=<?php echo $user_dept; ?>&gradeLevel=&strand=&major="> <i class="fa fa-check"></i>Validated Request
                <div class="badge badge-warning"><?php echo $pay_req_valid_ctr_query->rowCount(); ?></div></a></li>
            
              </ul>
            </li>
            
            
          </ul>
          
        </div>
        
 
        <div class="main-menu">
          <h5 class="sidenav-heading">PREFERENCES</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            
            <li><a href="list_payment_term.php?dept=&gradeLevel=&strand=&major="> <i class="fa fa-calendar"></i>Payment Terms</a></li>
            
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Accounts </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              
                <li><a href="list_account_categories.php?dept=&gradeLevel=&strand=&major="> <i class="icon-check"></i>Categories 
                <div class="badge badge-warning"><?php echo $tblAccCateg; ?></div></a></li>
               
                <li><a href="list_account_discounts.php?dept="> <i class="icon-check"></i>Discounts 
                <div class="badge badge-warning"><?php echo $tblAccDCount; ?></div></a></li>
                
                <li><a href="list_account_assessments.php?dept=&gradeLevel=&strand=&major="> <i class="icon-check"></i>Assessments
                <div class="badge badge-warning"><?php echo $tblAccAssess; ?></div></a></li>
                
                <li><a href="list_account_receivable.php?dept=&gradeLevel=&strand=&major="> <i class="icon-check"></i>Receivable
                <div class="badge badge-warning"><?php echo $acctReceivableCtr; ?></div></a></li>
                
                <li><a href="list_account_payable.php?dept=&gradeLevel=&strand=&major="> <i class="icon-check"></i>Payable
                <div class="badge badge-warning"><?php echo $acctPayableCtr; ?></div></a></li>
                
              </ul>
            </li>
            
            
            <li><a href="#exampledropdownBook" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-file"></i>Book Inventory 
            <div class="badge badge-warning"><?php echo $book_pay_req_pending_ctr_query->rowCount(); ?></div></a>
              <ul id="exampledropdownBook" class="collapse list-unstyled ">
              
                <li><a href="list_book_bundle.php?dept=&gradeLevel=&strand=&major=&section="> <i class="fa fa-stack-overflow"></i> Bundles</a></li>
                <li><a href="list_book_orders.php?dept=&gradeLevel=&strand=&major=&section="> <i class="fa fa-address-book"></i> Orders
                <div class="badge badge-warning"><?php echo $submitted_bo_ctr_query->rowCount(); ?></div></a>
                
                </li>
                <li><a href="list_book_discounts.php?dept=&gradeLevel=&strand=&major=&section="> <i class="fa fa-percent"></i> Discounts</a></li>
                
                <li><a href="list_payment_val_books.php?dept=<?php echo $user_dept; ?>&gradeLevel=&strand=&major="> <i class="fa fa-reply"></i> Payment Requests 
                <div class="badge badge-warning"><?php echo $book_pay_req_pending_ctr_query->rowCount(); ?></div></a></li>
                
                <li><a href="list_payment_valid_books.php?dept=<?php echo $user_dept; ?>&gradeLevel=&strand=&major="> <i class="fa fa-check"></i>Validated Request
                <div class="badge badge-warning"><?php echo $book_pay_req_valid_ctr_query->rowCount(); ?></div></a></li>
                
              </ul>
            </li>
            
            <li><a href="list_payment_method.php"> <i class="fa fa-dollar"></i>Payment Methods</a></li>
            
            <li><a href="list_assess_footer.php?dept=&gradeLevel="> <i class="fa fa-bars"></i>Assessment Footer</a></li>
            
          </ul>
        </div>
        
        <!-- end 1 Sidebar Navigation Menus-->
 
        
      
      </div>
    </nav>