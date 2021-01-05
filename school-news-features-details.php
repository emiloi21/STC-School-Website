<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
  <body>
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      <?php
      
      $news_query = $conn->query("SELECT * FROM tbl_news WHERE news_id='$_GET[news_id]'") or die(mysql_error());
      $news_row = $news_query->fetch();
      
      ?>
                    
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">NEWS</h1>
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
            
           
            <div class="project owl-carousel">
              <div class="item"><img src="admin/<?php echo $news_row['img']; ?>" alt="" class="img-fluid"></div>
            </div>
           
            <div class="row portfolio-project" style="margin-top: 12px;">
              <div class="col-md-8">
                <div class="heading">
                  <h3>OVERVIEW</h3>
                </div>
                <p>
                <?php echo nl2br($news_row['description']); ?>
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
                    <h3>OTHER NEWS</h3>
                  </div>
                </div>
                
                <?php
                $otherNews_query = $conn->query("SELECT * FROM tbl_news WHERE status='Display' ORDER BY news_id ASC") or die(mysql_error());
                if($otherNews_query->rowCount()<2){ ?>
                <div class="col-md-12 col-lg-12">
                    <p class="lead" style="color: black;">No other news to view...</p>
                </div>
                <?php }else{
                    
                while ($otherNews_row = $otherNews_query->fetch()){
                    
                $otherNews_id=$otherNews_row['news_id'];
                
                
                if($otherNews_id!=$_GET['news_id']){
                ?>
                    
                <div class="col-md-6 col-lg-3">
                  <div class="box-image">
                    <div class="image"><img src="admin/<?php echo $otherNews_row['img']; ?>" alt="" class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="content">
                                <div class="name">
                                  <h3><a href="school-news-features-details.php?news_id=<?php echo $otherNews_id; ?>" class="color-white"><?php echo $otherNews_row['title']; ?></a></h3>
                                </div>
                                <div class="text">
                                  <p class="d-none d-sm-block"><?php echo substr($otherNews_row['description'], 0, 100).'...'; ?></p>
                                  <p class="buttons"><a href="school-news-features-details.php?news_id=<?php echo $otherNews_id; ?>" class="btn btn-template-outlined-white">Read More</a></p>
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