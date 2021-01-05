    
    <?php include('session.php'); ?>
    
    <!-- UPDATE STUDENT INFORMATION - APPLICANTS -->
    
    <?php
    
    $studData_query = $conn->query("SELECT * FROM students WHERE reg_id='$_GET[regx_id]'") or die(mysql_error());
    $studData_row=$studData_query->fetch();
    
    if(isset($_POST['updateStudInfo'])){
        
        $lname=addslashes(strtoupper($_POST['lname']));
        $fname=addslashes(strtoupper($_POST['fname']));
        $mname=addslashes(strtoupper($_POST['mname']));
        $suffix=$_POST['suffix'];
        $sex=$_POST['sex'];
        
        //2020-06-28
        $bdMM=substr($_POST['birthdate'], 5, 2);
        $bdDD=substr($_POST['birthdate'], 8,2);
        $bdYYYY=substr($_POST['birthdate'], 0,4);
        
        $dateOfBirth = $_POST['birthdate'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $age=$diff->format('%y');
        
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
        
        
        
        //GRADE SCHOOL//
        if($studData_row['dept']==='Grade School'){
            
            if($studData_row['gradeLevel']==='Nursery' OR $studData_row['gradeLevel']==='Preparatory' OR $studData_row['gradeLevel']==='Kinder'){
                
                $last_school="Sta. Teresa College";
                $last_school_sy=$activeSchoolYear;
                $last_school_address="Bauan, Batangas";
                $last_school_type="Private";
                
                $elem_last_school="N/A";
                $elem_last_school_sy="N/A";
                $elem_last_school_address="N/A";
                $elem_last_school_type="N/A";
                
                $jhs_last_school="N/A";
                $jhs_last_school_sy="N/A";
                $jhs_last_school_address="N/A";
                $jhs_last_school_type="N/A";
                
                $shs_last_school="N/A";
                $shs_last_school_sy="N/A";
                $shs_last_school_address="N/A";
                $shs_last_school_type="N/A";
                
                $col_last_school="N/A";
                $col_last_school_sy="N/A";
                $col_last_school_address="N/A";
                $col_last_school_type="N/A";
                
            }elseif($studData_row['gradeLevel']==='Grade 1'){
                
                $last_school=strtoupper($_POST['last_school']);
                $last_school_sy=$_POST['last_school_sy'];
                $last_school_address=addslashes($_POST['last_school_address']);
                $last_school_type=$_POST['last_school_type'];
                
                $elem_last_school="Sta. Teresa College";
                $elem_last_school_sy=$activeSchoolYear;
                $elem_last_school_address="Bauan, Batangas";
                $elem_last_school_type="Private";
                
                $jhs_last_school="N/A";
                $jhs_last_school_sy="N/A";
                $jhs_last_school_address="N/A";
                $jhs_last_school_type="N/A";
                
                $shs_last_school="N/A";
                $shs_last_school_sy="N/A";
                $shs_last_school_address="N/A";
                $shs_last_school_type="N/A";
                
                $col_last_school="N/A";
                $col_last_school_sy="N/A";
                $col_last_school_address="N/A";
                $col_last_school_type="N/A";
                
            }
            
            //OLD STUDENT   //OLD STUDENT   //OLD STUDENT
            if($studData_row['classification']==='Old' AND ($studData_row['gradeLevel']==='Preparatory' OR $studData_row['gradeLevel']==='Kinder')){
                
                $last_school=strtoupper($_POST['last_school']);
                $last_school_sy=$_POST['last_school_sy'];
                $last_school_address=addslashes($_POST['last_school_address']);
                $last_school_type=$_POST['last_school_type'];
                
                $elem_last_school="N/A";
                $elem_last_school_sy="N/A";
                $elem_last_school_address="N/A";
                $elem_last_school_type="N/A";
                
                $jhs_last_school="N/A";
                $jhs_last_school_sy="N/A";
                $jhs_last_school_address="N/A";
                $jhs_last_school_type="N/A";
                
                $shs_last_school="N/A";
                $shs_last_school_sy="N/A";
                $shs_last_school_address="N/A";
                $shs_last_school_type="N/A";
                
                $col_last_school="N/A";
                $col_last_school_sy="N/A";
                $col_last_school_address="N/A";
                $col_last_school_type="N/A";
                
            }elseif($studData_row['classification']==='Old' AND ($studData_row['gradeLevel']==='Grade 2' OR $studData_row['gradeLevel']==='Grade 3' OR $studData_row['gradeLevel']==='Grade 4' OR $studData_row['gradeLevel']==='Grade 5' OR $studData_row['gradeLevel']==='Grade 6')){
                $last_school=strtoupper($_POST['last_school']);
                $last_school_sy=$_POST['last_school_sy'];
                $last_school_address=addslashes($_POST['last_school_address']);
                $last_school_type=$_POST['last_school_type'];
                
                $elem_last_school=$studData_row['elem_last_school'];
                $elem_last_school_sy=$studData_row['elem_last_school_sy'];
                $elem_last_school_address=$studData_row['elem_last_school_address'];
                $elem_last_school_type=$studData_row['elem_last_school_type'];
                
                $jhs_last_school="N/A";
                $jhs_last_school_sy="N/A";
                $jhs_last_school_address="N/A";
                $jhs_last_school_type="N/A";
                
                $shs_last_school="N/A";
                $shs_last_school_sy="N/A";
                $shs_last_school_address="N/A";
                $shs_last_school_type="N/A";
                
                $col_last_school="N/A";
                $col_last_school_sy="N/A";
                $col_last_school_address="N/A";
                $col_last_school_type="N/A";
            }
            //OLD STUDENT   //OLD STUDENT   //OLD STUDENT
            
            //TRANSFEREE    //TRANSFEREE    //TRANSFEREE
            if($studData_row['classification']==='Transferee' AND ($studData_row['gradeLevel']==='Preparatory' OR $studData_row['gradeLevel']==='Kinder')){
                
                $last_school=strtoupper($_POST['last_school']);
                $last_school_sy=$_POST['last_school_sy'];
                $last_school_address=addslashes($_POST['last_school_address']);
                $last_school_type=$_POST['last_school_type'];
                
                $elem_last_school="N/A";
                $elem_last_school_sy="N/A";
                $elem_last_school_address="N/A";
                $elem_last_school_type="N/A";
                
                $jhs_last_school="N/A";
                $jhs_last_school_sy="N/A";
                $jhs_last_school_address="N/A";
                $jhs_last_school_type="N/A";
                
                $shs_last_school="N/A";
                $shs_last_school_sy="N/A";
                $shs_last_school_address="N/A";
                $shs_last_school_type="N/A";
                
                $col_last_school="N/A";
                $col_last_school_sy="N/A";
                $col_last_school_address="N/A";
                $col_last_school_type="N/A";
                
            }elseif($studData_row['classification']==='Transferee' AND ($studData_row['gradeLevel']==='Grade 2' OR $studData_row['gradeLevel']==='Grade 3' OR $studData_row['gradeLevel']==='Grade 4' OR $studData_row['gradeLevel']==='Grade 5' OR $studData_row['gradeLevel']==='Grade 6')){
                $last_school=strtoupper($_POST['last_school']);
                $last_school_sy=$_POST['last_school_sy'];
                $last_school_address=addslashes($_POST['last_school_address']);
                $last_school_type=$_POST['last_school_type'];
                
                $elem_last_school=strtoupper($_POST['elem_last_school']);
                $elem_last_school_sy=$_POST['elem_last_school_sy'];
                $elem_last_school_address=addslashes($_POST['elem_last_school_address']);
                $elem_last_school_type=$_POST['elem_last_school_type'];
                
                $jhs_last_school="N/A";
                $jhs_last_school_sy="N/A";
                $jhs_last_school_address="N/A";
                $jhs_last_school_type="N/A";
                
                $shs_last_school="N/A";
                $shs_last_school_sy="N/A";
                $shs_last_school_address="N/A";
                $shs_last_school_type="N/A";
                
                $col_last_school="N/A";
                $col_last_school_sy="N/A";
                $col_last_school_address="N/A";
                $col_last_school_type="N/A";
            }
            
        }
                    
        
        //JUNIOR HIGH SCHOOL//
        if($studData_row['dept']==='Junior High School'){
            
            if($studData_row['classification']==='Transferee'){
            
            $last_school="N/A";
            $last_school_sy="N/A";
            $last_school_address="N/A";
            $last_school_type="N/A";
                
            $elem_last_school=strtoupper($_POST['elem_last_school']);
            $elem_last_school_sy=$_POST['elem_last_school_sy'];
            $elem_last_school_address=addslashes($_POST['elem_last_school_address']);
            $elem_last_school_type=$_POST['elem_last_school_type'];
            
            $jhs_last_school=strtoupper($_POST['jhs_last_school']);
            $jhs_last_school_sy=$_POST['jhs_last_school_sy'];
            $jhs_last_school_address=addslashes($_POST['jhs_last_school_address']);
            $jhs_last_school_type=$_POST['jhs_last_school_type'];
            
            $shs_last_school="N/A";
            $shs_last_school_sy="N/A";
            $shs_last_school_address="N/A";
            $shs_last_school_type="N/A";
                
            $col_last_school="N/A";
            $col_last_school_sy="N/A";
            $col_last_school_address="N/A";
            $col_last_school_type="N/A";
                
            }else{
            $last_school="N/A";
            $last_school_sy="N/A";
            $last_school_address="N/A";
            $last_school_type="N/A";
            
            $elem_last_school=strtoupper($_POST['elem_last_school']);
            $elem_last_school_sy=$_POST['elem_last_school_sy'];
            $elem_last_school_address=addslashes($_POST['elem_last_school_address']);
            $elem_last_school_type=$_POST['elem_last_school_type'];
            
            $jhs_last_school="Sta. Teresa College";
            $jhs_last_school_sy=$activeSchoolYear;
            $jhs_last_school_address="Bauan, Batangas";
            $jhs_last_school_type="Private";
            
            $shs_last_school="N/A";
            $shs_last_school_sy="N/A";
            $shs_last_school_address="N/A";
            $shs_last_school_type="N/A";
                
            $col_last_school="N/A";
            $col_last_school_sy="N/A";
            $col_last_school_address="N/A";
            $col_last_school_type="N/A";
            }
        }
        
        
        //SENIOR HIGH SCHOOL//
        if($studData_row['dept']==='Senior High School'){
            if($studData_row['classification']==='Transferee'){
            
            $last_school="N/A";
            $last_school_sy="N/A";
            $last_school_address="N/A";
            $last_school_type="N/A";
            
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
                
            $col_last_school="N/A";
            $col_last_school_sy="N/A";
            $col_last_school_address="N/A";
            $col_last_school_type="N/A";
                
            }else{
            
            $last_school="N/A";
            $last_school_sy="N/A";
            $last_school_address="N/A";
            $last_school_type="N/A";
            
            $elem_last_school=strtoupper($_POST['elem_last_school']);
            $elem_last_school_sy=$_POST['elem_last_school_sy'];
            $elem_last_school_address=addslashes($_POST['elem_last_school_address']);
            $elem_last_school_type=$_POST['elem_last_school_type'];
            
            $jhs_last_school=strtoupper($_POST['jhs_last_school']);
            $jhs_last_school_sy=$_POST['jhs_last_school_sy'];
            $jhs_last_school_address=addslashes($_POST['jhs_last_school_address']);
            $jhs_last_school_type=$_POST['jhs_last_school_type'];
            
            $shs_last_school="Sta. Teresa College";
            $shs_last_school_sy=$activeSchoolYear;
            $shs_last_school_address="Bauan, Batangas";
            $shs_last_school_type="Private";
            
            $col_last_school="N/A";
            $col_last_school_sy="N/A";
            $col_last_school_address="N/A";
            $col_last_school_type="N/A";
            
            }
        }
        
        
        //COLLEGE//
        if($studData_row['dept']==='College'){
            if($studData_row['classification']==='Transferee'){
            
            $last_school="N/A";
            $last_school_sy="N/A";
            $last_school_address="N/A";
            $last_school_type="N/A";
            
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
                
            $col_last_school=strtoupper($_POST['col_last_school']);
            $col_last_school_sy=$_POST['col_last_school_sy'];
            $col_last_school_address=addslashes($_POST['col_last_school_address']);
            $col_last_school_type=$_POST['col_last_school_type'];
                
            }else{
            
            $last_school="N/A";
            $last_school_sy="N/A";
            $last_school_address="N/A";
            $last_school_type="N/A";
            
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
            
            $col_last_school="Sta. Teresa College";
            $col_last_school_sy=$activeSchoolYear;
            $col_last_school_address="Bauan, Batangas";
            $col_last_school_type="Private";
            
            }
        }
        
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
        col_last_school_type = :col_last_school_type
        
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
        
        'user_id' => $session_id]);
        
        $updateAccount = 'UPDATE useraccount SET lname = :lname, fname = :fname WHERE user_id = :user_id';
        $conn->prepare($updateAccount)->execute(['lname' => $lname, 'fname' => $fname, 'user_id' => $session_id]);
        
    ?>
 
    <script>
    window.alert('Basic Profile information updated for SY <?php echo $activeSchoolYear; ?>.');
    window.location='list_stud_applicants_details.php?dept=<?php echo $_GET['dept']; ?>&regx_id=<?php echo $_GET['regx_id']; ?>';
    </script>
    
    <?php }  ?>
    <!-- END UPDATE STUDENT INFORMATION - APPLICANTS -->
    
    
    <?php 
    if(isset($_POST['verifyStudStatus'])){
        
        $conn->query("UPDATE useraccount SET verification_status='Verified' WHERE v_code='$studData_row[v_code]'");
        
        $user_data_query = $conn->query("SELECT user_id FROM useraccount WHERE v_code='$studData_row[v_code]'") or die(mysql_error());
        $user_data_row=$user_data_query->fetch();
    
        $conn->query("UPDATE students SET user_id='$user_data_row[user_id]', status='For Application Assessment' WHERE v_code='$studData_row[v_code]'");
      
    ?>
    
    <script>
    window.alert('Applicant verification success...');
    window.location='list_applicants.php?dept=<?php echo $_GET['dept']; ?>&gradeLevel=&strand=&major=&status=Setup';
    </script> 
    
    
    <?php } ?>