<?php
require_once("../helpers/config.php");
require_once("../helpers/help.php");
require_login();

const JOB_TITLE_REQUIRED = 'Required job title not found! Try again.';

$error = [];
?>

<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    $s_id=$_POST["S_ID"];
    $JOB_TITLE=$_POST["JOB_TITLE"];

    if ( $JOB_TITLE == "" )
    {
        $_SESSION['e_message'] = JOB_TITLE_REQUIRED;
        return header("location: ./recived_application.php");
    }
    $sql = "SELECT VACANCY FROM JOB_OPENING WHERE C_ID= ? AND JOB_TITLE = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "is", $_SESSION["user_id"],$JOB_TITLE);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($result['VACANCY']<=0){
        $_SESSION['accept_message'] = "Your company has no vacancy for $JOB_TITLE if you want to still hire a student so plese update vacancy and try agian..!";
        return header("location: ./recived_application.php");
    }
    else{
        $vacancy=$result['VACANCY'];
        $vacancy=$vacancy-1;
        $sql = "UPDATE job_opening SET VACANCY=? WHERE C_ID= ? AND JOB_TITLE = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "iis",$vacancy, $_SESSION["user_id"],$JOB_TITLE);
        mysqli_stmt_execute($stmt);

        $sql = "UPDATE application SET APP_STATUS='ACCEPTED' WHERE C_ID= ? AND JOB_TITLE = ? AND S_ID=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "isi",$_SESSION["user_id"],$JOB_TITLE,$s_id);
        mysqli_stmt_execute($stmt);
        $_SESSION['s_message'] = 'Appalication Accepted..';
            return header("location: ./recived_application.php");
    }
    
}
?>