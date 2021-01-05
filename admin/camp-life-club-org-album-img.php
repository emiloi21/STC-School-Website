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
      
      <div class="col-lg-12">
      
              <div class="card">
                
                <div class="card-header d-flex align-items-center">
                  <h4><a style="color: white !important;" href="camp-life-club-org-album-add-img.php?club_org_id=<?php echo $_GET['club_org_id']; ?>&album_id=<?php echo $_GET['album_id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Photo</a> <?php echo strtoupper($club_org_album_row['title']); ?>'S PHOTOS</h4>
                </div>
                
                <div class="card-body">
        
                    <form action="camp-life-cms-save.php?club_org_id=<?php echo $_GET['club_org_id']; ?>&album_id=<?php echo $_GET['album_id']; ?>" method="POST">
                    <table id="" class="display" style="width:100%">
                 
                      <thead>
                        <tr>
                          <th></th>
                          <th></th>
                          <th>Photo</th>
                          <th>File Name</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $ctr=0;
                      $co_album_query = $conn->query("SELECT * FROM tbl_club_org_album_img WHERE club_org_id='$club_org_row[club_org_id]' AND album_id='$club_org_album_row[album_id]' ORDER BY img_id ASC") or die(mysql_error());
                      while ($co_album_row = $co_album_query->fetch()) 
                      {
                      
                      $ctr+=1;
                           
                      $img_id=$co_album_row['img_id'];
                      
                      ?>
           
                        <tr>
                            
                          <td><?php echo $ctr; ?></td>
                          <td><input id="img<?php echo $img_id; ?>" name="delcheckbox[]" type="checkbox" value="<?php echo $img_id; ?>" /></td>
                          <td style="text-align: center;"><label for="img<?php echo $img_id; ?>"><img title="<?php echo $co_album_row['img']; ?>" src="camp-life/club-org-album/<?php echo $co_album_row['img']; ?>" style="width: 25%;" /></label></td>
                          
                          <td><?php echo $co_album_row['img']; ?></td>
                          
                        </tr>
                  <?php } ?>
                       
                      </tbody>
                    </table>
                    <p style="width: 100%;"><button class="btn btn-danger" name="bulkDeleteImages"><i class="fa fa-trash"></i> MASS DELETE</button></p>
                    </form>
                  
                </div>
                
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
