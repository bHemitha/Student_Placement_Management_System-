<?php
require_once("../helpers/config.php");
require_once("../helpers/help.php");
require_login();

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $s_id = $_POST["S_ID"];
    $JOB_TITLE = $_POST["JOB_TITLE"];

    $sql = "SELECT APP_STATUS FROM application WHERE C_ID= ? AND JOB_TITLE = ? AND S_ID=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "isi", $_SESSION["user_id"], $JOB_TITLE, $s_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($result['APP_STATUS'] == 'ACCEPTED') {

        $sql = "SELECT VACANCY FROM JOB_OPENING WHERE C_ID= ? AND JOB_TITLE = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "is", $_SESSION["user_id"], $JOB_TITLE);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $vacancy = $result['VACANCY'];
        $vacancy = $vacancy + 1;
        $sql = "UPDATE job_opening SET VACANCY=? WHERE C_ID= ? AND JOB_TITLE = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "iis", $vacancy, $_SESSION["user_id"], $JOB_TITLE);
        mysqli_stmt_execute($stmt);
    }
    $sql = "UPDATE application SET APP_STATUS='REJECTED' WHERE C_ID= ? AND JOB_TITLE = ? AND S_ID=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "isi", $_SESSION["user_id"], $JOB_TITLE, $s_id);
    mysqli_stmt_execute($stmt);



    $_SESSION['s_message'] = 'Appalication Rejected..';
    // return;
    return header("location: ./recived_application.php");
}
?>