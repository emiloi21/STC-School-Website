      <!-- navbar-->
      
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              
              <form method="POST" action="save_add_staff.php">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="home.php" class="navbar-brand">
              
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">STC WEB PORTAL</strong> <span>- Content Management System</span></div></a>

                     
                      <span class="brand-text d-none d-md-inline-block" style="color: white;">Data Source:</span>
                      <select name="data_src_sy" style="padding: 4px;">
                      <option><?php echo $data_src_sy; ?></option>
                      <?php
                      $sy_query = $conn->query("SELECT * FROM school_year ORDER BY schoolYear DESC");
                      while($sy_row = $sy_query->fetch()){
                      ?>
                      <option><?php echo $sy_row['schoolYear']; ?></option>
                      <?php } ?>
                      </select>
                      <button name="update_data_src_sy" class="btn btn-primary btn-sm"><i class="fa fa-download"></i></button>

                  
                   
                  </div>
                  </form>
                  
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-user-circle"></i><span class="badge badge-info"><i class="fa fa-cog fa-sm"></i></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="user_profile.php?sfp_stat=xEdit" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="img/<?php echo $sf_row['logo'];?>" alt="..." class="img-fluid rounded-circle" style="width: 100px !important; height:  50px !important;"></div>
                        <div class="msg-body">
                          <h3 class="h5"><?php echo $user_row['fname']; ?>'s Profile</h3><span><?php echo $name; ?></span><small><?php echo $session_access; ?></small>
                        </div></a></li>
  
                    <li><a rel="nofollow" href="logout.php" class="dropdown-item all-notifications text-left"> <strong> <i class="fa fa-sign-out"></i>Logout</strong></a></li>
                  </ul>
                </li>
 
                 
              </ul>
            </div>
          </div>
        </nav>
      </header>
      

 