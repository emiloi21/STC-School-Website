<!DOCTYPE html>
<html>

  <?php
  
  include('session.php'); 
  include('header.php');
  
  ?>
  
  
  <?php $get_dept=$_GET['dept']; ?>
 
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
            <li class="breadcrumb-item active">Book Inventory - List of Book Bundles - <?php echo $get_dept; ?></li>
             
          </ul>
          
        </div>
      </div>
      
    
     
      
      <!-- Header Section-->
      
      <br />
      
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
          
            <div class="col-lg-12" style="margin-bottom: 12px;">
            <div class="card user-activity">
            <h5 style="padding: 12px;">IMPORT/EXPORT BOOK DISCOUNTS</h5>
            
            <form method="POST" action="csvFile_functions.php" enctype="multipart/form-data" style="padding: 12px;">
            
            <table>
            <tr>
            <td style="background-color: white; border: none;">
            <input type="file" name="file" id="file" class="input-large" required="" />
            </td>
         
            </tr>
            
            <tr>
            <td style="background-color: white;  border: none;">
            <a href="csv_template/import_book_discount_template.csv" class="btn btn-primary" style="color: white;" download><i class="fa fa-download"></i> Download CSV Template</a>
            <button name="import_discounts" class="btn btn-primary" style="color: white;"><i class="fa fa-upload"></i> Upload CSV Template</button>
            </td>
            </tr>
            </table>
            
            </form>
            
            </div>
            </div>
            
         </div>
        </div>
      </section>
            
      <!-- SHS Programs section Section -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
            
            

             <!-- Preparatory     -->
              <div id="new-updates" class="card updates recent-updated">
                
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display">
                  <?php if($activeSchoolYear===$data_src_sy){ ?>
                  <a data-toggle="modal" data-target="#add_account_discount" href="#" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                  <?php }else{ ?>
                  <a href="#" style="color: white; padding: 4px 8px 4px 8px;" class="btn btn-default"><i class="fa fa-plus"></i></a>
                  <?php } ?>&nbsp;
                  
                  <a style="font-weight: bold;" data-toggle="collapse" data-parent="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts">LIST OF BOOK DISCOUNTS <div class="badge badge-info">SY <?php echo $data_src_sy; ?> - <?php echo $data_src_sem; ?></div></a>
                  </h2>
                  
                  <a data-toggle="collapse" data-parent="#new-updates" href="#updates-boxContacts" aria-expanded="true" aria-controls="updates-boxContacts"><i class="fa fa-angle-down"></i></a> 
              
              </div>
              
              <div id="updates-boxContacts" role="tabpanel" class="collapse show">
              <div class="col-lg-12">
              
              <div style="margin-top: 12px;"></div>
              
              
                <div class="tab" style="margin-top: 8px;">
              
                <?php if($_GET['dept']=="Grade School"){ ?>
                <a title="Grade School student list" href="list_book_discounts.php?dept=Grade School&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">Grade School</a>
                <?php }else{?>
                <a title="Grade School student list" href="list_book_discounts.php?dept=Grade School&gradeLevel=&strand=&major=&section=" class="tablinks">Grade School</a>
                <?php } ?>
                
                <?php if($_GET['dept']=="Junior High School"){ ?>
                <a title="Junior High School student list" href="list_book_discounts.php?dept=Junior High School&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">JHS</a>
                <?php }else{?>
                <a title="Junior High School student list" href="list_book_discounts.php?dept=Junior High School&gradeLevel=&strand=&major=&section=" class="tablinks">JHS</a>
                <?php } ?>
                
                
                <?php if($_GET['dept']=="Senior High School"){ ?>
                <a title="Senior High School student list" href="list_book_discounts.php?dept=Senior High School&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">SHS</a>
                <?php }else{?>
                <a title="Senior High School student list" href="list_book_discounts.php?dept=Senior High School&gradeLevel=&strand=&major=&section=" class="tablinks">SHS</a>
                <?php } ?>
           
                <?php if($_GET['dept']=="College"){ ?>
                <a title="College student list" href="list_book_discounts.php?dept=College&gradeLevel=&strand=&major=&section=" class="tablinks active" style="font-weight: bolder;">College</a>
                <?php }else{?>
                <a title="College student list" href="list_book_discounts.php?dept=College&gradeLevel=&strand=&major=&section=" class="tablinks">College</a>
                <?php } ?>
                
                </div>
                
                
                <?php if($_GET['dept']==='Grade School'){ ?>
                
                <?php if($_GET['gradeLevel']==='Nursery'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Nursery">Nursery</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Nursery">Nursery</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Preparatory'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Preparatory">Preparatory</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Preparatory">Preparatory</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Kinder'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Kinder">Kinder</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Kinder">Kinder</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Grade 1'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 1">Grade 1</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 1">Grade 1</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Grade 2'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 2">Grade 2</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 2">Grade 2</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Grade 3'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 3">Grade 3</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 3">Grade 3</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Grade 4'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 4">Grade 4</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 4">Grade 4</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Grade 5'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 5">Grade 5</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 5">Grade 5</a>
                
                <?php } ?>
                <?php if($_GET['gradeLevel']==='Grade 6'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 6">Grade 6</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Grade School&gradeLevel=Grade 6">Grade 6</a>


                <?php } } ?>
                
                
                <?php if($_GET['dept']==='Junior High School'){ ?>
                
                <?php if($_GET['gradeLevel']==='Grade 7'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Junior High School&gradeLevel=Grade 7">Grade 7</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Junior High School&gradeLevel=Grade 7">Grade 7</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Grade 8'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Junior High School&gradeLevel=Grade 8">Grade 8</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Junior High School&gradeLevel=Grade 8">Grade 8</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Grade 9'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Junior High School&gradeLevel=Grade 9">Grade 9</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Junior High School&gradeLevel=Grade 9">Grade 9</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Grade 10'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Junior High School&gradeLevel=Grade 10">Grade 10</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Junior High School&gradeLevel=Grade 10">Grade 10</a>


                <?php } } ?>
                
                
                <?php if($_GET['dept']==='Senior High School'){ ?>
                
                <?php if($_GET['gradeLevel']==='Grade 11'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Senior High School&gradeLevel=Grade 11">Grade 11</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Senior High School&gradeLevel=Grade 11">Grade 11</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='Grade 12'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=Senior High School&gradeLevel=Grade 12">Grade 12</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=Senior High School&gradeLevel=Grade 12">Grade 12</a>


                <?php } } ?>
                
                
                
                <?php if($_GET['dept']==='College'){ ?>
                
                <?php if($_GET['gradeLevel']==='1st Year'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=College&gradeLevel=1st Year">1st Year</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=College&gradeLevel=1st Year">1st Year</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='2nd Year'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=College&gradeLevel=2nd Year">2nd Year</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=College&gradeLevel=2nd Year">2nd Year</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='3rd Year'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=College&gradeLevel=3rd Year">3rd Year</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=College&gradeLevel=3rd Year">3rd Year</a>
                
                <?php } ?>
                
                <?php if($_GET['gradeLevel']==='4th Year'){ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px; border: 2px solid yellow; font-weight: bold;" href="list_book_discounts.php?dept=College&gradeLevel=4th Year">4th Year</a>
                
                <?php }else{ ?>
                <a class="btn btn-primary btn-sm" style="color: white; margin-top: 12px;" href="list_book_discounts.php?dept=College&gradeLevel=4th Year">4th Year</a>
                
                <?php } } ?>
 
     
                
                
                <h3 style="margin: 12px 12px 12px 0px;">
                 
                <?php
 
                if($_GET['gradeLevel']===''){
                    echo "Select Level";
                    
                }else{
                    echo $_GET['dept'].' - '.$_GET['gradeLevel'];
                
                }
                
                
                ?>
                 
                </h3>
                 
                
                <div class="table-responsive">
                <table id="" class="display" style="width:100%">
                
                        <thead>
                        <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Value</th>
                        <th>Type</th>
                        <th></th>
                        </tr>
                        </thead>
                      
                      <tbody>
                      
                      <?php
                      $catCtr=0;
               
                      $book_disc_query = $conn->query("SELECT * FROM tbl_book_discounts WHERE gradeLevel='$_GET[gradeLevel]' AND schoolYear='$data_src_sy'") or die(mysql_error());
                      while ($book_disc_row = $book_disc_query->fetch()) 
                      {
                        $catCtr+=1;
                        $book_discount_id=$book_disc_row['book_discount_id'];
                        
                        ?>
           
                        <tr>
                        
                        <td><?php echo $catCtr; ?></td>
                        
                        <td><?php echo $book_disc_row['title']; ?></td>
                        
                        <td><?php echo $book_disc_row['description']; ?></td>
                        
                        <td><?php echo $book_disc_row['discount_value']; ?></td>
                        
                        <td><?php echo $book_disc_row['type']; ?></td>
                        
                        <td>
                          <?php if($activeSchoolYear===$data_src_sy){ ?>
                         
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_account_discount<?php echo $book_discount_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                          
                          <a style="color: white !important;" data-toggle="modal" data-target="#delete_account_discount<?php echo $book_discount_id; ?>" href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php }else{ ?>
                         
                          <a style="color: white !important;" data-toggle="modal" data-target="#edit_account_discount<?php echo $book_discount_id; ?>" href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                           
                          <a style="color: white !important;" class="btn btn-default btn-sm"><i class="fa fa-times"></i> Del</a>
                          <?php } ?>
                        </td>
                        </tr>


                  <!-- edit category Modal -->
                  <div id="edit_account_discount<?php echo $book_discount_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                      
                      <form action="save_add_books.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>" method="POST">
                      
                      <input value="<?php echo $book_disc_row['book_discount_id']; ?>" name="book_discount_id" type="hidden" />
                      
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Edit Book Discount</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                        </div>
                        
                        <div class="modal-body">
                        
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Title</label>
                              <div class="col-sm-9">
                                <input value="<?php echo $book_disc_row['description']; ?>" name="description" type="text" class="form-control" placeholder="Enter category title..." />
                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                          <a style="color: white;" href="" data-dismiss="modal" class="btn btn-secondary">Cancel</a>
                          <button name="updateBook Discount" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end edit category Modal -->
                  
                  
                        <!-- delete student Modal -->
                          <div id="delete_account_discount<?php echo $book_discount_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                            <div role="document" class="modal-dialog">
                              <div class="modal-content">
                              <form action="save_add_books.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=<?php echo $_GET['gradeLevel']; ?>" method="POST">
                      
                              <input value="<?php echo $book_disc_row['book_discount_id']; ?>" name="book_discount_id" type="hidden" />
                              
                                <div class="modal-header">
                                  <h5 id="exampleModalLabel" class="modal-title">Delete Book Discount</h5>
                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true" class="fa fa-times"></span></button>
                                </div>
                                
                                <div class="modal-body">
                                   
                                <h4>Are you sure you want to delete book discount <?php echo $book_disc_row['title']; ?>?</h4>
                                  
                                </div>
                                
                                <div class="modal-footer">
                                  <a style="color: white;" href="" data-dismiss="modal" class="btn btn-primary">No</a>
                                  <button name="deleteBook Discount" type="submit" class="btn btn-danger">Yes</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- end delete student Modal -->
                          
                            <?php } ?>
                            
                      </tbody>
                    </table>
                    </div>
               
               </div>
               </div>
                   
                </div>
                
              </div>
              <!-- kinder End-->
     
            <!-- add Student Modal -->
            <?php include('add_book_bundle_modal.php'); ?>
            <!-- end add Student Modal -->
 
            </div>
            
          </div>
        
              
      </section>
     
      <?php include('footer.php'); ?>
      
    </div>
    
    <?php include('scripts_files.php'); ?>
 
 
  </body>
</html>
