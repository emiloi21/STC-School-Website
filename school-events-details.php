<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
  <body>
    <div id="all">
    
      <?php include('top_bar.php'); ?>
      
      <?php include('top_navbar.php'); ?>
      
      <?php
      
      $events_query = $conn->query("SELECT * FROM tbl_events WHERE event_id='$_GET[event_id]'") or die(mysql_error());
      $events_row = $events_query->fetch();
      
      ?>
                    
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">EVENTS</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a style="color: #e5eb0b;" href="index.php">Home</a></li>
                <li class="breadcrumb-item active" style="color: #075907;"><?php echo $events_row['title']; ?></li>
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
                  <h3><?php echo $events_row['title']; ?></h3>
                </div>
              </div>
            </div>
            
           
            <div class="project owl-carousel">
              <div class="item"><img src="admin/<?php echo $events_row['img']; ?>" alt="" class="img-fluid"></div>
            </div>
           
            <div class="row portfolio-project" style="margin-top: 12px;">
              <div class="col-md-8">
                <div class="heading">
                  <h3>OVERVIEW</h3>
                </div>
                <p>
                <?php echo $events_row['description']; ?>
                </p>
              </div>
              <div class="col-md-4 project-more">
                <div class="heading">
                  <h3>DETAILS</h3>
                </div>
                <h4><?php echo $events_row['date_posted']; ?> | <?php echo $events_row['time_posted']; ?></h4>
                <p>Date - Time Posted</p>
              </div>
            </div>
          </section>
          
          <div class="bar pt-0">                       
            <section>
              <div class="row portfolio">
                <div class="col-md-12">
                  <div class="heading">
                    <h3>OTHER EVENTS</h3>
                  </div>
                </div>
                
                <?php
                $otherEvents_query = $conn->query("SELECT * FROM tbl_events WHERE status='Display' ORDER BY event_id ASC") or die(mysql_error());
                if($otherEvents_query->rowCount()<2){ ?>
                <div class="col-md-12 col-lg-12">
                    <p class="lead" style="color: black;">No other events to view...</p>
                </div>
                <?php }else{
                    
                while ($otherEvents_row = $otherEvents_query->fetch()){
                    
                $otherEvent_id=$otherEvents_row['event_id'];
                
                
                if($otherEvent_id!=$_GET['event_id']){
                ?>
                    
                <div class="col-md-6 col-lg-3">
                  <div class="box-image">
                    <div class="image"><img src="admin/<?php echo $otherEvents_row['img']; ?>" alt="" class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="content">
                                <div class="name">
                                  <h3><a href="school-events-details.php?event_id=<?php echo $otherEvent_id; ?>" class="color-white"><?php echo $otherEvents_row['title']; ?></a></h3>
                                </div>
                                <div class="text">
                                  <p class="d-none d-sm-block"><?php echo substr($otherEvents_row['description'], 0, 100).'...'; ?></p>
                                  <p class="buttons"><a href="school-events-details.php?event_id=<?php echo $otherEvent_id; ?>" class="btn btn-template-outlined-white">Read More</a></p>
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