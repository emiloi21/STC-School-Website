<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
 
  
  <body>
  
  <?php include('menu_sidebar.php'); ?>
  

    <div class="page">

    <?php include('navbar_header.php'); ?>
    
    <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li style="color: blue"><strong><?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="about-facilities-cms.php">CMS - Facilities / Services</a></li>
            <li class="breadcrumb-item active">Update Facilities / Services Image</li>
          </ul>
        </div>
      </div>
      
    
     <?php
     
     $announce_query = $conn->query("SELECT title, img FROM tbl_facilities WHERE facility_id='$_GET[facility_id]'") or die(mysql_error());
     $announce_row = $announce_query->fetch();
     ?>
      
      <!-- Header Section-->
      
      <br />
      <div class="col-lg-12">
      <div class="row">
      
      <div class="col-lg-12">
      
              <div class="card">
                
                <div class="card-header d-flex align-items-center">
                  <h4>UPDATE IMAGE</h4>
                </div>
                <form action="save_update_imgs.php?facility_id=<?php echo $_GET['facility_id']; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data" style="margin-top: 12px;"> 
                <div class="card-body">
                <h5><strong>Title:</strong> <?php echo $announce_row['title']; ?></h5>
                    <div class="form-group row">
                        <div class="col-sm-12" style="margin-bottom: 24px;">
                            <label>Upload Image</label>
                            <input class="form-control" type="file" name="file" id="imgInp" required="" />
                        </div>
                              
                        <div class="col-sm-6" style="text-align: center;">
                            <img width="300" height="300" class="img-fluid rounded" src="<?php echo $announce_row['img']; ?>" alt="your image" />
                            <small class="form-text">Current Image</small>
                        </div>
                        
                        <div class="col-sm-6" style="text-align: center;">
                            <img width="300" height="300" class="img-fluid rounded" id="blah" src="#" alt="your image" />
                            <small class="form-text">Image preview</small>
                        </div>
                        
                    </div>
                           
                </div>
                
                <div class="card-footer" style="text-align: right;">
                    <a href="about-facilities-cms.php" class="btn btn-secondary">Back to Facilities / Servcies</a>
                    <button name="upd_img_facilities" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Image</button>
                </div>
                </form>
              </div>
      </div>
      </div>
      </div>
 

      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
        
        <script>
    
        $('#blah').attr('src', '../img/nfc.png');
        
        function readURL(input) {
    
      if (input.files && input.files[0]) {
        var reader = new FileReader();
    
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }
    
        reader.readAsDataURL(input.files[0]);
      }
    }
    
    $("#imgInp").change(function() {
      readURL(this);
    });
        </script>
        
  </body>
</html>
