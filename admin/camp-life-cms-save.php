    <?php include('session.php'); ?>
    
    
    <!-- CLUB-ORG --><!-- CLUB-ORG --><!-- CLUB-ORG -->
    <?php
    
    if(isset($_POST['add_club_org']))
    {
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="camp-life/club-org/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $title=addslashes($_POST['title']);
    $description=addslashes($_POST['description']);
    
    if($_FILES['file']['name']=="")
    {
        $saveNewFacility = "INSERT INTO tbl_clubs_orgs(img, title, description)VALUES('../img/nfc.png', '$title', '$description')";
        $conn->exec($saveNewFacility);
    
    }else{
        
        
    if(move_uploaded_file($file_loc,$folder.$final_file)){
    
    $final_file=$folder.$final_file;
    
    $saveNewFacility = "INSERT INTO tbl_clubs_orgs(img, title, description)VALUES('$final_file', '$title', '$description')";
    $conn->exec($saveNewFacility);
    
    }else{ ?>
        
        <script>
        window.alert("Error uploading image. Please try again.");
        </script> 
    
    <?php } } ?>

    <script>
    window.alert("Clubs & Organizations added successfully.");
    window.location='camp-life-club-org-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['edit_club_org']))
    {
        $club_org_id=$_POST['club_org_id'];
      
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
        
        $conn->query("UPDATE tbl_clubs_orgs SET title='$title', description='$description' WHERE club_org_id='$club_org_id'");

    ?>
    
    <script>
    window.alert("Clubs & Organizations updated successfully.");
    window.location='camp-life-club-org-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_club_org']))
    {
        $club_org_id=$_POST['club_org_id'];
        
        $conn->query("DELETE FROM tbl_clubs_orgs WHERE club_org_id='$club_org_id'");

    ?>
    
    <script>
    window.alert("Clubs & Organizations deleted successfully.");
    window.location='camp-life-club-org-cms.php';
    </script>
    
    <?php } ?>
    <!-- END CLUB-ORG --><!-- END CLUB-ORG --><!-- END CLUB-ORG -->
    
    
    
    <!-- CLUB-ORG ALBUM --><!-- CLUB-ORG ALBUM --><!-- CLUB-ORG ALBUM -->
    <?php
    
    if(isset($_POST['add_co_album']))
    {
    
    $club_org_id=$_GET['club_org_id'];
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="camp-life/club-org-album/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $title=addslashes($_POST['title']);
    $description=addslashes($_POST['description']);
    
    if($_FILES['file']['name']=="")
    {
        $saveNewFacility = "INSERT INTO tbl_club_org_album(club_org_id, cover_img, title, description)VALUES('$club_org_id', '../img/nfc.png', '$title', '$description')";
        $conn->exec($saveNewFacility);
    
    }else{
        
        
    if(move_uploaded_file($file_loc,$folder.$final_file)){
    
    $final_file=$folder.$final_file;
    
    $saveNewFacility = "INSERT INTO tbl_club_org_album(club_org_id, cover_img, title, description)VALUES('$club_org_id', '$final_file', '$title', '$description')";
    $conn->exec($saveNewFacility);
    
    }else{ ?>
        
        <script>
        window.alert("Error uploading image. Please try again.");
        </script> 
    
    <?php } } ?>

    <script>
    window.alert("Album added successfully.");
    window.location='camp-life-club-org-album.php?club_org_id=<?php echo $club_org_id; ?>&club_name=<?php echo $_GET['club_name']; ?>';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['edit_co_album']))
    {
        $album_id=$_POST['album_id'];
      
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
        
        $conn->query("UPDATE tbl_club_org_album SET title='$title', description='$description' WHERE album_id='$album_id'");

    ?>
    
    <script>
    window.alert("Album updated successfully.");
    window.location='camp-life-club-org-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_co_album']))
    {
        $album_id=$_POST['album_id'];
        
        $conn->query("DELETE FROM tbl_club_org_album WHERE club_org_id='$album_id'");

    ?>
    
    <script>
    window.alert("Album deleted successfully.");
    window.location='camp-life-club-org-cms.php';
    </script>
    
    <?php } ?>
    <!-- END CLUB-ORG ALBUM --><!-- END CLUB-ORG ALBUM --><!-- END CLUB-ORG ALBUM -->
    
    
    <!-- CLUB-ORG ALBUM IMG --> <!-- CLUB-ORG ALBUM IMG --> <!-- CLUB-ORG ALBUM IMG -->
    <?php if(isset($_POST['bulkDeleteImages'])) { 

    $delcheckbox = $_POST['delcheckbox'];

    for($i=0;$i<count($delcheckbox);$i++)
    {
    
    $conn->query("DELETE FROM tbl_club_org_album_img WHERE img_id='$delcheckbox[$i]'");
    
    }
    ?>
      
    <script>
    window.alert('<?php echo $i; ?> photos deleted successfully...');
    window.location='camp-life-club-org-album-img.php?club_org_id=<?php echo $_GET['club_org_id']; ?>&album_id=<?php echo $_GET['album_id']; ?>';
    </script>
      
    <?php } ?>
    <!-- END CLUB-ORG ALBUM IMG --> <!-- END CLUB-ORG ALBUM IMG --> <!-- END CLUB-ORG ALBUM IMG -->
    
    
    
    
    <!-- REL-FORMATION ALBUM --><!-- REL-FORMATION ALBUM --><!-- REL-FORMATION ALBUM -->
    <?php
    
    if(isset($_POST['add_rel_form_album']))
    {
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="camp-life/rel-form-album/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $title=addslashes($_POST['title']);
    $description=addslashes($_POST['description']);
    
    if($_FILES['file']['name']=="")
    {
        $saveNewFacility = "INSERT INTO tbl_album_rel_form(cover_img, title, description)VALUES('../img/nfc.png', '$title', '$description')";
        $conn->exec($saveNewFacility);
    
    }else{
        
        
    if(move_uploaded_file($file_loc,$folder.$final_file)){
    
    $final_file=$folder.$final_file;
    
    $saveNewFacility = "INSERT INTO tbl_album_rel_form(cover_img, title, description)VALUES('$final_file', '$title', '$description')";
    $conn->exec($saveNewFacility);
    
    }else{ ?>
        
        <script>
        window.alert("Error uploading image. Please try again.");
        </script> 
    
    <?php } } ?>

    <script>
    window.alert("Album added successfully.");
    window.location='camp-life-rel-formation-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['edit_rel_form_album']))
    {
        $rf_album_id=$_POST['rf_album_id'];
      
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
        
        $conn->query("UPDATE tbl_album_rel_form SET title='$title', description='$description' WHERE rf_album_id='$rf_album_id'");

    ?>
    
    <script>
    window.alert("Album updated successfully.");
    window.location='camp-life-rel-formation-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_rel_form_album']))
    {
        $rf_album_id=$_POST['rf_album_id'];
        
        $conn->query("DELETE FROM tbl_album_rel_form WHERE rf_album_id='$rf_album_id'");

    ?>
    
    <script>
    window.alert("Album deleted successfully.");
    window.location='camp-life-rel-formation-cms.php';
    </script>
    
    <?php } ?>
    <!-- END REL-FORMATION ALBUM --><!-- END REL-FORMATION ALBUM --><!-- END REL-FORMATION ALBUM -->
    
    
    <!-- REL-FORMATION ALBUM IMG --> <!-- REL-FORMATION ALBUM IMG --> <!-- REL-FORMATION ALBUM IMG -->
    <?php if(isset($_POST['rf_bulkDeleteImages'])) { 

    $delcheckbox = $_POST['delcheckbox'];

    for($i=0;$i<count($delcheckbox);$i++)
    {
    
    $conn->query("DELETE FROM tbl_album_rel_form_img WHERE img_id='$delcheckbox[$i]'");
    
    }
    ?>
      
    <script>
    window.alert('<?php echo $i; ?> photos deleted successfully...');
    window.location='camp-life-rel-formation-img.php?rf_album_id=<?php echo $_GET['rf_album_id']; ?>';
    </script>
      
    <?php } ?>
    <!-- END REL-FORMATION ALBUM IMG --> <!-- END REL-FORMATION ALBUM IMG --> <!-- END REL-FORMATION ALBUM IMG -->
    



    <!-- PHOTO-GALLERY ALBUM --><!-- PHOTO-GALLERY ALBUM --><!-- PHOTO-GALLERY ALBUM -->
    <?php
    
    if(isset($_POST['add_gallery_album']))
    {
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="camp-life/photo-gallery-album/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $title=addslashes($_POST['title']);
    $description=addslashes($_POST['description']);
    
    if($_FILES['file']['name']=="")
    {
        $saveNewFacility = "INSERT INTO tbl_album_gallery(cover_img, title, description)VALUES('../img/nfc.png', '$title', '$description')";
        $conn->exec($saveNewFacility);
    
    }else{
        
        
    if(move_uploaded_file($file_loc,$folder.$final_file)){
    
    $final_file=$folder.$final_file;
    
    $saveNewFacility = "INSERT INTO tbl_album_gallery(cover_img, title, description)VALUES('$final_file', '$title', '$description')";
    $conn->exec($saveNewFacility);
    
    }else{ ?>
        
        <script>
        window.alert("Error uploading image. Please try again.");
        </script> 
    
    <?php } } ?>

    <script>
    window.alert("Album added successfully.");
    window.location='camp-life-photo-gallery-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['edit_gallery_album']))
    {
        $pg_album_id=$_POST['pg_album_id'];
      
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
        
        $conn->query("UPDATE tbl_album_gallery SET title='$title', description='$description' WHERE pg_album_id='$pg_album_id'");

    ?>
    
    <script>
    window.alert("Album updated successfully.");
    window.location='camp-life-photo-gallery-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_gallery_album']))
    {
        $pg_album_id=$_POST['pg_album_id'];
        
        $conn->query("DELETE FROM tbl_album_gallery WHERE pg_album_id='$pg_album_id'");

    ?>
    
    <script>
    window.alert("Album deleted successfully.");
    window.location='camp-life-photo-gallery-cms.php';
    </script>
    
    <?php } ?>
    <!-- END PHOTO-GALLERY ALBUM --><!-- END PHOTO-GALLERY ALBUM --><!-- END PHOTO-GALLERY ALBUM -->
    
    
    <!-- PHOTO-GALLERY ALBUM IMG --> <!-- PHOTO-GALLERY ALBUM IMG --> <!-- PHOTO-GALLERY ALBUM IMG -->
    <?php if(isset($_POST['pg_bulkDeleteImages'])) { 

    $delcheckbox = $_POST['delcheckbox'];

    for($i=0;$i<count($delcheckbox);$i++)
    {
    
    $conn->query("DELETE FROM tbl_album_gallery_img WHERE img_id='$delcheckbox[$i]'");
    
    }
    ?>
      
    <script>
    window.alert('<?php echo $i; ?> photos deleted successfully...');
    window.location='camp-life-photo-gallery-img.php?pg_album_id=<?php echo $_GET['pg_album_id']; ?>';
    </script>
      
    <?php } ?>
    <!-- END PHOTO-GALLERY ALBUM IMG --> <!-- END PHOTO-GALLERY ALBUM IMG --> <!-- END PHOTO-GALLERY ALBUM IMG -->