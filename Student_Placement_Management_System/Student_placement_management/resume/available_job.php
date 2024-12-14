<?php
    require_once "../helpers/config.php";
    require_once "../helpers/help.php";
    
    require_login(); 
    $user_id = $_SESSION['user_id'];
    $currentDate = date("Y-m-d");
    // echo "Current Date: $currentDate";
    
    $sql = "UPDATE job_opening SET JOB_STATUS = 'CLOSED' WHERE JOB_STATUS = 'OPEN' AND APP_DEADLINE < ?";
    $stmt = mysqli_prepare($link, $sql);
    
    if (!$stmt) {
        die("Error in preparing SQL statement: " . mysqli_error($link));
    }
    
    mysqli_stmt_bind_param($stmt, "s", $currentDate);
    
    if (!mysqli_stmt_execute($stmt)) {
        die("Error executing SQL statement: " . mysqli_error($link));
    }
    
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    $sql = "SELECT *
    FROM (
        SELECT C_NAME, C_ID, JOB_TITLE, JOB_QUALI, APP_DEADLINE, JOB_LOCATION, JOB_PACKAGE
        FROM JOB_OPENING
        NATURAL JOIN COMPANY
        WHERE JOB_STATUS LIKE 'OPEN' AND VACANCY >= 0
        EXCEPT
        SELECT C_NAME, C_ID, JOB_TITLE, JOB_QUALI, APP_DEADLINE, JOB_LOCATION, JOB_PACKAGE
        FROM JOB_OPENING
        NATURAL JOIN COMPANY
        NATURAL JOIN APPLICATION
        WHERE S_ID = ?
    ) AS Result
    ORDER BY JOB_PACKAGE desc; ";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
?>

<?php require_once "../helpers/header.php"; ?>
<title>SPM : Available Job</title>
<?php require_once "../helpers/navbar.php"; ?>
<?php echo $_SESSION['recived_message'] ?? '' ?>
<div style="min-height: 500px;">

<h6 style="color:green;"><?php echo $_SESSION['s_message'] ?? '' ?></h6>
<h6 style="color:red;"><?php echo $_SESSION['e_message'] ?? '' ?></h6>
<table class="table responsive" >
    <thead>
        <tr style="text-align: center;">
            <td><b>Comapany Name</b></td>
            <td><b>Job Title</b></td>
            <td><b>Qualification</b></td>
            <td><b>Application Deadline</b></td>
            <td><b>Location</b></td>
            <td><b>Package</b></td>
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
                <td data-label="APP_DEADLINE">
                    <?php echo $row["APP_DEADLINE"] ?>
                </td>
                <td data-label="JOB_LOCATION">
                    <?php echo $row["JOB_LOCATION"] ?>
                </td>
                <td data-label="JOB_PACKAGE">
                    <?php echo $row["JOB_PACKAGE"] ?>
                </td>
                <td data-label="status">
                    <form id="form" action="apply.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="C_ID" value="<?php echo $row['C_ID'] ?>">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" name="JOB_TITLE" value="<?php echo $row['JOB_TITLE'] ?>">
                        </div>
                        <button name="apply" class="btn btn-primary" type="submit">Apply</button>
                    </form>
                </td>
                
            </tr>
            <?php flush() ?>
        <?php endwhile; ?>
</table>
</div>
<?php require_once "../helpers/footer.php"; ?>
<?php unset($_SESSION['s_message']) ?>
<?php unset($_SESSION['e_message']) ?>