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
              <h1 class="h2">GALLERY</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">GALLERY</li>
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
                  <h3>TITLE</h3>
                </div>
                <p class="lead">SOME TEXT HERE...</p>
              </div>
            </div>

          
            <div class="row portfolio text-center no-space">
                 <section class="gallery no-padding">
                  <div class="row">
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item" style="margin: 4px;"><a href="img/portfolio-1.jpg" data-fancybox="gallery" class="image"><img src="img/portfolio-1.jpg" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item" style="margin: 4px;"><a href="img/portfolio-1.jpg" data-fancybox="gallery" class="image"><img src="img/portfolio-1.jpg" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item" style="margin: 4px;"><a href="img/portfolio-1.jpg" data-fancybox="gallery" class="image"><img src="img/portfolio-1.jpg" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item" style="margin: 4px;"><a href="img/portfolio-1.jpg" data-fancybox="gallery" class="image"><img src="img/portfolio-1.jpg" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                  </div>
                </section>
                
            </div>
          </section>
          
          
          <section class="bar">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                
                          <!-- Image box with hover-->
                          <div class="heading">
                            <h3>OTHER GALLERIES</h3>
                          </div>
                          
                          <div class="row mb-12">
                          
                            <div class="col-md-6 col-lg-3">
                              <div class="box-image">
                                <div class="image"><img src="img/portfolio-1.jpg" alt="" class="img-fluid">
                                  <div class="overlay d-flex align-items-center justify-content-center">
                                    <div class="content">
                                      <div class="name no-mb">
                                        <h3><a href="#" class="color-white">Other Gallery</a></h3>
                                      </div>
                                      <div class="text" style="text-align: center;">
                                        <p class="d-none">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
                                        <p class="buttons"><a href="#" class="btn btn-template-outlined-white">View Gallery</a></p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                  
                </div>
                
              </div>
            </div>
          </section>
          
          
        </div>
      </div>
 
      <?php include('footer.php'); ?>
    </div>
    <?php include('js_files.php'); ?>
  </body>
</html>