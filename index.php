<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
 
  <body>
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      
      
        <div class="container text-center" style="margin-top: 8px;">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="project owl-carousel">
              
                <?php
                $slides_query = $conn->query("SELECT * FROM tbl_home_slides WHERE status='Display' ORDER BY slide_id DESC") or die(mysql_error());
                while ($slide_row = $slides_query->fetch()){
                        
                $slide_id=$slide_row['slide_id'];
                ?>
                
                <div class="item">
                    <a href="featured-slide-content.php?slide_id=<?php echo $slide_row['slide_id']; ?>" style="margin: 0px; width: 100%;">
                    <img src="admin/<?php echo $slide_row['img']; ?>" alt="" class="img-fluid" />
                    </a>
                </div>
                
                <?php } ?>
                
              </div>
            </div>
          </div>
        </div>
        
       
      <section class="bar background-white">
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
              <ul id="pills-tab" role="tablist" class="nav nav-pills nav-justified">
                <li class="nav-item"><a id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" class="nav-link active">Announcements</a></li>
                <li class="nav-item"><a id="pills-marketing-tab" data-toggle="pill" href="#pills-marketing" role="tab" aria-controls="pills-contact" aria-selected="false" class="nav-link">Upcoming Events</a></li>
                <!--li class="nav-item"><a id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" class="nav-link">Achivements &amp; Awards</a></li-->
                <li class="nav-item"><a id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" class="nav-link">News</a></li>
              </ul>
              
              <div id="pills-tabContent" class="tab-content">
                
                <div id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" class="tab-pane fade show active">
                    <div class="row portfolio text-center">
                    
                    <?php
                    $anounce_query = $conn->query("SELECT * FROM tbl_announcements WHERE status='Display' ORDER BY announce_id ASC") or die(mysql_error());
                    while ($announce_row = $anounce_query->fetch()){
                    
                    $announce_id=$announce_row['announce_id'];
                    ?>
                    
                      <div class="col-md-4">
                        
                        <figure>
                        
                        <div class="image"><img src="admin/<?php echo $announce_row['img']; ?>" alt="" class="img-fluid" /></div>

                        <figcaption>
                        <div class="d-flex align-items-center justify-content-center">
                              <div class="content">
                                <div class="name">
                                  <h3><a href="school-announcement-details.php?announce_id=<?php echo $announce_id; ?>"><?php echo $announce_row['title']; ?></a></h3>
                                </div>
                                <div class="text">
                                  <p class="d-none d-sm-block" style="color: #075907;"><?php echo substr($announce_row['description'], 0, 100).'...'; ?> <a href="school-announcement-details.php?announce_id=<?php echo $announce_id; ?>" style="color: #097609; text-decoration-line: none;">Read More &raquo;</a></p>
                                </div>
                              </div>
                            </div>
                            
                        </figcaption>
                        
                        </figure>
                        
                      </div>
                      
                    <?php } ?>
                    
                    </div>
                </div>
                
                
                
                
                
                <div id="pills-marketing" role="tabpanel" aria-labelledby="pills-marketing-tab" class="tab-pane fade">
                    <div class="row portfolio text-center">
                      
                    <?php
                    $events_query = $conn->query("SELECT * FROM tbl_events WHERE status='Display' ORDER BY event_id ASC") or die(mysql_error());
                    while ($events_row = $events_query->fetch()){
                    
                    $event_id=$events_row['event_id'];
                    ?>
                        
                      <div class="col-md-4">
                        
                        <figure>
                        
                        <div class="image"><img src="admin/<?php echo $events_row['img']; ?>" alt="" class="img-fluid" /></div>

                        <figcaption>
                            <div class="d-flex align-items-center justify-content-center">
                              <div class="content">
                                <div class="name">
                                  <h3><a href="school-events-details.php?event_id=<?php echo $event_id; ?>"><?php echo $events_row['title']; ?></a></h3>
                                </div>
                                <div class="text">
                                  <p class="d-none d-sm-block" style="color: #075907;"><?php echo substr($events_row['description'], 0, 100).'...'; ?> <a href="school-events-details.php?event_id=<?php echo $event_id; ?>" style="color: #097609; text-decoration-line: none;">Read More &raquo;</a></p>
                                </div>
                              </div>
                            </div>
                            
                        </figcaption>
                        
                        </figure>
                        
                      </div>
                      
                    <?php } ?>

                    </div>
                </div>
                
                <div id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" class="tab-pane fade">
                    <div class="row portfolio text-center">
                    <?php
                    $news_query = $conn->query("SELECT * FROM tbl_news WHERE status='Display' ORDER BY news_id ASC") or die(mysql_error());
                    while ($news_row = $news_query->fetch()){
                    
                    $news_id=$news_row['news_id'];
                    ?>
                     
                     
                      <div class="col-md-4">
                        
                        <figure>
                        
                        <div class="image"><img src="admin/<?php echo $news_row['img']; ?>" alt="" class="img-fluid" /></div>

                        <figcaption>
                            <div class="d-flex align-items-center justify-content-center">
                              <div class="content">
                                <div class="name">
                                  <h3><a style="color: #075907;" href="school-news-features-details.php?news_id=<?php echo $news_id; ?>"><?php echo $news_row['title']; ?></a></h3>
                                </div>
                                <div class="text">
                                  <p class="d-none d-sm-block" style="color: #075907;"><?php echo substr($news_row['description'], 0, 100).'...'; ?> <a href="school-news-features-details.php?news_id=<?php echo $news_id; ?>" style="color: #097609; text-decoration-line: none;">Read More &raquo;</a></p>
                                </div>
                              </div>
                            </div>
                        </figcaption>
                        
                        </figure>
                        
                      </div>
                      
                    <?php } ?>
 
                    </div>
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