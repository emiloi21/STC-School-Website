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
                <li class="breadcrumb-item active" style="color: #075907;">RELIGIOUS FORMATION</li>
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
                    <li class="nav-item"><a href="camp-life-school-calendar.php" class="nav-link">SCHOOL CALENDAR</a></li>
                    <li class="nav-item"><a style="color: #e5eb0b;" href="#" class="nav-link active" class="nav-link">RELIGIOUS FORMATION</a></li>
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
                      <h2>RELIGIOUS FORMATION</h2>
                    </div>
                  </div>
                  
                  <!-- description 1 -->
                  <div class="col-md-12">
                    <div id="text-page">
                      <p class="lead">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      Sta. Teresa College, being a Catholic institution has the responsibility to give emphasis on the Religious Formation of all its students.  To enrich the classroom experience and to develop in them the desired values and attitudes as Christians, these activities are regularly held during the year:
                      </p>
                      
                      
                    </div>
                  </div>
                  <!-- end description 1 -->
                  
                  <!-- description 2 -->
                  <div class="col-md-4"><img alt="" src="img/stc_logo.png" class="img-fluid rounded-circle" style="margin-top: 36px;" /></div>
                  <div class="col-md-8">
                    <div id="text-page">
                      <p class="lead">
                        <ul class="lead" style="font-weight: lighter;">
                        <li>Holy Spirit Mass</li>
                        <li>Regular Confession</li>
                        <li>Monthly Eucharistic Celebration</li>
                        <li>Annual Recollection / Retreat</li>
                        <li>Campus Youth Day</li>
                        <li>Mass on holy days of obligation: Birthday of Mother Mary, Feast of Sta. Teresa College de Avila, Immaculate, St. Lorenzo Ruiz</li>
                        <li>Rosary Rally on October</li>
                        <li>"Paskuhan sa Setyembre hanggang Disyembre" for poor indigents in the community to develop love and sharing with the less privileged brother and sisters</li>
                        <li>Outreach activities</li>
                        </ul>
                       
                      </p>
                      
                    </div>
                  </div>
                  <!-- end description 2 -->
 
                  
                  
                </div>
 
            <div class="row">
 
              
              <div class="col-md-12">
                <div class="heading">
                <h2>Gallery</h2>
                </div>
                 
              </div>
            </div>
            
            <div class="row portfolio text-center">
            
            
            <?php
            
            $club_org_album_query = $conn->query("SELECT * FROM tbl_album_rel_form ORDER BY rf_album_id ASC") or die(mysql_error());
            while ($club_org_album_row = $club_org_album_query->fetch()){
                    
            $rf_album_id=$club_org_album_row['rf_album_id'];
            
            ?>
                    
              <div class="col-md-4">
                <div class="box-image">
                  <div class="image"><img src="admin/<?php echo $club_org_album_row['cover_img']; ?>" alt="" class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                      <div class="content">
                        <div class="name">
                          <h3><a href="camp-life-rel-formation-photo-gallery-album.php?rf_album_id=<?php echo $rf_album_id; ?>" class="color-white"><?php echo $club_org_album_row['title']; ?></a></h3>
                        </div>
                        <div class="text">
                          <p class="d-none d-sm-block"><?php echo nl2br(substr($club_org_album_row['description'], 0, 120)); ?></p>
                          <p class="buttons"><a href="camp-life-rel-formation-photo-gallery-album.php?rf_album_id=<?php echo $rf_album_id; ?>" class="btn btn-template-outlined-white">View Album</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            <?php } ?>
            
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