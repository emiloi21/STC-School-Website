    
    
    
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
          <div class="sidenav-header-logo"><a href="home.php" class="brand-small text-center"> <strong>STC</strong></a></div>
        </div>
       
        <!-- 1 Sidebar Navigation Menus-->
        
        <div class="main-menu">
          <h5 class="sidenav-heading">MENU</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">  
                          
            <li><a href="home.php"> <i class="icon-home"></i>Home</a></li>
            
            <li><a href="#exampledropdownDropdownSectioning" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-child"></i> Class Assigning</a>
              <ul id="exampledropdownDropdownSectioning" class="collapse list-unstyled ">
                
                <li><a href="list_class_assigning.php?dept=Grade School&gradeLevel=&strand=&major=&sex="> <i class="icon-list"></i> Grade School</a></li>
                <li><a href="list_class_assigning.php?dept=Junior High School&gradeLevel=&strand=&major=&sex="> <i class="icon-list"></i> JHS</a></li>
                <li><a href="list_class_assigning.php?dept=Senior High School&gradeLevel=&strand=&major=&sex="> <i class="icon-list"></i> SHS</a></li>
                <li><a href="list_class_assigning.php?dept=College&gradeLevel=&strand=&major=&sex="> <i class="icon-list"></i> College</a></li>
                
              </ul>
            </li>
            
            <li><a href="#exampledropdownDropdownRequirementsReqs" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book"></i> Enrollment 
            <div class="badge badge-warning"><?php echo $ctr_stat_gs+$ctr_stat_jhs+$ctr_stat_shs+$ctr_stat_col; ?></div></a>
              <ul id="exampledropdownDropdownRequirementsReqs" class="collapse list-unstyled ">
                
                <li><a href="list_applicants.php?dept=Grade School&gradeLevel=&strand=&major=&status="> <i class="icon-list"></i> Grade School 
                <div class="badge badge-warning"><?php echo $ctr_stat_gs; ?></div></a></li>
                <li><a href="list_applicants.php?dept=Junior High School&gradeLevel=&strand=&major=&status="> <i class="icon-list"></i> JHS 
                <div class="badge badge-warning"><?php echo $ctr_stat_jhs; ?></div></a></li>
                <li><a href="list_applicants.php?dept=Senior High School&gradeLevel=&strand=&major=&status="> <i class="icon-list"></i> SHS 
                <div class="badge badge-warning"><?php echo $ctr_stat_shs; ?></div></a></li>
                <li><a href="list_applicants.php?dept=College&gradeLevel=&strand=&major=&status="> <i class="icon-list"></i> College 
                <div class="badge badge-warning"><?php echo $ctr_stat_col; ?></div></a></li>
                <!--li><a href="list_reqs_val.php?dept=Grade School"> <i class="icon-list"></i> Grade School </li-->
              </ul>
            </li>
            
            <!--li><a href="list_account_discounts.php?dept=&gradeLevel=&strand=&major="> <i class="fa fa-calculator"></i>Account Assessment</a></li-->
            
            <li><a href="printReports.php"> <i class="fa fa-print"></i>Reports</a></li>

          </ul>
        </div>
        
 
        <div class="main-menu">
          <h5 class="sidenav-heading">PREFERENCES</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
           
            <li><a href="list_classes.php"> <i class="fa fa-users"></i> Classes 
            <div class="badge badge-warning"><?php echo $classTotalCtr; ?></div></a></li>
            
            <li><a href="list_requirements.php"> <i class="icon-bill"></i> Requirements</a></li>
          </ul>
        </div>
       
        <!-- 2 Sidebar Navigation Menus-->
        <div class="admin-menu">
          <h5 class="sidenav-heading">Student Lists</h5>
          <ul id="side-admin-menu" class="side-menu list-unstyled">
            
            <li><a href="list_students.php?dept=All&class_id=All"><i class="icon-list"></i> All Student 
            <div class="badge badge-warning"><?php echo $elemTotal+$jhsTotal+$shsTotal+$colTotal; ?></div></a></li>
            
            <li><a href="list_students.php?dept=Grade School&class_id="><i class="icon-list"></i> Grade School
            <div class="badge badge-warning"><?php echo $elemTotal; ?></div></a></li>
            
            <li><a href="list_students.php?dept=Junior High School&class_id="><i class="icon-list"></i> JHS
            <div class="badge badge-warning"><?php echo $jhsTotal; ?></div></a></li>
            
            <li><a href="list_students.php?dept=Senior High School&class_id="><i class="icon-list"></i> SHS
            <div class="badge badge-warning"><?php echo $shsTotal; ?></div></a></li>
            
            <li><a href="list_students.php?dept=College&class_id="><i class="icon-list"></i> College
            <div class="badge badge-warning"><?php echo $colTotal; ?></div></a></li>
         
          </ul>
        </div>
        <!-- end 2 Sidebar Navigation Menus-->
        
      
      </div>
    </nav>