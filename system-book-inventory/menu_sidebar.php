    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="../admin/img/<?php echo $sf_row['logo']; ?>" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?php echo $name; ?></h2><span>ID Code: <?php echo $studData_row['student_id']; ?></span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="#" class="brand-small text-center"><strong class="text-primary">STC</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="home.php"> <i class="icon-home"></i>Home</a></li>
            
            <li>
            <a href="user_profile.php"><i class="icon-user"></i> Update Info</a>
            </li>
            
            <li><a href="book_reservation.php"><i class="fa fa-book"></i> Books</a></li>
            
            <?php if($chk_payables_query->rowCount()>0){ ?>
            <li><a href="#paymentdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-bank"></i> Payments</a>
              <ul id="paymentdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="list_paymentReqs.php"> <i class="fa fa-share"></i> Requests</a></li>
                <li><a href="list_paymentHistory.php"> <i class="fa fa-calculator"></i> History</a></li>
              </ul>
            </li>
            <?php } ?>
           
           
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Forms </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              
                <li><a href="print_book_assessment.php"><i class="fa fa-file-text"></i> Print Assessment</a></li>
                
              </ul>
            </li>
            
            
            
          </ul>
        </div>
 
      </div>
    </nav>