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
                <li class="breadcrumb-item active" style="color: #075907;">FACILITIES</li>
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
                    <li class="nav-item"><a href="about-stc-crest.php" class="nav-link">STC LOGO / TERESIAN HYMN</a></li>
                    <li class="nav-item"><a href="about-affiliates.php" class="nav-link">ACCREDITATION &amp; AFFILIATIONS</a></li>
                    <li class="nav-item"><a style="color: #e5eb0b;" href="#" class="nav-link active">FACILITIES / SERVICES</a></li>
                  </ul>
                </div>
              </div>
            </div>
            
            <div class="col-lg-9">
                <div class="row">
                  
                  <div class="col-md-12">
                    <div class="heading">
                      <h2>FACILITIES / SERVICES</h2>
                    </div>
                  </div>
             
                    <div class="row portfolio text-center">
                    
                    <?php
                    $subjK_query = $conn->query("SELECT * FROM tbl_facilities ORDER BY facility_id ASC") or die(mysql_error());
                    while ($subjK_row = $subjK_query->fetch()){
                    
                    $facility_id=$subjK_row['facility_id'];
                    ?>
                      
                      <div class="col-md-4">
                        <div class="box-image">
                          <div class="image"><img src="admin/<?php echo $subjK_row['img']; ?>" alt="" class="img-fluid">
                            <div class="overlay d-flex align-items-center justify-content-center">
                              <div class="content">
                                <div class="name">
                                  <h3><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $facility_id; ?>" class="color-white"><?php echo $subjK_row['title'];; ?></a></h3>
                                </div>
                                <div class="text">
                                  <!--p class="d-none d-sm-block">some text...</p-->
                                  <p class="buttons"><a href="#" data-toggle="modal" data-target="#facility-modal<?php echo $facility_id; ?>" class="btn btn-template-outlined-white">Read more</a></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> 
                      <?php } ?>
                    </div>
                    
                    <?php
                    $subjK_query = $conn->query("SELECT * FROM tbl_facilities ORDER BY facility_id ASC") or die(mysql_error());
                    while ($subjK_row = $subjK_query->fetch()){
                    
                    $facility_id=$subjK_row['facility_id'];
                    ?>
                    
                      <!-- Facility Modal-->
                      <div id="facility-modal<?php echo $facility_id; ?>" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="login-modalLabel" class="modal-title">READ MORE</h4>
                              <a href="#" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
                            </div>
                            <div class="modal-body">
                            
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