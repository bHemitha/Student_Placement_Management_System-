<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";

require_login();
company_details_filled();

if (isset($_POST['edit'])) {
    $sql = "SELECT * FROM JOB_OPENING WHERE C_ID=? AND JOB_TITLE=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "is", $_SESSION['user_id'], $_POST['JOB_TITLE']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_array($result);
    $input['job_title'] = $result['JOB_TITLE'];
    $input['job_qualifications'] = $result['JOB_QUALI'];
    $input['vacancy'] = $result['VACANCY'];
    $input['app_deadline'] = $result['APP_DEADLINE'];
    $input['job_location'] = $result['JOB_LOCATION'];
    $input['job_package'] = $result['JOB_PACKAGE'];
    $_SESSION['update'] = true;
}

?>

<?php include_once("../helpers/header.php"); ?>
<title>Company: Add job Details</title>
<?php include_once("../helpers/navbar.php"); ?>
<div style="padding:10%;">
    <h1>Add Job Vacancy</h1>
    <form action="add_job_opening.php" method="post">

        <div style="color:red;text-align:center;">
            <?php echo $error['job_title'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="job_title" name="job_title" placeholder="Job Title" type="text" value="<?php echo $input['job_title'] ?? '' ?>" <?php if (isset($_SESSION['update'])) {echo 'readonly';} ?>>
        </div>


        <div style="color:red;text-align:center;">
            <?php echo $error['job_qualifications'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="job_qualifications" name="job_qualifications" placeholder="Job Qualifications" type="text" value="<?php echo $input['job_qualifications'] ?? '' ?>">
        </div>


        <div style="color:red;text-align:center;">
            <?php echo $error['vacancy'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" min="0" id="vacancy" name="vacancy" placeholder="Vacancy" type="number" value="<?php echo $input['vacancy'] ?? '' ?>">
        </div>


        <div style="color:red;text-align:center;">
            <?php echo $error['app_deadline'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="app_deadline" name="app_deadline" placeholder="App Deadline" type="date" value="<?php echo $input['app_deadline'] ?? '' ?>">
        </div>


        <div style="color:red;text-align:center;">
            <?php echo $error['job_location'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="job_location" name="job_location" placeholder="Job Location" type="text" value="<?php echo $input['job_location'] ?? '' ?>">
        </div>

        <div style="color:red;text-align:center;">
            <?php echo $error['job_status'] ?? '' ?>
        </div>
        <div class="mb-3">
            <label for="job_status">Job Status:</label>
            <select name="job_status" id="job_status" class="form-control mx-auto w-auto" placeholder="job_status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="OPEN">Open</option>
                <option value="CLOSE">close</option>
            </select>
        </div>


        <div style="color:red;text-align:center;">
            <?php echo $error['job_package'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="job_package" name="job_package" placeholder="Job Package" min="0" type="number" value="<?php echo $input['job_package'] ?? '' ?>">
        </div>

        <div style="text-align:center;">
            <button class="btn" type="submit" style="background-color:gray;color: white;">Add Job Vacancy</button>
        </div>
    </form>
    </br>
    </br>

    <?php include_once("../helpers/footer.php"); ?>