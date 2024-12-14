<?php
require_once("../helpers/config.php");
require_once("../helpers/help.php");
require_login();
student_details_filled();

const JOB_TITLE_REQUIRED = 'Required job title not found! Try again.';

$error = [];
?>

<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST' &&$_SESSION['user_type']=='ss')
{
    $c_id=$_POST["C_ID"];
    $JOB_TITLE=$_POST["JOB_TITLE"];

    if ( $JOB_TITLE == "" )
    {
        $_SESSION['e_message'] = JOB_TITLE_REQUIRED;
        return header("location: ./available_job.php.php");
    }
    $sql = "SELECT APP_ID FROM APPLICATION WHERE S_ID=? AND C_ID =? AND JOB_TITLE=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "iis", $_SESSION["user_id"],$c_id,$JOB_TITLE);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO application (JOB_TITLE,C_ID,S_ID) VALUES (?,?,?) ";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "sii",$JOB_TITLE,$c_id,$_SESSION["user_id"]);
        mysqli_stmt_execute($stmt);
        $_SESSION['s_message'] = 'sucessfully applied..';
    }
    else{
        $_SESSION['e_message'] = 'you are alredy applied for this job in this company..';
    }
    
    return header("location: ./available_job.php");

        

        
    
    
}
?>