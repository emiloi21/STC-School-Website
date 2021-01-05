<?php

date_default_timezone_set('Asia/Manila');


$currentDate=date('m/d/Y');
$currentTime=date('h:i:s A');
    
$host = 'localhost';
$db   = 'test_stc_edu';
$user = 'root';
$pass = 'Emiloi21';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $conn = new PDO($dsn, $user, $pass, $options);
     
} catch (PDOException $e) {
     throw new PDOException($e->getMessage(), (int)$e->getCode());
     
}

$sf_query = $conn->prepare("SELECT * FROM school_preferences");
$sf_query->execute();
$sf_row = $sf_query->fetch();

$gs_sched_query = $conn->prepare("SELECT * FROM tbl_enrol_sched WHERE dept = :dept");
$gs_sched_query->execute(['dept' => 'Grade School']);
$gs_sched_row = $gs_sched_query->fetch();

$jhs_sched_query = $conn->prepare("SELECT * FROM tbl_enrol_sched WHERE dept = :dept");
$jhs_sched_query->execute(['dept' => 'Junior High School']);
$jhs_sched_row = $jhs_sched_query->fetch();

$shs_sched_query = $conn->prepare("SELECT * FROM tbl_enrol_sched WHERE dept = :dept");
$shs_sched_query->execute(['dept' => 'Senior High School']);
$shs_sched_row = $shs_sched_query->fetch();

$col_sched_query = $conn->prepare("SELECT * FROM tbl_enrol_sched WHERE dept = :dept");
$col_sched_query->execute(['dept' => 'College']);
$col_sched_row = $col_sched_query->fetch();

$activeSchoolYear = $sf_row['activeSchoolYear'];
$activeSemester = $sf_row['activeSemester'];


$link_uri_main='http://stcbauan.edu.ph/stc-edu/';
$link_uri_test='http://stcbauan.edu.ph/test-stc-edu/';
?>
