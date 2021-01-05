<!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">STC WEB PORTAL</strong> <span> SY <?php echo $activeSchoolYear; ?> - <?php echo $activeSemester; ?></span></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                
                <!-- Messages dropdown-->
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="icon-user"></i></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li>
                        <a rel="nofollow" href="user_profile.php" class="dropdown-item d-flex"> 
                        
                        <div class="msg-profile"> <img src="../admin/img/<?php echo $sf_row['logo']; ?>" alt="..." class="img-fluid rounded-circle"></div>
                        
                        <div class="msg-body">
                          <h3 class="h5"><?php echo $name; ?></h3><span>User Account Settings</span><small>Click to edit user account</small>
                        </div>
                        
                        </a>
                    </li>
 
                    <li><a rel="nofollow" href="logout.php" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-sign-out"></i>Logout</strong></a></li>
                  </ul>
                </li>

              </ul>
            </div>
          </div>
        </nav>
      </header>