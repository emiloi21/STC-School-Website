<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
  <body>
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      <?php
      
      $anounce_query = $conn->query("SELECT * FROM tbl_announcements WHERE announce_id='$_GET[announce_id]'") or die(mysql_error());
      $announce_row = $anounce_query->fetch();
      
      ?>
                    
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">ANNOUNCEMENTS</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" style="color: #075907;"><?php echo $announce_row['title']; ?></li>
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
                  <h3><?php echo $announce_row['title']; ?></h3>
                </div>
              </div>
            </div>
            
           
            <div class="project owl-carousel">
              <div class="item"><img src="admin/<?php echo $announce_row['img']; ?>" alt="" class="img-fluid"></div>
            </div>
           
            <div class="row portfolio-project" style="margin-top: 12px;">
              <div class="col-md-8">
                <div class="heading">
                  <h3>OVERVIEW</h3>
                </div>
                <p>
                <?php echo nl2br($announce_row['description']); ?>
                </p>
              </div>
              <div class="col-md-4 project-more">
                <div class="heading">
                  <h3>DETAILS</h3>
                </div>
                <h4><?php echo $announce_row['date_posted']; ?> | <?php echo $announce_row['time_posted']; ?></h4>
                <p>Date - Time Posted</p>
              </div>
            </div>
          </section>
          
          <div class="bar pt-0">                       
            <section>
              <div class="row portfolio">
                <div class="col-md-12">
                  <div class="heading">
                    <h3>OTHER ANNOUNCEMENTS</h3>
                  </div>
                </div>
                
                <?php
                $otherAnnounce_query = $conn->query("SELECT * FROM tbl_announcements WHERE status='Display' ORDER BY announce_id ASC") or die(mysql_error());
                if($otherAnnounce_query->rowCount()<2){ ?>
                <div class="col-md-12 col-lg-12">
                    <p class="lead" style="color: black;">No other announcements to view...</p>
                </div>
                <?php }else{
                    
                while ($otherAnnounce_row = $otherAnnounce_query->fetch()){
                    
                $otherAnnounce_id=$otherAnnounce_row['announce_id'];
                
                
                if($otherAnnounce_id!=$_GET['announce_id']){
                ?>
                    
                <div class="col-md-6 col-lg-3">
                  <div class="box-image">
                    <div class="image"><img src="admin/<?php echo $otherAnnounce_row['img']; ?>" alt="" class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="content">
                                <div class="name">
                                  <h3><a href="school-announcement-details.php?announce_id=<?php echo $otherAnnounce_id; ?>" class="color-white"><?php echo $otherAnnounce_row['title']; ?></a></h3>
                                </div>
                                <div class="text">
                                  <p class="d-none d-sm-block"><?php echo substr($otherAnnounce_row['description'], 0, 100).'...'; ?></p>
                                  <p class="buttons"><a href="school-announcement-details.php?announce_id=<?php echo $otherAnnounce_id; ?>" class="btn btn-template-outlined-white">Read More</a></p>
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