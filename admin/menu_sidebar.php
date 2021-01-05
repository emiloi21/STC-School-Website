    
    <!-- &#39; Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="img/<?php echo $sf_row['logo']; ?>" alt="person" class="img-fluid rounded-circle">
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
            
            <!--li><a href="printReports.php"> <i class="fa fa-print"></i>Reports</a></li-->

          </ul>
        </div>
        
        <?php if($session_access==='Administrator'){ ?> 
        <div class="main-menu">
          <h5 class="sidenav-heading">PREFERENCES</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">
            <li><a href="school_preferences.php?sfp_stat=xEdit"> <i class="fa fa-bank"></i>School</a></li>
          </ul>
        </div>
        
        <div class="main-menu">
          <h5 class="sidenav-heading">WEB CONTENTS</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">
          
            <li><a href="#exampledropdownDropdownHomePage" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> Home Page</a>
              <ul id="exampledropdownDropdownHomePage" class="collapse list-unstyled ">
                <li><a href="home-cover-slides-cms.php"> <i class="icon-website"></i>Cover &amp; Slides</a></li>
                <li><a href="home-announcements-cms.php"> <i class="icon-website"></i>Announcements</a></li>
                <li><a href="home-events-cms.php"> <i class="icon-website"></i>Events</a></li>
                <li><a href="home-news-cms.php"> <i class="icon-website"></i>News</a></li>
                
              </ul>
            </li>
            
            <li><a href="#exampledropdownDropdownAboutPage" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> About</a>
              <ul id="exampledropdownDropdownAboutPage" class="collapse list-unstyled ">
                
                <li><a href="about-accred-affiliate-cms.php"> <i class="icon-website"></i>Accreditation &amp; Affiliations</a></li>
                <li><a href="about-facilities-cms.php"> <i class="icon-website"></i>Facilities / Services</a></li>
                
              </ul>
            </li>
            
            <li><a href="#exampledropdownDropdownAdminPage" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> Administration</a>
              <ul id="exampledropdownDropdownAdminPage" class="collapse list-unstyled ">
                
                <li><a href="administration-offices-services-cms.php"> <i class="icon-website"></i>Offices &amp; Services</a></li>
                <li><a href="administration-faculty-staff-cms.php"> <i class="icon-website"></i>Faculty &amp; Staff</a></li>
                
              </ul>
            </li>
            
            <li><a href="#exampledropdownDropdownCampusLifePage" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i> Campus Life</a>
              <ul id="exampledropdownDropdownCampusLifePage" class="collapse list-unstyled ">
                
                <!--li><a href="#"> <i class="icon-website"></i>School Calendar</a></li-->
                <li><a href="camp-life-rel-formation-cms.php"> <i class="icon-website"></i>Rel. Form. Album</a></li>
                <li><a href="camp-life-club-org-cms.php"> <i class="icon-website"></i>Clubs &amp; Organizations</a></li>
                <li><a href="camp-life-photo-gallery-cms.php"> <i class="icon-website"></i>Photo Gallery</a></li>
                
              </ul>
            </li>
            
            
            
          
          </ul>
        </div>
 
        <div class="main-menu">
          <h5 class="sidenav-heading">SYSTEM USERS</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">
          
            <li><a href="list_users.php"> <i class="fa fa-users"></i>Accounts</a></li>
            
          </ul>
        </div>
        <?php } ?>
        
      
      </div>
    </nav>