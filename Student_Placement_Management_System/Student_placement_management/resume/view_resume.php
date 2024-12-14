<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";

require_login();
student_details_filled();
?>

<?php require_once "../helpers/header.php"; ?>
<title>SPM : View Resume</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    body,
    h1,
    h2,
    p,
    ul,
    li {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: black;
        color: rgb(0, 0, 0);
        margin-left: 20px;
        margin-right: 20px;

    }

    h1 {
        color: white;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .resume-section {
        background-color: #fff;
        margin-bottom: 20px;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .resume-section h2 {
        color: black;
        font-weight: 800px;
        margin-bottom: 10px;
        background-color: lightgray;
        padding: 10px;
    }

    .resume-section p {
        font-size: 17px;
        margin-bottom: 5px;
    }

    .resume-section ul {
        list-style-type: none;
        padding-left: 0;
    }

    .resume-section li {
        font-size: 17px;
        margin-bottom: 5px;
    }

    .resume-section a {
        color: #007BFF;
        text-decoration: none;
        transition: color 0.2s;
    }

    .resume-section a:hover {
        color: #0056b3;
    }
    .resume-container {
        max-width: 800px; 
        margin: 0 auto; 
    }
</style>
<?php require_once "../helpers/navbar.php"; ?>
<?php echo $_SESSION['recived_message'] ?? '' ?>
<?php
if (isset($_SESSION['user_id']) && $_SESSION['user_type']!='cc') {
    $user_id = $_SESSION['user_id'];
}
else if (isset($_POST['S_ID']) && $_SESSION['user_type']=='cc') {
    $user_id = $_POST['S_ID'];
}
else
{
    echo "oops..try again later.....";
}
// Query to retrieve the resume data
$sql = "SELECT * FROM student WHERE S_ID = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the query was successful
if ($result) {
    $resumeData = mysqli_fetch_assoc($result);
} else {
    echo "Error retrieving resume data.";
}

// Query to retrieve education data
$sql = "SELECT * FROM education WHERE S_ID = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$educationResult = mysqli_stmt_get_result($stmt);

// Query to retrieve experience data
$sql = "SELECT * FROM experience WHERE S_ID = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$experienceResult = mysqli_stmt_get_result($stmt);

// Query to retrieve skills data
$sql = "SELECT * FROM skill WHERE S_ID = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$skillsResult = mysqli_stmt_get_result($stmt);

// Query to retrieve achievements data
$sql = "SELECT * FROM achievement WHERE S_ID = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$achievementsResult = mysqli_stmt_get_result($stmt);
?>

<div class="resume-container">
<div style="min-height: 500px;">
    </br>
    <h1>Candidate Resume</h1>
    <div class="resume-section">
        <h2><i class="fas fa-user"></i> Personal Information</h2>
        <p><i class="fas fa-user"></i> Name:
            <?php echo "{$resumeData['F_NAME']} {$resumeData['M_NAME']} {$resumeData['L_NAME']}"; ?>
        </p>
        <p><i class="fab fa-linkedin-in"></i> LinkedIn:
            <?php echo $resumeData['LINKEDIN_LINK']; ?>
        </p>
        <p><i class="fas fa-envelope"></i> Email:
            <?php echo $resumeData['S_EMAIL']; ?>
        </p>
        <p><i class="fas fa-phone"></i> Phone:
            <?php echo $resumeData['S_PHONE']; ?>
        </p>
    </div>


    <!-- Education Section -->
    <div class="resume-section">
        <h2><i class="fas fa-graduation-cap"></i> Education</h2>
        <ul>
            <?php while ($education = mysqli_fetch_assoc($educationResult)): ?>
                <li>
                    <p><i class="fas fa-school"></i> School:
                        <?php echo $education['INSTITUTE_NAME']; ?>
                    </p>
                    <p><i style='font-size:24px' class='fas'>&#xf501;</i> Degree:
                        <?php echo $education['DEGREE']; ?>
                    </p>
                    <p><i class="fas fa-calendar"></i> Graduation Date:
                        <?php echo $education['EDU_ED']; ?>
                    </p>
                    <p><i class="fas fa-info-circle"></i> Description:
                        <?php echo $education['EDU_DESC']; ?>
                    </p>
                </li>
                <?php echo "</br>" ?>
            <?php endwhile; ?>
        </ul>
    </div>

    <!-- Experience Section -->
    <div class="resume-section">
        <h2><i class="fas fa-briefcase"></i> Experience</h2>
        <ul>
            <?php while ($experience = mysqli_fetch_assoc($experienceResult)): ?>
                <li>
                    <p><i class="fas fa-user-tie"></i> Title:
                        <?php echo $experience['EXP_TITLE']; ?>
                    </p>
                    <p><i class="fas fa-building"></i> Organization:
                        <?php echo $experience['EXP_COMP']; ?>
                    </p>
                    <p><i class="fas fa-map-marker-alt"></i> Location:
                        <?php echo $experience['EXP_LOC']; ?>
                    </p>
                    <p><i class="fas fa-calendar"></i> Start Date:
                        <?php echo $experience['EXP_SD']; ?>
                    </p>
                    <p><i class="fas fa-calendar"></i> End Date:
                        <?php echo $experience['EXP_ED']; ?>
                    </p>
                    <p><i class="fas fa-info-circle"></i> Description:
                        <?php echo $experience['EXP_DESC']; ?>
                    </p>
                </li>
                <?php echo "</br>" ?>
            <?php endwhile; ?>
        </ul>
    </div>


    <!-- Skills Section -->
    <div class="resume-section">
        <h2><i class="fa-solid fa-star"></i> Skills</h2>
        <ul>
            <?php while ($skill = mysqli_fetch_assoc($skillsResult)): ?>
                <li>
                    <i class="fas fa-check-circle"></i>
                    <?php echo $skill['SKILL_NAME']; ?>
                </li>
                <?php echo "</br>" ?>
            <?php endwhile; ?>
        </ul>
    </div>

    <!-- Achievements Section -->
    <div class="resume-section">
        <h2><i class="fa-solid fa-medal"></i> Achievements</h2>
        <ul>
            <?php while ($achievement = mysqli_fetch_assoc($achievementsResult)): ?>
                <li>
                    <i class="fas fa-award"></i> <strong>
                        <?php echo $achievement['ACH_TITLE']; ?>
                    </strong><br>
                    <?php echo $achievement['ACH_DESC']; ?>
                </li>
                <?php echo "</br>" ?>
            <?php endwhile; ?>
        </ul>
    </div>

</div>
</div>
    <?php require_once "../helpers/footer.php"; ?>