<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";

require_login();
mysqli_begin_transaction($link);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Delete existing entries for the user (you may want to adjust this logic)
    // Delete from experience table first
    $sql = "DELETE FROM experience WHERE S_ID=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);




    $sql = "DELETE FROM skill WHERE s_id=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);

    $sql = "DELETE FROM education WHERE s_id=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);

    $sql = "DELETE FROM experience WHERE s_id=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);

    $sql = "DELETE FROM project WHERE s_id=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);


    // Then delete from other tables including student
    $sql = "DELETE FROM student WHERE s_id=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);

    // Process form data
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $linkedin=$_POST['linkid'];
    $achievements = [];

    if (isset($_POST['achieve_title']) && is_array($_POST['achieve_title'])) {
        foreach ($_POST['achieve_title'] as $key => $value) {
            $achieve_title = $_POST['achieve_title'][$key];
            $achieve_description = $_POST['achieve_description'][$key];

            $achievements[] = [
                'ACH_TITLE' => $achieve_title,
                'ACH_DESC' => $achieve_description,
                'S_ID' => $_SESSION["user_id"],
            ];
        }
    }
    $experiences = [];

    if (isset($_POST['exp_title']) && is_array($_POST['exp_title'])) {
        foreach ($_POST['exp_title'] as $key => $value) {
            $exp_title = $_POST['exp_title'][$key];
            $exp_organization = $_POST['exp_organization'][$key];
            $exp_location = $_POST['exp_location'][$key];
            $exp_start_date = $_POST['exp_start_date'][$key];
            $exp_end_date = $_POST['exp_end_date'][$key];
            $exp_description = $_POST['exp_description'][$key];

            $experiences[] = [
                'EXP_TITLE' => $exp_title,
                'EXP_ORGANIZATION' => $exp_organization,
                'EXP_LOC' => $exp_location,
                'EXP_SD' => $exp_start_date,
                'EXP_ED' => $exp_end_date,
                'S_ID' => $_SESSION["user_id"],
                'EXP_DESC' => $exp_description,
            ];
        }
    }


    $educations = [];

    if (isset($_POST['edu_school']) && is_array($_POST['edu_school'])) {
        foreach ($_POST['edu_school'] as $key => $value) {
            $edu_school = $_POST['edu_school'][$key];
            $edu_degree = $_POST['edu_degree'][$key];
            $edu_city = $_POST['edu_city'][$key];
            $edu_start_date = $_POST['edu_start_date'][$key];
            $edu_graduation_date = $_POST['edu_graduation_date'][$key];
            $edu_description = $_POST['edu_description'][$key];

            $educations[] = [
                'INSTITUTE_NAME' => $edu_school,
                'DEGREE' => $edu_degree,
                'EDU_DESC' => $edu_description,
                'EDU_GRADE' => null,
                // You may want to populate this if you have this data
                'EDU_TOTAL_GRADE' => null,
                // You may want to populate this if you have this data
                'EDU_SD' => $edu_start_date,
                'EDU_ED' => $edu_graduation_date,
                'S_ID' => $_SESSION["user_id"],
            ];
        }
    }

    $projects = [];

    if (isset($_POST['proj_title']) && is_array($_POST['proj_title'])) {
        foreach ($_POST['proj_title'] as $key => $value) {
            $proj_title = $_POST['proj_title'][$key];
            $proj_link = $_POST['proj_link'][$key];
            $proj_description = $_POST['proj_description'][$key];

            $projects[] = [
                'PROJ_NAME' => $proj_title,
                'PROJ_LINK' => $proj_link,
                'PROJ_DESC' => $proj_description,
                'S_ID' => $_SESSION["user_id"],
            ];
        }
    }


    $skills = [];

    if (isset($_POST['skill']) && is_array($_POST['skill'])) {
        foreach ($_POST['skill'] as $key => $value) {
            $skill_name = $_POST['skill'][$key];

            $skills[] = [
                'SKILL_NAME' => $skill_name,
                'S_ID' => $_SESSION["user_id"],
            ];
        }
    }


    // Insert student information
    $sql = "INSERT INTO student (S_ID, F_NAME, M_NAME, L_NAME,LINKEDIN_LINK, S_EMAIL, S_PHONE)
    VALUES (?, ?, ?,?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE F_NAME = VALUES(F_NAME), M_NAME = VALUES(M_NAME), L_NAME = VALUES(L_NAME), LINKEDIN_LINK = VALUES(LINKEDIN_LINK),
    S_EMAIL = VALUES(S_EMAIL), S_PHONE = VALUES(S_PHONE)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "issssss", $_SESSION["user_id"], $firstname, $middlename, $lastname,$linkedin, $email, $phoneno);
    mysqli_stmt_execute($stmt);

    // Handle achievements (assuming you have an array of achievements)
    if (isset($_POST['achieve_title']) && is_array($_POST['achieve_title'])) {
        foreach ($_POST['achieve_title'] as $key => $value) {
            $achieve_title = $_POST['achieve_title'][$key];
            $achieve_description = $_POST['achieve_description'][$key];

            // Insert or update achievement
            $sql = "INSERT INTO achievement (ACH_TITLE, ACH_DESC, S_ID)
                     VALUES (?, ?, ?)
                     ON DUPLICATE KEY UPDATE ACH_DESC = VALUES(ACH_DESC)";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "ssi", $achieve_title, $achieve_description, $_SESSION["user_id"]);
            mysqli_stmt_execute($stmt);
        }
    }

    // Handle experiences (assuming you have an array of experiences)
    if (isset($_POST['exp_title']) && is_array($_POST['exp_title'])) {
        foreach ($_POST['exp_title'] as $key => $value) {
            $exp_title = $_POST['exp_title'][$key];
            $exp_organization = $_POST['exp_organization'][$key];
            $exp_location = $_POST['exp_location'][$key];
            $exp_start_date = $_POST['exp_start_date'][$key];
            $exp_end_date = $_POST['exp_end_date'][$key];
            $exp_description = $_POST['exp_description'][$key];

            // Insert or update experience
            $sql = "INSERT INTO experience (EXP_TITLE, EXP_COMP, EXP_LOC, EXP_SD, EXP_ED, EXP_DESC, S_ID)
            VALUES (?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE EXP_COMP = VALUES(EXP_COMP), EXP_LOC = VALUES(EXP_LOC),
            EXP_SD = VALUES(EXP_SD), EXP_ED = VALUES(EXP_ED), EXP_DESC = VALUES(EXP_DESC)";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssi", $exp_title, $exp_organization, $exp_location, $exp_start_date, $exp_end_date, $exp_description, $_SESSION["user_id"]);
            mysqli_stmt_execute($stmt);
        }
    }

    // Handle education (assuming you have an array of education)
    if (isset($_POST['edu_school']) && is_array($_POST['edu_school'])) {
        foreach ($_POST['edu_school'] as $key => $value) {
            $edu_school = $_POST['edu_school'][$key];
            $edu_degree = $_POST['edu_degree'][$key];
            $edu_city = $_POST['edu_city'][$key];
            $edu_grade =4;
            $edu_total_grade=5;
            $edu_start_date = $_POST['edu_start_date'][$key];
            $edu_graduation_date = $_POST['edu_graduation_date'][$key];
            $edu_description = $_POST['edu_description'][$key];

            // Insert or update education
            $sql = "INSERT INTO education (INSTITUTE_NAME,DEGREE,EDU_GRADE,EDU_TOTAL_GRADE, EDU_SD, EDU_ED, EDU_DESC, S_ID)
                     VALUES (?, ?, ?, ?, ?, ?, ?,?)
                     ON DUPLICATE KEY UPDATE DEGREE = VALUES(DEGREE),
                     EDU_SD = VALUES(EDU_SD), EDU_ED = VALUES(EDU_ED), EDU_DESC = VALUES(EDU_DESC)";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "ssiisssi", $edu_school, $edu_degree,$edu_grade,$edu_total_grade ,$edu_start_date, $edu_graduation_date, $edu_description, $_SESSION["user_id"]);
            mysqli_stmt_execute($stmt);
        }
    }

    // Handle projects (assuming you have an array of projects)
    if (isset($_POST['proj_title']) && is_array($_POST['proj_title'])) {
        foreach ($_POST['proj_title'] as $key => $value) {
            $proj_title = $_POST['proj_title'][$key];
            $proj_link = $_POST['proj_link'][$key];
            $proj_description = $_POST['proj_description'][$key];

            // Insert or update project
            $sql = "INSERT INTO project (PROJ_NAME, PROJ_LINK, PROJ_DESC, S_ID)
                     VALUES (?, ?, ?, ?)
                     ON DUPLICATE KEY UPDATE PROJ_LINK = VALUES(PROJ_LINK), PROJ_DESC = VALUES(PROJ_DESC)";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "sssi", $proj_title, $proj_link, $proj_description, $_SESSION["user_id"]);
            mysqli_stmt_execute($stmt);
        }
    }

    // Handle skills (assuming you have an array of skills)
    if (isset($_POST['skill']) && is_array($_POST['skill'])) {
        foreach ($_POST['skill'] as $key => $value) {
            $skill_name = $_POST['skill'][$key];

            // Insert or update skill
            $sql = "INSERT INTO skill (SKILL_NAME, S_ID)
                     VALUES (?, ?)
                     ON DUPLICATE KEY UPDATE SKILL_NAME = VALUES(SKILL_NAME)";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "si", $skill_name, $_SESSION["user_id"]);
            mysqli_stmt_execute($stmt);
        }
    }

    if (mysqli_stmt_execute($stmt) === false) {
        // Rollback the transaction in case of an error
        mysqli_rollback($link);
        die("Error: " . mysqli_stmt_error($stmt));
    }

    // Commit the transaction if everything is successful
    mysqli_commit($link);

    // Redirect to a success page or display a success message
    $sql = "UPDATE users SET user_type='ss' WHERE id=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
    mysqli_stmt_execute($stmt);
    $_SESSION['user_type'] = 'ss';
    return header('location: available_job.php');
}