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
            <li class="breadcrumb-item active">CMS - Cover &amp; Slides</li>
          </ul>
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <br />
      <div class="col-lg-12">
      <div class="row">
      
      <div class="col-lg-12">
      
                  <!-- ADD SLIDES Modal -->
                  <div id="addAnnouncement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="home-cms-save.php" method="POST" class="form-horizontal" enctype="multipart/form-data" style="margin-top: 12px;"> 

                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">ADD SLIDES</h5>
                          <a data-dismiss="modal" aria-label="Close" class="close" href="#"><span aria-hidden="true" class="fa fa-times"></span></a>
                        </div>
                        
                        <div class="modal-body">
                        
                           <div class="form-group row">
                              <div class="col-sm-8">
                                <label>Upload Image</label>
                                <input class="form-control" type="file" name="file" id="imgInp" />
                                <small>Recommended size: 650 - 800 Pixels x 350 - 470 Pixels</small>
                              </div>
                              
                              <div class="col-sm-4">
                                <img width="150" height="150" class="img-fluid rounded" id="blah" src="#" alt="your image" />
                                <small class="form-text">Image preview</small>
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Title</label>
                                <input name="title" type="text" placeholder="Enter title..." class="form-control" maxlength="50" required="" />
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Short Description</label>
                                <textarea name="short_desc" class="form-control" rows="3" style="resize: none;" maxlength="50" placeholder="Enter Announcement description..."></textarea>
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Full Description</label>
                                <textarea name="long_desc" class="form-control" rows="7" style="resize: none;" placeholder="Enter Announcement description..."></textarea>
                              </div>
                           </div>
                           
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="add_slides" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end ADD SLIDES Modal -->
                  
              <!-- SLIDES 800 x 440 pixels -->
              <div class="card">
                
                <div class="card-header d-flex align-items-center">
                  <h4><a style="color: white !important;" data-toggle="modal" data-target="#addAnnouncement" href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> &nbsp; SLIDES</h4>
                </div>
                
                <div class="card-body">
             
                <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                 
                      <thead>
                        <tr>
                          <th></th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Short Description</th>
                          <th>Full Description</th>
                          <th>Date-Time Posted</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $ctr=0;
                      $announce_query = $conn->query("select * FROM tbl_home_slides ORDER BY slide_id ASC") or die(mysql_error());
                      while ($announce_row = $announce_query->fetch()) 
                      {
                      
                      $ctr+=1;
                           
                      $slide_id=$announce_row['slide_id']; ?>
           
                        <tr>
                            
                          <td><?php echo $ctr; ?></td>
                          <td><a href="home-slides-upd-img.php?slide_id=<?php echo $slide_id; ?>" title="Click to update image"><img src="<?php echo $announce_row['img']; ?>" style="width: 70px; height: 50px;" /></a></td>
                          <td><?php echo $announce_row['title']; ?></td>
                          <td><?php echo nl2br(substr($announce_row['short_desc'], 0, 50)); ?></td>
                          <td><?php echo nl2br(substr($announce_row['long_desc'], 0, 100)); ?></td>
                          
                          <td>
                          Date: <?php echo $announce_row['date_posted']; ?><br />
                          Time: <?php echo $announce_row['time_posted']; ?>
                          </td>

                          <td>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#editAnnouncement<?php echo $slide_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteAnnouncement<?php echo $slide_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
 
                          </td>
                        </tr>
 
 
                  <!-- EDIT SLIDES Modal -->
                  <div id="editAnnouncement<?php echo $slide_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="home-cms-save.php" method="POST" class="form-horizontal" enctype="multipart/form-data" style="margin-top: 12px;"> 
                      <input name="slide_id" value="<?php echo $slide_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">EDIT SLIDES</h5>
                          <a data-dismiss="modal" aria-label="Close" class="close" href="#"><span aria-hidden="true" class="fa fa-times"></span></a>
                        </div>
                        
                        <div class="modal-body">
                         
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Title</label>
                                <input value="<?php echo $announce_row['title']; ?>" name="title" type="text" placeholder="Enter title..." class="form-control" required="" />
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Short Description</label>
                                <textarea name="short_desc" class="form-control" rows="3" style="resize: none;" maxlength="50" placeholder="Enter Announcement description..." required=""><?php echo $announce_row['short_desc']; ?></textarea>
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Full Description</label>
                                <textarea name="long_desc" class="form-control" rows="7" style="resize: none;" placeholder="Enter Announcement description..." required=""><?php echo $announce_row['long_desc']; ?></textarea>
                              </div>
                           </div>
                           
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="edit_slides" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                        </div>
                        </form>
 
                      </div>
                    </div>
                  </div>
                  <!-- end EDIT SLIDES Modal -->
                  
                  <!-- DELETE SLIDES Modal -->
                  <div id="deleteAnnouncement<?php echo $slide_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="home-cms-save.php" method="POST">
                      <input name="slide_id" value="<?php echo $slide_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">DELETE SLIDES</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                           
                        <h4>Are you sure you want to delete slide <?php echo $announce_row['title']; ?>?</h4>
                          
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                          <button name="del_slides" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end DELETE SLIDES Modal -->
                   
                  
                  <?php } ?>
                       
                      </tbody>
                    </table>
                 </div>
            
                </div>
                
              </div>
              <!-- END SLIDES -->
              
              <!-- SLIDE COVER -->
              <!--div class="card">
                
                <div class="card-header d-flex align-items-center">
                  <h4>SLIDE BACKGROUND</h4>
                </div>
                
                <div class="card-body">
                    <div class="col-12">
                        <img width="100%" height="100%" class="img-fluid rounded" src="<?php //echo $sf_row['slide_bg_img']; ?>" alt="your image" />
                        <small class="form-text"><a href="home-cover-upd-img.php" style="text-decoration-line: none;"><i class="fa fa-pencil"></i> <strong>Change Slide Background</strong></a> &nbsp; Current Slide Background Image (Recommended Image Size: 2094 x 796 Pixels)</small>
                    </div>
                </div>
                
              </div-->
              <!-- END SLIDE COVER -->
              
              
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
