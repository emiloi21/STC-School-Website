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
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="camp-life-club-orgs.php">CLUBS &amp; ORGANIZATIONS</a></li>
                <li class="breadcrumb-item active" style="color: #075907;">Albums</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php
      
      $club_org_query = $conn->query("SELECT * FROM tbl_clubs_orgs WHERE club_org_id='$_GET[club_org_id]'") or die(mysql_error());
      $club_org_row = $club_org_query->fetch();
      
      ?>
        <div class="container">
          <section class="bar">
            <div class="row">
            
              <div class="col-md-2" style="text-align: center;">
              <img width="120" height="120" src="admin/<?php echo $club_org_row['img']; ?>" />
              </div>
              
              <div class="col-md-10">
                <div class="heading">
                <h2><?php echo $club_org_row['title']; ?></h2>
                </div>
                <p class="lead"><?php echo $club_org_row['description']; ?></p>
              </div>
            </div>
            
            <div class="row portfolio text-center">
            
            
            <?php
            
            $club_org_album_query = $conn->query("SELECT * FROM tbl_club_org_album ORDER BY album_id ASC") or die(mysql_error());
            while ($club_org_album_row = $club_org_album_query->fetch()){
                    
            $album_id=$club_org_album_row['album_id'];
            
            ?>
                    
              <div class="col-md-4">
                <div class="box-image">
                  <div class="image"><img src="admin/<?php echo $club_org_album_row['cover_img']; ?>" alt="" class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                      <div class="content">
                        <div class="name">
                          <h3><a href="club-photo-gallery-album.php?club_org_id=<?php echo $_GET['club_org_id']; ?>&album_id=<?php echo $album_id; ?>" class="color-white"><?php echo $club_org_album_row['title']; ?></a></h3>
                        </div>
                        <div class="text">
                          <p class="d-none d-sm-block"><?php echo nl2br(substr($club_org_album_row['description'], 0, 120)); ?></p>
                          <p class="buttons"><a href="club-photo-gallery-album.php?club_org_id=<?php echo $_GET['club_org_id']; ?>&album_id=<?php echo $album_id; ?>" class="btn btn-template-outlined-white">View Album</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            <?php } ?>
            
            </div>
            
          </section>
        </div>
     
      <?php include('footer.php'); ?>
    </div>
    <?php include('js_files.php'); ?>
  </body>
</html>