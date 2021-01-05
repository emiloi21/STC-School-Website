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
              <h1 class="h2">CAMPUS LIFE</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" style="color: #075907;">SCHOOL CALENDAR</li>
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
                    <li class="nav-item"><a style="color: #e5eb0b;" href="#" class="nav-link active">SCHOOL CALENDAR</a></li>
                    <li class="nav-item"><a href="camp-life-rel-formation.php" class="nav-link">RELIGIOUS FORMATION</a></li>
                    <li class="nav-item"><a href="camp-life-club-orgs.php" class="nav-link">CLUBS &amp; ORGANIZATIONS</a></li>
                    <li class="nav-item"><a href="camp-life-photo-gallery.php" class="nav-link">PHOTO GALLERY</a></li>
                  </ul>
                </div>
              </div>
            </div>
            
            <div class="col-lg-9">
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="heading">
                      <h2>SCHOOL CALENDAR</h2>
                    </div>
                  </div>
                  
                  <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23097609&amp;ctz=Asia%2FManila&amp;src=Y19yN2UydmxrNWw0NWNvZjBkbm8zZWJmajg1c0Bncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%230B8043&amp;showTitle=0&amp;title=School%20Calendar%20(Public)" style="border:solid 1px #777" width="100%" height="600" frameborder="0" scrolling="no"></iframe>

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