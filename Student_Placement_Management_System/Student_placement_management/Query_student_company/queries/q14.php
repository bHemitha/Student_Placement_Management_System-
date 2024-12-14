<?php
include_once('../helper/connection.php');
session_start();

// echo  $_SESSION['user_id'];
$queryResult = ''; // Initialize a variable to store the query result
$c_id = ''; // Initialize $c_id variable
$c_id = $_SESSION['user_id'];


$c_id = $_SESSION['user_id'];
if (isset($_POST['accept'])) {
    $q1 = "UPDATE application a
    SET a.APP_STATUS = 'ACCEPTED'
    WHERE a.S_ID IN (
        SELECT DISTINCT s.S_ID
        FROM student s
        WHERE (
            -- Check for Technical Skills
            EXISTS (SELECT 1 FROM skill sk WHERE s.S_ID = sk.S_ID AND (sk.SKILL_NAME LIKE '%Java%' OR sk.SKILL_NAME LIKE '%Python%' OR sk.SKILL_NAME LIKE '%HTML%' OR sk.SKILL_NAME LIKE '%CSS%' OR sk.SKILL_NAME LIKE '%SQL%' OR sk.SKILL_NAME LIKE '%JavaScript%' OR sk.SKILL_NAME LIKE '%MATLAB%' OR sk.SKILL_NAME LIKE '%C++%')) and
            -- Check for Soft Skills
            EXISTS (SELECT 1 FROM skill sk WHERE s.S_ID = sk.S_ID AND sk.SKILL_NAME IN ('Leadership', 'Communication', 'Teamwork', 'Problem-solving', 'Adaptability', 'Creativity')) and
            -- Check for Industry-specific Skills
            EXISTS (SELECT 1 FROM skill sk WHERE s.S_ID = sk.S_ID AND sk.SKILL_NAME IN ('Marketing', 'Sales', 'Finance', 'Customer Service', 'Project Management')) and
            -- Check for Job-specific Keywords
            EXISTS (SELECT 1 FROM skill sk WHERE s.S_ID = sk.S_ID AND sk.SKILL_NAME IN ('SEO', '%UX/UI%design%', '%Data%Analysis%', 'Agile', 'Scrum')) and
            -- Check for Personal Attributes
            EXISTS (SELECT 1 FROM skill sk WHERE s.S_ID = sk.S_ID AND sk.SKILL_NAME IN ('Reliable', 'Enthusiastic', 'Detail-oriented', 'Self-motivated')) and
            -- Check for Achievements and Results
            EXISTS (SELECT 1 FROM achievement ach WHERE s.S_ID = ach.S_ID AND ach.ACH_DESC LIKE '%Increased sales revenue%' AND ach.ACH_DESC LIKE '%Reduced customer churn%')
        )
    ) and c_id = '$c_id' ";
    $q = "select * from application where c_id = '$c_id' ";
    $queryResult = "Query: $q";
    $result = mysqli_query($mysqli, $q);
    if ($result === false) {
        echo "Error executing query: " . mysqli_error($mysqli);
    }
} else if (isset($_POST['reject'])) {
    $q1 = "UPDATE application a
    SET a.APP_STATUS = 'REJECTED'
    WHERE a.S_ID IN (
        SELECT DISTINCT s.S_ID
        FROM student s
        WHERE (
            -- Check for Technical Skills
            not EXISTS (SELECT 1 FROM skill sk WHERE s.S_ID = sk.S_ID AND (sk.SKILL_NAME LIKE '%Java%' OR sk.SKILL_NAME LIKE '%Python%' OR sk.SKILL_NAME LIKE '%HTML%' OR sk.SKILL_NAME LIKE '%CSS%' OR sk.SKILL_NAME LIKE '%SQL%' OR sk.SKILL_NAME LIKE '%JavaScript%' OR sk.SKILL_NAME LIKE '%MATLAB%' OR sk.SKILL_NAME LIKE '%C++%')) and
            -- Check for Soft Skills
            not EXISTS (SELECT 1 FROM skill sk WHERE s.S_ID = sk.S_ID AND sk.SKILL_NAME IN ('Leadership', 'Communication', 'Teamwork', 'Problem-solving', 'Adaptability', 'Creativity')) and
            -- Check for Industry-specific Skills
            not EXISTS (SELECT 1 FROM skill sk WHERE s.S_ID = sk.S_ID AND sk.SKILL_NAME IN ('Marketing', 'Sales', 'Finance', 'Customer Service', 'Project Management')) and
            -- Check for Job-specific Keywords
            not EXISTS (SELECT 1 FROM skill sk WHERE s.S_ID = sk.S_ID AND sk.SKILL_NAME IN ('SEO', '%UX/UI%design%', '%Data%Analysis%', 'Agile', 'Scrum')) and
            -- Check for Personal Attributes
            not EXISTS (SELECT 1 FROM skill sk WHERE s.S_ID = sk.S_ID AND sk.SKILL_NAME IN ('Reliable', 'Enthusiastic', 'Detail-oriented', 'Self-motivated')) and
            -- Check for Achievements and Results
            not EXISTS (SELECT 1 FROM achievement ach WHERE s.S_ID = ach.S_ID AND ach.ACH_DESC LIKE '%Increased sales revenue%' AND ach.ACH_DESC LIKE '%Reduced customer churn%')
        )
    )";
    $q = "select * from application where c_id = '$c_id' ";
    $queryResult = "Query: $q";
    $result = mysqli_query($mysqli, $q);
    if ($result === false) {
        echo "Error executing query: " . mysqli_error($mysqli);
    }
} else {
    $q = "select * from application where c_id = '$c_id' ";
    $queryResult = "Query: $q";
    $result = mysqli_query($mysqli, $q);
    if ($result === false) {
        echo "Error executing query: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>

<body>
    <form action="q14.php" method="post">
        <fieldset>
            <legend>Update Application Status according to resume sort-listing</legend>
            <input type="submit" name="accept" value="accept">
        </fieldset>
    </form>

    <?php if (isset($_POST['accept'])): ?>
        <?php if ($result !== false && mysqli_num_rows($result) > 0): ?>
            <h2>All data after updating application status to accepted </h2>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>Application Id</th>
                    <th>Job roll</th>
                    <th>Application Status</th>
                    <th>Company Id</th>
                    <th>Student Id</th>
                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td>
                            <?php echo $r[0]; ?>
                        </td>
                        <td>
                            <?php echo $r[1]; ?>
                        </td>
                        <td>
                            <?php echo $r[2]; ?>
                        </td>
                        <td>
                            <?php echo $r[3]; ?>
                        </td>
                        <td>
                            <?php echo $r[4]; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found in the Student Table</h2>
        <?php endif; ?>
    <?php endif; ?>



    <form action="q14.php" method="post">
        <fieldset>
            <legend>Update Application Status according to resume sort-listing</legend>
            <input type="submit" name="reject" value="reject">
        </fieldset>
    </form>

    <?php if (isset($_POST['reject'])): ?>
        <?php if ($result !== false && mysqli_num_rows($result) > 0): ?>
            <h2>All data after updating application status to REJECTED</h2>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>Application Id</th>
                    <th>Job roll</th>
                    <th>Application Status</th>
                    <th>Company Id</th>
                    <th>Student Id</th>
                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td>
                            <?php echo $r[0]; ?>
                        </td>
                        <td>
                            <?php echo $r[1]; ?>
                        </td>
                        <td>
                            <?php echo $r[2]; ?>
                        </td>
                        <td>
                            <?php echo $r[3]; ?>
                        </td>
                        <td>
                            <?php echo $r[4]; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found in the Student Table</h2>
        <?php endif; ?>
    <?php endif; ?>


</body>

</html>