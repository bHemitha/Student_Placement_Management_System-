<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";

require_login();
company_details_filled();
$user_id = $_SESSION['user_id'];
$sql = "SELECT JOB_TITLE, JOB_QUALI, VACANCY, APP_DEADLINE, JOB_LOCATION, JOB_STATUS, JOB_PACKAGE FROM JOB_OPENING WHERE C_ID = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<?php require_once "../helpers/header.php"; ?>
<title>SPM : Job Vacancy</title>
<?php require_once "../helpers/navbar.php"; ?>
<h6 style="color:green;"><?php echo $_SESSION['s_message'] ?? '' ?></h6>
<h6 style="color:red;"><?php echo $_SESSION['e_message'] ?? '' ?></h6>
<div style="min-height:500px;">
    <table class="table responsive">
        <thead>
            <tr style="text-align: center;">
                <th><b>Job Title</b></th>
                <th><b>Qualifications</b></th>
                <th><b>Vacancy</b></th>
                <th><b>Application Deadline</b></th>
                <th><b>Location</b></th>
                <th><b>Status</b></th>
                <th><b>Package</b></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($result)) : ?>
                <tr>
                    <td data-label="JOB_TITLE">
                        <?php echo $row["JOB_TITLE"] ?>
                    </td>
                    <td data-label="JOB_QUALI">
                        <?php echo $row["JOB_QUALI"] ?>
                    </td>
                    <td data-label="VACANCY">
                        <?php echo $row["VACANCY"] ?>
                    </td>
                    <td data-label="APP_DEADLINE">
                        <?php echo $row["APP_DEADLINE"] ?>
                    </td>
                    <td data-label="JOB_LOCATION">
                        <?php echo $row["JOB_LOCATION"] ?>
                    </td>
                    <td data-label="JOB_STATUS">
                        <?php echo $row["JOB_STATUS"] ?>
                    </td>
                    <td data-label="JOB_PACKAGE">
                        <?php echo $row["JOB_PACKAGE"] ?>
                    </td>
                    <td data-label="status">
                        <form id="form" action="add_job_opening_form.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="JOB_TITLE" value="<?php echo $row['JOB_TITLE'] ?>">
                            </div>

                            <button name="edit" class="btn btn-primary" type="submit">Edit</button>
                        </form>
                    </td>
                </tr>
                <?php flush() ?>
            <?php endwhile; ?>

    </table>
</div>
<form action="add_job_opening_form.php" method="POST">
    <input type="submit" class="btn btn-primary" style="margin: 7px;" name="add" value="Add vacancy">
</form>
<?php require_once "../helpers/footer.php"; ?>
<?php unset($_SESSION['s_message']) ?>
<?php unset($_SESSION['e_message']) ?>