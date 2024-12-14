<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";

require_login(); 

if ( $_SERVER["REQUEST_METHOD"] == "POST" )
{   $sql="DELETE FROM achievement where s_id=?";
    $stmt=mysqli_prepare($link,$sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $sql="DELETE FROM education where s_id=?";
    $stmt=mysqli_prepare($link,$sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $sql="DELETE FROM experience where s_id=?";
    $stmt=mysqli_prepare($link,$sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $sql="DELETE FROM project where s_id=?";
    $stmt=mysqli_prepare($link,$sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $sql="DELETE FROM skill where s_id=?";
    $stmt=mysqli_prepare($link,$sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $sql="DELETE FROM student where s_id=?";
    $stmt=mysqli_prepare($link,$sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $address=$_POST['address'];
    $designation=$_POST['designation'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $summary=$_POST['summary'];


    $achieve_titles = $_POST["achieve_title"];
    // if (isset($_POST["achieve_title"])) {
    //     $achieve_title = $_POST["achieve_title"];
    // } else {
    //     // Handle the case when "achieve_title" is not present in the $_POST array
    //     $achieve_title = "Default Value"; // You can set a default value or take other appropriate action.
    // }
    // echo $achieve_title;
    // $achieve_description=$_POST['achieve_description'];

    // $exp_title=$_POST['exp_title'];
    // $exp_organization=$_POST['exp_organization'];
    // $exp_location=$_POST['exp_location'];
    // $exp_start_date=$_POST['exp_start_date'];
    // $exp_end_date=$_POST['exp_end_date'];
    // $exp_description=$_POST['exp_description'];

    // $edu_school=$_POST['edu_school'];
    // $edu_degree=$_POST['edu_degree'];
    // $edu_city=$_POST['edu_city'];
    // $edu_start_date=$_POST['edu_start_date'];
    // $edu_graduation_date=$_POST['edu_graduation_date'];
    // $edu_description=$_POST['edu_description'];

    
    // $proj_title=$_POST['proj_title'];
    // $proj_link=$_POST['proj_link'];
    // $proj_description=$_POST['proj_description'];
    
    // $skill=$_POST['skill'];
}