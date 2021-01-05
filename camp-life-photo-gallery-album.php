<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
  <body>
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      <?php
 
      
      $club_org_album_query = $conn->query("SELECT * FROM tbl_album_gallery WHERE pg_album_id='$_GET[pg_album_id]'") or die(mysql_error());
      $club_org_album_row = $club_org_album_query->fetch();
                
      ?>
                    
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">CAMPUS LIFE</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="camp-life-photo-gallery.php">PHOTO GALLERY</a></li>
                <li class="breadcrumb-item active" style="color: #075907;">Gallery Album: <?php echo $club_org_album_row['title']; ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <div id="content">
        <div class="container">

          <section class="no-mb bar">
          
            <div class="row">
              <div class="col-md-12">
                <div class="heading">
                  <h3><?php echo $club_org_album_row['title']; ?></h3>
                </div>
                <p class="lead"><?php echo $club_org_album_row['description']; ?></p>
                
              </div>
            </div>
            
            <div class="row portfolio-project" style="margin-top: 12px;">
              <div class="col-md-12">
              
                <section class="gallery no-padding">
                  <div class="row" style="text-align: center;">
                  
                    <?php
                    
                    $album_img_query = $conn->query("SELECT img FROM tbl_album_gallery_img WHERE pg_album_id='$_GET[pg_album_id]' ORDER BY img_id ASC") or die(mysql_error());
                    
                    if($album_img_query->rowCount()>0){
                        
                    
                    while ($album_img_row = $album_img_query->fetch()){
                        
                    ?>
            
                    <div class="mix col-lg-3 col-md-3 col-sm-6" style="margin-bottom: 24px;">
                      <div class="item"><a href="admin/camp-life/photo-gallery-album/<?php echo $album_img_row['img']; ?>" data-fancybox="gallery" class="image"><img src="admin/camp-life/photo-gallery-album/<?php echo $album_img_row['img']; ?>" alt="Reload page to view this image..." class="img-fluid" /></a></div>
                    </div>

                    <?php } }else{ ?>
                    <div class="alert alert-info col-12">
                    NO PHOTOS TO VIEW IN THIS ALBUM
                    </div>
                    <?php } ?>
 
                    
                  </div>
                </section>
                
              </div>
            </div>
          </section>
          
          <div class="bar pt-0">                       
            <section>
              <div class="row portfolio">
                <div class="col-md-12">
                  <div class="heading">
                    <h3>OTHER ALBUMS</h3>
                  </div>
                </div>
                
                <?php
                $otherAnnounce_query = $conn->query("SELECT * FROM tbl_album_gallery ORDER BY pg_album_id ASC") or die(mysql_error());
                if($otherAnnounce_query->rowCount()<2){  ?>
                <div class="col-md-12 col-lg-12">
                    <p class="lead" style="color: black;">No other albums to view...</p>
                </div>
                <?php  }else{
                    
                while ($otherAnnounce_row = $otherAnnounce_query->fetch()){
                    
                $otherAnnounce_id=$otherAnnounce_row['pg_album_id'];
                
                
                if($otherAnnounce_id!=$_GET['pg_album_id']){ 
                ?>
                    
                <div class="col-md-6 col-lg-3">
                  <div class="box-image">
                    <div class="image"><img src="admin/<?php echo $otherAnnounce_row['cover_img']; ?>" alt="" class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="content">
                                <div class="name">
                                  <h3><a href="camp-life-rel-formation-photo-gallery-album.php?pg_album_id=<?php echo $_GET['pg_album_id']; ?>&pg_album_id=<?php echo $otherAnnounce_id; ?>" class="color-white"><?php echo $otherAnnounce_row['title']; ?></a></h3>
                                </div>
                                <div class="text">
                                  <p class="d-none d-sm-block"><?php echo substr($otherAnnounce_row['description'], 0, 100).'...'; ?></p>
                                  <p class="buttons"><a href="camp-life-rel-formation-photo-gallery-album.php?pg_album_id=<?php echo $_GET['pg_album_id']; ?>&pg_album_id=<?php echo $otherAnnounce_id; ?>" class="btn btn-template-outlined-white">View Album</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                
                <?php } } } ?>
                
              </div>
            </section>
          </div>
          
        </div>
      </div>
 
      <?php include('footer.php'); ?>
    </div>
    <?php include('js_files.php'); ?>
  </body>
</html>