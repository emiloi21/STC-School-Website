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
            <li class="breadcrumb-item active">CMS - News</li>
          </ul>
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <br />
      <div class="col-lg-12">
      <div class="row">
      
      <div class="col-lg-12">
      
                  <!-- ADD NEWS Modal -->
                  <div id="addNews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="home-cms-save.php" method="POST" class="form-horizontal" enctype="multipart/form-data" style="margin-top: 12px;"> 

                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">ADD NEWS</h5>
                          <a data-dismiss="modal" aria-label="Close" class="close" href="#"><span aria-hidden="true" class="fa fa-times"></span></a>
                        </div>
                        
                        <div class="modal-body">
                        
                           <div class="form-group row">
                              <div class="col-sm-8">
                                <label>Upload Image</label>
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
                                <textarea name="description" class="form-control" rows="7" style="resize: none;" placeholder="Enter News description..." required=""></textarea>
                              </div>
                           </div>
                           
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="add_news" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end ADD NEWS Modal -->
                  
      
              <div class="card">
                
                <div class="card-header d-flex align-items-center">
                  <h4><a style="color: white !important;" data-toggle="modal" data-target="#addNews" href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> &nbsp; NEWS</h4>
                </div>
                
                <div class="card-body">
             
                <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                 
                      <thead>
                        <tr>
                          <th></th>
                          <th>Image</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Date-Time Posted</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $ctr=0;
                      $news_query = $conn->query("SELECT * FROM tbl_news ORDER BY news_id ASC") or die(mysql_error());
                      while ($news_row = $news_query->fetch()) 
                      {
                      
                      $ctr+=1;
                           
                      $news_id=$news_row['news_id']; ?>
           
                        <tr>
                            
                          <td><?php echo $ctr; ?></td>
                          <td><a href="home-news-upd-img.php?news_id=<?php echo $news_id; ?>" title="Click to update image"><img src="<?php echo $news_row['img']; ?>" style="width: 70px; height: 50px;" /></a></td>
                          <td><?php echo $news_row['title']; ?></td>
                          <td><?php echo nl2br(substr($news_row['description'], 0, 100)); ?></td>

                          <td>
                          Date: <?php echo $news_row['date_posted']; ?><br />
                          Time: <?php echo $news_row['time_posted']; ?>
                          </td>

                          <td>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#editNews<?php echo $news_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteNews<?php echo $news_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
 
                          </td>
                        </tr>
 
 
                  <!-- EDIT NEWS Modal -->
                  <div id="editNews<?php echo $news_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="home-cms-save.php" method="POST" class="form-horizontal" enctype="multipart/form-data" style="margin-top: 12px;"> 
                      <input name="news_id" value="<?php echo $news_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">EDIT NEWS</h5>
                          <a data-dismiss="modal" aria-label="Close" class="close" href="#"><span aria-hidden="true" class="fa fa-times"></span></a>
                        </div>
                        
                        <div class="modal-body">
                         
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Title</label>
                                <input value="<?php echo $news_row['title']; ?>" name="title" type="text" placeholder="Enter title..." class="form-control" required="" />
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="7" style="resize: none;" placeholder="Enter News description..." required=""><?php echo $news_row['description']; ?></textarea>
                              </div>
                           </div>
                           
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="edit_news" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                        </div>
                        </form>
 
                      </div>
                    </div>
                  </div>
                  <!-- end EDIT NEWS Modal -->
                  
                  <!-- DELETE NEWS Modal -->
                  <div id="deleteNews<?php echo $news_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="home-cms-save.php" method="POST">
                      <input name="news_id" value="<?php echo $news_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">DELETE NEWS</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                           
                        <h4>Are you sure you want to delete news <?php echo $news_row['title']; ?>?</h4>
                          
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                          <button name="del_news" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end DELETE NEWS Modal -->
                   
                  
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
