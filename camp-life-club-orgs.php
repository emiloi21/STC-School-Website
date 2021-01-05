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
                <li class="breadcrumb-item active" style="color: #075907;">CLUBS &amp; ORGANIZATIONS</li>
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
                    <li class="nav-item"><a href="camp-life-rel-formation.php" class="nav-link">RELIGIOUS FORMATION</a></li>
                    <li class="nav-item"><a style="color: #e5eb0b;" href="#" class="nav-link active">CLUBS &amp; ORGANIZATIONS</a></li>
                    <li class="nav-item"><a href="camp-life-photo-gallery.php" class="nav-link">PHOTO GALLERY</a></li>
                  </ul>
                </div>
              </div>
            </div>
            
            <div class="col-lg-9">
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="heading">
                      <h2>CLUBS &amp; ORGANIZATIONS</h2>
                    </div>
                  </div>
             
                    <div class="row portfolio text-center">
                    
                    <?php
                    $subjK_query = $conn->query("SELECT * FROM tbl_clubs_orgs ORDER BY club_org_id ASC") or die(mysql_error());
                    while ($subjK_row = $subjK_query->fetch()){
                    
                    $club_org_id=$subjK_row['club_org_id'];
                    ?>
                      
                      <div class="col-md-4">
                        <div class="box-image">
                          <div class="image"><img src="admin/<?php echo $subjK_row['img']; ?>" alt="" class="img-fluid">
                            <div class="overlay d-flex align-items-center justify-content-center">
                              <div class="content">
                                <div class="name">
                                  <h3><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $club_org_id; ?>" class="color-white"><?php echo $subjK_row['title']; ?></a></h3>
                                </div>
                                <div class="text">
                                  <!--p class="d-none d-sm-block">some text...</p-->
                                  <p class="buttons">
                                  <a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $club_org_id; ?>" class="btn btn-template-outlined-white">Read more</a>
                                  <?php
                                  $co_album_query = $conn->query("SELECT * FROM tbl_club_org_album WHERE club_org_id='$club_org_id'") or die(mysql_error());
                                  
                                  if($co_album_query->rowCount()>0){ ?>
                                  <a href="club-photo-gallery.php?club_org_id=<?php echo $club_org_id; ?>" class="btn btn-template-outlined-white">Gallery</a>
                                  <?php } ?>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> 
                      <?php } ?>
                    </div>
                    
                    <?php
                    $subjK_query = $conn->query("SELECT * FROM tbl_clubs_orgs ORDER BY club_org_id ASC") or die(mysql_error());
                    while ($subjK_row = $subjK_query->fetch()){
                    
                    $club_org_id=$subjK_row['club_org_id'];
                    ?>
                    
                      <!-- Facility Modal-->
                      <div id="facility-modal<?php echo $club_org_id; ?>" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="login-modalLabel" class="modal-title">CLUBS &amp; ORGANIZATIONS</h4>
                              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
                            </div>
                            <div class="modal-body" style="text-align: center;">
                            
                               <img src="admin/<?php echo $subjK_row['img']; ?>" alt="" class="img-fluid">
                               <div id="text-page" style="margin-top: 8px;">
                                <h3><?php echo $subjK_row['title']; ?></h3>
                                  <p class="lead">
                                  <?php echo nl2br($subjK_row['description']); ?>
                                  </p>
                                </div>
                                
                            </div>
                            
                            <div class="modal-footer">
                                <a href="#" data-dismiss="modal" aria-label="Close" class="btn btn-template-outlined">Close</a>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      <!-- Facility modal end-->
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