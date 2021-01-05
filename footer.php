<!-- FOOTER -->
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h4 class="h3">STA. TERESA COLLEGE</h4>
              <p>Kapitan Ponso St. Poblacion 2, Bauan, Batangas, 4201 Philippines</p>
              
                
                <ul class="social-custom list-inline">
                  <li class="list-inline-item"><small>Follow us on</small></li>
                  <li class="list-inline-item"><a href="https://facebook.com/OfficialStcbauan"><i class="fa fa-facebook-square"></i></a></li>
                  <!-- li class="list-inline-item"><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-envelope-square"></i></a></li-->
                </ul>
                
              <a href="school-contact.php" target="_blank"><strong>Go to contact page &raquo;</strong></a>
              <hr class="d-block d-lg-none">
            </div>
            
            <div class="col-lg-3">
              <ul class="list-unstyled footer-blog-list">
              
              <?php
                  $subjK_query = $conn->query("SELECT * FROM tbl_accred_affiliate ORDER BY accred_affil_id ASC LIMIT 4") or die(mysql_error());
                  while ($subjK_row = $subjK_query->fetch()){
                        
                  $accred_affil_id=$subjK_row['accred_affil_id'];
              ?>
                    
                <li class="d-flex align-items-center">
                  <div class="image"><img style="cursor: help;" title="<?php echo $subjK_row['description']; ?>" src="admin/<?php echo $subjK_row['img']; ?>" alt="..." class="img-fluid" /></div>
                  <div class="text">
                    <h5 class="mb-0"> <a href="about-affiliates.php" title="<?php echo $subjK_row['description']; ?>"><?php echo $subjK_row['title'];; ?></a></h5>
                  </div>
                </li>
              
              <?php } ?>
              
              </ul>
            </div>
            
            <div class="col-lg-3">
              <ul class="list-unstyled footer-blog-list">
                <?php
                  $subjK_query = $conn->query("SELECT * FROM tbl_accred_affiliate ORDER BY accred_affil_id DESC LIMIT 4") or die(mysql_error());
                  while ($subjK_row = $subjK_query->fetch()){
                        
                  $accred_affil_id=$subjK_row['accred_affil_id'];
              ?>
                    
                <li class="d-flex align-items-center">
                  <div class="image"><img style="cursor: help;" title="<?php echo $subjK_row['description']; ?>" src="admin/<?php echo $subjK_row['img']; ?>" alt="..." class="img-fluid" /></div>
                  <div class="text">
                    <h5 class="mb-0"> <a href="about-affiliates.php" title="<?php echo $subjK_row['description']; ?>"><?php echo $subjK_row['title'];; ?></a></h5>
                  </div>
                </li>
              
              <?php } ?>
              </ul>
            </div>
            
          </div>
        </div>
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 text-center-md">
                <p>&copy; 2020. STA. TERESA COLLEGE</p>
              </div>
              <div class="col-lg-8 text-right text-center-md">
                <p>School Year <?php echo $activeSchoolYear; ?> &middot; <?php echo $activeSemester; ?></p>
                <!--p>Template design by <a href="https://bootstrapious.com/p/big-bootstrap-tutorial">Bootstrapious </a> &amp; <a href="https://fity.cz/ostrava">Fity</a></p-->
                <!-- Please do not remove the backlink to us unless you purchase the Attribution-free License at https://bootstrapious.com/donate. Thank you. -->
              </div>
            </div>
          </div>
        </div>
      </footer>