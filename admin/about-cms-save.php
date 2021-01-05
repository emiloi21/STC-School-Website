    <?php include('session.php'); ?>
    
    
    <!-- FACILITIES --><!-- FACILITIES --><!-- FACILITIES -->
    <?php
    
    if(isset($_POST['add_facility']))
    {
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="about-facilities-img/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $title=addslashes($_POST['title']);
    $description=addslashes($_POST['description']);
    
    if($_FILES['file']['name']=="")
    {
        $saveNewFacility = "INSERT INTO tbl_facilities(img, title, description)VALUES('../img/nfc.png', '$title', '$description')";
        $conn->exec($saveNewFacility);
    
    }else{
        
        
    if(move_uploaded_file($file_loc,$folder.$final_file)){
    
    $final_file=$folder.$final_file;
    
    $saveNewFacility = "INSERT INTO tbl_facilities(img, title, description)VALUES('$final_file', '$title', '$description')";
    $conn->exec($saveNewFacility);
    
    }else{ ?>
        
        <script>
        window.alert("Error uploading image. Please try again.");
        </script> 
    
    <?php } } ?>

    <script>
    window.alert("Facility / Services added successfully.");
    window.location='about-facilities-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['edit_facility']))
    {
        $facility_id=$_POST['facility_id'];
      
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
        
        $conn->query("UPDATE tbl_facilities SET title='$title', description='$description' WHERE facility_id='$facility_id'");

    ?>
    
    <script>
    window.alert("Facility / Services updated successfully.");
    window.location='about-facilities-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_facility']))
    {
        $facility_id=$_POST['facility_id'];
        
        $conn->query("DELETE FROM tbl_facilities WHERE facility_id='$facility_id'");

    ?>
    
    <script>
    window.alert("Facility / Services deleted successfully.");
    window.location='about-facilities-cms.php';
    </script>
    
    <?php } ?>
    <!-- END FACILITIES --><!-- END FACILITIES --><!-- END FACILITIES -->
    
    
    
    <!-- ACCRED & AFFILIATES --><!-- ACCRED & AFFILIATES --><!-- ACCRED & AFFILIATES -->
    <?php
    
    if(isset($_POST['add_accred_affiliate']))
    {
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="about-accred-affiliate-img/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $title=addslashes($_POST['title']);
    $description=addslashes($_POST['description']);
    
    if($_FILES['file']['name']=="")
    {
        $saveNewFacility = "INSERT INTO tbl_accred_affiliate(img, title, description)VALUES('../img/nfc.png', '$title', '$description')";
        $conn->exec($saveNewFacility);
    
    }else{
        
        
    if(move_uploaded_file($file_loc,$folder.$final_file)){
    
    $final_file=$folder.$final_file;
    
    $saveNewFacility = "INSERT INTO tbl_accred_affiliate(img, title, description)VALUES('$final_file', '$title', '$description')";
    $conn->exec($saveNewFacility);
    
    }else{ ?>
        
        <script>
        window.alert("Error uploading image. Please try again.");
        </script> 
    
    <?php } } ?>

    <script>
    window.alert("Accreditations & Affiliations added successfully.");
    window.location='about-accred-affiliate-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['edit_accred_affiliate']))
    {
        $accred_affil_id=$_POST['accred_affil_id'];
      
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
        
        $conn->query("UPDATE tbl_accred_affiliate SET title='$title', description='$description' WHERE accred_affil_id='$accred_affil_id'");

    ?>
    
    <script>
    window.alert("Accreditations & Affiliations updated successfully.");
    window.location='about-accred-affiliate-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_accred_affiliate']))
    {
        $accred_affil_id=$_POST['accred_affil_id'];
        
        $conn->query("DELETE FROM tbl_accred_affiliate WHERE accred_affil_id='$accred_affil_id'");

    ?>
    
    <script>
    window.alert("Accreditations & Affiliations deleted successfully.");
    window.location='about-accred-affiliate-cms.php';
    </script>
    
    <?php } ?>
    <!-- END ACCRED & AFFILIATES --><!-- END ACCRED & AFFILIATES --><!-- END ACCRED & AFFILIATES -->