<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";
require_login();
company_details_filled();
const TITLE_REQUIRED = 'Please enter job title';
const TITLE_INVALID = 'Job title is already added.';
const JOB_QUALIFICATION_REQUIRED = 'Please enter job qualification';
const VACANCY_REQUIRED = 'Please enter a job vacancy';
const APP_DEADLINE_REQUIRED = 'Please enter a application deadline';
const ENTER_VALID_DEADLINE = 'Plese enter valid deadline';
const JOB_LOCATION_REQUIRED = 'Please enter a job location';
const JOB_PACKAGE_REQUIRED = 'Please enter a job package';



$error = [];
$input = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 
    $job_title = filter_input(INPUT_POST, 'job_title', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['job_title'] = $job_title;

    $job_title = trim($job_title);
    $sql = "SELECT * FROM JOB_OPENING WHERE C_ID=? AND JOB_TITLE=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "is",$_SESSION['user_id'],$job_title);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (empty($job_title)) {
        $error['job_title'] = TITLE_REQUIRED;
    } else if (mysqli_num_rows($result) != 0 && !isset($_SESSION['update'])) {
        $error['job_title'] = TITLE_INVALID;
    }


    $vacancy = filter_input(INPUT_POST, 'vacancy', FILTER_SANITIZE_NUMBER_INT);
    $input['vacancy'] = $vacancy;
    $vacancy = trim($vacancy);

    if (empty($vacancy)) {
        $error['vacancy'] = VACANCY_REQUIRED;
    }


    $job_qualifications = filter_input(INPUT_POST, 'job_qualifications', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['job_qualifications'] = $job_qualifications;
    $job_qualifications = trim($job_qualifications);

    if (empty($job_qualifications)) {
        $error['job_qualifications'] = JOB_QUALIFICATION_REQUIRED;
    }


    $app_deadline = filter_input(INPUT_POST, 'app_deadline', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['app_deadline'] = $app_deadline;
    $currentDate = date("Y-m-d");
    $app_deadline = trim($app_deadline);

    if (empty($app_deadline)) {
        $error['app_deadline'] = APP_DEADLINE_REQUIRED;
    }
    else if($currentDate>$app_deadline){
        $error['app_deadline'] = ENTER_VALID_DEADLINE;
    }


    $job_location = filter_input(INPUT_POST, 'job_location', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['job_location'] = $job_location;
    $job_location = trim($job_location);

    if (empty($job_location)) {
        $error['job_location'] = JOB_LOCATION_REQUIRED;
    }


    $job_package = filter_input(INPUT_POST, 'job_package', FILTER_SANITIZE_NUMBER_INT);
    $input['job_package'] = $job_package;
    $job_package = trim($job_package);

    if (empty($job_package)) {
        $error['job_package'] = JOB_PACKAGE_REQUIRED;
    }

    
    
    

    if (count($error) === 0 && !isset($_SESSION['update'])) {
        $sql = "INSERT INTO JOB_OPENING (JOB_TITLE, JOB_QUALI, VACANCY, APP_DEADLINE, JOB_LOCATION, JOB_PACKAGE,C_ID) VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ssissii",$job_title,$job_qualifications,$vacancy,$app_deadline,$job_location,$job_package ,$_SESSION['user_id']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            $_SESSION['s_message']="Job opening added successfully!";
        } else {
            $_SESSION['e_message']="Plese try again later..";
        }
        return header('location: job_vacancy.php');
    } else if(count($error) === 0 && isset($_SESSION['update'])){
        
        $sql = "UPDATE job_opening SET JOB_QUALI=?,VACANCY=?,APP_DEADLINE=?,JOB_LOCATION=?,JOB_STATUS=?,JOB_PACKAGE=? WHERE C_ID=? AND JOB_TITLE=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "sisssiis",$job_qualifications,$vacancy,$app_deadline,$job_location,$_POST['job_status'],$job_package ,$_SESSION['user_id'],$job_title);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            $_SESSION['s_message']="Job details edited successfully!";
        } else {
            $_SESSION['e_message']="Plese try again later..";
        }
        unset($_SESSION['update']);
        return header('location: job_vacancy.php');
    }
    else{
        require_once('add_job_opening_form.php');
    }
} else {
    require_once('add_job_opening_form.php');
}