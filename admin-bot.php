<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
  <body>
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2" style="color: #075907;">ADMINISTRATION</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" style="color: #075907;">BOARD OF TRUSTEES</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <section class="bar">
        <div class="container">
          <div class="row">
            
            <div class="col-lg-3">
              <!-- MENUS AND WIDGETS -->
              <div class="panel panel-default sidebar-menu with-icons">
                <div class="panel-heading">
                  <h3 class="h4 panel-title" style="color: #075907;">RELATED LINKS</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a style="color: #e5eb0b; background-color: #097609;" href="#" class="nav-link active">BOARD OF TRUSTEES</a></li>
                    <li class="nav-item"><a href="admin-offices-services.php" class="nav-link">OFFICES &amp; SERVICES</a></li>
                    <li class="nav-item"><a href="admin-faculty-staff.php" class="nav-link">FACULTY &amp; STAFF</a></li>
                  </ul>
                </div>
              </div>
            </div>
            
            <div class="col-lg-9">
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="heading">
                      <h2>BOARD OF TRUSTEES</h2>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    
                    <div id="text-page">
                      <p class="lead">
                      The highest governing body of the school is the Board of Trustees headed by the current bishop of the Diocese of Kabankalan.  It is composed of 10 members from within and outside the school.  The Board of Trustees oversees the educational policies and the directions of the entire institution.
                      </p>
                      
                      <div class="row text-center">
                      
                      <div class="col-md-4">
                        <div data-animate="fadeInUp" class="team-member">
                          <div class="image"><a href="team-member.html"><img src="img/person-1.jpg" alt="" class="img-fluid rounded-circle"></a></div>
                          <h3><a href="team-member.html">Han Solo</a></h3>
                          <p class="role">Founder</p>
                          <ul class="social list-inline">
                            <li class="list-inline-item"><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="email"><i class="fa fa-envelope"></i></a></li>
                          </ul>
                          <div class="text">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                          </div>
                        </div>
                      </div>
                      
                      <!-- /.team-member-->
                      <div data-animate="fadeInUp" class="col-md-4">
                        <div class="team-member">
                          <div class="image"><a href="team-member.html"><img src="img/person-2.jpg" alt="" class="img-fluid rounded-circle"></a></div>
                          <h3><a href="team-member.html">Luke Skywalker</a></h3>
                          <p class="role">CTO</p>
                          <ul class="social list-inline">
                            <li class="list-inline-item"><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="email"><i class="fa fa-envelope"></i></a></li>
                          </ul>
                          <div class="text">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                          </div>
                        </div>
                      </div>
                      
                      <!-- /.team-member-->
                      <div data-animate="fadeInUp" class="col-md-4">
                        <div class="team-member">
                          <div class="image"><a href="team-member.html"><img src="img/person-3.png" alt="" class="img-fluid rounded-circle"></a></div>
                          <h3><a href="team-member.html">Princess Leia</a></h3>
                          <p class="role">Team Leader</p>
                          <ul class="social list-inline">
                            <li class="list-inline-item"><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="email"><i class="fa fa-envelope"></i></a></li>
                          </ul>
                          <div class="text">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    
                    </div>
                  </div>
                  
                </div>
            </div>
            
          </div>
        </div>
      </section>
 
      <?php include('footer.php'); ?>
    </div>
    <?php include('js_files.php'); ?>
  </body>
</html>