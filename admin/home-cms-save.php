<?php include('session.php'); ?>

    
    <?php
    // SLIDES MANAGEMENT
    if(isset($_POST['add_slides']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="home-img/slides/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
     
        $title=addslashes($_POST['title']);
        $short_desc=addslashes($_POST['short_desc']);
        $long_desc=addslashes($_POST['long_desc']);
        
        if($_FILES['file']['name']=="")
        {
            $saveNewAnnouncement = "INSERT INTO tbl_home_slides(img, title, short_desc, long_desc, date_posted, time_posted, status)
            VALUES('../img/nfc.png', '$title', '$short_desc', '$long_desc', '$currentDate', '$currentTime', 'Display')";
            $conn->exec($saveNewAnnouncement);
        
        }else{
            
            
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "INSERT INTO tbl_home_slides(img, title, short_desc, long_desc, date_posted, time_posted, status)
            VALUES('$final_file', '$title', '$short_desc', '$long_desc', '$currentDate', '$currentTime', 'Display')";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } } ?>
    
            <script>
            window.alert("Slide added successfully.");
            window.location='home-cover-slides-cms.php';
            </script>
    
    <?php } ?>

    <?php 
    if(isset($_POST['edit_slides']))
    {
        $slide_id=$_POST['slide_id'];
      
        $title=addslashes($_POST['title']);
        $short_desc=addslashes($_POST['short_desc']);
        $long_desc=addslashes($_POST['long_desc']);
        
        $conn->query("UPDATE tbl_home_slides SET title='$title', short_desc='$short_desc', long_desc='$long_desc', date_posted='$currentDate', time_posted='$currentTime'  WHERE slide_id='$slide_id'");

    ?>
    
    <script>
    window.alert("Slide updated successfully.");
    window.location='home-cover-slides-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_slides']))
    {
        $slide_id=$_POST['slide_id'];
        
        $conn->query("DELETE FROM tbl_home_slides WHERE slide_id='$slide_id'");

    ?>
    
    <script>
    window.alert("Slide deleted successfully.");
    window.location='home-cover-slides-cms.php';
    </script>
    
    <?php } ?>
    
    
    <?php
    // ANNOUNCEMENT MANAGEMENT
    if(isset($_POST['add_announcement']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="home-img/announcements/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
     
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
    
        /*$date_timestamp = strtotime($_POST['details_date']);
        $details_date = date('m/d/Y', $date_timestamp);  
    
        $details_time=$_POST['details_time'];
        $details_venue=$_POST['details_venue'];*/
        
        if($_FILES['file']['name']=="")
        {
            $saveNewAnnouncement = "INSERT INTO tbl_announcements(img, title, description, date_posted, time_posted, status)
            VALUES('../img/nfc.png', '$title', '$description', '$currentDate', '$currentTime', 'Display')";
            $conn->exec($saveNewAnnouncement);
        
        }else{
            
            
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewAnnouncement = "INSERT INTO tbl_announcements(img, title, description, date_posted, time_posted, status)
            VALUES('$final_file', '$title', '$description', '$currentDate', '$currentTime', 'Display')";
            $conn->exec($saveNewAnnouncement);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } } ?>
    
            <script>
            window.alert("Announcement added successfully.");
            window.location='home-announcements-cms.php';
            </script>
    
    <?php } ?>

    <?php 
    if(isset($_POST['edit_announcement']))
    {
        $announce_id=$_POST['announce_id'];
      
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
    
        
        $conn->query("UPDATE tbl_announcements SET title='$title', description='$description', date_posted='$currentDate', time_posted='$currentTime'  WHERE announce_id='$announce_id'");

    ?>
    
    <script>
    window.alert("Announcement updated successfully.");
    window.location='home-announcements-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_announcement']))
    {
        $announce_id=$_POST['announce_id'];
        
        $conn->query("DELETE FROM tbl_announcements WHERE announce_id='$announce_id'");

    ?>
    
    <script>
    window.alert("Announcement deleted successfully.");
    window.location='home-announcements-cms.php';
    </script>
    
    <?php } ?>
    
    
    
    
    <?php 
    // EVENTS MANAGEMENT
    if(isset($_POST['add_event']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="home-img/events/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
     
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);

        
        if($_FILES['file']['name']=="")
        {
            $saveNewEvent = "INSERT INTO tbl_events(img, title, description, date_posted, time_posted, status)
            VALUES('../img/nfc.png', '$title', '$description', '$currentDate', '$currentTime', 'Display')";
            $conn->exec($saveNewEvent);
        
        }else{
            
            
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            $saveNewEvent = "INSERT INTO tbl_events(img, title, description, date_posted, time_posted, status)
            VALUES('$final_file', '$title', '$description', '$currentDate', '$currentTime', 'Display')";
            $conn->exec($saveNewEvent);
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } } ?>
    
            <script>
            window.alert("Event added successfully.");
            window.location='home-events-cms.php';
            </script>
    
    <?php } ?>

    <?php 
    if(isset($_POST['edit_event']))
    {
        $event_id=$_POST['event_id'];
      
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
    
        $date_timestamp = strtotime($_POST['details_date']);
        $details_date = date('m/d/Y', $date_timestamp);  
    
        $details_time=$_POST['details_time'];
        $details_venue=$_POST['details_venue'];
        
        $conn->query("UPDATE tbl_events SET title='$title', description='$description', date_posted='$currentDate', time_posted='$currentTime'  WHERE event_id='$event_id'");

    ?>
    
    <script>
    window.alert("Event updated successfully.");
    window.location='home-events-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_event']))
    {
        $event_id=$_POST['event_id'];
        
        $conn->query("DELETE FROM tbl_events WHERE event_id='$event_id'");

    ?>
    
    <script>
    window.alert("Event deleted successfully.");
    window.location='home-events-cms.php';
    </script>
    
    <?php } ?>
    
    
    
    
    <?php 
    if(isset($_POST['add_news']))
    {
        
        $file = rand(1000,9999)."-".$_FILES['file']['name'];
        
        $file_loc = $_FILES['file']['tmp_name'];
     
    	$folder="home-img/news/";
    	
    	// make file name in lower case
    	$new_file_name = strtolower($file);
    	// make file name in lower case
        
        
        $final_file=str_replace(' ','-',$new_file_name);
     
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
    
        //$date_timestamp = strtotime($_POST['details_date']);
        //$details_date = date('m/d/Y', $date_timestamp);  
    
        //$details_time=$_POST['details_time'];
        //$details_venue=$_POST['details_venue'];
        
        if($_FILES['file']['name']=="")
        {
            //$saveNewNews = "INSERT INTO tbl_news(img, title, description, details_date, details_time, details_venue, date_posted, time_posted, status)
            //VALUES('../img/nfc.png', '$title', '$description', '$details_date', '$details_time', '$details_venue', '$currentDate', '$currentTime', 'Display')";
            //$conn->exec($saveNewNews);
            
            $saveNewNews = "INSERT INTO tbl_news(img, title, description, date_posted, time_posted, status)
            VALUES('../img/nfc.png', '$title', '$description', '$currentDate', '$currentTime', 'Display')";
            $conn->exec($saveNewNews);
        
        }else{
            
            
        if(move_uploaded_file($file_loc,$folder.$final_file)){
            
            $final_file=$folder.$final_file;
            
            //$saveNewNews = "INSERT INTO tbl_news(img, title, description, details_date, details_time, details_venue, date_posted, time_posted, status)
            //VALUES('$final_file', '$title', '$description', '$details_date', '$details_time', '$details_venue', '$currentDate', '$currentTime', 'Display')";
            //$conn->exec($saveNewNews);
            
            $saveNewNews = "INSERT INTO tbl_news(img, title, description, date_posted, time_posted, status)
            VALUES('$final_file', '$title', '$description', '$currentDate', '$currentTime', 'Display')";
            $conn->exec($saveNewNews);
            
        
        }else{ ?>
            
            <script>
            window.alert("Error uploading image. Please try again.");
            </script> 
        
        <?php } } ?>
    
            <script>
            window.alert("News added successfully.");
            window.location='home-news-cms.php';
            </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['edit_news']))
    {
        $news_id=$_POST['news_id'];
      
        $title=addslashes($_POST['title']);
        $description=addslashes($_POST['description']);
    
        //$date_timestamp = strtotime($_POST['details_date']);
        //$details_date = date('m/d/Y', $date_timestamp);  
    
        //$details_time=$_POST['details_time'];
        //$details_venue=$_POST['details_venue'];
        
        //$conn->query("UPDATE tbl_news SET title='$title', description='$description', details_date='$details_date', details_time='$details_time', details_venue='$details_venue', date_posted='$currentDate', time_posted='$currentTime'  WHERE news_id='$news_id'");
        
        $conn->query("UPDATE tbl_news SET title='$title', description='$description', date_posted='$currentDate', time_posted='$currentTime'  WHERE news_id='$news_id'");

    ?>
    
    <script>
    window.alert("News updated successfully.");
    window.location='home-news-cms.php';
    </script>
    
    <?php } ?>
    
    <?php 
    if(isset($_POST['del_news']))
    {
        $news_id=$_POST['news_id'];
        
        $conn->query("DELETE FROM tbl_news WHERE news_id='$news_id'");

    ?>
    
    <script>
    window.alert("News deleted successfully.");
    window.location='home-news-cms.php';
    </script>
    
    <?php } ?>
 
