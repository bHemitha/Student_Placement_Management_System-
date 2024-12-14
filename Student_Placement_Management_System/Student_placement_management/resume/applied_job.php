<?php
    require_once "../helpers/config.php";
    require_once "../helpers/help.php";
    
    require_login(); 
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT C_NAME,C_ID,JOB_TITLE,JOB_QUALI,JOB_PACKAGE,APP_STATUS  FROM JOB_OPENING natural join COMPANY natural join application WHERE S_ID= ? AND JOB_STATUS LIKE 'OPEN' AND VACANCY>=0  ORDER BY APP_STATUS , JOB_PACKAGE desc";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
?>

<?php require_once "../helpers/header.php"; ?>
<title>SPM : Applied Job</title>
<?php require_once "../helpers/navbar.php"; ?>
<div style="min-height: 500px;">

<h6 style="color:green;"><?php echo $_SESSION['s_message'] ?? '' ?></h6>
<h6 style="color:red;"><?php echo $_SESSION['e_message'] ?? '' ?></h6>
<table class="table responsive" >
    <thead>
        <tr style="text-align: center;">
            <td><b>Comapany Name</b></td>
            <td><b>Job Title</b></td>
            <td><b>Qualification</b></td>
            <td><b>Package</b></td>
            <td><b>Application Status</b></td>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td data-label="C_NAME">
                    <?php echo $row["C_NAME"]?>
                </td>
                <td data-label="JOB_TITLE">
                    <?php echo $row["JOB_TITLE"] ?>
                </td>
                <td data-label="JOB_QUALI">
                    <?php echo $row["JOB_QUALI"] ?>
                </td>
                <td data-label="JOB_PACKAGE">
                    <?php echo $row["JOB_PACKAGE"] ?>
                </td>
                <td data-label="APP_STATUS">
                    <?php echo $row["APP_STATUS"] ?>
                </td>
                
            </tr>
            <?php flush() ?>
        <?php endwhile; ?>
</table>
</div>
<?php require_once "../helpers/footer.php"; ?>
<?php unset($_SESSION['s_message']) ?>
<?php unset($_SESSION['e_message']) ?>