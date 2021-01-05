<!DOCTYPE html>
<html>
  <?php include('session.php'); ?>
    
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>STC WEB Portal</title>
    <meta name="description" content="RFID Attendance Monitoring with SMS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
 
 
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../admin/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
            
    <style>
    
    body{
        font-family: Verdana, sans-serif;
        font-size: 12px;
    }
    
    table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      width: 100%;
      font-size: 12px;
    }
    
    table td, table th {
      border: 1px solid #ddd;
      padding: 4px;
    }
    
    table th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #fff;
      color: black;
    }
    
    body {
        
    }
    </style>
    
    <style>
    #load{
        width:100%;
        height:100%;
        position:fixed;
        z-index:9999;
        background:url("../admin/img/ajax-loader.gif") no-repeat center center #dededf;
    }
    </style>
    
  </head>
  
  <body>
 
            <div class="col-lg-12" style="margin: 0px;">
            
            <table style="width: 100%;">
 
            <tr>
                <td style="border: none;">
                <center>
                <table>
                <tr>
                <td style="border: none; text-align: center;">
                 <img width="50" height="50" src="../admin/img/<?php echo $sf_row['logo']; ?>" />
                </td>
                </tr>
                <tr>
                <td style="border: none;">
                <center>
                <p style="margin: 4px; font-size: 18px; font-weight: bolder;"><?php echo strtoupper($schoolName); ?></p>
                <p style="margin: 4px; font-size: 12px;"><?php echo $sf_row['address']; ?></p>
                </center>
                </td>
                </tr>
                </table>
                </center>
                </td>
            </tr>
            
            <tr>
                <td style="border: none;">
                <center>
                <p style="margin-bottom: 0px; margin-top: 0px; font-size: 20px;"><strong>REGISTRATION FORM</strong></p>
                <p style="margin-top: 0px; font-size: 14px;"><strong>JUNIOR HIGH SCHOOL LEVEL</strong></p>
                </center>
                </td>
            </tr>
            
            
            </table>

            
            <table style="width: 100%; margin-top: 12px;">
            <tr>
            <td style="width: 33%;"><strong><?php echo $studData_row['student_id']; ?></strong><br /><small>ID Code</small></td>
            <td style="width: 34%;"><strong><?php echo $studData_row['lrn']; ?></strong><br /><small>LRN</small></td>
            <td style="width: 33%;"><strong><?php echo $studData_row['classification']; ?></strong><br /><small>Classification</small></td>
            </tr>
            </table>
            
            <table style="width: 100%; margin-top: 4px;">
            <tr>
            <td style="width: 33%;"><strong><?php echo $studData_row['schoolYear']; ?></strong><br /><small>School Year</small></td>
            <td style="width: 34%;"><strong><?php echo $studData_row['gradeLevel']; ?></strong><br /><small>Course Details</small></td>
            <td style="width: 33%;"><strong><?php echo $studData_row['dept']; ?></strong><br /><small>Department</small></td>
            </tr>
            </table>
            
            <table style="width: 100%; margin-top: 4px;">
            <td style="width: 33%;"><strong><?php echo $studData_row['lname']; ?></strong><br /><small>Last Name</small></td>
            <td style="width: 34%;"><strong><?php echo $studData_row['fname']; ?></strong><br /><small>First Name</small></td>
            <td style="width: 33%;"><strong><?php echo $studData_row['mname']; ?></strong><br /><small>Middle Name</small></td>
            </tr>
            </table>
            
            <table style="width: 100%; margin-top: 4px;">
            <tr>
            <td style="width: 33%;"><strong><?php echo $studData_row['bdMM'].'/'.$studData_row['bdDD'].'/'.$studData_row['bdYYYY']; ?></strong><br /><small>Date of Birth</small></td>
            <td style="width: 34%;"><strong><?php echo $studData_row['birthPlace']; ?></strong><br /><small>Place of Birth</small></td>
            <td style="width: 33%;"><strong><?php echo $studData_row['sex']; ?></strong><br /><small>Sex</small></td>
            </tr>
            </table>
            
            <table style="width: 100%; margin-top: 4px;">
            <td style="width: 33%;"><strong><?php echo $studData_row['age']; ?> years old</strong><br /><small>Age</small></td>
            <td style="width: 34%;"><strong><?php echo $studData_row['civil_status']; ?></strong><br /><small>Civil Status</small></td>
            <td style="width: 33%;"><strong><?php echo $studData_row['religion']; ?></strong><br /><small>Religion</small></td>
            </tr>
            </table>
 
            <table style="width: 100%; margin-top: 4px;">
            <td style="width: 67%;"><strong><?php echo $studData_row['address']; ?></strong><br /><small>Complete Home Address</small></td>
            <td style="width: 33%;"><strong><?php echo $studData_row['contact_num']; ?></strong><br /><small>Contact #</small></td>
            </tr>
            </table>
            
            <h3 style="width: 100%; margin-top: 12px;"></h3>
            <table style="width: 100%; margin-top: 12px;">
            
            <thead>
            <tr>
            <th colspan="5">PARENTS INFORMATION</th>
            </tr>
            </thead>
            
            <thead>
            <tr>
            <th style="width: 10%;"></th>
            <th style="width: 25%;">Name</th>
            <th style="width: 15%;">Occupation</th>
            <th style="width: 35%;">Address</th>
            <th style="width: 15%;">Contact #</th>
            </tr>
            </thead>
            
            <tr>
            <td style="text-align: center;"><strong>FATHER</strong></td>
            <td><?php echo $studData_row['father_name']; ?></td>
            <td><?php echo $studData_row['father_occupation']; ?></td>
            <td><?php echo $studData_row['father_address']; ?></td>
            <td><?php echo $studData_row['father_contact']; ?></td>
            </tr>
            
            <tr>
            <td style="text-align: center;"><strong>MOTHER</strong></td>
            <td><?php echo $studData_row['mother_name']; ?></td>
            <td><?php echo $studData_row['mother_occupation']; ?></td>
            <td><?php echo $studData_row['mother_address']; ?></td>
            <td><?php echo $studData_row['mother_contact']; ?></td>
            </tr>
            
            <tr>
            <td colspan="5" style="padding: 4px;"><strong>Email Address:</strong> <?php echo $studData_row['parents_email']; ?></td>
            </tr>
            </table>
            
            <?php if($studData_row['guardian_name']!='-' OR $studData_row['guardian_name']===''){ ?>
            <h3 style="width: 100%; margin-top: 12px;">GUARDIAN <small style="font-size: small;">(If living with guardian)</small></h3>
            <table style="width: 100%; margin-top: 12px;">
            
            <thead>
            <tr>
            <th style="width: 50%;">Name</th>
            <th style="width: 35%;">Relationship</th>
            <th style="width: 15%;">Contact #</th>
            </tr>
            </thead>
 
            
            <tr>
            <td><?php echo $studData_row['guardian_name']; ?></td>
            <td><?php echo $studData_row['guardian_relation']; ?></td>
            <td><?php echo $studData_row['guardian_contact']; ?></td>
            </tr>
            
            </table>
            <?php } ?>
            
            <h3 style="width: 100%; margin-top: 12px;"></h3>
            <table style="width: 100%;">
            
            <thead>
            <tr>
            <th colspan="4">SCHOOL ATTENDED</th>
            </tr>
            </thead>
            
            <thead>
            <tr>
            <th style="width: 35%;">Name</th>
            <th style="width: 15%;">Year</th>
            <th style="width: 35%;">Address</th>
            <th style="width: 15%;">Classification</th>
            </tr>
            </thead>
            
            <?php if($studData_row['classification']==='Transferee'){ ?>
            <tr>
            <td><?php echo $studData_row['jhs_last_school']; ?></td>
            <td><?php echo $studData_row['jhs_last_school_sy']; ?></td>
            <td><?php echo $studData_row['jhs_last_school_address']; ?></td>
            <td><?php echo $studData_row['jhs_last_school_type']; ?> - Junior High</td>
            </tr>
            <?php } ?>
            
            <tr>
            <td><?php echo $studData_row['elem_last_school']; ?></td>
            <td><?php echo $studData_row['elem_last_school_sy']; ?></td>
            <td><?php echo $studData_row['elem_last_school_address']; ?></td>
            <td><?php echo $studData_row['elem_last_school_type']; ?> - Elementary</td>
            </tr>
            </table>
            
            
            
            <?php if($studData_row['classification']==='New' OR $studData_row['classification']==='Transferee'){ ?>
            <table style="width: 100%; margin-top: 12px;">
            <tr>
            
            <td rowspan="2" style="width: 50%;">
            <table style="width: 100%;">
            <tr>
            <th colspan="2">CREDENTIALS SUBMITTED</th>
            </tr>
            <tr>
            <td style="width: 50%;"><input type="checkbox" disabled="" /> Birth Certificate</td>
            <td style="width: 50%;"><input type="checkbox" disabled="" /> Form 137</td>
            </tr>
            <tr>
            <td style="width: 50%;"><input type="checkbox" disabled="" /> Report Card</td>
            <td style="width: 50%;"><input type="checkbox" disabled="" /> Confirmation Certificate</td>
            </tr>
            </table>
            </td>
            
            <th style="width: 25%;">
            CHECKED BY:
            <br /><br /><br />
            <p style="border-bottom: 1px solid; width: 100%; margin-bottom: 0px;"></p>
            <small style="font-size: small; font-weight: lighter;">Signature</small>
            </th>
            <th style="width: 25%;">
            APPROVED:
            <br /><br /><br />
            <p style="border-bottom: 1px solid; width: 100%; margin-bottom: 0px;"></p>
            <small style="font-size: small; font-weight: lighter;">Registrar's Signature</small>
            </th>
            </tr>
 
            
            </table>
            <?php }else{ ?>
            
            <?php }?>
            
            </div>
 
 
    
    <?php include('js_scripts.php'); ?>
  </body>
</html>