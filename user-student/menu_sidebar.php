    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="../admin/img/<?php echo $sf_row['logo']; ?>" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?php echo $name; ?></h2><span><?php echo $user_row['username']; ?> | <?php echo $user_row['user_type']; ?></span>
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
            <?php if($studData_row['status']==='Setup'){ ?>
            <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal"><i class="icon-paper-airplane"></i> Set Course</a>
            
            <?php if($studData_row['assessment_id']>0){ ?>
            
            <a style="cursor: pointer;" data-toggle="modal" data-target="#myModalSubmitApp"><i class="fa fa-check"></i> Submit Application</a>
            
            <?php } } ?>
            </li>
            
            <li>
            <?php if($studData_row['dept']==='Grade School'){ ?>
            <a href="registration_form_elem.php"><i class="icon-user"></i> Update Info</a>
            <?php }elseif($studData_row['dept']==='Junior High School'){ ?>
            <a href="registration_form_jhs.php"><i class="icon-user"></i> Update Info</a>
            <?php }elseif($studData_row['dept']==='Senior High School'){ ?>
            <a href="registration_form_shs.php"><i class="icon-user"></i> Update Info</a>
            <?php }elseif($studData_row['dept']==='College'){ ?>
            <a href="registration_form_col.php"><i class="icon-user"></i> Update Info</a>
            <?php } ?>
            </li>
            
            <li><a href="requirements.php"><i class="fa fa-book"></i> Requirements</a></li>
            
            <?php if($studData_row['status']==='For Payment' OR $studData_row['status']==='Enrolled'){ ?>
            <li><a href="#paymentdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-bank"></i> Payments</a>
              <ul id="paymentdropdownDropdown" class="collapse list-unstyled ">
                <li><a href="list_paymentReqs.php"> <i class="fa fa-share"></i> Requests</a></li>
                <li><a href="list_paymentHistory.php"> <i class="fa fa-calculator"></i> History</a></li>
              </ul>
            </li>
            <?php } ?>
            
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Forms </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              
                <li>
                <?php if($studData_row['dept']==='Grade School'){ ?>
                <a href="print_reg_form_elem.php" target="_blank"><i class="fa fa-user"></i> Registration</a>
                <?php }elseif($studData_row['dept']==='Junior High School'){ ?>
                <a href="print_reg_form_jhs.php" target="_blank"><i class="fa fa-user"></i> Registration</a>
                <?php }elseif($studData_row['dept']==='Senior High School'){ ?>
                <a href="print_reg_form_shs.php" target="_blank"><i class="fa fa-user"></i> Registration</a>
                <?php }elseif($studData_row['dept']==='College'){ ?>
                <a href="registration_form_col.php" target="_blank"><i class="fa fa-user"></i> Registration</a>
                <?php } ?>
                </li>
                
                <?php if($studData_row['status']==='Enrolled'){ ?>
                <li><a href="student_ledger.php"> <i class="icon-bill"></i> Ledger</a></li>
                <?php } ?>
                
                
                <li><a href="download_forms.php"> <i class="fa fa-download"></i> Download</a></li>
                
              </ul>
            </li>
            
            
            
          </ul>
        </div>
 
      </div>
    </nav>