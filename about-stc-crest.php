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
              <h1 class="h2">ABOUT STC</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" style="color: #075907;">STC LOGO / TERESIAN HYMN</li>
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
                    <li class="nav-item"><a href="about-historical.php" class="nav-link">HISTORY</a></li>
                    <li class="nav-item"><a href="about-vision-mission.php" class="nav-link">VISION-MISSION / PHILOSOPHY / CORE VALUES</a></li>
                    <li class="nav-item"><a style="color: #e5eb0b;" href="#" class="nav-link active">STC LOGO / TERESIAN HYMN</a></li>
                    <li class="nav-item"><a href="about-affiliates.php" class="nav-link">ACCREDITATION &amp; AFFILIATIONS</a></li>
                    <li class="nav-item"><a href="about-facilities.php" class="nav-link">FACILITIES / SERVICES</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                  <div class="col-md-12">
                    <div class="heading">
                      <h2>STC LOGO</h2>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  
                  <div class="col-md-4"><img alt="" src="img/stc_logo.png" class="img-fluid rounded" /></div>
                  
                  <div class="col-md-8">
                  
                          <p>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          The cross is a symbol of Christ for whom and from whom all education emanates. The green leaves symbolize the hope that springs from the mission of education and in the mercy of Christ. The motto of the school is "Faith, Integrity, Concern, Responsibility and Service". The school colors are green and yellow - being the colors of the Archdiocese:  white for purity, green for hope and yellow for wisdom.
                          </p>
                          
                  </div>
        
                  
                  <div class="col-md-12"><hr /></div>
                  
                  <div class="col-md-12">
                    <div class="heading">
                      <h2>TERESIAN HYMN</h2>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                  
                    <video width="100%" height="100%" controls>
                      <source src="movie.mp4" type="video/mp4">
                      <source src="movie.ogg" type="video/ogg">
                      Your browser does not support the video tag.
                    </video>
                          
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