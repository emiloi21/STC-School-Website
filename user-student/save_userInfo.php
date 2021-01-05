    
    <?php include('session.php'); ?>
    
        <!-- SUBMIT APPLICATION -->
    <?php
    
    if(isset($_POST['submit_app'])){
        
        $updateStudent = 'UPDATE students SET status = :status WHERE user_id = :user_id';
        $conn->prepare($updateStudent)->execute(['status' => 'For Application Assessment', 'user_id' => $session_id]);
        
        $assessment_id=$_POST['assessment_id'];
        
        $conn->query("DELETE FROM tbl_student_assessments WHERE reg_id='$studData_row[reg_id]'");
        
        $checkAssPay_query = $conn->query("SELECT * FROM tbl_assessment_payables WHERE assessment_id='$assessment_id'") or die(mysql_error());
        while($assPayID_row=$checkAssPay_query->fetch())
        {
        
        $conn->query("INSERT INTO tbl_student_assessments(reg_id, assessment_id, assess_payable_id, category_id, total_amt_payable, total_amt_bal, schoolYear)
        VALUES('$studData_row[reg_id]', '$assessment_id', '$assPayID_row[assess_payable_id]', '$assPayID_row[category_id]', '$assPayID_row[total_amt_payable]', '$assPayID_row[total_amt_payable]', '$studData_row[schoolYear]')");
                
        }
        
        // Subject
        $subject = 'STC WEB PORTAL - ENROLLMENT';
        
        // Message
        $message = '
        <!DOCTYPE html>
        <html>
        <head>
        <style>
        p {
          border: 1px solid #e5eb0b;
          outline: #075907 solid 5px;
          margin: auto;  
          padding: 20px;
          background-color: #097609;
          color: white;
        }
        
        
        
        .btn {
          font-weight: 400;
          border: 1px solid transparent;
          padding: 0.55rem 0.75rem;
          font-size: 0.9rem;
          line-height: 1.5;
          border-radius: 0;
          -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
          transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
          transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
          transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        }
        
        
        .btn-success {
          color: color-yiq(#28a745);
          background-color: #28a745;
          border-color: white;
        }
        
        .btn-success:hover {
          color: color-yiq(#218838);
          background-color: #218838;
          border-color: white;
        }
        
        .btn-success:focus, .btn-success.focus {
          -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
        }
         
        .btn-success:not([disabled]):not(.disabled):active, .btn-success:not([disabled]):not(.disabled).active,
        .show > .btn-success.dropdown-toggle {
          color: color-yiq(#1e7e34);
          background-color: #1e7e34;
          border-color: #1c7430;
          -webkit-box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
          box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
        }
        
        </style>
        
        <title>Sta. Teresa College – SIS</title>
        
        </head>
        <body>
        <p style="text-align: center;">
        <img src="http://stcbauan.edu.ph/stc-edu/img/stc_logo.png" style="width: 5%; height: 5%;" /><br />
        <strong style="font-size: x-large;">STA. TERESA COLLEGE</strong><br />
        Bauan, Batangas<br /><br />
        STUDENT INFORMATION SYSTEM
        </p>
        
        <br />
        
        <p style="background-color: white; color: #075907;">
        
        Good Day!<br /><br />
        
        Please be informed that your application has already been received and currently being screened by the Registrar&#146;s Office.<br /><br />
                
        Please comply all admission requirements to proceed in the next enrollment procedure after requirements are validated by the Registrar&#146;s Office.<br /><br />
                
        <br />
        
        For inquiries, you can email us at <strong style="color: #097609;">admission@stcbauan.edu.ph</strong>.  You can also send your inquiries to our official <a href="https://www.facebook.com/OfficialStcBauan/" target="_blank" style="font-weight: bold; color: #097609;">Facebook</a> page.
      
        </p>
        
        </body>
        </html>
        ';
        
        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        
        // Additional headers
        $headers[] = 'To: '.$studData_row['fname'].' '.$studData_row['lname'].'<'.$studData_row['email'].'>';
        $headers[] = 'From: STA. TERESA COLLEGE <online@stcbauan.edu.ph>';
        
        // Mail it
        mail($studData_row['email'], $subject, $message, implode("\r\n", $headers));
    
    ?>
 
    <script>
    window.alert('Application submitted. Please wait for email/sms notifications for application assessment updates.');
    window.location='home.php';
    </script>
    
    <?php }  ?>
    <!-- END SUBMIT APPLICATION -->
    
    
    
    
    <!-- ELEMENTARY -->
    <?php
    
    if(isset($_POST['setCourseElem'])){
        
        $dept=$_POST['dept'];
        $lrn=$_POST['lrn'];
        $gradeLevel=$_POST['gradeLevel'];
        $strand=$_POST['strand'];
        $major=$_POST['major'];
        $classification=$_POST['classification'];
        
        $schoolYear=$activeSchoolYear;
        $sem="N/A";
        $appDate=$currentDate;
        $appTime=$currentTime;

        $updateStudent = 'UPDATE students SET lrn = :lrn, dept = :dept, gradeLevel = :gradeLevel, strand = :strand, major = :major, classification = :classification, schoolYear = :schoolYear, sem = :sem, appDate = :appDate, appTime = :appTime, assessment_id = :assessment_id WHERE user_id = :user_id';
        $conn->prepare($updateStudent)->execute(['lrn' => $lrn, 'dept' => $dept, 'gradeLevel' => $gradeLevel, 'strand' => $strand, 'major' => $major, 'classification' => $classification, 'schoolYear' => $schoolYear, 'sem' => $sem, 'appDate' => $appDate, 'appTime' => $appTime, 'assessment_id' => '0', 'user_id' => $session_id]);
        
        $updateAccount = 'UPDATE useraccount SET dept = :dept WHERE user_id = :user_id';
        $conn->prepare($updateAccount)->execute(['dept' => $dept, 'user_id' => $session_id]);
        
        /*if($studData_row['gradeLevel']!=$gradeLevel){
            
            $reqs_query = $conn->query("SELECT * FROM tbl_requirements WHERE dept='$studData_row[dept]' AND gradeLevel='$studData_row[gradeLevel]' AND strand='$studData_row[strand]' AND major='$studData_row[major]' AND classification='$studData_row[classification]'");
            while($reqs_row=$reqs_query->fetch()){
                
            $conn->query("INSERT INTO tbl_reqs_students(require_id, reg_id, student_id, purpose)
            VALUES('$reqs_row[require_id]', '$studData_row[reg_id]', '$studData_row[student_id]', '$reqs_row[purpose]')");
        
        }
        
        } */
        
    ?>
 
    <script>
    window.alert('Course set as <?php echo $gradeLevel; ?> for SY <?php echo $activeSchoolYear; ?>.');
    window.location='registration_form_elem.php';
    </script>
    
    <?php }  ?>
    
    <?php
    if(isset($_POST['updateInfoElem'])){
        
        $lname=addslashes(strtoupper($_POST['lname']));
        $fname=addslashes(strtoupper($_POST['fname']));
        $mname=addslashes(strtoupper($_POST['mname']));
        $suffix=$_POST['suffix'];
        $sex=$_POST['sex']; 
        $age=$_POST['age']; 
        
        $bdMM=$_POST['bdMM'];
        $bdDD=$_POST['bdDD'];
        $bdYYYY=$_POST['bdYYYY'];
        $birthPlace=$_POST['birthPlace'];
        $religion=$_POST['religion'];
        
        
        $address=addslashes($_POST['address']);
        $contact_num=$_POST['contact_num'];
        $email=$_POST['email'];
        
        $father_name=strtoupper($_POST['father_name']);
        $father_occupation=addslashes($_POST['father_occupation']);
        $father_address=addslashes($_POST['father_address']);
        $father_contact=$_POST['father_contact'];
        
        $mother_name=strtoupper($_POST['mother_name']);
        $mother_occupation=addslashes($_POST['mother_occupation']);
        $mother_address=addslashes($_POST['mother_address']);
        $mother_contact=$_POST['mother_contact'];
        
        $parents_email=$_POST['parents_email'];
        
        $guardian_name=strtoupper($_POST['guardian_name']);
        $guardian_contact=$_POST['guardian_contact'];
        $guardian_relation=$_POST['guardian_relation'];
        
        $last_school=strtoupper($_POST['last_school']);
        $last_school_sy=$_POST['last_school_sy'];
        $last_school_address=addslashes($_POST['last_school_address']);
        $last_school_type=$_POST['last_school_type'];
        
        $assessment_id=$_POST['assessment_id'];
        
        $updateStudent = 'UPDATE students SET 
        
        lname = :lname, 
        fname = :fname, 
        mname = :mname, 
        suffix = :suffix, 
        sex = :sex,
        age = :age,
        
        bdMM = :bdMM, 
        bdDD = :bdDD, 
        bdYYYY = :bdYYYY,
        birthPlace = :birthPlace,
        religion = :religion,
        
        address = :address,
        contact_num = :contact_num,
        email = :email,
        
        father_name = :father_name,
        father_occupation = :father_occupation,
        father_address = :father_address,
        father_contact = :father_contact,
        
        mother_name = :mother_name,
        mother_occupation = :mother_occupation,
        mother_address = :mother_address,
        mother_contact = :mother_contact,
        
        parents_email = :parents_email,
        
        guardian_name = :guardian_name,
        guardian_contact = :guardian_contact,
        guardian_relation = :guardian_relation,
        
        last_school = :last_school,
        last_school_sy = :last_school_sy,
        last_school_address = :last_school_address,
        last_school_type = :last_school_type,
        
        assessment_id = :assessment_id
        
        WHERE user_id = :user_id';
        
        $conn->prepare($updateStudent)->execute([
        
        'lname' => $lname,
        'fname' => $fname,
        'mname' => $mname,
        'suffix' => $suffix,
        'sex' => $sex,
        'age' => $age,
        
        'bdMM' => $bdMM,
        'bdDD' => $bdDD,
        'bdYYYY' => $bdYYYY,
        'birthPlace' => $birthPlace,
        'religion' => $religion,
        
        'address' => $address,
        'contact_num' => $contact_num,
        'email' => $email,
        
        'father_name' => $father_name,
        'father_occupation' => $father_occupation,
        'father_address' => $father_address,
        'father_contact' => $father_contact,
        
        'mother_name' => $mother_name,
        'mother_occupation' => $mother_occupation,
        'mother_address' => $mother_address,
        'mother_contact' => $mother_contact,
        
        'parents_email' => $parents_email,
        
        'guardian_name' => $guardian_name,
        'guardian_contact' => $guardian_contact,
        'guardian_relation' => $guardian_relation,
        
        'last_school' => $last_school,
        'last_school_sy' => $last_school_sy,
        'last_school_address' => $last_school_address,
        'last_school_type' => $last_school_type,
        
        'assessment_id' => $assessment_id,
        
        'user_id' => $session_id]);
        
        $updateAccount = 'UPDATE useraccount SET lname = :lname, fname = :fname WHERE user_id = :user_id';
        $conn->prepare($updateAccount)->execute(['lname' => $lname, 'fname' => $fname, 'user_id' => $session_id]);
        
    ?>
 
    <script>
    window.alert('Basic Profile information updated for SY <?php echo $activeSchoolYear; ?>.');
    window.location='registration_form_elem.php';
    </script>
    
    <?php }  ?>
    <!-- END ELEMENTARY -->
    
    
    <!-- JHS -->
    <?php
    if(isset($_POST['setCourseJHS'])){
        
        $dept=$_POST['dept'];
        $lrn=$_POST['lrn'];
        $gradeLevel=$_POST['gradeLevel'];
        $strand=$_POST['strand'];
        $major=$_POST['major'];
        $classification=$_POST['classification'];
        
        $schoolYear=$activeSchoolYear;
        $sem="N/A";
        $appDate=$currentDate;
        $appTime=$currentTime;
        
        $updateStudent = 'UPDATE students SET lrn = :lrn, dept = :dept, gradeLevel = :gradeLevel, strand = :strand, major = :major, classification = :classification, schoolYear = :schoolYear, sem = :sem, appDate = :appDate, appTime = :appTime, assessment_id = :assessment_id WHERE user_id = :user_id';
        $conn->prepare($updateStudent)->execute(['lrn' => $lrn, 'dept' => $dept, 'gradeLevel' => $gradeLevel, 'strand' => $strand, 'major' => $major, 'classification' => $classification, 'schoolYear' => $schoolYear, 'sem' => $sem, 'appDate' => $appDate, 'appTime' => $appTime, 'assessment_id' => '0', 'user_id' => $session_id]);
        
        $updateAccount = 'UPDATE useraccount SET dept = :dept WHERE user_id = :user_id';
        $conn->prepare($updateAccount)->execute(['dept' => $dept, 'user_id' => $session_id]);
        
    ?>
 
    <script>
    window.alert('Course set as <?php echo $gradeLevel; ?> for SY <?php echo $activeSchoolYear; ?>.');
    window.location='registration_form_jhs.php';
    </script>
    
    <?php }  ?>
    
    <?php
    if(isset($_POST['updateInfoJHS'])){
        
        $lname=addslashes(strtoupper($_POST['lname']));
        $fname=addslashes(strtoupper($_POST['fname']));
        $mname=addslashes(strtoupper($_POST['mname']));
        $suffix=$_POST['suffix'];
        $sex=$_POST['sex']; 
        $age=$_POST['age']; 
        
        $bdMM=$_POST['bdMM'];
        $bdDD=$_POST['bdDD'];
        $bdYYYY=$_POST['bdYYYY'];
        $birthPlace=$_POST['birthPlace'];
        $nationality=$_POST['nationality'];
        $religion=$_POST['religion'];
        
        
        $address=addslashes($_POST['address']);
        $contact_num=$_POST['contact_num'];
        $email=$_POST['email'];
        
        $father_name=strtoupper($_POST['father_name']);
        $father_occupation=addslashes($_POST['father_occupation']);
        $father_address=addslashes($_POST['father_address']);
        $father_contact=$_POST['father_contact'];
        
        $mother_name=strtoupper($_POST['mother_name']);
        $mother_occupation=addslashes($_POST['mother_occupation']);
        $mother_address=addslashes($_POST['mother_address']);
        $mother_contact=$_POST['mother_contact'];
        
        $parents_email=$_POST['parents_email'];
        
        $guardian_name=strtoupper($_POST['guardian_name']);
        $guardian_contact=$_POST['guardian_contact'];
        $guardian_relation=$_POST['guardian_relation'];
        
        $elem_last_school=strtoupper($_POST['elem_last_school']);
        $elem_last_school_sy=$_POST['elem_last_school_sy'];
        $elem_last_school_address=addslashes($_POST['elem_last_school_address']);
        $elem_last_school_type=$_POST['elem_last_school_type'];
        
        if($studData_row['classification']==='Transferee'){
            
        $jhs_last_school=strtoupper($_POST['jhs_last_school']);
        $jhs_last_school_sy=$_POST['jhs_last_school_sy'];
        $jhs_last_school_address=addslashes($_POST['jhs_last_school_address']);
        $jhs_last_school_type=$_POST['jhs_last_school_type'];
        
        }else{
            
        $jhs_last_school='-';
        $jhs_last_school_sy='-';
        $jhs_last_school_address='-';
        $jhs_last_school_type='-';
        
        }
        
        $assessment_id=$_POST['assessment_id'];
        
        $updateStudent = 'UPDATE students SET 
        
        lname = :lname, 
        fname = :fname, 
        mname = :mname, 
        suffix = :suffix, 
        sex = :sex,
        age = :age,
        
        bdMM = :bdMM, 
        bdDD = :bdDD, 
        bdYYYY = :bdYYYY,
        birthPlace = :birthPlace,
        nationality = :nationality,
        religion = :religion,
        
        address = :address,
        contact_num = :contact_num,
        email = :email,
        
        father_name = :father_name,
        father_occupation = :father_occupation,
        father_address = :father_address,
        father_contact = :father_contact,
        
        mother_name = :mother_name,
        mother_occupation = :mother_occupation,
        mother_address = :mother_address,
        mother_contact = :mother_contact,
        
        parents_email = :parents_email,
        
        guardian_name = :guardian_name,
        guardian_contact = :guardian_contact,
        guardian_relation = :guardian_relation,
        
        elem_last_school = :elem_last_school,
        elem_last_school_sy = :elem_last_school_sy,
        elem_last_school_address = :elem_last_school_address,
        elem_last_school_type = :elem_last_school_type,
        
        jhs_last_school = :jhs_last_school,
        jhs_last_school_sy = :jhs_last_school_sy,
        jhs_last_school_address = :jhs_last_school_address,
        jhs_last_school_type = :jhs_last_school_type,
        
        assessment_id = :assessment_id
        
        WHERE user_id = :user_id';
        
        $conn->prepare($updateStudent)->execute([
        
        'lname' => $lname,
        'fname' => $fname,
        'mname' => $mname,
        'suffix' => $suffix,
        'sex' => $sex,
        'age' => $age,
        
        'bdMM' => $bdMM,
        'bdDD' => $bdDD,
        'bdYYYY' => $bdYYYY,
        'birthPlace' => $birthPlace,
        'nationality' => $nationality,
        'religion' => $religion,
        
        'address' => $address,
        'contact_num' => $contact_num,
        'email' => $email,
        
        'father_name' => $father_name,
        'father_occupation' => $father_occupation,
        'father_address' => $father_address,
        'father_contact' => $father_contact,
        
        'mother_name' => $mother_name,
        'mother_occupation' => $mother_occupation,
        'mother_address' => $mother_address,
        'mother_contact' => $mother_contact,
        
        'parents_email' => $parents_email,
        
        'guardian_name' => $guardian_name,
        'guardian_contact' => $guardian_contact,
        'guardian_relation' => $guardian_relation,
        
        'elem_last_school' => $elem_last_school,
        'elem_last_school_sy' => $elem_last_school_sy,
        'elem_last_school_address' => $elem_last_school_address,
        'elem_last_school_type' => $elem_last_school_type,
        
        'jhs_last_school' => $jhs_last_school,
        'jhs_last_school_sy' => $jhs_last_school_sy,
        'jhs_last_school_address' => $jhs_last_school_address,
        'jhs_last_school_type' => $jhs_last_school_type,
        
        'assessment_id' => $assessment_id,
        
        'user_id' => $session_id]);
        
        $updateAccount = 'UPDATE useraccount SET lname = :lname, fname = :fname WHERE user_id = :user_id';
        $conn->prepare($updateAccount)->execute(['lname' => $lname, 'fname' => $fname, 'user_id' => $session_id]);
        
    ?>
 
    <script>
    window.alert('Basic Profile information updated for SY <?php echo $activeSchoolYear; ?>.');
    window.location='registration_form_jhs.php';
    </script>
    
    <?php }  ?>
    <!-- END JHS -->
    
    
    
    <!-- SHS -->
    <?php
    if(isset($_POST['setCourseSHS'])){
        
        $dept=$_POST['dept'];
        $lrn=$_POST['lrn'];
        $gradeLevel=$_POST['gradeLevel'];
        $strand=$_POST['strand'];
        $major=$_POST['major'];
        $classification=$_POST['classification'];
        $escGrantee=$_POST['escGrantee'];
        
        $schoolYear=$activeSchoolYear;
        $sem=$activeSemester;
        $appDate=$currentDate;
        $appTime=$currentTime;
        
        $updateStudent = 'UPDATE students SET lrn = :lrn, dept = :dept, gradeLevel = :gradeLevel, strand = :strand, major = :major, classification = :classification, schoolYear = :schoolYear, sem = :sem, appDate = :appDate, appTime = :appTime, assessment_id = :assessment_id WHERE user_id = :user_id';
        $conn->prepare($updateStudent)->execute(['lrn' => $lrn, 'dept' => $dept, 'gradeLevel' => $gradeLevel, 'strand' => $strand, 'major' => $major, 'classification' => $classification, 'schoolYear' => $schoolYear, 'sem' => $sem, 'appDate' => $appDate, 'appTime' => $appTime, 'assessment_id' => '0', 'user_id' => $session_id]);
        
        $updateAccount = 'UPDATE useraccount SET dept = :dept WHERE user_id = :user_id';
        $conn->prepare($updateAccount)->execute(['dept' => $dept, 'user_id' => $session_id]);
    ?>
 
    <script>
    window.alert('Course set as <?php echo $gradeLevel.' - '.$strand; ?> for SY <?php echo $activeSchoolYear.' - '.$activeSemester; ?>.');
    window.location='registration_form_shs.php';
    </script>
    
    <?php }  ?>
    
    <?php
    if(isset($_POST['updateInfoSHS'])){
        
        $lname=addslashes(strtoupper($_POST['lname']));
        $fname=addslashes(strtoupper($_POST['fname']));
        $mname=addslashes(strtoupper($_POST['mname']));
        $suffix=$_POST['suffix'];
        $sex=$_POST['sex']; 
        $age=$_POST['age']; 
        
        $bdMM=$_POST['bdMM'];
        $bdDD=$_POST['bdDD'];
        $bdYYYY=$_POST['bdYYYY'];
        $birthPlace=$_POST['birthPlace'];
        $nationality=$_POST['nationality'];
        $religion=$_POST['religion'];
        
        
        $address=addslashes($_POST['address']);
        $contact_num=$_POST['contact_num'];
        $email=$_POST['email'];
        
        $father_name=strtoupper($_POST['father_name']);
        $father_occupation=addslashes($_POST['father_occupation']);
        $father_address=addslashes($_POST['father_address']);
        $father_contact=$_POST['father_contact'];
        
        $mother_name=strtoupper($_POST['mother_name']);
        $mother_occupation=addslashes($_POST['mother_occupation']);
        $mother_address=addslashes($_POST['mother_address']);
        $mother_contact=$_POST['mother_contact'];
        
        $parents_email=$_POST['parents_email'];
        
        $guardian_name=strtoupper($_POST['guardian_name']);
        $guardian_contact=$_POST['guardian_contact'];
        $guardian_relation=$_POST['guardian_relation'];
        
        $elem_last_school=strtoupper($_POST['elem_last_school']);
        $elem_last_school_sy=$_POST['elem_last_school_sy'];
        $elem_last_school_address=addslashes($_POST['elem_last_school_address']);
        $elem_last_school_type=$_POST['elem_last_school_type'];
        
        $jhs_last_school=strtoupper($_POST['jhs_last_school']);
        $jhs_last_school_sy=$_POST['jhs_last_school_sy'];
        $jhs_last_school_address=addslashes($_POST['jhs_last_school_address']);
        $jhs_last_school_type=$_POST['jhs_last_school_type'];
        
        if($studData_row['classification']==='Transferee'){
            
        $shs_last_school=strtoupper($_POST['shs_last_school']);
        $shs_last_school_sy=$_POST['shs_last_school_sy'];
        $shs_last_school_address=addslashes($_POST['shs_last_school_address']);
        $shs_last_school_type=$_POST['shs_last_school_type'];
        
        }else{
            
        $shs_last_school='-';
        $shs_last_school_sy='-';
        $shs_last_school_address='-';
        $shs_last_school_type='-';
        
        }
        
        $assessment_id=$_POST['assessment_id'];
        
        $updateStudent = 'UPDATE students SET 
        
        lname = :lname, 
        fname = :fname, 
        mname = :mname, 
        suffix = :suffix, 
        sex = :sex,
        age = :age,
        
        bdMM = :bdMM, 
        bdDD = :bdDD, 
        bdYYYY = :bdYYYY,
        birthPlace = :birthPlace,
        nationality = :nationality,
        religion = :religion,
        
        address = :address,
        contact_num = :contact_num,
        email = :email,
        
        father_name = :father_name,
        father_occupation = :father_occupation,
        father_address = :father_address,
        father_contact = :father_contact,
        
        mother_name = :mother_name,
        mother_occupation = :mother_occupation,
        mother_address = :mother_address,
        mother_contact = :mother_contact,
        
        parents_email = :parents_email,
        
        guardian_name = :guardian_name,
        guardian_contact = :guardian_contact,
        guardian_relation = :guardian_relation,
        
        elem_last_school = :elem_last_school,
        elem_last_school_sy = :elem_last_school_sy,
        elem_last_school_address = :elem_last_school_address,
        elem_last_school_type = :elem_last_school_type,
        
        jhs_last_school = :jhs_last_school,
        jhs_last_school_sy = :jhs_last_school_sy,
        jhs_last_school_address = :jhs_last_school_address,
        jhs_last_school_type = :jhs_last_school_type,
        
        shs_last_school = :shs_last_school,
        shs_last_school_sy = :shs_last_school_sy,
        shs_last_school_address = :shs_last_school_address,
        shs_last_school_type = :shs_last_school_type,
        
        assessment_id = :assessment_id
        
        WHERE user_id = :user_id';
        
        $conn->prepare($updateStudent)->execute([
        
        'lname' => $lname,
        'fname' => $fname,
        'mname' => $mname,
        'suffix' => $suffix,
        'sex' => $sex,
        'age' => $age,
        
        'bdMM' => $bdMM,
        'bdDD' => $bdDD,
        'bdYYYY' => $bdYYYY,
        'birthPlace' => $birthPlace,
        'nationality' => $nationality,
        'religion' => $religion,
        
        'address' => $address,
        'contact_num' => $contact_num,
        'email' => $email,
        
        'father_name' => $father_name,
        'father_occupation' => $father_occupation,
        'father_address' => $father_address,
        'father_contact' => $father_contact,
        
        'mother_name' => $mother_name,
        'mother_occupation' => $mother_occupation,
        'mother_address' => $mother_address,
        'mother_contact' => $mother_contact,
        
        'parents_email' => $parents_email,
        
        'guardian_name' => $guardian_name,
        'guardian_contact' => $guardian_contact,
        'guardian_relation' => $guardian_relation,
        
        'elem_last_school' => $elem_last_school,
        'elem_last_school_sy' => $elem_last_school_sy,
        'elem_last_school_address' => $elem_last_school_address,
        'elem_last_school_type' => $elem_last_school_type,
        
        'jhs_last_school' => $jhs_last_school,
        'jhs_last_school_sy' => $jhs_last_school_sy,
        'jhs_last_school_address' => $jhs_last_school_address,
        'jhs_last_school_type' => $jhs_last_school_type,
        
        'shs_last_school' => $shs_last_school,
        'shs_last_school_sy' => $shs_last_school_sy,
        'shs_last_school_address' => $shs_last_school_address,
        'shs_last_school_type' => $shs_last_school_type,
        
        'assessment_id' => $assessment_id,
        
        'user_id' => $session_id]);
        
        
        $updateAccount = 'UPDATE useraccount SET lname = :lname, fname = :fname WHERE user_id = :user_id';
        $conn->prepare($updateAccount)->execute(['lname' => $lname, 'fname' => $fname, 'user_id' => $session_id]);
        
 
    ?>
 
    <script>
    window.alert('Basic Profile information updated for SY <?php echo $activeSchoolYear; ?>.');
    window.location='registration_form_shs.php';
    </script>
    
    <?php }  ?>
    <!-- END SHS -->
    
    
    
    <!-- COLLEGE -->
    <?php
    if(isset($_POST['setCourseCol'])){
        
        $dept=$_POST['dept'];
        $gradeLevel=$_POST['gradeLevel'];
        $strand=$_POST['strand'];
        $major=$_POST['major'];
        $classification=$_POST['classification'];
        
        $schoolYear=$activeSchoolYear;
        $sem=$activeSemester;
        $appDate=$currentDate;
        $appTime=$currentTime;
        
        $updateStudent = 'UPDATE students SET dept = :dept, gradeLevel = :gradeLevel, strand = :strand, major = :major, classification = :classification, schoolYear = :schoolYear, sem = :sem, appDate = :appDate, appTime = :appTime, assessment_id = :assessment_id WHERE user_id = :user_id';
        $conn->prepare($updateStudent)->execute(['dept' => $dept, 'gradeLevel' => $gradeLevel, 'strand' => $strand, 'major' => $major, 'classification' => $classification, 'schoolYear' => $schoolYear, 'sem' => $sem, 'appDate' => $appDate, 'appTime' => $appTime, 'assessment_id' => '0', 'user_id' => $session_id]);
        
        $updateAccount = 'UPDATE useraccount SET dept = :dept WHERE user_id = :user_id';
        $conn->prepare($updateAccount)->execute(['dept' => $dept, 'user_id' => $session_id]);
        
    ?>
 
    <script>
    window.alert('Course set as <?php echo $gradeLevel.' - '.$strand.' - '.$major; ?> for SY <?php echo $activeSchoolYear.' - '.$activeSemester; ?>.');
    window.location='registration_form_col.php';
    </script>
    
    <?php }  ?>
    
    <?php
    if(isset($_POST['updateInfoCol'])){
        
        $lname=addslashes(strtoupper($_POST['lname']));
        $fname=addslashes(strtoupper($_POST['fname']));
        $mname=addslashes(strtoupper($_POST['mname']));
        $suffix=$_POST['suffix'];
        $sex=$_POST['sex']; 
        $age=$_POST['age']; 
        
        $bdMM=$_POST['bdMM'];
        $bdDD=$_POST['bdDD'];
        $bdYYYY=$_POST['bdYYYY'];
        $birthPlace=$_POST['birthPlace'];
        $nationality=$_POST['nationality'];
        $civil_status=$_POST['civil_status'];
        $religion=$_POST['religion'];
        
        
        $address=addslashes($_POST['address']);
        $contact_num=$_POST['contact_num'];
        $email=$_POST['email'];
        
        $father_name=strtoupper($_POST['father_name']);
        $father_occupation=addslashes($_POST['father_occupation']);
        $father_address=addslashes($_POST['father_address']);
        $father_contact=$_POST['father_contact'];
        
        $mother_name=strtoupper($_POST['mother_name']);
        $mother_occupation=addslashes($_POST['mother_occupation']);
        $mother_address=addslashes($_POST['mother_address']);
        $mother_contact=$_POST['mother_contact'];
        
        $parents_email=$_POST['parents_email'];
        
        $guardian_name=strtoupper($_POST['guardian_name']);
        $guardian_contact=$_POST['guardian_contact'];
        $guardian_relation=$_POST['guardian_relation'];
        
        $elem_last_school=strtoupper($_POST['elem_last_school']);
        $elem_last_school_sy=$_POST['elem_last_school_sy'];
        $elem_last_school_address=addslashes($_POST['elem_last_school_address']);
        $elem_last_school_type=$_POST['elem_last_school_type'];
        
        $jhs_last_school=strtoupper($_POST['jhs_last_school']);
        $jhs_last_school_sy=$_POST['jhs_last_school_sy'];
        $jhs_last_school_address=addslashes($_POST['jhs_last_school_address']);
        $jhs_last_school_type=$_POST['jhs_last_school_type'];
        
        $shs_last_school=strtoupper($_POST['shs_last_school']);
        $shs_last_school_sy=$_POST['shs_last_school_sy'];
        $shs_last_school_address=addslashes($_POST['shs_last_school_address']);
        $shs_last_school_type=$_POST['shs_last_school_type'];
        
        if($studData_row['classification']==='Transferee'){
            
        $col_last_school=strtoupper($_POST['col_last_school']);
        $col_last_school_sy=$_POST['col_last_school_sy'];
        $col_last_school_address=addslashes($_POST['col_last_school_address']);
        $col_last_school_type=$_POST['col_last_school_type'];
        
        }else{
            
        $col_last_school='-';
        $col_last_school_sy='-';
        $col_last_school_address='-';
        $col_last_school_type='-';
        
        }
        
        $assessment_id=$_POST['assessment_id'];
        
        $updateStudent = 'UPDATE students SET 
        
        lname = :lname, 
        fname = :fname, 
        mname = :mname, 
        suffix = :suffix, 
        sex = :sex,
        age = :age,
        
        bdMM = :bdMM, 
        bdDD = :bdDD, 
        bdYYYY = :bdYYYY,
        birthPlace = :birthPlace,
        nationality = :nationality,
        civil_status = :civil_status,
        religion = :religion,
        
        address = :address,
        contact_num = :contact_num,
        email = :email,
        
        father_name = :father_name,
        father_occupation = :father_occupation,
        father_address = :father_address,
        father_contact = :father_contact,
        
        mother_name = :mother_name,
        mother_occupation = :mother_occupation,
        mother_address = :mother_address,
        mother_contact = :mother_contact,
        
        parents_email = :parents_email,
        
        guardian_name = :guardian_name,
        guardian_contact = :guardian_contact,
        guardian_relation = :guardian_relation,
        
        elem_last_school = :elem_last_school,
        elem_last_school_sy = :elem_last_school_sy,
        elem_last_school_address = :elem_last_school_address,
        elem_last_school_type = :elem_last_school_type,
        
        jhs_last_school = :jhs_last_school,
        jhs_last_school_sy = :jhs_last_school_sy,
        jhs_last_school_address = :jhs_last_school_address,
        jhs_last_school_type = :jhs_last_school_type,
        
        shs_last_school = :shs_last_school,
        shs_last_school_sy = :shs_last_school_sy,
        shs_last_school_address = :shs_last_school_address,
        shs_last_school_type = :shs_last_school_type,
        
        col_last_school = :col_last_school,
        col_last_school_sy = :col_last_school_sy,
        col_last_school_address = :col_last_school_address,
        col_last_school_type = :col_last_school_type,
        
        assessment_id = :assessment_id
        
        WHERE user_id = :user_id';
        
        $conn->prepare($updateStudent)->execute([
        
        'lname' => $lname,
        'fname' => $fname,
        'mname' => $mname,
        'suffix' => $suffix,
        'sex' => $sex,
        'age' => $age,
        
        'bdMM' => $bdMM,
        'bdDD' => $bdDD,
        'bdYYYY' => $bdYYYY,
        'birthPlace' => $birthPlace,
        'nationality' => $nationality,
        'civil_status' => $civil_status,
        'religion' => $religion,
        
        'address' => $address,
        'contact_num' => $contact_num,
        'email' => $email,
        
        'father_name' => $father_name,
        'father_occupation' => $father_occupation,
        'father_address' => $father_address,
        'father_contact' => $father_contact,
        
        'mother_name' => $mother_name,
        'mother_occupation' => $mother_occupation,
        'mother_address' => $mother_address,
        'mother_contact' => $mother_contact,
        
        'parents_email' => $parents_email,
        
        'guardian_name' => $guardian_name,
        'guardian_contact' => $guardian_contact,
        'guardian_relation' => $guardian_relation,
        
        'elem_last_school' => $elem_last_school,
        'elem_last_school_sy' => $elem_last_school_sy,
        'elem_last_school_address' => $elem_last_school_address,
        'elem_last_school_type' => $elem_last_school_type,
        
        'jhs_last_school' => $jhs_last_school,
        'jhs_last_school_sy' => $jhs_last_school_sy,
        'jhs_last_school_address' => $jhs_last_school_address,
        'jhs_last_school_type' => $jhs_last_school_type,
        
        'shs_last_school' => $shs_last_school,
        'shs_last_school_sy' => $shs_last_school_sy,
        'shs_last_school_address' => $shs_last_school_address,
        'shs_last_school_type' => $shs_last_school_type,
        
        'col_last_school' => $col_last_school,
        'col_last_school_sy' => $col_last_school_sy,
        'col_last_school_address' => $col_last_school_address,
        'col_last_school_type' => $col_last_school_type,
        
        'assessment_id' => $assessment_id,
        
        'user_id' => $session_id]);
        
        $updateAccount = 'UPDATE useraccount SET lname = :lname, fname = :fname WHERE user_id = :user_id';
        $conn->prepare($updateAccount)->execute(['lname' => $lname, 'fname' => $fname, 'user_id' => $session_id]);
 
    ?>
 
    <script>
    window.alert('Basic Profile information updated for SY <?php echo $activeSchoolYear; ?>.');
    window.location='registration_form_col.php';
    </script>
    
    <?php }  ?>
    <!-- END COLLEGE -->
 