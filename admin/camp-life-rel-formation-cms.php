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
            <li class="breadcrumb-item active">CMS - Religious Formation Album</li>
          </ul>
        </div>
      </div>
      
      <!-- Header Section-->
      
      <br />
      <div class="col-lg-12">
      <div class="row">
      
      <div class="col-lg-12">
      
                  <!-- ADD ALBUM Modal -->
                  <div id="addFacilities" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="camp-life-cms-save.php" method="POST" class="form-horizontal" enctype="multipart/form-data" style="margin-top: 12px;"> 
                  
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">ADD ALBUM</h5>
                          <a data-dismiss="modal" aria-label="Close" class="close" href="#"><span aria-hidden="true" class="fa fa-times"></span></a>
                        </div>
                        
                        <div class="modal-body">
                        
                           <div class="form-group row">
                              <div class="col-sm-8">
                                <label>Upload Album Cover Image</label>
                                <input class="form-control" type="file" name="file" id="imgInp" />
                              </div>
                              
                              <div class="col-sm-4">
                                <img width="150" height="150" class="img-fluid rounded" id="blah" src="#" alt="your image" />
                                <small class="form-text">Image preview</small>
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Title</label>
                                <input name="title" type="text" placeholder="Enter title..." class="form-control" required="" />
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="7" style="resize: none;" placeholder="Enter album description..." required=""></textarea>
                              </div>
                           </div>
                           
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="add_rel_form_album" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end ADD ALBUM Modal -->
                  
      
              <div class="card">
                
                <div class="card-header d-flex align-items-center">
                  <h4><a style="color: white !important;" data-toggle="modal" data-target="#addFacilities" href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> Religious Formation's Album</h4>
                </div>
                
                <div class="card-body">
             
                <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                 
                      <thead>
                        <tr>
                          <th></th>
                          <th>Album Cover</th>
                          <th>Title</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $ctr=0;
                      $co_album_query = $conn->query("SELECT * FROM tbl_album_rel_form ORDER BY rf_album_id ASC") or die(mysql_error());
                      while ($co_album_row = $co_album_query->fetch()) 
                      {
                      
                      $ctr+=1;
                           
                      $rf_album_id=$co_album_row['rf_album_id'];
                      
                      ?>
           
                        <tr>
                            
                          <td style="text-align: center;"><?php echo $ctr; ?></td>
                          <td style="text-align: center;"><a href="camp-life-rel-formation-album-upd-img.php?rf_album_id=<?php echo $rf_album_id; ?>" title="Click to update image"><img src="<?php echo $co_album_row['cover_img']; ?>" style="width: 100px;" /></a></td>
                          <td style="text-align: center;"><?php echo $co_album_row['title']; ?><br /><small><?php echo $co_album_row['description']; ?></small></td>
                          
                          <td style="text-align: center;">
                          
                          <a style="color: white !important;" href="camp-life-rel-formation-img.php?rf_album_id=<?php echo $rf_album_id; ?>" class="btn btn-info btn-sm"><i class="fa fa-image"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#editFacilities<?php echo $rf_album_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteFacilities<?php echo $rf_album_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
 
                          </td>
                          
                        </tr>
 
 
                  <!-- EDIT ALBUM Modal -->
                  <div id="editFacilities<?php echo $rf_album_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="camp-life-cms-save.php" method="POST" class="form-horizontal" enctype="multipart/form-data" style="margin-top: 12px;"> 
                      <input name="rf_album_id" value="<?php echo $rf_album_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">EDIT ALBUM</h5>
                          <a data-dismiss="modal" aria-label="Close" class="close" href="#"><span aria-hidden="true" class="fa fa-times"></span></a>
                        </div>
                        
                        <div class="modal-body">
                         
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Title</label>
                                <input value="<?php echo $co_album_row['title']; ?>" name="title" type="text" placeholder="Enter title..." class="form-control" required="" />
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="7" style="resize: none;" placeholder="Enter Facilities description..." required=""><?php echo $co_album_row['description']; ?></textarea>
                              </div>
                           </div>
                           
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="edit_rel_form_album" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                        </div>
                        </form>
 
                      </div>
                    </div>
                  </div>
                  <!-- end EDIT ALBUM Modal -->
                  
                  <!-- DELETE ALBUM Modal -->
                  <div id="deleteFacilities<?php echo $rf_album_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="camp-life-cms-save.php" method="POST">
                      <input name="rf_album_id" value="<?php echo $rf_album_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">DELETE ALBUM</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                           
                        <h4>Are you sure you want to delete album <?php echo $co_album_row['title']; ?>?</h4>
                          
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                          <button name="del_rel_form_album" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end DELETE ALBUM Modal -->
                   
                  
                  <?php } ?>
                       
                      </tbody>
                    </table>
                 </div>
            
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
