<!-- Search for Students with Similar Projects -->
<?php

include_once('../helper/connection.php'); 
$queryResult = '';

if (isset($_POST['searchByProject'])) {
    $projectKeyword = $_POST['projectKeyword'];

    $q = "SELECT s.f_name, s.m_name, s.l_name AS name, s.s_id, p.proj_name 
        FROM student s
        NATURAL JOIN project p
        WHERE p.proj_name LIKE '%$projectKeyword%'";

    $stmt = mysqli_prepare($mysqli, $q);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $q = "SELECT * FROM student WHERE 1=2";
    $result = mysqli_query($mysqli, $q);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Search Projects</title>
</head>

<body>
    <h3>Search for Students with Similar Projects</h3>
    <form action="q15.php" method="post">
        <fieldset>
            <legend>Enter Project Keyword:</legend>
            <input type="text" id="projectKeyword" name="projectKeyword">
            <input type="submit" name="searchByProject" value="Search">
        </fieldset>
    </form>
    
    <?php if (isset($_POST['searchByProject']) && isset($result)): ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <h2>Students with Similar Projects</h2>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Student ID</th>
                    <th>Project Name</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td>
                            <?php echo $row['f_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['m_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['name']; ?>
                        </td>
                        <td>
                            <?php echo $row['s_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['proj_name']; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No students found with similar projects.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>