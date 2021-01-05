    <?php include('session.php'); ?>
    
    
    <!-- OFFICES-SERVICES --><!-- OFFICES-SERVICES --><!-- OFFICES-SERVICES -->
    <?php
    
    if(isset($_POST['add_office_services']))
    {
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="admin-office-service-img/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $title=addslashes($_POST['title']);
    $description=addslashes($_POST['description']);
    
    if($_FILES['file']['name']=="")
    {
        $saveNewFacility = "INSERT INTO tbl_offices_services(img, title, description)VALUES('../img/nfc.png', '$title', '$description')";
        $conn->exec($saveNewFacility);
    
    }else{
        
        
    if(move_uploaded_file($file_loc,$folder.$final_file)){
    
    $final_file=$folder.$final_file;
    
    $saveNewFacility = "INSERT INTO tbl_offices_services(img, title, description)VALUES('$final_file', '$title', '$description')";
    $conn->exec($saveNewFacility);
    
    }else{ ?>
        
        <script>
        window.alert("Error uploading image. Please try again.");
        </script> 
    
    <?php } } ?>

    <script>
    window.alert("Offices & Services added successfully.");
    window.location='administration-offices-services-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['edit_office_services']))
    {
        $office_service_id=$_POST['office_service_id'];
      
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
        
        $conn->query("UPDATE tbl_offices_services SET title='$title', description='$description' WHERE office_service_id='$office_service_id'");

    ?>
    
    <script>
    window.alert("Offices & Services updated successfully.");
    window.location='administration-offices-services-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_office_services']))
    {
        $office_service_id=$_POST['office_service_id'];
        
        $conn->query("DELETE FROM tbl_offices_services WHERE office_service_id='$office_service_id'");

    ?>
    
    <script>
    window.alert("Offices & Services deleted successfully.");
    window.location='administration-offices-services-cms.php';
    </script>
    
    <?php } ?>
    <!-- END OFFICES-SERVICES --><!-- END OFFICES-SERVICES --><!-- END OFFICES-SERVICES -->
    
    
    
    
    <!-- FACULTY-STAFF --><!-- FACULTY-STAFF --><!-- FACULTY-STAFF -->
    <?php
    
    if(isset($_POST['add_faculty_staff']))
    {
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="admin-faculty-staff-img/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $fullname=addslashes($_POST['fullname']);
    $description=addslashes($_POST['description']);
    $classification=$_POST['classification'];
    
    if($_FILES['file']['name']=="")
    {
        $saveNewFacility = "INSERT INTO tbl_faculty_staff(img, fullname, description, classification)VALUES('../img/nfc.png', '$fullname', '$description', '$classification')";
        $conn->exec($saveNewFacility);
    
    }else{
        
        
    if(move_uploaded_file($file_loc,$folder.$final_file)){
    
    $final_file=$folder.$final_file;
    
    $saveNewFacility = "INSERT INTO tbl_faculty_staff(img, fullname, description, classification)VALUES('$final_file', '$fullname', '$description', '$classification')";
    $conn->exec($saveNewFacility);
    
    }else{ ?>
        
        <script>
        window.alert("Error uploading image. Please try again.");
        </script> 
    
    <?php } } ?>

    <script>
    window.alert("Faculty & Staff added successfully.");
    window.location='administration-faculty-staff-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['edit_faculty_staff']))
    {
        $personnel_id=$_POST['personnel_id'];
      
        $fullname=addslashes($_POST['fullname']);
        $description=addslashes($_POST['description']);
        $classification=$_POST['classification'];
        
        $conn->query("UPDATE tbl_faculty_staff SET fullname='$fullname', description='$description', classification='$classification' WHERE personnel_id='$personnel_id'");

    ?>
    
    <script>
    window.alert("Faculty & Staff updated successfully.");
    window.location='administration-faculty-staff-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_faculty_staff']))
    {
        $personnel_id=$_POST['personnel_id'];
        
        $conn->query("DELETE FROM tbl_faculty_staff WHERE personnel_id='$personnel_id'");

    ?>
    
    <script>
    window.alert("Faculty & Staff deleted successfully.");
    window.location='administration-faculty-staff-cms.php';
    </script>
    
    <?php } ?>
    <!-- END FACULTY-STAFF --><!-- END FACULTY-STAFF --><!-- END FACULTY-STAFF -->
    
    