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
            <li class="breadcrumb-item active">CMS - Faculty &amp; Staff</li>
          </ul>
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <br />
      <div class="col-lg-12">
      <div class="row">
      
      <div class="col-lg-12">
      
                  <!-- ADD FACULTY &amp; STAFF Modal -->
                  <div id="addFacilities" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="administration-cms-save.php" method="POST" class="form-horizontal" enctype="multipart/form-data" style="margin-top: 12px;"> 
                  
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">ADD FACULTY &amp; STAFF</h5>
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
                                <label>Classification</label>
                                <select name="classification" class="form-control">
                                <option>GRADE SCHOOL</option>
                                <option>JUNIOR HIGH SCHOOL</option>
                                <option>SENIOR HIGH SCHOOL</option>
                                <option>COLLEGE</option>
                                <option>OFFICE STAFF</option>
                                <option>CANTEEN STAFF</option>
                                <option>MAINTENANCE</option>
                                <option>ADMIN</option>
                                <option>COACH/TRAINER/PART-TIME</option>
                                </select>
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Fullname <small>(Last Name, First Name, Middle Name)</small></label>
                                <input name="fullname" type="text" placeholder="Enter fullname..." class="form-control" required="" />
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Assignment</label>
                                <textarea name="description" class="form-control" rows="7" style="resize: none;" placeholder="Enter assignment/s..." required=""></textarea>
                              </div>
                           </div>
                           
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="add_faculty_staff" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end ADD FACULTY &amp; STAFF Modal -->
                  
      
              <div class="card">
                
                <div class="card-header d-flex align-items-center">
                  <h4><a style="color: white !important;" data-toggle="modal" data-target="#addFacilities" href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> &nbsp; FACULTY &amp; STAFF</h4>
                </div>
                
                <div class="card-body">
             
                <div class="table-responsive" style="margin-top: 12px;">
                    <table id="" class="display" style="width:100%">
                 
                      <thead>
                        <tr>
                          <th></th>
                          <th>Image</th>
                          <th>Fullname</th>
                          <th>Classification</th>
                          <th>Assignment</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      
                      <?php
                      $ctr=0;
                      $facility_query = $conn->query("SELECT * FROM tbl_faculty_staff ORDER BY personnel_id ASC") or die(mysql_error());
                      while ($facility_row = $facility_query->fetch()) 
                      {
                      
                      $ctr+=1;
                           
                      $personnel_id=$facility_row['personnel_id']; ?>
           
                        <tr>
                            
                          <td><?php echo $ctr; ?></td>
                          <td style="text-align: center;"><a href="administration-faculty-staff-upd-img.php?personnel_id=<?php echo $personnel_id; ?>" title="Click to update image"><img src="<?php echo $facility_row['img']; ?>" style="width: 70px; height: 70px; border: solid 1px #097609;" /></a></td>
                          <td><?php echo $facility_row['fullname']; ?></td>
                          <td><?php echo $facility_row['classification']; ?></td>
                          <td><?php echo nl2br(substr($facility_row['description'], 0, 100)); ?></td> 
                 

                          <td>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#editFacilities<?php echo $personnel_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                          <a style="color: white !important;" data-toggle="modal" data-target="#deleteFacilities<?php echo $personnel_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
 
                          </td>
                        </tr>
 
 
                  <!-- EDIT FACULTY &amp; STAFF Modal -->
                  <div id="editFacilities<?php echo $personnel_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="administration-cms-save.php" method="POST" class="form-horizontal" enctype="multipart/form-data" style="margin-top: 12px;"> 
                      <input name="personnel_id" value="<?php echo $personnel_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">EDIT FACULTY &amp; STAFF</h5>
                          <a data-dismiss="modal" aria-label="Close" class="close" href="#"><span aria-hidden="true" class="fa fa-times"></span></a>
                        </div>
                        
                        <div class="modal-body">
                         
                            <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Classification</label>
                                <select name="classification" class="form-control">
                                <option><?php echo $facility_row['classification']; ?></option>
                                <option>GRADE SCHOOL</option>
                                <option>JUNIOR HIGH SCHOOL</option>
                                <option>SENIOR HIGH SCHOOL</option>
                                <option>COLLEGE</option>
                                <option>OFFICE STAFF</option>
                                <option>CANTEEN STAFF</option>
                                <option>MAINTENANCE</option>
                                <option>ADMIN</option>
                                <option>COACH/TRAINER/PART-TIME</option>
                                </select>
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Fullname <small>(Last Name, First Name, Middle Name)</small></label>
                                <input value="<?php echo $facility_row['fullname']; ?>" name="fullname" type="text" placeholder="Enter fullname..." class="form-control" required="" />
                              </div>
                           </div>
                           
                           <div class="form-group row">
                              <div class="col-sm-12">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="7" style="resize: none;" placeholder="Enter assignment/s..." required=""><?php echo $facility_row['description']; ?></textarea>
                              </div>
                           </div>
                           
                        </div>
                        
                        <div class="modal-footer">
                          <a href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="edit_faculty_staff" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                        </div>
                        </form>
 
                      </div>
                    </div>
                  </div>
                  <!-- end EDIT FACULTY &amp; STAFF Modal -->
                  
                  <!-- DELETE FACULTY &amp; STAFF Modal -->
                  <div id="deleteFacilities<?php echo $personnel_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      <form action="administration-cms-save.php" method="POST">
                      <input name="personnel_id" value="<?php echo $personnel_id; ?>" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">DELETE FACULTY &amp; STAFF</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                           
                        <h4>Are you sure you want to delete faculty &amp; staff <?php echo $facility_row['fullname']; ?>?</h4>
                          
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                          <button name="del_faculty_staff" type="submit" class="btn btn-danger">Yes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end DELETE FACULTY &amp; STAFF Modal -->
                   
                  
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
