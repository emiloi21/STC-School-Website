    
    <?php include('dbcon.php'); ?>
    
    
    <!-- ELEMENTARY -->
    <?php
    
    if(isset($_POST['load_reg_code'])){
        
        $studData_query = $conn->prepare('SELECT * FROM students WHERE v_code = :v_code');
        $studData_query->execute(['v_code' => $_POST['v_code']]);
        
        if($studData_query->rowCount()>0){ ?>
        
        <script>
        window.location='registration-step-four.php?reg_code=<?php echo $_POST['v_code']; ?>';
        </script>
        
    <?php }else{ ?>
        
        <script>
        window.alert('No profile found, please check your code and try again.');
        window.location='user-login-register.php';
        </script>
        
    <?php } } ?>
    
    <!-- ELEMENTARY -->
    <?php
    
    if(isset($_POST['setCourse'])){
        
        $classification=$_POST['classification'];
        
        //V-CODE GENERATOR
        function randomcode() {
        $var = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $code = '';
        while ($i <= 9) {
        $num = rand() % 33;
        $tmp = substr($var, $num, 1);
        $code = $code . $tmp;
        $i++;
        }
        return $code;
        }
        //END V-CODE GENERATOR 
        
        if($classification==='Old'){
            
        $student_id=$_POST['student_id'];
        $fname=strtoupper($_POST['fname']);
        $lname=strtoupper($_POST['lname']);
        $contact_num="+63".$_POST['contact_num'];
        $email=$_POST['email'];
       
        $appDate=$currentDate;
        $appTime=$currentTime;
        $v_code=randomcode();
        
        $chk_query=$conn->prepare("SELECT reg_id FROM students WHERE student_id = :student_id AND lname = :lname AND fname = :fname");
        $chk_query->execute(['student_id' => $student_id, 'lname' => $lname, 'fname' => $fname]);
        
            if($chk_query->rowCount()>0){
            
            $chk_row=$chk_query->fetch();
            
            $updateStudent = 'UPDATE students SET
            
            contact_num = :contact_num,
            email = :email,
            appDate = :appDate,
            appTime = :appTime,
            v_code = :v_code
            
            WHERE reg_id = :reg_id';
            
            $conn->prepare($updateStudent)->execute([
            
            'contact_num' => $contact_num,
            'email' => $email,
            'appDate' => $appDate,
            'appTime' => $appTime,
            'v_code' => $v_code,
            
            'reg_id' => $chk_row['reg_id']]);
            
            ?>
 
            <script>
            window.location='registration-step-one.php?reg_code=<?php echo $v_code; ?>';
            </script>
            
            <?php
        
            }else{ ?>
 
            <script>
            window.alert('Student profile not found. Please check Student ID Code will synchronize with First and Last name supplied.');
            window.location='user-login-register.php';
            </script>
            
        
        <?php } }else{
        
        $lrn=$_POST['lrn'];
        $fname=strtoupper($_POST['fname']);
        $lname=strtoupper($_POST['lname']);
        $contact_num="+63".$_POST['contact_num'];
        $email=$_POST['email'];
        $dept=$_POST['dept'];
        $gradeLevel=$_POST['gradeLevel'];
        $strand=$_POST['strand'];
        $major=$_POST['major'];
        $schoolYear=$activeSchoolYear;
        $sem="N/A";
        $appDate=$currentDate;
        $appTime=$currentTime;
        $v_code=randomcode();
        
        $saveNewStudent = "INSERT INTO students
        (
        lrn,
        fname,
        lname,
        contact_num,
        email,
        dept,
        gradeLevel,
        strand,
        major,
        classification,
        schoolYear,
        sem,
        appDate,
        appTime,
        v_code
        )
        
        VALUES
        
        (
        '$lrn',
        '$fname',
        '$lname',
        '$contact_num',
        '$email',
        '$dept',
        '$gradeLevel',
        '$strand',
        '$major',
        '$classification',
        '$schoolYear',
        '$sem',
        '$appDate',
        '$appTime',
        '$v_code'
        )";
        $conn->exec($saveNewStudent);
        
        ?>
 
        <script>
        window.location='registration-step-one.php?reg_code=<?php echo $v_code; ?>';
        </script>
        
        <?php } }  ?>
    
    
    <?php
    if(isset($_POST['update_step_one'])){
        
        $v_code=$_GET['reg_code'];
        
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
        email = :email
        
        WHERE v_code = :v_code';
        
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
        
        'v_code' => $v_code]);
        
    ?>
 
    <script>
    window.location='registration-step-two.php?reg_code=<?php echo $v_code; ?>';
    </script>
    
    <?php }  ?>
    
    
    <?php
    if(isset($_POST['update_step_two'])){
        
        $v_code=$_GET['reg_code'];
        
        $studData_query = $conn->prepare('SELECT * FROM students WHERE v_code = :v_code');
        $studData_query->execute(['v_code' => $_GET['reg_code']]);
        $studData_row = $studData_query->fetch();
        
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
        
        WHERE v_code = :v_code';
        
        $conn->prepare($updateStudent)->execute([
        
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
        
        'v_code' => $v_code]);
        
    ?>
 
    <script>
    window.location='registration-step-three.php?reg_code=<?php echo $v_code; ?>';
    </script>
    
    <?php }  ?>
    
    <?php
    if(isset($_POST['update_step_three'])){
        
        $v_code=$_GET['reg_code'];
        
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
        
        $updateStudent = 'UPDATE students SET
        
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
        guardian_relation = :guardian_relation
        
        WHERE v_code = :v_code';
        
        $conn->prepare($updateStudent)->execute([
        
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
        
        'v_code' => $v_code]);
        
    ?>
    
    <script>
    window.location='registration-step-four.php?reg_code=<?php echo $v_code; ?>';
    </script>
    
    <?php }  ?>
    
    
    
    <?php
    if(isset($_POST['update_step_four'])){
    
    $v_code=$_GET['reg_code'];
    
    $studData_query = $conn->prepare('SELECT * FROM students WHERE v_code = :v_code');
    $studData_query->execute(['v_code' => $_GET['reg_code']]);
    $studData_row = $studData_query->fetch();
    
    if($studData_row['classification']==='New'){
        
    //NEW
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    
    $safe_pass=md5($password);
    $salt="a1Bz20ydqelm8m1wql";
    $final_pass=$salt.$safe_pass;
    
    if($password===$password2){
        
    
    $chk_query=$conn->prepare("SELECT username FROM useraccount WHERE username = :username");
    $chk_query->execute(['username' => $username]);

    if($chk_query->rowCount()>0){
        
    $chk_row=$chk_query->fetch();
    
    //if($chk_row['username']===$username){ ?> 
    
    <script>
    window.alert('Account Settings not saved... Username already taken.');
    window.location='registration-step-four.php?reg_code=<?php echo $v_code; ?>';
    </script>
 
    <?php //}
    
    }else{
    
    //UPDATE STUDENT STATUS
    $updateStudent = 'UPDATE students SET status = :status WHERE v_code = :v_code';
    $conn->prepare($updateStudent)->execute(['status' => 'Setup', 'v_code' => $v_code]);
    //END UPDATE STUDENT STATUS
    
    //save account
    $saveNewUser = "INSERT INTO useraccount(fname, lname, email, contact_num, username, password, user_type, access, v_code, verification_status)
    VALUES ('$studData_row[fname]', '$studData_row[lname]', '$studData_row[email]', '$studData_row[contact_num]', '$username', '$final_pass', 'Student', 'User', '$v_code', 'Pending')";
    $conn->exec($saveNewUser);


    // Subject
    $subject = 'STC WEB PORTAL - NEW STUDENT REGISTRATION';
    
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
    
    Thank you for using STC Web Portal.<br /><br />
    
    The information you have shared has already been recorded and saved by the school’s Registrar’s Office under the protection of the Data Privacy Act of 2012.<br /><br />
    
    Take note of the username and password that you have entered.  This will be used in the next steps of our admissions process.<br /><br />
    
    <strong style="text-decoration: underline;">STUDENT ACCOUNT DETAILS</strong><br /><br />
    <strong>Username: '.$username.'</strong><br />
    <strong>Password: '.$password.'</strong><br /><br />
    
    A verification email will be sent if your application was validated. Above is your login credentials to student portal to accomplish admission process.<br /><br />
    
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
    window.alert('Registration submitted and waiting for validation. Please check your email for more details.');
    window.location='user-login-register.php';
    </script>
    
    <?php } }else{ ?>
    
    <script>
    window.alert('Retyped password not matched.');
    window.location='registration-step-four.php?reg_code=<?php echo $v_code; ?>';
    </script>
    
    <?php } }else{
    //OLD
    
    $safe_pass=md5($v_code);
    $salt="a1Bz20ydqelm8m1wql";
    $final_pass=$salt.$safe_pass;
    
    //UPDATE STUDENT STATUS
    $updateStudent = 'UPDATE students SET status = :status WHERE v_code = :v_code';
    $conn->prepare($updateStudent)->execute(['status' => 'For Application Assessment', 'v_code' => $v_code]);
    //END UPDATE STUDENT STATUS
    
    //save account
    $saveNewUser = "INSERT INTO useraccount(fname, lname, email, contact_num, username, password, user_type, access, v_code, verification_status)
    VALUES ('$studData_row[fname]', '$studData_row[lname]', '$studData_row[email]', '$studData_row[contact_num]', '$studData_row[student_id]', '$final_pass', 'Student', 'User', '$v_code', 'Pending')";
    $conn->exec($saveNewUser);
    
    // Subject
    $subject = 'STC WEB PORTAL - OLD STUDENT REGISTRATION';
    
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
    
    Thank you for using STC Web Portal.<br /><br />
    
    The information you have shared has already been recorded and saved by the school’s Registrar’s Office under the protection of the Data Privacy Act of 2012.<br /><br />
    
    Take note of the username and password that you have entered.  This will be used in the next steps of our admissions process.<br /><br />
    
    <strong style="text-decoration: underline;">STUDENT ACCOUNT DETAILS</strong><br /><br />
    <strong>Username: '.$studData_row['student_id'].'</strong><br />
    <strong>Password: '.$v_code.'</strong><br /><br />
    
    A verification email will be sent if your application was validated. Above is your login credentials to student portal to accomplish admission process.<br /><br />

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
    
    }
    
    $conn=null;
    
    } ?>
  
 