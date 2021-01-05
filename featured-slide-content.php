<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
  <body>
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      <?php
      
      $news_query = $conn->query("SELECT * FROM tbl_home_slides WHERE slide_id='$_GET[slide_id]'") or die(mysql_error());
      $news_row = $news_query->fetch();
      
      ?>
                    
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">FEATURED SLIDES</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" style="color: #075907;"><?php echo $news_row['title']; ?></li>
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
                  <h3><?php echo $news_row['title']; ?></h3>
                </div>
              </div>
            </div>
            
           
            <div class="row">
              <div class="col-md-12" style="text-align: center;">
                <img src="admin/<?php echo $news_row['img']; ?>" alt="" class="img-fluid" />
              </div>
            </div>
           
            <div class="row portfolio-project" style="margin-top: 12px;">
              <div class="col-md-8">
                <div class="heading">
                  <h3>OVERVIEW</h3>
                </div>
                <p>
                <?php echo nl2br($news_row['long_desc']); ?>
                </p>
              </div>
              <div class="col-md-4 project-more">
                <div class="heading">
                  <h3>DETAILS</h3>
                </div>
                
                <h4><?php echo $news_row['date_posted']; ?> | <?php echo $news_row['time_posted']; ?></h4>
                <p>Date - Time Posted</p>
              </div>
            </div>
          </section>
          <div class="bar pt-0">                       
            <section>
              <div class="row portfolio">
                <div class="col-md-12">
                  <div class="heading">
                    <h3>OTHER SLIDES</h3>
                  </div>
                </div>
                
                <?php
                $otherSlide_query = $conn->query("SELECT * FROM tbl_home_slides WHERE status='Display' ORDER BY slide_id ASC") or die(mysql_error());
                if($otherSlide_query->rowCount()<2){ ?>
                <div class="col-md-12 col-lg-12">
                    <p class="lead" style="color: black;">No other slides to view...</p>
                </div>
                <?php }else{
                    
                while ($otherSlide_row = $otherSlide_query->fetch()){
                    
                $otherSlide_id=$otherSlide_row['slide_id'];
                
                
                if($otherSlide_id!=$_GET['slide_id']){
                ?>
                    
                <div class="col-md-6 col-lg-3">
                  <div class="box-image">
                    <div class="image">
                        <a href="featured-slide-content.php?slide_id=<?php echo $otherSlide_id; ?>">
                            <img src="admin/<?php echo $otherSlide_row['img']; ?>" alt="" class="img-fluid" />
                        </a>
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