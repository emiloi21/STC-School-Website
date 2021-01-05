<?php 
    // Database
    include ('session.php'); 

    if(isset($_POST['submit'])){
        
        $uploadsDir = "camp-life/club-org-album/";
        $allowedFileType = array('jpg','png','jpeg');
       
            // Loop through file items
            foreach($_FILES['fileUpload']['name'] as $id=>$val){
         
                
                // Get files upload path
                $fileName        = rand(1000,9999).$_FILES['fileUpload']['name'][$id];
                $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir.$fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('m/d/Y H:i:s');
                $uploadOk = 1;
                
                
                if(in_array($fileType, $allowedFileType)){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                            $sqlVal = "('".$_GET['album_id']."', '".$_GET['club_org_id']."', '".$fileName."', '".$uploadDate."')";
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
                if(!empty($sqlVal)) {
                    $insert = $conn->query("INSERT INTO tbl_club_org_album_img(album_id, club_org_id, img, date_time)VALUES $sqlVal");
                    if($insert) {
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                        
                        ?>
                        <script>
                        window.alert('Photos added to album successfully...');
                        window.location='camp-life-club-org-album-img.php?club_org_id=<?php echo $_GET['club_org_id']; ?>&album_id=<?php echo $_GET['album_id']; ?>'
                        </script>
                        <?php
        
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
                }
            }
            
    } 
?>
 
<!DOCTYPE html>
<html>

  <?php include('header.php'); ?>

  <style>
    .container {
      max-width: 450px;
    }
    .imgGallery img {
      padding: 8px;
      max-width: 20%;
    }    
  </style>
  
<body>
  
  <?php include('menu_sidebar.php'); ?>
  

    <div class="page">

    <?php include('navbar_header.php'); ?>
    
    <?php
      
    $club_org_query = $conn->query("SELECT * FROM tbl_clubs_orgs WHERE club_org_id='$_GET[club_org_id]'") or die(mysql_error());
    $club_org_row = $club_org_query->fetch();
    
    $club_org_album_query = $conn->query("SELECT * FROM tbl_club_org_album WHERE album_id='$_GET[album_id]'") or die(mysql_error());
    $club_org_album_row = $club_org_album_query->fetch();
      
    ?>
      
    <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li style="color: blue"><strong><?php echo $activeSchoolYear; ?></strong> | <strong><?php echo $activeSemester; ?></strong> &nbsp;</li>
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="camp-life-club-org-cms.php">CMS - Clubs &amp; Organizations</a></li>
            <li class="breadcrumb-item"><a href="camp-life-club-org-album.php?club_org_id=<?php echo $_GET['club_org_id']; ?>"><?php echo strtoupper($club_org_row['title']); ?> Albums</a></li>
            <li class="breadcrumb-item active"><?php echo $club_org_album_row['title']; ?></li>
          </ul>
        </div>
      </div>
      
      <!-- Header Section-->
      
      <br />
      <div class="col-lg-12">
      <div class="row">
      

                      <div style="width: 100%; padding: 12px;">
                        <form action="" method="post" enctype="multipart/form-data">
                        
                        <button type="submit" name="submit" class="btn btn-primary btn-block" style="margin-bottom: 12px;">Save Photos to Album</button>
                        
                          <div style="width: 100%;">
                            <div class="imgGallery"> 
                              <!-- Image preview -->
                            </div>
                          </div>
                    
                          <div class="custom-file" style="text-align: center;">
                            <input type="file" name="fileUpload[]" class="form-control" id="chooseFile" multiple="" />
                          </div>
                          
                          <button name="submit" class="btn btn-primary btn-block" style="margin-top: 12px;">Save Photos to Album</button>
                          
                        </form>
                    
                        <!-- Display response messages -->
                        <?php if(!empty($response)) {?>
                            <div class="alert <?php echo $response["status"]; ?>">
                               <?php echo $response["message"]; ?>
                            </div>
                        <?php }?>
                      </div>

      </div>
      </div>
 

      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>

  <script>
    $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

      $('#chooseFile').on('change', function() {
        multiImgPreview(this, 'div.imgGallery');
      });
    });    
  </script>

  
</body>

</html>