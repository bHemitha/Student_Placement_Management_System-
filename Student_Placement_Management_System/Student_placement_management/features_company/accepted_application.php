<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";

require_login();
company_details_filled();
$user_id = $_SESSION['user_id'];

$sql = "SELECT S_ID,F_NAME,M_NAME,L_NAME,LINKEDIN_LINK,S_EMAIL,S_PHONE,JOB_TITLE,JOB_PACKAGE 
FROM APPLICATION natural join STUDENT 
natural join JOB_OPENING WHERE c_id = ? AND APP_STATUS LIKE 'ACCEPTED' order by JOB_TITLE";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<?php require_once "../helpers/header.php"; ?>
<title>SPM : Accepted applications</title>
<?php require_once "../helpers/navbar.php"; ?>
<?php echo $_SESSION['recived_message'] ?? '' ?>
<h6 style="color:green;">
        <?php echo $_SESSION['s_message'] ?? '' ?>
    </h6>
    <h6 style="color:red;">
        <?php echo $_SESSION['e_message'] ?? '' ?>
    </h6>
<div style="min-height:500px;">
    <table class="table responsive">
        <thead>
            <tr style="text-align: center;">
                <td><b>S_Id</b></td>
                <td><b>Name</b></td>
                <td><b>Linkedin id</b></td>
                <td><b>Email</b></td>
                <td><b>Phone</b></td>
                <td><b>Job title</b></td>
                <td><b>Job package</b></td>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($result)) : ?>
                <tr>
                    <td data-label="s_id">
                        <?php echo $row["S_ID"] ?>
                    </td>
                    <td data-label="Name">
                        <?php echo "{$row['F_NAME']} {$row['M_NAME']} {$row['L_NAME']}" ?>
                    </td>
                    <td data-label="Linkedin_link">
                        <?php echo $row["LINKEDIN_LINK"] ?>
                    </td>

                    <td data-label="Email">
                        <?php echo $row["S_EMAIL"] ?>
                    </td>
                    <td data-label="Phone">
                        <?php echo $row["S_PHONE"] ?>
                    </td>
                    <td data-label="job_title">
                        <?php echo $row["JOB_TITLE"] ?>
                    </td>
                    <td data-label="job_package">
                        <?php echo $row["JOB_PACKAGE"] ?>
                    </td>
                    <td data-label="status">
                        <form id="form" action="application_reject.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="S_ID" value="<?php echo $row['S_ID'] ?>">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="JOB_TITLE" value="<?php echo $row['JOB_TITLE'] ?>">
                            </div>

                            <button name="reject" class="btn btn-primary" type="submit">Reject</button>
                        </form>
                    </td>
                    <td data-label="View Resume">
                        <form id="form" action="../resume/view_resume.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="S_ID" value="<?php echo $row['S_ID'] ?>">
                            </div>
                            <button name="view_resume" class="btn btn-primary" type="submit">View Resume</button>
                        </form>
                    </td>
                    

                </tr>
                <?php flush() ?>
            <?php endwhile; ?>
    </table>
</div>

<?php unset($_SESSION['s_message']) ?>
<?php unset($_SESSION['e_message']) ?>

<?php require_once "../helpers/footer.php"; ?>