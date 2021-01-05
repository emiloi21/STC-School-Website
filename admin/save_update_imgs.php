<?php include('session.php'); ?>
    

    
    <!-- SLIDES-COVER --><!-- SLIDES-COVER -->
    <?php 
    if(isset($_POST['upd_slide_bg']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="../img/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);

        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE school_preferences SET slide_bg_img='$final_file'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Slides Background image updated successfully.");
            window.location='home-cover-slides-cms.php';
            </script>
    
    <?php } ?>
    <!-- END SLIDES-COVER --><!-- END SLIDES-COVER -->
    
    
    <!-- SLIDES-image --><!-- SLIDES-image -->
    <?php 
    if(isset($_POST['upd_slide_img']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="home-img/slides/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);

        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_home_slides SET img='$final_file' WHERE slide_id='$_GET[slide_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Slide image updated successfully.");
            window.location='home-cover-slides-cms.php';
            </script>
    
    <?php } ?>
    <!-- END SLIDES-image --><!-- END SLIDES-image -->
    
    
    <!-- ANNOUNCEMENTS --><!-- ANNOUNCEMENTS -->
    <?php 
    if(isset($_POST['upd_img_announce']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="home-img/announcements/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);

        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_announcements SET img='$final_file' WHERE announce_id='$_GET[announce_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Announcement image updated successfully.");
            window.location='home-announcements-cms.php';
            </script>
    
    <?php } ?>
    <!-- END ANNOUNCEMENTS --><!-- END ANNOUNCEMENTS -->
    
    <!-- EVENTS --><!-- EVENTS --><!-- EVENTS -->
    <?php 
    if(isset($_POST['upd_img_events']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="home-img/events/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_events SET img='$final_file' WHERE event_id='$_GET[event_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Event image updated successfully.");
            window.location='home-events-cms.php';
            </script>
    
    <?php } ?>
    <!-- END EVENTS --><!-- END EVENTS --><!-- END EVENTS -->
    
    <!-- NEWS --><!-- NEWS --><!-- NEWS --><!-- NEWS -->
    <?php 
    if(isset($_POST['upd_img_news']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="home-img/news/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
         
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_news SET img='$final_file' WHERE news_id='$_GET[news_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("News image updated successfully.");
            window.location='home-news-cms.php';
            </script>
    
    <?php } ?>
    <!-- END NEWS --><!-- END NEWS --><!-- END NEWS --><!-- END NEWS -->
    
    <!-- FACILITIES --><!-- FACILITIES --><!-- FACILITIES -->
    <?php 
    if(isset($_POST['upd_img_facilities']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="about-facilities-img/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_facilities SET img='$final_file' WHERE facility_id='$_GET[facility_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Facilities / Services image updated successfully.");
            window.location='about-facilities-cms.php';
            </script>
    
    <?php } ?>
    <!-- END FACILITIES --><!-- END FACILITIES --><!-- END FACILITIES -->
    
    <!-- ACCREDITATIONS & AFFILIATIONS --><!-- ACCREDITATIONS & AFFILIATIONS --><!-- ACCREDITATIONS & AFFILIATIONS -->
    <?php 
    if(isset($_POST['upd_img_accred_affiliate']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="about-accred-affiliate-img/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_accred_affiliate SET img='$final_file' WHERE accred_affil_id='$_GET[accred_affil_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Accreditations & Affiliations image updated successfully.");
            window.location='about-accred-affiliate-cms.php';
            </script>
    
    <?php } ?>
    <!-- END ACCREDITATIONS & AFFILIATIONS --><!-- END ACCREDITATIONS & AFFILIATIONS --><!-- END ACCREDITATIONS & AFFILIATIONS -->

    
    <!-- ADMIN: OFFICES-SERVICES --><!-- ADMIN: OFFICES-SERVICES --><!-- ADMIN: OFFICES-SERVICES -->
    <?php 
    if(isset($_POST['upd_img_office_service']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="admin-office-service-img/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_offices_services SET img='$final_file' WHERE office_service_id='$_GET[office_service_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Offices & Services image updated successfully.");
            window.location='administration-offices-services-cms.php';
            </script>
    
    <?php } ?>
    
    <!-- END ADMIN: OFFICES-SERVICES --><!-- END ADMIN: OFFICES-SERVICES --><!-- END ADMIN: OFFICES-SERVICES -->
    
    <!-- ADMIN: FACULTY-STAFF --><!-- ADMIN: OFFICES-SERVICES --><!-- ADMIN: OFFICES-SERVICES -->
    <?php 
    if(isset($_POST['upd_img_faculty_staff']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="admin-faculty-staff-img/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_faculty_staff SET img='$final_file' WHERE personnel_id='$_GET[personnel_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Faculty & Staff image updated successfully.");
            window.location='administration-faculty-staff-cms.php';
            </script>
    
    <?php } ?>
    
    <!-- END ADMIN: OFFICES-SERVICES --><!-- END ADMIN: OFFICES-SERVICES --><!-- END ADMIN: OFFICES-SERVICES -->
    
    
    <!-- CAMPUS LIFE: CLUBS-ORGS --><!-- CAMPUS LIFE: CLUBS-ORGS --><!-- CAMPUS LIFE: CLUBS-ORGS -->
    <?php 
    if(isset($_POST['upd_img_club_org']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="camp-life/club-org/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_clubs_orgs SET img='$final_file' WHERE club_org_id='$_GET[club_org_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Clubs & Organizations image updated successfully.");
            window.location='camp-life-club-org-cms.php';
            </script>
    
    <?php } ?>
    
    
    
    <?php 
    if(isset($_POST['upd_img_co_album']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="camp-life/club-org-album/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_club_org_album SET cover_img='$final_file' WHERE album_id='$_GET[album_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Album cover image updated successfully.");
            window.location='camp-life-club-org-album.php?club_org_id=<?php echo $_GET['club_org_id']; ?>';
            </script>
    
    <?php } ?>
    
    <!-- END CAMPUS LIFE: CLUBS-ORGS --><!-- END CAMPUS LIFE: CLUBS-ORGS --><!-- END CAMPUS LIFE: CLUBS-ORGS -->
    
    
    <!-- CAMPUS LIFE: REL-FORM --><!-- CAMPUS LIFE: REL-FORM --><!-- CAMPUS LIFE: REL-FORM -->
    <?php 
    if(isset($_POST['upd_img_rf_album']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="camp-life/rel-form-album/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_album_rel_form SET cover_img='$final_file' WHERE rf_album_id='$_GET[rf_album_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Album cover image updated successfully.");
            window.location='camp-life-rel-formation-cms.php';
            </script>
    
    <?php } ?>
    
    <!-- END CAMPUS LIFE: REL-FORM --><!-- END CAMPUS LIFE: REL-FORM --><!-- END CAMPUS LIFE: REL-FORM -->
    

    <!-- CAMPUS LIFE: PHOTO-GALLERY --><!-- CAMPUS LIFE: PHOTO-GALLERY --><!-- CAMPUS LIFE: PHOTO-GALLERY -->
    <?php 
    if(isset($_POST['upd_img_pg_album']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="camp-life/photo-gallery-album/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "UPDATE tbl_album_gallery SET cover_img='$final_file' WHERE pg_album_id='$_GET[pg_album_id]'";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } ?>
    
            <script>
            window.alert("Album cover image updated successfully.");
            window.location='camp-life-photo-gallery-cms.php';
            </script>
    
    <?php } ?>
    
    <!-- END CAMPUS LIFE: PHOTO-GALLERY --><!-- END CAMPUS LIFE: PHOTO-GALLERY --><!-- END CAMPUS LIFE: PHOTO-GALLERY -->